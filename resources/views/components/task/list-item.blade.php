<article class="media">
    <div class="media-left">
        <x-task.state-icon :$task></x-task.state-icon>
    </div>
    <div class="media-content">
        <div class="content">
            <a href="{{ route('tasks.show', $task['id']) }}">
                {{ $task['title'] }}
            </a>
            <br>
            <div class="tags">
        <span class="tag has-text-weight-bold">
            {{ $task['state'] }}
        </span>
                <x-task.priority-tag :task="$task"></x-task.priority-tag>
            </div>

        </div>
    </div>
    <div class="media-right">
    </div>
</article>
