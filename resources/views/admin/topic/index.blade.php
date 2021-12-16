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
                            <h4 class="card-title">Course topic list of {{ $item_course->name }}</h4>
                            <h5 class="card-subtitle">Manage topic</h5>
                            @if (session()->get('message'))
                                <h5 class="card-subtitle mt-3" style="color: green">{{ session()->get('message') }} <i
                                        class="fas fa-exclamation"></i></h5>
                            @endif
                        </div>

                        <div class="ms-auto">
                            <a class="btn btn-success" type="button"
                                href="{{ route('topic.create', ['id_course' => $item_course->id]) }}">Add topic
                                <i class="fas fa-plus"></i>
                            </a>
                            <a class="btn btn-info ml-3" type="button"
                                href="{{ route('course.index') }}">Back <i
                                    class="fas fa-sign-out-alt"></i>
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
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_topic as $item_topic)
                                <tr class="item_topic{{ $item_topic->id }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h4 class="m-b-0 font-16">{{ $item_topic->id }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item_topic->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal_topic{{ $item_topic->id }}"><i
                                                class="fas fa-eye"></i>
                                        </button>
                                        <a
                                            href="{{ route('topic.edit', ['id_course' => $item_course->id, 'id' => $item_topic->id]) }}">
                                            <button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i>

                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger delete_topic"
                                            data-url="{{ route('topic.delete', ['id_course' => $item_course->id]) }}"
                                            data-id="{{ $item_topic->id }}"><i class="fas fa-trash-alt"></i>

                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal view-->
                                <div class="modal fade" id="exampleModal_topic{{ $item_topic->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Topic description</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {!! $item_topic->description !!}
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
                    <div class="float-end d-block m-3">{{ $data_topic->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function delete_topic() {
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
                    $('.item_topic' + id).remove()
                }
            })
        }
        $(function() {
            $(document).on('click', '.delete_topic', delete_topic)
        })
    </script>
@endsection
