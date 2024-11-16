@extends('frontend.layouts.master')

@section('content')
<main class="tintuc-detail">
    <div class="page-position" style="
        background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/childpage-bg-1.jpg);
      ">
        <div class="title">
            <h2 class="hd">Tìm kiếm:a</h2>
            <div class="pos-nav">
                <a href="https://xecuoiluxury.com">Trang chủ</a>
                -
                <span class="current">Tìm kiếm: a</span>
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
                                                <img width="600" height="450" src="{{ asset('storage/'.$item->image) }}"
                                                    class="attachment-full size-full wp-post-image" alt="" srcset="
                                                        {{ asset('storage/'.$item->image) }} 600w,
                                                        {{ asset('storage/'.$item->image) }} 300w
                            " sizes="(max-width: 600px) 100vw, 600px" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a
                                                    href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-vinfast-lux-a2-0/">
                                                    {{ $item->title }}
                                                </a>
                                            </p>
                                            <p class="date">Đăng ngày {{
                                                \Carbon\Carbon::parse($item->created_at)->translatedFormat('d
                                                \\T\\há\\n\\g F, Y') }}</p>
                                            <div class="mona-except">
                                                <p>
                                                    {!! Str::limit(strip_tags($item->description), 60, ' [...]') !!}
                                                </p>
                                            </div>

                                            <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-vinfast-lux-a2-0/"
                                                class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </li>
                                @empty

                                @endforelse

                            </ul>
                            @if ($cars->lastPage() > 1)
                            <div class="more-button">
                                <nav class="pagination">
                                    <ul class="page-numbers">

                                        @if ($cars->onFirstPage())
                                        <li><span class="page-numbers disabled">←</span></li>
                                        @else
                                        <li><a class="page-numbers" href="{{ $cars->previousPageUrl() }}">←</a></li>
                                        @endif


                                        @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                                        @if ($page == $cars->currentPage())
                                        <li><span aria-current="page" class="page-numbers current">{{ $page }}</span>
                                        </li>
                                        @elseif ($page == 1 || $page == $cars->lastPage() || abs($page -
                                        $cars->currentPage()) < 2) <li><a class="page-numbers" href="{{ $url }}">{{
                                                $page }}</a></li>
                                            @elseif ($page == 2 && $cars->currentPage() > 4)
                                            <li><span class="page-numbers dots">&hellip;</span></li>
                                            @elseif ($page == $cars->lastPage() - 1 && $cars->currentPage() < $cars->
                                                lastPage() - 3)
                                                <li><span class="page-numbers dots">&hellip;</span></li>
                                                @endif
                                                @endforeach


                                                @if ($cars->hasMorePages())
                                                <li><a class="next page-numbers" href="{{ $cars->nextPageUrl() }}">→</a>
                                                </li>
                                                @else
                                                <li><span class="page-numbers disabled">→</span></li>
                                                @endif
                                    </ul>
                                </nav>
                            </div>
                            @endif


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
                                        <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/"><img width="105"
                                                height="70"
                                                src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-105x70.png"
                                                class="attachment-mons_thumbnail size-mons_thumbnail wp-post-image"
                                                alt="" srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-210x140.png 210w
                          " sizes="(max-width: 105px) 100vw, 105px" /></a>
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
                                                alt="" srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-210x140.png 210w
                          " sizes="(max-width: 105px) 100vw, 105px" /></a>
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
                                                alt="" srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-210x140.png 210w
                          " sizes="(max-width: 105px) 100vw, 105px" /></a>
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
                                                alt="" srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3-210x140.png 210w
                          " sizes="(max-width: 105px) 100vw, 105px" /></a>
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
                                                alt="" srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-105x70.png  105w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-670x446.png 670w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-210x140.png 210w
                          " sizes="(max-width: 105px) 100vw, 105px" /></a>
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
