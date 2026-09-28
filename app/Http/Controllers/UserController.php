<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Insight;
use App\Models\SavedTip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $this->makeDefaultCategories();

        $monthStart = now()->startOfMonth();
        $monthEnd = now()->endOfMonth();
        $income = $user->incomes()->whereBetween('income_date', [$monthStart, $monthEnd])->sum('amount');
        $spent = $user->expenses()->whereBetween('expense_date', [$monthStart, $monthEnd])->sum('amount');
        $balance = $income - $spent;

        $topCategory = $user->expenses()
            ->select('category', DB::raw('SUM(amount) as total'))
            ->whereBetween('expense_date', [$monthStart, $monthEnd])
            ->groupBy('category')->orderByDesc('total')->first();

        $budgetTotal = $user->budgets()->whereDate('month', $monthStart->toDateString())->sum('limit_amount');
        $tips = $this->makeTips($user, $income, $spent, $budgetTotal);

        return view('user', compact('user', 'income', 'spent', 'balance', 'topCategory', 'budgetTotal', 'tips'));
    }

    public function income()
    {
        $this->makeDefaultCategories();
        $categories = Category::where('type', 'income')->where(function ($q) {
            $q->whereNull('user_id')->orWhere('user_id', auth()->id());
        })->orderBy('name')->get();
        return view('userincome', compact('categories'));
    }

    public function saveIncome(Request $request)
    {
        $data = $request->validate([
            'income_date' => ['required', 'date'],
            'category_id' => ['required', 'exists:categories,id'],
            'source' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'recurring' => ['nullable', 'boolean'],
        ]);

        $category = Category::where('id', $data['category_id'])->where('type', 'income')->first();

        if (!$category) {
            abort(404);
        }

        if ($category->user_id && $category->user_id !== auth()->id()) {
            abort(403);
        }

        $data['user_id'] = auth()->id();
        $data['recurring'] = $request->boolean('recurring');
        Income::create($data);

        return redirect()->route('income')->with('success', 'Income saved successfully.');
    }

    public function storeExpense(Request $request)
    {
        $data = $request->validate([
            'expense_date' => ['required', 'date'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'recurring' => ['nullable', 'boolean'],
        ]);

        $category = Category::where('id', $data['category_id'])->where('type', 'expense')->first();

        if (!$category) {
            abort(404);
        }

        if ($category->user_id && $category->user_id !== auth()->id()) {
            abort(403);
        }

        $data['user_id'] = auth()->id();
        $data['category'] = $category->name;
        $data['recurring'] = $request->boolean('recurring');
        Expense::create($data);

        return redirect()->route('history')->with('success', 'Expense saved successfully.');
    }

    public function history(Request $request)
    {
        $user = auth()->user();
        $query = $user->expenses()->latest('expense_date')->latest();
        if ($request->filled('category')) $query->where('category', $request->category);
        if ($request->filled('from')) $query->whereDate('expense_date', '>=', $request->from);
        if ($request->filled('to')) $query->whereDate('expense_date', '<=', $request->to);
        $expenses = $query->get();
        $spent = $expenses->sum('amount');
        $income = $user->incomes()->sum('amount');
        $remaining = $user->budget_amount - $user->expenses()->sum('amount');
        $categories = $user->expenses()->select('category')->distinct()->orderBy('category')->pluck('category');
        return view('userhistory', compact('user', 'expenses', 'spent', 'remaining', 'income', 'categories'));
    }

    public function editExpense(Expense $expense)
    {
        if ($expense->user_id != auth()->id()) {
            abort(403);
        }
        $categories = Category::where('type', 'expense')->where(function ($q) { $q->whereNull('user_id')->orWhere('user_id', auth()->id()); })->orderBy('name')->get();
        return view('edit-expense', compact('expense', 'categories'));
    }

    public function updateExpense(Request $request, Expense $expense)
    {
        if ($expense->user_id != auth()->id()) {
            abort(403);
        }
        $data = $request->validate(['expense_date' => ['required','date'], 'category_id' => ['required','exists:categories,id'], 'description' => ['required','string','max:255'], 'amount' => ['required','numeric','min:0.01'], 'recurring' => ['nullable','boolean']]);
        $category = Category::where('id', $data['category_id'])->where('type', 'expense')->first();

        if (!$category) {
            abort(404);
        }

        if ($category->user_id && $category->user_id !== auth()->id()) {
            abort(403);
        }
        $data['category'] = $category->name;
        $data['recurring'] = $request->boolean('recurring');
        $expense->update($data);
        return redirect()->route('history')->with('success','Expense updated successfully.');
    }

    public function deleteExpense(Expense $expense)
    {
        if ($expense->user_id != auth()->id()) {
            abort(403);
        }
        $expense->delete();
        return back()->with('success', 'Expense deleted successfully.');
    }

    public function editIncome(Income $income)
    {
        if ($income->user_id != auth()->id()) {
            abort(403);
        }
        $categories = Category::where('type','income')->where(function($q){$q->whereNull('user_id')->orWhere('user_id',auth()->id());})->orderBy('name')->get();
        return view('edit-income', compact('income','categories'));
    }

    public function updateIncome(Request $request, Income $income)
    {
        if ($income->user_id != auth()->id()) {
            abort(403);
        }
        $data = $request->validate(['income_date'=>['required','date'],'category_id'=>['required','exists:categories,id'],'source'=>['required','string','max:100'],'description'=>['nullable','string','max:255'],'amount'=>['required','numeric','min:0.01'],'recurring'=>['nullable','boolean']]);
        $category = Category::where('id', $data['category_id'])->where('type', 'income')->first();

        if (!$category) {
            abort(404);
        }

        if ($category->user_id && $category->user_id !== auth()->id()) {
            abort(403);
        }
        $data['recurring']=$request->boolean('recurring');
        $income->update($data);
        return redirect()->route('income')->with('success','Income updated successfully.');
    }

    public function deleteIncome(Income $income)
    {
        if ($income->user_id != auth()->id()) {
            abort(403);
        }
        $income->delete();
        return back()->with('success', 'Income deleted successfully.');
    }

    public function budgets()
    {
        $this->makeDefaultCategories();

        $categories = Category::where('type', 'expense')
            ->where(function ($query) {
                $query->whereNull('user_id');
                $query->orWhere('user_id', auth()->id());
            })
            ->orderBy('name')
            ->get();

        $budgets = Budget::where('user_id', auth()->id())
            ->whereMonth('month', now()->month)
            ->whereYear('month', now()->year)
            ->get();

        foreach ($budgets as $budget) {
            $category = Category::find($budget->category_id);
            $budget->category = $category;

            $budget->used = Expense::where('user_id', auth()->id())
                ->where('category', $category->name)
                ->whereMonth('expense_date', now()->month)
                ->whereYear('expense_date', now()->year)
                ->sum('amount');
        }

        return view('budgets', compact('categories', 'budgets'));
    }

    public function saveBudget(Request $request)
    {
        $request->validate([
            'budget_amount' => 'required|numeric|min:0'
        ]);

        $user = auth()->user();
        $user->budget_amount = $request->budget_amount;
        $user->save();

        return redirect()->route('budgets')->with('success', 'Monthly budget saved successfully.');
    }

    public function saveCategoryBudget(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'limit_amount' => 'required|numeric|min:0'
        ]);

        $category = Category::where('id', $request->category_id)
            ->where('type', 'expense')
            ->first();

        if (!$category) {
            return back()->withErrors(['category_id' => 'Please select a valid expense category.']);
        }

        if ($category->user_id != null && $category->user_id != auth()->id()) {
            abort(403);
        }

        $month = now()->startOfMonth()->toDateString();

        $budget = Budget::where('user_id', auth()->id())
            ->where('category_id', $category->id)
            ->where('month', $month)
            ->first();

        if ($budget) {
            $budget->limit_amount = $request->limit_amount;
            $budget->save();
        } else {
            $budget = new Budget();
            $budget->user_id = auth()->id();
            $budget->category_id = $category->id;
            $budget->month = $month;
            $budget->limit_amount = $request->limit_amount;
            $budget->save();
        }

        return redirect()->route('budgets')->with('success', 'Category budget saved successfully.');
    }

    public function categories()
    {
        $this->makeDefaultCategories();
        $categories = Category::where(function ($q) {
            $q->whereNull('user_id')->orWhere('user_id', auth()->id());
        })->orderBy('type')->orderBy('name')->get();
        return view('categories', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:100'], 'type' => ['required', 'in:income,expense']]);
        Category::create(['user_id' => auth()->id(), 'name' => $data['name'], 'type' => $data['type'], 'is_default' => false]);
        return back()->with('success', 'Category added successfully.');
    }

    public function deleteCategory(Category $category)
    {
        if ($category->user_id != auth()->id()) {
            abort(403);
        }
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }

    public function reports(Request $request)
    {
        $user = auth()->user();

        $start = now()->subMonths(5)->startOfMonth();

        $expensesQuery = $user->expenses()
            ->whereBetween('expense_date', [$start, now()->endOfMonth()]);

        $incomesQuery = $user->incomes()
            ->whereBetween('income_date', [$start, now()->endOfMonth()]);

        if ($request->filled('category')) {
            $expensesQuery->where('category', $request->category);
        }

        if ($request->filled('from')) {
            $expensesQuery->whereDate('expense_date', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $expensesQuery->whereDate('expense_date', '<=', $request->to);
        }

        if ($request->filled('source')) {
            $incomesQuery->where('source', 'like', '%' . $request->source . '%');
        }

        $expenses = $expensesQuery->get();
        $incomes = $incomesQuery->get();

        $months = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);

            $monthIncome = 0;
            $monthExpense = 0;

            foreach ($incomes as $income) {
                if ($income->income_date->format('Y-m') == $date->format('Y-m')) {
                    $monthIncome = $monthIncome + $income->amount;
                }
            }

            foreach ($expenses as $expense) {
                if ($expense->expense_date->format('Y-m') == $date->format('Y-m')) {
                    $monthExpense = $monthExpense + $expense->amount;
                }
            }

            $months[] = [
                'name' => $date->format('M Y'),
                'income' => $monthIncome,
                'expense' => $monthExpense
            ];
        }

        $categoryTotals = [];

        foreach ($expenses as $expense) {
            if ($expense->expense_date->format('Y-m') == now()->format('Y-m')) {
                if (isset($categoryTotals[$expense->category])) {
                    $categoryTotals[$expense->category] =
                        $categoryTotals[$expense->category] + $expense->amount;
                } else {
                    $categoryTotals[$expense->category] = $expense->amount;
                }
            }
        }

        $byCategory = collect($categoryTotals)->sortDesc();

        $dailyExpense = $user->expenses()
            ->whereDate('expense_date', now()->toDateString())
            ->sum('amount');

        $weeklyExpense = $user->expenses()
            ->whereBetween('expense_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('amount');

        $reportCategories = $user->expenses()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $insight = $this->makeInsight($user, $byCategory);

        return view('reports', compact(
            'months',
            'byCategory',
            'insight',
            'dailyExpense',
            'weeklyExpense',
            'reportCategories'
        ));
    }

    public function reportPrint()
    {
        $user = auth()->user();
        $expenses = $user->expenses()->whereMonth('expense_date', now()->month)->whereYear('expense_date', now()->year)->get();
        $incomes = $user->incomes()->whereMonth('income_date', now()->month)->whereYear('income_date', now()->year)->get();
        $totalIncome = $incomes->sum('amount');
        $totalExpense = $expenses->sum('amount');
        $byCategory = $expenses->groupBy('category')->map->sum('amount')->sortDesc();
        return view('report-print', compact('user','expenses','incomes','totalIncome','totalExpense','byCategory'));
    }

    public function saveTip(Request $request)
    {
        $data = $request->validate(['title' => ['required', 'string', 'max:150'], 'text' => ['required', 'string', 'max:500']]);
        SavedTip::create(['user_id' => auth()->id(), 'title' => $data['title'], 'text' => $data['text']]);
        return back()->with('success', 'Tip saved to your bookmarks.');
    }

    public function savedTips()
    {
        $tips = auth()->user()->savedTips()->latest()->get();
        return view('savedtips', compact('tips'));
    }

    public function deleteSavedTip(SavedTip $tip)
    {
        if ($tip->user_id != auth()->id()) {
            abort(403);
        }
        $tip->delete();
        return back()->with('success', 'Saved tip removed.');
    }

    public function profile()
    {
        return view('profile-simple', ['user' => auth()->user()]);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'academic_year' => ['nullable', 'string', 'max:50'],
            'monthly_savings_goal' => ['required', 'numeric', 'min:0'],
        ]);
        auth()->user()->update($data);
        return back()->with('success', 'Profile updated successfully.');
    }

    private function makeDefaultCategories()
    {
        $defaults = [
            'income' => ['Allowance', 'Part-time Job', 'Scholarship', 'Gift', 'Other Income'],
            'expense' => ['Food', 'Transport', 'Hostel/Rent', 'Academics', 'Subscriptions', 'Entertainment', 'Miscellaneous'],
        ];
        foreach ($defaults as $type => $names) {
            foreach ($names as $name) {
                $category = Category::where('name', $name)->where('type', $type)->whereNull('user_id')->first();
                if (!$category) {
                    $category = new Category();
                    $category->name = $name;
                    $category->type = $type;
                    $category->user_id = null;
                    $category->is_default = true;
                    $category->save();
                }
            }
        }
    }

    private function makeTips($user, $income, $spent, $budget)
    {
        $tips = [];
        if ($income > 0 && $spent / $income >= .7) $tips[] = ['title' => 'Watch your spending', 'text' => 'Most of your income is already being used this month. Review your top category before adding more spending.'];
        if ($budget > 0 && $spent > $budget) $tips[] = ['title' => 'Budget alert', 'text' => 'Your current spending is above the category budgets you set. Check the budget page and adjust your plan.'];
        if (!$tips) $tips[] = ['title' => 'Keep tracking', 'text' => 'Record small purchases as well. A complete history makes your monthly spending pattern easier to understand.'];
        return $tips;
    }

    private function makeInsight($user, $byCategory)
    {
        $month = now()->startOfMonth()->toDateString();
        $top = $byCategory->keys()->first();
        $topAmount = $top ? $byCategory->first() : 0;
        $summary = $top ? 'Your highest spending category this month is '.$top.' with Rs. '.number_format($topAmount, 2).'.' : 'There is not enough spending data for this month yet.';
        $tip = $top ? 'Review '.$top.' purchases and set a realistic monthly limit for this category.' : 'Add your income and expenses to receive a more useful monthly summary.';
        $insight = Insight::where('user_id', $user->id)->where('month', $month)->first();
        if ($insight) {
            $insight->summary_text = $summary;
            $insight->tip_text = $tip;
            $insight->save();
        } else {
            $insight = new Insight();
            $insight->user_id = $user->id;
            $insight->month = $month;
            $insight->summary_text = $summary;
            $insight->tip_text = $tip;
            $insight->save();
        }
        return $insight;
    }
}
