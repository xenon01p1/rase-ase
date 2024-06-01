$(function(){
    $.ajax({
        url : "../model/get_province.php",
        type : "GET",
        success : function(data){
            $('#province_id').html(data);
            console.log(data);
            
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });

    // get regencies
    $('#province_id').on("change", function(){
        let province_id = $('#province_id').val();
        $.ajax({
            url : "../model/get_regency.php?province_id="+province_id,
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
        let regency_id = $('#regency_id').val();
        $.ajax({
            url : "../model/get_district.php?regency_id="+regency_id,
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
        let district_id = $('#district_id').val();
        $.ajax({
            url : "../model/get_village.php?district_id="+district_id,
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
});