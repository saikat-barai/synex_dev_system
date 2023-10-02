<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="font-poppins container m-auto px-5 lg:px-32">

    <header class="">
        <nav class="py-4">
            <div class="navbar bg-base-100">
                <div class="flex-1">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16"></path>
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 text-base font-medium">
                            <li><a href="{{ route('/home') }}">Home</a></li>
                            <li><a href="{{ URL::to('developer') }}">Developers</a></li>
                            <li><a href="{{ route('/member') }}">Members</a></li>
                            <li><a>Contact</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost normal-case text-3xl font-bold" href="">SYNEX</a>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1 text-base font-medium gap-3">
                      <li><a href="{{ route('/home') }}">Home</a></li>
                      <li><a href="{{ URL::to('developer') }}">Developers</a></li>
                      <li><a href="{{ route('/member') }}">Members</a></li>
                      <li><a>Contact</a></li>
                    </ul>
                </div>
                <div class="flex-col">
                    <a
                        class="text-xl font-semibold btn bg-orange-500 text-white hover:text-blue-950 hover:bg-cyan-500">Login</a>
                </div>
            </div>
        </nav>

    </header>
    <main class="text-center py-11">
      <h1 class="text-2xl font-bold text-green-600 border border-lime-400 py-1">Wellcome to <span class="bg-slate-600 px-4 py-1 rounded text-gray-300">SYNEX</span></h1>
    </main>

</body>

</html>
