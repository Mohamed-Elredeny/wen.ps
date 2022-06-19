@extends("layouts.restaurant") 
@section("style")
    <link href="{{asset("assets/admin/libs/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section("content")
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

                <h5 class="mb-5 mt-3">عرض الحفلة</h5>

                <form>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">العنوان  بالعربية</label>
                        <div class="col-sm-10">
                            {{$event->title_ar}}
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">الموضوع بالعربية</label>
                        <div class="col-sm-10">
                            
                             {!! $event->description_ar !!} 
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">العنوان  بالانجليزية</label>
                        <div class="col-sm-10">
                            {{$event->title_en}}
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">الموضوع بالانجليزية</label>
                        <div class="col-sm-10">
                            
                             {!! $event->description_en !!} 
                           
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="custom-file col-sm-10">
                            <img  src="{{asset('/')}}{{$event->image}}" alt="" class="group-img img-fluid" style="height: 400px; width:200px"><br> 
                        </div>
                    </div>


              
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
@section("script")
<script src="{{asset("assets/admin/libs/tinymce/tinymce.min.js")}}"></script>
<script src="{{asset("assets/admin/js/pages/form-editor.init.js")}}"></script>
@endsection