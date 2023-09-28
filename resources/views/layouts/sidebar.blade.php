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
                        <i class="bx bx-window-open"></i>
                        <span key="t-multi-level">Vehicle Entry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('vehicle-info.index') }}" key="t-level-1-2">Vehicle List</a></li>
                        <li><a href="{{ route('vehicle-info.create') }}" key="t-level-1-1">Vehicle Entry</a></li>
                    </ul>
                </li>

                {{-- Status Menu-bar --}}
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-window-open"></i>
                        <span key="t-multi-level">Status</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('transport.index') }}" class=" waves-effect">
                                <i class="bx bx-transfer-alt"></i>
                                <span>Vehicle Transport List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('vehicle.workshop.index') }}" class=" waves-effect">
                                <i class="bx bx-wrench"></i>
                                <span>Vehicle Workshop List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('vehicle.wash.color.index') }}" class=" waves-effect">
                                <i class="bx bxs-color-fill"></i>
                                <span>Vehicle Wash/Color List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('vehicle.garage.index') }}" class=" waves-effect">
                                <i class="bx bx-store"></i>
                                <span>Vehicle Garage List</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-user-check"></i>
                        <span key="t-multi-level">Supplier</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('suppliers.index') }}" key="t-level-1-2">List</a></li>
                        <li><a href="{{ route('suppliers.create') }}" key="t-level-1-1">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-user-plus"></i>
                        <span key="t-multi-level">Customer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('customers.index') }}" key="t-level-1-2">list</a></li>
                        <li><a href="{{ route('customers.create') }}" key="t-level-1-1">Create</a></li>
                    </ul>
                </li>

                {{-- Configuration Menu-bar --}}
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-window-open"></i>
                        <span key="t-multi-level">Configuration</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bxs-car"></i>
                                <span key="t-multi-level">Vehicle</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('vehicles.create') }}" key="t-level-1-1">Create</a></li>
                                <li><a href="{{ route('vehicles.index') }}" key="t-level-1-2">Table</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bx-subdirectory-right"></i>
                                <span key="t-multi-level">Vehicle Model</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('vehiclemodels.create') }}" key="t-level-1-1">Create</a></li>
                                <li><a href="{{ route('vehiclemodels.index') }}" key="t-level-1-2">Table</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bx-wind"></i>
                                <span key="t-multi-level">Wash Color</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('washcolors.create') }}" key="t-level-1-1">Create</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bx-link"></i>
                                <span key="t-multi-level">Work Shop</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('workshops.create') }}" key="t-level-1-1">Create</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bx-link"></i>
                                <span key="t-multi-level">Vehicle Documents</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('vehicledoc.create') }}" key="t-level-1-1">Create</a></li>
                                <li><a href="{{ route('vehicledoc.list') }}" key="t-level-1-2">Table</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                {{-- Accounting Menu-bar --}}
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-window-open"></i>
                        <span key="t-multi-level">Accounting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bxs-car"></i>
                                <span key="t-multi-level">Account</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('accounts.create') }}" key="t-level-1-1">Add Account</a></li>
                                <li><a href="{{ route('accounts.index') }}" key="t-level-1-2">Account List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bxs-car"></i>
                                <span key="t-multi-level">Expense Category</span>
                            </a>                            
                            <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('expense-categories.create') }}" key="t-level-1-1">Add</a></li>
                            <li><a href="{{ route('expense-categories.index') }}" key="t-level-1-2">List</a></li>
                        </ul>
                        </li>
                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bxs-car"></i>
                                <span key="t-multi-level">Expense</span>
                            </a>                            
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('expenses.create') }}" key="t-level-1-1">Add</a></li>
                                <li><a href="{{ route('expenses.index') }}" key="t-level-1-2">List</a></li>
                            </ul>
                        </li>
                        
                        
                    </ul>
                </li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
