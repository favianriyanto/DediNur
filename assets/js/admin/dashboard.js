$(document).ready(function() {
});

function exit(){
          bootbox.dialog({
            message: "Apakah anda yakin ingin keluar?",
            buttons: {
              close: {
                label: "Tidak",
                className: "btn-danger",
                callback: function () {
                  $(this).modal('hide');
                }
              },
              danger: {
                label: "Iya",
                className: "btn-success",
                callback: function () {
                    location.href='masuk/logout'
                }
              }
            }
          });
        
}
