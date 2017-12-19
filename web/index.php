<?php
/**
 * User: Hans-Gert Gräbe
 * Date: 2017-12-19
 */

include_once("layout.php");

$content='      
<div class="container">
<div class="row">
<div  class="col-lg-3 col-sm-1"></div><div  class="col-lg-6 col-sm-10">

<p>This is a first small hack of a web site for the upcoming Open Discovery
Project that aims at collecting different information about the <a
href="https://en.wikipedia.org/wiki/TRIZ">TRIZ methodology</a> in RDF format
for the public as <a href="http://lod-cloud.net/">Linked Open Data</a>. </p>

 
</div><div  class="col-lg-3 col-sm-1">
</div>
</div>

';
echo showPage($content);

?>
