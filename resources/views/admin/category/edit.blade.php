@extends("admin.template.default");
@section('categoryMenu','in')
@section("content")
    <form method="post" action="/admin/category/update">
        {{csrf_field()}}
        <input type="hidden" value="{{$category->id}}" name="id">
        <input type="hidden" value="{{$category->pid}}" name="oldPid">
        <table class="category_add">
            <tr>
                <td>商品品类：</td>
                <td>
                    <select class="form-control" name="pid">
                        <option value="0">请选择商品品类</option>
                        @foreach($categories as $cate)
                            @if($category->pid==$cate->id)
                            <option value="{{$cate->id}}" selected>{{$cate->name}}</option>
                            @else
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endif
                         @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>栏目名称：</td>
                <td><input type="text" class="form-control" name="name" value="{{$category->name}}"></td>
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

