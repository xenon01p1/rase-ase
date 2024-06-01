$(function(){ 
    let insert = true;
    let url = '';

    let customer_id = $('#customer_id').val();
    let detail = $('#detail').val();
    

     // get province
     $.ajax({
        url : "../../model/admin/get_province.php",
        type : "GET",
        success : function(data){
            $('#province_id').html(data);
            if(customer_id != ''){
                insert = false;
                url = "../../model/admin/model_customer_add.php?action=get_data&id=" + customer_id,

                get_province(url, function(province_id, regency_id, district_id, village_id) {
                    console.log("callback village_id: " + village_id);
                    let assignedProvinceCode = province_id;
                    getRegency(assignedProvinceCode, regency_id); 
                    getdistrict(regency_id, district_id); 
                    getVillage(district_id, village_id); 
                });
                
                edit_assign_value(customer_id);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });

    // get regency
    $('#province_id').on("change", function(){
        let id_province = $('#province_id').val();
        $.ajax({
            url : "../../model/admin/get_regency.php?id_province="+id_province,
            type : "GET",
            success : function(data){
                $('#regency_id').html(data)
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

    // get district
    $('#regency_id').on("change", function(){
            let id_regency = $('#regency_id').val();
            $.ajax({
                url : "../../model/admin/get_district.php?id_regency="+id_regency,
                type : "GET",
                success : function(data){
                    $('#district_id').html(data)
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
    });

    // get village
    $('#district_id').on("change", function(){
        let id_district = $('#district_id').val();
        $.ajax({
            url : "../../model/admin/get_village.php?id_district="+id_district,
            type : "GET",
            success : function(data){
                $('#village_id').html(data)
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });


    $('#form_customer').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        if (insert){
            url = "../../model/admin/model_customer_add.php?action=insert";
        }else{
            url = "../../model/admin/model_customer_add.php?action=update&customer_id="+customer_id;
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
                    $('#content').load('customer.php');
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
        url: "../../model/admin/model_customer_add.php?action=get_data&id=" + id,
        type: "GET",
        dataType: "json", 
        success: function(data) {
            console.log(data);
            $('#customer_name').val(data.customer_name);
            $('#customer_username').val(data.customer_username);
            $('#customer_email').val(data.customer_email);
            $('#customer_handphone').val(data.customer_handphone);
            $('#customer_address').val(data.customer_address);
            $('#customer_link_address').val(data.customer_link_address);
            $('#customer_password').attr('placeholder', "Ignore if the password won't change");

            // if(detail){
            //     $('#fullname').prop( "disabled", true );
            //     $('#samsat_code').prop( "disabled", true );
            //     $('#province_id').prop( "disabled", true );
            //     $('#regency_id').prop( "disabled", true );
            //     $('#district_id').prop( "disabled", true );
            //     $('#village_id').prop( "disabled", true );
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
 