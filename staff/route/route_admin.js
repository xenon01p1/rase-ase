$(function(){
    console.log('test');
    $('#content').load('home.php');	
     
    $('.navigation').each(function(){
       $(this).click(function(){
          var link = $(this).attr('href');
          $('#content').load(link);
          return false;			
       });
    });	
 });

// INSERT AND UPDATING

function page(page){
   $('#content').load(page);	
}

function add_courier(){
   $('#content').load('courier_add.php');	
}

function courier_back(){
   $('#content').load('courier.php');	
}

function add_admin(){
   $('#content').load('admin_add.php');	
}

function admin_back(){
   $('#content').load('admin.php');	
}

function add_customer(){
   $('#content').load('customer_add.php');	
}

function customer_back(){
   $('#content').load('customer.php');	
}

function add_menu(){
   $('#content').load('dish_add.php');	
}

function menu_back(){
   $('#content').load('dish.php');	
}

function add_package(){
   $('#content').load('package_add.php');	
}

function package_back(){
   $('#content').load('package.php');	
}

function add_banner(){
   $('#content').load('banner_add.php');	
}

function banner_back(){
   $('#content').load('banner.php');	
}