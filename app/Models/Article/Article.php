<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'description',
        'content',
        'date'
    ];

    public static function search($value)
    {
        return DB::table('articles')
        ->where('title', 'ilike', '%' . $value . '%')
        ->orWhere('description', 'ilike', '%' . $value . '%')
        ->get();
    }
    

}
