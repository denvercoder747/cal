   <?php
   set_time_limit(0);
   $fp = fopen('ip-to-country.csv','r') or die("can't open file");
while($csv_line = fgetcsv($fp,1024)) {
 //   print '<tr>';
	$col="";
    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
//        print '<td>'.$csv_line[$i].'</td>';
	$col.="'".$csv_line[$i]."',";
    }
	$col=substr($col,0,-1);
	echo "INSERT into ip_to_country(ip_start,ip_end,country_short,country_code,country_name) values('$col')";
        mysql_query("INSERT into ip_to_country(ip_start,ip_end,country_short,country_code,country_name) values($col)");
 //   print "</tr>\n";
}
fclose($fp) or die("can't close file");

/*$a=get_country_by_ip();
 
echo "<p>Country :".$a['Country']."</P>";
echo "<p>City :".$a['City']."</P>";
echo "<p>Latitude :".$a['Latitude']."</P>";
echo "<p>Longitude :".$a['Longitude']."</P>";
echo "<p>IP Address :".$a['IP']."</P>";
 
function get_country_by_ip()
{
	$ip =$_SERVER['REMOTE_ADDR'];
	$url='http://api.hostip.info/get_html.php?ip='.$ip.'&position=true';
 
	$data=file_get_contents($url);
	$a=array();
	$keys=array('Country','City','Latitude','Longitude','IP');
	$keycount=count($keys);
	for ($r=0; $r < $keycount ; $r++)
	{
		$sstr= substr ($data, strpos($data, $keys[$r]), strlen($data));
		if ( $r < ($keycount-1))
			$sstr = substr ($sstr, 0, strpos($sstr,$keys[$r+1]));
		$s=explode (':',$sstr);
		$a[$keys[$r]] = trim($s[1]);
	}
 
	return $a;
 
}
*/
?>
