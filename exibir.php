<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );

if(isset($_GET["q"]) ) {
	$resultado = $_GET["q"];
    $dataInicial = $_GET["di"];
    $dataFinal = $_GET["df"];

    if($dataInicial > $dataFinal){
    echo 'Data final não pode ser maior que data inicial';

    
}
} else { 
	$resultado = 'http://pox.globo.com/rss/g1/brasil/';
}
$feed = file_get_contents($resultado); 
$rss = new SimpleXmlElement($feed);
foreach($rss->channel->item as $entrada) {

	if(strtotime(date("m/d/Y",strtotime($entrada->pubDate)))>= strtotime(date("m/d/Y",strtotime($dataInicial))) && strtotime(date("m/d/Y",strtotime($entrada->pubDate)))<= strtotime(date("m/d/Y",strtotime($dataFinal)))){
	echo $entrada->title.'<br>';
	echo $entrada->description.'<br>';
	echo '<a href='.$entrada->link.'>Clique Aqui para ver completo.</a><br>';
	echo $entrada->pubDate.'<br><br><br>';

}
    



   // echo $dataInicial.' '.$dataFinal;

	//echo $entrada->data.'<br>';
	//echo $entrada->title.'<br>';
	//echo $entrada->description.'<br>';
	//echo $entrada->link.'<br>';
	//echo $entrada->pubDate.'<br><br><br>';

}
