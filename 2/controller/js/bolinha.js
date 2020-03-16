  
      function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

    var date = []

    function getData(){
        ready = (callback) => {
            if (document.readyState != "loading") callback();
            else document.addEventListener("DOMContentLoaded", callback);
        }
        ready(() => {
            let url = "controller/api/apiBolinhaBtn.php";
            let myinit = {
                method : 'POST',
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }      
            }
            fetch(url,myinit)
            .then(function(response){
                response.json().then(function(data){
                    console.table(data)
                    
                    var tamanho = data.length
                //console.log(tamanho)
                var funciona = 0
                var nfunciona = 0
                data.forEach(function(data){
                    if(data.funciona == data.tamanho){
                        var nome = "#"+data.escola
                        $(function() {
                            $(nome).removeClass('right floated red sync icon').addClass('right floated green circle icon');
                        });
                        //console.log("Tudo funciona na escola : "+data.escola)
                        funciona = data.funciona+funciona
                    }else if(data.funciona > 0 && data.funciona < data.tamanho){
                        var nome = "#"+data.escola
                        $(function() {
                            $(nome).removeClass('right floated red sync icon').addClass('right floated yellow circle icon');
                        });
                        //console.log("Ta mais ou menos na escola : "+data.escola)
                        funciona = data.funciona+funciona
                        nfunciona = nfunciona+(data.tamanho-data.funciona)
                    }else if(data.funciona == 0){
                        var nome = "#"+data.escola
                        $(function() {
                            $(nome).removeClass('right floated red sync icon').addClass('right floated red circle icon');
                        });
                        //console.log("Não ta pegando na escola : "+data.escola)
                        nfunciona = nfunciona+data.tamanho
                    }
                })

                    date = data     
                    console.log("Estão ligados - "+funciona)
                    console.log("Não estão ligados ou estão sem internet - "+nfunciona)
                })
            })




        })



    }
    getData()
    setInterval(getData,30000)

    function cl(id){
                            $('.ui.modal')
                            .modal('refresh')
                            .modal('setting', 'transition', 'horizontal flip')
                            .modal('show')
                            var funcionaLab = 0
                            var funcionaSala = 0
                            var funcionaOutro = 0
                            var tamanho = 0
                            var lab = 0
                            var sala = 0
                            var outros = 0
                            for(var i =0;i<date.length;i++){
                                
                                if(date.escola == id){
                                for(var j = 0;j<date[i].local.length;j++){
                                    if(date[i].local[j].local == "LAB"){
                                        //console.log("LAB1")
                                        if(date[i].local[j].funfa == "1"){
                                            funcionaLab = funcionaLab+1
                                            //console.log("LAB2")
                                            lab = lab+1
                                        }else{
                                            lab = lab+1
                                            //console.log("LAB3")
                                        }
                                    }else if(date[i].local[j].local == "SALA DE AULA"){
                                        //console.log("SALA1")
                                        if(date[i].local[j].funfa == "1"){
                                            funcionaSala = funcionaSala+1
                                            //console.log("SALA2")
                                            sala = sala+1
                                        }else{
                                            //console.log("SALA3")
                                            sala = sala+1
                                        }
                                    }else{
                                        if(date[i].local[j].funfa == "1"){
                                            //console.log("OUTROS")
                                            funcionaOutro = funcionaOutro+1
                                            outros = outros+1
                                        }else{
                                            //console.log("OUTROS1")
                                            outros = outros+1
                                        }
                                        
                                    }
                                    
                                }
                                
                            }
                            
                            }
                            console.log("Funcionando - "+funcionaLab+" - Totais no lab "+lab)
                            console.log("Funcionando - "+funcionaSala+" - Totais na sala "+sala)
                            console.log("Funcionando - "+funcionaOutro+" - Totais em outros Lugares "+outros)
                            console.log(id)
                            if(funcionaLab == lab){
                                var nome = "#lab"
                                $(function() {
                                    $("#lab").removeClass('large red sync middle aligned icon').addClass('large green circle middle aligned icon');
                                });
                            }else if(funcionaLab == 0){
                                var nome = "#lab"
                                $(function() {
                                    $("#lab").removeClass('large red sync middle aligned icon').addClass('large red circle middle aligned icon');
                                });
                            }else{
                                var nome = "#lab"
                                $(function() {
                                    $("#lab").removeClass('large red sync middle aligned icon').addClass('large yellow circle middle aligned icon');
                                });
                            }

                            if(funcionaSala == sala){
                                var nome = "#sala"
                                $(function() {
                                    $("#sala").removeClass('large red sync middle aligned icon').addClass('large green circle middle aligned icon');
                                });
                            }else if(funcionaSala == 0){
                                var nome = "#sala"
                                $(function() {
                                    $("#sala").removeClass('large red sync middle aligned icon').addClass('large red circle middle aligned icon');
                                });
                            }else{
                                var nome = "#sala"
                                $(function() {
                                    $("#sala").removeClass('large red sync middle aligned icon').addClass('large yellow circle middle aligned icon');
                                });
                            }

                            if(funcionaOutro == outros){
                                var nome = "#outro"
                                $(function() {
                                    $("#outros").removeClass('large red sync middle aligned icon').addClass('large green circle middle aligned icon');
                                });
                            }else if(funcionaOutro == 0){
                                var nome = "#outro"
                                $(function() {
                                    $("#outros").removeClass('large red sync middle aligned icon').addClass('large red circle middle aligned icon');
                                });
                            }else{
                                var nome = "#outro"
                                $(function() {
                                    $("#outros").removeClass('large red sync middle aligned icon').addClass('large yellow circle middle aligned icon');
                                });
                            }


                            //$('#desc').html();
    }


