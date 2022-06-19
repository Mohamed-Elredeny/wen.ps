@extends("layouts.admin")
@section("pageTitle", "المشرفين")
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

                <h5 class="mb-5 mt-3">تعديل باقة</h5>

                <form method="POST" action="{{route('admin.points.update',['point'=>$point->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نقاط الفندق</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" value="{{$point->hotel_point}}" name="hotel_point" required>
                        </div>
                    </div> 
                   
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نقاط المطعم</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" value="{{$point->restaurant_point}}" name="restaurant_point" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نقاط المنتجع</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" value="{{$point->resort_point}}" name="resort_point" required>
                        </div>
                    </div>

            
                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark w-25">اضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
