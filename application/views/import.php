<?php 
if ($excel == "excel"){header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=yourfilename.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0");}  // this is my export to excel 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title><?php echo $batch[8] ?></title>
    </head>
    <?php
    $kebase = $batch[0];
    $qcbase = $batch[1];
     $dir =    $batch[2];
    $kedir = $batch[3];
    $qcdir = $batch[4] ;
    $kefiles = $batch[5];
    $qcfiles = $batch[6];
    $count_files = $batch[7] - 2;
?>
<?php
echo $count_files . " " . "files found" . " " . "in" . " " . $dir . " " . "directory" . "<br>";
?>

<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST"> // this is my button export to excel
    <input name="excel" type="hidden" value="excel" />
    <input name="submit" type="submit" value="export to excel" />
</form>

<br>
<?php echo anchor('Front_cont/index', 'Home'); ?>
<pre>
<table border="1" width="0" cellpadding="0" cellspacing="5">
<th>Batch/Line</th>
<th>Field Image</th>
<th>Minor Error</th>
<th>Major Error</th>
<tr>
<?php
    for($i = 2; $i <= $count_files; $i++)
    {
        if(isset($qcfiles[$i]))
            { ?>
       <?php echo "<tr><td>"; ?><h4><?php    echo $qcfiles[$i];?></h4><?php echo "</td></tr>"; ?>
        <?php    $file1 = file($kedir . "/" . $kefiles[$i]);
                $file2 = file($qcdir . "/" . $qcfiles[$i]);
                $file1_count = count($file1);
                $file2_count = count($file2);
                $count = 1;
                for($x = 0; $x <= $file1_count; $x++)
                {
                if(isset($file1[$x]) && isset($file2[$x]))
                    {
                        $vtag1 = substr($file1[$x],178,1);
                        $vtag2 = substr($file2[$x],178,1);
                        $page1 = substr($file1[$x],0,4);
                        $page2 = substr($file2[$x],0,4);
                        $type1 = substr($file1[$x],5,1);
                        $type2 = substr($file2[$x],5,1);
                        $name1 = substr($file1[$x],7,78);
                        $name2 = substr($file2[$x],7,78);
                        $ind1 = substr($file1[$x],0,1);
                        $ind2 = substr($file2[$x],0,1);                        
                        $addr1 = substr($file1[$x], 1, 78);
                        $addr2 = substr($file2[$x], 1, 78);
                        $city1 = substr($file1[$x], 79, 30);
                        $city2 = substr($file2[$x], 79, 30);
                        $state1 = substr($file1[$x], 110, 2);
                        $state2 = substr($file2[$x], 110, 2);
                        $zc1 = substr($file1[$x], 112, 5);
                        $zc2 = substr($file2[$x], 112, 5);
                        $tf1 = substr($file1[$x], 123, 40);
                        $tf2 = substr($file2[$x], 123, 40);
                        $ac1 = substr($file1[$x], 164, 3);
                        $ac2 = substr($file2[$x], 164, 3);
                        $phone1  = substr($file1[$x], 168, 8);
                        $phone2  = substr($file2[$x], 168, 8);
                        if($vtag2 == 1)
                         { 
                            
                            $page_comp = strcmp($page1, $page2);
                            $type_comp = strcmp($type1, $type2);
                            $name_comp = strcmp($name1, $name2);
                            if($page_comp != 0)
                                {
                                    $err_stat = 1;
                                    $error = TRUE;
                                    $err_line = $count;
                                    $err_page1 = $page1;
                                    $err_page2 = $page2;?>
  <?php echo "<tr><td>"; ?> <?php echo "Line" . " " . $err_line;?><?php echo "</td>"; ?>
  <?php echo "<td>";?><?php echo "KE Page: " . " " . $err_page1 . "<br>" . "QC Page: " . " " . $err_page2; ?>
  <?php echo "<td>";?><?php if(isset($error)){echo 1;}?><?php echo "</td>"; ?>
  <?php echo "<td>";?><?php if(!isset($error)){echo 1;}?><?php echo "</td>"; ?>
  <?php echo "</td></tr>"; ?> 
                          <?php    }
                            if($type_comp != 0)
                                {
                                    $err_stat = 1;
                                    $error = TRUE;
                                    $err_line = $count;
                                    $err_type1 = $type1;
                                    $err_type2 = $type2;?>
  <?php echo "<tr><td>"; ?> <?php echo "Line" . " " . $err_line;?><?php echo "</td>"; ?>
  <?php echo "<td>";?><?php echo "KE List Type: " . " " . $err_type1 . "<br>" . "QC List Type: " . " " . $err_type2; ?>
  <?php echo "<td>";?><?php if(!isset($error)){echo 1;}?><?php echo "</td>"; ?>
  <?php echo "<td>";?><?php if(!isset($error)){echo 1;}?>
  <?php echo "</td>"; ?>
  <?php echo "</td></tr>"; 
								}}}}}}
  ?> 