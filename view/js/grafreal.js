ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {  
var chart = null;
function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
    dataset.data.push(data);
});
    chart.update();
}

var ctx = document.getElementById('myChart').getContext('2d');
chart = new Chart(ctx, {
 // The type of chart we want to create
type: 'line',

// The data for our dataset
 data: {
labels: [],
datasets: [{
label: 'Funcionamento',
borderColor: 'rgb(30,108,199)',
data: []
}]
},
// Configuration options go here
options: {
    
    scales: {
        ticks: {
            max:1,
            min:0,
            stepSize:0,
            precision:0
        }
    }
}
})


function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function getData(){
    var id = document.getElementById('id').value;
    console.log(id)
    let url = "../controller/apis/apiPing.php";
    let myinit = {
    method : 'POST',
    headers: {
        "Accept": "application/json",
        "Content-Type": "application/json"
            },
        body: JSON.stringify({'id': id}),

            
    }
    var teste = fetch(url,myinit)
        .then(function(response){
            console.log("chegou aqui")
            response.json().then(function(data){
                console.log(data.ip)
                addData(chart,data.data,data.ip)
            })
            
            
        })
        .catch(function(err){
            console.error(err);
        })

    
} 
//getData()
setInterval(getData,5000)

/*
for(var i = 0;i<1000000;i++){
    getData();
    sleep(10)    
}   
*/

//addData(chart,"Teste",5)
//addData(chart,"Teste",3)

// demo();
})
