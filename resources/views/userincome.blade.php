<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    @include('partials.user-nav')
    <main class="page">
        <div class="page-heading">
            <div class="section-label">INCOME TRACKER</div>
            <h1>Record Your <span>Income</span></h1>
            <p>Keep allowance, part-time work, scholarships and other income in your financial history.</p>
        </div>
        @if(session('success'))
        <div class="success-box">{{ session('success') }}</div>@endif
        @if($errors->any())
        <div class="error-box">{{ $errors->first() }}</div>@endif

        <div class="income-layout">
            <div class="form-card">
                <div class="form-icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
                <h2>Add Income</h2>
                <p>Enter one income record at a time.</p>
                <form method="POST" action="{{ route('income.store') }}">@csrf
                    <label>Date</label><input type="date" name="income_date"
                        value="{{ old('income_date', now()->format('Y-m-d')) }}" required>
                    <label>Income Category</label><select name="category_id" required>
                        <option value="">Select Category</option>@foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach
                    </select>
                    <label>Source</label><input type="text" name="source" value="{{ old('source') }}"
                        placeholder="e.g. Monthly allowance" required>
                    <label>Description</label><input type="text" name="description" value="{{ old('description') }}"
                        placeholder="Optional note">
                    <label>Amount</label>
                    <div class="input-money"><span>Rs.</span><input type="number" name="amount"
                            value="{{ old('amount') }}" min="0.01" step="0.01" placeholder="50000" required></div>
                    <label class="check-row"><input type="checkbox" name="recurring" value="1"> This is a recurring
                        income</label>
                    <button type="submit" class="full-btn">Save Income <i class="fa-solid fa-check"></i></button>
                </form>
            </div>
            <div class="side-info"><img
                    src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=900&q=80"
                    alt="Budget planning">
                <div class="side-info-content">
                    <h2>Know What Comes In</h2>
                    <p>Recording income gives you a clearer monthly balance and makes your spending reports more useful.
                    </p>
                    <div class="mini-stat"><i class="fa-solid fa-check"></i><span>Allowance and salary style
                            sources</span></div>
                    <div class="mini-stat"><i class="fa-solid fa-check"></i><span>Recurring income marking</span></div>
                    <div class="mini-stat"><i class="fa-solid fa-check"></i><span>Monthly report support</span></div>
                </div>
            </div>
        </div>
    </main>
    @include('partials.user-footer')
</body>

</html>