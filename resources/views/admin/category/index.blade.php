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
                            <h4 class="card-title">List Categories</h4>
                            <h5 class="card-subtitle">Manage category</h5>
                            @if (session()->get('message'))
                                <h5 class="card-subtitle mt-3" style="color: green">{{ session()->get('message') }} <i
                                        class="fas fa-exclamation"></i></h5>
                            @endif
                        </div>
                        
                        <div class="ms-auto">
                            <a class="btn btn-success" type="button" href="{{ route('category.create') }}">Add category
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
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_category as $item_category)
                                <tr class="item_category{{ $item_category->id }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h4 class="m-b-0 font-16">{{ $item_category->id }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item_category->name }}</td>
                                    <td>{{ $item_category->description }}</td>
                                    <td>
                                        <a href="{{ route('category.edit',['id'=>$item_category->id]) }}">
                                            <button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i>
    
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger delete_category" data-url="{{ route('category.delete') }}"
                                            data-id="{{ $item_category->id }}"><i class="fas fa-trash-alt"></i>

                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end d-block m-3">{{ $data_category->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function delete_category(){
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
                    $('.item_category'+id).remove()
                }
            })
        }
        $(function() {
            $(document).on('click','.delete_category', delete_category)
        })
    </script>
@endsection
