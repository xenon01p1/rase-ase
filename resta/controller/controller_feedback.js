$(document).ready(function() {

    // CEHCKOUT
    $('#form_feedback').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
 
            $.ajax({
                url: '../model/model_feedback.php?action=submit_feedback',
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(data) {
                    console.log(data);
    
                    if(data > 0){
                        alert('Thank you for your feedback! we will keep improving our service!');
                        $('#content').load('home.php');
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