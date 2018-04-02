<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //获取全部品类
    public static function getCategories()
    {
        //查询分类数据
        $res = DB::table('categories')
            ->select(DB::raw("*,CONCAT(path,',',id) as npath"))
            ->orderBy('npath','asc')
            ->get();
        $arr=$res->all();

        //设置子分类样式
        foreach ($arr as $k=>$v){
            //根据npath中逗号出现的次数，判定是几级分类，加符号区分
            $len= substr_count($v->path,',');
            $arr[$k]->name = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$len)."|-".$v->name;
        }
        return $arr;
    }

    //加载添加页面
    public function create()
    {
        $categories=$this->getCategories();
        $title='添加分类';
        return view('/admin/category/create',compact('categories','title'));
    }

    //获取path
    private function getPath($pid)
    {
        //判断添加是否添加顶级分类
        if($pid==0){
            $path=0;
        }else{
            $path=Category::where('id',$pid)->get();
            $path=$path->toArray()[0]['path'].','.$pid;
        }
        return $path;
    }

    //执行添加
    public function store(Request $request)
    {
        //验证
        $this->validate($request,[
           'name'=>'required',
        ]);
        //准备数据
        $data = $request->except('_token','password_confirmation');
        $path=$this->getPath($data['pid']);
        $data['path']=$path;
        //添加
        $res = Category::create($data);
        if($res){
            return redirect('/admin/category/index');
        }else{
            echo "<script>alert('添加失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }
    }

    //品类列表
    public function index()
    {
        $categories=$this->getCategories();
//        dd($categories);
//        dd($categories[0]->id);
        $title='品类列表';
        return view('/admin/category/index',['categories'=>$categories,'title'=>$title]);
    }

    //加载编辑页面
    public function edit(Category $category)
    {
        $title='编辑品类';
        $categories=$this->getCategories();
        return view('admin/category/edit',compact('category','title','categories'));
    }

    //执行修改
    public function update(Request $request)
    {
//        dd($request->id);
        $id=$request->id;
        $data=$request->except('id','_token');

        //判断是否修改了父分类  pid是否发生变化
        if($data['oldPid']!=$data['pid']){
            $path=$this->getPath($data['pid']);
            $data['path']=$path;
        }

        //删除数组多余的数据
        unset($data['oldPid']);
        $res=Category::where('id',$id)->update($data);

        if($res){
            return redirect('/admin/category/index');
        }else{
            echo "<script>alert('编辑失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }
    }

    //删除
    public function delete($id)
    {
        $res=Category::destroy($id);
        if($res){
            return redirect('/admin/category/index');
        }else{
            echo "<script>alert('删除失败');</script>";
        }
    }
}
