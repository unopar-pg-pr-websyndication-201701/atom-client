<?php
if(isset($_GET["q"]) ) {
    $resultado = $_GET["q"];
    $dataInicial = $_GET["di"];

} else {
    $resultado = 'atom.xml';
}
$resultado = 'atom.xml';
$feed = file_get_contents($resultado);
$rss = new SimpleXmlElement($feed);




$i= 0;

echo "<h1>".$rss->title."</h1><br>";
echo "<a href='".$rss->link."'>Link</a><br>";
echo "<h3>".$rss->author->name."</h3><br>";
echo "<br><br><br>";


foreach($rss->entry as $row)
{
    if(strtotime(date("m/d/Y",strtotime($row->pubDate)))>= strtotime(date("m/d/Y",strtotime($dataInicial)))) {
        echo "<h2>$row->content</h2>";
        echo "<a href='" . $row->link . "'>Link</a><br>";
        echo "<h4>$row->title</h4>";
        echo "<h6>$row->pubDate</h6>";
    }

}
?>