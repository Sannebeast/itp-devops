<x-layout.main>

    <div class="box">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <h1 class="title is-4">Create a New Task</h1>
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
                           value="{{ old('title') }}" autocomplete="title" autofocus>
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
                    <x-ui.wysiwyg name="description" height="240" class="@error('description') is-danger @enderror"
                                  placeholder="Enter the task's description..."
                                  value="{{ old('description') }}" ></x-ui.wysiwyg>
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
                            {{ old('priority') == 1 || old('priority') == null ? 'checked' : '' }}>
                        No priority
                    </label>
                    <label class="radio">
                        <input type="radio" name="priority" value="2"
                            {{ old('priority') == 2 ? 'checked' : '' }}>
                        Moderate
                    </label>
                    <label class="radio">
                        <input type="radio" name="priority" value="3"
                            {{ old('priority') == 3 ? 'checked' : '' }}>
                        Urgent
                    </label>
                    <label class="radio">
                        <input type="radio" name="priority" value="4"
                            {{ old('priority') == 4 ? 'checked' : '' }}>
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
                                {{ old('state') == 'new' || old('state') == null  ? 'selected' : '' }}>
                                New
                            </option>
                            <option value="deferred"
                                {{ old('state') == 'deferred' ? 'selected' : '' }}>
                                Deferred
                            </option>
                            <option value="cancelled"
                                {{ old('state') == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                            <option value="in progress"
                                {{ old('state') == 'in progress' ? 'selected' : '' }}>
                                In progress
                            </option>
                            <option value="on hold"
                                {{ old('state') == 'on hold' ? 'selected' : '' }}>
                                On hold
                            </option>
                            <option value="completed"
                                {{ old('state') == 'completed' ? 'selected' : '' }}>
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
                           value="{{ old('time_estimated', 0) }}" autocomplete="time_estimated">
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
