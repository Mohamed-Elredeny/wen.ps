@extends('layouts.site')

@section('content')


        <div class="page_title gradient_overlay" style="background: url(assets/site/images/page_title_bg.jpg);">
            <div class="container">
                <div class="inner">
                    <h1>{{__('site.my_reservation')}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                        <li>{{__('site.my_reservation')}}</li>
                    </ol>
                </div>
            </div>
        </div>

        <main id="gallery">
            <div class="container">
                <div class="grid_filters">
                    <a href="#" data-filter="*" class="button btn_sm btn_blue active">{{__('site.all')}}</a>
                    <a href="#" data-filter=".restaurant" class="button btn_sm btn_blue">{{__('site.restaurant')}}</a>
                    <a href="#" data-filter=".hotel" class="button btn_sm btn_blue">{{__('site.hotels')}}</a>
                    <a href="#" data-filter=".resort" class="button btn_sm btn_blue">{{__('site.resorts')}}</a>
           
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="grid gallery_items room_grid_item" style="text-align: center;">
                     
                     @if(isset($book_rooms) && count($book_rooms) > 0) 
                     @foreach($book_rooms as $room)
                        <figure class="g_item col-md-3 col-sm-6 hotel">
                            <a href="{{asset('/')}}{{$room->room->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{asset('/')}}{{$room->room->image}}" class="img-responsive" alt="Image">
                            </a>
                            <figcaption>
                                <a href="{{route('restaurant.details',$room->hotel_id)}}" class=" h_link h_blue" style="font-size: 1.2em;">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')

                                    {{ \App\models\Hotels::where('id',$room->hotel_id)->first()->name_ar }}

                                    @else

                                    {{ \App\models\Hotels::where('id',$room->hotel_id)->first()->name_en }}

                                    @endif

                                </a>
                                <span>{{__('site.date_from')}} {{$room->date_from}}</span>
                                <span>{{__('site.date_to')}} {{$room->date_to}}</span>
                                <span>{{__('site.total_cost')}} {{$room->money}}$</span>
                            </figcaption>
                        </figure>
                        @endforeach
                        @endif

                     @if(isset($book_places) && count($book_places) > 0) 
                     @foreach($book_places as $place)
                        <figure class="g_item col-md-3 col-sm-6 resort">
                            <a href="{{asset('/')}}{{$place->place->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{asset('/')}}{{$place->place->image}}" class="img-responsive" alt="Image">
                            </a>
                            <figcaption>
                                <a href="{{route('resort.details',$place->resort_id)}}" class=" h_link h_blue" style="font-size: 1.2em;">
                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')

                                    {{ \App\models\Resorts::where('id',$place->resort_id)->first()->name_ar }}

                                    @else

                                    {{ \App\models\Resorts::where('id',$place->resort_id)->first()->name_en }}

                                    @endif

                                </a>
                                <span>{{__('site.date_from')}} {{$place->date_from}}</span>
                                <span>{{__('site.date_to')}} {{$place->date_to}}</span>
                                <span>{{__('site.total_cost')}} {{$place->money}}$</span>
                            </figcaption>
                        </figure>
                        @endforeach
                        @endif


                     @if(isset($book_meals) && count($book_meals) > 0) 
                     @foreach($book_meals as $meal)
                        <figure class="g_item col-md-3 col-sm-6 restaurant">
                            <a href="{{asset('/')}}{{$meal->meal->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{asset('/')}}{{$meal->meal->image}}" class="img-responsive" alt="Image">
                            </a>
                            <figcaption>
                                <a href="{{route('restaurant.details',$meal->meal->restaurant_id)}}" class=" h_link h_blue" style="font-size: 1.2em;">

                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')

                                    {{ \App\models\Restaurants::where('id',$meal->restaurant_id)->first()->name_ar }}
                                     </a>
                                     <span>{{__('site.meal')}} {{$meal->meal->name_ar}}</span>
                                    @else

                                    {{ \App\models\Restaurants::where('id',$meal->restaurant_id)->first()->name_en }}
                                     </a>
                                     <span>{{__('site.meal')}} {{$meal->meal->name_en}}</span>
                                    @endif


                                @if(isset($meal->meal_size->size))
                                <span>{{__('site.size')}} {{$meal->meal_size->size}}</span>
                                @endif
                                <span>{{__('site.total_cost')}} {{$meal->money}}$</span>
                            </figcaption>
                        </figure>
                        @endforeach
                        @endif


                     @if(isset($book_tables) && count($book_tables) > 0) 
                     @foreach($book_tables as $table)
                        <figure class="g_item col-md-3 col-sm-6 restaurant">
                            <a href="{{asset('/')}}{{$table->table->image}}" class="hover_effect h_lightbox h_blue">
                                <img src="{{asset('/')}}{{$table->table->image}}" class="img-responsive" alt="Image">
                            </a>
                            <figcaption>
                                <a href="{{route('restaurant.details',$table->table->restaurant_id)}}" class=" h_link h_blue" style="font-size: 1.2em;">

                                    @if(LaravelLocalization::getCurrentLocale() == 'ar')

                                    {{ \App\models\Restaurants::where('id',$table->restaurant_id)->first()->name__ar }}

                                    @else

                                    {{ \App\models\Restaurants::where('id',$table->restaurant_id)->first()->name_en }}

                                    @endif


                                	
                                </a>
                                <span>{{__('site.table_number')}} {{$table->table->table_id}}</span>
                                <span>{{__('site.date')}} {{$table->date_book}}</span>
                                <span>{{__('site.time')}} {{$table->time_book}}</span>
                            </figcaption>
                        </figure>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </main>
@endsection
