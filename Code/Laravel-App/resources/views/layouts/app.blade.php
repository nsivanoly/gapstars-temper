<html>
<head>
    <title>Assessment l Temper</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div id="app">
        @yield('content')
    </div>
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
