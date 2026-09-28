<x-guest-layout>

```
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6fb;
    }

    .twofa-page {
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

    .twofa-card {
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

    .field {
        margin-top: 20px;
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
        letter-spacing: 2px;
    }

    .field input:focus {
        background: #ffffff;
        border-color: #7c6cf6;
        box-shadow: 0 0 0 4px rgba(124, 108, 246, 0.10);
    }

    .actions {
        margin-top: 25px;
    }

    .switch-button {
        display: block;
        width: 100%;
        border: none;
        background: transparent;
        color: #6d5dfc;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 18px;
    }

    .switch-button:hover {
        text-decoration: underline;
    }

    .login-button {
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

    .login-button:hover {
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

    .security strong {
        color: #6d5dfc;
    }

    @media (max-width: 480px) {
        .twofa-card {
            padding: 32px 24px;
        }
    }
</style>


<div class="twofa-page">

    <div class="twofa-card" x-data="{ recovery: false }">

        <!-- Brand -->
        <div class="brand">

            <div class="brand-icon">
                🔐
            </div>

            <h1>Security Verification</h1>

            <p>
                Protecting your Campus Coin account
            </p>

        </div>


        <!-- Authentication Message -->
        <div
            class="message"
            x-show="! recovery"
        >
            {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
        </div>


        <!-- Recovery Message -->
        <div
            class="message"
            x-show="recovery"
        >
            {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
        </div>


        <!-- Validation Errors -->
        <x-jet-validation-errors class="mb-4" />


        <!-- Form -->
        <form method="POST" action="{{ route('two-factor.login') }}">

            @csrf


            <!-- Authentication Code -->
            <div
                class="field"
                x-show="! recovery"
            >

                <label for="code">
                    Authentication Code
                </label>

                <input
                    id="code"
                    type="text"
                    inputmode="numeric"
                    name="code"
                    autofocus
                    x-ref="code"
                    autocomplete="one-time-code"
                    placeholder="Enter 6-digit code"
                >

            </div>


            <!-- Recovery Code -->
            <div
                class="field"
                x-show="recovery"
            >

                <label for="recovery_code">
                    Recovery Code
                </label>

                <input
                    id="recovery_code"
                    type="text"
                    name="recovery_code"
                    x-ref="recovery_code"
                    autocomplete="one-time-code"
                    placeholder="Enter recovery code"
                >

            </div>


            <!-- Actions -->
            <div class="actions">

                <!-- Switch Authentication Method -->
                <button
                    type="button"
                    class="switch-button"
                    x-show="! recovery"
                    x-on:click="
                        recovery = true;
                        $nextTick(() => { $refs.recovery_code.focus() })
                    "
                >
                    Use a recovery code instead
                </button>


                <button
                    type="button"
                    class="switch-button"
                    x-show="recovery"
                    x-on:click="
                        recovery = false;
                        $nextTick(() => { $refs.code.focus() })
                    "
                >
                    Use an authentication code instead
                </button>


                <!-- Login -->
                <button
                    type="submit"
                    class="login-button"
                >
                    Verify & Login
                </button>

            </div>

        </form>


        <!-- Security Footer -->
        <div class="security">
            <strong>Campus Coin</strong> · Your account security matters.
        </div>

    </div>

</div>
```

</x-guest-layout>
