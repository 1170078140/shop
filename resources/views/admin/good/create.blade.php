@extends("admin.template.default");
@section('goodMenu','in')
@section("content")
<form method="post" action="/admin/good/store" enctype="multipart/form-data">
    {{csrf_field()}}
    <table class="category_add">
        <tr>
            <td>品 类：</td>
            <td>
                <select class="form-control" name="category_id">
                    <option value="0">请选择商品品类</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>名 称：</td>
            <td><input type="text" class="form-control" name="name"></td>
        </tr>


        <tr>
            <td>单 价：</td>
            <td>
                <input type="text" name="price" class="form-control">
            </td>
        </tr>
        <tr>
            <td>库 存：</td>
            <td>
                <input type="text" name="store" class="form-control">
            </td>
        </tr>

        <tr>
            <td>图 片： </td>
            <td>
                <input type="file" name="pic_name">
            </td>
        </tr>

        <tr>
            <td>描 述：</td>
            <td>
                <textarea class="form-control" name="des"></textarea>
            </td>
        </tr>
        <tr>
            <td>状 态：</td>
            <td>
                <select name="state" class="form-control">
                    <option value="0">下架</option>
                    <option value="1">上架</option>
                    <option value="2">缺货</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit"  class="btn btn-default">保存</button>
                <button type="reset"  class="btn btn-default">重置</button>
            </td>
        </tr>
    </table>
</form>

@endsection


