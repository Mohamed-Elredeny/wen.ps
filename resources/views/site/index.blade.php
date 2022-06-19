@extends('layouts.site')
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
@section('content')
    <style>
        .redoCard{
            padding:20px
        }
        .redoCard:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
        }
        *{
            font-family: Cairo !important
        }
    </style>
        <div class="rev_slider_wrapper fullscreen-container" style="direction:ltr !important;" >
            <div id="fullscreen_hero_video" class="rev_slider fullscreenbanner gradient_slider" style="display:none"
                data-version="5.4.1">
                <ul>
                    <li data-transition="fade">

                        <img src="{{asset('/')}}assets/site/images/slider/video_fullscreen.jpg" alt="Image" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg"
                            data-no-retina>

                        <div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute"
                            data-videomp4="{{asset('/')}}assets/site/videos/hero_video.mp4" data-vimeoid="88944221"
                            data-videoattributes="title=0&amp;byline=0&amp;portrait=0&amp;api=1" data-videowidth="100%"
                            data-videoheight="100%" data-videocontrols="none" data-videostartat="00:00"
                            data-videoendat="" data-videoloop="loop" data-forceCover="1" data-aspectratio="4:3"
                            data-autoplay="true" data-autoplayonlyfirsttime="false" data-nextslideatend="false">
                        </div>

                        <div class="tp-caption gradient_overlay" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                            data-whitespace="nowrap" data-transform_idle="o:1;"
                            data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                            data-transform_out="opacity:0;s:500;s:500;" data-start="0" data-basealign="slide"
                            data-responsive_offset="off" data-responsive="off"
                            style="z-index: 7;border-color:rgba(0, 0, 0, 0);">
                        </div>
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="middle"
                            data-voffset="" data-fontsize="['100','90','70','60']"
                            data-lineheight="['100','90','70','60']" data-whitespace="nowrap"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 99; color: #fff; font-weight: 700;   font-family: 'DroidArabicKufiRegular' !important;height: 300px">
                            عـــالـــم ويــيــن
                        </div>
                        @else
                            <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="middle"
                                 data-voffset="" data-fontsize="['100','90','70','60']"
                                 data-lineheight="['100','90','70','60']" data-whitespace="nowrap"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 style="z-index: 99; color: #fff; font-weight: 700;">
                                WEN WORLD
                            </div>
                        @endif

                        <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                            data-hoffset="['-300','-270','-200','-160']" data-y="middle"
                            data-voffset="['-12','-15','-24','-28']" data-fontsize="['11','10','7','6']"
                            data-lineheight="['11','10','7','6']" data-whitespace="nowrap" data-width="100"
                            data-height="100" data-responsive_offset="on"
                            data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"x:[40%];z:0;rX:0deg;rY:0;rZ:-90;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;rZ:-90","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 13; color: #fff; font-weight: 500; ">
                            @if(LaravelLocalization::getCurrentLocale() == 'ar')

                            @else
                            WELCOME TO
                            @endif
                        </div>

                        <!-- <a class="tp-caption button btn_yellow" href="booking-form.html" data-x="center" data-hoffset=""
                            data-y="middle" data-voffset="120" data-fontsize="14" data-responsive_offset="on"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 11; "><i class="fa fa-calendar"></i>BOOK A ROOM NOW
                        </a> -->
                    </li>
                </ul>
            </div>
        </div>





<!--      Start Map      -->
                <style>
                    /* Always set the map height explicitly to define the size of the div
                   * element that contains the map. */
                    #map {
                        height: 500px;
                    }

                    /* Optional: Makes the sample page fill the window. */
                    html,
                    body {
                        height: 100%;
                        margin: 0;
                        padding: 0;
                    }

                    #pac-input {
                        background-color: #fff;
                        font-family: Roboto;
                        font-size: 15px;
                        font-weight: 300;
                        margin-left: 12px;
                        padding: 0 11px 0 13px;
                        text-overflow: ellipsis;
                        width: 400px;
                    }

                    #pac-input:focus {
                        border-color: #4d90fe;
                    }
                </style>
                <div class="container mt-3" id="search_redo">
                    <br>
                    <div class="main_title mt_wave mt_blue a_center">
                        <h2>{{__('site.search')}}</h2>
                    </div>
                    <div class="row">
                        <br>
                    <div class="col-md-3 col-sm-12">
                        <a href="{{route('home.render.index_search',['filter'=>'all'])}}"  class="button btn_sm btn_blue col-sm-10">All</a>
                    </div>
                        <div class="col-md-3 col-sm-12">
                            <a href="{{route('home.render.index_search',['filter'=>'restaurants'])}}"  class="button btn_sm btn_blue col-sm-10">Restaurants</a>
                    </div>
                        <div class="col-md-3 col-sm-12">
                            <a href="{{route('home.render.index_search',['filter'=>'hotels'])}}"  class="button btn_sm btn_blue col-sm-10">Hotels</a>
                    </div>
                        <div class="col-md-3 col-sm-12">
                            <a href="{{route('home.render.index_search',['filter'=>'resorts'])}}"  class="button btn_sm btn_blue col-sm-10">Resorts</a>

                    </div>

                    </div>
                </div>
                <br>
                <div id="map"></div>
            </div>

        <script>
            let map;
            function getRandomInt(max) {
                return Math.floor(Math.random() * max);
            }

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng({{$lat_search}}, {{$lng_search}}),
                    zoom: 16,
                });




                //Get My Location
                infoWindow = new google.maps.InfoWindow();

                const locationButton = document.createElement("button");
                locationButton.textContent = "Get My Current Location";
                locationButton.classList.add("custom-map-control-button");

                const Restaurant = document.createElement("button");
                Restaurant.classList.add("custom-map-control-button");
                Restaurant.textContent = "Get Next";

                map.controls[google.maps.ControlPosition.TOP_CENTER].push(Restaurant);
                Restaurant.addEventListener("click", () => {
                    <?php $rand = rand(0,$count_list); ?>

                    const pos1 = {
                        lat: {{$list[$rand]['lng']}},
                        lng:  {{$list[$rand]['lng']}}
                    };
                    //infoWindow.setPosition(pos1);
                    //infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos1);
                    location.href  = "https://wen.ps/render/map/all";
                });

                map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                locationButton.addEventListener("click", () => {
                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };

                                infoWindow.setPosition(pos);
                                infoWindow.setContent("Location found.");
                                infoWindow.open(map);
                                map.setCenter(pos);
                            },
                            () => {
                                handleLocationError(true, infoWindow, map.getCenter());
                            }
                        );
                    } else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, infoWindow, map.getCenter());
                    }
                });

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(
                        browserHasGeolocation
                            ? "Error: The Geolocation service failed."
                            : "Error: Your browser doesn't support geolocation."
                    );
                    infoWindow.open(map);
                }

                //End of Get my location







                const iconBase =
                    "https://developers.google.com/maps/documentation/javascript/examples/full/images/";
                const icons = {
                    hotel: {
                        icon: "{{asset('assets/admin/images/maps/download1.png')}}",
                    },
                    restaurant: {
                        icon: "{{asset('assets/admin/images/maps/download1.png')}}",
                    },
                    resort: {
                        icon: "{{asset('assets/admin/images/maps/download1.png')}}",
                    },
                };
                const features = [
                        @foreach($hotels_search as $hotel)
                    {
                        position: new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}}),
                        type: "hotel",
                        id: {{$hotel->id}}
                    },
                        @endforeach

                        @foreach($restaurants_search as $hotel)
                    {
                        position: new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}}),
                        type: "restaurant",
                        id: {{$hotel->id}}
                        },
                        @endforeach

                        @foreach($resorts_search as $hotel)
                    {
                        position: new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}}),
                        type: "resort",
                        id: {{$hotel->id}}

                        },
                    @endforeach
                ];

                // Create markers.
                for (let i = 0; i < features.length; i++) {
                    const marker = new google.maps.Marker({
                        position: features[i].position,
                        icon: icons[features[i].type].icon,
                        map: map,
                        animation: google.maps.Animation.DROP,
                    });
                    const contentString =
                        '<div id="content">' +
                        '<div id="siteNotice">' +
                        "</div>" +
                        '<h1 id="firstHeading" class="firstHeading">'+ features[i].id +'</h1>' +
                        '<div id="bodyContent">' +
                        "<p><b>Resturant Name</b> also referred to as <b>Ayers Rock</b> is a large " +
                        "sandstone rock formation in the southern part of the " +
                        "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
                        "south west of the nearest large town, Alice Springs; 450&#160;km " +
                        "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
                        "features of the Uluru - Kata Tjuta National Park. Uluru is " +
                        "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
                        "Aboriginal people of the area. It has many springs, waterholes, " +
                        "rock caves and ancient paintings. Uluru is listed as a World " +
                        "Heritage Site.</p>" +
                        '<p>Visit Resturant , <a href="https://en.wikipedia.org/w/index.php">' +
                        "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
                        "</p>" +
                        "</div>" +
                        "</div>";
                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                    });
                    marker.addListener("click", () => {
                        infowindow.open({
                            anchor: marker,
                            map,
                            shouldFocus: false,
                        });
                    });
                }
            }



        </script>
        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIDWVimEjJLhDEH11PFZmpZQqkgEXl5ao&callback=initMap&v=weekly"
            async
        ></script>

<!--      End Map      -->



        @if(LaravelLocalization::getCurrentLocale() == 'ar')
        <section class="white_bg" id="rooms" dir="rtl">
        @else
        <section class="white_bg" id="rooms">
        @endif
            <div class="container mt-3">
                <div class="main_title mt_wave mt_blue a_center">
                    <h2>{{__('site.our_fav_hotel')}}</h2>
                </div>
                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                @else
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                @endif
                <div class="row">
                    @if(isset($hotels) && count($hotels) > 0)
                    @foreach($hotels as $hotel)
                    <div class="col-md-4 redoCard" style="margin-bottom: 25px; ">
                        <article class="room">
                            <figure>
                                <div class="price">{{count($hotel->hotel_rooms)}} <span> {{__('site.rooms')}}</span></div>
                                @if(isset($hotel->logo))
                                <a class="hover_effect h_blue h_link" href="{{route('hotel.details',$hotel->id)}}">
                                    <img src="{{asset('/')}}{{$hotel->logo}}" class="img-responsive" alt="Image">
                                </a>
                                @else
                                <a class="hover_effect h_blue h_link" href="{{route('hotel.details',$hotel->id)}}">
                                    <img src="{{asset('/')}}assets/site/images/default.jpg" class="img-responsive" alt="Image">
                                </a>

                                @endif


                                <figcaption>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="ratings">
                                            @php
                                                $rate_count = \App\models\Rates::where('hotel_id',$hotel->id)->count();
                                                $rate = \App\models\Rates::where('hotel_id',$hotel->id)->avg('rate');
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
                                    </div>
                                    <h4><a href="{{route('hotel.details',$hotel->id)}}">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$hotel->name_ar}}
                                    @else
                                        {{$hotel->name_en}}
                                    @endif

                                    </a></h4>
                                    <span class="f_right"><a href="{{route('hotel.details',$hotel->id)}}" class="button btn_sm btn_blue">{{__('site.show_now')}}</a></span>
                                </figcaption>
                            </figure>



                        </article>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-4" style="margin-bottom: 25px;">

                            {{__('site.not_found')}}
                    </div>
                    @endif

                </div>
                <div class="mt40 a_center">
                    <a class="button btn_sm btn_yellow" href="{{route('all.hotel')}}">{{__('site.view_all_hotel')}}</a>
                </div>
            </div>

            <div class="container" style="margin-top: 100px;">
                <div class="main_title mt_wave mt_blue a_center">
                    <h2>{{__('site.our_fav_restaurant')}}</h2>
                </div>
                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                @else
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                @endif
                <div class="row">
                    @if(isset($restaurants) && count($restaurants) > 0)
                    @foreach($restaurants as $restaurant)
                            <div class="col-md-4 redoCard" style="margin-bottom: 25px; ">
                        <article class="room">
                            <figure>
                                <div class="price">{{count($restaurant->restaurant_meals)}}  <span> {{__('site.meal')}}</span></div>

                                    @if(isset($restaurant->logo))
                                    <a href="{{route('restaurant.details',['restaurant_id'=>$restaurant->id])}}" class="hover_effect h_lightbox h_blue">
                                    <img src="{{asset('/')}}{{$restaurant->logo}}" class="img-responsive" alt="Image">
                                    </a>
                                    @else
                                    <a href="{{route('restaurant.details',['restaurant_id'=>$restaurant->id])}}" class="hover_effect h_lightbox h_blue">
                                    <img src="{{asset('/')}}assets/site/images/default.jpg" class="img-responsive" alt="Image">
                                    </a>
                                    @endif
                                <figcaption>
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
                                    </div>
                                    <h4><a href="{{ route('restaurant.details',$restaurant->id) }}">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$restaurant->name_ar}}
                                    @else
                                        {{$restaurant->name_en}}
                                    @endif
                                      </a></h4>
                                    <span class="f_right"><a href="{{ route('restaurant.details',$restaurant->id) }}" class="button btn_sm btn_blue">{{__('site.show_now')}}</a></span>
                                </figcaption>
                            </figure>



                        </article>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-4" style="margin-bottom: 25px;">
                                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{__('site.not_found')}}
                                    @else
                                        {{__('site.not_found')}}
                                    @endif
                    </div>
                    @endif


                </div>
                <div class="mt40 a_center">
                    <a class="button btn_sm btn_yellow" href="{{route('all.restaurant')}}">{{__('site.view_all_restaurant')}}</a>
                </div>
            </div>

            <div class="container" style="margin-top: 100px;">
                <div class="main_title mt_wave mt_blue a_center">
                    <h2>{{__('site.our_fav_resort')}}</h2>
                </div>
                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                @else
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                @endif

                <div class="row">
                    @if(isset($resorts) && count($resorts) > 0)
                    @foreach($resorts as $resort)
                            <div class="col-md-4 redoCard" style="margin-bottom: 25px; ">
                        <article class="room">
                            <figure>
                                <div class="price">{{count($resort->resort_resorts)}}  <span>{{__('site.resort')}}</span></div>
                                @if(isset($resort->logo))
                                    <a href="{{route('resort.details',['restaurant_id'=>$resort->id])}}" class="hover_effect h_lightbox h_blue">
                                    <img src="{{asset('/')}}{{$resort->logo}}" class="img-responsive" alt="Image">
                                    </a>
                                @else
                                    <a href="{{route('resort.details',['restaurant_id'=>$resort->id])}}" class="hover_effect h_lightbox h_blue">
                                    <img src="{{asset('/')}}assets/site/images/default.jpg" class="img-responsive" alt="Image">
                                    </a>
                                @endif
                                <figcaption>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="ratings">
                                            @php
                                                $rate_count = \App\models\Rates::where('resort_id',$resort->id)->count();
                                                $rate = \App\models\Rates::where('resort_id',$resort->id)->avg('rate');
                                            @endphp

                                            @if($rate == 0)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            @elseif($rate >= 1 && $rate < 2)
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
                                    </div>
                                    <h4><a href="{{route('resort.details',$resort->id)}}">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$resort->name_ar}}
                                    @else
                                        {{$resort->name_en}}
                                    @endif
                                    </a></h4>
                                    <span class="f_right"><a href="{{route('resort.details',$resort->id)}}" class="button btn_sm btn_blue">{{__('site.show_now')}}</a></span>
                                </figcaption>
                            </figure>



                        </article>
                    </div>
                    @endforeach
                    @else
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{__('site.not_found')}}
                                    @else
                                        {{__('site.not_found')}}
                                    @endif
                    @endif


                </div>
                <div class="mt40 a_center">
                    <a class="button btn_sm btn_yellow" href="{{route('all.resort')}}">{{__('site.view_all_resort')}}</a>
                </div>
            </div>
        </section>

        <section class="lightgrey_bg" id="features">
            <div class="container" style="direction: ltr !important">
                <div class="main_title mt_wave mt_blue a_center">
                    <h2>{{__('site.our_service')}}</h2>
                </div>

                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                    <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                        veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                    @else
                    <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                        veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                    @endif

                <div class="row">
                    <div class="col-md-7">
                        <div data-slider-id="features" id="features_slider" class="owl-carousel">
                            <div><img src="{{asset('/')}}assets/site/images/restaurant.jpg" class="img-responsive" alt="Image" style="height: 320px;"></div>
                            <div><img src="{{asset('/')}}assets/site/images/hotels/1.jpg" class="img-responsive" alt="Image" style="height: 320px;"></div>
                            <div><img src="{{asset('/')}}assets/site/images/swimming.jpg" class="img-responsive" alt="Image" style="height: 320px;"></div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="owl-thumbs" data-slider-id="features">
                            <div class="owl-thumb-item">
                                <span class="media-left"><i class="flaticon-food"></i></span>
                                <div class="media-body">
                                    <h5>Restaurant</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                        euismod tincidunt ut laoreet.</p>
                                </div>
                            </div>
                            <div class="owl-thumb-item">
                                <span class="media-left"><i class="flaticon-business"></i></span>
                                <div class="media-body">
                                    <h5>Hotels</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                        euismod tincidunt ut laoreet.</p>
                                </div>
                            </div>
                            <div class="owl-thumb-item">
                                <span class="media-left"><i class="flaticon-beach"></i></span>
                                <div class="media-body">
                                    <h5>Resorts</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                        euismod tincidunt ut laoreet.</p>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </section>
        @if(LaravelLocalization::getCurrentLocale() == 'ar')
        <main id="gallery" dir="rtl">
        @else
        <main id="gallery">
        @endif
            <div class="main_title mt_wave mt_blue a_center">
                    <h2 style="color: #1dc1f8;">{{__('site.our_events')}}</h2>
                </div>
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
            <div class="container">
                <div class="grid_filters">
                    <a href="#" data-filter="*" class="button btn_sm btn_blue active">{{__('site.all')}}</a>
                    <a href="#" data-filter=".restaurants" class="button btn_sm btn_blue">{{__('site.restaurant')}}</a>
                    <a href="#" data-filter=".hotels" class="button btn_sm btn_blue">{{__('site.hotels')}}</a>
                    <a href="#" data-filter=".resorts" class="button btn_sm btn_blue">{{__('site.resorts')}}</a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="grid  ">

                        @if(isset($hotel_events) && count($hotel_events) > 0)
                        @foreach($hotel_events as $event)
                        <figure class="g_item col-md-3 col-sm-6 hotels">
                            <a href="{{route('hotel.event_details',$event->id)}}" target="_blank">
                           @if(isset($event->image))
                                  <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">
                            @else
                                <img src="{{asset('/')}}assets/site/images/default.jpg" class="img-responsive" alt="Image">
                            @endif
                            <figcaption>
                                <h4 class="text-center h4 pt-2">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                     {{$event->title_ar}}
                                    @else
                                      {{$event->title_en}}
                                    @endif
                                </h4>
                            </figcaption>
                            </a>
                        </figure>
                        @endforeach
                        @endif

                        @if(isset($restaurant_events) && count($restaurant_events) > 0)
                        @foreach($restaurant_events as $event)
                        <figure class="g_item col-md-3 col-sm-6 restaurants">
                            <a href="{{route('restaurant.event_details',$event->id)}}" target="_blank">
                            @if(isset($event->image))
                                <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">
                            @else
                                <img src="{{asset('/')}}assets/site/images/default.jpg" class="img-responsive" alt="Image">
                            @endif
                            <figcaption>
                                <h4 class="text-center h4 pt-2">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                       {{$event->title_ar}}
                                    @else
                                       {{$event->title_en}}
                                    @endif
                                </h4>
                            </figcaption>
                            </a>
                        </figure>
                        @endforeach
                        @endif

                        @if(isset($resort_events) && count($resort_events) > 0)
                        @foreach($resort_events as $event)
                        <figure class="g_item col-md-3 col-sm-6 resorts">
                            <a href="{{route('resort.event_details',$event->id)}}" target="_blank">

                            @if(isset($event->image))
                                <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">

                            @else
                                <img src="{{asset('/')}}assets/site/images/default.jpg" class="img-responsive" alt="Image">

                            @endif
                            <figcaption>
                                <h4 class="text-center h4 pt-2">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                       {{$event->title_ar}}
                                    @else
                                      {{$event->title_en}}
                                    @endif
                                </h4>
                            </figcaption>
                            </a>
                        </figure>
                        @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </main>

        <!-- <section id="video">
            <div class="inner gradient_overlay">
                <div class="container">
                    <div class="video_popup">
                        <a class="popup-vimeo" href="videos/hero_video.mp4"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </section> -->
<!--        @if(LaravelLocalization::getCurrentLocale() == 'ar')
        <section class="white_bg" id="contact" dir="rtl">
        @else
        <section class="white_bg" id="contact">
        @endif
            <div class="container">
                <div class="main_title mt_wave mt_blue a_center">
                    <h2 class="c_title">{{__('site.location_contact')}}</h2>
                </div>
                <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                <div class="row">
                    <div class="col-md-6">

                        <div id="map"></div>

                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="contact-items">
                                <div class="col-md-4 col-sm-4">
                                    <div class="contact-item">
                                        <i class="glyphicon glyphicon-map-marker"></i>
                                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        <h6>نابلس - فلسطين</h6>
                                        @else
                                        <h6>Nablus - Palestine</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="contact-item">
                                        <i class="glyphicon glyphicon-phone-alt"></i>
                                        <h6>00970568122334</h6>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="contact-item">
                                        <i class="fa fa-envelope"></i>
                                        <h6>info@wen.ps
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form method="post" id="contact-form" name="contact-form" action="{{route('home.saveContactUs')}}">
                        @csrf
                            <div id="contact-result"></div>
                            <div class="form-group">
                                <input class="form-control" name="name" placeholder="{{__('site.name')}}" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" required placeholder="{{__('site.enter_email')}}">
                            </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="phone" placeholder="{{__('site.enter_phone')}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="subject" placeholder="{{__('site.subject')}}">
                                </div>
                            <div class="form-group">
                                <textarea class="form-control" required name="message" placeholder="{{__('site.message')}}"></textarea>
                            </div>
                            <button class="button btn_lg btn_blue btn_full upper" type="submit"><i
                                    class="fa fa-location-arrow"></i>{{__('site.send')}}</button>
                        </form>
                    </div>

                    <div class="col-md-12">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block text-center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block text-center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    </div>



                </div>
            </div>
        </section>-->

@endsection

