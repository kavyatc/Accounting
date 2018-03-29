$(document).on('click','.assigned',function(){          
        showHide();       
 });


$(function(){
	showHide();
})


function showHide(){
	if($('.assigned').is(':checked')){
          
            $(".employee_data").show();
        } else {
        	
            $(".employee_data").hide();
        }

        
}