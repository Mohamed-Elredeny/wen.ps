
@if(LaravelLocalization::getCurrentLocale() == 'ar')
<header class="fixed" dir="rtl" >
@else
<header class="fixed">
@endif
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse"
                data-target=".mobile_menu" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home.index')}}">
                <img src="{{asset('assets/site/images/logo.png')}}" height="32" alt="Logo">
            </a>
        </div>
        <nav id="main_menu" class="mobile_menu navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="mobile_menu_title" style="display:none;">MENU</li>
                <li><a href="{{route('home.index')}}">{{__('site.home')}}</a></li>
                <li><a href="{{route('all.hotel')}}">{{__('site.hotels')}}</a></li>
                <li><a href="{{route('all.restaurant')}}">{{__('site.restaurant')}}</a></li>
                <li><a href="{{route('all.resort')}}">{{__('site.resorts')}}</a></li>
{{--
                <li><a href="{{route('all.event')}}">{{__('site.events')}}</a></li>
--}}
                <li><a href="{{route('home.about')}}">{{__('site.about_us')}}</a></li>
                <li><a href="{{route('home.contact')}}">{{__('site.contact_us')}}</a></li>
                <li><a href="{{route('all.package')}}">{{__('site.packages')}}</a></li>
                <li><a href="{{route('all.gift')}}">{{__('site.gifts')}}</a></li>

                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                    <li>
                        <div class="dropdown" >
                            <button style="background: none !important;padding:15px;color:#1dc1f8;margin-top: 12px;border: 0 solid #1dc1f8;font-weight: bolder;width: 120px" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                English
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color:white;color:#1dc1f8">
                                <a style="display:block" href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="dropdown-item;">English</a>
                                <a style="display:block" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="dropdown-item;">العربية</a>
                            </div>
                        </div>
                    </li>

                @else
                    <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="dropdown-item notify-item">العربية</a></li>
                @endif


                @if(Auth::guard('visitor')->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        {{Auth::guard('visitor')->user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('my-booking')}}">{{__('site.my_reservation')}}</a></li>
                       <!-- <li><a href="#">الملف الشخصى</a></li>-->
                        <li><a href="{{route('get.gift')}}">{{__('site.redeem_points')}}</a></li>
                        <li><a href="{{route('my.gifts')}}">{{__('site.exchange_gift')}}</a></li>
                       <!-- <li><a href="#">تعديل الملف الشصى</a></li>-->
                        <li><a  style="background:#red;padding:15px;color:white;margin-top: 10px;margin-right: 30px" href="{{route('visitor.logout')}}">{{__('site.logout')}}</a></li>
                    </ul>
                </li>
                @else
                <li><a  style="background:#1dc1f8;padding:15px;color:white;margin-top: 10px;margin-right: 30px" href="{{route('user-login')}}">{{__('site.login')}}</a></li>
                @endif

            </ul>
        </nav>
    </div>
</header>
