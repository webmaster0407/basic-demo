"use strict";


// Class definition
var KTUppy = function() {
    const Tus = Uppy.Tus;
    const ProgressBar = Uppy.ProgressBar;
    const StatusBar = Uppy.StatusBar;
    const FileInput = Uppy.FileInput;
    const Informer = Uppy.Informer;

    // to get uppy companions working, please refer to the official documentation here: https://uppy.io/docs/companion/
    const Dashboard = Uppy.Dashboard;
    const Dropbox = Uppy.Dropbox;
    const GoogleDrive = Uppy.GoogleDrive;
    const Instagram = Uppy.Instagram;
    const Webcam = Uppy.Webcam;

    var initUppy3 = function() {
        var id = '#kt_uppy_3';

        var uppyDrag = Uppy.Core({
            autoProceed: true,
            restrictions: {
                maxFileSize: 5000000000, // 500mb
                maxNumberOfFiles: 50,
                minNumberOfFiles: 1,
                allowedFileTypes: ['audio/*']
            }
        });

        uppyDrag.use(Uppy.DragDrop, { target: id + ' .uppy-drag' }
            // , {
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            //     }
        );
        // uppyDrag.setMeta({ meta: { _token: $('meta[name="csrf_token"]').attr('content') } })
        uppyDrag.use(ProgressBar, {
            target: id + ' .uppy-progress',
            hideUploadButton: false,
            hideAfterFinish: false
        });
        uppyDrag.use(Informer, { target: id + ' .uppy-informer' });
        uppyDrag.use(Tus, { endpoint: 'http://localhost:8000/upload-sounds/?_token=' + $('meta[name="csrf_token"]').attr('content') });
        // uppyDrag.use(Tus, { endpoint: 'upload-sounds' });

        uppyDrag.on('complete', function(file) {
            var audioPreview = "";
            $.each(file.successful, function(index, value) {
                var audioType = /audio/;
                var thumbnail = "";
                if (audioType.test(value.type)) {
                    thumbnail = '<div class="uppy-thumbnail"><audio controls><source src="' + value.uploadURL + '"></audio></div>';
                }
                var sizeLabel = "bytes";
                var filesize = value.size;
                if (filesize > 1024) {
                    filesize = filesize / 1024;
                    sizeLabel = "kb";
                    if (filesize > 1024) {
                        filesize = filesize / 1024;
                        sizeLabel = "MB";
                    }
                }
                audioPreview += '<div class="uppy-thumbnail-container" data-id="' + value.id + '">' + thumbnail + ' <span class="uppy-thumbnail-label">' + value.name + ' (' + Math.round(filesize, 2) + ' ' + sizeLabel + ')</span><span data-id="' + value.id + '" class="uppy-remove-thumbnail"><i class="flaticon2-cancel-music"></i></span></div>';
            });

            $(id + ' .uppy-thumbnails').append(audioPreview);
        });
        uppyDrag.on("beforeFileAdded", function() {
            uppyDrag.setMeta({ meta: { _token: $('meta[name="csrf_token"]').attr('content') } });
        });

        $(document).on('click', id + ' .uppy-thumbnails .uppy-remove-thumbnail', function() {
            var audioId = $(this).attr('data-id');
            uppyDrag.removeFile(audioId);
            $(id + ' .uppy-thumbnail-container[data-id="' + audioId + '"').remove();
        });
    }


    return {
        // public functions
        init: function() {

            initUppy3();
        }
    };
}();

KTUtil.ready(function() {
    KTUppy.init();
});