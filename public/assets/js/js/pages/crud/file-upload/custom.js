var type = ($("#switch").val() == "on") ? true : false;
var page = -100;

$("#switch").on("switchChange.bootstrapSwitch", function() {
    type = !type;
    // getData(type);
    $("#mediaContent").html("");
    page = 1;
    infiniteLoadMore(page, type);
});


$("#uploadPart").on("click", function(e) {
    e.preventDefault();

    $("#managementPart").removeClass("menu-item-active");
    $("#uploadPart").addClass("menu-item-active");
    $("#subDesc").text("Dropdown Images and Sounds to Upload");
    $("#formContent").show();
    $("#manageContent").hide();
    $("#switchContainer").hide();
    $("#searchMedia").hide();

    $("#resetPwdArea").hide();
    $("#downloadArea").show();
    $("#bigtitle").text("Upload New Media");
    window.location = "upload";

    page = -100;
});


$("#managementPart").on("click", function(e) {
    e.preventDefault();

    $("#uploadPart").removeClass("menu-item-active");
    $("#managementPart").addClass("menu-item-active");
    $("#subDesc").text("Manage your Images and Sounds");
    $("#formContent").hide();
    $("#manageContent").show();
    $("#switchContainer").show();
    $("#searchMedia").show();
    $("#pageTitle").text("Media");
    $("#pageSubTitle").show();
    $("#pageSubTitle").text("Mange uploaded files.");
    $("#resetPwdArea").hide();
    $("#downloadArea").show();
    $("#bigtitle").text("Media Library");
    // window.location = "upload";
    //
    // getData(type);
    page = 1;
    infiniteLoadMore(page, type);
});


// 
$("#changePwdContainer").ready(function() {
    getUserData();
});


function getUserData() {
    var name = $("#s_username").text();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        url: '/getUserData',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf_token"]').attr('content'),
            name: name
        },
        beforeSend: function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                message: 'Processing...'
            });
        },
        success: function(data) {
            data = $.parseJSON(data);
            var email = data.email;
            $("#profileEmail").text(email);
            $("#profileCreatedAt").text(data.created_at);
            $("#profileUpdatedAt").text(data.updated_at);
        },
        error: function(error) {
            console.log($.parseJSON(error));
        }
    });
    KTApp.unblockPage();

}



// for infinite scroll of manage media

$(window).scroll(function() {
    if (($(window).scrollTop() + $(window).height()) >= $(document).height()) {
        if (page < 0) return; // user is in upload part
        page++;
        infiniteLoadMore(page, type);
    }
});

function infiniteLoadMore(page, MediaType) {
    if (page < 0) { // user is in upload part
        return;
    }
    var infiniteScrollEndPoint = MediaType ? "get-image" : "get-sound";
    var targetElement = $("#mediaContent");
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            datatype: "html",
            type: "GET",
            url: infiniteScrollEndPoint + "?page=" + page,
            beforeSend: function() {
                $(".auto-load").show();
            }
        })
        .done(function(response) {
            if (response.length == 0) {
                $(".auto-load").hide();
                return;
            }
            $(".auto-load").hide();
            $("#mediaContent").append(response);
            // $("#mediaContent").style("height", ($(document).height() * 1.0 + 500) + "px");

        })
        .fail(function(jqXHR, ajaxOptions, throwError) {
            console.log("Server error occured");
        });
    // loadMasonry();
}


const getData = (Mediatype) => {
    var targetElement = $("#mediaContent");
    var endpoint;
    if (Mediatype) {
        endpoint = "get-image";
    } else {
        endpoint = "get-sound";
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: "GET",
        url: endpoint,
        success: function(data) {
            data = $.parseJSON(data).data;
            var cnt = data.length;
            if (cnt == 0) {
                targetElement.html("<h1 style='width: 100%; text-align:center; margin-top:200px;margin-bottom:300px;font-size:40px; '>No media...<h1>")
            } else {
                if (Mediatype) {
                    var htmlContent = "";
                    for (let i = 0; i < cnt; i++) {
                        htmlContent += "<div class='card imgCard' style='width:180px; margin: 10px;' data-val='" + data[i].name + "'>";
                        htmlContent += "<img src='" + data[i].path + "'  class='card-image-bottom' style='border-radius: 5%;'><div class='card-body' style='padding: 5px;'>";
                        htmlContent += "<span>" + data[i].name + "</span><button class='btn btn-warning delImg'>Delete</button></div></div>";
                    }
                    targetElement.html(htmlContent);
                } else {
                    var htmlContent = "";
                    for (let i = 0; i < cnt; i++) {
                        htmlContent += "<div class='card imgCard' style='width:300px; margin: 3px;' data-val='" + data[i].name + "'>";
                        htmlContent += "<audio controls src='" + data[i].path + "'  class='card-image-bottom'></audio><div class='card-body' style='padding: 5px;'>";
                        htmlContent += "<span>" + data[i].name + "</span><button class='btn btn-warning delAud'>Delete</button></div></div>";
                    }
                    targetElement.html(htmlContent);
                }
            }
        },
        error: function(e) {
            console.log(e);
        }
    });
}

// display delete btn when mouse hover card

$(document).on('mouseover', '.mediaCard', function() {
    $(this).find('button').show();
});

$(document).on('mouseleave', '.mediaCard', function() {
    $(this).find('button').hide();
});




// delete an image in management window

$(document).on('click', ".delImg", function() {
    var grandParent = $(this).parent();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: 'POST',
        url: 'unlink-image',
        data: {
            filename: grandParent.attr('data-val')
        },
        beforeSend: function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                message: 'Processing...'
            });
        },
        success: function(data) {
            if (data == "success") {
                grandParent.remove();
                if ($("#mediaContent").text() == "") {
                    infiniteLoadMore(page, type);
                    if ($("#mediaContent").text() == "") {
                        $("#mediaContent").html("<h1 style='width: 100%; text-align:center; margin-top:200px;margin-bottom:300px;font-size:40px; '>No media...<h1>");
                    }
                }
            } else {
                alert("Can not delete this image, it is not exist in upload folder!");
            }
            KTApp.unblockPage();
        },
        error: function(e) {
            console.log(e);
            KTApp.unblockPage();
        }
    });
})

$(document).on('click', ".delAud", function() {
    var grandParent = $(this).parent();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: 'POST',
        url: 'unlink-sound',
        data: {
            filename: grandParent.attr('data-val')
        },
        beforeSend: function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                message: 'Processing...'
            });
        },
        success: function(data) {
            if (data == "success") {
                grandParent.remove();
                if ($("#mediaContent").text() == "") {
                    infiniteLoadMore(page, type);
                    if ($("#mediaContent").text() == "") {
                        $("#mediaContent").html("<h1 style='width: 100%; text-align:center; margin-top:200px;margin-bottom:300px;font-size:40px; '>No media...<h1>");
                    }
                }
            } else {
                alert("Can not delete this image, it is not exist in upload folder!");
            }
            KTApp.unblockPage();
        },
        error: function(e) {
            console.log(e);
            KTApp.unblockPage();
        }
    });
})


///  infinite scroll for imageview

// let elem = document.querySelector("#mediaContent");
// let infScroll = new InfiniteScroll(elem, {
//     path: '.pagination__next',
//     append: '.thumbImage',
//     history: false,
// });


// search media 

$(document).on('keyup', "#searchMedia", function(event) {
    var value = $(this).val();
    var cards = $(".mediaCard");
    cards.each(function() {
        if (!$(this).attr('data-val').includes(value)) {
            $(this).hide();
        } else {
            $(this).show();
        }
    });
});


// change password and logout

$("#logOut").on('click', function() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: "GET",
        url: 'signout',
        data: {
            _token: $('meta[name="csrf_token"]').attr('content'),
        },
        success: function(data) {
            if (data == 'success') {
                window.location = "login";
            }
        },
        error: function(e) {
            console.log(e);
        }
    });
});

$("#changePwd").on("click", function() {
    $("#downloadArea").hide();
    $("#resetPwdArea").show();
    $("#pageTitle").text("Reset Password");
    $("#pageSubTitle").hide();
});

$("#resetPwdCancelIcon").on("click", function() {
    $("#downloadArea").show();
    $("#resetPwdArea").hide();
    $("#pageTitle").text("Media");
    $("#pageSubTitle").hide();
});

$("#resetPwdCancelBtn").on("click", function() {
    $("#downloadArea").show();
    $("#resetPwdArea").hide();
    $("#pageTitle").text("Media");
    $("#pageSubTitle").hide();
});



$("#profile_name").text($("#s_username").text());


/// dropzone
var url = "";

Dropzone.options.dropzone = {
    init: function() {
        this.on("processing", function(file) {
            if (file.type.includes("audio")) {
                this.options.url = "{{url('/upload-sounds')}}";
                // alert(this.options.url);
            } else {
                this.options.url = "{{url('/upload-images')}}";
            }
        });
    },
    maxFilesize: 20,
    renameFile: function(file) {
        var dt = new Date();
        var time = dt.getTime();
        return time + file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif, audio/*",
    addRemoveLinks: true,
    timeout: 50000,
    removedfile: function(file) {
        var unlinkUrl;
        if (file.type.includes("image")) {
            unlinkUrl = '{{ url("unlink-image") }}';
        } else {
            unlinkUrl = '{{ url("unlink-sound") }}';
        }
        var name = file.upload.filename;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            type: 'POST',
            url: unlinkUrl,
            data: { filename: name },
            beforeSend: function() {
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'primary',
                    message: 'Processing...'
                });
            },
            success: function(data) {
                // console.log("File has been successfully removed!!");

            },
            error: function(e) {
                console.log(e);
            }
        });
        KTApp.unblockPage();
        var fileRef;
        return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },

    success: function(file, response) {
        console.log(response);
    },
    error: function(file, response) {
        if (file.type.includes("audio")) {
            // alert("audio);	
        }
        return false;
    }
};