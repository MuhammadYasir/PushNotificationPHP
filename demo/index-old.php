<!DOCTYPE html>
<html>
<body>

<?php

  function sendGCM($message, $id) {
    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
      'registration_ids' => array (
        $id
      ),
      'data' => array (
        "message" => $message
      )
    );
    $fields = json_encode ( $fields );

    $headers = array (
      'Authorization: key=' . "AIzaSyASyr36v9SOIaT0msVs_Jx322peA1DOmCg",
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

?>

</body>
</html>