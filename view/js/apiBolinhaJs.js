ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {  

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function getData(){
    //var id = document.getElementById('id').value;
    //console.log(id)
    let url = "../controller/apis/apiBolinha.php";
    let myinit = {
    method : 'POST',
    headers: {
        "Accept": "application/json",
        "Content-Type": "application/json"
            }      
    }
    var teste = fetch(url,myinit)
        .then(function(response){
            console.log("chegou aqui")
            response.json().then(function(data){
                //console.table(data)
                //console.log(data[1].tamanho)
                var tamanho = data.length
                //console.log(tamanho)
                var funciona = 0
                var nfunciona = 0
                data.forEach(function(data){
                    if(data.funciona == data.tamanho){
                        var nome = "#"+data.nome
                        $(function() {
                            $(nome).removeClass('right floated red sync icon').addClass('right floated green circle icon');
                        });
                        console.log("Tudo funciona na escola : "+data.nome)
                        funciona = data.funciona+funciona
                    }else if(data.funciona > 0 && data.funciona < data.tamanho){
                        var nome = "#"+data.nome
                        $(function() {
                            $(nome).removeClass('right floated red sync icon').addClass('right floated yellow circle icon');
                        });
                        console.log("Ta mais ou menos na escola : "+data.nome)
                        funciona = data.funciona+funciona
                        nfunciona = nfunciona+(data.tamanho-data.funciona)
                    }else if(data.funciona == 0){
                        var nome = "#"+data.nome
                        $(function() {
                            $(nome).removeClass('right floated red sync icon').addClass('right floated red circle icon');
                        });
                        console.log("Não ta pegando na escola : "+data.nome)
                        nfunciona = nfunciona+data.tamanho
                    }
                })
                //Adiciona na barra de menu a quantidade que está funcionando e a qual não está
                var add = document.getElementById("roteadores");
                var add1 = document.getElementById("nroteadores");
                add.innerHTML = '<strong>'+funciona+'</strong> roteadores estão funcionando !'
                add1.innerHTML = '<strong>'+nfunciona+'</strong> roteadores não estão funcionando !'
                console.log(funciona+" roteadores estão funcionando :)")
                console.log(nfunciona+" roteadores não estão funcionando :(")      
                  
                    
                
            })
            
            
        })
        .catch(function(err){
            console.error(err);
        })

    
} 
getData()
setInterval(getData,30000)

})