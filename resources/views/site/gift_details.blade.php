
@extends('layouts.site')

@section('content')

        <div class="page_title gradient_overlay" style="background: url(/assets/site/images/page_title_bg.jpg);">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        <div class="col-md-12 col-sm-12">
                            <h1>{{$gift->name_ar}}</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                                <li>{{$gift->name_ar}}</li>
                            </ol>
                        </div>
                        @else
                        <div class="col-md-12 col-sm-12">
                            <h1>{{$gift->name_en}}</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                                <li>{{$gift->name_en}}</li>
                            </ol>
                        </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>

        <main id="room_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="slider">
                            <div id="slider-larg" class="owl-carousel image-gallery">

                                <div class="item lightbox-image-icon">
                                    <p
                                        class="hover_effect h_lightbox h_blue">
                                        <img class="img-responsive" src="{{asset('/')}}{{$gift->image}}"
                                            alt="Image">
                                    </p>
                                </div>

                            
                                
                            </div>
                    
                        </div>
                        <div class="main_title mt50">
                            <h2>{{__('site.about_gift')}}</h2>
                        </div>

                        @if(LaravelLocalization::getCurrentLocale() == 'ar')    
                        <p class="text-center">{!! $gift->details_ar !!}</p>
                        @else
                        <p class="text-center">{!! $gift->details_en !!}</p>
                        @endif

                         
                    </div>
                    
                </div>
            </div>
        </main>


@endsection