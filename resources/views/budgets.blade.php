<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budgets | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
@include('partials.user-nav')

<main class="page">
    <div class="page-heading">
        <div class="section-label">BUDGET GOALS</div>
        <h1>Plan Your <span>Monthly Spending</span></h1>
        <p>Set your monthly budget and category limits.</p>
    </div>

    @if(session('success'))
        <div class="success-box">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="success-box">{{ $errors->first() }}</div>
    @endif

    <div class="two-column">
        <div class="form-card">
            <div class="form-icon"><i class="fa-solid fa-wallet"></i></div>
            <h2>Monthly Budget</h2>
            <p>Set the maximum amount you want to spend this month.</p>

            <form method="POST" action="{{ route('budgets.save') }}">
                @csrf
                <label>Budget Amount</label>
                <div class="input-money">
                    <span>Rs.</span>
                    <input type="number" name="budget_amount" min="0" step="0.01" value="{{ old('budget_amount', auth()->user()->budget_amount ?? 0) }}" required>
                </div>
                <button type="submit" class="full-btn">Save Budget</button>
            </form>
        </div>

        <div class="form-card">
            <div class="form-icon green-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h2>Category Budget</h2>
            <p>Set a monthly limit for one expense category.</p>

            <form method="POST" action="{{ route('budgets.category') }}">
                @csrf
                <label>Category</label>
                <select name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <label>Monthly Limit</label>
                <div class="input-money">
                    <span>Rs.</span>
                    <input type="number" name="limit_amount" min="0" step="0.01" placeholder="10000" required>
                </div>
                <button type="submit" class="full-btn green-btn">Save Category Limit</button>
            </form>
        </div>
    </div>

    <div class="history-card">
        <div class="history-header">
            <div>
                <div class="section-label">CURRENT MONTH</div>
                <h2>Category Budgets</h2>
                <p>Your saved category limits are shown below.</p>
            </div>
        </div>

        <div class="budget-list">
            @forelse($budgets as $budget)
                @php
                    $percent = $budget->limit_amount > 0 ? ($budget->used / $budget->limit_amount) * 100 : 0;
                @endphp
                <div class="budget-row">
                    <div>
                        <strong>{{ $budget->category->name }}</strong>
                        <span>Limit: Rs. {{ number_format($budget->limit_amount, 2) }}</span>
                        @if($budget->used >= $budget->limit_amount)
                            <small class="budget-alert">Budget exceeded</small>
                        @elseif($budget->used >= ($budget->limit_amount * 0.8))
                            <small class="budget-alert">Budget is near its limit</small>
                        @endif
                    </div>
                    <div class="budget-track">
                        <div style="width: {{ min(100, $percent) }}%"></div>
                    </div>
                    <small>Used: Rs. {{ number_format($budget->used, 2) }}</small>
                </div>
            @empty
                <p class="empty-text">No category budgets set yet.</p>
            @endforelse
        </div>
    </div>
</main>

@include('partials.user-footer')
</body>
</html>
