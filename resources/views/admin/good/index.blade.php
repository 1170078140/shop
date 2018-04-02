@extends("admin.template.default");
@section('goodMenu','in')
@section("content")
<table class="good_edit">
    <tr>
        <th>ID号码</th>
        <th>图 片</th>
        <th>品 类</th>
        <th>品 名</th>
        <th>单 价</th>
        <th>库 存</th>
        <th>销 量</th>
        <th>状 态</th>
        <th>编 辑</th>
    </tr>
    @foreach($goods as $good)
        <tr>
            <td>{{$good->id}}</td>
            <td><img src="/uploads/{{$good->pic_name}}" /></td>
            <td>{{$good->category_id}}</td>
            <td>{{$good->name}}</td>
            <td>{{$good->price}}</td>
            <td>{{$good->store}}</td>
            <td>{{$good->sales_num}}</td>
            @if ($good->state===0)
            <td>下架</td>
            @elseif ($good->state===1)
            <td>上架</td>
            @else
            <td>缺货</td>
            @endif
            <td>
                [<a href="/admin/good/edit/{{$good->id}}">修改</a> ]
                [<a href="/admin/good/delete/{{$good->id}}">删除</a> ]
            </td>
        </tr>
    @endforeach
</table>
<div class="pagelink">
    {{$goods->links()}}
</div>
@endsection


