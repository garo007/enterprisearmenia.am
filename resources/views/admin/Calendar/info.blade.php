
            <p class="event_title">{{json_decode($post)->name->hy ?? ' '}}</p>
            <p class="event_text">{{json_decode($post)->desc->hy ?? ' '}}</p>
            <p class="event_text">{{\Carbon\Carbon::parse($post->event_started_date)->format('H:i') ?? ' '}}</p>
            @if($post->img)
                <img style="max-width: 318px; object-fit: contain;" src="{{ showImage($post->img) }}" alt="">

            @endif
