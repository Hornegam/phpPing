function erase(){
    var valor = $('#1 option:selected').val()
    console.log(valor)

    var u = 'controller/eraseGroup.php'
    var my = {
        method : 'POST',
        headers: {
        "Accept": "application/json",
        "Content-Type": "application/json"
            },
        body: JSON.stringify({'nome': valor})      
    }

    fetch(u,my)
    .then(function(response){
        console.log("foi alguma coisa")
    })
}

$('#1').on('change',function(){

    var valor = $('#1 option:selected').val()
    console.log('value '+$('#userid option:selected').val())
    console.log('text '+$('#userid option:selected').text())
    console.log('index '+$('#userid option:selected').index())

    var btn = document.getElementById("btn");
    btn.setAttribute('placeholder',valor);  


})