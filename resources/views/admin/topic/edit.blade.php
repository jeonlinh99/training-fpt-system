@extends('admin.dashboard')
@section('content')
    <h2>Course name: {{ $item_course->name }}</h2>
    <h2>Edit topic ID: {{ $item_topic->id }}</h2>
    <a class="btn btn-success float-end d-block p-2" type="button" href="{{ route('topic.index',['id_course' => $item_course->id]) }}">Back <i
            class="fas fa-sign-out-alt"></i>
    </a>
    <form class="mt-5" method="POST" action="{{ route('topic.update',['id_course' => $item_course->id,'id' => $item_topic->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="enter name" value="{{ $item_topic->name }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="editor2" id="editor2" rows="10" cols="80">{{ $item_topic->description }}</textarea>
        </div>     
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            CKEDITOR.replace( 'editor2' );
        })
        $(function() {
           
        })
    </script>
@endsection