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


                <h5 class="mb-5 mt-3">تعديل الفئة</h5>

                <form method="post" action="{{route('restaurant.categories.update',['category'=>$category->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الفئة بالعربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="name_ar" value="{{$category->name_ar}}" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الفئة بالانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="name_en" value="{{$category->name_en}}" required>
                        </div>
                    </div> 

 
                  @if(isset($category->size))
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاحجام المتاحة</label>
                        <div class="col-sm-10">
                            <select name="size[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                                <option  @if (in_array("XL", $category->size) == true) {{ 'selected' }} @endif value="XL">XL</option>
                                <option @if (in_array("LG", $category->size) == true) {{ 'selected' }} @endif value="LG">LG</option>
                                <option @if (in_array("MD", $category->size) == true) {{ 'selected' }} @endif value="MD">MD</option>
                                <option @if (in_array("SM", $category->size) == true) {{ 'selected' }} @endif value="SM">SM</option>
                            </select>                        
                        </div>
                    </div> 
                   @else
                   
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاحجام المتاحة</label>
                        <div class="col-sm-10">
                            <select class="select2 form-control select2-multiple" multiple="multiple" name="size[]" multiple data-placeholder="Choose ...">
                                <option value="XL">XL</option>
                                <option value="LG">LG</option>
                                <option value="MD">MD</option>
                                <option value="SM">SM</option>
                            </select>                        
                        </div>
                    </div> 
                   
                   @endif 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="example-text-input" name="image">
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
<script src="{{asset("assets/admin/libs/select2/js/select2.min.js")}}"></script>
@endsection