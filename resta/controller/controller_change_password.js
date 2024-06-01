$(function(){ 
    let insert = true;
    let url = '';

    let customer_id = $('#customer_id').val();
    

    $('#form_change_password').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        url = "../model/model_edit_account.php?action=change_password";
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
                    $('#content').load('../view/account.php');

                } else if(data == 41) {
                    alert("New password and confirm password doesn't match.");
                    console.log(data);

                }else if(data == 42) {
                    alert("Old password incorrect.");
                    console.log(data);

                }else{
                    alert("Error.");
                    console.log(data);
                }
            },
            error: function(){
                alert("Tidak memproses");
            }           
        });
    });
});