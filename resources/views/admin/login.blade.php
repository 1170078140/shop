<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>易商城用户登录</title>


    <link href="/css/app.css" rel="stylesheet">
    <style>
       .login{
           width:600px;
           margin: 0 auto;
           display: block;
       }
    </style>

    <![endif]-->
</head>
<body>


<div class="container">
    <div class="panel panel-default login">
        <div class="panel-heading">
            <h2>请登录</h2>
        </div>
        <div class="panel-body">
            <form  method="post" action="/admin/login">
                {{csrf_field()}}
                <div class="form-group">
                    <label>用户</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" class="form-control">
                </div>

                @include("admin.template.error")
                <button class="btn btn-default" type="submit">登 录</button>
            </form>
        </div>
    </div>



</div>


</body>
</html>

