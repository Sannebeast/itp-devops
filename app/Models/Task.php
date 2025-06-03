<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'priority', 'state',
        'time_estimated', 'time_spent'];

    /**
     * a Task might belong to one Project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function complete()
    {
        $this->state = 'completed';
        $this->completed_at = Carbon::now();
        $this->save();
    }

    /**
     * Returns the progress of this task, which is the ratio between the
     * estimated and spent time. This is a percentage.
     *
     * @return Attribute
     */
    public function progress(): Attribute
    {
        return Attribute::make(
            get: function() {
                // Prevent divide by zero errors
                if ($this->time_estimated == 0)
                    return 0;

                return number_format(100 * $this->time_spent / $this->time_estimated, 0);
            }
        );
    }

    /**
     * Returns the pace of the task in minutes per percent-point. When the
     * progress is 0, the pace can't be calculated and `null` is returned.
     *
     * @return Attribute
     */
    public function pace(): Attribute
    {
        return Attribute::make(
            get: function() {
                $progress = $this->progress;

                if ($progress == 0)
                    return null;

                $time = now()->diffInMinutes($this->created_at);

                return $time / $progress;
            }
        );
    }

    /**
     * Returns the expected completed at timestamp. When this task state is
     * such that it can't be calculated, `null` is returned.
     *
     * @return Attribute
     */
    public function expectCompletedAt(): Attribute
    {
        return Attribute::make(
            get: function() {
                $pace = $this->pace;

                if ($pace == null)
                    return null;

                return now()->addMinutes($pace * (100 - $this->progress));
            }
        );
    }
}
