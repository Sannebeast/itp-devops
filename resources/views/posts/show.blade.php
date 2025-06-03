<x-layout.main>
    <div class="navbar mb-3">
        <div class="navbar-start">
            <div class="block">
                <h1 class="title is-4">{{ $post->title }}</h1>
                <h2 class="subtitle is-6 is-italic">
                    {!! $post->excerpt !!}
                </h2>
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="{{ route('posts.edit', $post) }}" class="button is-primary">Edit this post</a>
                    <x-ui.modal name="delete" title="Confirm delete"
                                type="danger">
                        <x-slot:trigger class="is-danger">Delete</x-slot:trigger>

                        <form id="delete-post" method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            Click "Confirm" to delete this Blog Post.
                            <br>
                            <strong>CAUTION!</strong> This action cannot be undone.
                        </form>

                        <x-slot:footer>
                            <div class="control">
                                <button type="submit" form="delete-post" class="button is-danger">Confirm</button>
                            </div>
                            <div class="control">
                                <button type="button" class="button is-light cancel">Cancel</button>
                            </div>
                        </x-slot:footer>
                    </x-ui.modal>
                </div>
            </div>
        </div>
    </div>
    <div class="block">
        {!! $post->body !!}
    </div>
    <div class="block">
        <h2 class="title is-5">
            Comments ({{ $post->comment_count }})
        </h2>
        @foreach($post->comments as $comment)
            <p class="is-italic">{{ $comment->created_at }}</p>
            <p>{!! $comment->content !!}</p>
            <hr/>
        @endforeach
    </div>
</x-layout.main>
