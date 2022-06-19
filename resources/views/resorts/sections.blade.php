<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li>
            <a href="/resort/">
                <i class="mdi mdi-view-dashboard"></i>
                <span> لوحة التحكم </span>
            </a>
        </li>

        <li>
            <a href="{{ route('resort.details.edit',['detail' => 1]) }}">
                <i class=" fas fa-money-bill-alt"></i>
                <span> تفاصيل المنتجع </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-swimmer"></i>
                <span> الفئات </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("resort.categories.index")}}">عرض الكل</a></li>
                <li><a href="{{route("resort.categories.create")}}">اضافة فئة جديدة</a></li>
            </ul>
        </li>
        
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-umbrella-beach"></i>
                <span>  المنتجعات</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("resort.resorts.index")}}">عرض الكل</a></li>
                <li><a href="{{route("resort.resorts.create")}}">اضافة منتجع جديدة</a></li>
            </ul>
        </li> 

        <li>
            <a href="{{route("resort.requests.resorts")}}">
                <i class="mdi mdi-black-mesa"></i>
                <span> حجزات قيد الانتظار  </span>
            </a>
        </li>

        <li>
            <a href="{{ route('resort.reports') }}">
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
                <li><a href="{{route("resort.events.index")}}">عرض الكل</a></li>
                <li><a href="{{route("resort.events.create")}}">اضافة حفلة</a></li>
            </ul>
        </li>

    </ul>
</div>
<!-- Sidebar -->
