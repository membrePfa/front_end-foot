@extends("master")
@section("content")

<fieldset>
    <div class="mb-3">
     <label for="nom">Nom :</label><br>
     <input class="form-control" type="text" id="nom">
     </div>
     <div class="mb-3"><label for="prenom">Prenom :</label><br>
     <input class="form-control" type="text" id="prenom"></div>
     <div class="mb-3"><label for="adresse">Adresse :</label><br>
     <input class="form-control" type="text" id="adresse"></div>
    <div class="mb-3"> <label for="quartier">Quartier :</label><br>
     <input class="form-control" type="text" id="quartier"></div>
    <div class="mb-3"> <label for="ville">Ville :</label><br>
     <input class="form-control" type="text" id="ville"></div>
    <div class="mb-3"> <label for="email">Email :</label><br>
     <input class="form-control" type="text" id="email"></div>
     <div class="mb-3"><label for="telephone">Telephone :</label><br>
     <input class="form-control" type="text" id="telephone"></div>
     <div class="mb-3"><input class="btn btn-primary" type="button" id="ajouter" value="Ajouter"></div>
 
     </fieldset>

     @endsection
     @section("script")
     <script>
          let ajouter = document.querySelector("#ajouter");
            let nom = document.querySelector("#nom");
            let prenom = document.querySelector("#prenom");
            let adresse = document.querySelector("#adresse");
            let quartier = document.querySelector("#quartier");
            let ville = document.querySelector("#ville");
            let email = document.querySelector("#email");
            let telephone = document.querySelector("#telephone");
        ajouter.addEventListener("click", function(){
            var data = {
                "nom":nom.value,
                "prenom":prenom.value,
                "adresse":adresse.value,
                "quartier":quartier.value,
                "ville":ville.value,
                "email":email.value,
                "telephone":telephone.value
   
            }
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "http://127.0.0.1:8000/api/joueurs/save", true);
            xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
            xhr.onload = function () {
                console.log(this.responseText);
            };
            xhr.send(JSON.stringify(data));
            location.href="http://127.0.0.1:83/joueurs";
        })
     </script>
     @endsection