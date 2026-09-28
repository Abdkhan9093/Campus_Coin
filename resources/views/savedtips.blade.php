<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Tips | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>@include('partials.user-nav')
    <main class="page">
        <div class="page-heading">
            <div class="section-label">BOOKMARKS</div>
            <h1>Your Saved <span>Tips</span></h1>
            <p>Keep useful budgeting reminders for later.</p>
        </div>@if(session('success'))
        <div class="success-box">{{ session('success') }}</div>@endif<div class="tip-grid">@forelse($tips as $tip)
            <div class="message-card"><i class="fa-solid fa-bookmark"></i>
                <h3>{{ $tip->title }}</h3>
                <p>{{ $tip->text }}</p>
                <form method="POST" action="{{ route('saved.tips.delete', $tip) }}">@csrf @method('DELETE')<button
                        class="delete-btn">Remove</button></form>
            </div>@empty<div class="empty-text">No saved tips yet. Save a tip from your dashboard.</div>@endforelse
        </div>
    </main>@include('partials.user-footer')
</body>

</html>