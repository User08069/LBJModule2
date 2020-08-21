
<!DOCTYPE html>
<html>
 <head>
  <title>RegistrationForm</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
 </head>
    
<style>
    table{
        border :1px solid black;
        border-collapse: collapse;
        margin-left:auto;
        margin-right: auto;
        padding: 2px;
    }
    tr,td,br{
        margin: 10px 10px 10px 10px;
        border: 1px solid black;
    }    
</style>    
    
 <body>
  <br/>
  
     
<div class="container">
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Search By ID</h3>
     <br />
        
     <div class="form-group">
      <label>Student ID</label>
      <input type="number" name = "id" class ="form-control" value="<?php echo $id; ?>" />
    </div>    
        
        
    <div class = "form-group">
        <label> </label>
        </div>    
    
        
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
    

<?php
$id= '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}
    
    
    
if(empty($_POST["id"]))
{
echo "Enter a valid ID";
}
else
{
    $id = clean_text($_POST["id"]);
}

echo "<html><body><table>\n\n";
$f = fopen("contact_data.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        foreach ($line as $cell) {
            if($line[0] == strtolower(trim($id)))
            {
                if(is_numeric($cell))
                {
                    echo"<td>";
                }
                else
                {
                    echo "<tr><th>$cell<tr><th>";
                }
            }
        }
    echo "</td\n\r";
}
    fclose($f);
?>
</html>