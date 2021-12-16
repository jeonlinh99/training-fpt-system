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
                            <h4 class="card-title">List users</h4>
                            <h5 class="card-subtitle">Manage trainer</h5>
                            @if (session()->get('message'))
                                <h5 class="card-subtitle mt-3" style="color: green">{{ session()->get('message') }} <i
                                        class="fas fa-exclamation"></i></h5>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  Trainer
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item" href="{{ route('user.index_trainee') }}">Trainee</a></li>
                                </ul>
                              </div>
                        </div>
                        <div class="ms-2">
                            <a class="btn btn-success" type="button" href="{{ route('user.create_trainer') }}">Add trainer
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
                                <th class="border-top-0">Education</th>
                                <th class="border-top-0">TypeWork</th>
                                <th class="border-top-0">Working Place</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_trainer as $item_trainer)
                                <tr class="item_trainer{{ $item_trainer->id }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                <div class="btn btn-circle d-flex btn-white text-white"><img
                                                        src="{{ $item_trainer->image }}"
                                                        style="width:100%; height:100%; object-fit: contain;"></div>
                                            </div>
                                            <div>
                                                <h4 class="m-b-0 font-16">{{ $item_trainer->id }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item_trainer->name }}</td>
                                    <td>
                                        <label class="label label-danger">{{ $item_trainer->education }}</label>
                                    </td>
                                    <td>{{ $item_trainer->typeWork }}</td>
                                    <td>
                                        <h5 class="m-b-0">{{ $item_trainer->workingPlace }}</h5>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item_trainer->id }}"><i
                                                class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('user.edit_trainer',['id'=>$item_trainer->id]) }}">
                                            <button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i>
    
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger delete_trainer" data-url="{{ route('user.delete_trainer') }}"
                                            data-id="{{ $item_trainer->id }}"><i class="fas fa-trash-alt"></i>

                                        </button>
                                    </td>


                                    <!-- Modal view-->
                                    <div class="modal fade" id="exampleModal{{ $item_trainer->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">View item trainer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 style="color: gray">Name: <span
                                                            style="color: black">{{ $item_trainer->name }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Education: <span
                                                            style="color: black">{{ $item_trainer->education }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">TypeWork: <span
                                                            style="color: black">{{ $item_trainer->typeWork }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Working Place: <span
                                                            style="color: black">{{ $item_trainer->workingPlace }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Telephone: <span
                                                            style="color: black">{{ $item_trainer->telephone }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Email Address: <span
                                                            style="color: black">{{ $item_trainer->emailAddress }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Username: <span
                                                            style="color: black">{{ $item_trainer->users->username }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Image: </h3>
                                                    <img src="{{ $item_trainer->image }}"
                                                        style="width: 100%; height:100%;" alt="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end d-block m-3">{{ $data_trainer->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function delete_trainer(){
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
                    $('.item_trainer'+id).remove()
                }
            })
        }
        $(function() {
            $(document).on('click','.delete_trainer', delete_trainer)
        })
    </script>
@endsection
