function Cookpseudo2(pseudo)
{
	var pseudonyme = document.getElementById("LeNom");
	var name = pseudonyme.value;
	$.cookie("namereceveur",pseudonyme.value);
}

/*A utiliser quand on clique sur valider quand on  dit le nom de a qui on veut parler*/
