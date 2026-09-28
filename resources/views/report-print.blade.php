<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Monthly Report | Campus Coin</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #26364d;
            padding: 40px;
            max-width: 900px;
            margin: auto;
            background: #ffffff;
        }

        h1 {
            color: #0d3b66;
            margin-bottom: 8px;
        }

        h2 {
            margin-top: 30px;
            color: #0d3b66;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f3f6fa;
            color: #0d3b66;
        }

        .summary {
            display: flex;
            gap: 20px;
            margin-top: 25px;
        }

        .box {
            padding: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            flex: 1;
            background: #fafcff;
        }

        /* Print Button */
        .print-section {
            margin-top: 30px;
            text-align: center;
        }

        .print-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 12px 24px;

            background: #0d3b66;
            color: #ffffff;

            border: none;
            border-radius: 8px;

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .print-btn:hover {
            background: #092c4d;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(13, 59, 102, 0.2);
        }

        .print-btn:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .print-btn:focus {
            outline: 3px solid rgba(13, 59, 102, 0.25);
            outline-offset: 2px;
        }

        /* Print Settings */
        @media print {

            body {
                padding: 0;
                max-width: none;
            }

            .print-section {
                display: none !important;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            h1,
            h2 {
                color: #000000;
            }
        }

        /* Mobile */
        @media (max-width: 600px) {

            body {
                padding: 20px;
            }

            .summary {
                flex-direction: column;
            }

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 8px;
            }

            .print-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <h1>Campus Coin Monthly Report</h1>

    <p>
        {{ $user->name }} · {{ now()->format('F Y') }}
    </p>


    <!-- Summary -->
    <div class="summary">

        <div class="box">
            <strong>Total Income</strong>
            <br>
            Rs. {{ number_format($totalIncome, 2) }}
        </div>

        <div class="box">
            <strong>Total Expenses</strong>
            <br>
            Rs. {{ number_format($totalExpense, 2) }}
        </div>

        <div class="box">
            <strong>Balance</strong>
            <br>
            Rs. {{ number_format($totalIncome - $totalExpense, 2) }}
        </div>

    </div>


    <!-- Spending by Category -->
    <h2>Spending by Category</h2>

    <table>

        <thead>
            <tr>
                <th>Category</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>

            @forelse($byCategory as $name => $amount)

                <tr>
                    <td>{{ $name }}</td>

                    <td>
                        Rs. {{ number_format($amount, 2) }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="2">
                        No category expenses found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>


    <!-- Transactions -->
    <h2>Transactions</h2>

    <table>

        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>

            @forelse($incomes as $income)

                <tr>

                    <td>
                        {{ $income->income_date->format('d M Y') }}
                    </td>

                    <td>
                        Income
                    </td>

                    <td>
                        {{ $income->description ?: $income->source }}
                    </td>

                    <td>
                        Rs. {{ number_format($income->amount, 2) }}
                    </td>

                </tr>

            @empty

            @endforelse


            @forelse($expenses as $expense)

                <tr>

                    <td>
                        {{ $expense->expense_date->format('d M Y') }}
                    </td>

                    <td>
                        Expense
                    </td>

                    <td>
                        {{ $expense->description }}
                    </td>

                    <td>
                        Rs. {{ number_format($expense->amount, 2) }}
                    </td>

                </tr>

            @empty

            @endforelse

        </tbody>

    </table>


    <!-- Print Button -->
    <div class="print-section">

        <button
            type="button"
            class="print-btn"
            onclick="window.print();"
        >
            🖨️ Print / Save as PDF
        </button>

    </div>


</body>

</html>