$(document).ready(function() {

    console.log($('#form_transfer'));

    $('#form_transfer').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
 
        if(confirm("Are you sure?")){ 
            $.ajax({
                url: '../model/model_cart.php?action=transfer',
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(data) {
                    console.log(data);
    
                    if(data > 0){
                        $('#content').load('order.php');
                    }else{
                        alert("error occured");
                    }
                    
                },
                error: function(){
                    alert("Tidak memproses");
                }           
            });
        }
    });

});