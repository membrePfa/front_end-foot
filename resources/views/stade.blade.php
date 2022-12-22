@extends("master")
@section("content")

   <div class="container"> 
    <div class="row ">
        <a class="btn btn-outline-success col-12 mr-10 ml-10" href="stade/add">Ajouter Stade </a>
    </div>
    <table class="table table-striped text-center">
       <thead>
<tr >
    <th class="text-center">nom</th>
    <th class="text-center">capacite</th>
    <th class="text-center">disponibilite</th>

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
            const req = new XMLHttpRequest();
        req.open("GET","http://127.0.0.1:8000/api/stades", true);
        req.send();
        req.onload = ()=>{
            if(req.status === 200){
                listJo = JSON.parse(req.response);
                //console.log(listJo);
                listJo.forEach(ply => {
                    tbody.innerHTML += "<tr><td> "+ply.nom+"  </td><td> "+ply.capacite+"  </td><td> "+ply.disponibilite+"  </td><td ><a href='/stade/"+ply.id+"/edit' class='btn btn-info'  style='border: none'>Modifier</a><a class='del btn btn-danger' data-id='"+ply.id+"' style='cursor: pointer'>Supprimer</a><a href='/reservations/add' class='btn btn-primary' style='cursor: pointer' >Reserver</a></td></tr>";
                });
            }

        }
      

        tbody.addEventListener('click', function(e){
            let del = e.target.closest('.del');
            if(del){
                req.open("DELETE","http://127.0.0.1:8000/api/stades/delete/"+del.dataset.id , true);
                req.setRequestHeader('Content-type','application/json; charset=utf-8');

                req.send(null);
                location.reload();
            }
        })


        
        </script>
        @endsection
