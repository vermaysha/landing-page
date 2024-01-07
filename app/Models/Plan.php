<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperPlan
 */
class Plan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'icon_file',
        'is_popular',
        'show_on_homepage',
        'price',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_popular' => 'boolean',
        'show_on_homepage' => 'boolean',
        'price' => 'double',
    ];

    /**
     * Retrieve the items associated with the model.
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(PlanItem::class);
    }
}
