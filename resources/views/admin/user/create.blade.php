

@extends("admin.template.default");
@section('userMenu','in')

@section("content")

        <form method="post" action="/admin/user/store">

            {{csrf_field()}}

            <table class="category_add">
                <tr>
                    <td width="30%">用户名：</td>
                    <td width="70%">
                        <input type="text" name="name" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>密  码：</td>
                    <td><input type="text" class="form-control" name="password"></td>
                </tr>
                <tr>
                    <td>确认密码：</td>
                    <td><input type="text" class="form-control" name="password_confirmation"></td>
                </tr>
                <tr>
                    <td>状 态：</td>
                    <td>
                        <select name="state">
                            <option value="1">可用</option>
                            <option value="0">禁用</option>
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


