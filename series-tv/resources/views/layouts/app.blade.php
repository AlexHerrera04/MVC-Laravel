<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Series TV' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav style="padding: 15px; border-bottom: 1px solid #ccc; margin-bottom: 20px;">
        <a href="{{ route('series.index') }}">Sèries</a> |
        <a href="{{ route('genres.index') }}">Gèneres</a> |
        <span>{{ auth()->user()->name ?? '' }}</span>

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline; margin-left: 10px;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>

    <main style="padding: 20px;">
        @if (session('success'))
            <div style="background: #d1fae5; padding: 10px; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background: #fee2e2; padding: 10px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>