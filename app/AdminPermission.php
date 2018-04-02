<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    //
    protected $table = "admin_permissions";

    protected $guarded = [];

    //权限属于哪些角色
    public function roles(){
        return $this->belongsToMany(\App\AdminRole::class,"admin_permission_role","permission_id","role_id")
            ->withPivot(["permission_id","role_id"]);
    }

}
