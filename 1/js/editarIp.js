function sub(){
  var ipmudado = []
  var idmudado = []
            $('.ipTr').each(function(e){
              ipmudado.push($(this).text())
            })
            $('.idTr').each(function(e){
              idmudado.push($(this).text())
            })

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

function er(o,id) {
  //no clue what to put here?

  console.log(id)
  var u = 'controller/eraseIp.php'
  var myi = {
    method : 'POST',
    headers: {
    "Accept": "application/json",
    "Content-Type": "application/json"
        },
    body: JSON.stringify({'id': id})      
}

  fetch(u,myi)
  .then(function(response){
    console.log("chegou aqui 2")
    var p=o.parentNode.parentNode;
      p.parentNode.removeChild(p);
    
      $.notify("IP deletado com sucesso","success");
  })
  .catch(function(e){
    console.error(e)
  })

  
}

$('#userid').on('change',function(){

    console.log('value '+$('#userid option:selected').val())
    console.log('text '+$('#userid option:selected').text())
    console.log('index '+$('#userid option:selected').index())

    var nome = $('#userid option:selected').val()

    var url = '../controller/apis/apiEditarIp.php'
    var myinit = {
      method : 'POST',
      headers: {
      "Accept": "application/json",
      "Content-Type": "application/json"
          },
      body: JSON.stringify({'id': nome})      
  }

  
  

  fetch(url,myinit)
  .then(function(response){
          console.log("chegou aqui")
          response.json().then(function(data){
              console.log(data)

              $("#table tr").remove(); 
              var tamanho = data.length
              var reverse = data.reverse
              for(var i=0;i<tamanho;i++){
                var table = document.getElementById("table");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                cell1.innerHTML = "<i class='laptop icon'>"+data[i].id+"</i> ";
                cell2.innerHTML = '<p id="'+data[i].ip+'">'+data[i].ip+'</p>';
                cell2.setAttribute('contentEditable', 'true');
                cell2.classList.add('ipTr');
                cell1.classList.add('idTr');
                cell3.innerHTML = '<div onclick="er(this,'+data[i].id+')"><i class="ui red trash icon"></i></div>'
              }

              
              

              
          })
  })

})