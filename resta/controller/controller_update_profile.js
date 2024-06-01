$(function(){ 
    let insert = true;
    let url = '';


    $('#form_profile').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        url = "../model/model_edit_account.php?action=update_profile";
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
                    $('#content').load('update_profile.php');

                } else if(data == 2){
                    document.location.href = "branch_location.php";

                }else {
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

