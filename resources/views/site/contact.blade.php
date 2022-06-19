@extends('layouts.site')

@section('content')


  <div id="map" style="height: 400px; width: 100%;"></div> 
          <script type="text/javascript">
            var val_lat = 30.2558;
            var val_lng = 30.2558;
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


        @if(LaravelLocalization::getCurrentLocale() == 'en')

          <main id="contact_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main_title a_left">
                            <h2>CONTACT US</h2>
                        </div>
                        <form id="contact-form-page" method="POST" action="{{route('home.saveContactUs')}}">
                           @csrf 
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Message</label>
                                    <textarea class="form-control" name="message"
                                        placeholder="Your Message..." required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="button  btn_blue mt40 upper pull-right">
                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Send Your Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="main_title a_left">
                            <h2>GET IN TOUCH</h2>
                        </div>
                        <ul class="contact-info upper">
                            <li>
                                <span>ADDRESS:</span> Nablus - Palestine
                            </li>
                            <li>
                                <span>EMAIL:</span> info@wen.ps
                            </li>
                            <li>
                                <span>WEB:</span> <a href="https://www.wen.ps/" target="_blank">www.WEN.PS</a>
                            </li>
                            <li>
                                <span>PHONE:</span> <strong>00970568122334</strong>
                            </li>
                           <!-- <li>
                                <span>FAX:</span>
                                <strong>+1 123456780</strong>
                            </li>-->
                        </ul>
                        <div class="social_media">
                            <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="googleplus" href="#"><i class="fa fa-google-plus"></i></a>
                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                            <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="youtube" href="#"><i class="fa fa-youtube"></i></a>
                            <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                        </div>
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
        </main>
        @else

        <main id="contact_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main_title a_left">
                            <h2>تواصل معنا</h2>
                        </div>
                        <form id="contact-form-page" method="POST" action="{{route('home.saveContactUs')}}">
                           @csrf 
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">الأسم</label>
                                    <input type="text" class="form-control" name="name" placeholder="الأسم" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">الهاتف</label>
                                    <input type="text" class="form-control" name="phone" placeholder="الهاتف" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" placeholder="بريد الالكتروني" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label">العنوان</label>
                                    <input type="text" class="form-control" name="subject" placeholder="العنوان" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">الرسالة</label>
                                    <textarea class="form-control" name="message"
                                        placeholder="الرسالة..." required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="button  btn_blue mt40 upper pull-right">
                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i> ارسل الرسالة
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="main_title a_left">
                            <h2>معلوماتنا</h2>
                        </div>
                        <ul class="contact-info upper">
                            <li>
                                <span>العنوان:</span> نابلس - فلسطين
                            </li>
                            <li>
                                <span>البريد الألكترونى :</span> info@wen.ps
                            </li>
                            <li>
                                <span>الموقع الالكتروني:</span> <a href="https://www.wen.ps/" target="_blank"> www.WEN.PS</a>
                            </li>
                            <li>
                                <span>رقم الهاتف:</span> <strong>00970568122334</strong>
                            </li>
                        </ul>
                        <div class="social_media">
                            <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="googleplus" href="#"><i class="fa fa-google-plus"></i></a>
                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                            <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="youtube" href="#"><i class="fa fa-youtube"></i></a>
                            <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                        </div>
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
        </main>
        @endif
        @endsection