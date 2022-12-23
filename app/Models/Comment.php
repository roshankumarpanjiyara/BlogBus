<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function post(){
    	return $this->hasOne(Post::class,'id','post_id');
    }

    public function incrementUpVoteCount() {
        $this->upvotes++;
        return $this->save();
    }

    public function incrementDownVoteCount() {
        $this->downvotes++;
        return $this->save();
    }
}
