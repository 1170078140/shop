@extends("admin.template.default")
@section('stateMenu','in')
@section("content")
    <!-- Main content -->
    <div class="row">
        <div class="col-lg-10 col-xs-6">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">权限列表</h3>
                </div>
                <a type="button" class="btn " href="/admin/permissions/create" >增加权限</a>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>权限名称</th>
                            <th>描述</th>
                            <th>操作</th>
                        </tr>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->des}}</td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody></table>
                </div>

            </div>
        </div>
    </div>
@endsection

