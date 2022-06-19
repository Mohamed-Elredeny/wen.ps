@extends("layouts.resort") 
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
                <h5 class="">تقارير</h5>
<!--
                <form class="m-4">
                <div class="row">
                    <div class="col-sm-2">من</div>
                    <div class="col-sm-4">
                        <input class="form-control" type="date" id="example-text-input" name="name" required>
                    </div>
                    <div class="col-sm-2">الي</div>
                    <div class="col-sm-4">
                        <input class="form-control" type="date" id="example-text-input" name="name" required>
                    </div>
                </div>
                <div class="form-group row m-4">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-dark w-25">بحث</button>
                    </div>
                </div>
                </form>
            -->
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>المكان</th>
                        <th>المنتجع</th>
                        <th>عدد مرات الحجز </th>
                        <th>السعر الكلي</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($places as $place)
                        <tr>
                        <th>{{$place->name_ar}}</th> 
                        <th>{{$place->resort->name_ar}}</th> 
                        <th>{{ \App\models\Book_places::where('resort_id',$place->resort_id)->sum('days') }}</th> 
                        <th>{{ \App\models\Book_places::where('resort_id',$place->resort_id)->sum('money') }}</th>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
@section("script")
<script>
    $(document).ready(function() {
        $('#datatable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'print'
            ]
        } );
    } ); 
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
