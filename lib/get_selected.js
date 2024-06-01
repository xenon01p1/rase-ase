function get_province(url, callback){
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            let province_id = data.province_id;
            let regency_id = data.regency_id;
            let district_id = data.district_id;
            let village_id = data.village_id;
            console.log('province_id : '+province_id);
            callback(province_id, regency_id, district_id, village_id);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

// Function to get regency
function getRegency(id_province, regency_id) {
    $.ajax({
        url: "../../model/admin/get_regency.php?id_province=" + id_province + "&regency_id=" + regency_id,
        type: "GET",
        success: function(data) {
            $('#regency_id').html(data);
            console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

// Function to get district
function getdistrict(id_regency, district_id) {
    $.ajax({
        url: "../../model/admin/get_district.php?id_regency=" + id_regency + "&district_id=" + district_id,
        type: "GET",
        success: function(data) {
            $('#district_id').html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

// Function to get village
function getVillage(id_district, village_id) {
    $.ajax({
        url: "../../model/admin/get_village.php?id_district=" + id_district + "&village_id=" + village_id,
        type: "GET",
        success: function(data) {
            $('#village_id').html(data);
            console.log("village : " + data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}