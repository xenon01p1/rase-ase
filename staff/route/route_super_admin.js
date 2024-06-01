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