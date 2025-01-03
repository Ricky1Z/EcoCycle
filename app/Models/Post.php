<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $guarded = [];
    protected $fillable = [
        'buyer_id',
        'content',
        'image',
        'like'
    ];

    protected $attributes = [
        'like' => 0,
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
}
