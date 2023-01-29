<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <!-- Title -->
      <title>Octilus Technology</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Meta description -->
     
      <!-- CSS -->
      <link href="{{ asset('dist/css/main.css') }}" rel="stylesheet" type="text/css">
      <!-- Favicon -->
      <link rel="icon" type="image/png" href="{{ asset('dist/img/favicon.ico') }}">
   </head>
    
    <!-- body start -->
   <body>
      <header>
         <div class="container"> 
            <div class="row">
               <div class="col-lg-12 col-12 text-center">
                  <img src="dist/img/logo.png" alt="">
               </div>
            </div>
         </div>
      </header>

      <section class="bnrsection">
         <!-- <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12 p-0">
                  <img src="dist/img/bnr.jpg" alt="">
               </div>
            </div>
         </div> -->
         <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12 text-center">
                    <h2>Thankyou...</h2>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                 </div>
            </div>
        </div>
    </section>


    
    <footer class="fixed-bottom">
        <div class="container">
           <div class="row">
              <div class="col-lg-12 col-12"> 
                 <h5>Lorem Ipsum is simply dummy text</h5>
                 <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                 <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                 <p>Copyright@2022</p>
              </div>
           </div>
        </div>
     </footer>




      <script src="{{ asset('dist/js/app.js') }}"></script>
   </body>
    <!--body end -->
    
</html>