@extends('admin.dashboard')
@section('content')
    <h2>Edit Trainee ID: {{ $item_trainee->id }}</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('user.index_trainee') }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('user.update_trainee',['id' => $item_trainee->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="enter name" value="{{ $item_trainee->name }}">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date Of Birth</label>
            <input type="date" class="form-control" name="dob" id="date" placeholder="enter Date Of Birth" value="{{ $item_trainee->dateOfBirth }}">
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Education</label>
            <input type="text" class="form-control" name="education" id="education" placeholder="enter education" value="{{ $item_trainee->education }}">
        </div>
        <div class="mb-3">
            <label for="programinglanguages" class="form-label">Programing Languages</label>
            <input type="text" class="form-control" name="programinglanguages" id="programinglanguages" value="{{ $item_trainee->programingLanguages }}"
                placeholder="enter Programing Languages">
        </div>
        <div class="mb-3">
            <label for="toeiccore" class="form-label">Toeic Score</label>
            <input type="text" class="form-control" name="toeiccore" id="toeiccore" placeholder="enter Toeic Core" value="{{ $item_trainee->toeicScore }}">
        </div>
        <div class="mb-3">
            <label for="experiencedetails" class="form-label">Experience Details</label>
            <input type="text" class="form-control" name="experiencedetails" id="experiencedetails" value="{{ $item_trainee->experienceDetails }}"
                placeholder="enter Experience Details">
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" name="department" id="department" placeholder="enter Department" value="{{ $item_trainee->department }}">
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="enter Location" value="{{ $item_trainee->location }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control preview_image" name="image" id="image">
        </div>
        <div class="mb-3">
            <img src="{{ $item_trainee->image }}" style="width: 25%"
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