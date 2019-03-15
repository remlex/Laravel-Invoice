<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ url('cssjs_admin/images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ url('cssjs_admin/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/admin/dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Manage User</a>
                        <ul class="sub-menu children dropdown-menu">
                            @if(Auth::check() && Auth::user()->roles == "Admin")
                                <li><i class="fa fa-user"></i><a href="{{ url('/admin/add') }}">Add User</a></li>
                            @endif
                                <li><i class="fa fa-book"></i><a href="{{ url('/admin/view') }}">View User</a></li>
                        </ul>
                    </li>
                    @if(Auth::check() && Auth::user()->roles == "Admin")
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Manage Products</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-user"></i><a href="{{ url('/admin/addproduct') }}">Add Product</a></li>
                                <li><i class="fa fa-user"></i><a href="{{ url('/admin/addProduct_ajax') }}">Add Product Ajax</a></li>
                                <li><i class="fa fa-book"></i><a href="{{ url('/admin/view_product') }}">View Products</a></li>
                                <li><i class="fa fa-book"></i><a href="{{ url('/admin/view_withdrawal') }}">View Information</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-clipboard"></i>Manage Customer</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-user"></i><a href="{{ url('/admin/addcustomer') }}">Add New Customer</a></li>
                                <li><i class="fa fa-credit-card"></i><a href="{{ url('/admin/add_depositor') }}">Depositor</a></li>
                                <li><i class="fa fa-credit-card"></i><a href="{{ url('/admin/add_withdrawal') }}">Withdrawal</a></li>
                                <li><i class="fa fa-user"></i><a href="{{ url('/admin/addinvoice') }}">Add Customer Invoice</a></li>
                                <li><i class="fa fa-clipboard"></i><a href="{{ url('/admin/birthday') }}">Birthday</a></li>
                                <li><i class="fa fa-clipboard"></i><a href="{{ url('/admin/search-customer') }}">View Withdrawal Details</a></li>
                                <li><i class="fa fa-clipboard"></i><a href="{{ url('/admin/view_withdrawal') }}">View Customer Details</a></li>
                            </ul>
                        </li>

                        
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Upload Documents</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-user"></i><a href="{{ url('/admin/uploadfile') }}">Upload Files</a></li>
                                <li><i class="fa fa-clipboard"></i><a href="{{ url('/admin/view_upload') }}">View Upload Document</a></li>
                            </ul>
                        </li>
                    @endif
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Report</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="#">Summary Report</a></li>
                            <li><i class="fa fa-clipboard"></i><a href="#">All Reports</a></li>
                            <li><i class="fa fa-book"></i><a href="{{ url('/admin/view_withdrawal') }}">View Account</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="{{ url('/admin/logout') }}"> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
                    </li>

                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->