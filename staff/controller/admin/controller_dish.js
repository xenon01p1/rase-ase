

$(function(){

    $('#search').on('change', function(){
        $criteria = $(this).val();
        $url = '../../model/admin/model_dish.php?action=search&by=' + $criteria;
        $('#rows').empty();
        show_data($url, 1);
    });

    $('#search_type').on('input', function(){
        $value = $(this).val();
        $url = '../../model/admin/model_dish.php?action=search_type&value=' + $value ;
        $('#rows').empty();
        show_data($url, 1);
    });

    show_data();
    
 });

 function show_data(arg_url='', type=0){
    let url = '';

    if(type == 0){
        url = "../../model/admin/model_dish.php?action=table_data";
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
                console.log(data);
                var data = JSON.parse(data);
                let html = '';
                let count = 1;

                if(data.length > 0){
                    data.forEach(function(record) {
                        
                        if(record.menu_discount == 0){
                            discount = 'None';
                            active_itme = ' - ';
                        }else{
                            discount = record.menu_discount + '%';
                            active_itme = formatDate(record.menu_discount_start) + ' - ' + formatDate(record.menu_discount_end);
                        }

                        html += '<tr>';
                        html += '<td>' + count + '</td>'; 
                        html += '<td><img src="../../../media/' + record.menu_file_name + '" alt="menu_'+ count +'" width="100"></td>'; 
                        html += '<td>' + record.menu_name + '</td>'; 
                        html += '<td>' + formatRupiah(record.menu_original_price) + '</td>'; 
                        html += '<td>' + formatRupiah(record.menu_price) + '</td>'; 
                        html += '<td><center>' + discount + '</center></td>'; 
                        html += '<td><center>' + active_itme + '</center></td>'; 
                        html += '<td>' + record.menu_type + '</td>';
                        html += '<td>' + record.menu_description + '</td>'; 
                        
                        html += base_action(record.menu_id);
                        html += '</tr>';
                        count+=1;
                    });
                }
                else{
                    html += '<tr><br style="height: 5px; display: block;">';
                    html += '<td align="center" colspan="8">No data for menu yet.</td>';
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
           url : "../../model/admin/model_dish.php?action=delete&id="+id,
           type : "GET",
           success : function(data){
                console.log(data);
                console.log("success!");
                $('#content').load('dish.php');
           },
           error : function(){
             alert("Tidak dapat menghapus data!");
           }
        });
     }
 }

 function edit_data(menu_id){
    $('#content').load('dish_add.php?edit=1&menu_id='+menu_id);	
 }

//  function detail_data(menu_id){
//     $('#content').load('view/menu/dish_add.php?menu_id='+ menu_id + '&detail=1');	
//  }


 