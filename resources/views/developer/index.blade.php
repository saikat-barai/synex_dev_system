<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                    <a class="btn btn-ghost normal-case text-3xl font-bold">SYNEX</a>
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
    <main class="px-5">
        <div class="overflow-x-auto">
            <div class="text-right">
                <input class="btn btn-primary" onclick="my_modal_2.showModal()" type="button" value="+Add Developer">
            </div>
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($developers as $key => $developer)
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ asset('files/developer/' . $developer->image) }}"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{ $developer->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $developer->phone }}</td>
                            <th class="flex space-x-1">
                                <button href="" id="edit" data-id="{{ $developer->id }}"
                                    onclick="editdeveloper.showModal()" class="btn btn-primary"><i
                                        class="las la-edit"></i></button>
                                <form action="{{ URL::to('developer/' . $developer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning"><i class="las la-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                    @endforeach

            </table>
        </div>


        {{-- add modal --}}
        <dialog id="my_modal_2" class="modal">
            <div class="modal-box text-center">
                <h3 class="font-bold text-lg">Add New Developer</h3>
                <form action="{{ URL::to('developer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="label text-center">
                        <span class="label-text text-center">Name</span>
                    </label>
                    <input type="text" placeholder="Type here"
                        class="input input-bordered input-primary w-full max-w-xs" name="name" />
                    <label class="label">
                        <span class="label-text">Phone</span>
                    </label>
                    <input type="text" placeholder="Entire Phone"
                        class="input input-bordered input-primary w-full max-w-xs" name="phone" />
                    <label class="label">
                        <span class="label-text">Image</span>
                    </label>
                    <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs"
                        name="image" />
                    <label class="label">
                        <span class="label-text"></span>
                    </label>
                    <div>
                        <input class="btn btn-primary" type="submit" value="+Add">
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>



        {{-- edit developer model start --}}
        <dialog id="editdeveloper" class="modal">
            <div class="modal-box text-center">
                <h3 class="font-bold text-lg">Edit Developer</h3>
                <div class="modal-body" id="modal_body">

                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('body').on('click', '#edit', function() {
            let developer_id = $(this).data('id');
            $.get("developer/" + developer_id + "/edit", function(data) {
                $('#modal_body').html(data);
            });
        });
    </script>
</body>

</html>
