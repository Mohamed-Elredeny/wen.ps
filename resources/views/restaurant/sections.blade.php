<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li>
            <a href="/restaurant/">
                <i class="mdi mdi-view-dashboard"></i>
                <span> لوحة التحكم </span>
            </a>
        </li>

        <li>
            <a href="{{ route('restaurant.details.edit',['detail' => 1]) }}">
                <i class=" fas fa-money-bill-alt"></i>
                <span> تفاصيل المطعم </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-hamburger"></i>
                <span> الفئات </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("restaurant.categories.index")}}">عرض الكل</a></li>
                <li><a href="{{route("restaurant.categories.create")}}">اضافة فئة جديدة</a></li>
            </ul>
        </li>
        
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-pizza-slice"></i>
                <span> قائمة الطعام </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("restaurant.meals.index")}}">عرض الكل</a></li>
                <li><a href="{{route("restaurant.meals.create")}}">اضافة وجبة جديدة</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-utensils"></i>
                <span> الطاولات </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("restaurant.tables.index")}}">عرض الكل</a></li>
                <li><a href="{{route("restaurant.tables.create")}}">اضافة طاولة جديدة</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="mdi mdi-black-mesa"></i>
                <span> طلبات قيد الانتظار  </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("restaurant.requests.meals")}}">طلبات الوجبات</a></li>
                <li><a href="{{route("restaurant.requests.tables")}}">طلبات الطاولات</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('restaurant.reports') }}">
                <i class="fas fa-edit"></i>
                <span> التقارير  </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-glass-cheers"></i>
                <span> الحفلات  </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("restaurant.events.index")}}">عرض الكل</a></li>
                <li><a href="{{route("restaurant.events.create")}}">اضافة حفلة</a></li>
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar -->
