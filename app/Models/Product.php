<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Metal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class Product extends Model
{
    use HasFactory, WithPagination;

    protected $fillable = [
        'name',
        'metal',
        'weight',
        'change_percent',
    ];

    protected $casts = [
        'metal' => Metal::class,
    ];

    public function getWeightAttribute($value)
    {
        return $value / 1000;
    }

    public function setWeightAttribute($value)
    {
        $this->attributes['weight'] = $value * 1000;
    }

    public function getChangePercentAttribute($value)
    {
        return $value / 100;
    }

    public function setChangePercentAttribute($value)
    {
        $this->attributes['change_percent'] = intval($value * 100);
    }
}
