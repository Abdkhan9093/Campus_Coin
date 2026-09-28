<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Income | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>@include('partials.user-nav')<main class="page">
        <div class="page-heading">
            <div class="section-label">EDIT TRANSACTION</div>
            <h1>Update <span>Income</span></h1>
            <p>Correct the details and save the updated income.</p>
        </div>
        <div class="form-card profile-card">
            <form method="POST" action="{{ route('income.update',$income) }}">@csrf @method('PUT')<label>Date</label><input type="date" name="income_date" value="{{ $income->income_date->format('Y-m-d') }}" required><label>Category</label><select name="category_id" required>@foreach($categories as $category)<option value="{{ $category->id }}" {{ $income->category_id==$category->id?'selected':'' }}>{{ $category->name }}</option>@endforeach</select><label>Source</label><input type="text" name="source" value="{{ $income->source }}" required><label>Description</label><input type="text" name="description" value="{{ $income->description }}"><label>Amount</label>
                <div class="input-money"><span>Rs.</span><input type="number" name="amount" value="{{ $income->amount }}" min="0.01" step="0.01" required></div><label class="check-row"><input type="checkbox" name="recurring" value="1" {{ $income->recurring?'checked':'' }}> Recurring income</label><button class="full-btn">Update Income</button>
            </form>
        </div>
    </main>@include('partials.user-footer')</body>

</html>