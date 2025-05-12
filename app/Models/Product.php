<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'uuid',
        'title',
        'handle',
        'price',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'product_uuid', 'uuid');
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
