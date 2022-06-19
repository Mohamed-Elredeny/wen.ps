@if(LaravelLocalization::getCurrentLocale() == 'ar')
<footer dir="rtl">
@else
<footer>
@endif    
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 widget">
                    <div class="about">
                        <a href="{{route('home.index')}}"><img class="logo" src="{{asset('/')}}assets/site/images/logo.png" height="32" alt="Logo"></a>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                            euismod tincidunt ut laoreet.</p>
                        <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                            lobortis nisl ut aliquip.</p>
                    </div>
                </div>
                <!--
                <div class="col-md-3 col-sm-6 widget">
                    <h5>Latest Events</h5>
                    <ul class="blog_posts">
                        <li><a href="event-details.html">Live your myth in Greece</a> <small>AUGUST 13, 2016</small>
                        </li>
                        <li><a href="event-details.html">Zante Hotel in pictures</a> <small>AUGUST 16, 2016</small>
                        </li>
                        <li><a href="event-details.html">Zante Hotel family party</a> <small>SEPTEMBER 15,
                                2016</small></li>
                    </ul>
                </div>
            -->
                <div class="col-md-3 col-sm-6 widget">
                    <h5>{{__('site.useful_links')}}</h5>
                    <ul class="useful_links">
                        <li><a href="{{route('all.hotel')}}">{{__('site.hotels')}}</a></li>
                        <li><a href="{{route('all.restaurant')}}">{{__('site.restaurant')}}</a></li>
                        <li><a href="{{route('all.resort')}}">{{__('site.resorts')}}</a></li>
                        <li><a href="{{route('all.event')}}">{{__('site.events')}}</a></li>
                        <li><a href="{{route('home.about')}}">{{__('site.about_us')}}</a></li>
                        <li><a href="{{route('home.contact')}}">{{__('site.contact_us')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 widget">
                    <h5>{{__('site.contact_us')}}</h5>
                    <address>
                        <ul class="address_details">
                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                           
                            <li><i class="glyphicon glyphicon-map-marker"></i>  نابلس - فلسطين
                            </li>
                           
                            @else

                            <li><i class="glyphicon glyphicon-map-marker"></i> Nablus - Palestine
                            </li>

                            @endif
                            <li><i class="glyphicon glyphicon-phone-alt"></i> Phone: 00970568122334 </li>
                            <!--<li><i class="fa fa-fax"></i> Fax: 800 123 3456</li>-->
                            <li><i class="fa fa-envelope"></i> Email: info@wen.ps</a>
                            </li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copyrights">
                        {{__('site.copy_right')}} <a href="{{route('home.index')}}">{{__('site.wen_world')}}</a> {{__('site.all_right')}}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="social_media">
                        <a class="facebook" data-original-title="Facebook" data-toggle="tooltip" href="#"><i
                                class="fa fa-facebook"></i></a>
                        <a class="twitter" data-original-title="Twitter" data-toggle="tooltip" href="#"><i
                                class="fa fa-twitter"></i></a>
                        <a class="googleplus" data-original-title="Google Plus" data-toggle="tooltip"
                            href="#"><i class="fa fa-google-plus"></i></a>
                        <a class="pinterest" data-original-title="Pinterest" data-toggle="tooltip" href="#"><i
                                class="fa fa-pinterest"></i></a>
                        <a class="linkedin" data-original-title="Linkedin" data-toggle="tooltip" href="#"><i
                                class="fa fa-linkedin"></i></a>
                        <a class="instagram" data-original-title="Instagram" data-toggle="tooltip" href="#"><i
                                class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>