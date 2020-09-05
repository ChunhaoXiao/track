<div class="row pb-3">
    <label for="" class="col-form-label col-sm-1"></label>
    <div class="col-sm-8">
        @csrf
       <button class="btn btn-primary">确定</button> <span class="text-success ml-2">{{$tip??''}}</span>
      
       @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
