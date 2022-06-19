@extends('layouts.site')

@section('content')

    <link href="{{asset('assets/site/css/package.css')}}" rel="stylesheet" type="text/css">


        <main id="gallery">

            <div class="page_title gradient_overlay" style="background: url(asstes/site/images/page_title_bg.jpg);">
                <div class="container">
                    <div class="inner">
                        <h1>الباقات</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                            <li>{{__('site.packages')}}</li>
                        </ol>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="grid gallery_items room_grid_item" style="text-align: center;">


                    <div class="row">

                        @foreach($packages as $package)
                        <div class="col-md-4 col-sm-6">
                            <div class="pricing-table-3 basic">
                                @if(LaravelLocalization::getCurrentLocale() == 'en')
                                <div class="pricing-table-header">
                                    @else
                                    <div class="pricing-table-header-ar">
                                    @endif
                                    <h4><strong>

                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                         {{$package->name_ar}}
                                    @else
                                         {{$package->name_en}}
                                    @endif

                                    </strong></h4>
                                    <!--<p>Loerm Ipsum Donor Sit Amet</p>-->
                                </div>
                                <div class="price">
                                    <strong>{{__('site.total_cost')}} {{$package->price}}$</strong> / {{$package->duration}}</div>
                                <div class="pricing-body">
                                    <ul class="pricing-table-ul">
                                        <li><i class="fa-solid fa-circle-dollar"></i>{{__('site.total_cost')}} {{$package->price}}$</li>
                                        <li class="not-avail"><i class="fa fa-envelope"></i> {{__('site.duration')}} {{$package->duration}}</li>
                                    </ul><a href="{{route('package.details',$package->id)}}" class="view-more">{{__('site.show_now')}}</a></div>
                            </div>
                        </div>
                        @endforeach

                    </div>




                    </div>
                </div>
            </div>
        </main>


@endsection
