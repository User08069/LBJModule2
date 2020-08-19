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

}
else
{
    $id = clean_text($_POST["id"]);
}
      
$lines = file("contact_data.csv");
foreach($lines as $name){
    if($name[0] == strtolower(trim($id)))
    {
        echo "$name";
    }
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>RegistrationForm</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
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
</html>