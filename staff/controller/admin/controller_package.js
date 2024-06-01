

$(function(){

    $('#search').on('change', function(){
        $criteria = $(this).val();
        $url = '../../model/admin/model_package.php?action=search&by=' + $criteria;
        $('#rows').empty();
        show_data($url, 1);
    });

    $('#search_type').on('input', function(){
        $value = $(this).val();
        $url = '../../model/admin/model_package.php?action=search_type&value=' + $value ;
        $('#rows').empty();
        show_data($url, 1);
    });

    show_data();
    
 });

 function show_data(arg_url='', type=0){
    let url = '';

    if(type == 0){
        url = "../../model/admin/model_package.php?action=table_data";
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

                        html += '<tr>';
                        html += '<td>' + count + '</td>'; 
                        html += '<td>' + record.package_name + '</td>';
                        html += '<td>' + record.item_name + '</td>';
                        html += base_action(record.package_menu_id, edit_button=false, delete_button=true);
                        html += '</tr>';
                        count+=1;
                    });
                }
                else{
                    html += '<tr><br style="height: 5px; display: block;">';
                    html += '<td align="center" colspan="8">No data for package menu yet.</td>';
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
           url : "../../model/admin/model_package.php?action=delete&id="+id,
           type : "GET",
           success : function(data){
                console.log(data);
                console.log("success!");
                $('#content').load('package.php');
           },
           error : function(){
             alert("Tidak dapat menghapus data!");
           }
        });
     }
 }

//  function edit_data(menu_id){
//     $('#content').load('package_add.php?edit=1&menu_id='+menu_id);	
//  }

//  function detail_data(menu_id){
//     $('#content').load('view/menu/package_add.php?menu_id='+ menu_id + '&detail=1');	
//  }


 