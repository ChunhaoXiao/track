<div class="form-group row">
    <label for="" class="col-form-label col-sm-1">{{$label??''}}</label>
    <div class="col-sm-8">
        <input class="form-control" name="{{$name??''}}" value="{{$value??''}}" type="{{$type??'text'}}" placeholder="{{$placeholder??''}}"/>
        @if(isset($type) && $type == 'file' && !empty($value))
            <img class="rounded mt-2" src="{{asset('storage/'.$value)}}" alt="" width="50" height="50">
            <input type="hidden" name="logo" value="{{$value}}">
        @endif
    </div>
</div>