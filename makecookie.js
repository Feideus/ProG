function Cookpseudo(pseudo)
{
	var pseudonyme = document.getElementById("pseudonyme");
	var name = pseudonyme.value;
	$.cookie("name",pseudonyme.value);
}
