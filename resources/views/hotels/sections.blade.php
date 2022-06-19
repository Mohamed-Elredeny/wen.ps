<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li>
            <a href="/hotel/">
                <i class="mdi mdi-view-dashboard"></i>
                <span> لوحة التحكم </span>
            </a>
        </li>

        <li>
            <a href="{{ route('hotel.details.edit',['detail' => 1]) }}">
                <i class=" fas fa-money-bill-alt"></i>
                <span> تفاصيل الفندق </span>
            </a>
        </li> 

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-bed"></i>
                <span> الغرف </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("hotel.rooms.index")}}">عرض الكل</a></li>
                <li><a href="{{route("hotel.rooms.create")}}">اضافة غرفة جديدة</a></li>
            </ul>
        </li>

        <li>
            <a href="{{route("hotel.requests.rooms")}}">
                <i class="mdi mdi-black-mesa"></i>
                <span> طلبات قيد الانتظار  </span>
            </a>
        </li>

        <li>
            <a href="{{ route('hotel.reports') }}">
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
                <li><a href="{{route("hotel.events.index")}}">عرض الكل</a></li>
                <li><a href="{{route("hotel.events.create")}}">اضافة حفلة</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-glass-cheers"></i>
                <span>الخدمات</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("hotel.services.index")}}">عرض الخدمات</a></li>
                <li><a href="{{route("hotel.services.create")}}">إضافة خدمة</a></li>
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar -->
