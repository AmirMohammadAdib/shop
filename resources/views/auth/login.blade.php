<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.8/sweetalert2.min.js" integrity="sha512-c1AfYKag4intaizqJC0Zx1NxImYP7B2namyOLbpFW3P12oYkZjQGQ/8r6N75SlWidbm7oQElnVZqBzRvFtU0Hw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.8/sweetalert2.css" integrity="sha512-JzSVRb7c802/njMbV97pjo1wuJAE/6v9CvthGTDxiaZij/TFpPQmQPTcdXyUVucsvLtJBT6YwRb5LhVxX3pQHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      html {
        color: #333;
      }
      body {
        background: rgb(240, 240, 240);
        font-family: "Roboto", sans-serif;
      }
      .layout {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        overflow: hidden;
        padding: 0 10px;
      }
      .box {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        background-color: rgb(248, 248, 248);
      }
      .submit {
        width: 100%;
        height: 60px;
        border-radius: 10px;
        background: #00be4f;
        border: none;
        outline: none;
        font-family: Kalameh;
        font-size: 20px;
        color: #fff;
      }
      .submit:hover {
        background: #00a043;
        cursor: pointer;
      }

      .input {
        width: 100%;
        height: 60px;
        font-size: 25px;
        border: none;
        border-radius: 10px;
        margin-top: 10px;
        margin-bottom: 40px;
        padding: 0 20px;
        background-color: rgb(255, 255, 255);
      }
      .input:hover,
      .input:focus {
        border: none;
        outline: none;
      }
    </style>
  </head>
  <body>
    <div class="layout">
      <form action="{{ route("login.store") }}" method="POST">
      @csrf
        <div class="box">
          <h3 style="margin-bottom: 50px; text-align: center">Login</h3>
  
          <h4>Email</h4>
          <input type="text" class="input" name="email"/>
  
          <h4>Password</h4>
          <input type="text" class="input" name="password"/>
  
          <button class="submit">Login</button>
        </div>
      </form>
    </div>
    @include("alerts.error")
    @include("alerts.warning")
    @include("alerts.info")
  </body>
</html>
