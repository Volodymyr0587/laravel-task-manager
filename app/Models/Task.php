<?php

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];

    /**
     * Get the user that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    #[Scope]
    public function search($query, $term)
    {
        $term = "%{$term}%";

        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term)
                ->orWhere('description', 'like', $term);
        });
    }


    protected $casts = [
        'status' => TaskStatus::class,
    ];
}
