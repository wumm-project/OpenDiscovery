open(FH,shift) or die;
my @l;
while(<FH>) {
  chomp;
  push(@l,$_) if /^\s*\d+/; 
}

my $out;
map $out.=trans($_), @l;

print $out;

sub trans {
  local $_=shift;
  my @u=split /,\s*/;
  my @v=map(theMap($_),@u);
  return join(", ",@v)."\n";
}

sub theMap {
  local $_=shift;
  $_="0$_" if $_<10;
  return "odp:$_";
}
