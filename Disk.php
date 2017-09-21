<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Create Printer</title>
</head>
<body>
  <div>
  <form action="" method="post">
  <input id="servername" name="servername" type="text" placeholder="Server Name" required>
  <input id="printername" name="printername" type="text" placeholder="Printer Name" required>
  <input id="IPAddress" name="IPAddress" type="text" placeholder="IP Address" required>
  <select id="Drivername" name="Drivername"> <!--The Name should be taken From Drivers in Print Management-->
    <option value="PS Driver for Universal Print">Ricoh Universal PS</option>
    <option value="HP Universal Printing PS">HP Universal PS</option>
    <option value="Xerox Global Print Driver PS">Xerox GPD PS</option>
  </select>
  <input id="search_submit" value="Submit" type="submit" onclick =''>
</form>
</div>    
<?php
  error_reporting(E_ALL);
   // Get the variables submitted by POST in order to pass them to the PowerShell script:
   $servername = $_POST["servername"];
   $drivername = $_POST["Drivername"];
   $IPAddress = $_POST["IPAddress"];
   $printername = $_POST["printername"];
   // Best practice tip: We run out POST data through a custom regex function to clean any unwanted characters, e.g.:
   // $username = cleanData($_POST["username"]);
        
   // Path to the PowerShell script. Remember double backslashes:
   $psScriptPath = "C:\\Users\\User\\Documents\\Scripts\\Printercreate.ps1";

   // Execute the PowerShell script, passing the parameters:
   $query = exec("powershell.exe -ExecutionPolicy ByPass -File \'$psScriptPath $servername $drivername $IPAddress $printername\'< NUL");
   echo $query;    

?>

</body>
</html>