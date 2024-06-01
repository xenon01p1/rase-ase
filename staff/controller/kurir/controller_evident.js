$(function(){ 

    $('#form_evident').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        url = "../../model/kurir/model_delivery.php?action=evident";
        console.log(url);
        
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    console.log(data);
                    alert("Delivery finished!");
                    $('#content').load('deliveries.php');

                }else{
                    alert("terjadi kesalahan saat menyimpan data");
                    console.log(data);

                }
            },
            error: function(){
                alert("Tidak memproses");
            }           
        });
    });
});

