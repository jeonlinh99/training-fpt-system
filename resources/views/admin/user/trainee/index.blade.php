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
                            <h5 class="card-subtitle">Manage Trainee</h5>
                            @if (session()->get('message'))
                                <h5 class="card-subtitle mt-3" style="color: green">{{ session()->get('message') }} <i
                                        class="fas fa-exclamation"></i></h5>
                            @endif
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  Trainee
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item" href="{{ route('user.index_trainer') }}">Trainer</a></li>
                                </ul>
                              </div>
                        </div>
                        <div class="ms-2">
                            <a class="btn btn-success" type="button" href="{{ route('user.create_trainee') }}">Add Trainee
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
                                <th class="border-top-0">DateOfBirth</th>
                                <th class="border-top-0">Education</th>
                                <th class="border-top-0">Programing Languages</th>
                                {{-- <th class="border-top-0">Toeic Score</th> --}}
                                <th class="border-top-0">Experience Details</th>
                                {{-- <th class="border-top-0">Department</th> --}}
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_trainee as $item_trainee)
                                <tr class="item_trainee{{ $item_trainee->id }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                <div class="btn btn-circle d-flex btn-white text-white"><img
                                                        src="{{ $item_trainee->image }}"
                                                        style="width:100%; height:100%; object-fit: contain;"></div>
                                            </div>
                                            <div>
                                                <h4 class="m-b-0 font-16">{{ $item_trainee->id }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item_trainee->name }}</td>
                                    <td>{{ $item_trainee->dateOfBirth }}</td>
                                    <td>
                                        <label class="label label-danger">{{ $item_trainee->education }}</label>
                                    </td>
                                    <td>{{ $item_trainee->programingLanguages }}</td>
                                    <td>
                                        <h5 class="m-b-0">{{ $item_trainee->experienceDetails }}</h5>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item_trainee->id }}"><i
                                                class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('user.edit_trainee',['id'=>$item_trainee->id]) }}">
                                            <button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i>
    
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger delete_trainee" data-url="{{ route('user.delete_trainee') }}"
                                            data-id="{{ $item_trainee->id }}"><i class="fas fa-trash-alt"></i>

                                        </button>
                                    </td>


                                    <!-- Modal view-->
                                    <div class="modal fade" id="exampleModal{{ $item_trainee->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">View item trainee</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 style="color: gray">Name: <span
                                                            style="color: black">{{ $item_trainee->name }}</span></h3>
                                                    <h3 style="color: gray">Date Of Birth: <span
                                                            style="color: black">{{ $item_trainee->dateOfBirth }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Education: <span
                                                            style="color: black">{{ $item_trainee->education }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Programing Languages: <span
                                                            style="color: black">{{ $item_trainee->programingLanguages }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Toeic Score: <span
                                                            style="color: black">{{ $item_trainee->toeicScore }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Experience Details: <span
                                                            style="color: black">{{ $item_trainee->experienceDetails }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Department: <span
                                                            style="color: black">{{ $item_trainee->department }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Location: <span
                                                            style="color: black">{{ $item_trainee->location }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Username: <span
                                                            style="color: black">{{ $item_trainee->users->username }}</span>
                                                    </h3>
                                                    <h3 style="color: gray">Image: </h3>
                                                    <img src="{{ $item_trainee->image }}"
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
                    <div class="float-end d-block m-3">{{ $data_trainee->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function delete_trainee(){
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
                    $('.item_trainee'+id).remove()
                }
            })
        }
        $(function() {
            $(document).on('click','.delete_trainee', delete_trainee)
        })
    </script>
@endsection
