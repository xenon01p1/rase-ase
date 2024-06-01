$(function(){
    console.log('test');
    // $('#content').load('home.php');	
    $('#content').load('home.php', function() {
        // Initialize Owl Carousel after content is loaded
        initOwlCarousel();
    });	
     
    $('.navigation').each(function(){
       $(this).click(function(){
          var link = $(this).attr('href');
          $('#content').load(link, function() {
            // Re-initialize Owl Carousel after new content is loaded
            initOwlCarousel();
          });
          return false;			
       });
    });	
 });

// INSERT AND UPDATING

function initOwlCarousel() {
    $('.owl-carousel-one').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
}

function page(page_name){
   $('#content').load(page_name);	
}

function menu_detail(menu_id){
   $('#content').load('menu_detail.php?menu_id='+menu_id);	
}

function menu_category(menu_type){
   $('#content').load('menu_category.php?menu_type='+menu_type);	
}