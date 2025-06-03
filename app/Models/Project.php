<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    /**
     * a Project has Many Tasks
     *
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the project's task count
     *
     * @return Attribute
     */
    public function taskCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->tasks()->count()
        );
    }

    /**
     * Get the project's completed task count
     *
     * @return Attribute
     */
    public function completedTaskCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->countTasksInState('completed')
        );
    }

    /**
     * Get the project's time_spent, which is the sum of all the time spent on
     * each task
     *
     * @return Attribute
     */
    public function timeSpent(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->tasks->reduce(
                fn (?int $carry, Task $item) => $carry + $item->time_spent
            ),
        );
    }

    /**
     * Get the project's time_estimated, which is the sum of all the time spent on
     * each task
     *
     * @return Attribute
     */
    public function timeEstimated(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->tasks->reduce(
                fn (?int $carry, Task $item) => $carry + $item->time_estimated
            ),
        );
    }

    /**
     * Get the project's priority, which is the highest priority of its tasks
     *
     * @return Attribute
     */
    public function priority(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->tasks->reduce(
                fn (?int $carry, Task $item) =>
                    $carry > $item->priority ? $carry : $item->priority
            ),
        );
    }

    /**
     * Get the project's completed_at, which is the sum of all the times
     * estimated for each task
     *
     * @return Attribute
     */
    public function completedAt(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->hasAllTasksComplete())
                    return null;
                return $this->tasks->reduce( fn (?int $carry, Task $item) =>
                    $carry > $item->completed_at ? $carry : $item->completed_at
                );
            },
        );
    }

    private function hasAllTasksComplete()
    {
        if ($this->task_count == 0) {
            return false;
        }
        foreach ($this->tasks as $task) {
            if ($task->completed_at == null)
                return false;
        }
        return true;
    }

    public function state(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->computeState()
        );
    }

    private function computeState()
    {
        // all child tasks are in state ‘new’ or there are no child tasks present:
        $new_tasks_count = $this->countTasksInState('new');
        if ($this->task_count == 0 || $this->task_count == $new_tasks_count) {
            return 'new';
        }

        // all the child tasks have state ‘cancelled’
        $cancelled_tasks_count = $this->countTasksInState('cancelled');
        if ($this->task_count == $cancelled_tasks_count) {
            return 'cancelled';
        }

        // all the child tasks have state ‘completed’, but one or more might be ‘cancelled’
        $completed_task_count = $this->countTasksInState('completed');
        if ($this->task_count - $cancelled_tasks_count == $completed_task_count) {
            return 'completed';
        }

        // all the child tasks have state ‘deferred’, but one or more might be either ‘completed’ or ‘cancelled’
        $deferred_task_count = $this->countTasksInState('deferred');
        if ($this->task_count - $completed_task_count - $cancelled_tasks_count == $deferred_task_count) {
            return 'deferred';
        }

        // all child tasks have state ‘on hold’, but one or more might have either ‘new’, ‘completed’ or ‘cancelled’
        $on_hold_task_count = $this->countTasksInState('on hold');
        if ($this->task_count - $new_tasks_count - $completed_task_count - $cancelled_tasks_count
            == $on_hold_task_count) {
            return 'on hold';
        }

        // all child tasks have state ‘planned’, but one or more might have either ‘new’, ‘completed’ or ‘cancelled’
        $planned_task_count = $this->countTasksInState('planned');
        if ($this->task_count - $new_tasks_count - $completed_task_count - $cancelled_tasks_count
            == $planned_task_count) {
            return 'planned';
        }

        // when it is not in any of the other states:
        return 'in progress';
    }

    private function countTasksInState(string $state)
    {
        return $this->tasks->reduce( fn (?int $carry, Task $item) =>
            $item->state == $state ? $carry + 1 : $carry
        , 0);
    }

    /**
     * Get the project's completed_at, which is the highest completed_at of its
     * tasks or `null` if any of them is null
     *
     * @return Attribute
     */
    public function expectCompletedAt(): Attribute
    {
        return Attribute::make(
            get: function () {
                $result = null;
                foreach ($this->tasks as $task) {
                    if ($task->expect_completed_at == null) {
                        return null;
                    }
                    $result = $task->expect_completed_at > $result ? $task->expect_completed_at : $result;
                }
                return $result;
            },
        );
    }

}
