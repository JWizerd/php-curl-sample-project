<?php
if(isset($_POST["submit"]))
{
  echo "Full name is " . $_POST["firstName"] .
     "  " . $_POST["lastName"];
  exit;
}
?>
 
<html>
  <body>
   
    <form method = "POST" action = "" >
      <input  name="firstName"  type="text"> 
      <input  name="lastName"  type="text">
      <input  type="submit"  name="submit" >
    </form>

  </body>
</html>