<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\AdminUser;

class AdminUserController extends Controller
{
    //加载添加用户的页面
    public function create()
    {
        $title='添加用户';
        return view('/admin/user/create',['title'=>$title]);

    }

    //执行添加
    public function store(Request $request)
    {
        //方法1：
        /*$data=array();
        $data['name']=$_POST['name'];
        $data['password']=$_POST['password'];
        $data['state']=$_POST['state'];
        $res=DB::table('admin_users')->insert($data);*/

        //方法2：
        //表单验证
        $this->validate($request, [
            'name' => 'required|string|min:3|max:20',
            'password' => 'required|confirmed|min:3|max:12',
        ]);

        $data = $request->except('_token','password_confirmation');
        $res = AdminUser::create($data);
        if($res){
            return redirect('/admin/user/index');
        }else{
            echo "<script>alert('添加失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }
    }

    //用户列表
    public function index()
    {
        //方法1：
        /*$data=DB::table('admin_users')->get();
        dd($data->toArray());*/

        //方法2：
        $res = AdminUser::paginate(10);
//        dd($res->toArray());
        $title='用户列表';
        return view('/admin/user/index',['title'=>$title,'users'=>$res]);
    }

    //编辑用户页面
    public function edit(AdminUser $user)
    {
//        dd($user->toArray());
        $title='编辑用户';
        return view('/admin/user/edit',compact('user','title'));
    }

    //修改用户
    public function update(Request $request)
    {
//        dd($request->id);
        $id=$request->id;
        $data = $request->except('_token','id','password_confirmation');
        $data['password']=bcrypt($data['password']);

        $res=AdminUser::where('id',$id)->update($data);

        if($res){
            return redirect('/admin/user/index');
        }else{
            echo "<script>alert('编辑失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }
    }

    //删除用户
    public function delete($id)
    {
        $res = AdminUser::destroy($id);
        if($res){
            return redirect('/admin/user/index');
        }else{
            echo "<script>alert('删除失败');</script>";
        }
    }

}
