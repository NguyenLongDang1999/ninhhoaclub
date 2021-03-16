<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'status',
        'meta_keyword',
        'meta_description',
        'created_at',
        'updated_at'
    ];

    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
