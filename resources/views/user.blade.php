<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    @include('partials.user-nav')

    <section class="dashboard-hero">
        <div>
            <div class="section-label">PERSONAL MONEY DASHBOARD</div>
            <h1>Hello, {{ $user->name }}</h1>
            <p>Keep your income, spending and monthly goals in one place.</p>
            <div class="hero-buttons">
                <a href="{{ route('expenses') }}" class="primary-btn">Add Expense <i class="fa-solid fa-plus"></i></a>
                <a href="{{ route('income') }}" class="secondary-btn blue-outline">Add Income</a>
            </div>
        </div>
        <div class="dashboard-hero-box">
            <span>Current Month Balance</span>
            <strong>Rs. {{ number_format($balance, 2) }}</strong>
            <small>Income Rs. {{ number_format($income, 2) }} &nbsp; | &nbsp; Expense Rs.
                {{ number_format($spent, 2) }}</small>
        </div>
    </section>

    <main class="page dashboard-page">
        <div class="summary-grid">
            <div class="summary-card">
                <div class="summary-icon blue-icon"><i class="fa-solid fa-arrow-down"></i></div>
                <div>
                    <p>Monthly Income</p>
                    <h2>Rs. {{ number_format($income, 2) }}</h2>
                </div>
            </div>
            <div class="summary-card">
                <div class="summary-icon red-icon"><i class="fa-solid fa-arrow-up"></i></div>
                <div>
                    <p>Monthly Expense</p>
                    <h2>Rs. {{ number_format($spent, 2) }}</h2>
                </div>
            </div>
            <div class="summary-card">
                <div class="summary-icon green-icon"><i class="fa-solid fa-piggy-bank"></i></div>
                <div>
                    <p>Category Budgets</p>
                    <h2>Rs. {{ number_format($budgetTotal, 2) }}</h2>
                </div>
            </div>
            <div class="summary-card">
                <div class="summary-icon purple-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <div>
                    <p>Top Category</p>
                    <h2>{{ $topCategory ? $topCategory->category : 'No data' }}</h2>
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-heading">
                    <div>
                        <div class="section-label">PERSONALIZED TIPS</div>
                        <h2>Keep Your Plan On Track</h2>
                    </div><a href="{{ route('saved.tips') }}" class="text-link">Saved tips</a>
                </div>
                @foreach($tips as $tip)
                    <div class="tip-row">
                        <div class="tip-icon"><i class="fa-solid fa-lightbulb"></i></div>
                        <div>
                            <h3>{{ $tip['title'] }}</h3>
                            <p>{{ $tip['text'] }}</p>
                        </div>
                        <form method="POST" action="{{ route('saved.tips.store') }}">@csrf<input type="hidden" name="title"
                                value="{{ $tip['title'] }}"><input type="hidden" name="text"
                                value="{{ $tip['text'] }}"><button class="small-save">Save</button></form>
                    </div>
                @endforeach
            </div>

            <div class="dashboard-card quick-card">
                <div class="section-label">QUICK ACCESS</div>
                <h2>Manage Your Money</h2>
                <a href="{{ route('budgets') }}" class="quick-link"><i class="fa-solid fa-bullseye"></i><span>Set
                        category budgets</span><i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('reports') }}" class="quick-link"><i class="fa-solid fa-chart-column"></i><span>View
                        monthly reports</span><i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('categories') }}" class="quick-link"><i class="fa-solid fa-list"></i><span>Manage
                        categories</span><i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('profile.simple') }}" class="quick-link"><i class="fa-solid fa-user"></i><span>Update
                        your profile</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="dashboard-info">
            <div><strong>Budget vs Actual</strong><span>Monthly category budgets help you see where your planned
                    spending is going.</span></div>
            <a href="{{ route('budgets') }}" class="primary-btn">Manage Budgets</a>
        </div>
    </main>
    @include('partials.user-footer')
</body>

</html>