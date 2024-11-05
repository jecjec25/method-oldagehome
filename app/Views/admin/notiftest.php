<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.1/firebase-app.js";
  import { getMessaging , getToken} from "https://www.gstatic.com/firebasejs/11.0.1/firebase-messaging.js";
  
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyCgi8OTa47X5iQbwNFYzYMi7caTfr72rnA",
    authDomain: "method-oldagehome.firebaseapp.com",
    projectId: "method-oldagehome",
    storageBucket: "method-oldagehome.firebasestorage.app",
    messagingSenderId: "31818946483",
    appId: "1:31818946483:web:81856d902c357476771dc6",
    measurementId: "G-YR1S47GSWZ"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const messaging = getMessaging(app);

  navigator.serviceWorker.register("js/sw.js").then(registration => {
    getToken(messaging, {
        serviceWorkerRegistration: registration,
        vapidKey: 'BGFWaXZsBOeWhUQ8fciuy7lbkgmRgjYK13IILsTmukVoEyfQ31zQHgoGinEMjsC0PBZPartAjeXRjGNCFm7N8qc' }).then((currentToken) => {
  if (currentToken) {

    console.log("Token is: " + currentToken);
    // Send the token to your server and update the UI if necessary
    // ...
  } else {
    // Show permission request UI
    console.log('No registration token available. Request permission to generate one.');
    // ...
  }
}).catch((err) => {
  console.log('An error occurred while retrieving token. ', err);
  // ...
});
  });

  

</script>
</body>
</html>