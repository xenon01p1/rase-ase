

$(function(){

    $('#search').on('change', function(){
        $criteria = $(this).val();
        $url = '../../model/super_admin/model_feedback_all.php?action=search&by=' + $criteria;
        $('#rows').empty();
        show_data($url, 1);
    });

    $('#search_type').on('input', function(){
        $value = $(this).val();
        $url = '../../model/super_admin/model_feedback_all.php?action=search_type&value=' + $value ;
        $('#rows').empty();
        show_data($url, 1);
    });

    show_data();
    
 });

 function show_data(arg_url='', type=0){
    let url = '';

    if(type == 0){
        url = "../../model/super_admin/model_feedback_all.php?action=table_data";
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

                        console.log(record.branch_name);
                        html += '<tr>';
                        html += '<td>' + count + '</td>'; 
                        html += '<td>' + record.branch_name + '</td>'; 
                        html += '<td>' + multiline_cell_text(record.customer_username, record.customer_email, record.customer_handphone) + '</td>'; 
                        html += '<td>' + record.feedback_content + '</td>'; 
                        html += '<td>' + formatDate(record.feedback_datetime) + ' </td>'; 
                        // html += base_action(record.category_id);
                        html += '</tr>';
                        count+=1;
                    });
                }
                else{
                    html += '<tr><br style="height: 5px; display: block;">';
                    html += '<td align="center" colspan="8">No feedback from customer yet.</td>';
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


 