$(document).ready(function() {
	initCloseBtn();
	initValidatorStyle();
	initValidatorFormMain();
	initValidatorFormPass();
	
});
function exit(){
	bootbox.dialog({
	  message: "Apakah anda yakin ingin keluar?",
	  buttons: {
		close: {
		  label: "Tidak",
		  className: "btn-danger flat",
		  callback: function () {
			$(this).modal('hide');
		  }
		},
		danger: {
		  label: "Iya",
		  className: "btn-success flat",
		  callback: function () {
			  location.href='../masuk/logout'
		  }
		}
	  }
	});
  
}
function initValidatorFormPass(){
	var validator = $( "#passwordForm" ).validate({
		rules: {
			password_old:{
		        required: true,
		        remote: {
		          url: base_url+"/admin/pasien/check_password",
		          type: "post",
		          data: {
		            id: function() {
		              return $( "input[name=id]" ).val();
		            }
		          }
		        }
			},
           new_password: { 
             required: true,
                minlength: 6,
                maxlength: 50

           } , 
               new_password_conf: { 
                equalTo: "#new_password",
                 minlength: 6,
                 maxlength: 50
           }
        },
        messages:{
	      password_old:{
	        required: "Bagian ini perlu diisi",
	        remote: "Password salah"
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
        message: "Apakah anda yakin akan menutup form ini? form akan direset ketika ditutup.",
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
$('#modal-admin').on('hide.bs.modal', function () {
    $("#myForm").trigger("reset");
	$('.password').show();
    $("#myForm").validate().resetForm();
    $("#myForm").get(0).reset();
    $("#myForm").data('changed', 0);
});
function postData(){
	var validator = $( "#myForm" ).validate();
	console.log();
	if(validator.form()){
		if($('[name="status"]').is(":checked")){
			// alert();
			$('[name="status"]').val(1);
		}else{
			$('[name="status"]').val(0);
		}
		var data = new FormData($('#myForm')[0]);
 
	     $.ajax({
               type:"POST",
               url:base_url+"admin/pasien/post",
               data:data,
               mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
               success:function(data)
              {
                if (data == "1"){
				bootbox.alert("Data berhasil disimpan.", function(){
				location.reload();
					})
				}else{
					bootbox.alert("Data gagal disimpan.");
				}		
 
               }
	       });
 
	}
}
jQuery.fn.getCheckboxVal = function(){
	var vals = [];
	var i = 0;
	this.each(function(){
		vals[i++] = jQuery(this).val();
	});
	return vals;
}
$(document).on('click','.delete',function(){
	var idx = $(this).closest('tr').attr('idx');
	var tr = $(this).closest('tr');
	
	bootbox.confirm("Apakan anda yakin akan menghapus "+$(tr).find('td').eq(1).html()+"?", function(result){
		if (result) {
			$.post( base_url+"admin/pasien/delete", {id : idx}).done(function( data ) {
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
$(document).on('click','.change-pass',function(){
	var id = $(this).closest('tr').attr('id');
	$('[name="id"]').val(id);
});

$('#modal-change-password').on('hide.bs.modal', function () {
    $("#passwordForm").trigger("reset");
});
$(document).on('click','.update',function(){
	$('#myForm').trigger("reset");
	var idx = $(this).closest('tr').attr('idx');
	var tr = $(this).closest('tr');
	$('#active').show();
	$('.password').hide();
	
	$.post( base_url+"admin/pasien/getById", {idx: idx}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		console.log(json)
		$('[name="id_pasien"]').val(json.id_pasien);
		$('[name="username"]').val(json.username);
		$('[name="nama"]').val(json.nama);
		$('[name="no_telp"]').val(json.no_tlp);

		$('[name="tgl_lahir"]').val(json.tgl_lahir);
		$('[name="image_name"]').val(json.foto);
		$('[name="alamat"]').val(json.alamat);
		$('[name="password"]').val(json.password);
		$('[name="password_conf"]').val(json.password);
		// $('[name="requester_institution"]').val(json.requester_institution);
		if(json.status==1){
			$('[name="status"]').attr('checked',true);
			$('[name="status"]').val(1);
		}else{
			$('[name="status"]').attr('checked',false);
			$('[name="status"]').val(0);
		}
	});
});