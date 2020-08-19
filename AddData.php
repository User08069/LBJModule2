
<?php

$error = '';
$name = '';
$email = '';
$message = '';
$id= '';
$city = '';
$state = '';
$qual = '';
$stream = '';
$gender = '';
$birthdate = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}


if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
    

    
if(isset($_POST["gender"]))
{
    $gender = $_POST["gender"];
}
else
{
    $gender = "No button selected";
}
    

    
if(isset($_POST["birthdate"]))
{
    $birthdate = $_POST["birthdate"];
}
else
{
    $birthdate = "No date selected";
}
    
    
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
    
    
    
if(empty($_POST["id"]))
{
    $error .= '<p><label class ="text-danger">ID is required</label></p>';
}
else
{
    $id = clean_text($_POST["id"]);
}
  
   
    
    
    
if(empty($_POST["city"]))
{
    $error .= '<p><label class ="text-danger">city is required</label></p>';
}
else
{
    $city = clean_text($_POST["city"]);
}

   
    
    
    
    
    
if(empty($_POST["state"]))
{
    $error .= '<p><label class ="text-danger">State is required</label></p>';
}
else
{
    $state = clean_text($_POST["state"]);
}
  
   
    
    
    
    
    
    
if(empty($_POST["qual"]))
{
    $error .= '<p><label class ="text-danger">Qualification is required</label></p>';
}
else
{
    $qual = clean_text($_POST["qual"]);
}
  

    
    
    
    
if(empty($_POST["stream"]))
{
    $error .= '<p><label class ="text-danger">Stream is required</label></p>';
}
else
{
    $stream = clean_text($_POST["stream"]);
}
      
    
    
    
    
    
 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
     
  $form_data = array(
   'id'=>$id,
   'name'  => $name,
   'gender' =>$gender,
   'birthdate'=>$birthdate,
   'email'  => $email,
   'stream'=>$stream,
   'qual'=>$qual,
   'city'=>$city,
   'state'=>$state,
   'message' => $message
      
  );
     
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you</label>';
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
  $id = '';
  $stream ='';
  $qual = '';
  $state = '';
  $city = '';
  $gender = '';
  $birthdate = '';
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
     <h3 align="center">Contact Form</h3>
     <br />
     <?php echo $error; ?>
        
     <div class="form-group">
      <label>Student ID</label>
      <input type="number" name = "id" class ="form-control" value="<?php echo $id; ?>" />
    </div>    
              
        
     <div class="form-group">
      <label>Student Name</label>
      <input type="text" name="name"  class="form-control" value="<?php echo $name; ?>" />
     </div>
    
        
      <div class = "form-group">
        <label> Gender</label>
          <br> 
          <label for = "male">Male</label>
          <input type="radio"  name = "gender" value = "Male" >
          <br>  
          <label for = "Female">Female</label>
          <input type="radio"  name = "gender" value = "Female" >
    </div>
        
        
    <div class = "form-group">
        <label>Date of Birth</label>
        <input type = "date" name = "birthdate" value ="<?php echo birthdate;?>" />
    </div>    
        
    <div class="form-group">
      <label>City</label>
      <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" />
     </div>    
        
        
    <div class = "form-group">
        <label>State</label>
        <input type = "text" name="state" class = "form-control" value = "<?php echo $state; ?>" />
    </div>    
        
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control"  value="<?php echo $email; ?>" />
     </div>
        
        
    <div class = "form-group">
      <label> Qualification</label>
      <input type = "text" name = "qual" class = "form-control" value="<?php echo $qual; ?>" /> 
    </div>
    
    <div class = "form-group">
      <label> Stream</label>
      <input type = "text" name = "stream" class = "form-control" value="<?php echo $stream; ?>" /> 
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