<div class="small-box {{$bg}}">
    <div class="inner">
      <h3>{{$value}}</h3>
      <p>{{$label}}</p>
    </div>
    <div class="icon">
        <!-- <i class="ion ion-bag"></i> -->
        <i class="{{$icon??''}}"></i>
    </div>
    <a href="{{ $link??'#' }}" class="small-box-footer">查看<i class="fas fa-arrow-circle-right"></i></a>
</div>