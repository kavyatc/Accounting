$(document).on('change','.status',function(){          
        showHide();       
 });


$(function(){
    showHide();
})


function showHide(){
    if($('.status').val()== "5"){
         
            $(".TransEmployee_data").show();
        } else {
           
            $(".TransEmployee_data").hide();
        }
}