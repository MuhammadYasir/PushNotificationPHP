importScripts("https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js");
importScripts(
  "https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js",
);
// For an optimal experience using Cloud Messaging, also add the Firebase SDK for Analytics.
importScripts(
  "https://www.gstatic.com/firebasejs/7.16.1/firebase-analytics.js",
);

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp({
  messagingSenderId: "780390874719",
  apiKey: "AIzaSyASyr36v9SOIaT0msVs_Jx322peA1DOmCg",
  projectId: "lassolpn",
  appId: "1:780390874719:web:e0d1dc52f424a49a5465ea",
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.onMessage(function (payload) {
  console.log(
    "[firebase-messaging-sw.js] Received background message ",
    payload,
  );
  // Customize notification here
  const notificationTitle = "LASSOL Message";
  const notificationOptions = {
    body: "Message: " + payload.data.message,
    icon: "/lassol-logo",
  };

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions,
  );
});

messaging.setBackgroundMessageHandler(function (payload) {
  console.log(
    "[firebase-messaging-sw.js] Received background message ",
    payload,
  );
  // Customize notification here
  const notificationTitle = "LASSOL Message";
  const notificationOptions = {
    body: "Message: " + payload.data.message,
    icon: "/lassol-logo.png",
  };

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions,
  );
});