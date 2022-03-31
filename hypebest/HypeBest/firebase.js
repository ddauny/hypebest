// Import the functions you need from the SDKs you need
// import * as firebase from "firebase";
// import firebase from '../firebase'
// import * as firebase from "firebase/app";
import firebase from 'firebase/compat/app';
import 'firebase/compat/auth';
import 'firebase/compat/firestore';
// import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyBB80PjLrxjmqIIbstOWTsei_Mw6BTIj7c",
  authDomain: "hypebest-e9640.firebaseapp.com",
  projectId: "hypebest-e9640",
  storageBucket: "hypebest-e9640.appspot.com",
  messagingSenderId: "1099002488526",
  appId: "1:1099002488526:web:872d55f4e80904a41cd29f",
  // measurementId: "G-M4LBJ3WN7M"
};

// Initialize Firebase
const app = firebase.initializeApp(firebaseConfig);

// let app;
// if(firebase.app.length ===0){
//     app = firebase.initializeApp(firebaseConfig);
// }else
//     app=firebase.app();
const db = app.firestore();
const auth=firebase.auth();

export {auth};
// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);