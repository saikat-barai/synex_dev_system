<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>

<body class="font-poppins container m-auto px-5 lg:px-32">
    @include('includes.header')
    <main class="px-5 py-20 h-[80vh] text-center">
        <h1 class="text-3xl font-bold"><span class="text-5xl font-bold text-green-500">{{ Auth::user()->name }}</span>&nbsp; &nbsp; Wellcome To Our SYNEX Digital...</h1>
    </main>
</body>

</html>
