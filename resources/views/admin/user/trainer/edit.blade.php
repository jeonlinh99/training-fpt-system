@extends('admin.dashboard')
@section('content')
    <h2>Edit trainer ID: {{ $item_trainer->id }}</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('user.index_trainer') }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('user.update_trainer',['id' => $item_trainer->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="enter name" value="{{ $item_trainer->name }}">
        </div>       
        <div class="mb-3">
            <label for="education" class="form-label">Education</label>
            <input type="text" class="form-control" name="education" id="education" placeholder="enter education" value="{{ $item_trainer->education }}"></div>
        <div class="mb-3">
            <label for="typeWork" class="form-label">Type Work</label>
            <input type="text" class="form-control" name="typeWork" id="typeWork" value="{{ $item_trainer->typeWork }}"
                placeholder="enter Type Work">
        </div>
        <div class="mb-3">
            <label for="workingPlace" class="form-label">Working Place</label>
            <input type="text" class="form-control" name="workingPlace" id="workingPlace" placeholder="enter Working Place" value="{{ $item_trainer->workingPlace }}">
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{ $item_trainer->telephone }}"
                placeholder="enter Telephone">
        </div>
        <div class="mb-3">
            <label for="emailAddress" class="form-label">Email Address</label>
            <input type="text" class="form-control" name="emailAddress" id="emailAddress" placeholder="enter Email Address" value="{{ $item_trainer->emailAddress }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control preview_image" name="image" id="image">
        </div>
        <div class="mb-3">
            <img src="{{ $item_trainer->image }}" style="width: 25%"
                id="output">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
@section('js')
    <script>
        function preview_image(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        }
        $(function() {
            $(document).on('change', '.preview_image', preview_image)
        })
    </script>
@endsection