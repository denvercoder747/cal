<?php
			$fileXls = $_FILES["gredient_file"]["name"];
			$dir_name = "bulkupload_csv/";
			$tempFolder = $dir_name.$fileXls;  
			move_uploaded_file($_FILES['gredient_file']['tmp_name'], $tempFolder);
			
			$filePath = $_SERVER['DOCUMENT_ROOT'];
			$getFile	= $filePath."/bulkupload_csv/".$fileXls;
			
			// Check the file format
			$getFileName = explode('.',$_FILES["gredient_file"]["name"]);
			//print'<pre>';print_r($getFileName);exit;
			$arrayCnt = count($getFileName);
			$getFileExtension = $getFileName[$arrayCnt-1];
			
			if($getFileExtension != 'xls' && $getFileExtension != 'csv'){
				unlink($getFile);
				echo '<script type="text/javascript">
							alert("File format should be .csv or .xls");
					  </script>';
				
			}
			
			
			// Changing xls to csv
			if($getFileExtension == 'xls'){
				
				include $filePath."/application/views/excelReader.php";
				
				$xls = new Spreadsheet_Excel_Reader($getFile);
				//print'<pre>';print_r($xls);exit;
				$handler = fopen("bulkupload_csv/".$getFileName['0'].".csv", "w");
				foreach($xls->sheets as $k=>$data)
				{
					$columnCnt = $data['numCols'];
					
				   echo "\n\n ".$xls->boundsheets[$k]."\n\n";
				
				  /* foreach($data['cells'] as $row)
				   {
					  // print'<pre>';print_r($row);exit;
					   foreach($row as $cell)
					   {
						   $get[] = $cell;
					   }
					   fputcsv($handler,$get);
					   $get = array();
				   }*/
				   
				    foreach($data['cells'] as $row)
				   {
					   for($i=1; $i<=$columnCnt; $i++){
						   // print'<pre>';print_r($row);exit;
						 
							   $get[] = $row[$i]; 
					   }
					   fputcsv($handler,$get);
					   $get = array();
				   }
				   	
				}
				fclose($handler);
				//exit;
				$getFile	= $filePath."/bulkupload_csv/".$getFileName['0'].".csv";
			}
			
				$row = 1;
				$handle = fopen($filePath."/bulkupload_csv/".$getFileName['0'].".csv", "r");
//				$handle = fopen("upload/" . $_FILES["gredient_file"]["name"], "r");
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$datas="";
					$num = count($data);
				 //   echo "<p> $num fields in line $row: <br /></p>\n";
					$row++;
					if($row>2)
					{
						for ($c=0; $c < $num; $c++) {
							//echo $data[$c] . "<br />\n";
								switch ($data[2])
								{
								case "Gram":
								  $text=1000;
								  break;
								case "KiloGram":
								  $text=1;
								case "Liter":
								  $text=1;
								case "Mililiter":
								  $text=1000;
								case "Cup":
								  $text=4.35;
								case "TeaSpoon":
								  $text=200;
								case "TableSpoon":
								  $text=66.67;
								case "Ounce":
								  $text=35.71;
								case "Pound":
								  $text=2.20;
								default:
								  $text=1;
								} 
					//					$data[3]=$text;
							$datas.=$data[$c].",";
								
						}
						$datas=$text.",".$datas;
					$final=substr($datas,0,-1);
					$final2=explode(",",$final);
				$vale = array(
				   'user_id' => $this->session->userdata('user_id') ,
				   'name' => $final2[1] ,
				   'quantity' => $final2[2] ,
				   'measure' => $final2[3] ,
				   'measure_amt' => $final2[0] ,
				   'price' => $final2[4] ,
				   'amount_kg' => $final2[5] ,
				   'purchased_from' => $final2[6] ,
				   'brand' => $final2[7] ,
				   'contact' => $final2[8] 
				);
						$this->db->where('user_id', $this->session->userdata('user_id'));
						$this->db->where('name', $final2[1]);
						$query = $this->db->get('gradients_list');
	//						echo $this->db->last_query();exit;
						
						if($query->num_rows < 1)
						{
							$this->db->insert('gradients_list', $vale); 
						//	echo $this->db->last_query();
						}
				
					}
				//$this->db->insert('gradients_list', $vale); 
				//echo $this->db->last_query();
				}
				//	print_r($final2);
				fclose($handle);
				unlink("bulkupload_csv/" . $getFileName['0'].".xls");
				unlink("bulkupload_csv/" . $getFileName['0'].".csv");
			?>
<?php
//echo $_FILES["gredient_file"]["type"];
//if (($_FILES["gredient_file"]["type"] == "text/x-csv")
//  || ($_FILES["gredient_file"]["type"] == "text/comma-separated-values")
//  || ($_FILES["gredient_file"]["type"] == "text/csv")
//  || ($_FILES["gredient_file"]["type"] == "text/anytext")
//  || ($_FILES["gredient_file"]["type"] == "application/csv")
//  || ($_FILES["gredient_file"]["type"] == "application/vnd.ms-excel")
//  || ($_FILES["gredient_file"]["type"] == "application/vnd.msexcel") )
//							  
//							 
//  {
//  if ($_FILES["gredient_file"]["error"] > 0)
//    {
////    echo "Return Code: " . $_FILES["gredient_file"]["error"] . "<br />";
//    }
//  else
//    {
////    echo "Upload: " . $_FILES["gredient_file"]["name"] . "<br />";
////    echo "Type: " . $_FILES["gredient_file"]["type"] . "<br />";
////    echo "Size: " . ($_FILES["gredient_file"]["size"] / 1024) . " Kb<br />";
////    echo "Temp file: " . $_FILES["gredient_file"]["tmp_name"] . "<br />";
//
//    if (file_exists("/upload/" . $_FILES["gredient_file"]["name"]))
//      {
////      echo $_FILES["gredient_file"]["name"] . " already exists. ";
//      }
//    else
//      {
//      move_uploaded_file($_FILES["gredient_file"]["tmp_name"],
//      "upload/" . $_FILES["gredient_file"]["name"]);
////      echo "Stored in: " . "/upload/" . $_FILES["gredient_file"]["name"];
//      }
//    }
//				$row = 1;
//				//$handle = fopen("files/table.csv", "r");
//				$handle = fopen("upload/" . $_FILES["gredient_file"]["name"], "r");
//				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//				$datas="";
//					$num = count($data);
//				 //   echo "<p> $num fields in line $row: <br /></p>\n";
//					$row++;
//					if($row>2)
//					{
//						for ($c=0; $c < $num; $c++) {
//							//echo $data[$c] . "<br />\n";
//								switch ($data[2])
//								{
//								case "Gram":
//								  $text=1000;
//								  break;
//								case "KiloGram":
//								  $text=1;
//								case "Liter":
//								  $text=1;
//								case "Mililiter":
//								  $text=1000;
//								case "Cup":
//								  $text=4.35;
//								case "TeaSpoon":
//								  $text=200;
//								case "TableSpoon":
//								  $text=66.67;
//								case "Ounce":
//								  $text=35.71;
//								case "Pound":
//								  $text=2.20;
//								default:
//								  $text=1;
//								} 
//					//					$data[3]=$text;
//							$datas.=$data[$c].",";
//								
//						}
//						$datas=$text.",".$datas;
//					$final=substr($datas,0,-1);
//					$final2=explode(",",$final);
//				$vale = array(
//				   'user_id' => $this->session->userdata('user_id') ,
//				   'name' => $final2[1] ,
//				   'quantity' => $final2[2] ,
//				   'measure' => $final2[3] ,
//				   'measure_amt' => $final2[0] ,
//				   'price' => $final2[4] ,
//				   'amount_kg' => $final2[5] ,
//				   'purchased_from' => $final2[6] ,
//				   'brand' => $final2[7] ,
//				   'contact' => $final2[8] 
//				);
//						$this->db->where('user_id', $this->session->userdata('user_id'));
//						$this->db->where('name', $final2[0]);
//						$query = $this->db->get('gradients_list');
//						
//						if($query->num_rows < 1)
//						{
//							$this->db->insert('gradients_list', $vale); 
//							echo $this->db->last_query();
//						}
//				
//					}
//				//$this->db->insert('gradients_list', $vale); 
//				//echo $this->db->last_query();
//				}
//				//	print_r($final2);
//				fclose($handle);
//				unlink("upload/" . $_FILES["gredient_file"]["name"]);
//  }
//else
//  {
//  echo "Invalid file";
//  }
?> 
<?php
	redirect('gredient');
?>