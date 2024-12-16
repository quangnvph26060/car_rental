@extends('frontend.layouts.master')

@section('content')
    <main class="tintuc-detail">
        <div class="page-position"
            style="
         background-image: url({{ asset('frontend/assets/image/childpage-bg-1.jpg') }});
      ">
            <div class="title">
                <h2 class="hd">Tìm kiếm:{{ request('s') }}</h2>
                <div class="pos-nav">
                    <a href="{{ url('/') }}">Trang chủ</a>
                    -
                    <span class="current">Tìm kiếm: {{ request('s') }}</span>
                </div>
            </div>
        </div>

        <div class="news-page">
            <div class="all">
                <div class="row100">
                    <div class="col25 left">
                        @include('frontend.includes.sideleft')
                    </div>

                    <div class="col75 right">
                        <div class="side-right">
                            <div id="nav-ct1">
                                <ul class="list-news clear">
                                    @forelse ($cars as $item)
                                        <li class="news__item">
                                            <div class="news-block1">
                                                <div class="img">
                                                    <a href="{{ route('frontend.product', $item->slug) }}">
                                                        <img width="600" height="450"
                                                            src="{{ showImage($item->image) }}"
                                                            class="attachment-full size-full wp-post-image" alt=""
                                                            sizes="(max-width: 600px) 100vw, 600px" />
                                                    </a>
                                                </div>
                                                <div class="ct">
                                                    <p class="hd">
                                                        <a href="{{ route('frontend.product', $item->slug) }}">
                                                            {{ $item->title }}
                                                        </a>
                                                    </p>
                                                    <p class="date">Đăng ngày
                                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d \\t\\há\\n\\g m \\nă\\m Y') }}
                                                    </p>
                                                    <div class="mona-except">
                                                        <p>
                                                            {!! Str::limit(strip_tags($item->description), 60, ' [...]') !!}
                                                        </p>
                                                    </div>

                                                    <a href="{{ route('frontend.product', $item->slug) }}"
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
                                                    <li><a class="page-numbers" href="{{ $cars->previousPageUrl() }}">←</a>
                                                    </li>
                                                @endif


                                                @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                                                    @if ($page == $cars->currentPage())
                                                        <li><span aria-current="page"
                                                                class="page-numbers current">{{ $page }}</span>
                                                        </li>
                                                    @elseif ($page == 1 || $page == $cars->lastPage() || abs($page - $cars->currentPage()) < 2)
                                                        <li><a class="page-numbers"
                                                                href="{{ $url }}">{{ $page }}</a></li>
                                                    @elseif ($page == 2 && $cars->currentPage() > 4)
                                                        <li><span class="page-numbers dots">&hellip;</span></li>
                                                    @elseif ($page == $cars->lastPage() - 1 && $cars->currentPage() < $cars->lastPage() - 3)
                                                        <li><span class="page-numbers dots">&hellip;</span></li>
                                                    @endif
                                                @endforeach


                                                @if ($cars->hasMorePages())
                                                    <li><a class="next page-numbers"
                                                            href="{{ $cars->nextPageUrl() }}">→</a>
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
                                        <img src="{{ asset('frontend/assets/image/header-top-icon3.png') }}"
                                            alt="" />
                                    </div>
                                    <p>Gọi cho chúng tôi:</p>
                                    <p class="hl"><strong>{{ $configWebsite->advisory }}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="sub-news">
                                <div class="title">
                                    <h3 class="hd">XE ĐƯỢC YÊU THÍCH</h3>
                                </div>
                                <div class="list">

                                    @foreach ($favoriteCar as $item)
                                        <div class="news-block3 mona-sticky-product">
                                            <div class="img">
                                                <a href="{{ route('frontend.product', $item->slug) }}"><img width="105"
                                                        height="70" src="{{ showImage($item->image) }}"
                                                        class="attachment-mons_thumbnail size-mons_thumbnail wp-post-image"
                                                        alt="" sizes="(max-width: 105px) 100vw, 105px" /></a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a
                                                        href="{{ route('frontend.product', $item->slug) }}">{{ $item->name }}</a>
                                                </p>
                                                <p class="price mona-text-label">1,600,000 VND</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
