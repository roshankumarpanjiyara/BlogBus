<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['username','title','slug','body','image','category_id','created_by','approved_by','status','reads','postmessage'];

    public function user(){
        return $this->belongsTo(User::class,'username','username');
    }

    public function category(){
    	return $this->hasOne(Category::class,'id','category_id');
    }

    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }
}
