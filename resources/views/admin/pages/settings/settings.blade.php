@extends('admin.layout.master')
<style>
    .delete-image {
        height:0px !important;
    }
</style>
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="content container-fluid">		
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">إعدادات الصفحه الرئيسيه</h3>

                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->        
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body custom-edit-service">                 
                                    <!-- Add Blog -->
                                    <form method="post" enctype="multipart/form-data" action="{{ route('setting.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" swalOnFail="{{ __('pages.wrongdata') }}" title="{{ __('pages.opps') }}">
                                        @csrf
                                        <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="mb-2">العنوان الرئيسي </label>
                                                        <input class="form-control" type="text" name="title_1" placeholder="العنوان الرئيسي" value="@isset($setting->id){{$setting->title_1}}@endisset">
                                                        <p class="error error_name"></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="mb-2">العنوان الفرعي </label>
                                                        <input class="form-control" type="text" name="title_2" placeholder="العنوان الفرعي " value="@isset($setting->id){{$setting->title_2}}@endisset">

                                                        <p class="error error_specialization"></p>
                                                    </div>
                                                </div>
                                            </div>
                                  
                                            <div class="col-lg-12 mb-4">
                                                <label class="mb-2">وصف </label>
                                                <div>
                                                    <textarea row="3" class="form-control" type="text" name="description" placeholder="العنوان الفرعي"> 
                                                        @isset($setting->id){{$setting->description}}@endisset
                                                    </textarea>                
                                                    
                                                    <p class="error error_address"></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12  card-header">
                                                <label class="mt-2 h2 " >
                                                 الصور  
                                                </label>
                                                <figure class="usr-dtl-pic card-header">
                                                    <img src="" id="superadminpic">
                                                    <label class="camera" for="upload-img"><i class="ti ti-camera" aria-hidden="true"></i></label>
                                                    <input  name="setting_images[]"  type="file" id="upload-img" style="display:none;">  
                                                </figure>
                                                <div class="upload-prod-pic-wrap">
                                                    <ul>
                                                        @isset($setting->id)
                                                            @foreach ($setting->gallaries as $picture)
                                                             <span image_id="{{$picture->id}}" class=" delete-image " >
                                                                <li>
    
                                                                    <span  class="trash-ico  "><i class="ti ti-trash" aria-hidden="true"></i></span>
                                                                    <a href="#">
                                                                    <img    src="{{ asset('setting/' .$setting->id .'/'. $picture->name) }}" />
                                                                    </a>
                                                                </li>
                                                             </span>
                                                            @endforeach
                                                        @endisset
                                                    </ul>
                                                </div>

                                            </div>


                                        </div>
                                            <input type="hidden" value="1" name="section_id">
                                        @isset($setting->id)
                                            <input type="hidden" value="{{$setting->id}}" name="id">
                                        @endisset
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn" type="submit" name="form_submit" placeholder="submit">{{ __('pages.submit') }}</button>
                                            </div>
                                    </form>
                                    <!-- /Add Blog -->
                                </div>
                            </div>
                        </div>			
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $('.dropify').dropify();

    $(".submit-btn").on("click", function(){      
        let url = $(".clinic_logo").attr("src");
		let id = $('.dropify').attr("clinic_id");

        setTimeout(function(){
            $.ajax({
                url: url,
                headers: { "Cache-Control": "no-cache" }
            }).done(function(){
                if(url.includes("admin_assets/assets/img/logo.png")){
                    $(".clinic_logo").attr("src", `/clinics/${id}/logo_${id}.png`);
                }
                else{
                    $(".clinic_logo").attr("src", url);
                }
            });
        }, 2000);
    });

    $(".header_check1").on("change", function(){   
        if ($('.header_check1').is(":checked"))
        {
            $(".header_check1").val('1');
        }   
        else {
            $(".header_check1").val('0');
        } 
    });
    
    if ($('.header_check1').val() == 1)
    {
        $(".header_check1").prop('checked', true);
    } 
    else{
        $(".header_check1").prop('checked', false);
    }

    $(".header_check2").on("change", function(){   
        if ($('.header_check2').is(":checked"))
        {
            $(".header_check2").val('1');
        }   
        else {
            $(".header_check2").val('0');
        } 
    });

    $(".header_check3").on("change", function(){   
        if ($('.header_check3').is(":checked"))
        {
            $(".header_check3").val('1');
        }   
        else {
            $(".header_check3").val('0');
        } 
    });
    
    if ($('.header_check3').val() == 1)
    {
        $(".header_check3").prop('checked', true);
    } 
    else{
        $(".header_check3").prop('checked', false);
    }

    if ($('.header_check2').val() == 1)
    {
        $(".header_check2").prop('checked', true);
    } 
    else{
        $(".header_check2").prop('checked', false);
    }
    
    $(document).ready(function(){
    var previewImage = function(input) {
    var fileTypes = ['jpg', 'jpeg', 'png'];
    var extension = input.files[0].name.split('.').pop().toLowerCase(); /*se preia extensia*/
    var isSuccess = fileTypes.indexOf(extension) > -1; /*se verifica extensia*/

    if (isSuccess) {
        var reader = new FileReader();

        reader.onload = function(e) {
            if($('.upload-prod-pic-wrap ul li').length < 5){
                $('.upload-prod-pic-wrap ul').append('<li> <span class="trash-ico "><i class="ti ti-trash" aria-hidden="true"></i></span><a href="#"><img src="'+e.target.result+'"></a></li>')
            }
        };
        reader.readAsDataURL(input.files[0]);
        
    } else {
        alert('الصوره غير مقبوله ');
    }
};
    $('#upload-img').on('change', function() {
        console.log(this);
            previewImage(this);
            setTimeout(function() {
                showpreview() 
            }, 300);
        })                              
    });

    function showpreview(){
    var lth = $('.upload-prod-pic-wrap ul li').length;
    if(lth == 0){
        $('#superadminpic').attr({
                'src': ''
            })
    }
    $('.upload-prod-pic-wrap ul li').each(function(key,val){
        if(key == lth-1){
            $('#superadminpic').attr({
                'src': $(this).find('img').attr('src')
            })
        }else{
            
        }
    }); 
    if(lth == 5){
        $('.camera').hide()
    }else{
        $('.camera').show()
    }
       
}
$(".upload-prod-pic-wrap ul li .trash-ico").click(function(){   
    $(this).parent().remove(); 
    $("#upload-img").val(''); 
    // alert("hii"); 
    showpreview();
});

$(document).ready(function showpreview (){
        var lth = $('.upload-prod-pic-wrap ul li').length;
        if(lth == 0){
            $('#superadminpic').attr({
                    'src': ''
                })
        }
        $('.upload-prod-pic-wrap ul li').each(function(key,val){
            if(key == lth-1){
                $('#superadminpic').attr({
                    'src': $(this).find('img').attr('src')
                })
            }else{
                
            }
        }); 
        if(lth == 5){
            $('.camera').hide()
        }else{
            $('.camera').show()
        }     
});

   $(".delete-image").click(function(e){
         var image_id=$(this).attr("image_id");

             $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    url: '{{ route("setting.fetch") }}',
                    method: 'post',
                    data: {image_id: image_id},
                    success: function (results) {
                        // $('#cities').html('');
                        // results.forEach((result, index) => {
                        //     $("#cities").append('<option value="' + result['id'] + '">' + result['name_ar'] + '</option>');
                        // });
                    },
                });
     
   });
</script>
@endsection