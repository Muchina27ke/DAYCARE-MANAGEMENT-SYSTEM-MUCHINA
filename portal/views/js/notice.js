$(document).ready(function () {
  $(".btnDeleteNotice").click(function () {
      var id = $(this).data("notice_id");
      $.ajax({
          type: "POST",
          url: "ajax/notice.ajax.php",
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

