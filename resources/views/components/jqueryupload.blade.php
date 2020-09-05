<div id="{{$id??'fileuploader'}}">上传</div>
<style>
 .ajax-file-upload-container{
   display: flex;
   margin: 20px 0px 20px 0px;
   flex-wrap:wrap;
 }
</style>
<script type="module">
    $(document).ready(function()
    {
        const id = "{{$id??'fileuploader'}}";
        const maxCount = "{{ $maxcount??9}}";
        const name = "{{$name??'picture'}}";
        const pictures = @json($pictures??[]);
        console.log("picture is",pictures)
        $("#"+id).uploadFile({
          url:"/admin/upload",
          fileName:"file",
          showPreview:true,
          previewHeight: "100px",
          previewWidth: "100px",
          showDelete:true,
          //multiple:false,
          maxFileCount:maxCount,
          uploadStr:"选择图片",
          //dragDropStr:"拖到图片到此位置",
          maxFileCountErrorStr:"超过了允许的最大文件数量：",
          onLoad: obj => {
            pictures.map(item => {
              let url = "{{asset('storage')}}/"+item;
              console.log(url)
              let a = obj.createProgress('image', url, '');
              $(a.statusbar[0]).append("<input type=hidden value="+item+" name="+name+">");
              //console.log('obj are:',a.statusbar[0])
            });
           // obj.createProgress(data[i]["name"],data[i]["path"],data[i]["size"]);
          },
          onSuccess: (files,data,xhr,pd) => {
            //$(".ajax-file-upload-container").css({"display":"flex"})
            //$(".ajax-file-upload-container").css({"display":"flex"})
            const savepath = xhr.responseJSON.data.savepath
            console.log('files is:', files)
            console.log('data is:', data)
            pd.preview.parents('.ajax-file-upload-statusbar').append("<input type=hidden value="+savepath+" name="+name+">")

          },
          deleteCallback: (data, pd) => {

          }
        });
    });
</script>