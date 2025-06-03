<x-layout.main>
    <div class="navbar">
        <div class="navbar-start">
            <div class="block">
                <h1 class="title is-4">
                    {{ $project->title }}
                </h1>
                <div class="tags">
                    <span class="tag has-text-weight-bold">
                        {{ $project->state }}
                    </span>
                    <x-task.priority-tag :task="$project"></x-task.priority-tag>
                </div>
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="{{ route('projects.edit', $project) }}" class="button is-primary">Edit</a>
                    <x-ui.modal name="delete" title="Confirm delete"
                                type="danger">
                        <x-slot:trigger class="is-danger">Delete</x-slot:trigger>

                        <form id="delete-project" method="POST" action="{{ route('projects.destroy', $project) }}">
                            @csrf
                            @method('DELETE')
                            Click "Confirm" to delete this Project.
                            <br>
                            <strong>CAUTION!</strong> This action cannot be undone.
                        </form>

                        <x-slot:footer>
                            <div class="control">
                                <button type="submit" form="delete-project" class="button is-danger">Confirm</button>
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
    <div class="block mt-3">
        <div class="tags has-addons">
            <span class="tag">Progress</span>
            <span class="tag has-text-weight-bold
                {{ $project->time_spent > $project->time_estimated ? 'has-text-danger' : '' }}">
                {{ $project->progress }}%
            </span>
        </div>
        Here are some debug values (should be removed before production):
        <br>Created: {{ $project->created_at }}
        <br>Estimated: {{ $project->time_estimated }}
        <br>Spent: {{ $project->time_spent }}
        <br>Expect: {{ $project->expect_completed_at }}
        <br>
        <x-ui.date-tag title="Created">{{ $project->created_at }}</x-ui.date-tag>
        <x-ui.date-tag title="Updated">{{ $project->updated_at }}</x-ui.date-tag>
        @if($project->completed_at)
            <x-ui.date-tag title="Completed">{{ $project->completed_at }}</x-ui.date-tag>
        @endif
        <h2 class="subtitle is-6">
            {!! $project->description !!}
        </h2>
    </div>

    <div class="block">
        <h1 class="title is-4">
            Tasks ({{ $project->task_count }})
        </h1>
        @foreach($project->tasks as $task)
            <x-task.list-item :task="$task"></x-task.list-item>
        @endforeach
    </div>
</x-layout.main>
