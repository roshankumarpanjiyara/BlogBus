<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function permission(){
		return $this->hasOne(Permission::class);
	}
}
