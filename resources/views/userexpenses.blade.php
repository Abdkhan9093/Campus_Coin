<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    @include('partials.user-nav')
    <main class="page">
        <div class="page-heading">
            <div class="section-label">EXPENSE TRACKER</div>
            <h1>Add Your <span>Expense</span></h1>
            <p>Record food, transport, academics, hostel and everyday spending.</p>
        </div>
        @if($errors->any())
        <div class="error-box">{{ $errors->first() }}</div>@endif
        <div class="expense-layout">
            <div class="form-card">
                <div class="form-icon green-icon"><i class="fa-solid fa-receipt"></i></div>
                <h2>Expense Details</h2>
                <p>Enter accurate information about your spending.</p>
                <form method="POST" action="{{ route('expenses.store') }}">@csrf
                    <label>Date</label><input type="date" name="expense_date"
                        value="{{ old('expense_date', now()->format('Y-m-d')) }}" required>
                    <label>Category</label><select name="category_id" id="category_id" required>
                        <option value="">Select Category</option>
                        @php($expenseCategories = \App\Models\Category::where('type', 'expense')->where(function ($q) {
                        $q->whereNull('user_id')->orWhere('user_id', auth()->id()); })->orderBy('name')->get())@foreach($expenseCategories as $category)
        <option value="{{ $category->id }}" data-name="{{ $category->name }}">{{ $category->name }}
    </option>@endforeach
                    </select>
                    <label>Description</label><input type="text" name="description" value="{{ old('description') }}"
                        placeholder="e.g. Lunch, Petrol, Books" required>
                    <label>Amount</label>
                    <div class="input-money"><span>Rs.</span><input type="number" name="amount"
                            value="{{ old('amount') }}" min="0.01" step="0.01" placeholder="1000" required></div>
                    <label class="check-row"><input type="checkbox" name="recurring" value="1"> This is a recurring
                        expense</label>
                    <input type="hidden" name="category" id="category_name">
                    <button type="submit" class="full-btn green-btn">Save Expense <i
                            class="fa-solid fa-check"></i></button>
                </form>
            </div>
            <div class="side-info"><img
                    src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=900&q=80"
                    alt="Expense management">
                <div class="side-info-content">
                    <h2>Track Every Rupee</h2>
                    <p>Small purchases can add up. Keeping them in your history makes your reports more accurate.</p>
                    <div class="mini-stat"><i class="fa-solid fa-check"></i><span>Student-friendly categories</span>
                    </div>
                    <div class="mini-stat"><i class="fa-solid fa-check"></i><span>Recurring expense marking</span></div>
                    <div class="mini-stat"><i class="fa-solid fa-check"></i><span>Automatic history updates</span></div>
                </div>
            </div>
        </div>
    </main>
    @include('partials.user-footer')
    <script>document.getElementById('category_id').addEventListener('change', function () { var o = this.options[this.selectedIndex]; document.getElementById('category_name').value = o.getAttribute('data-name') || ''; });</script>
</body>

</html>