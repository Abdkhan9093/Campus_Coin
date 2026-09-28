<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Campus Coin - Users</title>

<style>

html {
    -webkit-text-size-adjust: 100%;
    text-size-adjust: 100%;
}

body {
    overflow-x: hidden;
}

/* TABLET / SMALL LAPTOP */

@media (max-width: 1000px) {

    .navbar {
        left: 0;
        padding: 0 20px;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        padding: 18px;
    }

    .sidebar-logo {
        padding: 0 10px 18px;
    }

    .menu-title {
        padding: 0 10px;
    }

    .menu {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .menu a {
        margin: 0;
    }

    .sidebar-bottom {
        display: none;
    }

    .main {
        margin-left: 0;
        padding-top: 0;
    }

    .content {
        padding: 25px 20px;
    }

    .panel-header {
        gap: 15px;
    }

    .search {
        width: 230px;
    }

}


/* MOBILE */

@media (max-width: 700px) {

    .navbar {
        min-height: 70px;
        height: auto;
        padding: 12px 15px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .brand {
        font-size: 21px;
    }

    .nav-right {
        gap: 10px;
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

    .sidebar {
        padding: 15px;
    }

    .sidebar-logo {
        font-size: 22px;
        padding-bottom: 15px;
    }

    .menu {
        display: flex;
        flex-wrap: wrap;
    }

    .menu a {
        flex: 1 1 auto;
        justify-content: center;
        padding: 10px 12px;
        font-size: 12px;
    }

    .menu-icon {
        width: auto;
    }

    .content {
        padding: 20px 12px;
    }

    .heading {
        margin-bottom: 18px;
    }

    .heading h1 {
        font-size: 23px;
    }

    .heading p {
        font-size: 12px;
    }

    .panel-header {
        flex-direction: column;
        align-items: stretch;
        padding: 15px;
    }

    .panel-header h3 {
        font-size: 16px;
    }

    .search {
        width: 100%;
        margin-top: 10px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table {
        min-width: 850px;
    }

    th,
    td {
        padding: 12px 14px;
        white-space: nowrap;
    }

    .user-email {
        white-space: normal;
    }

    button {
        padding: 7px 10px;
    }

    .footer {
        padding: 20px 10px;
        font-size: 10px;
    }

}


/* SMALL PHONES */

@media (max-width: 450px) {

    .menu a {
        flex: 1 1 45%;
    }

    .content {
        padding: 18px 10px;
    }

    .heading h1 {
        font-size: 21px;
    }

    .panel-header {
        padding: 13px;
    }

    .panel-header h3 {
        font-size: 15px;
    }

    .panel-header p {
        font-size: 11px;
    }

    th,
    td {
        padding: 10px 12px;
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

        <a href="{{ route('admin.dashboard') }}" class="active">
            <span class="menu-icon">▦</span>
            Dashboard
        </a>

        <a href="{{ route('admin.users') }}" class="active">
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

        </div>

    </div>

</nav>


<!-- MAIN -->

<main class="main">

<section class="content">


@if(session('success'))<div style="color:#198754;margin-bottom:15px;">{{ session('success') }}</div>@endif
<div class="heading">

    <h1>
        User Management
    </h1>

    <p>
        Manage registered users and their account status.
    </p>

</div>


<div class="panel">


<div class="panel-header">

    <div>

        <h3>
            Registered Users
        </h3>

        <p>
            View, block, unblock or delete user accounts.
        </p>

    </div>

    <input
        type="text"
        class="search"
        placeholder="Search user..."
        onkeyup="searchUsers()"
        id="search"
    >

</div>


<div class="table-wrapper">

<table id="usersTable">

<thead>

<tr>

<th>
#
</th>

<th>
User
</th>

<th>
Budget
</th>

<th>
Spent
</th>

<th>
Remaining
</th>

<th>
Status
</th>

<th>
Account Control
</th>

</tr>

</thead>


<tbody>
@forelse ($users as $user)
<tr>
<td>{{ $loop->iteration }}</td>
<td>
<div class="user-name">{{ $user->name }}</div>
<div class="user-email">{{ $user->email }}</div>
</td>
<td>Rs. {{ number_format($user->budget_amount, 2) }}</td>
<td>Rs. {{ number_format($user->expenses->sum('amount'), 2) }}</td>
<td>Rs. {{ number_format($user->budget_amount - $user->expenses->sum('amount'), 2) }}</td>
<td>
<span class="status {{ $user->status }}">
<span class="dot"></span>{{ ucfirst($user->status) }}
</span>
</td>
<td>
<form method="POST" action="{{ route('admin.users.status', $user) }}" style="display:inline;">
@csrf
@method('PATCH')
<button type="submit" class="{{ $user->status === 'active' ? 'block' : 'unblock' }}">
{{ $user->status === 'active' ? 'Block' : 'Unblock' }}
</button>
</form>
<form method="POST" action="{{ route('admin.users.delete', $user) }}" style="display:inline;" onsubmit="return confirm('Delete this user and all expenses?');">
@csrf
@method('DELETE')
<button type="submit" class="delete">Delete</button>
</form>
</td>
</tr>
@empty
<tr><td colspan="7">No registered users.</td></tr>
@endforelse
</tbody>

</table>

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

function blockUser(button) {

    if (!confirm("Are you sure you want to block this user?")) {
        return;
    }

    const row = button.closest("tr");

    const status = row.querySelector(".status");

    status.className = "status inactive";

    status.innerHTML =
        '<span class="dot"></span> Inactive';

    button.className = "unblock";

    button.innerText = "Unblock";

    button.onclick = function() {
        unblockUser(this);
    };

}


function unblockUser(button) {

    if (!confirm("Do you want to unblock this user?")) {
        return;
    }

    const row = button.closest("tr");

    const status = row.querySelector(".status");

    status.className = "status active";

    status.innerHTML =
        '<span class="dot"></span> Active';

    button.className = "block";

    button.innerText = "Block";

    button.onclick = function() {
        blockUser(this);
    };

}


function deleteUser(button) {

    if (!confirm(
        "Are you sure you want to delete this user?"
    )) {
        return;
    }

    const row = button.closest("tr");

    row.remove();

}


function searchUsers() {

    const search =
        document
        .getElementById("search")
        .value
        .toLowerCase();

    const rows =
        document.querySelectorAll(
            "#usersTable tbody tr"
        );

    rows.forEach(function(row) {

        const text =
            row.innerText.toLowerCase();

        if (text.includes(search)) {

            row.style.display = "";

        } else {

            row.style.display = "none";

        }

    });

}

</script>


</body>
</html>