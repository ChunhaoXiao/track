<div class="form-group row">
    <label for="" class="col-form-label col-sm-1">{{$label??''}}</label>
    <div class="col-sm-8">
        <select name="{{$name}}" class="form-control">
          <option value="">{{$emptytext??'请选择'}}</option>
          @foreach($options as $k => $v)
            <option value="{{$k}}" {{isset($selected) && $selected == $k ?'selected':''}}>{{$v}}</option>
          @endforeach
        </select>
    </div>
</div>