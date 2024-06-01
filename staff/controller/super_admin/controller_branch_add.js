$(function(){ 
    let insert = true;
    let url = '';

    let branch_id = $('#branch_id').val();
    let detail = $('#detail').val();
    
    if (branch_id != ''){
        insert = false;
        edit_assign_value(branch_id);
    }

     // get province
     $.ajax({
        url : "../../model/admin/get_province.php",
        type : "GET",
        success : function(data){
            $('#province_id').html(data);
            if(branch_id != ''){
                insert = false;
                url = "../../model/super_admin/model_branch_add.php?action=get_data&id=" + branch_id,

                get_province(url, function(province_id, regency_id, district_id, village_id) {
                    console.log("callback village_id: " + village_id);
                    let assignedProvinceCode = province_id;
                    getRegency(assignedProvinceCode, regency_id); 
                    getdistrict(regency_id, district_id); 
                    getVillage(district_id, village_id); 
                });
                
                edit_assign_value(branch_id);
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


    $('#form_branch').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        if (insert){
            url = "../../model/super_admin/model_branch_add.php?action=insert";
        }else{
            url = "../../model/super_admin/model_branch_add.php?action=update&branch_id="+branch_id;
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
                    
                    console.log("success!");
                    alert("Data saved successfully!");
                    $('#content').load('branch.php');
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
        url: "../../model/super_admin/model_branch_add.php?action=get_data&id=" + id,
        type: "GET",
        dataType: "json", 
        success: function(data) {
            console.log(data);
            $('#province_id').val(data.province_id);
            $('#regency_id').val(data.regency_id);
            $('#district_id').val(data.district_id);
            $('#village_id').val(data.village_id);
            $('#branch_name').val(data.branch_name);
            $('#branch_status').val(data.branch_status);
            $('#branch_open').val(data.branch_open);
            $('#branch_close').val(data.branch_close);
            $('#branch_address').val(data.branch_address);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.error("AJAX Error:", xhr.status, thrownError);
        }
    });
}
 