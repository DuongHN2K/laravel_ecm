<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Trang chủ</div>
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active':'' }}" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Giao diện quản trị</div>
                
                {{--                 
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>
                --}}

                <a class="nav-link 
                {{ Request::is('admin/products/create')
                || Request::is('admin/products') 
                || Request::is('admin/brands/create') 
                || Request::is('admin/brands')
                || Request::is('admin/categories/create')
                || Request::is('admin/categories') 
                ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesManageProducts" aria-expanded="false" aria-controls="collapsePagesManageProducts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Quản trị ngành hàng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse 
                {{ Request::is('admin/products/create')
                || Request::is('admin/products') 
                || Request::is('admin/brands/create') 
                || Request::is('admin/brands')
                || Request::is('admin/categories/create')
                || Request::is('admin/categories') 
                ? 'show':'' }}" id="collapsePagesManageProducts" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link {{ Request::is('admin/categories/create') || Request::is('admin/categories') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseCategory" aria-expanded="false" aria-controls="pagesCollapseCategory">
                            Danh mục
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ Request::is('admin/categories/create') || Request::is('admin/categories') ? 'show':'' }}" id="pagesCollapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('admin/categories/create') ? 'active':'' }}" href="{{ url('admin/categories/create') }}">Thêm danh mục</a>
                                <a class="nav-link {{ Request::is('admin/categories') ? 'active':'' }}" href="{{ url('admin/categories') }}">Hiện danh mục</a>
                            </nav>
                        </div>

                        <a class="nav-link {{ Request::is('admin/brands/create') || Request::is('admin/brands') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseBrand" aria-expanded="false" aria-controls="pagesCollapseBrand">
                            Thương hiệu
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ Request::is('admin/brands/create') || Request::is('admin/brands') ? 'show':'' }}" id="pagesCollapseBrand" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('admin/brands/create') ? 'active':'' }}" href="{{ url('admin/brands/create') }}">Thêm thương hiệu</a>
                                <a class="nav-link {{ Request::is('admin/brands') ? 'active':'' }}" href="{{ url('admin/brands') }}">Hiện thương hiệu</a>
                            </nav>
                        </div>

                        <a class="nav-link {{ Request::is('admin/products/create') || Request::is('admin/products') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseProduct" aria-expanded="false" aria-controls="pagesCollapseProduct">
                            Sản phẩm
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ Request::is('admin/products/create') || Request::is('admin/products') ? 'show':'' }}" id="pagesCollapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}" href="{{ url('admin/products/create') }}">Thêm sản phẩm</a>
                                <a class="nav-link {{ Request::is('admin/products') ? 'active':'' }}" href="{{ url('admin/products') }}">Hiện sản phẩm</a>
                            </nav>
                        </div>
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('admin/users') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseUsers" aria-expanded="false" aria-controls="pagesCollapseUsers">
                    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                    Quản trị người dùng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/users') ? 'show':'' }}" id="pagesCollapseUsers" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/users') ? 'active':'' }}" href="{{ url('admin/users') }}">Hiện người dùng</a>
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('admin/orders') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseOrders" aria-expanded="false" aria-controls="pagesCollapseOrders">
                    <div class="sb-nav-link-icon"><i class="bi bi-card-list"></i></div>
                    Quản trị đơn hàng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/orders') ? 'show':'' }}" id="pagesCollapseOrders" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/orders') ? 'active':'' }}" href="{{ url('admin/orders') }}">Hiện đơn hàng</a>
                    </nav>
                </div>

                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> --}}
                
                {{-- <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đang đăng nhập:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>