@extends("admin.template.default");
@section('categoryMenu','in')
@section("content")
<table class="category_edit">
    <tr>
        <th>ID</th>
        <th>品类名称</th>
        <th>编 辑</th>
    </tr>

    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
                [<a href="/admin/category/edit/{{$category->id}}">修改</a> ]
                [<a href="/admin/category/delete/{{$category->id}}">删除</a> ]
            </td>
        </tr>
    @endforeach
</table>
@endsection


