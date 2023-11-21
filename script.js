
function validateForm()  {
    let x = document.forms["myForm"]["typer"].value;
    if (x == "") {
        alert("type must be filled out");
        return false;
    }
    let Y = document.forms["myForm"]["nom"].value;
    if (Y == "") {
        alert("nom must be filled out");
        return false;
    }

    let Z = document.forms["myForm"]["prix"].value;
    if (Z.trim() === "" ) {
        alert("prix must be filled out with at least three words");
        return false;
    }
    
}