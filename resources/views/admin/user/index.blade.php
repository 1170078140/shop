
@extends("admin.template.default");
@section('userMenu','in')
@section("content")

   <table class="userlist">
       <tr>
           <th width="10%">id</th>
           <th width="30%">用户名</th>
           <th width="20%">状态</th>
           <th width="40%">编辑</th>
       </tr>
       @foreach ($users as $user)
       <tr>
           <td>{{$user->id}}</td>
           <td>{{$user->name}}</td>
           <td>{{$user->state==1?'可用':'禁用'}}</td>

           <td>
               [<a href="/admin/user/edit/{{$user->id}}">编辑</a>]&nbsp;
               [<a href="/admin/user/delete/{{$user->id}}">删除</a>]
               [<a href="/admin/user/{{$user->id}}/role/">角色</a>]

           </td>
       </tr>
       @endforeach
   </table>
    {!! $users->links() !!}

@endsection

