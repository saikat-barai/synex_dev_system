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
                        <li><a href="{{ route('/index') }}">Home</a></li>
                        <li><a href="{{ URL::to('developer') }}">Developers</a></li>
                        <li><a href="{{ route('/member') }}">Members</a></li>
                        <li><a>Contact</a></li>
                    </ul>
                </div>
                <a class="btn btn-ghost normal-case text-3xl font-bold" href="">SYNEX</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1 text-base font-medium gap-3">
                    <li><a href="{{ route('/index') }}">Home</a></li>
                    <li><a href="{{ route('developers') }}">Developers</a></li>
                    <li><a href="{{ route('members') }}">Members</a></li>
                    <li><a>Contact</a></li>
                    @if (Auth::user())
                        <li>
                            <div class="dropdown dropdown-bottom dropdown-end">
                                <label tabindex="0" class="">Profile</label>
                                <ul tabindex="0"
                                    class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                    @if (Auth::user()->role == '1')
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ URL::to('developer') }}">+Developer</a></li>
                                        <li><a href="{{ route('/member') }}">+Member</a></li>
                                    @else
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endif
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="">Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <a href="{{ route('user.login') }}"
                            class="text-xl font-semibold btn bg-slate-600 text-white hover:text-blue-950 hover:bg-cyan-500">Login</a>
                    @endif

                </ul>
            </div>
            <div class="flex-col">


            </div>
        </div>
    </nav>

</header>
