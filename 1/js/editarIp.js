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
                cell1.innerHTML = "<i class='laptop icon'>"+i+"</i> ";
                cell2.innerHTML = '<p id="'+data[i].ip+'">'+data[i].ip+'</p>';
                cell2.setAttribute('contentEditable', 'true');
                cell3.innerHTML = '<i class="edit icon" onclick="displayPhrase()">Editar</i> ';
              }
              

              
          })
  })

})