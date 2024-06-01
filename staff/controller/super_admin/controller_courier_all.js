

$(function(){

    $('#search').on('change', function(){
        $criteria = $(this).val();
        $url = '../../model/super_admin/model_courier_all.php?action=search&by=' + $criteria;
        $('#rows').empty();
        show_data($url, 1);
    });

    $('#search_type').on('input', function(){
        $value = $(this).val();
        $url = '../../model/super_admin/model_courier_all.php?action=search_type&value=' + $value ;
        $('#rows').empty();
        show_data($url, 1);
    });

    show_data();
    
 });

 function show_data(arg_url='', type=0){
    let url = '';

    if(type == 0){
        url = "../../model/super_admin/model_courier_all.php?action=table_data";
    }else{
        url = arg_url;
    }

    console.log(url);

    $.ajax({
        url: url,
        type: "POST",
        success: function(data) {
            if (data) {
                console.log("success!");
                // console.log(data);
                var data = JSON.parse(data);
                let html = '';
                let count = 1;

                if(data.length > 0){
                    data.forEach(function(record) {

                        html += '<tr>';
                        html += '<td>' + count + '</td>'; 
                        html += '<td>' + record.branch_name + '</td>'; 
                        html += '<td>' + record.kurir_name + '</td>'; 
                        html += '<td>' + record.kurir_email + '</td>'; 
                        html += '<td>' + record.kurir_handphone + '</td>'; 
                        html += '<td>' + record.kurir_vehicle_number + '</td>'; 
                        console.log(record.kurir_id);
                        html += base_action(record.kurir_id);
                        html += '</tr>';
                        count+=1;
                    });
                }
                else{
                    html += '<tr><br style="height: 5px; display: block;">';
                    html += '<td align="center" colspan="8">No data for courier yet.</td>';
                    html += '</tr><br style="height: 5px; display: block;">';
                }

                $('#rows').append(html);

            } else {
                alert("Failed to fetch data");
            }
        },
        error: function(){
            alert("Tidak memproses");
        }           
    });
 }

// used in base action function
 function delete_data(id){
    if(confirm("Are you sure?")){
        $.ajax({
           url : "../../model/super_admin/model_courier_all.php?action=delete&id="+id,
           type : "GET",
           success : function(data){
                console.log(data);
                console.log("success!");
                $('#content').load('courier_all.php');
           },
           error : function(){
             alert("Tidak dapat menghapus data!");
           }
        });
     }
 }

 function edit_data(kurir_id){
    $('#content').load('courier_add_all.php?edit=1&kurir_id='+kurir_id);	
 }

//  function detail_data(courier_id){
//     $('#content').load('view/super_admin/courier_add.php?courier_id='+ courier_id + '&detail=1');	
//  }


 