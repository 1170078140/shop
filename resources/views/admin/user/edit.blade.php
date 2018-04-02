

@extends("admin.template.default");
@section('userMenu','in')

@section("content")

        <form method="post" action="/admin/user/update">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$user->id}}">
            <table class="category_add">
                <tr>
                    <td>用户名：</td>
                    <td>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </td>
                </tr>

                <tr>
                    <td>密  码：</td>
                    <td><input type="text" class="form-control" name="password" ></td>
                </tr>
                <tr>
                    <td>确认密码：</td>
                    <td><input type="text" class="form-control" name="password_confirmation" ></td>
                </tr>
                <tr>
                    <td>状态：</td>
                    <td>
                        <select name="state">
                            <option value="1" {{$user->state==1?'selected':''}}>可用</option>
                            <option value="0"  {{$user->state==0?'selected':''}}>禁用</option>
                        </select>
                    </td>
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


