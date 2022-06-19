@extends("layouts.admin")
@section("pageTitle", "Instructors")
@section("style")
    <link href="{{asset("assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>

@endsection
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <h5 class="mb-5 mt-3">طلبات قيد الانتظار </h5>

                    <div class="form-group row mt-5">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الشاليهات</label>
                        <div class="col-sm-10">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                <tr>
                                    <th>اسم المنتجع</th>
                                    <th>الاسم بالعربية</th>
                                    <th>الاسم  بالانجليزية</th>
                                    <th>السعر</th> 
                                    <th>تفاصيل بالعربية</th>
                                    <th>تفاصيل بالانجليزية</th>
                                    <th>صور</th>
                                </tr>
                                </thead>
            
                                <tbody>
                                    @foreach($places as $place)
                                    <tr>
                                    <th>{{$place->resort->name_ar}}</th>
                                    <th>{{$place->name_ar}}</th>
                                    <th>{{$place->name_en}}</th>
                                    <th>{{$place->price}}$</th> 
                                    <th>
                                        <center>
                                            <a class="btn btn-dark col-sm-12" onclick="modelDes('{{$place->id}}','{{$place->details_ar}}')" data-toggle="modal" data-target="#images{{$place->id}}">التفاصيل</a><br>
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            <a class="btn btn-dark col-sm-12" onclick="modelDes('{{$place->id}}','{{$place->details_en}}')" data-toggle="modal" data-target="#images{{$place->id}}">التفاصيل</a><br>
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            <a class="btn btn-dark col-sm-12" onclick="modelImage('{{$place->id}}','{{$place->image}}')" data-toggle="modal" data-target="#file{{$place->id}}">الصور</a><br>
                                        </center>
                                    </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </div>
                    </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div id="modelDes"></div>
<div id="modelImage"></div>
@endsection
@section("script")
<script>
    function modelDes(x,y){
        document.getElementById('modelDes').innerHTML =`
            <div class="modal " id="images`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">تفاصيل </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="group-img-container text-center post-modal">
                                `+ y +`
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                        </div>
                    </div>
                </div>
            </div>
        `
    }

    function modelImage(x,y){ 
            document.getElementById('modelImage').innerHTML =`
            <div class="modal " id="file`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">الصور </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="group-img-container text-center post-modal">
                                <div class="group-img-container text-center post-modal">
                                    <div class="group-img-container text-center post-modal">
                                        <img  src="{{asset('assets/attach/')}}/`+ y+`" alt="" class="group-img img-fluid " ><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
    }
</script>
<script src="{{asset("assets/admin/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/jszip/jszip.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/pdfmake/build/pdfmake.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/pdfmake/build/vfs_fonts.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.j")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/js/pages/datatables.init.js")}}"></script>
@endsection