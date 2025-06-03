<x-layout.main>
    <div class="navbar mb-3">
        <div class="navbar-start">
            <div class="block">
                <h1 class="title is-4">Blog</h1>
                <h2 class="subtitle is-6 is-italic">
                    Welcome to our blog, where productivity meets practicality! Dive into a
                    world of efficiency and organization as we explore tips, tricks, and
                    strategies to conquer your to-do list and elevate your productivity game.
                </h2>
            </div>
        </div>
        <div class="navbar-end">
            <a href="{{ route('posts.create') }}" class="button is-primary">Create a New Blog Post</a>
        </div>
    </div>
    @foreach($posts as $post)
        <x-post.list-item :post="$post"></x-post.list-item>
    @endforeach
</x-layout.main>
