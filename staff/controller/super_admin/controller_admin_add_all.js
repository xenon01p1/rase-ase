$(function(){ 
    let insert = true;
    let url = '';

    let admin_id = $('#admin_id').val();
    let detail = $('#detail').val();
    
    if (admin_id != ''){
        insert = false;
        edit_assign_value(admin_id);
    }


    $('#form_admin').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        if (insert){
            url = "../../model/super_admin/model_admin_add_all.php?action=insert";
        }else{
            url = "../../model/super_admin/model_admin_add_all.php?action=update&admin_id="+admin_id;
        }
        console.log(url);
        
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(data) {
                if (data == 1) {
                    console.log(data);
                    console.log("success!");
                    alert("Data saved successfully!");
                    $('#content').load('admin_all.php');
                } else {
                    alert("terjadi kesalahan");
                    console.log(data);
                }
            },
            error: function(){
                alert("Tidak memproses");
            }           
        });
    });
});


function edit_assign_value(id, detail){
    $.ajax({
        url: "../../model/super_admin/model_admin_add_all.php?action=get_data&id=" + id,
        type: "GET",
        dataType: "json", 
        success: function(data) {
            console.log(data);
            $('#branch_id').val(data.branch_id);
            $('#admin_name').val(data.admin_name);
            $('#admin_username').val(data.admin_username);
            $('#admin_email').val(data.admin_email);
            $('#admin_handphone').val(data.admin_handphone);
            $('#admin_password').attr('placeholder', "Ignore if the password won't change");

            // if(detail){
            //     $('#fullname').prop( "disabled", true );
            //     $('#samsat_code').prop( "disabled", true );
            //     $('#province_code').prop( "disabled", true );
            //     $('#regency_code').prop( "disabled", true );
            //     $('#subdistrict_code').prop( "disabled", true );
            //     $('#village_code').prop( "disabled", true );
            //     $('#email').prop( "disabled", true );
            //     $('#handphone').prop( "disabled", true );
            //     $('#information').prop( "disabled", true );
            // }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.error("AJAX Error:", xhr.status, thrownError);
        }
    });
}
 