#!/bin/bash
curl -X POST \
-H "Authorization: key=AAAAtbLrvl8:APA91bE9TtScFdqau5LZ8vWiHVKXR2PIGDzC3R-RSA9b3PErWD11w7z-zI5LIPL_ZEc-rq_mVbmr5K0tKK1lEvIKZUJbZeao34rMVE7J_DNww-zhAWuFawtdan-Pp7QeM5FZ4p-UDDdL" \ 
-H "Content-Type: application/json" \ 
-d '{
  "data": {
    "notification": {
        "title": "LASSOL Message",
        "body": "This is an LASSOL Message",
        "icon": "/itwonders-web-logo.png",
    }
  },
  "to": "dD41z8ynvGo:APA91bEXpZ9zwq-goiAua1BYEEtefXlQ45dQ3gEU29vQBmxDxAnT0cD5RyT51MS3Uv5z9CA8qn_zQJ42SJXn9bHBgN1EfCvcOpGDDfuVDWwYVX0CRaw_XsB__Wc2Bi4samHT0iqyMUT0"
}' https://fcm.googleapis.com/fcm/send
