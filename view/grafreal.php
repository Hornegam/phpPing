
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gráfico em Tempo Real - SEDUC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" type="text/css" href="../semantic/semantic.min.css">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="../semantic/semantic.min.js"></script>
</head>
<body>

    <div class="ui segment">
        <h2 class="ui right floated header">Gráfico em tempo real</h2>
        <a class="hm" href=".."><i class="fa fa-home fa-2x"></i></a>
        <div class="ui clearing divider"></div>
        <center><h4><?= $_POST['id']?></h4></center>

        <h4 class="ui horizontal divider header">
            <i class="bar chart icon"></i>
                Gráfico
            </h4>
        <div class="pr-4 justify-items-center"><canvas id="myChart" width="1200" height="400"></canvas></div>
    </div>
    
    
    


    <input type="hidden" id="id" value="<?=$_POST['id']?>">
    <script src="js/grafreal.js"></script>
</body>
</html>
