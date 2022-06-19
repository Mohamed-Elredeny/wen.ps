@extends('layouts.site')

@section('content')


        <div class="page_title gradient_overlay" style="background: url(/assets/site/images/page_title_bg.jpg);">
            <div class="container">
                <div class="inner">
                    <h1>{{__('site.all_events')}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                        <li>{{__('site.all_events')}}</li>
                    </ol>
                </div>
            </div>
        </div>

        <main id="gallery">
            <div class="container">
                <div class="grid_filters">
                    <a href="#" data-filter="*" class="button btn_sm btn_blue active">{{__('site.all')}}</a>
                    <a href="#" data-filter=".restaurants" class="button btn_sm btn_blue">{{__('site.restaurant')}}</a>
                    <a href="#" data-filter=".hotels" class="button btn_sm btn_blue">{{__('site.hotels')}}</a>
                    <a href="#" data-filter=".resorts" class="button btn_sm btn_blue">{{__('site.resorts')}}</a>
                    <!-- <a href="#" data-filter=".g_spa" class="button btn_sm btn_blue">SPA</a> -->
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="grid gallery_items room_grid_item">
                        
                        @if(isset($hotel_events) && count($hotel_events) > 0)
                        @foreach($hotel_events as $event)
                        <figure class="g_item col-md-3 col-sm-6 hotels">
                            <a href="{{asset('/')}}{{$event->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">
                            </a>

                            @if(LaravelLocalization::getCurrentLocale() == 'ar')   
                            <figcaption>
                                <h4>{{$event->hotel->name_ar}}</h4>
                                <span>{{$event->title_ar}}</span>
                            </figcaption>
                            @else
                            <figcaption>
                                <h4>{{$event->hotel->name_en}}</h4>
                                <span>{{$event->title_en}}</span>
                            </figcaption>
                            @endif
                        </figure>
                        @endforeach
                        @endif

                        @if(isset($resort_events) && count($resort_events) > 0)
                        @foreach($resort_events as $event)
                        <figure class="g_item col-md-3 col-sm-6 resorts">
                            <a href="{{asset('/')}}{{$event->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">
                            </a>
                            @if(LaravelLocalization::getCurrentLocale() == 'ar')   
                            <figcaption>
                                <h4>{{$event->resort->name_ar}}</h4>
                                <span>{{$event->title_ar}}</span>
                            </figcaption>
                            @else
                            <figcaption>
                                <h4>{{$event->resort->name_en}}</h4>
                                <span>{{$event->title_en}}</span>
                            </figcaption>
                            @endif
                        </figure>
                        @endforeach
                        @endif

                        @if(isset($restaurant_events) && count($restaurant_events) > 0)
                        @foreach($restaurant_events as $event)
                        <figure class="g_item col-md-3 col-sm-6 restaurants">
                            <a href="{{asset('/')}}{{$event->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">
                            </a>

                            @if(LaravelLocalization::getCurrentLocale() == 'ar')   
                            <figcaption>
                                <h4>{{$event->restaurant->name_ar}}</h4>
                                <span>{{$event->title_ar}}</span>
                            </figcaption>
                            @else
                            <figcaption>
                                <h4>{{$event->restaurant->name_en}}</h4>
                                <span>{{$event->title_en}}</span>
                            </figcaption>
                            @endif

                        </figure>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </main>

@endsection