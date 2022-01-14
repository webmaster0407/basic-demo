loadImage();

var manual;

function loadImage() {
	$.ajax({
		headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: "GET",
        url: "/image",
        success: function(data) {
        	data = $.parseJSON(data);
        	if (data.status == '1') { // success
                var imgElement = $("#image")[0];
                imgElement.setAttribute('src', data.message.path);
        	} else {   // failed
        		console.log(data.message);
        	}
        }, 
        error: function(error) {
        	console.log(error);
        }
	});
}

function loadAudio() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: "GET",
        url: "/audio",
        success: function(data) {
            data = $.parseJSON(data);
            if (data.status == '1') {   // success
                var audioElement = $("#audio")[0];
                audioElement.setAttribute('src', data.message.path);
            } else {        // failed
                console.log(data.message);
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

$(document).on('click', '#playBtn', function(e) {


    loadImage();
    loadAudio();



    $("#audio").on('ended', function(e) {
        setTimeout(function() {
            manual = new Freezeframe('#image', {
                trigger: false
            });
            manual.stop();
            $(".ff-canvas").show();
            // manual.destroy();
            $(".ff-image").css("opacity", 1);
            $(".mask").css('zIndex', 10);
            $("#playBtn").prop('disabled', false);
            $('#playBtn').removeClass('disableBtn');
            $('#playBtn').addClass('playBtn');
        }, 3000);
    });

    $("#audio").on('playing', function() {
        var a = $('#image').clone();
        var b = $('.mask').clone();
        $('#container').html('').append(a).append(b);
        $(".mask").css('zIndex', -1);
        $("#playBtn").text("Again");
        $("#playBtn").prop('disabled', true);
        $('#playBtn').removeClass('playBtn');
        $('#playBtn').addClass('disableBtn');
    });
});

