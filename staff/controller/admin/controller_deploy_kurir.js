$(function(){ 
    let insert = true;
    let url = '';

    $('#form_courier').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        url = "../../model/admin/model_menu_detail.php?action=deploy_courier";
        console.log(url);
        
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(data) {
                if (data == 1) {
                    console.log(data);
                    console.log("success!");
                    alert("Data saved successfully!");
                    $('#content').load('order.php');
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
