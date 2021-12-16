@extends('admin.dashboard')
@section('content')
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">List Course</h4>
                            <h5 class="card-subtitle">Manage course</h5>
                            @if (session()->get('message'))
                                <h5 class="card-subtitle mt-3" style="color: green">{{ session()->get('message') }} <i
                                        class="fas fa-exclamation"></i></h5>
                            @endif
                        </div>

                        <div class="ms-auto">
                            <a class="btn btn-success" type="button" href="{{ route('course.create') }}">Add course
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Id</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0">Trainer</th>
                                <th class="border-top-0">Category</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_course as $item_course)
                                <tr class="item_course{{ $item_course->id }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h4 class="m-b-0 font-16">{{ $item_course->id }}</h4>
                                            </div>
                                            <div>
                                                <img src="{{ $item_course->image }}" style="width: 50px; margin-left: 20px;">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item_course->name }}</td>
                                    <td>{{ $item_course->description }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($item_course->trainer as $item_trainer)
                                                <li>{{ $item_trainer->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($item_course->category as $item_category)
                                                <li>{{ $item_category->name }}</li>
                                            @endforeach

                                        </ul>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal_course{{ $item_course->id }}">Trainee   <i
                                                class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('topic.index', ['id_course' => $item_course->id]) }}">
                                            <button type="button" class="btn btn-success">Topic <i class="fas fa-plus"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('course.edit', ['id' => $item_course->id]) }}">
                                            <button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i>

                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger delete_course"
                                            data-url="{{ route('course.delete') }}"
                                            data-id="{{ $item_course->id }}"><i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal view-->
                                <div class="modal fade" id="exampleModal_course{{ $item_course->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">View item trainee</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>List trainee : </h3>
                                                @foreach ($item_course->trainee as $item_trainee)
                                                    <h3 style="color: gray">ID: {{ $item_trainee->id }} <span
                                                            style="color: black">{{ $item_trainee->name }}</span>
                                                    </h3>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end d-block m-3">{{ $data_course->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function delete_course() {
            var url = $(this).data('url');
            var id = $(this).data('id');
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: {
                    id: id
                },
                success: function() {
                    $('.item_course' + id).remove()
                }
            })
        }
        $(function() {
            $(document).on('click', '.delete_course', delete_course)
        })
    </script>
@endsection
