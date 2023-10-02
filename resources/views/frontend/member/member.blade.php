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
    <main class="px-5">
        <div class="overflow-x-auto py-10 mx-auto text-center w-4/5">
            <table class="table table-sm">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($members as $key => $member)
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div>
                                        <div class="font-bold">{{ $member->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $member->phone }}</td>
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
