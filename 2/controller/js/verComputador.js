function table(nome){
  

  var url = 'controller/api/verificaComputador.php'
  var myinit = {
    method : 'POST',
    headers: {
    "Accept": "application/json",
    "Content-Type": "application/json"
        },
    body: JSON.stringify({'id': nome})      
}



$('#vei')
  .dimmer('show')
  ;
  
fetch(url,myinit)
.then(function(response){
        console.log("chegou aqui")
        response.json().then(function(data){
            console.table(data)

            $("#table tr").remove(); 
            var tamanho = data.length
            var reverse = data.reverse
            for(var i=0;i<tamanho;i++){
              var table = document.getElementById("table");
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);
              console.log(data[i].funciona)
              if(data[i].funciona == "1"){
                cell1.innerHTML = "<i class='green circle icon' style='margin-left: 5px;'></i> ";
              }else{
                cell1.innerHTML = "<i class='red circle icon' style='margin-left: 5px;'></i> ";
              }

              
              cell2.innerHTML = '<strong>'+data[i].patrimonio+'</strong>';
              cell2.classList.add('ipTr');
              cell1.classList.add('idTr');
              cell3.innerHTML = '<p>'+data[i].ip+'</p>'
              cell4.innerHTML = '<p>'+data[i].tipo+'</p>'
              cell5.innerHTML = '<p>'+data[i].local+'</p>'
            }

            
            

            $('#vei')
              .dimmer('hide')
            ;
        })
})
}


$('#userid').on('change',function(){

    console.log('value '+$('#userid option:selected').val())
    console.log('text '+$('#userid option:selected').text())
    console.log('index '+$('#userid option:selected').index())

    var nome = $('#userid option:selected').val()

    table(nome)
  
})
