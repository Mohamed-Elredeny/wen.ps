<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield("title", "Clean")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/admin/images/icon.png")}}">

    <link href="{{asset('assets/admin/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset("assets/admin/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset("assets/admin/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    @yield("style")
    <link href="{{asset("assets/admin/css/app-rtl.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/css/redo.css")}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/site/css/teacher.css')}}">


</head>
<body>

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

     <!-- Begin page -->
     <div class="accountbg" style="background: url('{{asset("assets/admin/images/bg2.jfif")}}');background-size: cover;background-position: center;"></div>

    <div class="account-pages mt-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
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


                            <div class="p-3">
                                <h4 class="font-size-18 mt-2 text-center">تسجيل دخول</h4>
                                <p class="text-muted text-center mb-4">المسؤول</p>

                                <form class="form-horizontal" method="post"  action="{{route('check.auth.login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type">النوع</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="admin">مسؤول</option>
                                            <option value="restaurant">مطعم</option>
                                            <option value="hotel">فندق</option>
                                            <option value="resort">منتجع</option>
                                            <option value="visitor">زائر</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">البريد الالكتروني</label>
                                        <input type="mail" class="form-control" name="email" id="email" placeholder="ادخل البريد الالكتروني" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">كلمة المرور</label>
                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="ادخل كلمة المرور" required>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 text-right">
                                            <button class="btn btn-dark w-md waves-effect waves-light" type="submit">تسجيل دخول</button>
                                        </div>
                                        <div class="col-sm-6 text-left">
                                            <a href="{{route('home.index')}}" class="btn btn-dark w-md waves-effect waves-light">العودة</a>
                                        </div>

                                    </div>





                                </form>
                                <div class=" row ">
                                    <div class="col-sm-12 text-center">
                                        <a href="{{route('visitor.register')}}" class="font-weight-bold text-primary" >سجل الأن</a>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset("assets/admin/libs/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/metismenu/metisMenu.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/simplebar/simplebar.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/node-waves/waves.min.js")}}"></script>
    <script src="{{asset("assets/admin/js/app.js")}}"></script>

</body>
</html>
