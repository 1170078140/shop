@extends("admin.template.default");
@section('categoryMenu','in')
@section("content")
<form method="post" action="/admin/category/store">
    {{csrf_field()}}
    <table class="category_add">
        <tr>
            <td>商品品类：</td>
            <td>
                <select class="form-control" name="pid">
                    <option value="0">请选择商品品类</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>栏目名称：</td>
            <td><input type="text" class="form-control" name="name"></td>
        </tr>
        @if(count($errors)>0)
            <tr>
                <td></td>
                <td>
                    @include("admin.template.error")
                </td>
            </tr>
        @endif
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


