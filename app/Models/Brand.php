<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brands";
    protected $guarded = [];

    public function models()
    {
        return $this->hasMany(BrandModel::class, 'brand_id', 'id');
    }
}
