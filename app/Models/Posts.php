<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['UserId','title','content'];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('title','like',"%{$filters['search']}%")
            ->orWhere('content','like',"%{$filters['search']}%");
        }
        if($filters['user'] ?? false){
            $query->where('UserId','like',$filters['user']);
        }
    }
    public function user(){
        return $this->hasOne(User::class,'id','UserId');
    }
}
