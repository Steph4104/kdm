//Vérifie si l'input de l'armure est vide
function alertbox(mycheckbox) {
   var element1 = $(mycheckbox).prev('input').val();
    if(element1 != 0){
        $(mycheckbox).attr('checked', false);
    alert('Wow! Il te reste de l\'armure!');
    }
};

//Vérifie sir le checkbox d'avant est cocher    
function alertbox2(mycheckbox) {
     var element1 = $(mycheckbox).prev('input');
   if($(element1).is(':checked')){
       if (mycheckbox.checked){
        alert('SEVERE INJURY!');
            $("#severe_injury_box").show();
            
       }
    }else{
         //alert('Coche l'autre case d'avant toto'); 
          $(mycheckbox).attr('checked', false);
        $("#severe_injury_box").hide();
 
        
      
    }
};


$( document ).ready(function() {
    
    //arms
    $("#arms").change(function() {
        if (($("#armchek1").is(':checked'))|| ($("#armchek2").is(':checked')) ){
            $("#arms").val('0');
        alert('Ta case est cocher, tu peux pas!');
        }
    }); 
    //body
    $("#body").change(function() {
        if (($("#bodychek1").is(':checked'))|| ($("#bodychek2").is(':checked')) ){
            $("#body").val('0');
        alert('Ta case est cocher, tu peux pas!');
        }
    });
    //waist
    $("#waist").change(function() {
        if (($("#waistchek1").is(':checked'))|| ($("#waistchek2").is(':checked')) ){
            $("#waist").val('0');
        alert('Ta case est cocher, tu peux pas!');
        }
    }); 
    //legs
    $("#legs").change(function() {
        if (($("#legschek1").is(':checked'))|| ($("#legschek2").is(':checked')) ){
            $("#legs").val('0');
        alert('Ta case est cocher, tu peux pas!');
        }
    });
});


