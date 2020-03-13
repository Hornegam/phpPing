/*function erase(){
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
*/

$('#1').on('change',function(){

    var valor = $('#1 option:selected').val()
    console.log('value '+$('#1 option:selected').val())
    console.log('text '+$('#1 option:selected').text())
    console.log('index '+$('#1 option:selected').index())
    console.log(valor)
    var btn = document.getElementById("btn");


})