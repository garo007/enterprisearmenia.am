<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Map extends Model
{
    protected $table = 'map';
    protected $fillable = ['name', "data", "lang"];


    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_chart', 'chart_id', 'post_id');
    }
}

