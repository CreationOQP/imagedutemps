function chargementFormulaire() {
	document.getElementById("bouton_envoi").disabled = true;
}

function verificationPassword(a,b) {
	// On récupère les mots de passe dans des variables
	var password1 = document.getElementById('password').value;
	var password2 = document.getElementById('password_bis').value;
	// Comparaison des 2 variables
	if (password1 != password2) {
		window.alert("Les mots de passe ne sont pas identiques, veuillez les retaper !!!")
	}
	else {
		document.getElementById("bouton_envoi").disabled = false;
	}
}