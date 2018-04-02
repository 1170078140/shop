<?php

namespace App\Http\Controllers\admin;

use App\AdminPermission;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\AdminRole;
use function Sodium\compare;

class RoleController extends Controller
{
    // 角色列表
    public function index(){
        $title="角色管理";
        $roles = AdminRole::all();
        return view("admin.role.index",compact("roles","title"));
    }

    //创建角色
    public function create(){
        $title="创建角色";
        return view("admin/role/create",compact("title"));
    }

    // 创建角色行为
    public function store(Request $request){
        // 验证
        $this->validate($request,[
            "name"=>"required|string|min:3|unique:admin_roles",
            "des"=>"required|min:5"
        ]);


        // 逻辑
        $params = $request->except("_token");
        $res = AdminRole::create($params);

        // 视图
        return redirect("admin/role/index");

    }

    // 角色权限关系页面
    public function permission(AdminRole $role){
        $title="角色权限";
        $permissions = AdminPermission::all();
        $myPermissions = $role->permissions;
        return view("admin/role/permission",compact("title","permissions","myPermissions","role"));
    }

    // 保存角色权限
    public function storePermission(AdminRole $role){
        $this->validate(request(),[
            'permissions' => 'required|array'
        ]);

        $permissions = AdminPermission::findMany(request('permissions'));
        $myPermissions = $role->permissions;


        // 对已经有的权限
        $addPermissions = $permissions->diff($myPermissions);
        foreach ($addPermissions as $permission) {
            $role->grantPermission($permission);
        }

        $deletePermissions = $myPermissions->diff($permissions);
        foreach ($deletePermissions as $permission) {
            $role->deletePermission($permission);
        }

        return back();

    }






}
