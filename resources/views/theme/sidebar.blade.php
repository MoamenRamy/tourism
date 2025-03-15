        <!-- Sidebar -->
        <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon">
                {{-- <img style="width:70%" src="{{ asset('logo.png') }}"> --}}
                Tourism
            </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <a class="nav-link" href="">
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
                    <i class="fas fa-book-open"></i>
                    <span>Destination</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.categories.index')}}">
                    <i class="fas fa-book-open"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/tours*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.tours.index')}}">
                    <i class="fas fa-book-open"></i>
                    <span>Tour</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/common-questions*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.common-questions.index')}}">
                    <i class="fas fa-book-open"></i>
                    <span>Common Question</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/additional-services*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.additional-services.index')}}">
                    <i class="fas fa-book-open"></i>
                    <span>Additional Services</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/safeties*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.safeties.index')}}">
                    <i class="fas fa-book-open"></i>
                    <span>Safety</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/rates*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.rates.index')}}">
                    <i class="fas fa-book-open"></i>
                    <span>Rates</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/tour-reservations*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.tour-reservations.index')}}">
                    <i class="fas fa-book-open"></i>
                    <span>Tours Reservations</span>
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
