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
        <div class="overflow-x-auto py-6">
            <div class="text-right">
                <input class="btn btn-primary" onclick="my_modal_2.showModal()" type="button" value="+Add Member">
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
                    @foreach ($members as $key => $member)
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div>
                                        <div class="font-bold">{{ $member->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $member->phone }}</td>
                            <th class="flex space-x-1">
                                <button href="" id="edit" data-id="{{ $member->id }}"
                                    data-name="{{ $member->name }}" data-phone="{{ $member->phone }}"
                                    onclick="updatemodal.showModal()" class="btn btn-primary edit_member"><i
                                        class="las la-edit"></i></button>
                                <button type="submit" data-id="{{ $member->id }}"
                                    class="btn btn-warning delete_member"><i class="las la-trash"></i></button>
                            </th>
                        </tr>
                    @endforeach
            </table>
            {!! $members->links() !!}

        </div>


        {{-- add modal --}}
        <dialog id="my_modal_2" class="modal">
            <div class="modal-box text-center">
                <h3 class="font-bold text-lg">Add New Member</h3>
                <form action="" method="POST" enctype="multipart/form-data" id="addmemberform">
                    @csrf
                    <label class="label text-center">
                        <span class="label-text text-center">Name</span>
                    </label>
                    <input type="text" placeholder="Type here" id="name"
                        class="input input-bordered input-primary w-full max-w-xs" name="name" />
                    <label class="label">
                        <span class="label-text">Phone</span>
                    </label>
                    <input type="text" placeholder="Entire Phone" id="phone"
                        class="input input-bordered input-primary w-full max-w-xs" name="phone" />
                    <label class="label">
                        <span class="label-text"></span>
                    </label>
                    <div>
                        <input class="btn btn-primary add_member" type="submit" value="+Add">
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>



        {{-- update member modal  --}}
        <dialog id="updatemodal" class="modal">
            <div class="modal-box text-center">
                <h3 class="font-bold text-lg">Update Member</h3>
                <form action="" method="POST" enctype="multipart/form-data" id="updatememberform">
                    @csrf
                    <input type="hidden" name="id" id="update_id">
                    <label class="label text-center">
                        <span class="label-text text-center">Name</span>
                    </label>
                    <input type="text" placeholder="Type here" id="update_name"
                        class="input input-bordered input-primary w-full max-w-xs" name="update_name" />
                    <label class="label">
                        <span class="label-text">Phone</span>
                    </label>
                    <input type="text" placeholder="Entire Phone" id="update_phone"
                        class="input input-bordered input-primary w-full max-w-xs" name="update_phone" />
                    <label class="label">
                        <span class="label-text"></span>
                    </label>
                    <div>
                        <input class="btn btn-primary update_member" type="submit" value="Update">
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            // add member modal 
            $(document).on('click', '.add_member', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let phone = $('#phone').val();
                $.ajax({
                    url: "{{ route('add.member') }}",
                    method: 'post',
                    data: {
                        name: name,
                        phone: phone
                    },
                    success: function(res) {
                        if (res.status == 'success') {

                            $('#addmemberform')[0].reset();
                            $('#my_modal_2').modal('hide');
                        }

                    },
                    error: function(err) {

                    }
                })
            });


            // edit member modal 
            $(document).on('click', '.edit_member', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let phone = $(this).data('phone');
                $('#update_id').val(id);
                $('#update_name').val(name);
                $('#update_phone').val(phone);
            });


            // update submition 
            $(document).on('click', '.update_member', function(e) {
                e.preventDefault();
                let update_id = $('#update_id').val();
                let update_name = $('#update_name').val();
                let update_phone = $('#update_phone').val();
                $.ajax({
                    url: "{{ route('update.member') }}",
                    method: 'post',
                    data: {
                        update_id: update_id,
                        update_name: update_name,
                        update_phone: update_phone
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#updatememberform')[0].reset();
                            $('#updatemodal').modal('hide');
                            $('.table').load(location.href + ' .table');
                        }

                    },
                    error: function(err) {

                    }
                })
            });

            
            // delete member
            $(document).on('click', '.delete_member', function(e) {
                e.preventDefault();
                let update_id = $(this).data('id');
                if (confirm('Are you sure...???')) {
                    $.ajax({
                        url: "{{ route('delete.member') }}",
                        method: 'post',
                        data: {
                            update_id: update_id,
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                $('.table').load(location.href + ' .table');
                            }

                        },
                    })
                }
            });
        })
    </script>
</body>

</html>
