<x-layout.main>
    <div class="navbar">
        <div class="navbar-start">
            <div class="block">
                <h1 class="title is-4">
                    {{ $task['title'] }}
                </h1>
                <div class="tags">
                    <span class="tag has-text-weight-bold">
                        {{ $task['state'] }}
                    </span>
                    <x-task.priority-tag :$task></x-task.priority-tag>
                </div>
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="{{ route('tasks.edit', $task) }}" class="button is-primary">Edit</a>
                    <x-ui.modal name="delete" title="Confirm delete"
                                type="danger">
                        <x-slot:trigger class="is-danger">Delete</x-slot:trigger>

                        <form id="delete-project" method="POST" action="{{ route('tasks.destroy', $task) }}">
                            @csrf
                            @method('DELETE')
                            Click "Confirm" to delete this Task.
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
                    <form id="delete-project" method="POST" action="{{ route('tasks.complete', $task) }}">
                        @csrf
                        <button type="submit" class="button is-success">Complete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="block mt-3">
        <div class="tags has-addons">
            <span class="tag">Progress</span>
            <span class="tag has-text-weight-bold
                {{ $task['time_spent'] > $task['time_estimated'] ? 'has-text-danger' : '' }}">
                {{ $task->progress }}%
            </span>
        </div>
        @if($task->project)
            <p>Belongs to project: {{ $task->project->title }}</p>
        @endif
        Here are some debug values (should be removed before production):
        <br>Created: {{ $task->created_at }}
        <br>Estimated: {{ $task->time_estimated }}
        <br>Spent: {{ $task->time_spent }}
        <br>Expect: {{ $task->expect_completed_at }}
        <br>
        <x-ui.date-tag title="Created">{{ $task['created_at'] }}</x-ui.date-tag>
        <x-ui.date-tag title="Updated">{{ $task['updated_at'] }}</x-ui.date-tag>
        @if($task['completed_at'])
            <x-ui.date-tag title="Completed">{{ $task['completed_at'] }}</x-ui.date-tag>
        @endif
        <h2 class="subtitle is-6">
            {!! $task['description'] !!}
        </h2>
    </div>
</x-layout.main>
