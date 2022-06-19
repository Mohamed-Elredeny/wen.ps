@extends("layouts.restaurant")
@section('style')
    <link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

@endsection
@section('content')
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
                    <h5 class="">طلبات الطعام</h5>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th>اسم الزائر</th>
                                <th>الطلبات</th>
                                <th>الوقت و التاريخ</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($meals as $meal)
                            <tr>
                                <th>{{$meal->name}}</th>
                                <th>
                                    <center>

                                        {{$meal->meal->name_ar}}
                                        <br>
                                        @if(isset($meal->meal_size->size))
                                      الحجم :   {{$meal->meal_size->size}}
                                        <br>
                                        @endif
                                       الكمية :  {{$meal->qty}}

                                       <!-- <a class="btn btn-dark col-sm-12" onclick="modelImage('1','1633814012.jpg')"
                                            data-toggle="modal" data-target="#file1">الصور</a><br>-->
                                    </center>
                                </th>
                                <th>{{$meal->date_book}}</th>
                                <th>
                         @if($meal->status == 0)
                            <center>
                                <div class="btn-group" role="group"
                                    aria-label="Button group with nested dropdown">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            التحكم
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="btn btn-dark col-sm-12"
                                                href="{{ route('restaurant.requestsMeal.accept',$meal->id) }}">تأكيد</a><br>
                                            <a class="btn btn-dark col-sm-12"
                                                href="{{ route('restaurant.requestsMeal.accept',$meal->id) }}">رفض</a>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            @elseif($meal->status == 1)
                            <center>تم التاكيد</center>
                            @elseif($meal->status == 2)
                            <center>تم الرفض</center>
                            @endif
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
@endsection
@section('script')
    <script>
        function modelImage(x, y) {
            document.getElementById('modelImage').innerHTML = `
            <div class="modal " id="file` + x + `" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">الصور </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الوجبة</th>
                                    <th scope="col">الحجم</th>
                                    <th scope="col">الكمية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>بيتزا</td>
                                    <td>XL</td>
                                    <td>2</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>بيتزا</td>
                                    <td>XL</td>
                                    <td>2</td>
                                    </tr>
                                </tbody>
                            </table>
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
    <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.j') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
@endsection
