<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Video Directory</title>
<meta name=”robots” content=”noindex,nofollow” />
<link rel="stylesheet" href="css/style.css" type="text/css" id="" media="print, projection, screen" />
<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
<script>

$(document).ready(function() 
    { 
        $("#myTable").tablesorter({
        widgets: ['zebra']
        }); 
        
        $("#submit").click(function() { 
                 $.post("add.php", $("#addform").serialize(), function() { 
                        // let the plugin know that we made a update 
                        window.location.reload();
                        
         		 }); 
         		 return false; 
        }); 
    } 
); 

</script>
</head>

<body>

<?php

// load SimpleXML
$videos = new SimpleXMLElement('videos.xml', null, true);

?>
<h1>Videos</h1>
<table width="882" class="tablesorter" id="myTable"> 
<thead> 
<tr> 
    <th>Company</th> 
    <th>Rep</th> 
    <th>Job</th> 
    <th>Link</th> 
    </tr> 
</thead>
<tbody>

<?php
foreach($videos as $video) // loop through our books
{
        echo <<<EOF
         
        <tr> 
                <td>{$video->company}</td>
                <td>{$video->rep}</td>
                <td>{$video->job}</td>
                <td><a href="{$video->url}" target="_blank">View Video</a></td>
        </tr>
        

EOF;
}
?>
</tbody></table>

<?php

if (!isset($_GET['admin'])) 
{
//If not isset -> set with dumy value 
$_GET['admin'] = "undefine"; 
}

if ($_GET['admin'] == 1) {
?>

<form id="addform" name="addform">
<label for="company">Company</label>
<input type="text" name="company" id="company">

<label for="rep">Rep</label>
<input type="text" name="rep" id="rep">

<label for="job">Job</label>
<input type="text" name="job" id="job">

<label for="url">URL</label>
<input type="text" name="url" id="url">

<input type="button" name="submit" id="submit" value="submit" />

</form>
<?php } else {
echo "";
} ?>

</body>
</html>