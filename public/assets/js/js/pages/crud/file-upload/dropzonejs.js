"use strict";
// Class definition


var KTDropzoneDemo = function() {
    // Private functions
    var demo1 = function() {
        // single file upload
        $('#kt_dropzone_1').dropzone({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
            },
            url: uploadUrl, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });

        // multiple file upload
        $('#kt_dropzone_2').dropzone({
            url: uploadUrl, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
            },
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });

        // file type validation
        $('#kt_dropzone_3').dropzone({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
            },
            url: uploadUrl, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 50,
            maxFilesize: 500, // MB
            addRemoveLinks: true,
            acceptedFiles: "image/*, audio/*",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    }



    return {
        // public functions
        init: function() {
            demo1();
        }
    };
}();

KTUtil.ready(function() {
    KTDropzoneDemo.init();
});