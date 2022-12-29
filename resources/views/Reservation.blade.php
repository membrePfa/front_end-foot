@extends("master")
@section("content")

   <div class="container"> 
    <div class="row ">
        <a class="btn btn-outline-success col-12 mr-10 ml-10" href="/reservations/add">Ajouter Reservtaion </a>
    </div>
    <table class="table table-striped text-center">
       <thead>
<tr >
    <th class="text-center">Nom de Stade</th>
    <th class="text-center">Date de Reservation</th>
    <th class="text-center">Heure de Reservation</th>
    <th class="text-center">Prix</th>
</tr>
       </thead>
       <tbody id="tbody"></tbody>
            
        
    </table></div>
    <!-- JavaScript Bundle with Popper -->
    @endsection
    @section("script")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script>
          
            let tbody = document.querySelector("#tbody");
            let stade;
            const req = new XMLHttpRequest();
        req.open("GET","http://127.0.0.1:8000/api/reservations", true);
        req.send();
        req.onload = ()=>{
            if(req.status === 200){
                listJo = JSON.parse(req.response);
                console.log(req.response)
                //console.log(listJo);
                listJo.forEach(ply => {
                    
                    tbody.innerHTML += "<tr><td> "+ply.nomStade+"  </td><td> "+ply.dateReservation+"  </td><td> "+ply.heureReservation+"  </td><td> "+ply.prix+"</td><td ><a href='/reservation/"+ply.id+"/edit' class='btn btn-info'  style='border: none'  data-bs-toggle='modal' data-bs-target='#depedit'>Modifier</a><a class='del btn btn-danger' data-id='"+ply.id+"' style='cursor: pointer'>Supprimer</a><a class=' btn btn-primary' data-id='"+ply.id+"' style='cursor: pointer'>Paiement</a></td></tr>";
                });
            }

        }
        tbody.addEventListener('click', function(e){
            let del = e.target.closest('.del');
            if(del){
                req.open("DELETE","http://127.0.0.1:8000/api/reservations/delete/"+del.dataset.id , true);
                req.setRequestHeader('Content-type','application/json; charset=utf-8');

                req.send(null);
                location.reload();
            }
        })

        
        </script>
        @endsection
