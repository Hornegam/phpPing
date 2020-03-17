function addRow(){
    var table = document.getElementById("teste");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    cell1.setAttribute('contentEditable', 'true');
    var cell2 = row.insertCell(1);
    cell2.setAttribute('contentEditable', 'true');
    var cell3 = row.insertCell(2);
    cell3.setAttribute('contentEditable', 'true');
    var cell4 = row.insertCell(3);
    cell4.setAttribute('contentEditable', 'true');
    var cell5 = row.insertCell(4);
    cell5.innerHTML = `<div>
          <div onclick="addRow()">
            <i class="green plus square icon"></i>
          </div>
          <div onclick="era(this)">
            <i class="red trash icon"></i>
          </div>
        </div>`
    cell1.classList.add('patrimonioTr');
    cell2.classList.add('ippTr');
    cell3.classList.add('tipoTr');
    cell4.classList.add('localTr');
  }

function era(){
var table = document.getElementById("teste");
var row = table.deleteRow(-1);
}

function submi(){
ready = (callback) => {
if (document.readyState != "loading") callback();
else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {  

var ip = []
var tipo1 = []
var patrimonio = []
var local = []

$('.ippTr').each(function(e){
  ip.push($(this).text())
})
$('.tipoTr').each(function(e){
  tipo1.push($(this).text())
})
$('.localTr').each(function(e){
  local.push($(this).text())
})
$('.patrimonioTr').each(function(e){
  patrimonio.push($(this).text())
})
/*
console.table(ip)
console.table(local)
console.table(patrimonio)
console.table(tipo1)
console.table(id)
console.table(tipo)
*/
var ur = 'controller/addIp.php'
var myini = {
  method : 'POST',
  headers: {
  "Accept": "application/json",
  "Content-Type": "application/json"
      },
  body: JSON.stringify({'ip': ip,
                        'tipo': tipo1,
                        'patrimonio': patrimonio,
                        'local': local,
                        'modo' : tipo,
                        'id' : id
  })      
}

fetch(ur,myini)
.then(function(response){
response.json().then(function(data){
  console.table(data);
  var tamanho = data.length
  for(var i=0;i<tamanho;i++){
    if(data[i].done == 0){
      $.notify("IP "+data[i].ip+" não adicionado !","error");
    }else{
      $.notify("IP "+data[i].ip+" adicionado com sucesso !","success");
    }
  }
})


})

})
}
var tipo = null
var id = null

$('#tipoSelect').on('change',function(){
console.log('value '+$('#tipoSelect option:selected').val())
tipo = $('#tipoSelect option:selected').val()
})

$('#escola').on('change',function(){
console.log('value '+$('#escola option:selected').val())
id = $('#escola option:selected').val()
})