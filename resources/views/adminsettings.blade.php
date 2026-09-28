<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Coin - Settings</title>

    <style>
        html {
    -webkit-text-size-adjust: 100%;
    text-size-adjust: 100%;
}

body {
    overflow-x: hidden;
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

    .settings-body {
        padding: 20px;
    }

}

/* Mobile */
@media (max-width: 800px) {

    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
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
        gap: 5px;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
    }

    .menu a {
        flex: 0 0 auto;
        white-space: nowrap;
        margin: 2px 0;
        padding: 11px 12px;
    }

    .sidebar-bottom {
        display: none;
    }

    .navbar {
        position: relative;
        left: 0;
        right: auto;
        width: 100%;
        height: auto;
        min-height: 60px;
        padding: 12px 15px;
        gap: 10px;
    }

    .brand {
        font-size: 21px;
    }

    .nav-right {
        gap: 10px;
        min-width: 0;
    }

    .admin {
        min-width: 0;
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

    .panel {
        width: 100%;
    }

    .settings-body {
        padding: 20px;
    }

    .form-group {
        width: 100%;
        max-width: 100%;
    }

    .form-control {
        width: 100%;
        min-height: 40px;
    }

    textarea.form-control {
        min-height: 100px;
    }

    .security-item {
        padding: 16px 20px;
        gap: 15px;
    }

    .security-description {
        line-height: 1.5;
    }

    .footer {
        padding: 20px 15px;
        line-height: 1.5;
    }
}

/* Small phones */
@media (max-width: 600px) {

    .navbar {
        flex-wrap: wrap;
        align-items: center;
    }

    .brand {
        font-size: 20px;
    }

    .nav-right {
        margin-left: auto;
    }

    .online {
        display: none;
    }

    .admin-name {
        display: none;
    }

    .admin-avatar {
        width: 34px;
        height: 34px;
    }

    .content {
        padding: 18px 12px;
    }

    .heading {
        margin-bottom: 18px;
    }

    .heading h1 {
        font-size: 22px;
        line-height: 1.3;
    }

    .settings-body {
        padding: 16px;
    }

    .panel-header {
        padding: 16px;
    }

    .panel-header h3 {
        font-size: 16px;
    }

    .panel-header p {
        line-height: 1.5;
    }

    .security-item {
        align-items: flex-start;
    }

    .security-title {
        line-height: 1.4;
    }

    .toggle {
        flex-shrink: 0;
    }

    .save-btn {
        width: 100%;
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

    .content {
        padding-left: 10px;
        padding-right: 10px;
    }

    .menu a {
        font-size: 13px;
        padding: 10px;
    }

    .settings-body {
        padding: 14px;
    }

    .security-item {
        padding: 14px;
    }
}
    </style>

</head>


<body>


    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-logo">
            Campus <span>Coin</span>
        </div>

        <div class="menu-title">
            Administration
        </div>

        <div class="menu">

            <a href="{{ route('admin.dashboard') }}">
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

            <a href="{{ route('admin.settings') }}" class="active" class="active">
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

                    <strong>
                        Administrator
                    </strong>

                    <small>
                        System Admin
                    </small>

                </div>

            </div>

        </div>

    </aside>


    <!-- NAVBAR -->

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


    <!-- MAIN -->

    <main class="main">

        <section class="content">


            <div class="heading">

                <h1>
                    Admin Settings
                </h1>

                <p>
                    Manage Campus Coin application and administration settings.
                </p>

            </div>


            <!-- GENERAL SETTINGS -->

            <div class="panel">


                <div class="panel-header">

                    <h3>
                        General Settings
                    </h3>

                    <p>
                        Basic application configuration.
                    </p>

                </div>


                <div class="settings-body">


                    <div class="form-group">

                        <label>
                            Application Name
                        </label>

                        <input type="text" class="form-control" value="Campus Coin">

                    </div>


                    <div class="form-group">

                        <label>
                            Admin Name
                        </label>

                        <input type="text" class="form-control" value="Administrator">

                    </div>


                    <div class="form-group">

                        <label>
                            Admin Email
                        </label>

                        <input type="email" class="form-control" value="admin@campuscoin.com">

                    </div>


                    <div class="form-group">

                        <label>
                            Currency
                        </label>

                        <select class="form-control">

                            <option>
                                Pakistani Rupee (PKR)
                            </option>

                            <option>
                                US Dollar (USD)
                            </option>

                            <option>
                                Euro (EUR)
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Application Description
                        </label>

                        <textarea
                            class="form-control">Campus Coin is a personal budget and expense management system.</textarea>

                    </div>


                    <button class="save-btn" onclick="saveSettings()">
                        Save Settings
                    </button>


                </div>

            </div>


            <!-- SECURITY -->

            <div class="panel">


                <div class="panel-header">

                    <h3>
                        Security Settings
                    </h3>

                    <p>
                        Manage system security preferences.
                    </p>

                </div>


                <div class="security-item">

                    <div>

                        <div class="security-title">
                            Admin Authentication
                        </div>

                        <div class="security-description">
                            Require authentication before accessing admin pages.
                        </div>

                    </div>

                    <div class="toggle"></div>

                </div>


                <div class="security-item">

                    <div>

                        <div class="security-title">
                            Account Protection
                        </div>

                        <div class="security-description">
                            Protect administrative account from unauthorized access.
                        </div>

                    </div>

                    <div class="toggle"></div>

                </div>


                <div class="security-item">

                    <div>

                        <div class="security-title">
                            Activity Monitoring
                        </div>

                        <div class="security-description">
                            Record important activities performed in the system.
                        </div>

                    </div>

                    <div class="toggle"></div>

                </div>


            </div>


        </section>


        <footer class="footer">

            Campus Coin Administration Panel
            |
            © 2026 All Rights Reserved

        </footer>

    </main>


    <script>

        function saveSettings() {

            alert(
                "Settings saved successfully."
            );

        }

    </script>


</body>

</html>