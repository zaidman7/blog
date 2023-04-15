<article class="comment">
    <div class="profile-pic-container">
        <a href="/user/{{ sha1($rating->user->name . $rating->user->created_at) }}">
            @if($rating->user->file)
                <img src="{{ $rating->user->file_path }}" alt="{{ $rating->user->name }}" style="object-fit: cover; width: 145px; height: 144px;">
            @else
                <img src="/images/lary-newsletter-icon.png" alt="{{ $rating->user->name }}" style="object-fit: cover; width: 145px; height: 144px;">
            @endif
        </a>
    </div>

    <div class="rating-content">
        <div>
            <img src="/images/{{ $rating->rating }}-stars.png" alt="rating" style="object-fit: cover; width: 157px; height: 25px;">
        </div>

        <div class="rating-title">
            <div>
                <h3>
                    {{ $rating->title }}
                </h3>
            </div>
        </div>
                
        <div class="rating-text">
            <p>
                {{ $rating->content }}
            </p>
        </div>
    </div>
</article>