<x-guest-layout>

```
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6fb;
    }

    .forgot-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
        background:
            radial-gradient(circle at top right, #e8ddff 0%, transparent 35%),
            radial-gradient(circle at bottom left, #dce8ff 0%, transparent 35%),
            #f6f7fb;
    }

    .forgot-card {
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

    .message {
        background: #f8f7ff;
        border: 1px solid #e8e4ff;
        color: #6b7280;
        padding: 15px 16px;
        border-radius: 12px;
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 22px;
    }

    .status {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
        padding: 13px 15px;
        border-radius: 11px;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .field {
        margin-bottom: 22px;
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

    .button-area {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .back-login {
        color: #6d5dfc;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .back-login:hover {
        text-decoration: underline;
    }

    .reset-button {
        border: none;
        border-radius: 12px;
        padding: 13px 22px;
        background: linear-gradient(135deg, #6d5dfc, #8b5cf6);
        color: white;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(109, 93, 252, 0.22);
        transition: 0.25s;
    }

    .reset-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(109, 93, 252, 0.30);
    }

    .footer {
        text-align: center;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
        color: #9ca3af;
        font-size: 12px;
    }

    @media (max-width: 480px) {
        .forgot-card {
            padding: 32px 24px;
        }

        .button-area {
            flex-direction: column-reverse;
        }

        .reset-button {
            width: 100%;
        }
    }
</style>


<div class="forgot-page">

    <div class="forgot-card">

        <!-- Brand -->
        <div class="brand">

            <div class="brand-icon">
                $
            </div>

            <h1>Forgot Password?</h1>

            <p>
                No worries, we'll help you reset it.
            </p>

        </div>


        <!-- Information -->
        <div class="message">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>


        <!-- Status -->
        @if (session('status'))

            <div class="status">
                {{ session('status') }}
            </div>

        @endif


        <!-- Validation -->
        <x-jet-validation-errors class="mb-4" />


        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}">

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
                    placeholder="Enter your registered email"
                    required
                    autofocus
                    autocomplete="email"
                >

            </div>


            <!-- Buttons -->
            <div class="button-area">

                <a
                    href="{{ route('login') }}"
                    class="back-login"
                >
                    ← Back to Login
                </a>

                <button
                    type="submit"
                    class="reset-button"
                >
                    Send Reset Link
                </button>

            </div>

        </form>


        <div class="footer">
            Campus Coin • Secure Account Recovery
        </div>

    </div>

</div>
```

</x-guest-layout>
