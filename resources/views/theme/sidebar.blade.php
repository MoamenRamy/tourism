        <!-- Sidebar -->
        <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
            <div class="sidebar-brand-icon">
                {{-- <img style="width:70%" src="{{ asset('logo.png') }}"> --}}
                Tourism
            </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item {{ request()->is('admin/books*') ? 'active' : '' }}">
                <a class="nav-link" href="">
                    <i class="fas fa-book-open"></i>
                    <span>books</span>
                </a>
            </li> --}}

            <li class="nav-item {{ request()->is('admin/destination*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.destination.index')}}">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Destination</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.categories.index')}}">
                    <i class="fa-solid fa-list"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/tours*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.tours.index')}}">
                    <i class="fa-solid fa-plane"></i>
                    <span>Tour</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/additional-services*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.additional-services.index')}}">
                    <i class="fa-solid fa-plus"></i>
                    <span>Additional Services</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/common-questions*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.common-questions.index')}}">
                    <i class="fa-solid fa-question"></i>
                    <span>Common Question</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/safeties*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.safeties.index')}}">
                    <i class="fa-solid fa-shield"></i>
                    <span>Safety</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/rates*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.rates.index')}}">
                    <i class="fa-solid fa-star"></i>
                    <span>Rates</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/tour-reservations*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.tour-reservations.index')}}">
                    <i class="fa-solid fa-check"></i>
                    <span>Tours Reservations</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/sales*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.sales.index')}}">
                    <i class="fa-solid fa-percent"></i>
                    <span>Sales</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item {{ request()->is('admin/vehicles*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.vehicles.index')}}">
                    <i class="fa-solid fa-van-shuttle"></i>
                    <span>Vehicle</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/transportations*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.transportations.index')}}">
                    <i class="fa-solid fa-car-side"></i>
                    <span>Transportation</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/transportation_additional*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.transportation_additional.index')}}">
                    <i class="fa-solid fa-plus"></i>
                    <span>Additional Services</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/transportation_questions*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.transportation_questions.index')}}">
                    <i class="fa-solid fa-question"></i>
                    <span>Common Question</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/transportation_reservations*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.transportation_reservations.index')}}">
                    <i class="fa-solid fa-check"></i>
                    <span>Reservations</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/transportation_sales*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.transportation_sales.index')}}">
                    <i class="fa-solid fa-percent"></i>
                    <span>Sales</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <li class="nav-item {{ request()->is('admin/currencies*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.currencies.index')}}">
                    <i class="fa-solid fa-coins"></i>
                    <span>Currency</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.users.index')}}">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

           <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
