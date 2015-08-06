<?php
date_default_timezone_set('America/New_York');


  if (isset($_POST)) {

    //submission data
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $date = date('M/d/Y');
    $time = date('g:i:s');

    //form Data
    $name = trim(stripslashes($_POST['name']));
    $email = trim(stripslashes($_POST['email']));
    $telephone = trim(stripslashes($_POST['telephone']));
    $botFilter = trim(stripslashes($_POST['email2']));
    $message = trim(stripslashes($_POST['message']));

      $headers = "From: <info@cooper4progress.com>\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      "X-Mailer: PHP/" . phpversion();
      $emailBody = '
      <html>
        <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">

          <table width="100%" cellpadding="10" cellspacing="0">
            <tr valign="top" bgcolor="#00B0EA"  align="center">
              <td>
                <table width="500" cellpadding="0">
                  <tr align="center"> 
                    <td>
                    <img src="http://letusspraysoftwash.com/images/logos/web/sm-transparent.png">
                    </td>
                  </tr>
                </table>
              </td>
                  </tr>
                  <tr bgcolor="#fffff" height="25"></tr>
                    <table width="100%" cellpadding="10" cellspacing="15" bgcolor="#063A74">
                    <tr bgcolor="#ffffff" align="center">
                     <td>
                      <p>You have recieved a new message from your contact form!</p>
                      <p> <strong>Name:</strong> ' . $name .'</p>
                      <p><strong>Email Address: </strong>' . $email .  '</p>
                      <p><strong>Message: </strong>' . $message . '</p>
                      <p>This message was sent from the IP Address: '. $ipAddress . ' on ' . $date .  ' at ' . $time . '</p>
              </td> 
            </tr>
          </table>  
          </table>
        </body>
      </html>';
  
      $mail = mail("matt.s@the-rva.com", "New Contact Request!", $emailBody, $headers);
      if ($mail) {
        header("Location: /materialize/dist/index.php");
        exit;
}




}
?>
