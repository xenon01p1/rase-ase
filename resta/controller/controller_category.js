$(document).ready(function() {
    let menu_type = $('#menu_type').val();

    $('#search_type').on('input', function() {
        let value = $(this).val();
        let url = '../model/model_category.php?action=search_type&value=' + value;
        $('#rows').empty();
        show_data(menu_type, url, 1);
    });

    show_data(menu_type);

    // Event delegation for dynamically added elements
    $(document).on('click', '.product-thumbnail, .product-title', function(e) {
        let menu_id = $(this).data('menu-id');
        menu_detail(menu_id);
    });

    // Unbind any existing event handlers before binding
    $(document).off('click', '.add_cart').on('click', '.add_cart', function(e) {
        e.preventDefault();
        let menu_id = $(this).data('menu-id');
        add_cart(menu_id, menu_type);
    });
});

function show_data(menu_type, arg_url = '', type = 0) {
    let url = type === 0 ? "../model/model_category.php?action=table_data" : arg_url;

    $.ajax({
        url: url,
        type: "POST",
        data: { menu_type: menu_type },
        success: function(data) {
            if (data) {
                try {
                    console.log("Data fetched successfully.");
                    let parsedData = JSON.parse(data);
                    let html = '';

                    if (parsedData.length > 0) {
                        html += `<div class="row g-3">`;

                        parsedData.forEach(function(record) {
                            let current_date = new Date();
                            let end_disc_date = new Date(record.menu_discount_end);

                            let price = (record.menu_discount > 0 && current_date <= end_disc_date) 
                                        ? record.menu_price - (record.menu_price * (record.menu_discount / 100)) 
                                        : record.menu_price;
                            let disc_cross = (record.menu_discount > 0 && current_date <= end_disc_date) 
                                            ? `<span>${formatRupiah(record.menu_price)}</span><br>` 
                                            : '';
                            let disc_badge = (record.menu_discount > 0 && current_date <= end_disc_date) 
                                            ? `<span class="badge bg-warning">${record.menu_discount}%</span>` 
                                            : '';

                            html += `<div class="col-6 col-sm-4 col-lg-3">
                                        <div class="card single-product-card">
                                            <div class="card-body p-3">
                                                <a class="product-thumbnail d-block" href="javascript:void(0);" data-menu-id="${record.menu_id}">
                                                    <img src="../../media/${record.menu_file_name}" alt="">
                                                    ${disc_badge}
                                                </a>
                                                <a class="product-title d-block text-truncate" href="javascript:void(0);" data-menu-id="${record.menu_id}">${record.menu_name}</a>
                                                <p class="sale-price">${disc_cross}${formatRupiah(price)}</p>
                                                <a class="btn btn-sm add_cart text-white" style="background-color: #6b462c;" href="javascript:void(0);" data-menu-id="${record.menu_id}">
                                                    <svg class="bi bi-cart me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                                    </svg>Add to Cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>`;
                        });

                        html += `</div>`;
                    } else {
                        html = '<div class="card"><div class="card-body"><center>No data for this category.</center></div></div>';
                    }

                    $('#rows').html(html); // Avoid using append here to prevent duplication
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    alert("Failed to parse data");
                }
            } else {
                alert("Failed to fetch data");
            }
        },
        error: function() {
            alert("Tidak memproses");
        }
    });
}

function menu_detail(menu_id) {
    $('#content').load('menu_detail.php?menu_id=' + menu_id);
}

function add_cart(menu_id, menu_type) {
    $.ajax({
        url: '../model/model_menu_detail.php?action=add_item&menu_id=' + menu_id,
        type: "GET",
        success: function(data) {
            console.log(data);

            if(data == 'ONGOING_TRANSACTION'){
                alert("Sorry, you have an ongoing transaction on your cart");

            }else if(data > 0){
                console.log("success!");
                $('#content').load('menu_category.php?menu_type=' + menu_type);
                // SET NEW number qty
                set_cart_badge();

            }else{
                alert("error occured");
            }

            // if (data > 0) {
            //     console.log("Item added to cart successfully.");
            //     alert("Item added to cart successfully.");
            //     $('#content').load('menu_category.php?menu_type=' + menu_type);
            //     set_cart_badge(); // Update the cart badge
            // } else {
            //     alert("Error occurred while adding item to cart.");
            // }
        },
        error: function() {
            alert("Error processing the request.");
        }
    });
}