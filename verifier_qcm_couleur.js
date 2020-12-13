
function fond(question)

{  
var parent = document.getElementById(question);
var enfants = parent.getElementsByClassName("juste");

for(var i=0;i<enfants.length;i++)
    {
    enfants[i].style.backgroundColor='rgba(177, 229, 147, 0.959)';
    
    }        
}

