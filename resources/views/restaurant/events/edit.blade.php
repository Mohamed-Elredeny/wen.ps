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


                <h5 class="mb-5 mt-3">تعديل الحفلة</h5>

                <form method="post" action="{{route('restaurant.events.update',['event'=>$event->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">العنوان  بالعربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$event->title_ar}}" id="example-text-input" name="title_ar" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">العنوان  بالانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$event->title_en}}" id="example-text-input" name="title_en" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">الموضوع بالعربية</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" class="elm1" name="description_ar">
                               {!! $event->description_ar !!}  
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">الموضوع بالانجليزية</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" class="elm1" name="description_en">
                               {!! $event->description_en !!}  
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="custom-file col-sm-10">
                            <input name="image" type="file" class="custom-file-input" id="customFileLangHTML" >
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="Upload Image"></label>
                        </div>
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
</div> <!-- end row -->
@endsection
@section("script")
<script src="{{asset("assets/admin/libs/tinymce/tinymce.min.js")}}"></script>
<script src="{{asset("assets/admin/js/pages/form-editor.init.js")}}"></script>
@endsection