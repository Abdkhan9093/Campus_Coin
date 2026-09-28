<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Coin - Admin Login</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        min-height: 100vh;
        background: #f5f8fc;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        color: #26384a;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border: 1px solid #e4eaf1;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(13, 59, 102, .08);
    }

    .logo {
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        color: #0d3b66;
        margin-bottom: 8px;
    }

    .logo span {
        color: #43b3f2;
    }

    .subtitle {
        text-align: center;
        color: #7a8998;
        font-size: 13px;
        margin-bottom: 28px;
    }

    label {
        display: block;
        color: #294c69;
        font-size: 12px;
        font-weight: bold;
        margin: 16px 0 7px;
    }

    input {
        width: 100%;
        padding: 12px;
        border: 1px solid #dce4ec;
        border-radius: 6px;
        outline: none;
        font-size: 14px;
    }

    input:focus {
        border-color: #176ca7;
    }

    .btn {
        width: 100%;
        margin-top: 22px;
        padding: 13px;
        border: 0;
        border-radius: 7px;
        background: #0d3b66;
        color: white;
        font-weight: bold;
        cursor: pointer;
        font-size: 14px;
    }

    .btn:hover {
        background: #14558e;
    }

    .error {
        background: #fceced;
        color: #c43d4b;
        padding: 10px;
        border-radius: 6px;
        font-size: 12px;
        margin-bottom: 15px;
    }

    .note {
        text-align: center;
        color: #8a98a8;
        font-size: 11px;
        margin-top: 20px;
        line-height: 1.5;
    }

    /* Mobile */
    @media (max-width: 480px) {
        body {
            padding: 15px;
        }

        .login-card {
            padding: 25px 20px;
        }

        .logo {
            font-size: 25px;
        }
    }
</style>
</head>

<body>
    <div class="login-card">
        <div class="logo">Campus <span>Coin</span></div>
        <div class="subtitle">Administrator Login</div>
        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <label>Admin Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="admin email" required autofocus>
            <label>Admin Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn" type="submit">Login to Administration</button>
        </form>
        <div class="note">Only the system administrator can access this area.</div>
    </div>
</body>

</html>