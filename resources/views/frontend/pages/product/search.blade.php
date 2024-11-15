@extends('frontend.layouts.master')

@section('content')
    <main class="tintuc-detail">
        <div class="page-position"
            style="
        background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/childpage-bg-1.jpg);
      ">
            <div class="title">
                <h2 class="hd">Tìm kiếm:{{ $search }}</h2>
                <div class="pos-nav">
                    <a href="https://xecuoiluxury.com">Trang chủ</a>
                    -
                    <span class="current">Tìm kiếm: {{ $search }}</span>
                </div>
            </div>
        </div>

        <div class="news-page">
            <div class="all">
                <div class="row100">
                    <div class="col25 left">
                        <div class="side-left">
                            <div class="sec-title2">
                                <h2 class="hd">Danh mục <br />tin tức</h2>
                            </div>
                            <ul class="sidebar-nav">
                                <li class="nav__item">
                                    <a href="https://xecuoiluxury.com/category/tin-tuc-chinh/">Tin tức chính<i
                                            class="fa fa-chevron-right"></i></a>
                                </li>
                                <li class="nav__item">
                                    <a href="https://xecuoiluxury.com/category/gioi-thieu-xe/">Giới thiệu xe<i
                                            class="fa fa-chevron-right"></i></a>
                                </li>
                                <li class="nav__item">
                                    <a href="https://xecuoiluxury.com/category/tu-van/">Tư vấn<i
                                            class="fa fa-chevron-right"></i></a>
                                </li>
                                <li class="nav__item">
                                    <a href="https://xecuoiluxury.com/category/kinh-nghiem/">Kinh nghiệm<i
                                            class="fa fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col75 right">
                        <div class="side-right">
                            <div id="nav-ct1">
                                <ul class="list-news clear">
                                    @forelse ($cars as $item )
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-vinfast-lux-a2-0/">
                                                    <img width="600" height="450"
                                                        src="{{ file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/assets/images/no-photo.jpg') }}"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                                                        {{ file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/assets/images/no-photo.jpg') }}   600w,
                                                        {{ file_exists(public_path('storage/' . $item->image)) ? asset('storage/' . $item->image) : asset('frontend/assets/images/no-photo.jpg') }} 300w
                            "
                                                        sizes="(max-width: 600px) 100vw, 600px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a
                                                        href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-vinfast-lux-a2-0/">
                                                        {{ $item->name }}
                                                        </a>
                                                </p>
                                                <p class="date">Đăng ngày {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d \\T\\há\\n\\g F, Y') }}</p>
                                                <div class="mona-except">
                                                    <p>
                                                        {!! \Illuminate\Support\Str::limit($item->description, 45, '...') !!}
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-vinfast-lux-a2-0/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    @empty

                                    @endforelse
                                    {{-- <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/">
                                                    <img width="902" height="1026"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1.png          902w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-264x300.png  264w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-768x874.png  768w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-900x1024.png 900w
                            "
                                                        sizes="(max-width: 902px) 100vw, 902px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/">Hoa Xe
                                                        Cưới &#8211; HCL: 039</a>
                                                </p>
                                                <p class="date">Đăng ngày 4 Tháng Mười, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/">
                                                    <img width="900" height="855"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3.png         900w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-300x285.png 300w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-768x730.png 768w
                            "
                                                        sizes="(max-width: 900px) 100vw, 900px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a
                                                        href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/">Hoa
                                                        Xe Cưới &#8211; HCL: 038</a>
                                                </p>
                                                <p class="date">Đăng ngày 4 Tháng Mười, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/">
                                                    <img width="900" height="675"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2.png         900w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-300x225.png 300w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-768x576.png 768w
                            "
                                                        sizes="(max-width: 900px) 100vw, 900px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/">Hoa
                                                        Xe Cưới &#8211; HCL: 037</a>
                                                </p>
                                                <p class="date">Đăng ngày 4 Tháng Mười, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/">
                                                    <img width="640" height="480"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3.png         640w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3-300x225.png 300w
                            "
                                                        sizes="(max-width: 640px) 100vw, 640px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/">Hoa Xe
                                                        Cưới &#8211; HCL: 036</a>
                                                </p>
                                                <p class="date">Đăng ngày 28 Tháng Chín, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/">
                                                    <img width="900" height="675"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2.png         900w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-300x225.png 300w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-768x576.png 768w
                            "
                                                        sizes="(max-width: 900px) 100vw, 900px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/">Hoa
                                                        Xe Cưới &#8211; HCL: 035</a>
                                                </p>
                                                <p class="date">Đăng ngày 28 Tháng Chín, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-034/">
                                                    <img width="900" height="675"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1.png         900w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1-300x225.png 300w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1-768x576.png 768w
                            "
                                                        sizes="(max-width: 900px) 100vw, 900px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-034/">Hoa Xe
                                                        Cưới &#8211; HCL: 034</a>
                                                </p>
                                                <p class="date">Đăng ngày 28 Tháng Chín, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-034/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-1-cum-gia-re-029/">
                                                    <img width="768" height="576"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-1.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-1.png         768w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-1-300x225.png 300w
                            "
                                                        sizes="(max-width: 768px) 100vw, 768px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a
                                                        href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-1-cum-gia-re-029/">Hoa
                                                        Xe Cưới &#8211; HCL: 033</a>
                                                </p>
                                                <p class="date">Đăng ngày 28 Tháng Chín, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-1-cum-gia-re-029/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="news__item">
                                        <div class="news-block1">
                                            <div class="img">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-1-cum-029/">
                                                    <img width="800" height="800"
                                                        src="https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-3.png"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset="
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-3.png         800w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-3-150x150.png 150w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-3-300x300.png 300w,
                              https://xecuoiluxury.com/wp-content/uploads/2019/09/tron-1trieu-3-768x768.png 768w
                            "
                                                        sizes="(max-width: 800px) 100vw, 800px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-1-cum-029/">Hoa
                                                        Xe Cưới &#8211; HCL: 032</a>
                                                </p>
                                                <p class="date">Đăng ngày 28 Tháng Chín, 2019</p>
                                                <div class="mona-except">
                                                    <p>
                                                        Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo
                                                        Chủ Rể
                                                    </p>
                                                </div>

                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-1-cum-029/"
                                                    class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="more-button">
                                    <nav class="pagination">
                                        <ul class="page-numbers">
                                            <li>
                                                <span aria-current="page" class="page-numbers current">1</span>
                                            </li>
                                            <li>
                                                <a class="page-numbers" href="https://xecuoiluxury.com/page/2/?s=a">2</a>
                                            </li>
                                            <li>
                                                <a class="page-numbers" href="https://xecuoiluxury.com/page/3/?s=a">3</a>
                                            </li>
                                            <li>
                                                <a class="page-numbers" href="https://xecuoiluxury.com/page/4/?s=a">4</a>
                                            </li>
                                            <li><span class="page-numbers dots">&hellip;</span></li>
                                            <li>
                                                <a class="page-numbers" href="https://xecuoiluxury.com/page/8/?s=a">8</a>
                                            </li>
                                            <li>
                                                <a class="page-numbers" href="https://xecuoiluxury.com/page/9/?s=a">9</a>
                                            </li>
                                            <li>
                                                <a class="page-numbers"
                                                    href="https://xecuoiluxury.com/page/10/?s=a">10</a>
                                            </li>
                                            <li>
                                                <a class="next page-numbers"
                                                    href="https://xecuoiluxury.com/page/2/?s=a">&rarr;</a>
                                            </li> --}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div id="nav-ct2"></div>
                            <div id="nav-ct3"></div>
                        </div>
                    </div>

                    <div class="col25 left">
                        <div class="sideleft-bot">
                            <div class="callus-block">
                                <div class="detail">
                                    <div class="img">
                                        <img src="https://xecuoiluxury.com/template/images/child-page/callus-icon.png"
                                            alt="" />
                                    </div>
                                    <p>Gọi cho chúng tôi:</p>
                                    <p class="hl"><strong>094.8888.438</strong></p>
                                </div>
                            </div>
                            <div class="sub-news">
                                <div class="title">
                                    <h3 class="hd">XE ĐƯỢC YÊU THÍCH</h3>
                                </div>
                                <div class="list">
                                    <div class="news-block3 mona-sticky-product">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/"><img
                                                    width="105" height="70"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-105x70.png"
                                                    class="attachment-mons_thumbnail size-mons_thumbnail wp-post-image"
                                                    alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-210x140.png 210w
                          "
                                                    sizes="(max-width: 105px) 100vw, 105px" /></a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/">Hoa Xe Cưới
                                                    &#8211; HCL: 039</a>
                                            </p>
                                            <p class="price mona-text-label">1,600,000 VND</p>
                                        </div>
                                    </div>
                                    <div class="news-block3 mona-sticky-product">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/"><img
                                                    width="105" height="70"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-105x70.png"
                                                    class="attachment-mons_thumbnail size-mons_thumbnail wp-post-image"
                                                    alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-210x140.png 210w
                          "
                                                    sizes="(max-width: 105px) 100vw, 105px" /></a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/">Hoa
                                                    Xe Cưới &#8211; HCL: 038</a>
                                            </p>
                                            <p class="price mona-text-label">1,700,000 VND</p>
                                        </div>
                                    </div>
                                    <div class="news-block3 mona-sticky-product">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/"><img
                                                    width="105" height="70"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-105x70.png"
                                                    class="attachment-mons_thumbnail size-mons_thumbnail wp-post-image"
                                                    alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-210x140.png 210w
                          "
                                                    sizes="(max-width: 105px) 100vw, 105px" /></a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/">Hoa
                                                    Xe Cưới &#8211; HCL: 037</a>
                                            </p>
                                            <p class="price mona-text-label">1,800,000 VND</p>
                                        </div>
                                    </div>
                                    <div class="news-block3 mona-sticky-product">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/"><img
                                                    width="105" height="70"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3-105x70.png"
                                                    class="attachment-mons_thumbnail size-mons_thumbnail wp-post-image"
                                                    alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3-210x140.png 210w
                          "
                                                    sizes="(max-width: 105px) 100vw, 105px" /></a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/">Hoa Xe
                                                    Cưới &#8211; HCL: 036</a>
                                            </p>
                                            <p class="price mona-text-label">2,300,000 VND</p>
                                        </div>
                                    </div>
                                    <div class="news-block3 mona-sticky-product">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/"><img
                                                    width="105" height="70"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-105x70.png"
                                                    class="attachment-mons_thumbnail size-mons_thumbnail wp-post-image"
                                                    alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-210x140.png 210w
                          "
                                                    sizes="(max-width: 105px) 100vw, 105px" /></a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/">Hoa Xe
                                                    Cưới &#8211; HCL: 035</a>
                                            </p>
                                            <p class="price mona-text-label">2,300,000 VND</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
