@extends("master")
@section("content")

<fieldset>
    <div class="mb-3">
        <label for="joueur_id">Joueur :</label><br>
        <select id="joueur_id">
            <option value=""></option>
        </select>
        </div>
    <div class="mb-3">
     <label for="numero_de_carte">Numero de Carte :</label><br>
     <input class="form-control" type="text" id="numero_de_carte">
     </div>
     <div class="mb-3">
     <label for="date_expirationcarte">Date Expiration de Carte :</label><br>
     <input class="form-control" type="date" id="date_expirationcarte">
     </div>
     <div class="mb-3">
        <label for="code_cvv">Code Cvv :</label><br>
        <input class="form-control" type="text" id="code_cvv">
        </div>
     <div class="mb-3"><input class="btn btn-primary" type="button" id="ajouter" value="Ajouter"></div>
     
     </fieldset>

     @endsection
     @section("script")
    <script>
            let ajouter = document.querySelector("#ajouter");
            let joueur_id = document.querySelector("#joueur_id");
            let numero_de_carte = document.querySelector("#numero_de_carte");
            let date_expirationcarte = document.querySelector("#date_expirationcarte");
            let code_cvv = document.querySelector("#code_cvv");
            const req = new XMLHttpRequest();
        req.open("GET","http://127.0.0.1:84/api/joueurs", true);
        req.send();
        req.onload = ()=>{
            if(req.status === 200){
                listJo = JSON.parse(req.response);
                //console.log(listJo);
                listJo.forEach(ply => {
                    stade_id.innerHTML += "<option value='"+ply.id+"'>"+ply.nom+"</option>"
                });
            }

        }

        ajouter.addEventListener("click", function(){
            var data = {
                "joueur_id":joueur_id.value,
                "numero_de_carte":numero_de_carte.value,
                "date_expirationcarte":date_expirationcarte.value,
                "code_cvv":code_cvv.value
   
            }
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "http://127.0.0.1:84/api/paiements/save", true);
            xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
            xhr.onload = function () {
                console.log(this.responseText);
            };
            xhr.send(JSON.stringify(data));
            location.href="http://127.0.0.1:83/paiements";
        })
    </script>
     @endsection