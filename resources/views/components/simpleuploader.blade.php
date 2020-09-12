
<input type="file" name="file" id="{{$id??'picture'}}" @if(empty($single)) multiple @endif>
<div id="{{$id?$id.'body' : 'picture'}}" class="d-flex m-1 py-2">

    @php 
        if(!empty($name)) {
            $fieldname = empty($single) ? $name.'[]':$name;
        }
        else {
            $fieldname = 'picture';
        }
    @endphp
    
    @if(!empty($pictures))
    @foreach((array)$pictures as $v)
    <div class='block d-flex flex-column align-items-center'>
        
            <img src="{{asset('storage/'.$v)}}" class="rounded mr-1" width="100" height="100">
            <input type="hidden" name="{{$fieldname}}" value="{{$v}}">
            <i class='fas fa-trash-alt mt-1 text-secondary'></i>
        
    </div>  
    @endforeach  
    @endif
</div>

<script type="module">
$(document).ready(function() {
    const id = "{{$id??'picture'}}";
    let name = "{{$name??'picture'}}";

    const single = "{{$single??''}}";
    if(!single) {
        name = name+'[]';
    }

	$('#'+id).change(function(e){
		$(this).simpleUpload("/admin/upload", {

			start: function(file){
                this.block = $('<div class="block d-flex flex-column align-items-center"></div>');
                $('#'+id+'body').append(this.block);
			},

			progress: function(progress){
				console.log("upload progress: " + Math.round(progress) + "%");
			},

			success: function(data){
                //const method = single?'html':'append'
                if(single) {
                   // console.log('block is :', this.block[0])
                    $(this.block[0]).parent().empty().html("<div class='block d-flex flex-column align-items-center'><img class='mr-1' src="+data.src+" width=100 height=100 /><i class='fas fa-trash-alt mt-1 text-secondary'></i><input name="+name+" type='hidden' value="+data.savepath+"/></div>");
                }
                else {
                    this.block.append("<img class='mr-1' src="+data.src+" width=100 height=100 /><i class='fas fa-trash-alt mt-1 text-secondary'></i><input name="+name+" type='hidden' value="+data.savepath+"/>");
                }
                
			},

			error: function(error){
				//upload failed
				console.log("upload error: " + error.name + ": " + error.message);
			}

		});

	});

    $(document).on('click', '.fa-trash-alt', function(){
        $(this).parent().remove();
    })

});
</script>