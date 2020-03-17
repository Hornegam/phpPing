        var chart= null;

        function last7Days(d) {
            d = +(d || new Date()), days = [], i=7;
            while (i--) {
              days.push(formatUSDate(new Date(d-=8.64e7)));
            }
            return days;
          }
          var data = new Date();
        console.log(last7Days(data.getDate()))
        
        function grafico(hora,data){
            if(chart != null){
                chart.destroy();
            }   
                var ctx = document.getElementById('myChart').getContext('2d');
                chart = new Chart(ctx, {
                 // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                 data: {
                labels: hora,
                datasets: [{
                label: 'Funcionamento',
                borderColor: 'rgb(30,108,199)',
                data: data
                }]
                },
                
                // Configuration options go here
                options: {}
                })
                
        }
        
        function clearBox(elementID)
        {
            document.getElementById(elementID).innerHTML = "";
        }
        
        var hora = [];
        var work = [];
        ready = (callback) => {
                if (document.readyState != "loading") callback();
                else document.addEventListener("DOMContentLoaded", callback);
        }

        ready(() => {  
                
                var id = document.getElementById('id').value
                //var id = request.getParameter("id");
                console.log(id);
                
                let url = "api.php";
                let myinit = {
                    method : "POST",
                    headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                    },
                    body: JSON.stringify({"id": id})
                }
        var dados = 
        fetch(url, myinit)
        .then(function(response){
            response.json().then(function(dado){
                
                //console.table(dado);
                console.log(dado[0]['hora']);
                
                var horaLength = dado.length;
                
                //console.log(horaLength);
                
                for (var i = 0; i < (horaLength); i++) {
                    hora.push(dado[i]['hora']);
                    work.push(dado[i]['funciona']);
                }
                //console.table(hora);
                //console.table(work);
                
                //Botão de 1 Hora
                document.getElementById('hora').addEventListener('click',function(){
                    //console.table(hora);
                    //console.table(work);
                    var horaLength = dado.length;
                    var data = new Date();
                    var horaa = data.getHours();
                    var min = data.getMinutes();
                    var month = data.getMonth();
                    var dia = data.getDate();
                    var hores = [];
                    var workes = [];
                    console.log(horaa+":"+min);

                    for (var i = 0; i < (horaLength); i++) {
                        var div = hora[i].split(" ");
                        var hour = div[1].split(":");
                        var dataa = div[0].split("-");
                    if( dataa[2] == (dia)&& dataa[1] == month+1){ 
                        if(hour[0] == (horaa-1)){
                            hores.push(hora[i]);
                            workes.push(work[i] );
                        }
                    }    
                        
                    }
                    console.table(hores);
                    console.table(workes);
                    //destroi();
                    grafico(hores,workes);
                    
                }); 

                //Botão de 1 dia
                document.getElementById('dia').addEventListener('click',function(){
                    //console.table(hora);
                    //console.table(work);
                    var horaLength = dado.length;
                    var data = new Date();
                    var dia = data.getDate();
                    var month = data.getMonth();
                    
                    var hores = [];
                    var workes = [];
                    //console.log(dia);
                    //console.log(hora[0]);
                    console.log(month);

                    for (var i = 0; i < (horaLength); i++) {
                        var div = hora[i].split(" ");
                        var dataa = div[0].split("-");
                        if( dataa[2] == (dia)&& dataa[1] == month+1){
                                hores.push(hora[i]);
                                workes.push(work[i] );
                        }
                    }
                    console.table(hores);
                    console.table(workes);
                    //destroi();
                    grafico(hores,workes);
                    
                });

                //Botão de 1 semana
                document.getElementById('semana').addEventListener('click',function(){
                    //console.table(hora);
                    //console.table(work);
                    var horaLength = dado.length;
                    var data = new Date();
                    var dia = data.getDate();
                    var month = data.getMonth();
                    
                    
                    var hores = [];
                    var workes = [];
                    //console.log(dia);
                    //console.log(hora[0]);
                    //console.log(month);
                    var dif = 0;
                    if(dia-7 < 0){
                        dif = 7-dia
                        console.log(31-dif);
                    }

                    for (var i = 0; i < (horaLength); i++) {
                        var div = hora[i].split(" ");
                        var dataa = div[0].split("-");
                        if( dataa[2] == (dia)&& dataa[1] == month+1){
                            hores.push(hora[i]);
                            workes.push(work[i]);
                            console.log(hora[i]);
                        }
                        if(dataa[2]-7 < 0){
                           // console.log("deu erro");
                        }else if(dataa[2]-7 > 0){
                            //if(data[2]>dif || dia>data[2]){
                                hores.push(hora[i]);
                                workes.push(work[i]);
                            //}
                        }else{
                            //console.log("vai denovo");
                        }
                        
                    }
                    //console.table(hores);
                    //console.table(workes);
                    //destroi();
                    grafico(hores,workes);
                    
                });

                //Botão de todos os dias
                document.getElementById('tudo').addEventListener('click',function(){
                   
                    //destroi();
                    
                    grafico(hora,work);
                });

                })}
        ).catch(function(err){
            console.error(err);
        })
        
        
        //console.log(dados);
                

        });


        