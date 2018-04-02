<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    用户管理
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse @yield('userMenu')" role="tabpanel" aria-labelledby="headingThree">
            <ul class="list-group">
                <li class="list-group-item"><a href="/admin/user/create">增加用户</a> </li>
                <li class="list-group-item"><a href="/admin/user/index">管理用户</a> </li>


            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    角色管理
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse @yield('roleMenu')" role="tabpanel" aria-labelledby="headingThree">
            <ul class="list-group">
                <li class="list-group-item"><a href="/admin/role/create">增加角色</a> </li>
                <li class="list-group-item"><a href="/admin/role/index">管理角色</a> </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFive">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                    权限管理
                </a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse @yield('stateMenu')" role="tabpanel" aria-labelledby="headingThree">
            <ul class="list-group">
                <li class="list-group-item"><a href="/admin/permission/create">增加权限</a> </li>
                <li class="list-group-item"><a href="/admin/permission/index">管理权限</a> </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    品类管理
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse @yield('categoryMenu')" role="tabpanel" aria-labelledby="headingOne">
            <ul class="list-group">
                <li class="list-group-item"><a href="/admin/category/create">增加品类</a> </li>
                <li class="list-group-item"><a href="/admin/category/index">管理品类</a> </li>

            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    商品管理
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse  @yield('goodMenu')" role="tabpanel" aria-labelledby="headingTwo">
            <ul class="list-group">
                <li class="list-group-item"><a href="/admin/good/create">增加商品</a> </li>
                <li class="list-group-item"><a href="/admin/good/index">管理商品</a> </li>


            </ul>
        </div>
    </div>

</div>