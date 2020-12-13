
function voirresultat(div,tag1,tag2)
	
	{  
        var x = document.getElementById(div).getElementsByTagName(tag1);
        var y = document.getElementById(div).getElementsByTagName(tag2);
        var i = 0;
       
        for (i = 0; i < x.length; i++)
         {
                 
                    if(x[i].value =="vrai")
                    {
                      /* y[i].style.backgroundColor ='green'; */
                      /* y[i].setAttribute("style", "color:green");*/
                       y[i].setAttribute("class", "vraiclass");
                    }
                    else
                    {
                       /* y[i].style.backgroundColor ='red';*/   
                        y[i].setAttribute("class", "fautclass");
                    }            
         }      
    }

    function annulervoirresultat(div,tag1,tag2)
	
	{  
        var x = document.getElementById(div).getElementsByTagName(tag1);
        var y = document.getElementById(div).getElementsByTagName(tag2);
        var i = 0;
       
        for (i = 0; i < x.length; i++)
         {
                          
                       y[i].setAttribute("class", "");
                     
         }      
    }
    