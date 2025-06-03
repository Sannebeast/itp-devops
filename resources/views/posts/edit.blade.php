<x-layout.main>

    <div class="box">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PATCH')
            <h1 class="title is-4">Edit Blog Post {{ $post->id }}</h1>
            <br>
            <h2 class="subtitle is-6 is-italic">
                Please fill out all the form fields and click 'Submit'
            </h2>

            {{-- Here are all the form fields --}}
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control has-icons-right">
                    <input type="text" name="title" placeholder="Enter the post's title..."
                           class="input @error('title') is-danger @enderror"
                           value="{{ old('title', $post) }}" autocomplete="title" autofocus>
                    @error('title')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('title')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="excerpt" class="label">Excerpt</label>
                <div class="control has-icons-right">
                    <x-ui.wysiwyg name="excerpt" height="120" class="@error('excerpt') is-danger @enderror"
                                  placeholder="Enter the blog post's summary..."
                                  value="{{ old('excerpt', $post) }}" ></x-ui.wysiwyg>
                    @error('excerpt')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('excerpt')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="body" class="label">Body</label>
                <div class="control has-icons-right">
                    <x-ui.wysiwyg name="body" rows="15" class="@error('body') is-danger @enderror"
                                  placeholder="Enter the blog post's content..."
                                  value="{{ old('body', $post) }}" ></x-ui.wysiwyg>
                    @error('body')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('body')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">Save</button>
                </div>
                <div class="control">
                    <a type="button" href="{{ url()->previous() }}" class="button is-light">Cancel</a>
                </div>
                <div class="control">
                    <button type="reset" class="button is-warning">Reset</button>
                </div>
            </div>
        </form>
    </div>
</x-layout.main>
