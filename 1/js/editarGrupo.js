$('#1').on('change',function(){

    var valor = $('#1 option:selected').val()
    console.log('value '+$('#userid option:selected').val())
    console.log('text '+$('#userid option:selected').text())
    console.log('index '+$('#userid option:selected').index())

    var btn = document.getElementById("btn");
    btn.setAttribute('placeholder',valor);  


})