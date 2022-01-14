var page = 1;

var type = ($("#switch").val() == "on") ? true : false;

infiniteLoadMore(page, type);

$("#switch").on("switchChange.bootstrapSwitch", function() {
    type = !type;
    $("#mediaContent").html("");
    page = 1;
    infiniteLoadMore(page, type);
});

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



$(document).on('click', ".delImg", function() {
    var grandParent = $(this).parent();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: 'POST',
        url: unlinkImage,
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
        url: unlinkSound,
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



$(window).scroll(function() {
    if (($(window).scrollTop() + $(window).height()) >= $(document).height()) {
        page++;
        infiniteLoadMore(page, type);
    }
});


function infiniteLoadMore(page, MediaType) {

    var infiniteScrollEndPoint = MediaType ? getImages : getAudios;
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
};


$(document).on('mouseover', '.mediaCard', function() {
    $(this).find('button').show();
});

$(document).on('mouseleave', '.mediaCard', function() {
    $(this).find('button').hide();
});