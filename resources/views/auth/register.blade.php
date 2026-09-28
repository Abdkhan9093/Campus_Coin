<x-guest-layout>

```
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6fb;
    }

    .register-page {
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

    .register-card {
        width: 100%;
        max-width: 470px;
        background: #ffffff;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(31, 41, 55, 0.12);
    }

    .brand {
        text-align: center;
        margin-bottom: 28px;
    }

    .brand-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        border-radius: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0b5ed7, #073b8f);
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
        margin-bottom: 18px;
    }

    .field label {
        display: block;
        margin-bottom: 7px;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
    }

    .field input {
        width: 100%;
        box-sizing: border-box;
        padding: 13px 15px;
        border: 1px solid #e5e7eb;
        border-radius: 11px;
        background: #f9fafb;
        color: #1f2937;
        font-size: 14px;
        outline: none;
        transition: 0.25s;
    }

    .field input:focus {
        background: #ffffff;
        border-color: #0b5ed7;
        box-shadow: 0 0 0 4px rgba(124, 108, 246, 0.10);
    }

    .terms {
        margin: 20px 0;
        font-size: 13px;
        color: #6b7280;
    }

    .terms label {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        line-height: 1.5;
    }

    .terms input {
        margin-top: 3px;
        accent-color: #0b5ed7;
    }

    .terms a {
        color: #0b5ed7;
        font-weight: 600;
        text-decoration: none;
    }

    .terms a:hover {
        text-decoration: underline;
    }

    .bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 25px;
        padding-top: 22px;
        border-top: 1px solid #f0f0f0;
    }

    .login-link {
        color: #0b5ed7;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .login-link:hover {
        text-decoration: underline;
    }

    .register-button {
        border: none;
        border-radius: 11px;
        padding: 12px 24px;
        background: linear-gradient(135deg, #0b5ed7, #073b8f);
        color: white;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(109, 93, 252, 0.22);
        transition: 0.25s;
    }

    .register-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(109, 93, 252, 0.28);
    }

    @media (max-width: 480px) {
        .register-card {
            padding: 30px 22px;
        }

        .bottom {
            flex-direction: column-reverse;
            gap: 18px;
        }

        .register-button {
            width: 100%;
        }
    }
</style>


<div class="register-page">

    <div class="register-card">

        <!-- Brand -->
        <div class="brand">

            <div class="brand-icon">
                $
            </div>

            <h1>Create Account</h1>

            <p>
                Join Campus Coin and start managing your money.
            </p>

        </div>


        <!-- Validation Errors -->
        <x-jet-validation-errors class="mb-4" />


        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">

            @csrf


            <!-- Name -->
            <div class="field">

                <label for="name">
                    Full Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    required
                    autofocus
                    autocomplete="name"
                >

            </div>


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
                    placeholder="Create a password"
                    required
                    autocomplete="new-password"
                >

            </div>


            <!-- Confirm Password -->
            <div class="field">

                <label for="password_confirmation">
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                    required
                    autocomplete="new-password"
                >

            </div>


            <!-- Terms -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                <div class="terms">

                    <label for="terms">

                        <input
                            type="checkbox"
                            name="terms"
                            id="terms"
                        >

                        <span>
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',

                                'privacy_policy' =>
                                    '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </span>

                    </label>

                </div>

            @endif


            <!-- Bottom -->
            <div class="bottom">

                <a
                    class="login-link"
                    href="{{ route('login') }}"
                >
                    Already have an account?
                </a>


                <button
                    type="submit"
                    class="register-button"
                >
                    Create Account
                </button>

            </div>

        </form>

    </div>

</div>
```

</x-guest-layout>
