<x-guest-layout>

```
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6fb;
    }

    .reset-page {
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

    .reset-card {
        width: 100%;
        max-width: 440px;
        background: #ffffff;
        border-radius: 24px;
        padding: 42px 40px;
        box-shadow: 0 20px 60px rgba(31, 41, 55, 0.12);
    }

    .brand {
        text-align: center;
        margin-bottom: 28px;
    }

    .brand-icon {
        width: 62px;
        height: 62px;
        margin: 0 auto 16px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #6d5dfc, #8b5cf6);
        color: white;
        font-size: 27px;
        font-weight: bold;
        box-shadow: 0 10px 25px rgba(109, 93, 252, 0.25);
    }

    .brand h1 {
        margin: 0;
        font-size: 27px;
        color: #1f2937;
    }

    .brand p {
        margin: 8px 0 0;
        color: #9ca3af;
        font-size: 14px;
    }

    .field {
        margin-bottom: 19px;
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
        font-size: 14px;
        outline: none;
        transition: 0.25s;
    }

    .field input:focus {
        background: #ffffff;
        border-color: #7c6cf6;
        box-shadow: 0 0 0 4px rgba(124, 108, 246, 0.10);
    }

    .password-hint {
        margin-top: 7px;
        color: #9ca3af;
        font-size: 12px;
    }

    .button-area {
        margin-top: 25px;
    }

    .reset-button {
        width: 100%;
        border: none;
        border-radius: 12px;
        padding: 14px;
        background: linear-gradient(135deg, #6d5dfc, #8b5cf6);
        color: white;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(109, 93, 252, 0.22);
        transition: 0.25s;
    }

    .reset-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(109, 93, 252, 0.30);
    }

    .back-login {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #6d5dfc;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .back-login:hover {
        text-decoration: underline;
    }

    .footer {
        text-align: center;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
        color: #9ca3af;
        font-size: 12px;
    }

    @media (max-width: 480px) {
        .reset-card {
            padding: 32px 24px;
        }
    }
</style>


<div class="reset-page">

    <div class="reset-card">

        <!-- Brand -->
        <div class="brand">

            <div class="brand-icon">
                $
            </div>

            <h1>Reset Password</h1>

            <p>
                Create a new password for your account.
            </p>

        </div>


        <!-- Validation Errors -->
        <x-jet-validation-errors class="mb-4" />


        <!-- Reset Form -->
        <form method="POST" action="{{ route('password.update') }}">

            @csrf

            <!-- Reset Token -->
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >


            <!-- Email -->
            <div class="field">

                <label for="email">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    placeholder="Enter your email"
                    required
                    autofocus
                    autocomplete="email"
                >

            </div>


            <!-- Password -->
            <div class="field">

                <label for="password">
                    New Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Enter your new password"
                    required
                    autocomplete="new-password"
                >

                <div class="password-hint">
                    Use a strong password that you haven't used before.
                </div>

            </div>


            <!-- Confirm Password -->
            <div class="field">

                <label for="password_confirmation">
                    Confirm New Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm your new password"
                    required
                    autocomplete="new-password"
                >

            </div>


            <!-- Button -->
            <div class="button-area">

                <button
                    type="submit"
                    class="reset-button"
                >
                    Reset Password
                </button>

            </div>

        </form>


        <!-- Back -->
        <a
            href="{{ route('login') }}"
            class="back-login"
        >
            ← Back to Login
        </a>


        <div class="footer">
            Campus Coin • Secure Password Recovery
        </div>

    </div>

</div>
```

</x-guest-layout>
