@extends('user.dashboard')
@section('content')
    <main>
        <div class="main-content">
            <div class="main-content-left">
                <h3 style="text-align: center;">Content</h3>
                <div class="render_html" style="width:100%;">
                    {{-- render html --}}
                    <h5>{{ $item_course->description }}</h5>
                </div>
            </div>
            <div class="main-content-right">
                <ul class="main-content-list">
                    <div class="w-100" style="background-color: rgb(129, 201, 129); padding: 10px; text-align: center;"><h3>List Topic</h3></div>
                    @foreach ($item_course->topic as $item_topic)
                        <div class="main-content-item item_topic item_topic{{ $item_topic->id }}" data-url="{{ route('home.view_topic') }}" data-id="{{ $item_topic->id }}">
                                <p>{{ $item_topic->name }}</p>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        function view_topic(){
            var url = $(this).data('url');
            var id = $(this).data('id');
            $.ajax({
                url:url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:"POST",
                data:{
                    id:id
                },
                success:function(data){
                    $('.render_html').html(data)
                }
            })
        }
        $(function(){
            $(document).on('click','.item_topic',view_topic)
        })
    </script>
@endsection
