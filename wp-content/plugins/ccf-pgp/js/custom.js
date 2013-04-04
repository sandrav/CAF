var $j= jQuery.noConflict();
$j(document).ready(function() {
      
     $j('input[type="radio"][name="opciones_debito"]').change(function() {
         if (this.value=="otro"){
           $j('input[type="text"][name="monto_otro"]:first').removeAttr('disabled');
         }else{
           $j('input[type="text"][name="monto_otro"]').attr('disabled','disabled');
         }
     });
     $j('select[name="forma_pago"]').change(function() {
             if (this.value=="credito"){
               $j('option[value="visaelectron"]').attr('disabled','disabled');
               $j('option[value="visaelectron"]').removeAttr('selected');
               
               $j('option[value="amex"]').removeAttr('disabled');
               $j('option[value="mastercard"]').removeAttr('disabled');
               $j('option[value="visa"]').removeAttr('disabled');
               
             }else{
               $j('option[value="visaelectron"]').removeAttr('disabled');
               $j('option[value="amex"]').attr('disabled','disabled');
               $j('option[value="amex"]').removeAttr('selected');
               $j('option[value="mastercard"]').attr('disabled','disabled');
               $j('option[value="mastercard"]').removeAttr('selected');
               $j('option[value="visa"]').attr('disabled','disabled');
               $j('option[value="visa"]').removeAttr('selected');
             }
     });
    $j('select[name="forma_pago"]').val("credito");
    $j('select[name="forma_pago"]').change(); 
});
