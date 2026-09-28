<x-guest-layout>

<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6fb;
    }

    .login-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
        background:
            radial-gradient(circle at top left, #e8ddff 0%, transparent 35%),
            radial-gradient(circle at bottom right, #dce8ff 0%, transparent 35%),
            #f6f7fb;
    }

    .login-card {
        width: 100%;
        max-width: 430px;
        background: #ffffff;
        border-radius: 24px;
        padding: 45px 40px;
        box-shadow: 0 20px 60px rgba(31, 41, 55, 0.12);
    }

    .brand {
        text-align: center;
        margin-bottom: 30px;
    }

    .brand-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 18px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0b5ed7, #073b8f);
        color: white;
        font-size: 28px;
        font-weight: bold;
        box-shadow: 0 10px 25px rgba(109, 93, 252, 0.25);
    }

    .brand h1 {
        margin: 0;
        font-size: 28px;
        color: #1f2937;
    }

    .brand p {
        margin-top: 8px;
        color: #9ca3af;
        font-size: 14px;
    }

    .error-box {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        border-radius: 12px;
        padding: 12px 15px;
        margin-bottom: 20px;
    }

    .field {
        margin-bottom: 20px;
    }

    .field label {
        display: block;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
    }

    .field input {
        width: 100%;
        box-sizing: border-box;
        padding: 14px 16px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        background: #f9fafb;
        color: #1f2937;
        font-size: 15px;
        outline: none;
        transition: 0.25s;
    }

    .field input:focus {
        background: #ffffff;
        border-color: #0b5ed7;
        box-shadow: 0 0 0 4px rgba(124, 108, 246, 0.10);
    }

    .options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 5px 0 25px;
    }

    .remember {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #6b7280;
        font-size: 13px;
    }

    .remember input {
        accent-color: #0b5ed7;
    }

    .forgot {
        color: #0b5ed7;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .forgot:hover {
        text-decoration: underline;
    }

    .login-button {
        width: 100%;
        border: none;
        border-radius: 12px;
        padding: 14px;
        background: linear-gradient(135deg, #0b5ed7, #073b8f);
        color: white;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(109, 93, 252, 0.25);
        transition: 0.25s;
    }

    .login-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(109, 93, 252, 0.30);
    }

    .register {
        text-align: center;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #f0f0f0;
        color: #9ca3af;
        font-size: 14px;
    }

    .register a {
        color: #0b5ed7;
        font-weight: 700;
        text-decoration: none;
    }

    .register a:hover {
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .login-card {
            padding: 35px 25px;
        }
    }
</style>


<div class="login-page">

    <div class="login-card">

        <!-- Brand -->
        <div class="brand">

            <div class="brand-icon">
                $
            </div>

            <h1>Campus Coin</h1>

            <p>Welcome back! Please login to continue.</p>

        </div>


        <!-- Validation -->
        <x-jet-validation-errors class="error-box" />


        @if (session('status'))

            <div class="error-box">
                {{ session('status') }}
            </div>

        @endif


        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">

            @csrf


            <!-- Email -->
            <div class="field">

                <label for="email">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                    autofocus
                    autocomplete="username"
                >

            </div>


            <!-- Password -->
            <div class="field">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >

            </div>


            <!-- Options -->
            <div class="options">

                <label class="remember">

                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                    >

                    <span>Remember me</span>

                </label>


                @if (Route::has('password.request'))

                    <a
                        class="forgot"
                        href="{{ route('password.request') }}"
                    >
                        Forgot Password?
                    </a>

                @endif

            </div>


            <!-- Login -->
            <button
                type="submit"
                class="login-button"
            >
                Login to Account
            </button>

        </form>


        <!-- Register -->
        @if (Route::has('register'))

            <div class="register">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Create Account
                </a>

            </div>

        @endif

    </div>

</div>
```

</x-guest-layout>
