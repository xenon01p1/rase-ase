$(function(){ 
    let insert = true;
    let url = '';

    let kurir_id = $('#kurir_id').val();
    let detail = $('#detail').val();
    
    if (kurir_id != ''){
        insert = false;
        edit_assign_value(kurir_id);
    }


    $('#form_kurir').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        if (insert){
            url = "../../model/super_admin/model_courier_add_all.php?action=insert";
        }else{
            url = "../../model/super_admin/model_courier_add_all.php?action=update&kurir_id="+kurir_id;
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
                    $('#content').load('courier_all.php');
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
        url: "../../model/super_admin/model_courier_add_all.php?action=get_data&id=" + id,
        type: "GET",
        dataType: "json", 
        success: function(data) {
            console.log(data);
            $('#branch_id').val(data.branch_id);
            $('#kurir_name').val(data.kurir_name);
            $('#kurir_username').val(data.kurir_username);
            $('#kurir_email').val(data.kurir_email);
            $('#kurir_handphone').val(data.kurir_handphone);
            $('#kurir_vehicle_number').val(data.kurir_vehicle_number);
            $('#kurir_password').attr('placeholder', "Ignore if the password won't change");

        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.error("AJAX Error:", xhr.status, thrownError);
        }
    });
}
 