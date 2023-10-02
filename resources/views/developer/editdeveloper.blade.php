<form action="{{ URL::to('developer/' . $developer->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="old_image" value="{{ $developer->image }}">
    <label class="label text-center">
        <span class="label-text text-center">Name</span>
    </label>
    <input type="text" placeholder="{{ $developer->name }}" value="{{ $developer->name }}"
        class="input input-bordered input-primary w-full max-w-xs" name="name" />
    <label class="label">
        <span class="label-text">Phone</span>
    </label>
    <input type="text" placeholder="{{ $developer->phone }}" value="{{ $developer->phone }}"
        class="input input-bordered input-primary w-full max-w-xs" name="phone" />
    <label class="label">
        <span class="label-text">Image</span>
    </label>
    <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs" name="image" />
    <label class="label">
        <span class="label-text"></span>
    </label>
    <div>
        <input class="btn btn-primary" type="submit" value="Update">
    </div>
</form>
