$(document).ready(function () {
    $(".btnDeleteTutor").click(function () {
        var id = $(this).data("tutor_id");
        $.ajax({
            type: "POST",
            url: "ajax/tutor.ajax.php",
            data: { id: id },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.success) {
                    Swal.fire({
                        title: "Alert!",
                        text: data.message,
                        icon: "success",
                        position: 'top-end',
                        timer: 1000, 
                        buttons: false
                    });
                } else {
                    Swal.fire({
                        title: "Alert!",
                        text: data.message,
                        icon: "error",
                        position: 'top-end',
                        timer: 1000,
                        buttons: false
                    });
                }
            }
        });
    });
});
