@extends("layouts.admin")
@section("pageTitle", "Instructors")
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

                <h5 class="mb-5 mt-3">تعديل الفندق </h5>

                <form method="post" action="{{route('admin.hotels.update',['hotel'=>$hotel->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم بالعربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="name_ar" value="{{$hotel->name_ar}}" required>
                        </div>
                    </div> 
                   

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم بالانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="name_en" value="{{$hotel->name_en}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$hotel->email}}" name="email" type="email" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">كلمة المرور</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="" name="password" type="password" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$hotel->phone}}" name="phone" type="number" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نوع الباقة</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="package_id" required>
                                    
                                    <option>حدد الباقة</option>
                                    @foreach($packages as $package)
                                    <option {{ ($package->id) == $hotel->package_id ? 'selected' : '' }} value="{{$package->id}}">{{$package->name_ar}}</option>
                                    @endforeach

                            </select>                        
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نوع  الحالة</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" required>
                                    
                                    <option>حدد  الحالة</option>
                                    <option {{ $hotel->status == 1 ? 'selected' : '' }} value="1">نشط</option>
                                    <option {{ $hotel->status == 0 ? 'selected' : '' }} value="0">غير نشط</option>

                            </select>                        
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
