$(document).ready(function() {

    $('.deliver_btn').each(function(){
        $(this).on('click', function(e) {
            e.preventDefault();
            let invoice_id = $(this).data('invoice-id');
            
            if(confirm("Are you sure?")){
                $.ajax({
                    url: '../../model/kurir/model_delivery.php?action=deliver_order&invoice_id='+invoice_id,
                    type: "GET",
                    success: function(data) {
                        console.log(data);
        
                        if(data > 0){
                            $('#content').load('deliveries.php');
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

});