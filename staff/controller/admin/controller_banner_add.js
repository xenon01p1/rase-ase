$(function(){ 
    let insert = true;
    let url = '';

    let banner_id = $('#banner_id').val();
    let detail = $('#detail').val();

    $('#form_banner').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        if (insert){
            url = "../../model/admin/model_banner_add.php?action=insert";
        }else{
            url = "../../model/admin/model_banner_add.php?action=update&banner_id="+banner_id;
        }
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
                    $('#content').load('banner.php');
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

 