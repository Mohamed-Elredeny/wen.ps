@extends('layouts.site')

@section('content')

        <div class="page_title gradient_overlay" style="background: url(/assets/site/images/page_title_bg.jpg);">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')

                        <div class="col-md-12 col-sm-12">
                            <h1>{{$event->title_ar}}</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                                <li>{{$event->restaurant->name_ar}}</li>
                                <li>{{$event->title_ar}}</li>
                            </ol>
                        </div>

                        @else

                        <div class="col-md-12 col-sm-12">
                            <h1>{{$event->title_en}}</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                                <li>{{$event->restaurant->name_en}}</li>
                                <li>{{$event->title_en}}</li>
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
                    <div class="col-md-8">
                        <div class="slider">
                            <div id="slider-larg" class="owl-carousel image-gallery">

                                <div class="item lightbox-image-icon">
                                    <p
                                        class="hover_effect h_lightbox h_blue">
                                        <img class="img-responsive" src="{{asset('/')}}{{$event->image}}"
                                            alt="Image">
                                    </p>
                                </div>

                            
                                
                            </div>
                            <!--
                            <div id="thumbs" class="owl-carousel">

                                <div class="item"><img class="img-responsive"
                                        src="images/blog/thumb2.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/blog/thumb3.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/blog/thumb4.jpg" alt="Image"></div>

                            </div>
                        -->
                        </div>
                        <div class="main_title mt50">
                            <h2>{{__('site.about_event')}}</h2>
                        </div>
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        <p>{!! $event->description_ar !!}</p>
                        @else
                        <p>{!! $event->description_en !!}</p>                        
                        @endif 
                         
                        <div class="similar_rooms">
                            <div class="main_title t_style5 l_blue s_title a_left">
                                <div class="c_inner">
                                    <h2 class="c_title">{{__('site.similar_event')}}</h2>
                                </div>
                            </div>
                            <div class="similar_rooms">
                                <div class="row">
                                    @if(isset($events) && count($events) > 0)
                                    @foreach($events as $event)
                                    <div class="col-md-4" style="margin-bottom: 25px;">
                                        <article class="room">
                                            <figure>
                                                <a class="hover_effect h_blue h_link" href="{{route('restaurant.event_details',$event->id)}}">
                                                    <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">
                                                </a>
                                                <figcaption>
                                                    <h4><a href="{{route('restaurant.event_details',$event->id)}}">
                                                        
                                                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                            {{$event->title_ar}}
                                                        @else
                                                            {{$event->title_en}}
                                                        @endif 
                                            

                                                    </a></h4>
                                                    <span class="f_right"><a href="{{route('restaurant.event_details',$event->id)}}" class="button btn_sm btn_blue">{{__('site.view_details')}}</a></span>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <aside class="widget">
                                <h4>{{__('site.where_we_are')}}</h4>
                                <div>
                                  
                                  <div id="map" style="height: 400px; width: 100%;"></div> 
                                          <script type="text/javascript">
                                            var val_lat = <?php echo $restaurant->lat ?>;
                                            var val_lng = <?php echo $restaurant->lng ?>;
                                            // Initialize and add the map
                                            function initMap() {
                                              // The location of Uluru
                                              var uluru = {lat: val_lat , lng: val_lng };
                                              // The map, centered at Uluru
                                              var map = new google.maps.Map(
                                                  document.getElementById('map'), {zoom: 15, center: uluru});
                                              // The marker, positioned at Uluru
                                              var marker = new google.maps.Marker({position: uluru, map: map});
                                            }
                                          </script>
                                         <script async defer
                                          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtBEKk-cqgwLOLm0KFxls53J7eNVn6ZRM&libraries&callback=initMap">
                                          </script>  


                                </div>
                            </aside>
                            <aside class="widget">
                                <h4>{{__('site.need_help')}}</h4>
                                <div class="help">
                                    {{__('site.help')}}
                                    <div class="phone"><i class="fa  fa-phone"></i><a href="tel:00970568122334">
                                            00970568122334 </a></div>
                                    <div class="email"><i class="fa  fa-envelope-o "></i>
                                        info@wen.ps
                                        {{__('site.or_us')}} <a href="contact.html"> {{__('site.contact_from')}}</a></div>
                                </div>
                            </aside>
                             
                            <aside class="widget">
                                <h4>{{__('site.latest_events')}}</h4>
                                <div class="latest_posts">

                                    
                                    @if(isset($last_events) && count($last_events) > 0)
                                    @foreach($last_events as $event)
                                    <article class="latest_post">
                                        <figure>
                                            <a href="{{route('restaurant.event_details',$event->id)}}" class="hover_effect h_link h_blue">
                                                <img src="{{asset('/')}}{{$event->image}}" style="width: 120px; height: 62px;" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="{{route('restaurant.event_details',$event->id)}}">
                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                {{$event->title_ar}}
                                            @else
                                                {{$event->title_en}}
                                            @endif 
                                            </a></h6>
                                           <!-- <span><i class="fa fa-calendar"></i>23/11/2016</span>-->
                                        </div>
                                    </article>
                                    @endforeach
                                    @else
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{__('site.not_found')}}
                                    @else
                                        {{__('site.not_found')}}
                                    @endif
                                    @endif

                                </div>
                            </aside>

                            <aside class="widget">
                                <h4>{{__('site.related_restaurants')}}</h4>
                                <div class="latest_posts">
                                    @if(isset($related_restaurants) && count($related_restaurants) > 0)
                                    @foreach($related_restaurants as $restaurant)
                                    <article class="latest_post">
                                        <figure>
                                            <a href="{{route('restaurant.details',$restaurant->id)}}" class="hover_effect h_link h_blue">
                                                <img src="{{asset('/')}}{{$restaurant->logo}}" style="width: 120px; height: 62px;" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="{{route('restaurant.details',$restaurant->id)}}">
                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                {{$restaurant->name_ar}}
                                            @else
                                                {{$restaurant->name_en}}
                                            @endif 
                                            </a></h6>
                                        </div>
                                    </article>
                                    @endforeach
                                    @else
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{__('site.not_found')}}
                                    @else
                                        {{__('site.not_found')}}
                                    @endif
                                    @endif
                                   
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </main>


@endsection