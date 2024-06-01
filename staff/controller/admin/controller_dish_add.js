$(function(){ 
    let insert = true;
    let url = '';

    let menu_id = $('#menu_id').val();
    let detail = $('#detail').val();
    
    if (menu_id != ''){
        insert = false;
        edit_assign_value(menu_id);
    }


    $('#form_menu').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        if (insert){
            url = "../../model/admin/model_dish_add.php?action=insert";
        }else{
            url = "../../model/admin/model_dish_add.php?action=update&menu_id="+menu_id;
        }
        console.log(url);
        
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    console.log(data);
                    console.log("success!");
                    alert("Data saved successfully!");
                    $('#content').load('dish.php');

                }else if (data == 41) {
                    alert("terjadi kesalahan saat menyimpan data");
                    console.log(data);

                }else if (data == 42) {
                    alert("terjadi kesalahan saat mengupload gambar");
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
        url: "../../model/admin/model_dish_add.php?action=get_data&id=" + id,
        type: "GET",
        dataType: "json", 
        success: function(data) {
            console.log(data.menu_original_price);
            $('#menu_name').val(data.menu_name);
            $('#menu_price').val(data.menu_price);
            $('#menu_original_price').val(data.menu_original_price);
            $('#menu_discount').val(data.menu_discount);
            $('#menu_discount_start').val(data.menu_discount_start);
            $('#menu_discount_end').val(data.menu_discount_end);
            $('#menu_description').val(data.menu_description);

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
 