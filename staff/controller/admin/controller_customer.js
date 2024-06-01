

$(function(){

    $('#search').on('change', function(){
        $criteria = $(this).val();
        $url = '../../model/admin/model_customer.php?action=search&by=' + $criteria;
        $('#rows').empty();
        show_data($url, 1);
    });

    $('#search_type').on('input', function(){
        $value = $(this).val();
        $url = '../../model/admin/model_customer.php?action=search_type&value=' + $value ;
        $('#rows').empty();
        show_data($url, 1);
    });

    show_data();
    
 });

 function show_data(arg_url='', type=0){
    let url = '';

    if(type == 0){
        url = "../../model/admin/model_customer.php?action=table_data";
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

                        if(record.customer_verified == 1){
                            verified_text_color = 'text-white';
                            verified_bg_color = 'bg-success';
                            verified_text = 'Verified';

                        }else{
                            verified_text_color = 'text-white';
                            verified_bg_color = 'bg-warning';
                            verified_text = 'Not verified';
                        }

                        html += '<tr>';
                        html += '<td>' + count + '</td>'; 
                        html += '<td>' + record.customer_name + '</td>'; 
                        html += '<td>' + record.customer_username + '</td>';
                        html += '<td>' + record.customer_email + '</td>'; 
                        html += '<td>' + record.customer_handphone + '</td>'; 
                        html += '<td>' + record.customer_address + '</td>';  
                        html += display_status(verified_text_color, verified_bg_color, verified_text);
                        console.log(record.customer_id);
                        html += base_action(record.customer_id);
                        html += '</tr>';
                        count+=1;
                    });
                }
                else{
                    html += '<tr><br style="height: 5px; display: block;">';
                    html += '<td align="center" colspan="8">No data for customer yet.</td>';
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
           url : "../../model/admin/model_customer.php?action=delete&id="+id,
           type : "GET",
           success : function(data){
                console.log(data);
                console.log("success!");
                $('#content').load('customer.php');
           },
           error : function(){
             alert("Tidak dapat menghapus data!");
           }
        });
     }
 }

 function edit_data(customer_id){
    $('#content').load('customer_add.php?edit=1&customer_id='+customer_id);	
 }

//  function detail_data(customer_id){
//     $('#content').load('view/customer/customer_add.php?customer_id='+ customer_id + '&detail=1');	
//  }


 