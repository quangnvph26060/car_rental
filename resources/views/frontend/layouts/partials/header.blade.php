<div class="hd-top">
    <div class="all">
        <div class="hdt-logo">
            <a href="/" class="custom-logo-link" rel="home" itemprop="url"><img width="209"
                    height="49" src="{{ showImage($configWebsite->logo) }}"
                    class="custom-logo" alt="" itemprop="logo" /></a>
        </div>
        <div class="hdt-right">
            <div class="hdt__infos clear">
                <div class="info__child">
                    <div class="img">
                        <img src="https://xecuoiluxury.com/template/images/header-top-icon1.png" alt="" />
                    </div>
                    <div class="ct">
                        {{-- Địa Chỉ Công Ty:
                        <span class="hl"><strong> </strong>
                            <p><strong>Tầng 4 - 01 Thái Hà - Hà Nội</strong></p>
                        </span> --}}
                        {!! $contactWebsite->headquarters !!}
                    </div>
                </div>
                <div class="info__child">
                    <div class="img">
                        <img src="https://xecuoiluxury.com/template/images/header-top-icon2.png" alt="" />
                    </div>
                    <div class="ct">
                        {{-- <p>Thời Gian Làm Việc:</p>
                        <p>
                            Thứ 2 đến thứ 7:
                            <span class="hl"><strong>8h00 - 17h30</strong></span>
                        </p> --}}
                        {!! $contactWebsite->working_hours !!}
                    </div>
                </div>
                <div class="info__child">
                    <div class="img">
                        <img src="https://xecuoiluxury.com/template/images/header-top-icon3.png" alt="" />
                    </div>
                    <div class="ct">
                        <p>Hotline:</p>
                        <p>
                            <a href="" class="hl"><strong>{{ $contactWebsite->phone_number }}</strong></a>
                        </p>
                    </div>
                </div>
                <div class="info__child search">
                    <a class="mn-btn circle-icon">
                        <i class="fa fa-search"></i>
                    </a>

                    <div class="form-search">
                        <form method="get" id="searchform" class="searchform" action="{{ route('frontend.home') }}">
                            <input type="search" class="search-field f-control" name="s" value=""
                                id="s" placeholder="Search …" />
                            <button type="submit" class="mn-btn submit-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hd-main">
    <div class="all">
        <div class="hdm-wrap">
            <div class="navbar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="nav-wrap">
                <div class="nav-overlay"></div>
                <ul id="menu-main" class="mona-main-menu nav-ul">
                    {{-- @dd(request()->route()->getName()) --}}
                    <li id="menu-item-131"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home {{ request()->routeIs('frontend.home') ? 'current-menu-item page_item page-item-2 current_page_item' : '' }} menu-item-131">
                        <a href="{{ route('frontend.home') }}">Trang chủ</a>
                    </li>
                    <li id="menu-item-2224"
                        class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->routeIs('frontend.introduce') ? 'current-menu-item page_item page-item-2 current_page_item' : '' }} menu-item-2224">
                        <a href="{{ route('frontend.introduce') }}">Giới thiệu</a>
                    </li>
                    <li id="menu-item-1940"
                        class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('dich-vu') ? 'current-menu-item page_item page-item-2 current_page_item' : '' }} menu-item-1940">
                        <a href="{{ route('frontend.service') }}">Dịch vụ</a>
                    </li>
                    <li id="menu-item-1943"
                        class="menu-item menu-item-type-custom menu-item-object-custom {{ \Request::is('dich-vu/xe-cuoi-dep') ? 'current-menu-item page_item page-item-2 current_page_item' : '' }}  menu-item-1943">
                        <a href="{{ route('frontend.service', $typeCarWebsite[0]->slug) }}">Xe Cưới</a>
                    </li>
                    <li id="menu-item-2445"
                        class="menu-item menu-item-type-custom menu-item-object-custom {{ \Request::is('dich-vu/hoa-xe-cuoi') ? 'current-menu-item page_item page-item-2 current_page_item' : '' }} menu-item-2445">
                        <a href="{{ route('frontend.service', $typeCarWebsite[6]->slug ?? $typeCarWebsite[1]->slug) }}">Hoa Cưới</a>
                    </li>
                    <li id="menu-item-2426"
                        class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->routeIs('frontend.contact') ? 'current-menu-item page_item page-item-2 current_page_item' : '' }} menu-item-2426">
                        <a href="{{ route('frontend.contact') }}">Liên Hệ</a>
                    </li>
                </ul>
                <div class="mona-top-social">
                    <ul class="ft-media clear">
                        <li>
                            <a href="{{ $configWebsite->fanpage }}" target="_blank" class="square-30fa"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="square-30fa"><i
                                    class="fa-brands fa-google"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="square-30fa"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="square-30fa"><i
                                    class="fa-brands fa-linkedin"></i></a>
                        </li>
                    </ul>
                    <div class="last">
                        <a href="{{ route('frontend.booking') }}">YÊU CẦU BÁO GIÁ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
