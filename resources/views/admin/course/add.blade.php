@extends('admin.dashboard')
@section('content')
    <h2>Add new course</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('course.index') }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="enter name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="enter description">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="js-example-basic-multiple" name="category[]" multiple="multiple" style="width: 100%">
                @foreach ($data_category as $item_category)
                    <option value="{{ $item_category->id }}">{{ $item_category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="trainer" class="form-label">Trainer</label>
            <select class="js-example-basic-multiple2" name="trainer[]" multiple="multiple" style="width: 100%">
                @foreach ($data_trainer as $item_trainer)
                    <option value="{{ $item_trainer->id }}">{{ $item_trainer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="trainer" class="form-label">Trainee</label>
            <select class="js-example-basic-multiple3" name="trainee[]" multiple="multiple" style="width: 100%">
                @foreach ($data_trainee as $item_trainee)
                    <option value="{{ $item_trainee->id }}">{{ $item_trainee->name }}</option>
                @endforeach
            </select>
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
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "choose category",
                allowClear: true
            });
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple2').select2({
                placeholder: "choose trainer",
                allowClear: true
            });
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple3').select2({
                placeholder: "choose trainee",
                allowClear: true
            });
        });

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
