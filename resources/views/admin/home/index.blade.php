@extends('admin.dashboard')
@section('content')
    <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statistic</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                        {{-- <li class="feed-item">
                                            <div class="feed-icon bg-info"><i class="far fa-bell"></i></div> You have 4
                                            pending tasks. <span class="ms-auto font-12 text-muted">Just Now</span>
                                        </li> --}}
                                        <li class="feed-item">
                                            <div class="feed-icon bg-success"><i class="ti-server"></i></div><h4>{{ $count_course }} course.</h4>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-warning"><i class="ti-shopping-cart"></i></div><h4>{{ $count_category }} category.</h4> 
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-danger"><i class="ti-user"></i></div><h4>{{ $count_users }} user.</h4> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
@endsection