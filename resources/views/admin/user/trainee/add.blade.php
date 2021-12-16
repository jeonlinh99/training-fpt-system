@extends('admin.dashboard')
@section('content')
    <h2>Add new Trainee</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('user.index_trainee') }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('user.store_trainee') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="enter name">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="enter username">
        </div>
        @if (session()->get('same_username'))
            <div class="mb-3">
                <h6 style="color: red"><i class="fas fa-exclamation"></i> {{ session()->get('same_username') }}</h6>
            </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" id="exampleInputPassword1"
                placeholder="enter password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Password again</label>
            <input type="password" class="form-control" name="pass2" id="exampleInputPassword2"
                placeholder="enter password again">
        </div>
        @if (session()->get('message'))
            <div class="mb-3">
                <h6 style="color: red"><i class="fas fa-exclamation"></i> {{ session()->get('message') }}</h6>
            </div>
        @endif
        <div class="mb-3">
            <label for="date" class="form-label">Date Of Birth</label>
            <input type="date" class="form-control" name="dob" id="date" placeholder="enter Date Of Birth">
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Education</label>
            <input type="text" class="form-control" name="education" id="education" placeholder="enter education">
        </div>
        <div class="mb-3">
            <label for="programinglanguages" class="form-label">Programing Languages</label>
            <input type="text" class="form-control" name="programinglanguages" id="programinglanguages"
                placeholder="enter Programing Languages">
        </div>
        <div class="mb-3">
            <label for="toeiccore" class="form-label">Toeic Score</label>
            <input type="text" class="form-control" name="toeiccore" id="toeiccore" placeholder="enter Toeic Core">
        </div>
        <div class="mb-3">
            <label for="experiencedetails" class="form-label">Experience Details</label>
            <input type="text" class="form-control" name="experiencedetails" id="experiencedetails"
                placeholder="enter Experience Details">
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" name="department" id="department" placeholder="enter Department">
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="enter Location">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control preview_image" name="image" id="image">
        </div>
        <div class="mb-3">
            <img src="https://st.quantrimang.com/photos/image/2018/07/26/file-i-o-trong-c-200.jpg" style="width: 25%"
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
