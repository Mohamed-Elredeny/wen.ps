@extends("layouts.resort") 
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

                <form method="post" action="{{route('resort.resorts.update',['resort'=>$resort->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الفئة</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id" id="category_id">
                                    <option value="0">حدد الفئة</option>
                                    @foreach($categories as $category)
                                    <option  @if ($category->id == $resort->category_id) {{ 'selected' }} @endif value="{{$category->id}}">{{$category->name_ar}}</option>
                                    @endforeach
                            </select>                           
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم بالعربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" value="{{$resort->name_ar}}" name="name_ar" required>
                        </div>
                    </div> 


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم بالانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" value="{{$resort->name_en}}" name="name_en" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل بالعربية</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="example-text-input"  name="details_ar" required>{{$resort->details_ar}}</textarea>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل بالانجليزية</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="example-text-input"  name="details_en" required>{{$resort->details_en}}</textarea>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" value="{{$resort->price}}" name="price" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="example-text-input" name="image" >
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
