function validateForm()
{
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var telephone = document.getElementById('telephone').value;
    var email = document.getElementById('email').value;
    var specialite = document.getElementById('specialite').value;
    var heure_depart = document.getElementById('heure_depart').value;

    // Vérification pour chaque champ
    if (nom.trim() === '') {
        alert('Veuillez saisir un nom');
        return false;
    }
    if (!/^[A-Z][a-zA-Z]*$/.test(nom)) {
        alert('La nom doit commencer par une majuscule et ne peut contenir que des lettres.');
        return false;
    }
    if (prenom.trim() === '') {
        alert('Veuillez saisir un prenom');
        return false;
    }
    if (!/^[A-Z][a-zA-Z]*$/.test(prenom)) {
        alert('La prenom doit commencer par une majuscule et ne peut contenir que des lettres.');
        return false;
    }
    if (telephone === '') {
        alert('Veuillez saisir un numéro de série');
        return false;
    }

    if (telephone.length !== 8) {
        alert('Le numéro de série doit avoir une longueur de 8 caractères');
        return false;
    }

    if (email === '') {
        alert('Veuillez saisir une email');
        return false;
    }

    if (specialite === '') {
        alert('Veuillez saisir une specialite');
        return false;
    }

    if (heure_depart === '') {
        alert('Veuillez saisir une heure');
        return false;
    }

    // Si toutes les vérifications passent, le formulaire est valide
    return true;
}