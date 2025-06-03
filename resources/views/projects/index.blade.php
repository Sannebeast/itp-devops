<x-layout.main>
    <div class="navbar">
        <div class="navbar-start">
            <h1 class="title is-4">Projects</h1>
        </div>
        <div class="navbar-end">
            <a href="{{ route('projects.create') }}" class="button is-primary">Create a New Project</a>
        </div>
    </div>
    @foreach($projects as $project)
        <article class="media">
            <div class="media-content">
                <div class="content">
                    <a href="{{ route('projects.show', $project) }}">
                        {{ $project->title }} ({{ $project->completed_task_count }}/{{ $project->task_count }} tasks)
                    </a>
                </div>
            </div>
            <div class="media-right">
            </div>
        </article>
    @endforeach
</x-layout.main>
