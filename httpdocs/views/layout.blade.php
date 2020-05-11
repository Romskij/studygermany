<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
    <title>@yield('title', 'studygermany')</title>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/application-jpeg.js"></script>
    <script>
    window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#edeff5",
          "text": "#838391"
        },
        "button": {
          "background": "#4b81e8"
        }
      },
      "theme": "classic",
      "content": {
        "href": "www.studygermany.com/datenschutz"
      }
    })});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    
    <style>
      .wrapper {
        position: relative;
        width: 400px;
        height: 200px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: url(assets/Pen-icon.png) 5 27, default;
        
      }

      .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width:400px;
        height:200px;
        background-color: white;
        border: 2px dotted;
      }

      #smalltext {
        font-size: 5px !important;
      }
      
    </style>
  </head>
  <body>

  <div class="container">
    <!-- NAV BEGIN -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
          <a class="navbar-brand" href="#">
            <img src="assets/logo_studygermany.png" width="200" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/initial_information">Initial Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/privacy_policy">Privacy policy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/imprint">Imprint</a>
              </li>
            </ul>
          </div>
        </nav>
    <!-- NAV END -->
    
        @yield('content')

            <!-- Footer -->
        <footer class="page-footer font-small blue pt-4">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
              <a href="https://www.studygermany.de"> studygermany.de</a>
            </div>
            <!-- Copyright -->
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script>
    // $(document).ready(function() {
    //     $("#signature").jSignature()
    // })
    </script>
    <script>
        $(function(){
            $('#datepicker').datepicker();
            });
        $(function(){
            $('#datepicker1').datepicker();
            });
        $(function(){
            $('#datepicker2').datepicker();
            });
        $(function(){
            $('#datepicker3').datepicker();
            });
        
    </script>
    <script>
      // var canvas = document.getElementById('signature-pad');
     // var imageData = canvas.toDataURL();
     //  document.getElementsByName("signature")[0].setAttribute("value", imageData);

      var $signature = $("[name=signature]");
      var canvas = document.querySelector("canvas");
      var signaturePad = new SignaturePad(canvas);
      // document.getElementById("form").addEventListener("submit", function (e) {
      //   e.preventDefault();
      //   console.log(signaturePad.toDataURL());
      //   return false;
      // });
      document.getElementById('save').addEventListener('click', function (e) {
        // e.preventDefault();
        // console.log(signaturePad.toDataURL());
        $signature.val(signaturePad.toDataURL());
        // return false;
      });

      document.getElementById('clear').addEventListener('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        return false;
      });

      document.getElementById('undo').addEventListener('click', function (e) {
        e.preventDefault();
        var data = signaturePad.toData();
        if (data) {
          data.pop(); // remove the last dot or line
          signaturePad.fromData(data);
        }
        return false;
      });
            /*
            var canvas = document.querySelector("canvas");

            // Adjust canvas coordinate space taking into account pixel ratio,
            // to make it look crisp on mobile devices.
            // This also causes canvas to be cleared.
            function resizeCanvas() {
                // When zoomed out to less than 100%, for some very strange reason,
                // some browsers report devicePixelRatio as less than 1
                // and only part of the canvas is cleared then.
                var ratio =  Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }

            window.onresize = resizeCanvas;
            resizeCanvas();

            var signaturePad = new SignaturePad(canvas, {
              backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
            });

            var data = signaturePad.toDataURL('image/png');

            signaturePad.toDataURL("image/jpeg");

            document.getElementById('save').addEventListener('click', function () {
              if (signaturePad.isEmpty()) {
                return alert("Please save a signature first.");
              }
              var signaturePad = new SignaturePad(canvas, {
              backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
            });
              
              var canvas = document.querySelector("canvas");

              var data = signaturePad.toDataURL('image/png');

              signaturePad.toDataURL("image/jpeg");
            });

            document.getElementById('clear').addEventListener('click', function () {
              signaturePad.clear();
            });

            document.getElementById('undo').addEventListener('click', function () {
              var data = signaturePad.toData();
              if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(data);
              }
            });
            */

          </script>  
          
          
    
    
    
  </body>
</html>