@extends('layouts.site')

@section('content')

        <div class="page_title gradient_overlay" style="background: url({{asset("assets/site/images/page_title_bg.jpg")}});">
            <div class="container">
                <div class="inner">
                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h1>{{$place->name_ar}}</h1> 
                            <ol class="breadcrumb">
                                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                                <li>{{$place->resort->name_ar}}</li>
                                <li>{{$place->name_ar}}</li>
                            </ol>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="price">
                                <div class="inner">
                                    ${{$place->price}} <span>{{__('site.per_night')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h1>{{$place->name_en}}</h1> 
                            <ol class="breadcrumb">
                                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                                <li>{{$place->resort->name_en}}</li>
                                <li>{{$place->name_en}}</li>
                            </ol>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="price">
                                <div class="inner">
                                    ${{$place->price}} <span>{{__('site.per_night')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif 

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
                                        <img class="img-responsive" src="{{asset('/')}}{{$place->image}}"
                                            alt="Image">
                                    </p>
                                </div>

                         
                            </div>
                            <!--
                            <div id="thumbs" class="owl-carousel">

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery1.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery2.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery3.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery4.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery5.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery6.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery7.jpg" alt="Image"></div>

                                <div class="item"><img class="img-responsive"
                                        src="images/gallery/gallery8.jpg" alt="Image"></div>
                            </div>
                        -->

                        </div>
                        <div class="main_title mt50">
                            <h2>عن المنتجع</h2>
                        </div>
                        <p>{{$place->details}}</p>
                       <!-- 
                        <div class="main_title t_style a_left s_title mt50">
                            <div class="c_inner">
                                <h2 class="c_title">خدماتنا</h2>
                            </div>
                        </div>
                        <div class="room_facilitys_list">
                            <div class="all_facility_list">
                                <div class="col-sm-4 nopadding">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check"></i>Double Bed</li>
                                        <li><i class="fa fa-check"></i>80 Sq mt</li>
                                        <li><i class="fa fa-check"></i>6 Persons</li>
                                        <li><i class="fa fa-check"></i>Free Internet</li>
                                    </ul>
                                </div>
                                <div class="col-sm-4 nopadding">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check"></i>Free Wi-Fi</li>
                                        <li><i class="fa fa-check"></i>Breakfast Include</li>
                                        <li><i class="fa fa-check"></i>Private Balcony</li>
                                        <li class="no"><i class="fa fa-times"></i>Free Newspaper</li>
                                    </ul>
                                </div>
                                <div class="col-sm-4 nopadding_left">
                                    <ul class="list-unstyled">
                                        <li class="no"><i class="fa fa-times"></i>Flat Screen Tv</li>
                                        <li><i class="fa fa-check"></i>Full Ac</li>
                                        <li class="no"><i class="fa fa-times"></i>Beach View</li>
                                        <li><i class="fa fa-check"></i>Room Service</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    -->
                        <div class="similar_rooms">
                            <div class="main_title t_style5 l_blue s_title a_left">
                                <div class="c_inner">
                                    <h2 class="c_title">{{__('site.similar_resorts')}}</h2>
                                </div>
                            </div>
                            <div class="row">
                            	@if(isset($places) && count($places) > 0)
                            	@foreach($places as $place)
                                <div class="col-md-4">
                                    <article>
                                        <figure>
                                            <a href="{{route('place.details',$place->id)}}" class="hover_effect h_blue h_link"><img
                                                    src="{{asset('/')}}{{$place->image}}" alt="Image"
                                                    class="img-responsive"></a>
                                            <div class="price">${{$place->price}}<span> {{__('site.night')}}</span></div>
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
                                                    title="" data-header="Room Type">
                                                    <option value="{{$place->id}}"> 
                                                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                             {{$place->name_ar}}
                                                        @else
                                                             {{$place->name_en}}
                                                        @endif 

                                                       </option>
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
                                                placeholder="{{__('site.number_of_days')}}" type="number">
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
                                    <article class="latest_post">
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