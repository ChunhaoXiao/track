@props(['text', 'value', 'labelcol'])
<div class="form-group row position-relative">
    <label for="" class="col-form-label {{!empty($labelcol)?'col-sm-'.$labelcol:'col-sm-auto'}}">{{ $text }}</label>
    <div class="col-sm">
        <div class="row">
            <div class="col-sm-10"><textarea {{ $attributes }} class="form-control">{{$value??''}}</textarea></div>
            <div class="d-sm-flex align-items-sm-center"><span>{{ $slot }}</span></div>
        </div>
    </div>
</div>