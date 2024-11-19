<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ asset('backend/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                    class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ isActiveRoute(['admin.dashboard']) }}">
                    <a href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ isActiveRoute(['admin.type-car.index', 'admin.type-car.create', 'admin.type-car.edit']) }}">
                    <a href="{{ route('admin.type-car.index') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Dịch vụ</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ isActiveRoute(['admin.brand-car.index', 'admin.brand-car.create', 'admin.brand-car.edit']) }}">
                    <a href="{{ route('admin.brand-car.index') }}">
                        <i class="fa-solid fa-code-branch"></i>
                        <p>Hãng xe</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ isActiveRoute(['admin.car.index', 'admin.car.create', 'admin.car.edit', 'admin.images.car.index']) }}">
                    <a href="{{ route('admin.car.index') }}">
                        <i class="fa-solid fa-car"></i>
                        <p>Xe</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.benefits.index']) }}">
                    <a href="{{ route('admin.benefits.index') }}">
                        <i class="fa-solid fa-check"></i>
                        <p>Lợi ích</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.service-commitment.index']) }}">
                    <a href="{{ route('admin.service-commitment.index') }}">
                        <i class="fa-solid fa-code-commit"></i>
                        <p>Cam kết</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.categories-post.index']) }}">
                    <a href="{{ route('admin.categories-post.index') }}">
                        <i class="fa-solid fa-list"></i>
                        <p>Danh mục tin tức</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.posts.index']) }}">
                    <a href="{{ route('admin.posts.index') }}">
                        <i class="fa-solid fa-newspaper"></i>
                        <p>Bài viết</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.colors.index']) }}">
                    <a href="{{ route('admin.colors.index') }}">
                        <i class="fa-solid fa-palette"></i>
                        <p>Màu sắc</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.reviews.index']) }}">
                    <a href="{{ route('admin.reviews.index') }}">
                        <i class="fa-solid fa-star"></i>
                        <p>Đánh giá</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.contact.getContactInfo']) }}">
                    <a href="{{ route('admin.contact.getContactInfo') }}">
                        <i class="fas fa-phone-alt"></i>
                        <p>Liên hệ</p>
                    </a>
                </li>
                <li class="nav-item {{ isActiveRoute(['admin.booking.request']) }}">
                    <a href="{{ route('admin.booking.request') }}">
                        <i class="fa-solid fa-truck"></i>
                        <p>Yêu cầu đặt xe</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

