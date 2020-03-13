

<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoramento de Roteadores - SEDUC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" type="text/css" href="../semantic/semantic.min.css">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="../semantic/semantic.min.js"></script>
    <style>
    .ui.card,
    .ui.cards>.card {
    background-color: #2185d0;
    }

    </style>
</head>
<body>
  <div class="ui blue menu">
  <a class="item">
    <i class="sidebar icon"></i>
  </a>
  <div style="width:350vh; margin:0 auto;">
      <div id="roteadores" style="width:350vh; margin:0 auto;"></div>
      <div id="nroteadores" style="width:350vh; margin:0 auto;"></div>
  </div>
</div>
<div class="ui bottom attached segment">
        <div class="ui blue sidebar blue inverted blue vertical blue menu">
          <div class="item">
             <img src="info_logo.png">
          </div>
          <div class="item">
              <h3><center>Monitoramento de Roteadores</center></h3>
          </div>
      <div>  
      <div class="row">
            <div class="column">
              <form action="../0" method="post">
                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="server icon"></i>Roteadores</a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
              <form action="../2" method="post">
                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="sitemap icon"></i>Sala de Aula</a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
              <form action="../3" method="post">
                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="desktop icon"></i>Laboratórios</a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
              <form action="../1" method="post">
                  <input type="hidden" name="teste" value=""/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="cog icon"></i> Opções     </a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
              <form action="../login" method="post">
                  <input type="hidden" name="teste" value=""/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="sign-out icon"></i>Sair      </a>
              </form>
            </div>
        </div>
          
          
  </div>
  
</div>

<div class="ui three column centered grid" style="padding-left: 10px; padding-right: 10px;">
    <div class="six column centered row" >
    <div class="ui modal" id="desc">
    <div class="header" id="head">Adolfina Leonor</div>
                                        <div class="content"><div class="ui relaxed divided list">
                            <div class="item">
                                <i class="large red sync middle aligned icon" id=sala name="sala"></i>
                                <div class="content">
                                <a class="header">Salas de Aula</a>
                                <div class="description">Updated 10 mins ago</div>
                                </div>
                            </div>
                            <div class="item">
                                <i class="large red sync middle aligned icon" id="lab" name="lab"></i>
                                <div class="content">
                                <a class="header">Laboratório de Informática</a>
                                <div class="description">Updated 22 mins ago</div>
                                </div>
                            </div>
                            <div class="item">
                                <i class="large red sync middle aligned icon" id="outros" name="outros"></i>
                                <div class="content">
                                <a class="header">Outros Computadores</a>
                                <div class="description">Updated 34 mins ago</div>
                                </div>
                            </div>
                            </div></div>
    </div>
    <div class="ui primary test button" onclick="cl(this.name)" name="Adolfina">Adolfina
        <i class="right floated red sync icon" id="156"></i>
    </div>
    <div class="ui primary test button" onclick="cl(this.name)" name="Ujio">Teste
        <i class="right floated red sync icon" id="178"></i>
    </div>
    <div class="ui primary test button" onclick="cl(this.name)" name="Corona">Poxa
        <i class="right floated red sync icon" id="195"></i>
    </div>
    

</div>
</div>
  <!--    
  <script src="../view/js/apiBolinhaJs.js"></script>
            -->            
  <script>
    $('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  })
  .sidebar('attach events', '.menu .item');
  </script>
  <script>
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
                    console.log("Estão ligados ou estão sem internet - "+funciona)
                    console.log("Não estão ligados ou estão sem internet - "+nfunciona)
                })
            })




        })



    }
    getData()
    setInterval(getData,30000)

    function cl(id){
                            $('.ui.modal')
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



  </script>
</body>
</html>