function calcul() {
    
    //movement
    var gear_movement = document.getElementById('gear_movement').value;
    var survivor_movement = document.getElementById('survivor_movement').value;
    var special_movement = document.getElementById('special_movement').value;
    
    if (gear_movement == ""){
    gear_movement = 0;
    }
    
       if (survivor_movement == ""){
    survivor_movement = 0;
    }
    
       if (special_movement == ""){
    special_movement = 0;
    }
resultat = parseInt(gear_movement) + parseInt(survivor_movement) + parseInt(special_movement) + 5;
 document.getElementById('movement').value = resultat;
    
        //accuracy
    var gear_accuracy = document.getElementById('gear_accuracy').value;
    var survivor_accuracy = document.getElementById('survivor_accuracy').value;
    var special_accuracy = document.getElementById('special_accuracy').value;
    
    if (gear_accuracy == ""){
    gear_accuracy = 0;
    }
    
       if (survivor_accuracy == ""){
    survivor_accuracy = 0;
    }
    
       if (special_accuracy == ""){
    special_accuracy = 0;
    }
resultat = parseInt(gear_accuracy) + parseInt(survivor_accuracy) + parseInt(special_accuracy);
 document.getElementById('accuracy').value = resultat;
    
            //strenght
    var gear_strenght = document.getElementById('gear_strenght').value;
    var survivor_strenght = document.getElementById('survivor_strenght').value;
    var special_strenght = document.getElementById('special_strenght').value;
    
    if (gear_strenght == ""){
    gear_strenght = 0;
    }
    
       if (survivor_strenght == ""){
    survivor_strenght = 0;
    }
    
       if (special_strenght == ""){
    special_strenght = 0;
    }
resultat = parseInt(gear_strenght) + parseInt(survivor_strenght) + parseInt(special_strenght);
 document.getElementById('strenght').value = resultat;
    
     //evasion
    var gear_evasion = document.getElementById('gear_evasion').value;
    var survivor_evasion = document.getElementById('survivor_evasion').value;
    var special_evasion = document.getElementById('special_evasion').value;
    
    if (gear_evasion == ""){
    gear_evasion = 0;
    }
    
       if (survivor_evasion == ""){
    survivor_evasion = 0;
    }
    
       if (special_evasion == ""){
    special_evasion = 0;
    }
resultat = parseInt(gear_evasion) + parseInt(survivor_evasion) + parseInt(special_evasion);
 document.getElementById('evasion').value = resultat;
    
     //luck
    var gear_luck = document.getElementById('gear_luck').value;
    var survivor_luck = document.getElementById('survivor_luck').value;
    var special_luck = document.getElementById('special_luck').value;
    
    if (gear_luck == ""){
    gear_luck = 0;
    }
    
       if (survivor_luck == ""){
    survivor_luck = 0;
    }
    
       if (special_luck == ""){
    special_luck = 0;
    }
resultat = parseInt(gear_luck) + parseInt(survivor_luck) + parseInt(special_luck);
 document.getElementById('luck').value = resultat;
}