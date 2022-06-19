@extends('layouts.site')

@section('content')

        <div id="hero_restaurant" class="rev_slider gradient_slider" data-version="5.4.1">
            <ul>

                <li data-transition="fade">

                    <img src="{{asset('/')}}{{$restaurant->logo}}" alt="Image" data-bgposition="center center"
                        data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg"
                        data-no-retina>

                    <div class="tp-caption" data-x="['center','center','center','center']" data-hoffset=""
                        data-y="['250','250','350','350']" data-voffset="" data-responsive_offset="on"
                        data-fontsize="['40','32','28','22']" data-lineheight="['40','32','28','22']"
                        data-whitespace="nowrap"
                        data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        style="color: #fff; font-weight: 700; font-family: 'Raleway', sans-serif;">
                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        {{$restaurant->name_ar}}
                        @else
                        {{$restaurant->name_en}}
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
                                <h2>{{__('site.our_restaurant')}}</h2>
                            </div>
                            <div class="gallery"></div>
                            @if(isset($restaurant->restaurant_images) && count($restaurant->restaurant_images) > 0)
                            @foreach($restaurant->restaurant_images as $image)
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

                                        <form method="post" action="{{route('save.rate')}}">
                                           @csrf 
                                           <input type="hidden" name="type" value="restaurant">
                                           <input type="hidden" name="hotel_id" value="{{$restaurant->id}}">
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
                                    <h2 style="margin-top:54px;">{{__('site.restaurant_details')}}</h2>
                                </div>

                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                        <p>{{$restaurant->about_restaurant_ar}}</p>
                                    @else
                                        <p>{{$restaurant->about_restaurant_en}}</p>
                                    @endif

                                    </div>
                                </div>
                            </div>
                            <blockquote>
                                <!--<i class="fa fa-quote-left"></i>-->
                                <span class="quote_text">{{__('site.work_from')}} {{$restaurant->start_work}} {{__('site.work_to')}} {{$restaurant->end_work}}</span>
                            </blockquote>
                            <div class="main_title mt50">
                                <h2>{{__('site.our_menu')}}</h2>
                            </div>
                            <main id="gallery">
                                <div class="container">
                                    <div class="grid_filters">
                                        <a href="#" data-filter="*" class="button btn_sm btn_blue active">{{__('site.all')}}</a>
                                       
                                       @foreach($restaurant->restaurant_categories as $category)
                                        <a href="#" data-filter=".category{{$category->id}}"
                                            class="button btn_sm btn_blue">
                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                            {{$category->name_ar}}
                                            @else
                                            {{$category->name_en}}
                                            @endif
                                        </a>
                                        @endforeach    

                                    </div>
                                </div>
                                <div class="">
                                    <div class="row">
                                        <div class="grid gallery_items image-gallery">
                                             @if(isset($restaurant->restaurant_meals) && count($restaurant->restaurant_meals) > 0)
                                             @foreach($restaurant->restaurant_meals as $meal)
                                            <figure class="g_item col-md-6 col-sm-6 category{{$meal->category_id}}">
                                                <div class="col-lg-4 col-md-6">
                                                    <figure>
                                                        <a href="{{asset('/')}}{{$meal->image}}"
                                                            class="hover_effect h_lightbox h_blue">
                                                            <img src="{{asset('/')}}{{$meal->image}}"
                                                                class="img-responsive" style="height: 120px;"
                                                                alt="Image">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="info">
                                                        <div class="title">
                                                            <a href="#" class="name">
                                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                            {{$meal->name_ar}}
                                                            @else
                                                            {{$meal->name_en}}
                                                            @endif
                                                             </a>
                                                            <br>
                                                            <span class="price">
                                                @php
                                                $price_meal = \App\models\Restaurant_meal_sizes::where('meal_id',$meal->id)->get();   
                                                @endphp

                                                @if(isset($price_meal))
                                                
                                                @foreach($price_meal as $price)
                                                    @if(isset($price->size))
                                                    <span class="amount">{{$price->size}} : {{$price->price}}</span>
                                                     <br>
                                                    @else
                                                    <span class="amount">{{ implode($price->price) }}</span>
                                                     <br>                                            @endif
                                                @endforeach

                                                @endif

                                                                
                                                            </span>
                                                        </div>

                                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                                <p>{{$meal->component_ar}}</p>
                                                    @else
                                                                <p>{{$meal->component_en}}</p>
                                                    @endif

                                                    </div>
                                                </div>
                                            </figure>
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
                            </main>

                            <div class="similar_rooms">
                                <div class="main_title t_style5 l_blue s_title a_left">
                                    <div class="c_inner">
                                        <h2 class="c_title">{{__('site.our_table')}}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    @if(isset($restaurant->restaurant_tables) && count($restaurant->restaurant_tables) > 0)
                                    @foreach($restaurant->restaurant_tables as $table)
                                    <div class="col-md-4">
                                        <article>
                                            <figure>
                                                <a href="{{asset('/')}}{{$table->image}}" class="hover_effect h_blue h_link"><img
                                                        src="{{asset('/')}}{{$table->image}}" alt="Image"
                                                        class="img-responsive"></a>
                                                <div class="price">{{$table->table_id}}<span>{{$table->people_number}} {{__('site.people')}}</span></div>
                                                
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
                                    @if(isset($restaurant->restaurant_events) && count($restaurant->restaurant_events) > 0)
                                    @foreach($restaurant->restaurant_events as $event)
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
                                    <h2 class="form_title"><i class="fa fa-calendar"></i>{{__('site.book_online')}} {{__('site.meal')}}</h2>
                                    <form id="booking-form" class="inner" method="post" action="{{route('book.meal')}}">
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
                                                <select id="meal_id" name="meal_id" class="form-control"
                                                    title="{{__('site.select_room')}}" data-header="Room Type">
                                                    @foreach($all_meals as $meal)
                                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                    <option value="{{$meal->id}}"> {{$meal->name_ar}}</option>
                                                    @else
                                                    <option value="{{$meal->id}}"> {{$meal->name_en}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                         @foreach($all_meals as $meal)

                                        <div class="form-group meals" id="{{$meal->id}}" style="display:none">
                                            <div class="form_select">
                                                <select  name="meal_size_id" class="form-control"
                                                    title="" data-header="">
                                                    @foreach(\App\models\Restaurant_meal_sizes::where('meal_id',$meal->id)->get() as $size)
                                                    @if(isset($size->size))
                                                    <option value="{{$size->id}}"> {{$size->size}} => {{$size->price}}</option>
                                                    @else
                                                    <option value="{{$size->id}}">{{implode($size->price)}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                                    @endforeach



                                       
                                  

                                     

                                        <div class="form-group">
                                            <input class="form-control" name="qty"
                                                placeholder="{{__('site.qty')}}" type="number">
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
                                <div class="vbf">
                                    <h2 class="form_title"><i class="fa fa-calendar"></i> {{__('site.book_online')}} {{__('site.table')}}</h2>
                                    <form id="booking-form" class="inner" method="post" action="{{route('book.table')}}">
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
                                                <select name="table_id" class="form-control" 
                                                    title="" data-header="Table Type">
                                                    @foreach($all_tables as $table)
                                                    <option value="{{$table->id}}">{{__('site.table_number')}} ({{$table->table_id}}) {{__('site.for_number')}} ({{$table->people_number}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                       
                               

                                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="input-group">
                                                <div class="form_date">
                                                    <input type="text" class="datepicker form-control md_noborder_right"
                                                        name="date_book" placeholder="{{__('site.booking_date')}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="input-group">
                                                <div class="form_date">
                                                <input class="form-control"  name="time_book" type="time" id="example-text-input">

                                                </div>
                                            </div>
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
                                    <div class="phone"><i class="fa  fa-phone"></i><a href="tel:{{$restaurant->phone}}">
                                            {{$restaurant->phone}} </a></div>
                                    <div class="email"><i class="fa  fa-envelope-o "></i>
                                       {{$restaurant->email}}
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
                                            <a href="{{ route('restaurant.details',$restaurant->id) }}" class="hover_effect h_link h_blue">
                                                <img src="{{asset('/')}}{{$restaurant->logo}}" style="width: 120px; height: 62px;" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="{{ route('restaurant.details',$restaurant->id) }}">
                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                {{$restaurant->name_ar}}
                                            @else
                                                {{$restaurant->name_en}}
                                            @endif
                                                </a></h6>
                                        </div>
                                    </article>
                                    @endforeach
                                    @endif
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>

        </main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script type="text/javascript">
            
            $(function() {   
                $('#meal_id').change(function(){
                    $('.meals').hide();
                    $('#' + $(this).val()).show();
                });

            });

        </script>
@endsection