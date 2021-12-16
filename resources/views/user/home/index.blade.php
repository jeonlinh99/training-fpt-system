@extends('user.dashboard')
@section('content')
<main class="container-fluid">
    <div class="main-courses">
        @foreach ($data_category as $item_category)
        <div class="main-courses-group">
            <div class="main-course-title">
                <h4>{{ $item_category->name }}</h4>
            </div>
            <ul class="main-course-list">

                @foreach ($item_category->course as $item_course)
                <?php
                $course_user = "";
                $user_login = "";
                ?>
                @if(auth()->check())
                <?php
                $course_user = $item_course->trainee;

                $user_login = auth()->user();
                $trainee_user = $user_login->trainee;
                ?>
                @endif
                @if($course_user != "")
                @if($course_user->contains('id',$trainee_user->id))
                <div class="main-course-item">
                    <a href="{{ route('home.single_course',['id'=>$item_course->id]) }}">
                        <div class="course-title">
                            {{ $item_course->name }}
                        </div>
                        <div class="course-image">
                            <img src="{{ $item_course->image }}" alt="react">
                        </div>
                        <div class="course-ins">
                            @foreach ($item_course->trainer->take(2) as $key => $item_trainer)
                            @if ($key >= 1)
                            <span> , </span>
                            <span>{{ $item_trainer->name }}</span>
                            @else
                            <span>{{ $item_trainer->name }}</span>
                            @endif
                            @endforeach
                        </div>
                    </a>
                </div>
                @else
                @endif
                @endif


                @endforeach
            </ul>
        </div>
        @endforeach
        <div class="float-right">{{ $data_category->links() }}</div>
    </div>
</main>
@endsection