@extends("master")
@section("content")

<fieldset>
    <div class="mb-3">
        <label for="nom">nom :</label><br>
        <input class="form-control" type="text" id="nom">
        </div>
    <div class="mb-3">
     <label for="capacite">capacite :</label><br>
     <input class="form-control" type="text" id="capacite">
     </div>
     <div class="mb-3"><label for="disponibilite">disponibilite :</label><br>
        <select id="disponibilite">
     <option value="oui">Oui</option>
    </select><br>
    </div>
        
     <div class="mb-3"><input class="btn btn-primary" type="button" id="ajouter" value="Ajouter"></div>
 
     </fieldset>

     @endsection
     @section("script")
     <script>
          let ajouter = document.querySelector("#ajouter");
          let nom = document.querySelector("#nom");
            let capacite = document.querySelector("#capacite");
            let disponibilite = document.querySelector("#disponibilite");
          
        ajouter.addEventListener("click", function(){
            var data = {
                "nom":nom.value,
                "capacite":capacite.value,
                "disponibilite":disponibilite.value
   
            }
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "http://127.0.0.1:82/api/stades/save", true);
            xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
            xhr.onload = function () {
                console.log(this.responseText);
            };
            xhr.send(JSON.stringify(data));
            location.href="http://127.0.0.1:83/stade";
        })
     </script>
     @endsection