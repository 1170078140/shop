<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminPermission;
use function Sodium\compare;

class PermissionController extends Controller
{

    // 权限列表
    public function index(){
        $permissions = AdminPermission::all();
        $title="权限管理";
        return view("admin/permission/index",compact("permissions","title"));
    }

    // 创建权限
    public function create(){
        $title="创建权限";
        return view("admin/permission/create",compact("title"));
    }

    // 保存权限
    public function store(Request $request){

        // 验证

        // 逻辑
        $params = $request->except("_token");
        //dd($params);

        AdminPermission::create($params);

        // 视图
        $permissions = AdminPermission::all();
        $title="权限管理";
        return view("admin/permission/index",compact("permissions","title"));


    }




}
