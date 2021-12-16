@extends('admin.dashboard')
@section('content')
    <h2>Add new trainer</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('user.index_trainer') }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('user.store_trainer') }}" enctype="multipart/form-data">
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
            <label for="education" class="form-label">Education</label>
            <input type="text" class="form-control" name="education" id="education" placeholder="enter education">
        </div>
        <div class="mb-3">
            <label for="typeWork" class="form-label">Type Work</label>
            <input type="text" class="form-control" name="typeWork" id="typeWork"
                placeholder="enter Type Work">
        </div>
        <div class="mb-3">
            <label for="workingPlace" class="form-label">Working Place</label>
            <input type="text" class="form-control" name="workingPlace" id="workingPlace" placeholder="enter Working Place">
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="text" class="form-control" name="telephone" id="telephone"
                placeholder="enter Telephone">
        </div>
        <div class="mb-3">
            <label for="emailAddress" class="form-label">Email Address</label>
            <input type="text" class="form-control" name="emailAddress" id="emailAddress" placeholder="enter Email Address">
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
