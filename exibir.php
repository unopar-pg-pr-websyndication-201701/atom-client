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

	
/*	
if(isset($_GET["q"]) ) {
	
		if(strtotime(date("m/d/Y",strtotime($entrada->pubDate)))>= strtotime(date("m/d/Y",strtotime($dataInicial))) && strtotime(date("m/d/Y",strtotime($entrada->pubDate)))<= strtotime(date("m/d/Y",strtotime($dataFinal)))){
	echo $entrada->title.'<br>';
	echo $entrada->description.'<br>';
	echo '<a href='.$entrada->link.'>Clique Aqui para ver completo.</a><br>';
	echo $entrada->pubDate.'<br><br><br>';
	
	
	

	

}
else{
		echo $entrada->title.'<br>';
	echo $entrada->description.'<br>';
	echo '<a href='.$entrada->link.'>Clique Aqui para ver completo.</a><br>';
	echo $entrada->pubDate.'<br><br><br>';
}
	
	
}

*/
?>


<feed xmlns="http://www.w3.org/2005/Atom">

<title>Home Page — News Feed</title>
<link href=http://www.meusite.com/>
<updated>2017-05—05 3:05:47</updated>

<author>
<name>Autor</name>
<email>email@exemplo.com</email>
<uri>http://www.exemplo.com/about—me</uri>
</author>

<id>http://www.exemplo.com/</id>
<icon>http://www.coolarchive.com/icons/ico/SPgues31.ico</icon>
<logo>https://vignette2.wikia.nocookie.net/gtawiki/images/9/9a/PlayStation_1_Logo.png/revision/latest?cb=20100130082645</logo>
<rights> © 2002—2017 meusite.unopar.com.be </rights>
<subtitle>Esteja atualizado com o que há de melhor na web</subtitle>
<category term=Informática/>

<?php
foreach($rss->channel->item as $entrada) {
	echo"
	<entry>
<title>".$entrada->title."</title>
<link href='".$entrada->link."'/>
<id>".$entrada->link."/</id>
<updated>".$entrada->pubDate."</updated>
<summary>".$entrada->description."</summary>
<author>
 <name>Nome do autor</name>
</author>
</entry>
	
		
	
	
	";
	
	
	
}
?>



</feed>
    




