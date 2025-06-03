<x-layout.main>

    <div class="box">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PATCH')
            <h1 class="title is-4">Edit Task {{ $task->id }}</h1>
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
                           value="{{ old('title', $task) }}" autocomplete="title" autofocus>
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
                <label for="description" class="label">Description</label>
                <div class="control has-icons-right">
                    <textarea name="description"
                              class="textarea @error('description') is-danger @enderror"
                              type="text" placeholder="Enter a task description..."
                    >{{ old('description', $task) }}</textarea>
                    @error('description')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('description')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="priority" class="label">Priority</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="priority" value="1"
                            {{ old('priority', $task) == 1 || old('priority', $task) == null ? 'checked' : '' }}>
                        No priority
                    </label>
                    <label class="radio">
                        <input type="radio" name="priority" value="2"
                            {{ old('priority', $task) == 2 ? 'checked' : '' }}>
                        Moderate
                    </label>
                    <label class="radio">
                        <input type="radio" name="priority" value="3"
                            {{ old('priority', $task) == 3 ? 'checked' : '' }}>
                        Urgent
                    </label>
                    <label class="radio">
                        <input type="radio" name="priority" value="4"
                            {{ old('priority', $task) == 4 ? 'checked' : '' }}>
                        Critical!
                    </label>
                </div>
            </div>

            <div class="field">
                <label for="state" class="label">State</label>
                <div class="control has-icons-right">
                    <div class="select @error('state') is-danger @enderror">
                        <select name="state">
                            <option value="new"
                                {{ old('state', $task) == 'new' || old('state', $task) == null  ? 'selected' : '' }}>
                                New
                            </option>
                            <option value="deferred"
                                {{ old('state', $task) == 'deferred' ? 'selected' : '' }}>
                                Deferred
                            </option>
                            <option value="cancelled"
                                {{ old('state', $task) == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                            <option value="in progress"
                                {{ old('state', $task) == 'in progress' ? 'selected' : '' }}>
                                In progress
                            </option>
                            <option value="on hold"
                                {{ old('state', $task) == 'on hold' ? 'selected' : '' }}>
                                On hold
                            </option>
                            <option value="completed"
                                {{ old('state', $task) == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                    </div>
                    @error('state')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('state')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="time_estimated" class="label">Time estimated</label>
                <div class="control @error('time_estimated') has-icons-right @enderror">
                    <input type="number" name="time_estimated" placeholder="The time estimated in hours..."
                           class="input @error('time_estimated') is-danger @enderror"
                           value="{{ old('time_estimated', $task) }}" autocomplete="time_estimated">
                    @error('time_estimated')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('time_estimated')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="time_spent" class="label">Time spent</label>
                <div class="control @error('time_spent') has-icons-right @enderror">
                    <input type="number" name="time_estimated" placeholder="The time spent in hours..."
                           class="input @error('time_spent') is-danger @enderror"
                           value="{{ old('time_spent', $task) }}" autocomplete="time_estimated">
                    @error('time_spent')
                    <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    @enderror
                </div>
                @error('time_spent')
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
