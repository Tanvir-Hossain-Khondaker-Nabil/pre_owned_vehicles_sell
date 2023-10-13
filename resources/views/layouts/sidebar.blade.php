<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Basic</li>
                <li>
                    <a href="{{ route('vehicle-info.index') }}">
                        <i class="bx bx-window-open"></i>
                        <span key="t-multi-level">Vehicle Entry</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-user-check"></i>
                        <span key="t-multi-level">Supplier</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('suppliers.create') }}" key="t-level-1-1">Add</a></li>
                        <li><a href="{{ route('suppliers.index') }}" key="t-level-1-2">List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                        <i class="bx bx-user-plus"></i>
                        <span key="t-multi-level">Customer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('customers.create') }}" key="t-level-1-1">Add</a></li>
                        <li><a href="{{ route('customers.index') }}" key="t-level-1-2">list</a></li>
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
                                <li><a href="{{ route('vehicles.create') }}" key="t-level-1-1">Add</a></li>
                                <li><a href="{{ route('vehicles.index') }}" key="t-level-1-2">List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bx-subdirectory-right"></i>
                                <span key="t-multi-level">Vehicle Model</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('vehicle-models.create') }}" key="t-level-1-1">Add</a></li>
                                <li><a href="{{ route('vehicle-models.index') }}" key="t-level-1-2">List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bx-wind"></i>
                                <span key="t-multi-level">Color</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('colors.create') }}" key="t-level-1-1">Create</a></li>
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
                                <li><a href="{{ url('balance-sheet') }}" key="t-level-1-2">Balance Sheet</a></li>
                                <li><a href="{{ url('account-statement') }}" key="t-level-1-2">Accaccount-statement</a>
                                </li>
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

                        <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bxs-car"></i>
                                <span key="t-multi-level">Sell</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('sells.create') }}" key="t-level-1-1">Add</a></li>
                                {{-- <li><a href="{{ route('payments.index') }}" key="t-level-1-2">List</a></li> --}}
                            </ul>
                        </li>



                        {{-- Money Transfer Menu-bar --}}


                        {{-- <li>
                            <a href="javascript: void(1);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                <span key="t-multi-level">Money Transfer</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('moneytr.create') }}" key="t-level-1-1">Create</a></li>
                                <li><a href="{{ route('moneytr.list') }}" key="t-level-1-2">Table</a></li>
                            </ul>
                        </li> --}}




                    </ul>
                </li>












            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
