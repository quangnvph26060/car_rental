<div class="gallery">
    <ul class="list-gallery clear">
       @forelse ($cars as $item)
       <li>
        <div class="img-wrap" style="
      background-image: url({{ asset('storage/'.$item->image) }});
    ">
            <div class="hv-ct">
                <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
            </div>
        </div>
    </li>
       @empty

       @endforelse

    </ul>
</div>
