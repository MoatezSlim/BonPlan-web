<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Favouris extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'bon_plan_id'];

    protected $searchableFields = ['*'];

    protected $table = 'favourises';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bonPlan()
    {
        return $this->belongsTo(BonPlan::class);
    }


/**
     * Get all bonplan IDs stored in the favourises for a specific user.
     *
     * @param int $userId
     * @return Collection
     */
    public static function getBonPlanIdsForUser(int $userId): Collection
    {
        // Retrieve bonplan IDs for the given user ID
        return static::where('user_id', $userId)->pluck('bon_plan_id');
    }
}
