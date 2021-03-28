importScripts('https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js');

var firebaseConfig = {
  apiKey: "AIzaSyASyr36v9SOIaT0msVs_Jx322peA1DOmCg",
  authDomain: "lassolpn.firebaseapp.com",
  // databaseURL: "",
  projectId: "lassolpn",
  storageBucket: "lassolpn.appspot.com",
  messagingSenderId: "780390874719",
  appId: "1:780390874719:web:e0d1dc52f424a49a5465ea",
  measurementId: "G-92PXSW8G3V"
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

/*

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyASyr36v9SOIaT0msVs_Jx322peA1DOmCg",
    authDomain: "lassolpn.firebaseapp.com",
    projectId: "lassolpn",
    storageBucket: "lassolpn.appspot.com",
    messagingSenderId: "780390874719",
    appId: "1:780390874719:web:e0d1dc52f424a49a5465ea",
    measurementId: "G-92PXSW8G3V"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

*/