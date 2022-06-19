@extends("layouts.resort")
@section('styleChart')
    <link href="{{ asset('assets/admin/libs/c3/c3.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row ">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-pink float-left"><i class="mdi mdi-currency-usd"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-pink">{{$money}}</span>
                            الارباح 
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-primary float-left"><i class="fas fa-suitcase-rolling"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-primary">{{count($all_book)}}</span>
                            عدد الحجزات
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-warning float-left"><i class="mdi mdi-black-mesa"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-warning">{{count($pending_book)}}</span>
                            عدد الحجز قيد الانتظار
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-teal float-left"><i class="fas fa-swimmer"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-teal">{{count($categories)}}</span>
                            عدد الفئات
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-blue-grey float-left"><i class="fas fa-umbrella-beach"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-blue-grey">{{count($places)}}</span>
                            عدد المنتجعات
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-purple float-left"><i class="fas fa-glass-cheers"></i></span>
                        <div class="mini-stat-info text-right">
                            <span class="counter text-purple">{{count($events)}}</span>
                            عدد الحفلات
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
