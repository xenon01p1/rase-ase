$(document).ready(function() {

    // CHECK IF CART HAS ANY UNFINISHED TRANSACTION
    $.ajax({
        url: '../model/model_cart.php?action=check_unfinished_transaction',
        type: "GET",
        success: function(data) {
            console.log(data);

            if(data > 0){
                $('#content').load('transfer.php?invoice_id='+data);
            }
            
        },
        error: function(){
            alert("Tidak memproses");
        }           
    });


    // REMOVE ITEM
    $('.remove-product').each(function(){
        $(this).on('click', function(e) {
            e.preventDefault();
            let cart_id = $(this).data('cart-id');
            
            if(confirm("Are you sure?")){
                $.ajax({
                    url: '../model/model_cart.php?action=delete_item&cart_id='+cart_id,
                    type: "GET",
                    success: function(data) {
                        console.log(data);
        
                        if(data > 0){
                            $('#content').load('cart.php');
                            // SET CART BADGE
                            set_cart_badge();
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


    // CEHCKOUT
    $('#form_checkout').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
 
        if(confirm("Are you sure?")){ 
            $.ajax({
                url: '../model/model_cart.php?action=checkout',
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(data) {
                    console.log(data);
    
                    if(data > 0){
                        $('#content').load('transfer.php?invoice_id='+data);
                        set_cart_badge();
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