<!DOCTYPE html>
<html>
  <head>
    <title>RDV</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <!DOCTYPE html>
<html lang="en">
<head>
    <title>RDV</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <style>
      body
{
  background-color:lightseagreen
}
#body_header
{

  width:auto;
  margin:0px auto;
  text-align:center;
  font-size:25px;
}
form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: auto;
  outline: 0;
  padding: 8px;
  width: 100%;
  background-color: #e8eeef;
  color: black;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"]

{
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightseagreen;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: lightseagreen;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}



  form {
    max-width: 480px;
  }


       

    </style>
</head>

  <body>
  <body>
  <div id="container">
    <!--This is a division tag for body container-->
    <div id="body_header">
      <!--This is a division tag for body header-->
      <h1>Appointment Request Form</h1>
      <p>Make your appointments more easier</p>

    </div>
    <div class="testbox">
      <form action="addrdv.php" method="post">
        <br/>
        
       <fieldset>
    <legend><span class="number">1</span>Appointment Details</legend>
  <div class="item">
            <label for="idrdv"> id rdv<span></span></label>
            <input id="id" type="text" name="id" />
          </div>
  <script>
 function verif() {
    var idrdv = document.getElementById("idrdv").value;
    var idu = document.getElementById("idu").value;
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;

    if (idrdv === "") {
        alert("id obligatoire");
        return false;
    } else if (date === "") {
        alert("Date obligatoire");
        return false;
    } else if (idu === "") {
        alert("Contrainte vide");
        return false;
    }

    // Reste du code à exécuter si toutes les vérifications sont passées
    return true;
}


     function specialties() {
      var specialty = document.getElementById("specialty").value;
      var physicianList = document.getElementById("physicianList");
      var id = document.getElementById("id").value;
     physicianList.innerHTML = "";
      switch (specialty) {
        case "cardio":
          addOption(physicianList, "Dr. MHAMLI");
          addOption(physicianList, "Dr.BELAOUER Amina");
          break;
       case "Diabétologue":
          addOption(physicianList, "Dr. NADIA JENHANI");
          addOption(physicianList, "Dr.SALIMA AKROUT ");
          addOption(physicianList, "Dr.cyrine Danguir");
          break;
        case "Chirurgien orthopédiste":
          addOption(physicianList, "Dr. Hamadi BEN HAMIDA");
          addOption(physicianList, "Dr.HAYKEL BEN AMOR ");
          addOption(physicianList, "Dr. Karim BEN AICHA");
          addOption(physicianList, "Dr. khaled HADHRI ");
          break;
        case "radiologue":
          addOption(physicianList, "Dr. Sami SAID");
          addOption(physicianList, "Dr. Ines BEN HASSEN");
          addOption(physicianList, "Dr.NESRINE BOUCHNAK");
          addOption(physicianList, "Dr.Hella SAID ABDELHADI");
          addOption(physicianList, "Dr.Sofien MILEDI");
          break;
        case "Nutritioniste":
          addOption(physicianList, "Dr. NADIA JENHANI");
          addOption(physicianList, "Dr. YOSRA BORNAZ");
          addOption(physicianList, "Dr.MARIEM CHARGUI");
          addOption(physicianList, "Dr.EMNA AYADI");
          break;
       case "Ophtalmologue":
          addOption(physicianList, "Dr. Sofien Ben Amor");
          addOption(physicianList, "Dr. Mondher BACCAR");
          addOption(physicianList, "Dr.Fatma AMARA");
          addOption(physicianList, "Dr.Bassem GRISSA");
          addOption(physicianList, "Dr.Moez HAMMAMI");
          break;
      case "Dentiste":
          addOption(physicianList, "Dr.Marwa KACEM");
          addOption(physicianList, "Dr. Wassim GUEZGUEZ");
          addOption(physicianList, "Dr.Hela SHILI");
          addOption(physicianList, "Dr.OUMAIMA KOCHAT");
          addOption(physicianList, "Dr.Chedly BRAHEM");
          break;
          case "Gastro":
          addOption(physicianList, "Dr.Baha BEN SLIMANE");
          addOption(physicianList, "Dr. Cyrine MAKNI MEHREZ");
          addOption(physicianList, "Dr.kamel ELMIR");
          addOption(physicianList, "Dr.Mahe BEN YEDDER");
          addOption(physicianList, "Dr.Kaouther EL JERI");
          break;
     default:
          addOption(physicianList, "Select a Specialty First");}
    }

    function addOption(select, text) {
      var option = document.createElement("option");
      option.text = text;
      select.add(option);
    }
     function cancel() {
        alert("Opération annulée !");
    }
 </script>
 
  <div class="item">
    <label for="specialty">Specialty</label>
    <select id="specialty" name="specialty"onchange="specialties()">
      <option value="cardio">Cardio</option>
      <option value="Chirurgien orthopédiste">Chirurgien orthopédiste</option>
       <option value="Diabétologue">Diabétologue</option>
        <option value="Nutritioniste">Nutritioniste</option>
          <option value="Orthophoniste">Orthophoniste</option>
           <option value="Gynécologue">Gynécologue</option>
            <option value="Ophtalmologue">Ophtalmologue</option>
             <option value="Dentiste">Dentiste</option>
              <option value="Nephrologue">Nephrologue</option>
               <option value="Gastro">Gastro</option>
                <option value="radiologue">radiologue</option>
                 <option value="Médecin géneraliste">Médecin géneraliste</option>
                  <option value="Interniste">Interniste</option>
                   <option value="Cancérologue">Cancérologue/option>
                    <option value="Pédiatre">Pédiatre</option>
                     <option value="Chirurgien cardio_vasculaire">Chirurgien cardio_vasculaire</option>
                       <option value="Angiologue">Angiologue</option>
                         <option value="Anéesthésiste-Réanimateur">Anéesthésiste-Réanimateur</option> </select>
  </div>
   <div class="item">
    
        <label for="physicianList">Physician List</label>
        <select id="physicianList" name="physicianList">
        </select>
      </div>
      <label for="appointment_description">Appointment Description:</label>

<textarea id="appointment_description" name="appointment_description" placeholder=" cause of the appointement."></textarea>
<label for="date">Date*:</label>
<input type="date" name="date" value="" required></input>
<br>
<label for="time">Time*:</label>
<input type="time" name="time" value="" required></input>
<br>
<legend><span class="number">2</span> User information</legend>
  <div class="item">
            <label for="idu"> Id user<span></span></label>
            <input id="idu" type="text" name="idu" />
          </div>
</fieldset>
<div class="btn-block">
  <button type="submit" value="submit" onclick="verif()">Submit</button>
<div class="btn-block">
    <button type="button" onclick="cancel()">Cancel</button>
</div>
</form>
<script> specialties()</script>
</body>
</html>
</div>
