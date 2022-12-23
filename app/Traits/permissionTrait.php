<?php
namespace App\Traits;

trait  permissionTrait{
	public function hasPermission(){


		//for user
		if(!isset(auth()->user()->role->permission['name']['user']['can-view']) && \Route::is('users.index')){
			return abort(401);
		}
		if(!isset(auth()->user()->role->permission['name']['user']['can-view']) && \Route::is('users.create')){
			return abort(401);
		}
		//for role
		if(!isset(auth()->user()->role->permission['name']['role']['can-view']) && \Route::is('roles.index')){
			return abort(401);
		}
		if(!isset(auth()->user()->role->permission['name']['role']['can-view']) && \Route::is('roles.create')){
			return abort(401);
		}
		//permission
		if(!isset(auth()->user()->role->permission['name']['permission']['can-view']) && \Route::is('permissions.index')){
			return abort(401);
		}
		if(!isset(auth()->user()->role->permission['name']['permission']['can-view']) && \Route::is('permissions.create')){
			return abort(401);
		}
		//catelog
		if(!isset(auth()->user()->role->permission['name']['catelog']['can-view']) && \Route::is('categorys.create')){
			return abort(401);
		}
		if(!isset(auth()->user()->role->permission['name']['catelog']['can-view']) && \Route::is('posts.index')){
			return abort(401);
		}
		if(!isset(auth()->user()->role->permission['name']['catelog']['can-view']) && \Route::is('posts.create')){
			return abort(401);
		}
		//pending
		if(!isset(auth()->user()->role->permission['name']['pending']['can-view']) && \Route::is('pending.index')){
			return abort(401);
		}
		//addons
		if(!isset(auth()->user()->role->permission['name']['addons']['can-view']) && \Route::is('userposts.create')){
			return abort(401);
		}
		if(!isset(auth()->user()->role->permission['name']['addons']['can-view']) && \Route::is('userposts.index')){
			return abort(401);
		}
        //for contact
        if(!isset(auth()->user()->role->permission['name']['contact']['can-view']) && \Route::is('contacts.index')){
			return abort(401);
		}
        //advertisements
		if(!isset(auth()->user()->role->permission['name']['advertisement']['can-view']) && \Route::is('advertisements.create')){
			return abort(401);
		}
		if(!isset(auth()->user()->role->permission['name']['advertisement']['can-view']) && \Route::is('advertisements.index')){
			return abort(401);
		}
	}
}
