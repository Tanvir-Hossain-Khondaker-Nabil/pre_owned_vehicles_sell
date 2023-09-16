<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Basic</li>
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">Vehicle Entry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('vehicle-info.index') }}" key="t-level-1-2">Vehicle List</a></li>
                        <li><a href="{{ route('vehicle-info.create') }}" key="t-level-1-1">Vehicle Entry</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">Supplier</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('suppliers.index') }}" key="t-level-1-2">List</a></li>
                        <li><a href="{{ route('suppliers.create') }}" key="t-level-1-1">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">Customer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('customers.index') }}" key="t-level-1-2">list</a></li>
                        <li><a href="{{ route('customers.create') }}" key="t-level-1-1">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect"  aria-expanded="true">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">Vehicle</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('vehicles.create') }}" key="t-level-1-1">Create</a></li>
                        <li><a href="{{ route('vehicles.index') }}" key="t-level-1-2">Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect"  aria-expanded="true">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">Vehicle Model</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('vehiclemodels.create') }}" key="t-level-1-1">Create</a></li>
                        <li><a href="{{ route('vehiclemodels.index') }}" key="t-level-1-2">Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect"  aria-expanded="true">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">Wash Color</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('washcolors.create') }}" key="t-level-1-1">Create</a></li>
                        <li><a href="{{ route('washcolors.index') }}" key="t-level-1-2">Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect"  aria-expanded="true">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">Work Shop</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('workshops.create') }}" key="t-level-1-1">Create</a></li>
                        <li><a href="{{ route('workshops.index') }}" key="t-level-1-2">Table</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
