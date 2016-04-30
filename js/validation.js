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
     alert('SEVERE INJURY!');
    }else{
        alert('Coche l\'autre case avant toto');
          $(mycheckbox).attr('checked', false);
    }
};