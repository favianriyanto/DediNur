var table = $('#dataTables-modal').DataTable({
        		responsive: true
    		});
$(document).ready(function() {
	initCloseBtn();
	initValidatorStyle();
	initValidatorFormMain();
	initValidatorFormPass();
	table;
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
function initValidatorFormMain(){
	var validator = $( "#myForm" ).validate({
		rules: {
           password: { 
             required: true,
                minlength: 6,
                maxlength: 50

           } , 
               password_conf: { 
                equalTo: "#password",
                 minlength: 6,
                 maxlength: 50
           }
        },
        messages:{
	      
	    }
	});
}
function initValidatorFormPass(){
	var validator = $( "#passwordForm" ).validate({
		rules: {
			password_admin:{
		        required: true,
		        remote: {
		          url: base_url+"/admin/pengguna/checkPasswordAdmin",
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
	      password_admin:{
	        required: "Bagian ini perlu diisi",
	        remote: "Kata Sandi Dokter salah"
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

		var data = $( "#myForm" ).serialize();

		var api = base_url+"admin/pengguna/post";
		
		$.post(api, data).done(function( data ) {
			if (data == "1"){
				bootbox.alert("Data berhasil disimpan.", function(){
					location.reload();
				})
			}else{
				bootbox.alert("Data gagal disimpan.");
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
	var idx = $(this).closest('tr').attr('id');
	var tr = $(this).closest('tr');
	
	bootbox.confirm("Apakan anda yakin akan menghapus "+$(tr).find('td').eq(1).html()+"?", function(result){
		if (result) {
			$.post( base_url+"admin/pengguna/delete", {id : idx}).done(function( data ) {
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

$(document).on('click','.lapangan',function(){
	var idx = $(this).closest('tr').attr('idx');
	$('[name="id"]').val(idx);
	initLapang(idx);

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
	
	$.post( base_url+"admin/pengguna/getById", {idx: idx}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		console.log(json)
		$('[name="id_pengguna"]').val(json.id_pengguna);
		$('[name="user_login_id"]').val(json.user_login_id);
		$('[name="username"]').val(json.username);
		$('[name="nama"]').val(json.nama);
		$('[name="alamat"]').val(json.alamat);
		$('[name="telp"]').val(json.no_hp);
		$('[name="jabatan"]').val(json.jabatan);
		$('[name="jk"]').val(json.jk);
		$('[name="password"]').val(json.password);
		$('[name="password_conf"]').val(json.password);
	});
});
function changePass(){
	var validator = $( "#passwordForm" ).validate();
	  if(validator.form()){
	    var data = $('#passwordForm').serialize();
	    var api = base_url+"admin/pengguna/changePass";
	    
	    $.post(api, data).done(function( data ) {
	      if (data == "1"){
	        bootbox.alert("Password berhasil diubah.", function(){
	          location.reload();
	        })
	      }else{
	        bootbox.alert("Gagal mengubah password.");
	      }   
	    });
	    console.log(base_url);
	  }
}
$(document).on('click','.show-trans',function(){
	var idx = $(this).closest('tr').attr('idx');
	$('#dataTables-modal').find('tbody').empty();
	$.post( base_url+"admin/provider/get_trans_by_id", {idx: idx}).done(function( data ) {
		var json = $.parseJSON(data);
		table.clear();

		table.rows.add(json);
		table.draw();
		
	});

	
})