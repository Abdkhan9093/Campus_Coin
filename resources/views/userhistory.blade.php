
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History | Campus Coin</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    @include('partials.user-nav')

    <main class="page">

        <div class="page-heading">
            <div class="section-label">TRANSACTION HISTORY</div>

            <h1>
                Your Spending <span>History</span>
            </h1>

            <p>
                Filter and review the transactions saved to your account.
            </p>
        </div>

        @if(session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <div class="summary-grid">

            <div class="summary-card">
                <div class="summary-icon blue-icon">
                    <i class="fa-solid fa-arrow-down"></i>
                </div>

                <div>
                    <p>Total Income</p>
                    <h2>Rs. {{ number_format($income, 2) }}</h2>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon red-icon">
                    <i class="fa-solid fa-arrow-up"></i>
                </div>

                <div>
                    <p>Shown Expenses</p>
                    <h2>Rs. {{ number_format($spent, 2) }}</h2>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon green-icon">
                    <i class="fa-solid fa-wallet"></i>
                </div>

                <div>
                    <p>Budget Remaining</p>
                    <h2>Rs. {{ number_format($remaining, 2) }}</h2>
                </div>
            </div>

        </div>

        <div class="filter-card">

            <form method="GET" action="{{ route('history') }}">

                <div>
                    <label>Category</label>

                    <select name="category">
                        <option value="">All Categories</option>

                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>From</label>

                    <input type="date" name="from" value="{{ request('from') }}">
                </div>

                <div>
                    <label>To</label>

                    <input type="date" name="to" value="{{ request('to') }}">
                </div>

                <button class="primary-btn" type="submit">
                    Filter
                </button>

                <a class="secondary-dark-btn" href="{{ route('history') }}">
                    Clear
                </a>

            </form>

        </div>

        <div class="history-card">

            <div class="history-header">

                <div>
                    <div class="section-label">YOUR RECORDS</div>

                    <h2>All Expenses</h2>

                    <p>
                        Every saved expense appears here.
                    </p>
                </div>

                <a href="{{ route('expenses') }}" class="primary-btn">
                    <i class="fa-solid fa-plus"></i>
                    Add Expense
                </a>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($expenses as $expense)

                            <tr>

                                <td>
                                    {{ $expense->expense_date->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $expense->category }}
                                </td>

                                <td>
                                    {{ $expense->description }}
                                </td>

                                <td>
                                    Rs. {{ number_format($expense->amount, 2) }}
                                </td>

                                <td>
                                    {{ $expense->recurring ? 'Recurring' : 'One time' }}
                                </td>

                                <td>

                                    <a class="edit-link" href="{{ route('expenses.edit', $expense) }}">
                                        Edit
                                    </a>

                                    <form style="display:inline" method="POST"
                                        action="{{ route('expenses.delete', $expense) }}"
                                        onsubmit="return confirm('Delete this expense?');">
                                        @csrf
                                        @method('DELETE')

                                        <button class="delete-btn">
                                            Delete
                                        </button>
                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="empty-cell">
                                    No expenses found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

    @include('partials.user-footer')

</body>

</html>