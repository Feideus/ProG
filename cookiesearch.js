function Cookpseudo3(pseudo)
{
	var pseudonyme = document.getElementById("namesearch");
	var name = pseudonyme.value;
	$.cookie("namesearch",pseudonyme.value);
}