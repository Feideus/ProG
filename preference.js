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

function changeColor(color)
{
	document.body.style.backgroundColor = color;
}

function changeColor2(color)
{
	document.body.style.color = color;
}

var a = getCookie("color");
var b = getCookie("color1");
//alert(a);
//alert(b);
changeColor(a);
changeColor2(b);
