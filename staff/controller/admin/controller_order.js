$(document).ready(function() {

    // $(document).off('click', '.proceed_btn').on('click', '.proceed_btn', function(e) {
    //     e.preventDefault();
    //     let invoice_id = $(this).data('invoice-id');
        
    //     if(confirm("Are you sure?")){
    //         $.ajax({
    //             url: '../model/model_menu_detail.php?action=proceed&invoice_id=' + invoice_id,
    //             type: "GET",
    //             success: function(data) {
    //                 console.log(data);
        
    //                 if (data > 0) {
    //                     alert("Item added to cart successfully.");
    //                     $('#content').load('order.php');
    //                 } else {
    //                     alert("Error occurred while adding item to cart.");
    //                 }
    //             },
    //             error: function() {
    //                 alert("Error processing the request.");
    //             }
    //         });
    //     };
    // });


    $('.done_btn').each(function(){
        
        let invoice_id = $(this).data('invoice-id');

        $(this).on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: '../../model/admin/model_menu_detail.php?action=done&invoice_id='+invoice_id,
                type: "GET",
                success: function(data) {
                    console.log(data);

                    if(data > 0){
                        console.log("success!");
                        alert('Order Done :D');
                        $('#content').load('order.php');

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

});