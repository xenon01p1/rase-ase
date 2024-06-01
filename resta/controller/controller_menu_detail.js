$(document).ready(function() {


    $('.add_cart2').each(function() {
        $(this).on('click', function(e) {
            e.preventDefault();
            var menu_id = $(this).data('menu-id');
            
            $.ajax({
                url: '../model/model_menu_detail.php?action=add_item&menu_id='+menu_id,
                type: "GET",
                success: function(data) {
                    console.log(data);

                    if(data == 'ONGOING_TRANSACTION'){
                        alert("Sorry, you have an ongoing transaction on your cart");

                    }else if(data > 0){
                        console.log("success!");
                        $('#content').load('menu_detail.php?menu_id='+data);
                        // SET NEW number qty
                        set_cart_badge();

                    }else{
                        alert("error occured");
                    }
    
                    
                },
                error: function(){
                    alert("Tidak memproses");
                }           
            });
        });
    });

    $('#form_cart').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this); 
        
        $.ajax({
            url: '../model/model_menu_detail.php?action=add_item',
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(data) {
                console.log(data);

                if(data == 'ONGOING_TRANSACTION'){
                    alert("Sorry, you have an ongoing transaction on your cart");

                }else if(data > 0){
                    console.log("success!");
                    $('#content').load('menu_detail.php?menu_id='+data);
                    // SET NEW number qty
                    set_cart_badge();

                }else{
                    alert("error occured");
                }

                // if(data > 0){
                //     console.log("success!");
                //     alert("Data saved successfully!");
                //     $('#content').load('menu_detail.php?menu_id='+data);
                //     // SET NEW number qty
                //     set_cart_badge();
                // }else{
                //     alert("error occured");
                // }
                
            },
            error: function(){
                alert("Tidak memproses");
            }           
        });
    })


});