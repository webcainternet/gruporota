<?php 
########################
#
# Ver. 1.4 28/01/2010 22:07
# 
# @license	GNU/GPL
#
########################

//data forms are not sent
if (!isset($_POST['inputYes'])) {

  // function output XML fields
  function print_xml_fild ($fild_xml) {
	  if (file_exists("templateDetails.xml")) $tdfile = simplexml_load_file("templateDetails.xml");
	  	$namefild = $tdfile->$fild_xml;
		echo $namefild;
  }
} else { //data forms are sent
  // function upload files from directory to array
  function dir_array ($dirname = ".") {
	  if (!isset($filelist)) {
		  global $filelist;
	  }
	  $exept = array('.','..','Thumbs.db','xml.php'); //Exceptions list
	  $handle = opendir($dirname);
	  while ($file = readdir($handle)) {
		  if (!in_array($file, $exept)) {
			  if(is_dir("$dirname/$file")) {
				  dir_array ("$dirname/$file");
			  } else {
				  $filelist[] = substr("$dirname/$file",2);
			  }
		  }
	  }
	  closedir($handle);
	  return $filelist;
  }
  
  //Creation content
  $filetempl = '<?xml version="1.0" encoding="utf-8"?>'."\r\n";
  $filetempl .= '<install version="1.5" type="template">'."\r\n";
  $filetempl .= '	<name>'. $_POST['nameFild'].'</name>'."\r\n";
  $filetempl .= '	<version>'.$_POST['versionFild'].'</version>'."\r\n";
  $filetempl .= '	<creationDate>'.$_POST['creationDateFild'].'</creationDate>'."\r\n";
  $filetempl .= '	<author>'.$_POST['authorFild'].'</author>'."\r\n";
  $filetempl .= '	<authorEmail>'.$_POST['authorEmailFild'].'</authorEmail>'."\r\n";
  $filetempl .= '	<authorUrl>'.$_POST['authorUrlFild'].'</authorUrl>'."\r\n";
  $filetempl .= '	<copyright>'.$_POST['copyrightFild'].'</copyright>'."\r\n";
  $filetempl .= '	<license>'.$_POST['licenseFild'].'</license>'."\r\n";
  $filetempl .= '	<description>'.$_POST['descriptionFild'].'</description>'."\r\n";
  
  
  $filelist = dir_array (".");
  asort($filelist);
  		
  //  Creation files list
			// File
			$filetempl .= '	<files>'."\r\n";
			foreach ($filelist as $item) {
				$ext = strrchr ( $item, "." );
				if(!((!strcasecmp ($ext, ".gif")) || (!strcasecmp ($ext, ".jpg")) || (!strcasecmp ($ext, ".png"))
					|| (!strcasecmp ($ext, ".bmp")) || (!strcasecmp ($ext, ".css")) || (!strcasecmp ($ext, ".jpeg")))) {
					if (!strpos ($item, "tpl_")) {
						$filetempl .= '		<filename>'.$item.'</filename>'."\r\n";
					}
				}
			}
			$filetempl .= '	</files>'."\r\n";
			
			// Images
			$filetempl .= '	<images>'."\r\n";
			foreach ($filelist as $item) {
				$ext = strrchr ( $item, "." );
			if((!strcasecmp ($ext, ".gif")) || (!strcasecmp ($ext, ".jpg")) || (!strcasecmp ($ext, ".png")) || (!strcasecmp ($ext, ".bmp")) || (!strcasecmp ($ext, ".jpeg")))
				{
					$filetempl .= '		<filename>'.$item.'</filename>'."\r\n";
				}
			}
			$filetempl .= '	</images>'."\r\n";
			
			// CSS
			$filetempl .= '	<css>'."\r\n";
			foreach ($filelist as $item) {
				$ext = strrchr ( $item, "." );
				if(!strcasecmp ($ext, ".css")) {
					$filetempl .= '		<filename>'.$item.'</filename>'."\r\n";
				}
			}
			$filetempl .= '	</css>'."\r\n";
			
			// Languages
			$langfront = '	<languages>'."\r\n";
			$lang = 0;
			foreach ($filelist as $item) {
				$ext = strrchr ( $item, "." );
				if(!strcasecmp ($ext, ".ini")) {
					if (strpos ($item, "tpl_")) {
						if (strpos ($item, "admin") === false) {
							$langfront .= '		<language tag="'. substr ($item, strpos ($item, ".") - 5,5) .'">'.$item.'</language>'."\r\n";
							$lang ++;
						}
					}
				}
			}
			$langfront .= '	</languages>'."\r\n";
			
			if ($lang > 0) $filetempl .= $langfront;
			
			// Admin Languages
			$langadmin .= '	<administration>'."\r\n";
			$langadmin .= '		<languages>'."\r\n";
			$lang = 0;
			foreach ($filelist as $item) {
				$ext = strrchr ( $item, "." );
				if(!strcasecmp ($ext, ".ini")) {
					if (strpos ($item, "tpl_")) {
						if (!(strpos ($item, "admin") === false)) {
							$langadmin .= '			<language tag="'. substr ($item, strpos ($item, ".") - 5,5) .'">'.$item.'</language>'."\r\n";
							$lang ++;
							
						}
					}
				}
			}
			$langadmin .= '		</languages>'."\r\n";
			$langadmin .= '	</administration>'."\r\n";
			
			if ($lang > 0) $filetempl .= $langadmin;
			
			// Repeated creation file (check for its presence)
			if (file_exists("templateDetails.xml")) {
				
				// Positions
				$xml = simplexml_load_file("templateDetails.xml");
				$filetempl .= '	<positions>'."\r\n";
				foreach ($xml->positions->children() as $position)
				{
					$filetempl .= '		<position>'.$position.'</position>'."\r\n";
				}
				$filetempl .= '	</positions>'."\r\n	";
				
				//Params
				$result = $xml->xpath('params');
				while(list( , $node) = each($result))
				{
					$filetempl .= $node->asXML();
				}
			} else { //If you do not enter the default position (made editable)
				$filetempl .= <<<POSITION
	<positions>
		<position>hornav</position>
		<position>breadcrumbs</position>
		<position>banner</position>
		<position>left</position>
		<position>right</position>
		<position>top</position>
		<position>user1</position>
		<position>user2</position>
		<position>user3</position>
		<position>user4</position>
		<position>user5</position>
		<position>footer</position>
		<position>syndicate</position>
		<position>debug</position>
	</positions>
POSITION;
			}
  
  $filetempl .= "\r\n".'</install>';
  
  //Write File
  $fd = fopen("templateDetails.xml","w+")
  	or die("Cant open File templateDetails.xml");
  $four = fwrite($fd, $filetempl);
  fclose($fd);
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create templateDetals.xml</title>
<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
#ok {
	color: #030;
	background-color: #EAFFEA;
	border: 1px solid #030;
	padding: 30px;
	display: block;
}
#err {
	color: #930;
	background-color: #FFE3D7;
	padding: 30px;
	font-size: 140%;
	border: 1px solid #930;
}
td {
	background-color: #DFE2EA;
	margin: 1px;
	padding: 1px 3px 1px 15px;
}
input {
	width: 200pt;
}
-->
</style>
</head>

<body>
<center>
<?php if (isset($_POST['inputYes'])) { // forms data sent
		if (isset($four)) {?>
			<div id="ok">Your file &#8220;templateDetails.xml&#8221; is formed and written!</div>
<?php 	} else { ?>
			<div id="err">When recording &#8220;templateDetails.xml&#8221; an error occurred!</div>
 <?php }} else { ?>
</center>
<form action="#" method="post">
	<table border="0">
  <tr>
    <td><h3>Name</h3></td>
    <td><input name="nameFild" type="text" id="nameFild" value="<?php print_xml_fild('name'); ?>" /></td>
  </tr>
  <tr>
    <td><h3>Version</h3></td>
    <td><input type="text" name="versionFild" id="versionFild" value="<?php print_xml_fild('version'); ?>" /></td>
  </tr>
  <tr>
    <td><h3>Creation Date</h3></td>
    <td><input type="text" name="creationDateFild" id="creationDateFild" value="<?php print_xml_fild('creationDate'); ?>" /></td>
  </tr>
  <tr>
    <td><h3>Author</h3></td>
    <td><input type="text" name="authorFild" id="authorFild" value="<?php print_xml_fild('author'); ?>" /></td>
  </tr>
  <tr>
    <td><h3>Author Email</h3></td>
    <td><input type="text" name="authorEmailFild" id="authorEmailFild" value="<?php print_xml_fild('authorEmail'); ?>" /></td>
  </tr>
  <tr>
    <td><h3>Author Url</h3></td>
    <td><input type="text" name="authorUrlFild" id="authorUrlFild" value="<?php print_xml_fild('authorUrl'); ?>" /></td>
    </tr>
  <tr>
    <td><h3>Copyright</h3></td>
    <td><input type="text" name="copyrightFild" id="copyrightFild" value="<?php print_xml_fild('copyright'); ?>" /></td>
  </tr>
  <tr>
    <td><h3>License</h3></td>
    <td><input type="text" name="licenseFild" id="licenseFild" value="<?php print_xml_fild('license'); ?>" /></td>
  </tr>
  <tr>
    <td><h3>Description</h3></td>
    <td><textarea name="descriptionFild" id="descriptionFild" cols="45" rows="5"><?php print_xml_fild('description'); ?></textarea></td>
  </tr>
  <tr>
    <td><input name="inputYes" type="hidden" id="inputYes" value="1" /></td>
    <td><input type="submit" name="Yes" id="Yes" value="Submit" /></td>
  </tr>
</table>


</form>
<?php } ?>
</body>
</html>