<?php
$url_atual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<style type="text/css">
    img {
        max-width: 100%;
    }
    .marginTopo{
        margin-top: 80px;
    }
</style>
<script type="text/javascript">


    function showResult(str) {
        var datei = $('#datei').val();

        /*if (str.length==0) {
         document.getElementById("livesearch").innerHTML="";
         document.getElementById("livesearch").style.border="0px";
         return;
         }*/
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("livesearch").innerHTML=this.responseText;
                // document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            }
        }
        xmlhttp.open("GET", "atom.php?q="+str+"&di="+datei,true);
        //xmlhttp.open("POST", "exibir.php?q="+str,true);
        xmlhttp.send();
    }

</script>

<!DOCTYPE html>
<html lang="pt-br">
<style>
    #livesearch{
        text-align: center;
    }
    img{
        width: 150px;
        height: 150px;
    }
</style>
<head>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery-3.2.1.min.js"></script>
        <script src="masked.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="mask.js"></script>
        <title>RSS</title>
    </head>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <form class="form-group" name="formulario">
            <div class="marginTopo">
                <label class="col-md-12 col-md-offset-3" for="url">URL da Noticia</label>
                <div class="col-md-12 col-md-offset-3">
                    <div class="col-md-5">
                        <input type="text" class="form-control" size="30" id="url" "></br>
                    </div>
                </div>
                <div class="col-md-12 col-md-offset-3">
                    <div class="col-md-3">

                        <label>Data Inicial:</label><input type="date" class="datepicker" id="datei" class="form-control">

        </form>
        <button onclick="showResult($('#url').val())">Consultar</button>
    </div>
</div></br>


<div id="livesearch">
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
    var data;
    $("#date").on("change", function(){
        data = $(this).val();
        //alert(data);
        r = data;
    });
    $( function() {
        $( ".datepicker" ).datepicker();
    } );
    $(document).ready(function () {

        $(".datepicker").inputmask({
            mask: ["99/99/9999" ],
            keepStatic: true
        });
    });
    $('form[name=formulario]').submit(function(){

        return false;

    });
</script>