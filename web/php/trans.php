<?php 

require_once("lib/EasyRdf.php");

function trans() {
  EasyRdf_Namespace::set('ksn', 'http://kosemnet.de/Data/Model#');
  $people = new EasyRdf_Graph("http://kosemnet.de/Data/Artikel/");
  $people->parseFile("/home/graebe/lsgm/KoSemNet/Webseiten/rdf/Artikel.ttl");
  return $people->serialise("json");

}

echo trans();
