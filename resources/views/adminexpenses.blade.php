<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Coin - Expenses</title>

    <style>
  /* =========================
   RESPONSIVE / BROWSER SAFE OVERRIDES
   CSS ONLY - NO HTML/ROUTE/CONTENT CHANGES
========================= */

html {
    -webkit-text-size-adjust: 100%;
    text-size-adjust: 100%;
}

body {
    overflow-x: hidden;
}

img,
svg,
video,
canvas {
    max-width: 100%;
    height: auto;
}

button,
input,
select,
textarea {
    font: inherit;
    max-width: 100%;
}

.panel,
.summary-card,
.panel-header,
.user-info,
.info-box {
    min-width: 0;
}

.search-box {
    box-sizing: border-box;
}

/* Tablet */
@media (max-width: 1000px) {
    .navbar {
        padding-left: 20px;
        padding-right: 20px;
    }

    .content {
        padding-left: 25px;
        padding-right: 25px;
    }

    .summary-cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .user-info {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* Mobile */
@media (max-width: 800px) {
    .sidebar {
        position: relative;
        top: auto;
        left: auto;
        width: 100%;
        height: auto;
        min-height: 0;
        padding: 18px 12px;
    }

    .sidebar-logo {
        padding: 0 10px 18px;
        font-size: 22px;
    }

    .menu-title {
        padding: 0 10px;
    }

    .menu {
        display: flex;
        width: 100%;
        gap: 6px;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
        padding-bottom: 3px;
    }

    .menu a {
        flex: 0 0 auto;
        margin: 2px 0;
        white-space: nowrap;
        padding: 11px 12px;
    }

    .sidebar-bottom {
        display: none;
    }

    .navbar {
        position: relative;
        top: auto;
        left: auto;
        right: auto;
        width: 100%;
        min-height: 60px;
        height: auto;
        padding: 12px 15px;
        gap: 12px;
    }

    .brand {
        font-size: 21px;
        white-space: nowrap;
    }

    .nav-right {
        gap: 10px;
        min-width: 0;
    }

    .admin {
        gap: 6px;
        min-width: 0;
    }

    .admin-name {
        white-space: nowrap;
    }

    .main {
        margin-left: 0;
        padding-top: 0;
        width: 100%;
    }

    .content {
        width: 100%;
        padding: 22px 15px;
    }

    .heading h1 {
        font-size: 24px;
    }

    .heading p {
        line-height: 1.5;
    }

    .summary-cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .summary-card {
        padding: 16px;
    }

    .summary-card-value {
        font-size: 19px;
        overflow-wrap: anywhere;
    }

    .panel-header {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
        padding: 16px;
    }

    .panel-header h3 {
        font-size: 16px;
    }

    .search-box {
        width: 100%;
        min-height: 40px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
    }

    .expense-table {
        min-width: 700px;
    }

    .expense-table th,
    .expense-table td {
        white-space: nowrap;
    }

    .expense-table td:nth-child(5) {
        white-space: normal;
        min-width: 180px;
        max-width: 260px;
        overflow-wrap: anywhere;
    }

    .footer {
        padding: 20px 15px;
        line-height: 1.5;
    }

    .modal {
        padding: 20px 10px;
    }

    .modal-box {
        width: 100%;
        max-width: 100%;
    }

    .modal-header {
        padding: 16px;
    }

    .user-info {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        padding: 15px;
        gap: 10px;
    }

    .info-box {
        padding: 12px;
    }

    .modal-content {
        padding: 15px;
        overflow-x: auto;
    }

    .modal-table {
        min-width: 600px;
    }
}

/* Small phones */
@media (max-width: 600px) {
    .navbar {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .brand {
        font-size: 20px;
    }

    .nav-right {
        margin-left: auto;
    }

    .admin-name {
        display: none;
    }

    .admin-avatar {
        width: 34px;
        height: 34px;
    }

    .summary-cards {
        grid-template-columns: 1fr;
    }

    .content {
        padding: 18px 12px;
    }

    .heading {
        margin-bottom: 18px;
    }

    .heading h1 {
        font-size: 22px;
        line-height: 1.25;
    }

    .summary-card {
        padding: 15px;
    }

    .user-info {
        grid-template-columns: 1fr;
    }

    .modal-header h2 {
        font-size: 16px;
    }
}

/* Very small phones */
@media (max-width: 380px) {
    .navbar {
        padding: 10px 12px;
    }

    .brand {
        font-size: 18px;
    }

    .nav-right {
        gap: 6px;
    }

    .content {
        padding-left: 10px;
        padding-right: 10px;
    }

    .menu a {
        font-size: 13px;
        padding: 10px;
    }

    .menu-icon {
        width: 21px;
    }
}

/* Respect users who prefer reduced motion */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        scroll-behavior: auto !important;
        transition-duration: 0.01ms !important;
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
    }
}
    </style>

</head>


<body>
    <aside class="sidebar">
        <div class="sidebar-logo">Campus <span>Coin</span></div>
        <div class="menu-title">Administration</div>
        <div class="menu">
            <a href="{{ route('admin.dashboard') }}"><span class="menu-icon">▦</span>Dashboard</a>
            <a href="{{ route('admin.users') }}"><span class="menu-icon">◉</span>Users</a>
            <a href="{{ route('admin.expenses') }}" class="active" class="active"><span
                    class="menu-icon">▤</span>Expenses</a>
            <a href="{{ route('admin.activity') }}"><span class="menu-icon">◴</span>Activity</a>
            <a href="{{ route('admin.settings') }}"><span class="menu-icon">⚙</span>Settings</a>
        </div>
        <div class="sidebar-bottom">
            <div class="profile">
                <div class="profile-circle">A</div>
                <div><strong>Administrator</strong><small>System Admin</small></div>
            </div>
        </div>
    </aside>

    <nav class="navbar">
        <div class="brand">Campus <span>Coin</span></div>
        <div class="nav-right">
            <div class="online"><span class="online-dot"></span>System Online</div>
            <div class="admin">
                <div class="admin-avatar">A</div>
                <div class="admin-name">Administrator</div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        style="border:0;background:none;color:#176ca7;cursor:pointer;font-size:12px;">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="main">
        <section class="content">
            <div class="heading">
                <h1>All User Expenses</h1>
                <p>Every expense entered by registered users is stored in the database and visible here.</p>
            </div>

            <div class="summary-cards">
                <div class="summary-card">
                    <div class="summary-card-title">Total Budget</div>
                    <div class="summary-card-value">Rs. {{ number_format($totalBudget, 2) }}</div>
                </div>
                <div class="summary-card">
                    <div class="summary-card-title">Total Spent</div>
                    <div class="summary-card-value">Rs. {{ number_format($totalSpent, 2) }}</div>
                </div>
                <div class="summary-card">
                    <div class="summary-card-title">Remaining</div>
                    <div class="summary-card-value">Rs. {{ number_format($totalBudget - $totalSpent, 2) }}</div>
                </div>
                <div class="summary-card">
                    <div class="summary-card-title">Expense Records</div>
                    <div class="summary-card-value">{{ $expenses->count() }}</div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-header">
                    <div>
                        <h3>Expense Records</h3>
                        <p>Real-time records from the user database.</p>
                    </div>
                    <input class="search-box" type="text" id="searchInput" placeholder="Search user/category..."
                        onkeyup="searchExpenses()">
                </div>

                <div class="table-wrapper">
                    <table class="expense-table" id="expenseTable">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($expenses as $expense)
                                <tr>
                                    <td>
                                        <div class="user-name">{{ $expense->user->name }}</div>
                                    </td>
                                    <td>
                                        <div class="user-email">{{ $expense->user->email }}</div>
                                    </td>
                                    <td>{{ $expense->expense_date->format('d M Y') }}</td>
                                    <td><span class="category">{{ $expense->category }}</span></td>
                                    <td>{{ $expense->description }}</td>
                                    <td class="amount">Rs. {{ number_format($expense->amount, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align:center;">No expenses have been added yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <footer class="footer">Campus Coin Administration Panel | © 2026 All Rights Reserved</footer>
    </main>

    <script>
        function searchExpenses() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            document.querySelectorAll('#expenseTable tbody tr').forEach(function (row) {
                row.style.display = row.innerText.toLowerCase().includes(input) ? '' : 'none';
            });
        }
    </script>
</body>

</html>