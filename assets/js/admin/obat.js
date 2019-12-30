$(document).ready(function() {
    // console.log("Blablabla");
  // $("form[name='form-requester-institutions']").validate();
  // $("#myForm").validate({
  //      submitHandler: function(form) {
  //        form.submit();
  //    }
  // });
  initCloseBtn();
  initUpdateStatus();
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
            location.href='../masuk/logout'
        }
      }
    }
  });

}
function initCloseBtn(){
  var $form = $('form'),
    origForm = $form.serialize();

  $('form :input').on('change input', function() {
      if($form.serialize() !== origForm){
        $("#myForm").data('changed', 1);
      }
  });

  $('.close-modal').on('click', function(e){
    e.preventDefault();
    if($("#myForm").data('changed') == 1) {
      bootbox.dialog({
        message: "Apakah anda yakin akan menutup form ini? form akan direset ketika ditutup",
        buttons: {
          close: {
            label: "Kembali",
            className: "btn-success flat",
            callback: function () {
              $(this).modal('hide');
            }
          },
          danger: {
            label: "Tetap Keluar",
            className: "btn-danger flat",
            callback: function () {
              $('#modal-admin').modal('hide');
            }
          }
        }
      });
    }else{
      $('#modal-admin').modal('hide');
    }
  });
}

function postData(){

  var validator = $( "#myForm" ).validate();
  if(validator.form()){
    var data = $('#myForm').serialize();
    // $.post('url', data);
    var api = base_url+"admin/obat/post";
    
    $.post(api, data).done(function( data ) {
      if (data == "1"){
        bootbox.alert("Data obat berhasil disimpan.", function(){
          location.reload();
        })
      }else{
        bootbox.alert("Gagal menyimpan data.");
      }   
    });
    console.log(base_url);
  }
}

$('#modal-admin').on('hide.bs.modal', function () {
    $("#myForm").validate().resetForm();
    $("#myForm").trigger("reset");
    $("#myForm").get(0).reset();
    $("#myForm").data('changed', 0);
});

$(document).on('click','.delete',function(){
  var idx = $(this).closest('tr').attr('idx');
  var tr = $(this).closest('tr');
  
  bootbox.confirm("Apakah anda yakin akan menghapus data obat "+$(tr).find('td').eq(1).html()+" - "+$(tr).find('td').eq(2).html()+"? ", function(result){
    if (result) {
      $.post( base_url+"admin/obat/delete", {id : idx}).done(function( data ) {
        if (data == '1'){
          bootbox.alert("Data berhasil dihapus.", function(){
            location.reload();
          })
        } else {
          bootbox.alert('Data gagal dihapus.');
        }
      });
    }else{
    }
  });
});

$(document).on('click','.update',function(){
  $('#myForm').trigger("reset");
  var idx = $(this).closest('tr').attr('idx');
  var tr = $(this).closest('tr');
  $('#active').show();
  $.post( base_url+"admin/obat/getById", {idx: idx}).done(function( data1 ) {
    var json = $.parseJSON(data1);
    console.log(json)
    $('[name="nama"]').val(json.nama);
    $('[name="id_obat"]').val(json.id_obat);
    $('[name="deskripsi"]').val(json.deskripsi);
    $('[name="harga"]').val(json.harga);
    $('[name="merek"]').val(json.merek);
    $('[name="kategori"]').val(json.kategori);
    $('[name="stok"]').val(json.stok);
  });
});