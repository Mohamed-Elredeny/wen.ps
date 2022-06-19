@extends("layouts.hotel") 
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
                
                <h5 class="">الغرف</h5>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>رقم الغرفة</th>
                        <th>عدد الافراد</th>
                        <th>السعر</th>
                        <th>تفاصيل بالعربية</th>
                        <th>تفاصيل بالانجليزية</th>
                        <th>صور</th> 
                        <th>التحكم</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($rooms as $room)
                        <tr>
                        <th>{{$room->room_id}}</th> 
                        <th>{{$room->people_number}}</th> 
                        <th>{{$room->price}}</th> 
                        <th>
                            <center>
                                <a class="btn btn-dark col-sm-12" onclick="modelDes('{{$room->id}}','{{$room->details_ar}}')" data-toggle="modal" data-target="#des{{$room->id}}">تفاصيل بالعربية</a><br>
                            </center>    
                        </th>
                        <th>
                            <center>
                                <a class="btn btn-dark col-sm-12" onclick="modelDes('{{$room->id}}','{{$room->details_en}}')" data-toggle="modal" data-target="#des{{$room->id}}">تفاصيل بالانجليزية</a><br>
                            </center>    
                        </th>

                        <th>
                            <center>
                                <a class="btn btn-dark col-sm-12" onclick="modelImage('{{$room->id}}','{{$room->image}}')" data-toggle="modal" data-target="#file{{$room->id}}">الصور</a><br>
                            </center>
                        </th>
                        <th>
                            <center>
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            التحكم
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            {{-- <a class="btn btn-dark col-sm-12"  href="{{route('admin.packages.show',['package'=>$room->id])}}">عرض</a><br> --}}
                                            <a class="btn btn-dark col-sm-12"  href="{{route('hotel.rooms.edit',['room'=>$room->id])}}">تعديل</a>
                                            <form method="post" action="{{route('hotel.rooms.destroy',['room'=>$room->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-dark col-sm-12" >حذف</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </th>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<div id="modelImage"></div>
<div id="modelDes"></div>
@endsection
@section("script")
<script>
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
                                        <img  src="{{asset('/')}}`+ y+`" alt="" class="group-img img-fluid " ><br>
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

    function modelDes(x,y){ 
            document.getElementById('modelDes').innerHTML =`
            <div class="modal " id="des`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">التفاصيل </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="group-img-container text-center post-modal">
                                <div class="group-img-container text-center post-modal">
                                    <div class="group-img-container text-center post-modal">
                                         `+y+`
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
