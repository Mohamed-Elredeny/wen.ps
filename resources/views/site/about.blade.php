@extends('layouts.site')

@section('content')
<div class="page_title gradient_overlay" style="background: url({{asset("assets/site/images/page_title_bg.jpg")}});">
    <div class="container">
        <div class="inner">
            <h1>About Wen World</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li>About Wen World</li>
            </ol>
        </div>
    </div>
</div>

<main id="about_us_page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="mb30">Wen World - Since 2022</h1>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                    nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
                    illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui
                    blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam
                    liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim
                    placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis
                    qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                    legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
                    lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,
                    anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem
                    modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. </p>
                
            </div>
            <div class="col-md-5">
                <div class="about_img">
                    <img src="{{asset("assets/site/images/about.jpg")}}" class="img1 img-responsive" alt="Image">
                    <img src="{{asset("assets/site/images/about.jpg")}}" class="img2 img-responsive" alt="Image">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="countup_box">
                            <div class="inner">
                                <div class="countup number" data-count="150">150</div>
                                <div class="text">Hotels</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3=4 col-sm-4 col-xs-6">
                        <div class="countup_box">
                            <div class="inner">
                                <div class="countup number" data-count="50">50</div>
                                <div class="text">Restaurants</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="countup_box">
                            <div class="inner">
                                <div class="countup number" data-count="4">44</div>
                                <div class="text">Resorts</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row image-gallery">
            <div class="col-md-4 col-sm-6 mt20 mb20 br2">
                <a href="{{asset("assets/site/images/restaurant.jpg")}}" class="hover_effect h_lightbox h_blue">
                    <img src="{{asset("assets/site/images/restaurant.jpg")}}" class="img-responsive full_width br2" alt="Image">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 mt20 mb20 br2">
                <a href="{{asset("assets/site/images/hotels/1.jpg")}}" class="hover_effect h_lightbox h_blue">
                    <img src="{{asset("assets/site/images/hotels/1.jpg")}}" class="img-responsive full_width br2" alt="Image">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 mt20 mb20 br2">
                <a href="{{asset("assets/site/images/resorts/1.jpg")}}" class="hover_effect h_lightbox h_blue">
                    <img src="{{asset("assets/site/images/resorts/1.jpg")}}" class="img-responsive full_width br2" alt="Image">
                </a>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
            laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
            dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
            delenit augue duis dolore te feugait nulla facilisi. </p>
        <ul class="list_menu">
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy</li>
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit..</li>
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</li>
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
            <li>Lorem ipsum dolor sit amet.</li>
        </ul>
        <p>per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari,
            fiant sollemnes in futurum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
            veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
            consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,
            vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui
            blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber
            tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
            possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum
            claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas
            est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam
            littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per
            seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant
            sollemnes in futurum. </p>
    </div>
</main>
@endsection