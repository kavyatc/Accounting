$(function(){
    setCashBookPartyAsperAccType();
    showHide()
})

$(document).on('change','.trans_type',function(){          
        setCashBookPartyAsperAccType();       
 });


function setCashBookPartyAsperAccType(){
  if($('.trans_type').val()== 'CPY'){           
            $("#account_party").text("Pay To");           
        } else {        
            $("#account_party").text("Pay By");
        }
}


$(document).on('click','.account_party_type',function(){          
        showHide();       
 });


function showHide(){
    if($('.account_party_type').is(':checked')){          
            $(".account_ledgers").show();
            $(".parties").hide();
        } else {           
            $(".account_ledgers").hide();
            $(".parties").show();
        }

        
}


function isNumberKey(evt)
{
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

        return true;
 }





