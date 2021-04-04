// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
// importScripts('/__/firebase/8.3.1/firebase-app.js');
// importScripts('/__/firebase/8.3.1/firebase-messaging.js');
// importScripts('/__/firebase/init.js');

// const messaging = firebase.messaging();

importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
// Initialize the Firebase app in the service worker by passing in

firebase.initializeApp({
  apiKey: "AIzaSyASyr36v9SOIaT0msVs_Jx322peA1DOmCg",
  authDomain: "lassolpn.firebaseapp.com",
  // databaseURL: 'https://project-id.firebaseio.com',
  projectId: "lassolpn",
  storageBucket: "lassolpn.appspot.com",
  messagingSenderId: "780390874719",
  appId: "1:780390874719:web:e0d1dc52f424a49a5465ea",
  measurementId: "G-92PXSW8G3V",
});
// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();



// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// Keep in mind that FCM will still show notification messages automatically 
// and you should use data messages for custom notifications.
// For more info see: 
// https://firebase.google.com/docs/cloud-messaging/concept-options

messaging.onBackgroundMessage(function (payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = payload.data.title;
  const notificationOptions = {
    body: payload.data.message,
    icon: "/lassol-logo.png",
  };

  self.registration.showNotification(
    notificationTitle,
    notificationOptions
  );
});

