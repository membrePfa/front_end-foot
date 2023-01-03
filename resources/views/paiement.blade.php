@extends("master")
@section("content")

   <div class="container"> 
    <div class="row ">
    </div>
    <table class="table table-striped text-center">
       <thead>
<tr >
    <th class="text-center">Nom de joueur</th>
    <th class="text-center">Numero de Carte</th>
    <th class="text-center">Date Expiration de Carte</th>
    <th class="text-center">Code Cvv</th>
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
        req.open("GET","http://127.0.0.1:84/api/paiements", true);
        req.send();
        req.onload = ()=>{
            if(req.status === 200){
                listJo = JSON.parse(req.response);
                console.log(req.response)
                //console.log(listJo);
                listJo.forEach(ply => {
                    
                    tbody.innerHTML += "<tr><td> "+ply.nomJoueur+"  </td><td> "+ply.numero_de_carte+"  </td><td> "+ply.date_expirationcarte+"  </td><td> "+ply.code_cvv+"</td><td ><a href='/paiement/"+ply.id+"/edit' class='btn btn-info'  style='border: none'  data-bs-toggle='modal' data-bs-target='#depedit'>Modifier</a><a class='del btn btn-danger' data-id='"+ply.id+"' style='cursor: pointer'>Supprimer</a></td></tr>";
                });
            }

        }
        tbody.addEventListener('click', function(e){
            let del = e.target.closest('.del');
            if(del){
                req.open("DELETE","http://127.0.0.1:84/api/paiements/delete/"+del.dataset.id , true);
                req.setRequestHeader('Content-type','application/json; charset=utf-8');

                req.send(null);
                location.reload();
            }
        })

        
        </script>
        @endsection
