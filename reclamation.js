function isAlpha(ch){
	ch=ch.toUpperCase();
	for (i=0;i<ch.length;i++)
			if((ch.charAt(i)<'A')||(ch.charAt(i)>'Z'))
				return false;
	return true;
}
function verif1() {
     c= F.cin.value;
     p=F.pseudo.value;
     if((p.length== 0)||(!isAlpha(p))&&(!isNaN(p))){
        alert("le pseudo est vide ");
        return false;
     }

    if (c.length !== 8 || (c.charAt(0) !== "0" && c.charAt(0) !== "1")) {
        alert("Veuillez vérifier votre CIN !");
        return false;
    }
    if(F.D1.options.selectedIndex==0)
	{
		alert("Veuillez sélectionner un type de réclamation");
		return false;
	}
}