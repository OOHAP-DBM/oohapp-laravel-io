importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyDFJcZ1r6qogHabgzLCUY-FIBOKDgoGcww",
    projectId: "oohap-7c79b",
    messagingSenderId: "67782058726",
    appId: "1:67782058726:web:06c53ef0eb4a7091731127",
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});