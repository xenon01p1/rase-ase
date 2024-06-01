

$(function(){

    $('#search').on('change', function(){
        $criteria = $(this).val();
        $url = '../../model/admin/model_feedback.php?action=search&by=' + $criteria;
        $('#rows').empty();
        show_data($url, 1);
    });

    $('#search_type').on('input', function(){
        $value = $(this).val();
        $url = '../../model/admin/model_feedback.php?action=search_type&value=' + $value ;
        $('#rows').empty();
        show_data($url, 1);
    });

    show_data();
    
 });

 function show_data(arg_url='', type=0){
    let url = '';

    if(type == 0){
        url = "../../model/admin/model_feedback.php?action=table_data";
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
                        html += '<td>' + multiline_cell_text(record.customer_username, record.customer_email, record.customer_handphone) + '</td>'; 
                        html += '<td>' + record.feedback_content + '</td>'; 
                        html += '<td>' + formatDate(record.feedback_datetime) + ' </td>'; 
                        html += '<td><a onclick="preview_data(' + record.feedback_id +')" class="ms-3" style="cursor:pointer;"><i class="bx bxs-image"></i></a></td>';
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


 function preview_data(feedback_id){
    $('#content').load('feedback_preview.php?feedback_id='+ feedback_id );	
 }


 