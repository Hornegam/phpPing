<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
</head>
<body>
    <div style="width: 100%; height: 100%;"><canvas id="myChart"></canvas></div>
    mano
    <input type="hidden" id="id" value="<?= $_POST['id'] ?>">
    <script>
        ready = (callback) => {
                if (document.readyState != "loading") callback();
                else document.addEventListener("DOMContentLoaded", callback);
        }

        ready(() => { 
                
                var id = document.getElementById('id').value
                //var id = request.getParameter("id");
                console.log(id);

                let url = 'api.php';
        var dados = 
         fetch(url, {
            method : 'POST',
            headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
                },
                body: JSON.stringify({'id': id})
            })
        .then(function(response){
            response.json().then(function(dado){
                console.table(dado);
                console.log(dado[0]['hora']);

                var horaLength = dado.length;
                var hora = [];
                var work = [];
                console.log(horaLength);
                for (var i = 0; i < (horaLength); i++) {
                    hora.push(dado[i]['hora']);
                    work.push(dado[i]['funciona']);
                }
                console.table(hora);
                console.table(work);

                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                 // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                 data: {
                labels: hora,
                datasets: [{
                label: 'Funcionamento',
                borderColor: 'rgb(57, 255, 20)',
                data: work
                }]
                },

                // Configuration options go here
                options: {}
                })
                })}
        )
        .catch(function(err){
            console.error(err);
        })
        
        
        //console.log(dados);
                

        });


        
   </script>
</body>
</html>
