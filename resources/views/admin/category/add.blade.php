@extends('admin.dashboard')
@section('content')
    <h2>Add new category</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('category.index') }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="enter name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="enter description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
@section('js')
    <script>
        
        $(function() {
            
        })
    </script>
@endsection
