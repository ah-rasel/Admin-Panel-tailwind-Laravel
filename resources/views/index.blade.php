<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>Home Page</title>
</head>
<body :class="{ 'dark': dark }" x-data="data()">
    <div class="flex min-h-screen justify-center items-center">
        <h1 class="text-gray-800 text-3xl font-semibold">This is the homepage</h1>
    </div>
    <script src="{{asset('js/custom.js')}}"></script>
    @livewireScripts
</body>
</html>