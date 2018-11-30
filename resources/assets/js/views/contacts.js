$(document).ready(function () {
    function build() {
        var image = document.getElementById("image");

        window.cropper = new Cropper(image,
            {
                autoCrop: true,
                aspectRatio: 1,
                viewMode: 1,
                dragMode: 'move',
                movable: false,
                scalable: false,
                zoomable: false,
                minCropBoxWidth: 150,
                minCropBoxHeight: 150,
                preview: document.getElementById("preview"),
                cropend: function () {
                    var canvas = cropper.getCroppedCanvas({width: 200, height: 200});
                    $("[name=foto]").val(canvas.toDataURL());
                },
                ready: function () {
                    var canvas = cropper.getCroppedCanvas({width: 200, height: 200});
                    $("[name=foto]").val(canvas.toDataURL());
                }
            });
    }
    build();

    function Cancel(e) {
        window.cropper.resetPreview();
        $("#input").val("");
        $("#image").parent().html("<img id=\"image\" src=\"\"/>");
        build();
    };

    $("#btnClose").click(Cancel);
    $("#btnCancel").click(Cancel);

    function showPreview(e) {
        var input = e.target;
        if (input.files && input.files.length) {
            var filename = input.files[0].name;
            var ext = filename.substring(filename.lastIndexOf(".") + 1).toLowerCase();
            if (ext === "gif" || ext === "png" || ext === "jpeg" || ext === "jpg") { //|| ext === "bmp"
                var reader = new FileReader();
                reader.onload = function (e) {
                    var data = e.target.result;
                    data = data.split('base64,')[1];
                    cropper.replace(e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log("invalid file");
                alertify.error("Tipo de archivo no valido: " + filename);
            }
        }
    }

    $("#input").on("change", showPreview);
    document.getElementById("preview").onclick = function () {
        $("#exampleModal").modal('show')
    };
});

function sendTestimonials() {
    if ($("[name=foto]").val() == "")
    {
        $("[name=foto]").val("data:image/png;base64,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")
    }

    var validate = $('#form-send-testimonials')[0].reportValidity();
    if (validate) {
        $('#form-send-testimonials').submit();
    }
}

function sendContact() {
    var validate = $('#form-send-contact')[0].reportValidity();
    if (validate) {
        var phoneEle = $('#phone-contact');

        var emailPattern = /^\+?[0-9]{3,15}$/;
        validate = emailPattern.test(phoneEle.val());

        if (validate){
            $('#form-send-contact').submit();
        }
        else{
            phoneEle.addClass('is-invalid');
        }
    }
}


