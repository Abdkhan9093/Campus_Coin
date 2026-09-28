<x-guest-layout>

```
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6fb;
    }

    .confirm-page {
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

    .confirm-card {
        width: 100%;
        max-width: 430px;
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
        padding: 14px 16px;
        border-radius: 12px;
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 22px;
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
        justify-content: flex-end;
    }

    .confirm-button {
        border: none;
        border-radius: 12px;
        padding: 13px 28px;
        background: linear-gradient(135deg, #6d5dfc, #8b5cf6);
        color: white;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(109, 93, 252, 0.22);
        transition: 0.25s;
    }

    .confirm-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(109, 93, 252, 0.30);
    }

    .security {
        text-align: center;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
        color: #9ca3af;
        font-size: 12px;
    }

    @media (max-width: 480px) {
        .confirm-card {
            padding: 32px 24px;
        }

        .button-area {
            justify-content: stretch;
        }

        .confirm-button {
            width: 100%;
        }
    }
</style>


<div class="confirm-page">

    <div class="confirm-card">

        <!-- Brand -->
        <div class="brand">

            <div class="brand-icon">
                $
            </div>

            <h1>Confirm Password</h1>

            <p>
                Verify your identity to continue
            </p>

        </div>


        <!-- Information -->
        <div class="message">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>


        <!-- Validation Errors -->
        <x-jet-validation-errors class="mb-4" />


        <!-- Form -->
        <form method="POST" action="{{ route('password.confirm') }}">

            @csrf

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
                    autofocus
                >

            </div>


            <!-- Button -->
            <div class="button-area">

                <button
                    type="submit"
                    class="confirm-button"
                >
                    Confirm Password
                </button>

            </div>

        </form>


        <!-- Security Message -->
        <div class="security">
            🔒 Your password is securely protected.
        </div>

    </div>

</div>
```

</x-guest-layout>
