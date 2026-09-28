<x-guest-layout>

    <style>
        .verify-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
            background:
                radial-gradient(circle at top left, rgba(109, 93, 252, 0.14), transparent 35%),
                radial-gradient(circle at bottom right, rgba(139, 92, 246, 0.12), transparent 35%),
                #f6f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        .verify-card {
            width: 100%;
            max-width: 520px;
            background: #ffffff;
            border-radius: 24px;
            padding: 42px 40px;
            box-shadow: 0 20px 50px rgba(40, 30, 80, 0.10);
            border: 1px solid #eeeef5;
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 14px;
            border-radius: 18px;
            background: linear-gradient(135deg, #6d5dfc, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 10px 25px rgba(109, 93, 252, 0.28);
        }

        .brand h1 {
            margin: 0;
            font-size: 27px;
            font-weight: 700;
            color: #1f2340;
        }

        .brand p {
            margin: 7px 0 0;
            font-size: 14px;
            color: #8a8fa3;
        }

        .verify-title {
            text-align: center;
            font-size: 21px;
            font-weight: 700;
            color: #252943;
            margin-bottom: 12px;
        }

        .message {
            background: #f7f7fb;
            border: 1px solid #ededf5;
            border-radius: 14px;
            padding: 16px;
            color: #6b7085;
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
            margin-bottom: 18px;
        }

        .success-message {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #15803d;
            border-radius: 14px;
            padding: 14px 16px;
            font-size: 14px;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 22px;
        }

        .verification-icon {
            width: 72px;
            height: 72px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #f0edff;
            color: #6d5dfc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 25px;
        }

        .resend-button {
            width: 100%;
            border: none;
            border-radius: 13px;
            padding: 13px 20px;
            background: linear-gradient(135deg, #6d5dfc, #8b5cf6);
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.25s ease;
            box-shadow: 0 8px 20px rgba(109, 93, 252, 0.22);
        }

        .resend-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 25px rgba(109, 93, 252, 0.30);
        }

        .links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            padding-top: 4px;
        }

        .links a,
        .links button {
            background: none;
            border: none;
            padding: 0;
            color: #777c91;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .links a:hover,
        .links button:hover {
            color: #6d5dfc;
        }

        .separator {
            width: 4px;
            height: 4px;
            background: #c5c7d2;
            border-radius: 50%;
        }

        .security-note {
            text-align: center;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #eeeeF4;
            color: #a0a4b4;
            font-size: 12px;
        }

        @media (max-width: 520px) {
            .verify-card {
                padding: 32px 22px;
                border-radius: 20px;
            }

            .links {
                flex-wrap: wrap;
                gap: 12px;
            }
        }
    </style>

    <div class="verify-page">

        <div class="verify-card">

            <div class="brand">
                <div class="brand-icon">$</div>

                <h1>Campus Coin</h1>

                <p>Manage your money with confidence</p>
            </div>

            <div class="verification-icon">
                ✉
            </div>

            <div class="verify-title">
                Verify Your Email Address
            </div>

            <div class="message">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="success-message">
                    ✓ {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="actions">

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit" class="resend-button">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <div class="links">

                    <a href="{{ route('profile.show') }}">
                        {{ __('Edit Profile') }}
                    </a>

                    <span class="separator"></span>

                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf

                        <button type="submit">
                            {{ __('Log Out') }}
                        </button>
                    </form>

                </div>

            </div>

            <div class="security-note">
                🔒 Your account security is important to us.
            </div>

        </div>

    </div>

</x-guest-layout>
