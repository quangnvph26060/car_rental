<div class="gallery">
    <ul class="list-gallery clear">
        @forelse ($carsGallery as $item)
            <li>
                <div class="img-wrap"
                    style="
            background-image: url({{ showImage($item->image) }});
            ">
                    <div class="hv-ct">
                        <a href="{{ route('frontend.gallery') }}" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
        @empty
        @endforelse

    </ul>
</div>
