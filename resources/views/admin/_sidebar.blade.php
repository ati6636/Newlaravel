<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                @auth
                    <h4 class="font-size-16 mb-1">{{Auth::user()->name}}</h4>
                    <a href="{{route('logout')}}" class="d-block">Logout</a>
                    <span class="text-muted"><i
                            class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                @endauth
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="mm-active">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menü</li>

                <li>
                    <a href="{{route('admin.home')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Anasayfa</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin_category')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Kategoriler</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin_products')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin_message')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Contact Message</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin_review')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Reviews</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin_faq')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Faq</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu " aria-expanded="true">
                        <li><a href="{{route('admin_orders')}}">Orders</a></li>
                        <li><a href="{{route('admin_order_list',['status' => 'new'])}}">New Order</a></li>
                        <li><a href="{{route('admin_order_list',['status' => 'accepted'])}}">Accepted Order</a></li>
                        <li><a href="{{route('admin_order_list',['status' => 'canceled'])}}">Canceled Order</a></li>
                        <li><a href="{{route('admin_order_list',['status' => 'shipping'])}}">Shipping Order</a></li>
                        <li><a href="{{route('admin_order_list',['status' => 'completed'])}}">Completed Order</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin_users')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>User</span>
                    </a>
                </li>

                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Labels</li>

                    <li>
                        <a href="{{route('admin_settings')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
