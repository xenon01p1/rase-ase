function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    var formatted = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + formatted;
}

function set_cart_badge(){
    console.log('badge active');
    $.ajax({
        url: '../model/initialize_cart_qty.php',
        type: "GET",
        success: function(data) {

            if(data > 0){
                $('#cart-count').addClass('badge-cart');
                $('#cart-count').text(data);
            }else{
                $('#cart-count').removeClass('badge-cart');
                $('#cart-count').text('');
            }
            
        },
        error: function(){
            alert("Tidak memproses");
        }           
    });
}