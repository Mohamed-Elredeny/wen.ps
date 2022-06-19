@extends('layouts.site')

@section('content')


        <div class="page_title gradient_overlay" style="background: url(asstes/site/images/page_title_bg.jpg);">
            <div class="container">
                <div class="inner">
                    <h1>{{__('site.gifts')}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                        <li>{{__('site.gifts')}}</li>
                    </ol>
                </div>
            </div>
        </div>

        <main id="gallery">
           
            <div class="container">
                <div class="row">
                    <div class="grid gallery_items room_grid_item" style="text-align: center;">

              
                        @foreach($gifts as $gift) 
                        <figure class="g_item col-md-3 col-sm-6 g_swimming_pool">
                            <a href="{{asset('/')}}{{$gift->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{'/'}}{{$gift->image}}" class="img-responsive" alt="Image">
                            </a>
                            <figcaption>
                                <a href="{{route('gift.details',$gift->id)}}" class=" h_link h_blue" style="font-size: 1.2em;">
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                {{$gift->name_ar}}
                                @else
                                {{$gift->name_en}}
                                @endif
                                </a>
                                <span>{{__('site.points')}} {{$gift->points}}</span>
                            </figcaption>
                        </figure>
                        @endforeach

                    </div>
                </div>
            </div>
        </main>


@endsection