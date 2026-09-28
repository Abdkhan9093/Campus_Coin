<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>@include('partials.user-nav')<main class="page">
        <div class="page-heading">
            <div class="section-label">EDIT TRANSACTION</div>
            <h1>Update <span>Expense</span></h1>
            <p>Correct the details and save the updated transaction.</p>
        </div>
        <div class="form-card profile-card">
            <form method="POST" action="{{ route('expenses.update',$expense) }}">@csrf @method('PUT')<label>Date</label><input type="date" name="expense_date" value="{{ $expense->expense_date->format('Y-m-d') }}" required><label>Category</label><select name="category_id" required>@foreach($categories as $category)<option value="{{ $category->id }}" {{ $expense->category_id==$category->id?'selected':'' }}>{{ $category->name }}</option>@endforeach</select><label>Description</label><input type="text" name="description" value="{{ $expense->description }}" required><label>Amount</label>
                <div class="input-money"><span>Rs.</span><input type="number" name="amount" value="{{ $expense->amount }}" min="0.01" step="0.01" required></div><label class="check-row"><input type="checkbox" name="recurring" value="1" {{ $expense->recurring?'checked':'' }}> Recurring expense</label><button class="full-btn">Update Expense</button>
            </form>
        </div>
    </main>@include('partials.user-footer')</body>

</html>