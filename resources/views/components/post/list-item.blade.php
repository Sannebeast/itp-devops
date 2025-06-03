<article class="media">
    <div class="media-content">
        <div class="content">
            <a class="is-size-5" href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
            <br>
            <div class="is-size-7">
                {!! $post->excerpt !!}
            </div>
        </div>
    </div>
</article>
