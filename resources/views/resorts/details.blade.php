@extends("layouts.resort")
@section('content')
<style>
    #map-canvas{
        width: 100%;
        height: 250px;
    } 
</style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
    
                    <form method="post" action="{{route('resort.details.update',['detail'=>1])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">الاسم بالعربية</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$resort->name_ar}}" name="name_ar" type="text" id="example-text-input">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">الاسم بالانجليزية</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$resort->name_en}}" name="name_en" type="text" id="example-text-input">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$resort->email}}" name="email" type="text" id="example-text-input">
                                @error('email')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">كلمة المرور</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="password" type="password" id="example-text-input">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">رقم الهاتف</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$resort->phone}}" name="phone" type="text" id="example-text-input">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">نوع الباقة</label>
                            <div class="col-sm-10">
                                {{$resort->package->name}}                    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">تاريخ نهاية الباقة</label>
                            <div class="col-sm-10">
                                {{$resort->end_date_package}}                    
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">نبذة عن المنتجع بالعربية</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="about_resort_ar" type="text" id="example-text-input">{{$resort->about_resort_ar}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">نبذة عن المنتجع بالانجليزية</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="about_resort_en" type="text" id="example-text-input">{{$resort->about_resort_en}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">بداية العمل</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$resort->start_work}}" name="start_work" type="time" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">نهاية العمل</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$resort->end_work}}" name="end_work" type="time" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">لوجو المنتجع</label>
                            <div class="col-sm-10">
                                @if($resort->logo != NULL)
                                <img  src="{{asset('/')}}{{$resort->logo}}" alt="" class="group-img img-fluid" style="height: 200px; width:200px"><br> 
                                @else
                                لا يوجد
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">تعديل لوجو المنتجع</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="logo" type="file" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">واجهات المنتجع</label>
                            <div class="col-sm-10">
                                <div class="row">
                                  

                                   @if(isset($images) && count($images))
                                    @foreach($images as $image)
                                     <div class="col-sm-4 mt-2 text-center">
                                        <img name="image"  src="{{asset('/')}}{{$image->image}}" alt="" class="group-img img-fluid " ><br> 
                                        <a class="btn btn-dark w-25 m-2" href="{{route('resort.delete_image',$image->id)}}">حذف</a>
                                     </div>
                                     @endforeach
                                    @else
                                    لا يوجد 
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">اضافة واجه للمطعم</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="image" type="file" id="example-text-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">لينك الموقع علي جوجل ماب</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$resort->address}}" name="address" type="text" id="searchmap" placeholder ="ابحث عن موقعك">
                            </div>
                           <input type="hidden" name="lat" id="lat"  value="{{$resort->lat}}" />
                           <input type="hidden" name="lng" id="lng"   value="{{$resort->lng}}" />

                        </div>


                        
                        <div class="form-group">
                            <div id="map-canvas"></div>
                        </div>

                       
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">تعديل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtBEKk-cqgwLOLm0KFxls53J7eNVn6ZRM&libraries=places"
  type="text/javascript"></script>

<!--<script src="https://maps.google.com/maps/api/js?key=AIzaSyBtBEKk-cqgwLOLm0KFxls53J7eNVn6ZRM&amp;libraries=places&amp;" type="text/javascript"></script>-->
<script>
    var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
            lat: <?php if ($resort->lat != NULL) {echo $resort->lat;}else{echo "27.72";} ?>,
            lng: <?php if ($resort->lng != NULL) {echo $resort->lng;}else{echo "85.36";} ?>
        },
        zoom:15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: <?php if ($resort->lat != NULL) {echo $resort->lat;}else{echo "27.72";} ?>,
            lng: <?php if ($resort->lng != NULL) {echo $resort->lng;}else{echo "85.36";} ?>
        },
        map: map,
        draggable: true
    });
    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
    google.maps.event.addListener(searchBox,'places_changed',function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });
    google.maps.event.addListener(marker,'position_changed',function(){
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);

    var geocoder;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(lat, lng);

    geocoder.geocode(
        {'latLng': latlng}, 
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var add= results[0].formatted_address ;
                   
                            $('#searchmap').val(add);

                }
                else  {
                    x.innerHTML = "address not found";
                }
            }
            else {
                console.log("Geocoder failed due to: " + status);
            }
        }
    );
    });
</script>    
@endsection
