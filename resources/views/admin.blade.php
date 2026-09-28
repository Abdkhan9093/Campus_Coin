<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Coin - Dashboard</title>

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

        /* ================= NAVBAR ================= */

        .navbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid #e4eaf1;

            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 0 30px;

            position: fixed;
            top: 0;
            left: 245px;
            right: 0;

            z-index: 1000;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #0d3b66;
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
            font-size: 12px;
            color: #687789;
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
            gap: 9px;
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
            color: #263f58;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 245px;
            height: 100vh;

            background: #0d3b66;
            color: white;

            padding: 25px 18px;

            z-index: 1100;
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
            font-size: 11px;
            color: #91a8be;

            text-transform: uppercase;
            letter-spacing: 1px;

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

            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #14558e;
            color: white;
        }

        .menu-icon {
            width: 25px;
            text-align: center;
            font-weight: bold;
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

        /* ================= MAIN ================= */

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

        /* ================= CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .card {
            background: white;
            border: 1px solid #e4eaf1;
            border-radius: 10px;
            padding: 22px;
        }

        .card-title {
            color: #718096;
            font-size: 11px;
            text-transform: uppercase;
        }

        .card h2 {
            color: #173f65;
            font-size: 27px;
            margin-top: 12px;
        }

        .card p {
            color: #8a98a8;
            font-size: 11px;
            margin-top: 7px;
        }

        /* ================= PANEL ================= */

        .panel {
            background: white;
            border: 1px solid #e4eaf1;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 25px;
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

        /* ================= TABLE ================= */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #738296;
            padding: 13px 20px;

            text-align: left;

            font-size: 10px;
            text-transform: uppercase;

            border-bottom: 1px solid #e6edf3;
        }

        td {
            padding: 15px 20px;
            border-bottom: 1px solid #edf1f5;
            font-size: 13px;
        }

        /* ================= STATUS ================= */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: bold;
        }

        .active {
            background: #e8f7f0;
            color: #198754;
        }

        .inactive {
            background: #fceced;
            color: #c43d4b;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /*FOOTER*/

        .footer {
            text-align: center;
            padding: 25px;

            color: #8a98a8;
            font-size: 11px;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 1100px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media(max-width: 800px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .sidebar-bottom {
                display: none;
            }

            .navbar {
                position: relative;
                left: 0;
            }

            .main {
                margin-left: 0;
                padding-top: 0;
            }

        }

        @media(max-width: 600px) {

            .cards {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 20px;
            }

            .nav-right {
                display: none;
            }

        }
    </style>
</head>


<body>


    <aside class="sidebar">

        <div class="sidebar-logo">
            Campus <span>Coin</span>
        </div>

        <div class="menu-title">
            Administration
        </div>

        <div class="menu">

            <a href="{{ route('admin.dashboard') }}" class="active" class="active">
                <span class="menu-icon">▦</span>
                Dashboard
            </a>

            <a href="{{ route('admin.users') }}">
                <span class="menu-icon">◉</span>
                Users
            </a>

            <a href="{{ route('admin.expenses') }}">
                <span class="menu-icon">▤</span>
                Expenses
            </a>

            <a href="{{ route('admin.activity') }}">
                <span class="menu-icon">◴</span>
                Activity
            </a>

            <a href="{{ route('admin.settings') }}">
                <span class="menu-icon">⚙</span>
                Settings
            </a>

        </div>

        <div class="sidebar-bottom">

            <div class="profile">

                <div class="profile-circle">
                    A
                </div>

                <div>

                    <strong>Administrator</strong>

                    <small>System Admin</small>

                </div>

            </div>

        </div>

    </aside>



    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <div class="brand">
            Campus <span>Coin</span>
        </div>

        <div class="nav-right">

            <div class="online">
                <span class="online-dot"></span>
                System Online
            </div>

            <div class="admin">

                <div class="admin-avatar">
                    A
                </div>

                <div class="admin-name">
                    Administrator
                </div>

                <form method="POST" action="{{ route('admin.logout') }}" style="margin-left:12px;">
                    @csrf
                    <button type="submit"
                        style="border:0;background:none;color:#176ca7;cursor:pointer;font-size:12px;">Logout</button>
                </form>

            </div>

        </div>

    </nav>



    <!-- ================= MAIN ================= -->

    <main class="main">

        <section class="content">


            <div class="heading">

                <h1>
                    Dashboard Overview
                </h1>

                <p>
                    Monitor your Campus Coin system and financial activity.
                </p>

            </div>



            <!-- STATISTICS -->

            <div class="cards">


                <div class="card">

                    <div class="card-title">
                        Total Users
                    </div>

                    <h2>
                        {{ $totalUsers }}
                    </h2>

                    <p>
                        Registered accounts
                    </p>

                </div>


                <div class="card">

                    <div class="card-title">
                        Active Users
                    </div>

                    <h2>
                        {{ $activeUsers }}
                    </h2>

                    <p>
                        Currently active users
                    </p>

                </div>


                <div class="card">

                    <div class="card-title">
                        Inactive Users
                    </div>

                    <h2>
                        {{ $inactiveUsers }}
                    </h2>

                    <p>
                        Blocked accounts
                    </p>

                </div>


                <div class="card">

                    <div class="card-title">
                        Total Expenses
                    </div>

                    <h2>
                        Rs. {{ number_format($totalSpent, 2) }}
                    </h2>

                    <p>
                        Total recorded expenses
                    </p>

                </div>


            </div>



            <!-- RECENT USERS -->

            <div class="panel">

                <div class="panel-header">

                    <h3>
                        Recent Users
                    </h3>

                    <p>
                        Latest registered users in the system.
                    </p>

                </div>


                <table>

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Budget</th>
                            <th>Status</th>
                        </tr>

                    </thead>


                    <tbody>
                        @forelse ($users->take(10) as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>Rs. {{ number_format($user->budget_amount, 2) }}</td>
                                <td>
                                    <span class="status {{ $user->status }}">
                                        <span class="dot"></span>
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No users registered yet.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>


        </section>


        <footer class="footer">

            Campus Coin Administration Panel
            |
            © 2026 All Rights Reserved

        </footer>

    </main>


</body>

</html>