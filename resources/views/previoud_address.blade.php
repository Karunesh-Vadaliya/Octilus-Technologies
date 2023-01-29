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
      <link href="{{ asset('dist/css/custom.css') }}" rel="stylesheet" type="text/css">
      <!-- Favicon -->
      <!-- <link rel="icon" type="image/png" href="{{ asset('dist/img/favicon.ico') }}">s -->
   </head>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!-- body start -->
   <body>
      <header>
         <div class="container"> 
            <div class="row">
               <div class="col-lg-12 col-12 text-center">
                  <img src="{{ asset('dist/img/logo.png') }}" alt="">
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
                  <h1>Hi <span>{{$data->first_name}}</span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
               </div>
               <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-12 text-center">
                  <div class="formpart">
                     <div id="duplicate-address-error" class="alert alert-danger" style="display: none;">
                        <p>All fields are required,   Duplicate address not allowed.</p>
                     </div>
                     @if (session('fail'))
                        <div class="alert alert-danger">
                              {{ session('fail') }}
                        </div>
                     @endif
                     <form action="{{ route('user-address')}}" method="POST" id="user-address-form">
                        <input type="hidden" name="record_id" value="{{$data->id}}" />
                        @csrf
                        <div id="address-option" style="display: block;">
                           <h3>Do you have a Previous Address?</h3>
                           <div class="form-check" onclick="showAddress()">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label next02" for="flexRadioDefault1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check" onclick="thankyoupage()">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label tothank" for="flexRadioDefault2">
                              No
                            </label>
                          </div>
                        </div>
                        
                        <div id="user-address-div"style="display:none;">
                           <div id="address-div-main">
                              <h3>Enter your Previous Address</h3>
                              <div class="address-div-dynamic">
                                 <div class="mb-3 text-start">
                                    <label class="form-label">Previous Address 1</label>
                                    <input type="text" name="line1[]" class="form-control mb-3" placeholder="Address line 1">
                                    <input type="text" name="line2[]" class="form-control mb-3" placeholder="Address line 2">
                                    <input type="text" name="line3[]" class="form-control mb-3" placeholder="Address line 3">
                                 </div>
                              </div>
                           </div>
                           
                            <div class="mb-3 text-center" id="submitoradd01">
                                <button type="button" onclick="checkAddress()" class="btn btn-success tothank">Submit</button>
                                <p><a href="javascript:void(0);" onclick="addAddress()">Add Another Address</a></p>
                                <p id="remove-address-button"><a href="javascript:void(0);" onclick="removeAddress()">Remove Address</a></p>
                                <p><a href="javascript:void(0);" onclick="hideAddress()"><< Back</a></p>
                            </div> 
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <footer>
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



      <!-- <script src="{{ asset('dist/js/app.js') }}"></script> -->
      <script src="{{ asset('dist/js/user_details.js') }}"></script>
      <script>
         function thankyoupage(){
            window.location.href = "{{ route('thankyou')}}";
         }
      </script>
   </body>
    <!--body end -->
    
</html>