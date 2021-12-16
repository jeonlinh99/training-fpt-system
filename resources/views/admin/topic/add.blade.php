@extends('admin.dashboard')
@section('content')
    <h2>Add new topic</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('topic.index',['id_course'=>$item_course->id]) }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('topic.store',['id_course'=>$item_course->id]) }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="enter name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            CKEDITOR.replace( 'editor1' );
        })
        $(function() {
            
        })
    </script>
@endsection
