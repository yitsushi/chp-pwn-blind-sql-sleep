<?php
if (array_key_exists('source', $_GET)) {
  header('Content-Type: text/plain; charset=utf-8');
  echo file_get_contents(__FILE__);
  die();
}

session_start();

// Parse JSON request
$rawBody = file_get_contents("php://input");
$payload = @json_decode($rawBody);

if(isset($payload->username)) { 
    $link = mysqli_connect('127.0.0.1', 'admin', 'admin'); 
    mysqli_select_db($link, 'chp_pwn');

    $response = [
      'exists' => false,
      'debug'  => isset($payload->debug)
    ];



    $query = "SELECT * from users where username=\"".$payload->username."\""; 

    if ($response['debug']) {
      $response['query'] = "Executing query: $query";
    }

    $res = mysqli_query($link, $query); 
    if($res) { 
      if(mysqli_num_rows($res) > 0) { 
          // echo "This user exists.<br>";
          $response['exists'] = true;
      } else { 
          // echo "This user doesn't exist.<br>";
      }
    } else { 
          // echo "Error in query.<br>";
    }

    mysqli_close($link); 
    header('Content-Type: application/json; charset=utf-8');

    die(json_encode($response));
}

header('Content-Type: text/html; charset=utf-8');
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="header center orange-text">Welcome at TheVerySecureSite</h1>
      <div class="row">
        <form class="col offset-s3 s6" target="" data-method="post">
          <div class="input-field col s12">
            <input placeholder="Username" name="username" id="register_username" type="text">
            <label for="register_username">Username</label>
          </div>
          <div class="input-field col s12">
            <input placeholder="Password" name="password" id="register_password" type="password">
            <label for="register_password">Password</label>
          </div>
          <div class="input-field col s12 center">
            <input class="btn" type="button" value="Register">
          </div>
        </form>
      </div>

      <pre>
      CREATE TABLE `users` ( 
        `username` varchar(64) DEFAULT NULL, 
        `password` varchar(64) DEFAULT NULL 
      );

      Goal:

       - What is the password of the user "admin"

      You can check the source code: /index.php?source
      </pre>

    </div>

    <script>
      var postRequest = async function (target, data, callback) {
          var xhr = new XMLHttpRequest();
          xhr.open('POST', target, true);
          xhr.setRequestHeader("Content-type", "application/json");
          xhr.addEventListener("readystatechange", function (e) {
              if (xhr.readyState == 4 && xhr.status == 200) {
                  var response = JSON.parse(xhr.responseText);
                  callback(response);
              }
          }, false);
          return xhr.send(JSON.stringify(data));
      };


      document.querySelector('#register_username').addEventListener('keyup', function() {
        if (this.value.length < 3) {
          return;
        }
        var that = this;
        postRequest('/index.php', {username: this.value}, function(resp) {
          if (resp.exists) {
            that.nextElementSibling.innerText = "Username (already exists)";
            that.className = "invalid";
          } else {
            that.nextElementSibling.innerText = "Username"
            that.className = "valid";
          }
        });
      });
    </script>
  </body>
</html>
