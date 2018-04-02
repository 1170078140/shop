@if(count($errors)>0)
    <div class="error alert alert-danger" role="alert" style="line-height: 30px;">
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
    </div>
@endif