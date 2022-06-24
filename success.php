<head>
    <?php header( "refresh:10;url=index.html" ); ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
          margin-bottom: 70px;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
        
      }
      span {
        color:black;
        font-size: large;
        font-weight:bold;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">&#10004;</i>
      </div>
        <h1>Success</h1> 
        <p>Nous avons re&ccedil;u votre demande d'inscription, Nous vous appellerons une fois que le directeur aura approuv&eacute;	 votre demande!.</p>
        <span>You will be redirected in <span id="sec"></span></span>
      </div>
      <script>
      var seconds=10;
      var sec=document.getElementById('sec');
      function increment(){
        sec.innerText=seconds;
        seconds--;
      }
      setInterval(increment,1000);
      </script>
    </body>
</html>
