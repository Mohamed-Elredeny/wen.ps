@extends('layouts.site')

@section('content')

       <div id="hero_restaurant" class="rev_slider gradient_slider" data-version="5.4.1">
            <ul>

                <li data-transition="fade">

                    <img src="{{asset('/')}}{{$resort->logo}}" alt="Image" data-bgposition="center center"
                        data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg"
                        data-no-retina>

                    <div class="tp-caption" data-x="['center','center','center','center']" data-hoffset=""
                        data-y="['250','250','350','350']" data-voffset="" data-responsive_offset="on"
                        data-fontsize="['40','32','28','22']" data-lineheight="['40','32','28','22']"
                        data-whitespace="nowrap"
                        data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        style="color: #fff; font-weight: 700; font-family: 'Raleway', sans-serif;">
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        {{$resort->name_ar}}
                        @else
                        {{$resort->name_en}}
                        @endif

                    </div>
                </li>
            </ul>
        </div>

        <main id="restaurant_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row" style="margin-right: 10px;">
                            <div class="main_title">
                                <h2>{{__('site.our_resort')}}</h2>
                            </div>
                            <div class="gallery"></div>
                            @if(isset($resort->resort_images) && count($resort->resort_images) > 0)
                            @foreach($resort->resort_images as $image)
                            <div class="col-md-4 col-sm-6 mt20 mb20">
                                <figure>
                                <a href="{{asset('/')}}{{$image->image}}" class="hover_effect h_lightbox h_blue">
                                    <img src="{{asset('/')}}{{$image->image}}" class="img-responsive br2 full_width"
                                        alt="Image">
                                </a>
                            </figure>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-4 col-sm-6 mt20 mb20">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{__('site.not_found')}}
                                    @else
                                        {{__('site.not_found')}}
                                    @endif
                            </div>
                            @endif


                            <div class="row">
                                <div class="container">
                                    <div class="col-md-12 col-sm-12">

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

                                        <form method="post" action="{{route('save.rate')}}">
                                           @csrf 
                                           <input type="hidden" name="type" value="resort">
                                           <input type="hidden" name="hotel_id" value="{{$resort->id}}">
                                            <div class="star-rating">
                                              <input type="radio" id="5-stars" name="rate" value="5" />
                                              <label for="5-stars" class="star">&#9733;</label>
                                              <input type="radio" id="4-stars" name="rate" value="4" />
                                              <label for="4-stars" class="star">&#9733;</label>
                                              <input type="radio" id="3-stars" name="rate" value="3" />
                                              <label for="3-stars" class="star">&#9733;</label>
                                              <input type="radio" id="2-stars" name="rate" value="2" />
                                              <label for="2-stars" class="star">&#9733;</label>
                                              <input type="radio" id="1-star" name="rate" value="1" />
                                              <label for="1-star" class="star">&#9733;</label>
                                            </div>
                                            <button class="btn btn-success" type="submit" style="margin-top: 1%;">{{__('site.rate')}}</button> 
                                       </form>

                         
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

                            <div class="row" >
                                <div class="container">
                                    <div class="col-md-12 col-sm-12">
                                <div class="main_title" >
                                    <h2 style="margin-top:54px;">{{__('site.resort_details')}}</h2>
                                </div>
                                <p>
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$resort->about_resort_ar}}
                                    @else
                                        {{$resort->about_resort_en}}
                                    @endif

                                </p>
                            </div>
                          </div>
                    </div>
                            <blockquote>
                                <!--<i class="fa fa-quote-left"></i>-->
                                <span class="quote_text">{{__('site.work_from')}} {{$resort->start_work}} {{__('site.work_to')}} {{$resort->end_work}}</span>
                            </blockquote>
                            
                            <div class="similar_rooms">
                                <div class="main_title t_style5 l_blue s_title a_left">
                                    <div class="c_inner">
                                        <h2 class="c_title">{{__('site.our_places')}}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    @if(isset($resort->resort_resorts) && count($resort->resort_resorts) > 0)
                                    @foreach($resort->resort_resorts as $resorts)
                                    <div class="col-md-4">
                                        <article>
                                            <figure>
                                                <a href="{{route('place.details',$resorts->id)}}" class="hover_effect h_blue h_link"><img
                                                        src="{{asset('/')}}{{$resorts->image}}" alt="Image"
                                                        class="img-responsive"></a>
                                                <div class="price">
                                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                        {{$resort->name_ar}}
                                                    @else
                                                        {{$resort->name_en}}
                                                    @endif
                                                <span> {{$resorts->price}}</span></div>
                                                
                                            </figure>
                                        </article>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-md-4">
                                        

                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{__('site.not_found')}}
                                    @else
                                        {{__('site.not_found')}}
                                    @endif

                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="main_title mt50">
                                <h2>{{__('site.our_events')}}</h2>
                            </div>
                            <div class="similar_rooms">
                                <div class="row">
                                    @if(isset($resort->resort_events) && count($resort->resort_events) > 0)
                                    @foreach($resort->resort_events as $event)
                                    <div class="col-md-4" style="margin-bottom: 25px;">
                                        <article class="room">
                                            <figure>
                                                <a class="hover_effect h_blue h_link" href="{{route('resort.event_details',$event->id)}}">
                                                    <img src="{{asset('/')}}{{$event->image}}" class="img-responsive" alt="Image">
                                                </a>
                                                <figcaption>
                                                    <h4><a href="{{route('resort.event_details',$event->id)}}">{{$event->title}}</a></h4>
                                                    <span class="f_right"><a href="{{route('resort.event_details',$event->id)}}" class="button btn_sm btn_blue">{{__('site.view_details')}}</a></span>
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
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sidebar">

 
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

                            <aside class="widget">
                                <div class="vbf"> 
                                    <h2 class="form_title"><i class="fa fa-calendar"></i> {{__('site.book_online')}}</h2>
                                    <form id="booking-form" class="inner" method="post" action="{{route('book.place')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control" name="name"
                                                placeholder="{{__('site.enter_name')}}" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="email"
                                                placeholder="{{__('site.enter_email')}}" type="email">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="phone"
                                                placeholder="{{__('site.enter_phone')}}" type="number">
                                        </div>
                                        <div class="form-group">
                                            <div class="form_select">
                                                <select name="place_id" class="form-control"
                                                    title="{{__('site.select_room')}}" data-header="Room Type">
                                                    @foreach($all_places as $place)
                                                    <option value="{{$place->id}}">

                                                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                            {{$place->name_ar}}
                                                        @else
                                                            {{$place->name_en}}
                                                        @endif 

                                                     </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <!-- 
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="form_select">
                                                <select name="booking-adults" class="form-control md_noborder_right"
                                                    title="{{__('site.adults')}}" data-header="Adults">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="form_select">
                                                <select name="booking-children" class="form-control" title="{{__('site.children')}}"
                                                    data-header="Children">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        -->

                                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="input-group">
                                                <div class="form_date">
                                                    <input type="text" class="datepicker form-control md_noborder_right"
                                                        name="date_from" placeholder="{{__('site.arrival_data')}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="input-group">
                                                <div class="form_date">
                                                    <input type="text" class="datepicker form-control"
                                                        name="date_to" placeholder="{{__('site.departure_date')}}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" name="days"
                                                placeholder="{{__('site.booking_nights')}}" type="number">
                                        </div>

                                        <button class="button btn_lg btn_blue btn_full" type="submit">{{__('site.book_room')}}</button>
                                        
                                        <!--
                                        <div class="a_center mt10">
                                            <a href="booking-form.html" class="a_b_f">{{__('site.advanced_booking_form')}}</a>
                                        </div>
                                    -->
                                    </form>
                                </div>
                            </aside>
                            <aside class="widget">
                                <h4>{{__('site.where_we_are')}}</h4>
                                <div>
                                  
                                  <div id="map" style="height: 400px; width: 100%;"></div> 
                                          <script type="text/javascript">
                                            var val_lat = <?php echo $resort->lat ?>;
                                            var val_lng = <?php echo $resort->lng ?>;
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
                                    <div class="phone"><i class="fa  fa-phone"></i><a href="tel:{{$resort->phone}}">
                                            {{$resort->phone}} </a></div>
                                    <div class="email"><i class="fa  fa-envelope-o "></i>
                                        {{$resort->email}}
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
                                            <a href="{{route('resort.event_details',$event->id)}}" class="hover_effect h_link h_blue">
                                                <img src="{{asset('/')}}{{$event->image}}" style="width: 120px; height: 62px;" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="{{route('resort.event_details',$event->id)}}">
                                                

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
                                <h4>{{__('site.related_resorts')}}</h4>
                                <div class="latest_posts">
                                    @if(isset($related_resorts) && count($related_resorts) > 0)
                                    @foreach($related_resorts as $resort)                                    
                                    <article class="{{route('resort.details',$resort->id)}}">
                                        <figure>
                                            <a href="{{route('resort.details',$resort->id)}}" class="hover_effect h_link h_blue">
                                                <img src="{{asset('/')}}{{$resort->logo}}" style="width: 120px; height: 62px;" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="{{route('resort.details',$resort->id)}}">

                                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                        {{$resort->name_ar}}
                                                    @else
                                                        {{$resort->name_en}}
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