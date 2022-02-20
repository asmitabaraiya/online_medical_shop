@php 

    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
   
@endphp

<aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">

                <div class="user-profile">
                    <div class="ulogo">
                        <a href="{{route('admin.dashboard') }}">
                            <!-- logo for regular state and mobile devices -->
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                                <h3><b>Easy</b> Shop</h3> 
                            </div>
                        </a>
                    </div>
                </div>

                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                
                    <li class="{{ ($route == 'admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                   
                    <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }} " >
                        <a href="#">
                            <i data-feather="message-circle"></i>
                            <span>Brands</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ($route == 'all.brand') ? 'active' : '' }}" ><a href="{{route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
                        </ul>
                    </li>

                    <li class="treeview  {{ ($prefix == '/category') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="mail"></i> <span>Product Category</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ($route == 'all.category') ? 'active' : '' }}"><a href="{{route('all.category')}}"><i class="ti-more "></i>All Category</a></li>
                            <li class="{{ ($route == 'all.subcategory') ? 'active' : '' }}"><a href="{{route('all.subcategory')}}"><i class="ti-more "></i>All SubCategory</a></li>
                            <li class="{{ ($route == 'all.subsubcategory') ? 'active' : '' }}"><a href="{{route('all.subsubcategory')}}"><i class="ti-more "></i>All Sub-SubCategory</a></li>
                           
                        </ul>
                    </li>

                    <li class="treeview  {{ ($prefix == '/product') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Products</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'add.product') ? 'active' : '' }}"><a href="{{route('add.product')}}"><i class="ti-more"></i>Add Product</a></li>
                            <li class=" {{ ($route == 'product.manage') ? 'active' : '' }}"><a href="{{route('product.manage')}}"><i class="ti-more"></i>Manage Product</a></li>
                           
                        </ul>
                    </li>

                    <li class="treeview  {{ ($prefix == '/medicine_category') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Medicine Category</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'all.medicine_category') ? 'active' : '' }}"><a href="{{route('all.medicine_category')}}"><i class="ti-more"></i>All Medicine Category</a></li>
                        </ul>
                    </li>

                    <li class="treeview  {{ ($prefix == '/medicine') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Medicines</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'add.medicine') ? 'active' : '' }}"><a href="{{route('add.medicine')}}"><i class="ti-more"></i>Add Medicine </a></li>
                            <li class=" {{ ($route == 'medicine.manage') ? 'active' : '' }}"><a href="{{route('medicine.manage')}}"><i class="ti-more"></i>Manage Medicine</a></li>
                           
                           
                        </ul>
                    </li>

                    



                    <li class="treeview  {{ ($prefix == '/slider') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Slider</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'manage.slider') ? 'active' : '' }}"><a href="{{route('manage.slider')}}"><i class="ti-more"></i>Manage Slider</a></li>
                           
                        </ul>
                    </li>


                    <li class="treeview  {{ ($prefix == '/coupon') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Coupon</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'manage.coupon') ? 'active' : '' }}"><a href="{{route('manage.coupon')}}"><i class="ti-more"></i>Manage Coupon</a></li>
                           
                        </ul>
                    </li>

                    <li class="treeview  {{ ($prefix == '/orders') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Orders</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'orders.pandingOrder') ? 'active' : '' }}"><a href="{{route('orders.pandingOrder')}}"><i class="ti-more"></i>Panding Orders</a></li>
                            <li class=" {{ ($route == 'orders.confirmOrder') ? 'active' : '' }}"><a href="{{route('orders.confirmOrder')}}"><i class="ti-more"></i>Confirm Orders</a></li>
                            <li class=" {{ ($route == 'orders.processingOrder') ? 'active' : '' }}"><a href="{{route('orders.processingOrder')}}"><i class="ti-more"></i>Processing Orders</a></li>
                            <li class=" {{ ($route == 'orders.pickedOrder') ? 'active' : '' }}"><a href="{{route('orders.pickedOrder')}}"><i class="ti-more"></i>Picked Orders</a></li>
                            <li class=" {{ ($route == 'orders.shippedOrder') ? 'active' : '' }}"><a href="{{route('orders.shippedOrder')}}"><i class="ti-more"></i>Shipped Orders</a></li>
                            <li class=" {{ ($route == 'orders.deliveredOrder') ? 'active' : '' }}"><a href="{{route('orders.deliveredOrder')}}"><i class="ti-more"></i>Delivered Orders</a></li>
                            <li class=" {{ ($route == 'orders.cancelOrder') ? 'active' : '' }}"><a href="{{route('orders.cancelOrder')}}"><i class="ti-more"></i>Cancel Orders</a></li>
                            
                        </ul>
                    </li>


                    <li class="treeview  {{ ($prefix == '/shipping') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Shipping Area</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'manage.division') ? 'active' : '' }}"><a href="{{route('manage.division')}}"><i class="ti-more"></i>Manage Division</a></li>                                                   
                            <li class=" {{ ($route == 'manage.district') ? 'active' : '' }}"><a href="{{route('manage.district')}}"><i class="ti-more"></i>Manage District</a></li>                           
                            <li class=" {{ ($route == 'manage.state') ? 'active' : '' }}"><a href="{{route('manage.state')}}"><i class="ti-more"></i>Manage State</a></li>                           
                     
                        </ul>
                    </li>


                    <li class="treeview  {{ ($prefix == '/repots') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Reports</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'all.repots') ? 'active' : '' }}"><a href="{{route('all.repots')}}"><i class="ti-more"></i>All Repots</a></li>                                                                               
                        </ul>
                    </li>

                    <li class="treeview  {{ ($prefix == '/users') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'all.user') ? 'active' : '' }}"><a href="{{route('all.user')}}"><i class="ti-more"></i>All Users</a></li>                                                                               
                        </ul>
                    </li>

                    <li class="treeview  {{ ($prefix == '/blogs') ? 'active' : '' }}">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Blogs</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'blog.category') ? 'active' : '' }}"><a href="{{route('blog.category')}}"><i class="ti-more"></i>Blog Category</a></li>                                                                               
                        </ul>

                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'blog.post.view') ? 'active' : '' }}"><a href="{{route('blog.post.view')}}"><i class="ti-more"></i>View Blog Post </a></li>                                                                               
                        </ul>

                        <ul class="treeview-menu">
                            <li class=" {{ ($route == 'blog.post') ? 'active' : '' }}"><a href="{{route('blog.post')}}"><i class="ti-more"></i>Add Blog Post </a></li>                                                                               
                        </ul>
                                                
                    </li>


                    <li class="header nav-small-cap">User Interface</li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="grid"></i>
                            <span>Components</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="grid"></i>
                            <span>Cards</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                        </ul>
                    </li>

                    
                 
                </ul>
            </section>

            <div class="sidebar-footer">
                <!-- item-->
                <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
                    aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                        class="ti-email"></i></a>
                <!-- item-->
                <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                        class="ti-lock"></i></a>
            </div>
        </aside>