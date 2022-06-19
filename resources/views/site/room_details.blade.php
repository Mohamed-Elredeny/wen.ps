@extends('layouts.site')

@section('content')


        <div class="page_title gradient_overlay" style="background: url({{asset("assets/site/images/page_title_bg.jpg")}});">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h1>{{$room->room_id}}</h1>
                            <ol class="breadcrumb">
                                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                <li>{{$room->hotel->name_ar}}</li>
                                @else
                                <li>{{$room->hotel->name_en}}</li>
                                @endif
                                <li>{{$room->room_id}}</li>
                            </ol>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="price">
                                <div class="inner">
                                    ${{$room->price}} <span>{{__('site.per_night')}}</span>
                                </div>
                            </div>
                        </div>
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
                                        @if(isset($room->image))
                                        <img class="img-responsive" src="{{asset('/')}}{{$room->image}}"
                                            alt="Image">
                                        @else

                                        <img class="img-responsive" src="{{asset('/')}}assets/site/images/default.jpg"
                                            alt="Image">

                                        @endif
                                    </p>
                                </div>


                            </div>

                        </div>
                        <div class="main_title mt50">
                            <h2>{{__('site.about_room')}}</h2>
                        </div>
                        <p>
                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                 {{$room->details_ar}}
                            @else
                                 {{$room->details_en}}
                            @endif
                           </p>


                        <div class="similar_rooms">
                            <div class="main_title t_style5 l_blue s_title a_left">
                                <div class="c_inner">
                                    <h2 class="c_title">{{__('site.similar_rooms')}}</h2>
                                </div>
                            </div>
                            <div class="row">

                                @if(isset($rooms) && count($rooms) > 0)
                                @foreach($rooms as $room)
                                <div class="col-md-4">
                                    <article>
                                        <figure>
                                            <a href="{{route('room.details',$room->id)}}" class="hover_effect h_blue h_link"><img
                                                    src="{{asset('/')}}{{$room->image}}" alt="Image"
                                                    class="img-responsive"></a>
                                            <div class="price">${{$room->price}}<span> {{__('site.night')}}</span></div>
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

                           <aside class="widget">
                                <div class="vbf">
                                    <h2 class="form_title"><i class="fa fa-calendar"></i> {{__('site.book_online')}}</h2>
                                    <form id="booking-form" class="inner" method="post" action="{{route('book.room')}}">
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
                                                <select name="room_id" class="form-control"
                                                    title="{{__('site.select_room')}}" data-header="Room Type">
                                                    <option value="{{$room->id}}">{{__('site.room_number')}} ({{$room->room_id}}) {{__('site.for_number')}} ({{$room->people_number}}) {{__('site.people')}}</option>
                                                </select>
                                            </div>
                                        </div>


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
                                            var val_lat = <?php echo $hotel->lat ?>;
                                            var val_lng = <?php echo $hotel->lng ?>;
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
                                            <a href="{{route('hotel.event_details',$event->id)}}" class="hover_effect h_link h_blue">
                                                <img src="{{asset('/')}}{{$event->image}}" style="width: 120px; height: 62px;" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="{{route('hotel.event_details',$event->id)}}">
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
                                <h4>{{__('site.related_hotels')}}</h4>
                                <div class="latest_posts">
                                    @if(isset($related_hotels) && count($related_hotels) > 0)
                                    @foreach($related_hotels as $hotel)
                                    <article class="latest_post">
                                        <figure>
                                            <a href="{{route('hotel.details',$hotel->id)}}" class="hover_effect h_link h_blue">
                                                <img src="{{asset('/')}}{{$hotel->logo}}" style="width: 120px; height: 62px;" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="{{route('hotel.details',$hotel->id)}}">
                                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                                {{$hotel->name_ar}}
                                            @else
                                                {{$hotel->name_en}}
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
