@extends("layouts.hotel") 
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

                <h5 class="mb-5 mt-3">تعديل الغرفة</h5>

                <form method="post" action="{{route('hotel.rooms.update',['room'=>$room->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">رقم الغرفة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="room_id" value="{{$room->room_id}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">عدد الأفراد</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="people_number" value="{{$room->people_number}}" required>
                        </div>
                    </div> 
   
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل الغرفة بالعربية</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="example-text-input" name="details_ar" required>{{$room->details_ar}}</textarea>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل الغرفة  بالانجليزية</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="example-text-input" name="details_en" required>{{$room->details_en}}</textarea>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="price" value="{{$room->price}}" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">صور</label>
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