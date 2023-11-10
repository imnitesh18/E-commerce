<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/lg.png" type="">
      <title>Online Store</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home/header')
         <!-- end header section -->

         <!-- slider section -->
        

        <!-- {{$product->title}} -->
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px;">
                  
                     <div class="img-box" style="padding: 20px;">
                        <img src="product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>

                        @if($product->discount_price != null)

                        <h6 style="text-decoration: line-through; color: blue;">
                           ₹{{$product->price}}
                        </h6>

                        <h6 style="color: red;">
                           ₹{{$product->discount_price}}
                        </h6>

                        @else

                        <h6 style="color: red;">
                           ₹{{$product->price}}
                        </h6>

                        @endif

                        <h6>Product Catagory : {{$product->catagory}}</h6>
                        <h6>Product Description : {{$product->description}}</h6>
                        <h6>Availabel Quantity : {{$product->quantity}}</h6>

                        <form action="{{url('add_cart', $product->id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                              </div>
                              <div class="col-md-4">
                                 <input type="submit" value="Add To Cart">
                              </div>
                           </div>
                        </form>


                     </div>
                  </div>
               </div>
         

      <!-- footer start -->
      @include('home/footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://github.com/imnitesh18">Nitesh Kumar</a><br>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>