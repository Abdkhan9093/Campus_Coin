<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reports | Campus Coin</title>


    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- Reports Page CSS -->
    <style>
        /* ================================
           REPORTS PAGE
        ================================= */

        .report-summary {
            margin-bottom: 25px;
        }


        /* Filter Card */

        .filter-card {
            margin-bottom: 30px;
        }

        .filter-card form {
            display: grid;
            grid-template-columns: repeat(4, 1fr) auto;
            gap: 15px;
            align-items: end;
        }

        .filter-card label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
        }

        .filter-card input,
        .filter-card select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d8dee8;
            border-radius: 8px;
            background: #ffffff;
            color: #26364d;
            font-size: 14px;
            box-sizing: border-box;
        }

        .filter-card input:focus,
        .filter-card select:focus {
            outline: none;
            border-color: #0d3b66;
            box-shadow: 0 0 0 3px rgba(13, 59, 102, 0.10);
        }


        /* Report Grid */

        .report-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .report-actions {
            grid-column: 1 / -1;
            display: flex;
            justify-content: flex-end;
            margin-bottom: -10px;
        }


        /* Report Cards */

        .report-card {
            background: #ffffff;
            border: 1px solid #e1e6ed;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        .report-card h2 {
            margin: 8px 0 22px;
            color: #26364d;
        }


        /* Chart */

        .simple-chart {
            width: 100%;
        }

        .chart-row {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .chart-row>span {
            width: 75px;
            min-width: 75px;
            font-weight: 600;
            color: #26364d;
        }

        .bars {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .income-bar,
        .expense-bar {
            min-width: 90px;
            padding: 7px 10px;
            border-radius: 6px;
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            box-sizing: border-box;
            white-space: nowrap;
            overflow: hidden;
            transition: width 0.3s ease;
        }

        .income-bar {
            background: #2f80ed;
        }

        .expense-bar {
            background: #9b51e0;
        }


        /* Category Lines */

        .report-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 0;
            border-bottom: 1px solid #edf0f4;
        }

        .report-line:last-child {
            border-bottom: none;
        }

        .report-line span {
            color: #526176;
        }

        .report-line strong {
            color: #26364d;
        }


        /* Empty Text */

        .empty-text {
            color: #7a8699;
            margin: 15px 0;
        }


        /* Insight */

        .insight-card {
            display: flex;
            align-items: flex-start;
            gap: 18px;
            margin-top: 25px;
            padding: 25px;
            background: #ffffff;
            border: 1px solid #e1e6ed;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        .insight-icon {
            width: 45px;
            height: 45px;
            min-width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #fff4d6;
            color: #e09b00;
            font-size: 20px;
        }

        .insight-card h2 {
            margin: 7px 0 8px;
            color: #26364d;
        }

        .insight-card p {
            margin: 0;
            color: #66758a;
            line-height: 1.6;
        }


        /* Responsive */

        @media (max-width: 900px) {

            .filter-card form {
                grid-template-columns: 1fr 1fr;
            }

            .report-grid {
                grid-template-columns: 1fr;
            }

            .report-actions {
                grid-column: auto;
            }
        }


        @media (max-width: 600px) {

            .filter-card form {
                grid-template-columns: 1fr;
            }

            .report-actions {
                justify-content: stretch;
            }

            .report-actions .primary-btn {
                width: 100%;
                text-align: center;
            }

            .report-card {
                padding: 18px;
            }

            .chart-row {
                gap: 10px;
            }

            .chart-row>span {
                width: 60px;
                min-width: 60px;
                font-size: 13px;
            }

            .income-bar,
            .expense-bar {
                font-size: 11px;
                padding: 6px 8px;
            }

            .insight-card {
                padding: 18px;
            }
        }
    </style>

</head>


<body>

    @include('partials.user-nav')


    <main class="page">


        <div class="page-heading">

            <div class="section-label">
                MONTHLY REPORTS
            </div>

            <h1>
                Understand Your <span>Spending</span>
            </h1>

            <p>
                Compare income and expenses across the last six months
                and review your current categories.
            </p>

        </div>


        <div class="summary-grid report-summary">


            <div class="summary-card">

                <div class="summary-icon blue-icon">
                    <i class="fa-solid fa-calendar-day"></i>
                </div>

                <div>

                    <p>Today</p>

                    <h2>
                        Rs. {{ number_format((float) ($dailyExpense ?? 0), 2) }}
                    </h2>

                </div>

            </div>


            <div class="summary-card">

                <div class="summary-icon purple-icon">
                    <i class="fa-solid fa-calendar-week"></i>
                </div>

                <div>

                    <p>This Week</p>

                    <h2>
                        Rs. {{ number_format((float) ($weeklyExpense ?? 0), 2) }}
                    </h2>

                </div>

            </div>


        </div>


        <div class="filter-card">

            <form method="GET" action="{{ url('/reports') }}">


                <div>

                    <label for="category">
                        Expense Category
                    </label>

                    <select name="category" id="category">

                        <option value="">
                            All
                        </option>

                        @foreach(($reportCategories ?? []) as $cat)

                        <option
                            value="{{ $cat }}"
                            {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>

                        @endforeach

                    </select>

                </div>


                <div>

                    <label for="from">
                        From
                    </label>

                    <input
                        type="date"
                        name="from"
                        id="from"
                        value="{{ request('from') }}">

                </div>


                <div>

                    <label for="to">
                        To
                    </label>

                    <input
                        type="date"
                        name="to"
                        id="to"
                        value="{{ request('to') }}">

                </div>


                <div>

                    <label for="source">
                        Income Source
                    </label>

                    <input
                        type="text"
                        name="source"
                        id="source"
                        value="{{ request('source') }}"
                        placeholder="Allowance">

                </div>


                <button
                    type="submit"
                    class="primary-btn">
                    Apply Filters
                </button>


            </form>

        </div>


        <div class="report-grid">


            <div class="report-actions">

                <a
                    href="{{ url('/reports/print') }}"
                    target="_blank"
                    class="primary-btn">
                    Print / Save PDF
                </a>

            </div>


            <div class="report-card">

                <div class="section-label">
                    LAST SIX MONTHS
                </div>

                <h2>
                    Income vs Expense
                </h2>


                <div class="simple-chart">


                    @forelse(($months ?? []) as $month)


                    @php

                    $income = (float) ($month['income'] ?? 0);

                    $expense = (float) ($month['expense'] ?? 0);

                    $maxAmount = max($income, $expense, 1);

                    $incomeWidth = ($income / $maxAmount) * 100;

                    $expenseWidth = ($expense / $maxAmount) * 100;

                    @endphp


                    <div class="chart-row">

                        <span>
                            {{ $month['name'] ?? '' }}
                        </span>


                        <div class="bars">


                            <div
                                class="income-bar"
                                style="width: {{ min(100, $incomeWidth) }}%;">
                                Income Rs.
                                {{ number_format($income, 0) }}
                            </div>


                            <div
                                class="expense-bar"
                                style="width: {{ min(100, $expenseWidth) }}%;">
                                Expense Rs.
                                {{ number_format($expense, 0) }}
                            </div>


                        </div>

                    </div>


                    @empty

                    <p class="empty-text">
                        No monthly data available.
                    </p>

                    @endforelse


                </div>

            </div>


            <div class="report-card">


                <div class="section-label">
                    CURRENT MONTH
                </div>


                <h2>
                    Top Categories
                </h2>


                @forelse(($byCategory ?? []) as $name => $amount)


                <div class="report-line">

                    <span>
                        {{ $name }}
                    </span>

                    <strong>
                        Rs. {{ number_format((float) $amount, 2) }}
                    </strong>

                </div>


                @empty

                <p class="empty-text">
                    No expenses recorded this month.
                </p>

                @endforelse


            </div>


        </div>


        @if(!empty($insight))


        <div class="insight-card">


            <div class="insight-icon">

                <i class="fa-solid fa-lightbulb"></i>

            </div>


            <div>

                <div class="section-label">
                    MONTHLY INSIGHT
                </div>


                <h2>
                    {{ $insight->summary_text ?? '' }}
                </h2>


                <p>
                    {{ $insight->tip_text ?? '' }}
                </p>


            </div>


        </div>


        @endif


    </main>


    @include('partials.user-footer')


</body>

</html>