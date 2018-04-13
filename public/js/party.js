 function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

        return true;
    }


       
 $(document).on('click','.validate',function(){    
        
    var fields = $('input:checkbox:checked').length;    
         
    if (fields == 0 ) 
    {
    	swal('Please select party type!');
        return false; // The form will *not* submit
    }

    var fields = $('input:radio:checked').length;    
         
    if (fields == 0 ) 
    {
        swal('Please select balance type!');
        return false; // The form will *not* submit
    }
    
 });


