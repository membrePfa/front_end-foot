@extends("master")
@section("content")

   <div class="container"> 
    <div class="row ">
        <a class="btn btn-outline-success col-12 mr-10 ml-10" href="/add">Ajouter Joueur </a>
    </div>
    <table class="table table-striped text-center">
       <thead>
<tr >
    <th class="text-center">nom</th>
    <th class="text-center">prenom</th>
    <th class="text-center">email</th>
    <th class="text-center">adresse</th>
    <th class="text-center">telephone</th>
    <th class="text-center">ville</th>
    <th class="text-center">quartier</th>
    <th class="text-center">action</th>

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
        req.open("GET","http://127.0.0.1:8000/api/joueurs", true);
        req.send();
        req.onload = ()=>{
            if(req.status === 200){
                listJo = JSON.parse(req.response);
                //console.log(listJo);
                listJo.forEach(ply => {
                    tbody.innerHTML += "<tr><td> "+ply.nom+"  </td><td> "+ply.prenom+"  </td><td> "+ply.email+"</td><td> "+ply.adresse+"</td><td>"+ply.telephone+"</td><td>"+ply.ville+"</td><td> "+ply.quartier+"  </td><td ><a href='/joueur/"+ply.id+"/edit' class='btn btn-info'  style='border: none'  data-bs-toggle='modal' data-bs-target='#depedit'>Modifier</a><a class='del btn btn-danger' data-id='"+ply.id+"' style='cursor: pointer'>Supprimer</a></td></tr>";
                });
            }

        }
        
        </script>
        @endsection
