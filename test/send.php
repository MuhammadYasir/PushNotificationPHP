<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Send Msg FCM</title>

  <link rel="stylesheet" href="lstyle.css" />
</head>

<body>

<div class="container">
  <!-- header -->
  <header id="header">
    <h1>LASSOL - Push Notification Demo</h1>
  </header>

  <!-- content -->
  <div class="content">
    <div class="row">
    <form class="form-signin" role="form" method="post" onsubmit="return validateForm()" 
          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="col-6">
        <p>Token List:</p>

        <div class="row">
          <label for="token">Token</label>
          <input id="token" type="text" name="token" value="" placeholder="Enter Token">
        </div>

        <div class="row">
          <label for="lstTokens">List</label>
          <ul id="lstTokens" name="lstTokens"></ui>
        </div>

        <div class="row">
          <button class="btnNomal" name="addtoken" value="0" onclick="addTokenToList()" >Add Token to List</button>
          <button class="btnNomal" name="removetoken" value="0" onclick="removeTokenFromList()" >Remove Last Token</button>
        </div>

        <div class="row">
          <p class="errMsg" id="errorMsgList" name=""></p>
        </div>

      </div>

      <div class="col-6">
        <p>Send Message:</p>
        

          <div class="row">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="" placeholder="Enter Title">
          </div>

          <div class="row">
            <label for="message">Message</label>
            <textarea id="message" rows="5" name="message" value="" placeholder="Message"></textarea>
          </div>
          <div id="divTokens"></div>
          <div class="row">
            <button type="submit" id="sendPN" name="sendPN" value="1" style="display: none;"
            onclick="sendMessage()" >
              Send Notification to Token List</button>
          </div>

          <div class="row">
            <p class="errMsg" id="errorMsgSend" name=""></p>
          </div>

        </div>
      </form>

    </div>
  </div>

</div>

<script type="text/javascript" src="lscript.js"></script>

<?php
    
  if (isset($_POST['sendPN']) && $_POST['sendPN']==1) {
    // print_r($_POST);

    if(!empty($_POST['title']) && !empty($_POST['message']) && $_POST['tokens']) {
      $title = $_POST['title'];
      $message = $_POST['message'];
      $tokens = $_POST['tokens'];
      
      // echo 'You have entered'.'<br>';
      // echo 'Title: '.$title.'<br>';
      // echo 'Message: '.$message.'<br>';
      // echo 'Tokens: '.$tokens.'<br>';
  
      sendGCM($title, $message, $tokens);
    }
    else {
      echo 'Form Data not completed.';
      // dd($_POST['lstTokens']);
    }
  }

  function sendGCM($title, $message, $ids) {
    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
      'registration_ids' => $ids, //array ( $id ),
      'data' => array (
        "title" => $title,
        "message" => $message
      )
    );
    $fields = json_encode ( $fields );

    $headers = array (
      'Authorization: key=' . "AAAAtbLrvl8:APA91bE9TtScFdqau5LZ8vWiHVKXR2PIGDzC3R-RSA9b3PErWD11w7z-zI5LIPL_ZEc-rq_mVbmr5K0tKK1lEvIKZUJbZeao34rMVE7J_DNww-zhAWuFawtdan-Pp7QeM5FZ4p-UDDdL",
      'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    echo $result;
    curl_close ( $ch );
    echo '<br><br>message sent';
  }

  // $token_yasir = 'dD41z8ynvGo:APA91bEXpZ9zwq-goiAua1BYEEtefXlQ45dQ3gEU29vQBmxDxAnT0cD5RyT51MS3Uv5z9CA8qn_zQJ42SJXn9bHBgN1EfCvcOpGDDfuVDWwYVX0CRaw_XsB__Wc2Bi4samHT0iqyMUT0';
  // $token_athar = 'fnM7AziN1Litk0E4vMN4ux:APA91bHrB9p0_oMBwI3j0gxfgCyA_sGkZ9QcE2jnINwO69mmh5CjuWq4h1rwBdG__NEzfWC6VtNifoZmYHOdf6ciSvIbUHqhwsr0jIcsaA-5HnZvg1ECL8VzZlnW3Tct_obqfGtobRgC';
  // $msg = 'mesage from yasir pc.';
  // sendGCM($msg, array($token_yasir, $token_athar));

?>

</body>

</html>