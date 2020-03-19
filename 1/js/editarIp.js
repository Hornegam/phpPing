function sub(){
  var ipmudado = []
  var idmudado = []
  var tipo = []
            $('.ipTr').each(function(e){
              ipmudado.push($(this).text())
            })
            $('.idTr').each(function(e){
              idmudado.push($(this).text())
            })
            $('.tipoTr').each(function(e){
              tipo.push($(this).val())
            })
            console.table(tipo)
            console.table(ipmudado)
            console.table(idmudado)
            var ur = 'controller/editIp.php'
            var myini = {
              method : 'POST',
              headers: {
              "Accept": "application/json",
              "Content-Type": "application/json"
                  },
              body: JSON.stringify({'ip': ipmudado,
                                    'id': idmudado
              })      
          }

          fetch(ur,myini)
          .then(function(response){
            response.json().then(function(data){
              console.table(data)
              $.notify("IP alterado com sucesso !","success");
            })
          })
          var cell2 = document.getElementById('btnn')
          cell2.classList.remove(...cell2.classList);
          cell2.classList.add("ui","green","button");
}

function er(o,id,tipo) {
  //no clue what to put here?

  console.log(id)
  var u = 'controller/eraseIp.php'
  var myi = {
    method : 'POST',
    headers: {
    "Accept": "application/json",
    "Content-Type": "application/json"
        },
    body: JSON.stringify({'id': id,
                          'tipo': tipo
    })      
}

  fetch(u,myi)
  .then(function(response){
    console.log("chegou aqui 2")
    var p=o.parentNode.parentNode;
      p.parentNode.removeChild(p);
    
      $.notify("IP deletado com sucesso","success");
      window.location.href="#"
  })
  .catch(function(e){
    console.error(e)
  })

  
}

$('#userid').on('change',function(){

    console.log('value '+$('#userid option:selected').val())
    console.log('text '+$('#userid option:selected').text())
    console.log('index '+$('#userid option:selected').index())
    //console.log($('#tipoSelectEditar option:selected').val() )

    var tipo = $('#tipoSelectEditar option:selected').val() 
    var nome = $('#userid option:selected').val() 

    var url = '../controller/apis/apiEditarIp.php'
    var myinit = {
      method : 'POST',
      headers: {
      "Accept": "application/json",
      "Content-Type": "application/json"
          },
      body: JSON.stringify({'id': nome,
                            'tipo': tipo
      })      
  }

  
  

  fetch(url,myinit)
  .then(function(response){
          console.log("chegou aqui")
          response.json().then(function(data){
              console.table(data)
              var s = data.length-1
            if(data[s].tipo==1){
              $("#tabela tr").remove();
              $("#tabela td").remove();  
              var tamanho = data.length
              var reverse = data.reverse
              for(var i=0;i<(tamanho-1);i++){
                var table = document.getElementById("tabela");
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                cell1.innerHTML = "<i class='computer icon'>"+data[i].id+"</i> ";
                cell2.innerHTML = '<p id="'+data[i].ip+'">'+data[i].ip+'</p>';
                cell2.setAttribute('contentEditable', 'true');
                cell2.classList.add('ipTr');
                cell1.classList.add('idTr');
                cell3.innerHTML = '<div onclick="er(this,'+data[i].id+','+data[s].tipo+')"><i class="ui red trash icon"></i></div>'
              }
            }else if(data[s].tipo == 0){
              $("#tabela tr").remove();
              $("#tabela td").remove(); 
              var tamanho = data.length
              var reverse = data.reverse
              for(var i=0;i<(tamanho-1);i++){
                var table = document.getElementById("tabela");
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = "<i class=''>"+data[i].patrimonio+"</i> ";
                cell2.innerHTML = '<p id="'+data[i].ip+'">'+data[i].ip+'</p>';
                cell2.setAttribute('contentEditable', 'true');
                cell2.classList.add('ipTr');
                cell1.classList.add('idTr');
                cell3.innerHTML = '<p id="'+data[s].tipo+'">'+data[i].local+'</p>';
                cell3.classList.add('tipoTr');
                cell4.innerHTML = '<div onclick="er(this,'+data[i].id+','+data[s].tipo+')"><i class="ui red trash icon"></i></div>'
            }
          }   
              

              
          })
  })

})