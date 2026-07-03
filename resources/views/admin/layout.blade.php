<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — Qan Bağışı</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="wrapper">

        @include('admin.partials.sidebar')

        <div class="main-content">

            <div class="topbar">
                <h2>@yield('title')</h2>
            </div>

            <div class="content">
                @yield('content')
            </div>

        </div>
    </div>
</body>
</html>
