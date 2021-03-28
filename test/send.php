<!DOCTYPE html>
<html>
<body>

<?php

  function sendGCM($message, $ids) {
    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
      'registration_ids' => $ids, //array ( $id ),
      'data' => array (
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
  }

  $token_yasir = 'dD41z8ynvGo:APA91bEXpZ9zwq-goiAua1BYEEtefXlQ45dQ3gEU29vQBmxDxAnT0cD5RyT51MS3Uv5z9CA8qn_zQJ42SJXn9bHBgN1EfCvcOpGDDfuVDWwYVX0CRaw_XsB__Wc2Bi4samHT0iqyMUT0';
  $token_athar = 'fnM7AziN1Litk0E4vMN4ux:APA91bHrB9p0_oMBwI3j0gxfgCyA_sGkZ9QcE2jnINwO69mmh5CjuWq4h1rwBdG__NEzfWC6VtNifoZmYHOdf6ciSvIbUHqhwsr0jIcsaA-5HnZvg1ECL8VzZlnW3Tct_obqfGtobRgC';
  $msg = 'mesage from yasir pc.';
  sendGCM($msg, array($token_yasir, $token_athar));

?>

</body>
</html>