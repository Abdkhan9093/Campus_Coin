<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories | Campus Coin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    @include('partials.user-nav')
    <main class="page">
        <div class="page-heading">
            <div class="section-label">CATEGORY MANAGEMENT</div>
            <h1>Manage Your <span>Categories</span></h1>
            <p>Use the default student categories or create your own.</p>
        </div>@if(session('success'))
        <div class="success-box">{{ session('success') }}</div>@endif
        <div class="form-card compact-card">
            <form method="POST" action="{{ route('categories.store') }}">@csrf<div class="category-add">
                    <div><label>Category Name</label><input type="text" name="name" placeholder="e.g. Campus Cafe"
                            required></div>
                    <div><label>Type</label><select name="type" required>
                            <option value="expense">Expense</option>
                            <option value="income">Income</option>
                        </select></div><button class="primary-btn">Add Category</button>
                </div>
            </form>
        </div>
        <div class="category-grid">@foreach($categories as $category)
            <div class="category-card">
                <div class="category-icon {{ $category->type == 'income' ? 'income-cat' : 'expense-cat' }}"><i
                        class="fa-solid {{ $category->type == 'income' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i></div>
                <div>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ ucfirst($category->type) }} @if($category->is_default) · Default @else · Personal @endif</p>
                </div>@if(!$category->is_default)
                    <form method="POST" action="{{ route('categories.delete', $category) }}">@csrf @method('DELETE')<button
                class="delete-btn">Delete</button></form>@endif
        </div>@endforeach
        </div>
    </main>@include('partials.user-footer')
</body>

</html>