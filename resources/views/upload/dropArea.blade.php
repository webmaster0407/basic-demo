
 <!--begin::Card-->
<div id="dropArea" class="card card-custom gutter-b">
    <!--begin::Form-->
    <form method="post" action="{{url('/upload-images')}}" enctype="multipart/form-data" class="dropzone" id="myDropZone"	> 
    <!-- <form method="post" enctype="multipart/form-data" class="dropzone" id="dropzone">  -->
    <!-- <form enctype="multipart/form-data">  -->
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-12 col-md-9 col-sm-12">
                    <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                        <div class="dropzone-msg dz-message needsclick">
                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                            <span class="dropzone-msg-desc">Only image and audio files are allowed for upload</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
