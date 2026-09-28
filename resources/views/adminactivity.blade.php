<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Coin - Activity</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f5f8fc;
            color: #26384a;
        }

        /* NAVBAR */

        .navbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e4eaf1;

            position: fixed;
            left: 245px;
            right: 0;
            top: 0;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;
        }

        .brand {
            color: #0d3b66;
            font-size: 24px;
            font-weight: bold;
        }

        .brand span {
            color: #2696d2;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .online {
            color: #687789;
            font-size: 12px;
        }

        .online-dot {
            display: inline-block;

            width: 8px;
            height: 8px;

            background: #20a464;

            border-radius: 50%;

            margin-right: 5px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .admin-avatar {
            width: 36px;
            height: 36px;

            border-radius: 50%;

            background: #eaf4fb;
            color: #176ca7;

            display: flex;
            justify-content: center;
            align-items: center;

            font-weight: bold;
        }

        .admin-name {
            font-size: 12px;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 245px;
            height: 100vh;

            background: #0d3b66;

            color: white;

            padding: 25px 18px;
        }

        .sidebar-logo {
            font-size: 25px;
            font-weight: bold;

            padding: 0 15px 35px;
        }

        .sidebar-logo span {
            color: #43b3f2;
        }

        .menu-title {
            color: #91a8be;

            font-size: 11px;

            text-transform: uppercase;

            padding: 0 15px;

            margin-bottom: 10px;
        }

        .menu a {
            display: flex;

            align-items: center;

            gap: 10px;

            text-decoration: none;

            color: #dbe8f4;

            padding: 13px 15px;

            margin: 5px 0;

            border-radius: 7px;

            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #14558e;
            color: white;
        }

        .menu-icon {
            width: 25px;
            text-align: center;
        }

        .sidebar-bottom {
            position: absolute;

            left: 18px;
            right: 18px;

            bottom: 25px;
        }

        .profile {
            border-top: 1px solid #28577e;

            padding-top: 18px;

            display: flex;

            align-items: center;

            gap: 10px;
        }

        .profile-circle {
            width: 38px;
            height: 38px;

            background: white;
            color: #0d3b66;

            border-radius: 50%;

            display: flex;

            justify-content: center;
            align-items: center;

            font-weight: bold;
        }

        .profile strong {
            display: block;
            font-size: 13px;
        }

        .profile small {
            color: #a9bfd2;
            font-size: 11px;
        }

        /* MAIN */

        .main {
            margin-left: 245px;

            padding-top: 70px;

            min-height: 100vh;
        }

        .content {
            padding: 30px 35px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #173f65;

            font-size: 27px;
        }

        .heading p {
            color: #7a8998;

            font-size: 13px;

            margin-top: 6px;
        }

        /* PANEL */

        .panel {
            background: white;

            border: 1px solid #e4eaf1;

            border-radius: 10px;

            overflow: hidden;
        }

        .panel-header {
            padding: 20px;

            border-bottom: 1px solid #e7edf3;
        }

        .panel-header h3 {
            color: #173f65;

            font-size: 17px;
        }

        .panel-header p {
            color: #8a98a8;

            font-size: 12px;

            margin-top: 5px;
        }

        /* ACTIVITY */

        .activity {
            padding: 0;
        }

        .activity-item {
            display: flex;

            align-items: flex-start;

            gap: 18px;

            padding: 20px;

            border-bottom: 1px solid #edf1f5;
        }

        .activity-icon {
            width: 42px;
            height: 42px;

            border-radius: 8px;

            background: #edf6fd;

            color: #176ca7;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: bold;
        }

        .activity-info {
            flex: 1;
        }

        .activity-title {
            color: #294c69;

            font-weight: bold;

            font-size: 13px;
        }

        .activity-description {
            color: #7b8998;

            font-size: 12px;

            margin-top: 5px;
        }

        .activity-time {
            color: #9aa6b3;

            font-size: 11px;
        }

        /* STATUS */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: bold;
        }

        .completed {
            background: #e8f7f0;
            color: #198754;
        }

        .status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: currentColor;
        }

        /* FOOTER */

        .footer {
            text-align: center;

            padding: 25px;

            color: #8a98a8;

            font-size: 11px;
        }

        @media(max-width: 800px) {

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;
            }

            .navbar {
                position: relative;

                left: 0;
            }

            .main {
                margin-left: 0;

                padding-top: 0;
            }

            .sidebar-bottom {
                display: none;
            }

        }

        /* ================= MOBILE / BROWSER FRIENDLY OVERRIDES ================= */

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
        .activity-item,
        .activity-info {
            min-width: 0;
        }

        .activity-description,
        .activity-title,
        .activity-time {
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        /* Tablets and smaller laptops */
        @media (max-width: 1100px) {
            .navbar {
                padding-left: 22px;
                padding-right: 22px;
            }

            .content {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        /* Phones and small tablets */
        @media (max-width: 800px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: 0;
                padding: 18px 14px;
            }

            .sidebar-logo {
                padding: 0 10px 18px;
            }

            .menu-title {
                padding: 0 10px;
            }

            .menu {
                display: flex;
                gap: 6px;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                padding-bottom: 4px;
            }

            .menu a {
                flex: 0 0 auto;
                margin: 2px 0;
                min-height: 44px;
                white-space: nowrap;
            }

            .navbar {
                position: relative;
                left: 0;
                right: auto;
                width: 100%;
                height: auto;
                min-height: 64px;
                padding: 12px 18px;
                gap: 12px;
            }

            .brand {
                font-size: 21px;
                min-width: 0;
            }

            .nav-right {
                gap: 10px;
                min-width: 0;
            }

            .online {
                white-space: nowrap;
            }

            .admin {
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
                padding: 22px 18px;
            }

            .heading h1 {
                font-size: 24px;
            }

            .activity-item {
                align-items: flex-start;
                gap: 12px;
                padding: 16px;
            }

            .activity-icon {
                flex: 0 0 42px;
            }

            .activity-item>div:last-child {
                flex: 0 0 auto;
                text-align: right;
            }
        }

        /* Small phones */
        @media (max-width: 560px) {
            .sidebar {
                padding: 14px 10px;
            }

            .sidebar-logo {
                font-size: 22px;
                padding-bottom: 14px;
            }

            .menu a {
                padding: 11px 12px;
                font-size: 13px;
            }

            .navbar {
                padding: 10px 14px;
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .brand {
                font-size: 20px;
            }

            .nav-right {
                width: 100%;
                justify-content: space-between;
                gap: 8px;
            }

            .online {
                font-size: 11px;
            }

            .admin {
                gap: 6px;
            }

            .admin-avatar {
                width: 32px;
                height: 32px;
            }

            .admin-name {
                font-size: 11px;
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

            .heading p {
                font-size: 12px;
                line-height: 1.5;
            }

            .panel-header {
                padding: 16px;
            }

            .panel-header h3 {
                font-size: 16px;
            }

            .activity-item {
                display: grid;
                grid-template-columns: 38px minmax(0, 1fr);
                gap: 10px;
                padding: 14px;
            }

            .activity-icon {
                width: 38px;
                height: 38px;
            }

            .activity-item>div:last-child {
                grid-column: 2;
                text-align: left;
                margin-top: 2px;
            }

            .activity-description {
                line-height: 1.5;
            }

            .footer {
                padding: 18px 12px;
            }
        }

        /* Very small phones */
        @media (max-width: 380px) {
            .brand {
                font-size: 18px;
            }

            .admin-name {
                display: none;
            }

            .online {
                font-size: 10px;
            }

            .content {
                padding-left: 10px;
                padding-right: 10px;
            }

            .activity-item {
                padding: 12px;
            }
        }

        /* Avoid animation/motion problems for users who request reduced motion. */
        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
                animation: none !important;
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
            <a href="{{ route('admin.expenses') }}"><span class="menu-icon">▤</span>Expenses</a>
            <a href="{{ route('admin.activity') }}" class="active" class="active"><span
                    class="menu-icon">◴</span>Activity</a>
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
                <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit"
                        style="border:0;background:none;color:#176ca7;cursor:pointer;">Logout</button></form>
            </div>
        </div>
    </nav>
    <main class="main">
        <section class="content">
            <div class="heading">
                <h1>System Activity</h1>
                <p>Recent registered users and financial activity from the database.</p>
            </div>
            <div class="panel">
                <div class="panel-header">
                    <h3>Recent Activity</h3>
                    <p>Latest records generated by the Campus Coin system.</p>
                </div>
                <div class="activity">
                    @foreach ($recentExpenses as $expense)
                    <div class="activity-item">
                        <div class="activity-icon">+</div>
                        <div class="activity-info">
                            <div class="activity-title">New Expense Added</div>
                            <div class="activity-description">{{ $expense->user->name }} added {{ $expense->category }}
                                expense of Rs. {{ number_format($expense->amount, 2) }} ({{ $expense->description }}).
                            </div>
                        </div>
                        <div>
                            <div class="activity-time">{{ $expense->created_at->diffForHumans() }}</div><br><span
                                class="status completed"><span class="status-dot"></span>Completed</span>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($recentUsers as $user)
                    <div class="activity-item">
                        <div class="activity-icon">U</div>
                        <div class="activity-info">
                            <div class="activity-title">User Registered</div>
                            <div class="activity-description">{{ $user->name }} ({{ $user->email }}) created a Campus
                                Coin account.</div>
                        </div>
                        <div>
                            <div class="activity-time">{{ $user->created_at->diffForHumans() }}</div><br><span
                                class="status completed"><span class="status-dot"></span>Completed</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <footer class="footer">Campus Coin Administration Panel | © 2026 All Rights Reserved</footer>
    </main>
</body>

</html>