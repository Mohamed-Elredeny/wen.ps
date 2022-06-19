@extends("layouts.admin")
@section("pageTitle", "Package")
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
                <h5 class="mb-5 mt-3">عرض الشركة </h5>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                        <div class="col-sm-10">
                            {{$package->name}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-10">
                            {{$package->price}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">كلمة المرور</label>
                        <div class="col-sm-10">
                            {{$package->duration}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-10">
                            {{$package->details}}
                        </div>
                    </div>
                   
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
