

$(function(){

    show_data();
    
 });

 function show_data(arg_url='', type=0){
    let url = '';

    if(type == 0){
        url = "../../model/admin/model_banner.php?action=table_data";
    }else{
        url = arg_url;
    }

    console.log(url);

    $.ajax({
        url: url,
        type: "POST",
        success: function(data) {
            console.log(data);
            if (data) {
                console.log("success!");
                console.log(data);
                var data = JSON.parse(data);
                let html = '';
                let count = 1;

                if(data.length > 0){
                    data.forEach(function(record) {

                        html += '<tr>';
                        html += '<td>' + count + '</td>'; 
                        html += '<td>' + record.banner_order + '</td>'; 
                        html += '<td><img src="../../../media/' + record.banner_file_name + '" width="500"></td>';
                        html += base_action(record.banner_id, edit_button=false);
                        html += '</tr>';
                        count+=1;
                    });
                }
                else{
                    html += '<tr><br style="height: 5px; display: block;">';
                    html += '<td align="center" colspan="8">No data for banner yet.</td>';
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
           url : "../../model/admin/model_banner.php?action=delete&id="+id,
           type : "GET",
           success : function(data){
                console.log(data);
                console.log("success!");
                $('#content').load('banner.php');
           },
           error : function(){
             alert("Tidak dapat menghapus data!");
           }
        });
     }
 }



 