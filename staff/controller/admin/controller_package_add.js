$(function(){ 
    let insert = true;
    let url = '';

    let package_menu_id = $('#package_menu_id').val();
    let detail = $('#detail').val();

    $('#form_package').submit(function(e){
        e.preventDefault(); 
        
        var formData = new FormData(this); 
        if (insert){
            url = "../../model/admin/model_package_add.php?action=insert";
        }else{
            url = "../../model/admin/model_package_add.php?action=update&package_menu_id="+package_menu_id;
        }
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
                    console.log("success!");
                    alert("Data saved successfully!");
                    $('#content').load('package.php');

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

