@extends('layouts.site')

@section('content')


        <div class="page_title gradient_overlay" style="background: url(assets/site/images/page_title_bg.jpg);">
            <div class="container">
                <div class="inner">
                    <h1>{{__('site.all_restaurant')}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                        <li>{{__('site.restaurant')}}</li>
                    </ol>
                </div>
            </div>
        </div>

        <main id="rooms_grid">
            <div class="container">
                <div class="row">

                    @if(isset($restaurants) && count($restaurants))
                    @foreach($restaurants as $restaurant)
                    <div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom: 25px;">
                        <div class="room_grid_item">
                            <figure>

                            @if(isset($restaurant->logo))
                            <a href="{{route('restaurant.details',['restaurant_id'=>$restaurant->id])}}" class="hover_effect h_lightbox h_blue">

                            <img src="{{asset('/')}}{{$restaurant->logo}}" class="img-responsive" alt="Image"></a>

                            @else

                            <a href="{{route('restaurant.details',['restaurant_id'=>$restaurant->id])}}" class="hover_effect h_lightbox h_blue">

                            <img src="{{asset('/')}}assets/site/images/default.jpg" class="img-responsive" width="100%" alt="Image"></a>

                            @endif


                            </figure>
                            <div class="room_info">
                                <h3><a href="{{ route('restaurant.details',$restaurant->id) }}">
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    {{$restaurant->name_ar}}
                                @else
                                    {{$restaurant->name_en}}
                                @endif
                                    </a></h3>
                                <span>{{count($restaurant->restaurant_meals)}} {{__('site.meal')}}</span>
                                <p>
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                     {{Str::limit($restaurant->about_restaurant_ar, 50)}}...
                                @else
                                    {{Str::limit($restaurant->about_restaurant_en, 50)}}...
                                @endif
                               </p>
                                    <div class="room_services">
                                        <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                            data-trigger="hover" data-content="Breakfast Included"
                                            data-original-title="Breakfast"></i>
                                        <i class="fa fa-wifi" data-toggle="popover" data-placement="top"
                                            data-trigger="hover" data-content="Free WiFi" data-original-title="WiFi"></i>
                                        <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                            data-trigger="hover" data-content="Restaurant"
                                            data-original-title="Zante Restaurant"></i>
                                        <i class="fa fa-television" data-toggle="popover" data-placement="top"
                                            data-trigger="hover" data-content="Plasma TV with cable Channel"
                                            data-original-title="Plasma TV"></i>
                                    </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ratings">
                                    @php
                                    $rate_count = \App\models\Rates::where('restaurant_id',$restaurant->id)->count();
                                    $rate = \App\models\Rates::where('restaurant_id',$restaurant->id)->avg('rate');
                                    @endphp

                                    @if($rate == 0)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>                                    @elseif($rate >= 1 && $rate < 2)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    @elseif($rate >= 2 && $rate < 3)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    @elseif($rate >= 3 && $rate < 4)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    @elseif($rate >= 4 && $rate < 5)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    @elseif($rate = 5)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    @endif
                                </div>
                                <h5 class="review-count">{{$rate_count}} {{__('site.rate')}}</h5>
                            </div>

                                <a href="{{ route('restaurant.details',$restaurant->id) }}" class="button  btn_blue btn_full upper mt20">{{__('site.show_now')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $restaurants->links() }}
                    @else
                    <h1 class="text-center">
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                            {{__('site.not_found')}}
                        @else
                            {{__('site.not_found')}}
                        @endif
                    </h1>
                    @endif

                </div>
            </div>
        </main>


@endsection
