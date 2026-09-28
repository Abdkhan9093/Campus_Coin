<header class="navbar">

    <div class="logo">
        <a href="{{ route('user.home') }}">

            <i
                class="fa-solid fa-wallet"
                style="color: #ffffff;"
            ></i>

            <span>CampusCoin</span>

        </a>
    </div>


    <nav>
        <a href="{{ route('user.home') }}">Home</a>
        <a href="{{ route('income') }}">Income</a>
        <a href="{{ route('expenses') }}">Expenses</a>
        <a href="{{ route('history') }}">History</a>
        <a href="{{ route('budgets') }}">Budgets</a>
        <a href="{{ route('reports') }}">Reports</a>
        <a href="{{ route('categories') }}">Categories</a>
        <a href="{{ route('profile.simple') }}">Profile</a>
    </nav>


    <div class="nav-user">

        <span>
            {{ auth()->user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                type="submit"
                class="nav-logout"
            >
                Logout
            </button>

        </form>

    </div>

</header>