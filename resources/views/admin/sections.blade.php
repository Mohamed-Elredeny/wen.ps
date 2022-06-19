<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li>
            <a href="/admin/">
                <i class="mdi mdi-view-dashboard"></i>
                <span> لوحة التحكم </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class=" fas fa-money-bill-alt"></i>
                <span> الباقات </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.packages.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.packages.create")}}">اضافة باقة جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-city"></i>
                <span> المطاعم </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.restaurants.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.restaurants.create")}}">اضافة حساب مطعم جديد</a></li>
              <!--  <li><a href="{{route("admin.restaurants.requests",['id'=>1])}}">طلبات قيد الانتظار</a></li> -->
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-hotel"></i>
                <span> الفنادق </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.hotels.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.hotels.create")}}">اضافة حساب فندق جديد</a></li>
             <!--     <li><a href="{{route("admin.hotels.requests",['id'=>1])}}">طلبات قيد الانتظار</a></li> -->
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-building"></i>
                <span> المنتجعات السياحية </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.resorts.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.resorts.create")}}">اضافة حساب منتجع جديد</a></li>
             <!--     <li><a href="{{route("admin.resorts.requests",['id'=>1])}}">طلبات قيد الانتظار</a></li>  -->
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="typcn typcn-group"></i>
                <span> الزوار  </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.users.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.users.create")}}">اضافة زائر جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="typcn typcn-group"></i>
                <span> النقاط  </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.points.index")}}">عرض  النقاط</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class=" fas fa-money-bill-alt"></i>
                <span> الهدايا </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.gifts.index")}}">عرض الهدايا</a></li>
                <li><a href="{{route("admin.gifts.create")}}">اضافة هدية  جديد</a></li>
                <li><a href="{{route("admin.gifts.visitor")}}">تسليم الهدايا</a></li>
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar -->
