# get the Parameters
#print getParameters();
print generateMatrix();  

## end main

# main routines

sub getParameters {
  my @l=split(/\n+/,getData());
  my $out;
  map $out.=process($_), @l;
  return $out;
}

sub generateMatrix {
  my $hash;
  open(FH,"Altshuller_Matrix.csv") or die;
  while(<FH>) {
    chomp;
    $hash=processLine($hash,$_);
  }
  return createMatrix($hash);
}

# helpers

sub processLine {
  my $hash=shift;
  local $_=shift;
  my @l=split /\|/ ;
  $i=shift @l;
  for(my $j=0;$j<39;$j++) { $hash->{$i}{$j+1}=$l[$j]; }
  return $hash;
}

sub createMatrix {
  my $hash=shift;
  my $out;
  for(my $i=1;$i<40;$i++) {
    for(my $j=1;$j<40;$j++) {
      $out.=createEntry($i,$j,$hash->{$i}{$j}) if $i!=$j;
    }
  }
  return $out;
}
  
sub createEntry {
  my ($i,$j,$k)=@_;
  $i="0$i" if $i<10; 
  $j="0$j" if $j<10;
  $k=join(", ",map(trans($_),split(/,\s*/,$k)));
  return <<EOT;
<http://opendiscovery.org/rdf/Matrix/E.$i.$j>
  a od:MatrixEntry ;
  od:increasingParameter odm:P$i ;
  od:decreasingParameter odm:P$j ;
  od:recommendedPrinciple $k .

EOT
}

sub trans {
  my $i=shift;
  $i="0$i" if $i<10;
  return "odp:P$i";
}
  
sub process {
  local $_=shift;
  s/(\d+)\s+//;
  my $nr=$1;
  return <<EOT;
odm:P$nr
    od:description "$_"\@de ;
    od:hasParameterNumber "$nr" ;
    a od:Parameter ;
    rdfs:label "$_"\@de .

EOT
}

sub getData {
  return <<EOT;
01 Masse des beweglichen Objekts
02 Masse des unbeweglichen Objekts
03 Länge des beweglichen Objekts
04 Länge des unbeweglichen Objekts
05 Fläche des beweglichen Objekts
06 Fläche des unbeweglichen Objekts
07 Volumen des beweglichen Objekts
08 Volumen des unbeweglichen Objekts
09 Geschwindigkeit
10 Kraft
11 Spannung oder Druck
12 Form
13 Stabilität der Zusammensetzung des Objekts
14 Festigkeit
15 Haltbarkeit des beweglichen Objekts
16 Haltbarkeit des unbeweglichen Objekts
17 Temperatur
18 Sichtverhältnisse
19 Energieverbrauch des beweglichen Objekts
20 Energieverbrauch des unbeweglichen Objekts
21 Leistung, Kapazität
22 Energieverluste
23 Materialverluste
24 Informationsverluste
25 Zeitverluste
26 Materialmenge
27 Zuverlässigkeit
28 Messgenauigkeit
29 Fertigungsgenauigkeit
30 Von außen auf das Objekt wirkende schädliche Faktoren
31 Vom Objekt selbst erzeugt schädliche Faktoren
32 Fertigungsfreundlichkeit
33 Bedienkomfort
34 Instandsetzungsfreundlichkeit
35 Adaptionsfähigkeit, Universalität
36 Kompliziertheit der Struktur
37 Kompliziertheit der Kontrolle und Messung
38 Automatisierungsgrad
39 Produktivität
EOT
}
