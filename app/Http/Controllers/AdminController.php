<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Expense;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminEmail = 'campuscoin001@gmail.com';
    private $adminPassword = 'admin001.budgetbasic';

    public function login()
    {
        if (session('is_admin')) {
            return redirect()->route('admin.dashboard');
        }

        return view('adminlogin');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($request->email != $this->adminEmail || $request->password != $this->adminPassword) {
            return back()->withErrors([
                'email' => 'Invalid admin email or password.'
            ])->withInput();
        }

        $request->session()->regenerate();
        $request->session()->put('is_admin', true);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $users = User::with('expenses')->get();

        $totalUsers = $users->count();
        $activeUsers = $users->where('status', 'active')->count();
        $inactiveUsers = $users->where('status', 'inactive')->count();

        $totalBudget = $users->sum('budget_amount');
        $totalSpent = Expense::sum('amount');

        $recentExpenses = Expense::with('user')->latest()->take(10)->get();

        return view('admin', compact(
            'users',
            'totalUsers',
            'activeUsers',
            'inactiveUsers',
            'totalBudget',
            'totalSpent',
            'recentExpenses'
        ));
    }

    public function users()
    {
        $users = User::with('expenses')->latest()->get();

        return view('adminuser', compact('users'));
    }

    public function updateUserStatus(User $user)
    {
        if ($user->status == 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }

        $user->save();

        return back()->with('success', 'User status updated successfully.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function expenses()
    {
        $expenses = Expense::with('user')->latest('expense_date')->get();

        $totalSpent = $expenses->sum('amount');
        $totalBudget = User::sum('budget_amount');

        return view('adminexpenses', compact(
            'expenses',
            'totalSpent',
            'totalBudget'
        ));
    }

    public function activity()
    {
        $recentExpenses = Expense::with('user')->latest()->take(20)->get();
        $recentUsers = User::latest()->take(10)->get();

        return view('adminactivity', compact(
            'recentExpenses',
            'recentUsers'
        ));
    }

    public function settings()
    {
        return view('adminsettings');
    }
}
