function getCookie(sName) 
{
        var cookContent = document.cookie, cookEnd, i, j;
        var sName = sName + "=";
 
        for (i=0, c=cookContent.length; i<c; i++) {
                j = i + sName.length;
                if (cookContent.substring(i, j) == sName) {
                        cookEnd = cookContent.indexOf(";", j);
                        if (cookEnd == -1) {
                                cookEnd = cookContent.length;
                        }
                        //alert(decodeURIComponent(cookContent.substring(j, cookEnd)));
                        return decodeURIComponent(cookContent.substring(j, cookEnd));
                }
        }       
        return null;
}

function getNom()
{
     
     var NameHost = getCookie("name");
     var xhr = new XMLHttpRequest();
     var tmp =  document.getElementById("LeNom");
     var res =  tmp.value;
    
     xhr.onreadystatechange = function() 
      {
	 if (xhr.readyState == 4 && xhr.status == 200) 
	 {  
	       document.getElementById("zoneMessage").innerHTML = xhr.responseText;
         }     
      };
      xhr.open("POST", "AfficherMessages.php", true);
      xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      xhr.send("LeNomDest="+res+"&NameHost="+NameHost);
     
      
}

 var timer=setInterval("getNom()", 500);

function EnvoisMP()
{
     var xhr = new XMLHttpRequest();
     var tmp =  document.getElementById("zoneEnvois");
     var res =  tmp.value;
     xhr.onreadystatechange = function() 
      {
	 if (xhr.readyState == 4 && xhr.status == 200) 
	 {  
	       document.getElementById("zoneEnvois").innerHTML = "";
         }     
      };
      xhr.open("POST", "postmp.php", true);
      xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      xhr.send("LeMessage="+res);
     
}







    
