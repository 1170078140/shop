<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CategoryController;
use App\Good;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
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

    //添加商品
    public function create()
    {
//        $cate=new CategoryController();
//        $categories=$cate->geCategoriea();
        $categories=self::getCategories();
        $title='添加商品';
        return view('/admin/good/create',compact('categories','title'));
    }

    //执行添加
    public function store(Request $request)
    {
        if(!$request->hasFile("pic_name")){
            echo "<script>alert('上传图片为空');</script>";
        }

        //执行文件上传
        if($request->file('pic_name')->isValid()){

            //获取文件后缀
            $ext = $request->file('pic_name')->getClientOriginalExtension();

            //随机生成文件名
            $filename = md5(date('YmdHis'));

            //移动上传文件到指定目录中
            $res = $request->file('pic_name')->move('./uploads/',$filename.'.'.$ext);

        }else{
            echo "<script>alert('无效上传文件');</script>";
        }

        //获取上传成功的文件名称
        $newname = $filename.'.'.$ext;

        //获取其他相关信息
        $info = $request->except('_token');
        $info['pic_name'] = $newname;

        //执行添加
        $res = DB::table('goods')->insert($info);

        // 提示信息
        if($res){
            return redirect('/admin/good/index');
        }else{
            echo "<script>alert('商品添加失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }
    }

    //商品列表
    public function index(){
        $title="管理商品";
        $goods = Good::paginate(3);
        return view("admin/good/index",compact("goods","title"));
    }

    // 编辑商品
    public function edit(Good $good){

        $title="修改商品";
        $cid =$good->category_id;
        $categories =$this->getCategories();
        return view("admin/good/edit",compact("categories","cid","good","title"));

    }

    //更新商品
    public function update(Request $request){

        $id=$request->id;

        // 获取商品基本信息
        $info = $request->except('_token',"id");

        // 如果有图片则处理
        if($request->hasFile("pic_name")){

            //执行文件上传
            if($request->file('pic_name')->isValid()){

                //获取文件后缀
                $ext = $request->file('pic_name')->getClientOriginalExtension();

                //随机生成文件名
                $filename = md5(date('YmdHis'));

                //移动上传文件到指定目录中
                $res = $request->file('pic_name')->move('./uploads/',$filename.'.'.$ext);

                //获取上传成功的文件名称
                $newname = $filename.'.'.$ext;

                // 记录图片名称到数组
                $info['pic_name'] = $newname;

            }
        }

        //执行更新
        $res = DB::table('goods')->where("id",$id)->update($info);

        // 提示信息
        if($res){
            return redirect('/admin/good/index');
        }else{
            echo "<script>alert('商品更新失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }

    }

    // 删除商品
    public function delete($id){
        $res = DB::table('goods')->where('id', $id)->delete();
        // 提示信息
        if($res){
            return redirect('/admin/good/index');
        }else{
            echo "<script>alert('商品删除失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }
    }
}
