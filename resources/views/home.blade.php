<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>OTP verification</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
 

  <form action="">
   <label>Enter Phone Number</label>
   <input type="text" id="number" placeholder="+91 7874556564">
   <br>
   <div id="recaptcha-container"></div><br>
   <button type="button" onclick="sendCode()">Send Code</button>
  </form>
  <div id="error" style="color:red;display:none;"></div>
  <div id="sentMessage" style="color:green;display:none;"></div>

  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

  <script>
   var firebaseConfig = {
      apiKey: "AIzaSyCLVz1zGEhupO_rCeNNw086tUVgFFnDhFs",
      authDomain: "test-laravel-otp-18d70.firebaseapp.com",
      projectId: "test-laravel-otp-18d70",
      storageBucket: "test-laravel-otp-18d70.appspot.com",
      messagingSenderId: "113774137142",
      appId: "1:113774137142:web:ff56d5e4b0e658c913ad97",
      measurementId: "G-L3DJTXJ7YQ"
   }

   firebase.initializeApp(firebaseConfig);
  </script>

  <script type="text/javascript">
   window.onload = function(){
    render();
   }

   function render(){
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
   }

   function sendCode(){

     var number = $('#number').val();

     firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(){confirmationResult

       window.confirmationResult = confirmationResult;
       code_result = confirmationResult;

       $('#sentMessage').text('Message Sent Successfully!');
       $('#sentMessage').show();

     }).catch(function(error){

        $('#error').text(error.message);
        $('#error').show();

     });
   }
  </script>


</body>
</html>