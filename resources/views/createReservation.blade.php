@extends("master")
@section("content")

<fieldset>
    <div class="mb-3">
        <label for="stade_id">stade :</label><br>
        <select id="stade_id">
            <option value=""></option>
        </select>
        </div>
    <div class="mb-3">
     <label for="dateReservation">Date de Reservation :</label><br>
     <input class="form-control" type="date" id="dateReservation">
     </div>
     <div class="mb-3">
     <label for="heureReservation">Heure de Reservation :</label><br>
     <input class="form-control" type="time" id="heureReservation">
     </div>
     <div class="mb-3">
        <label for="prix">Prix :</label><br>
        <input class="form-control" type="text" id="prix">
        </div>
     <div class="mb-3"><input class="btn btn-primary" type="button" id="ajouter" value="Ajouter"></div>
     
     </fieldset>

     @endsection
     @section("script")
    <script>
            let ajouter = document.querySelector("#ajouter");
            let stade_id = document.querySelector("#stade_id");
            let dateReservation = document.querySelector("#dateReservation");
            let heureReservation = document.querySelector("#heureReservation");
            let prix = document.querySelector("#prix");
            const req = new XMLHttpRequest();
        req.open("GET","http://127.0.0.1:8000/api/stades", true);
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
                "stade_id":stade_id.value,
                "dateReservation":dateReservation.value,
                "heureReservation":heureReservation.value,
                "prix":prix.value
   
            }
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "http://127.0.0.1:8000/api/reservations/save", true);
            xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
            xhr.onload = function () {
                console.log(this.responseText);
            };
            xhr.send(JSON.stringify(data));
            location.href="http://127.0.0.1:83/reservations";
        })
    </script>
     @endsection