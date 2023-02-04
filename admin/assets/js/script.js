$(document).ready(function () {
    // NAV TOGGLE
    $('#nav-admin-toggle').on('click', function () {
        $('#nav-admin').toggleClass('active');
    })

    // IMAGE PREVIEW
    $('.file-input-image').change(function () {
        var file = this.files[0]
        var src = URL.createObjectURL(file)
        $('#image-preview img').attr('src', src)
    })
    
    $('.file-input-image-era').change(function () {
        var file = this.files[0]
        var src = URL.createObjectURL(file)
        $(this).siblings($('.image-preview')).attr('src', src)
    });

    $('.file-input-era-images').change(function () {
        $('#image-preview img').remove();
        var files = this.files;
        for (let i = 0; i < files.length; i++) {
            var srcs = URL.createObjectURL(files[i]);
            $('#image-preview').append(`
            <img src="${srcs}" class="w-[100px] mr-3 mt-2 md:w-[160px]" />
            `)
        }
    });


    // MESSAGE
    $('.message-close-btn').on('click', function () {
        $('#message').remove()
    })

    function formdelete(form, message) {
        var conf = confirm(message);
        if (conf == true) {
            form.submit();
        } else {
            return false;
        }
    }
    $('#form-delete-indeximage-btn').on('click', function (e) {
        e.preventDefault();
        formdelete($('#form-delete-indeximages'), "Are you sure want to delete this images?")
    })
    $('#form-delete-stories-btn').on('click', function (e) {
        e.preventDefault();
        formdelete($('#form-delete-stories'), "Are you sure want to delete this stories?")
    })
   
    $('#delete-era-btn').on('click', function (e){
        e.preventDefault();
        var conf = confirm("Are you sure to delete this era?");
        if (conf == true) {
            var conf2 = confirm("You Sure???");
            if (conf2 == true) {
                $('#form-delete-era').submit();
            } else {
                return false;
            }
        } else {
            return false;
        }
    })

    $('#form-delete-eraimage-btn').on('click', function (e) {
        e.preventDefault();
        formdelete($('#form-delete-eraimages'), "Are you sure want to delete this image era?")
    })

});