<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>@include('partials.user-nav')<main class="page">
        <div class="page-heading">
            <div class="section-label">YOUR PROFILE</div>
            <h1>Student <span>Profile</span></h1>
            <p>Keep your basic budgeting information up to date.</p>
        </div>@if(session('success'))<div class="success-box">{{ session('success') }}</div>@endif<div class="form-card profile-card">
            <form method="POST" action="{{ route('profile.update.simple') }}">@csrf<label>Full Name</label><input type="text" name="name" value="{{ $user->name }}" required><label>Email Address</label><input type="email" value="{{ $user->email }}" disabled><label>Academic Year</label><input type="text" name="academic_year" value="{{ $user->academic_year }}" placeholder="e.g. 2nd Year"><label>Monthly Savings Goal</label>
                <div class="input-money"><span>Rs.</span><input type="number" name="monthly_savings_goal" min="0" step="0.01" value="{{ $user->monthly_savings_goal }}"></div><button class="full-btn">Save Profile</button>
            </form>
        </div>
    </main>@include('partials.user-footer')</body>

</html>