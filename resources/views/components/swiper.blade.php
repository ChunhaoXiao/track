<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($pictures as $v)
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ $loop->first?'active':'' }}"></li>
    @endforeach
  </ol>

  <div class="carousel-inner">
    @foreach($pictures as $v)
    <div class="carousel-item {{$loop->first?'active':''}}">
      <img src="{{asset('storage/'.$v)}}" class="d-block w-100" alt="">
    </div>
    @endforeach
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>