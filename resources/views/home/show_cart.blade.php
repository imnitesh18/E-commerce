<!DOCTYPE html>
<html>
   <head>
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

      <style>
        .table_center{
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }

        table, th, td{
            border: 1px solid black;
        }

        .th_style{
            font-size: 20px;
            padding: 5px;
            background-color: yellow;
        }

        .img_style{
            height: 200px;
            width: 200px;
        }

        .total_style{
            font-size: 20px;
            padding: 40px;
        }

        .btn_style{
            margin: 10px;
        }

      </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home/header')
         <!-- end header section -->

         @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

            @endif


      <div class="table_center">
        <table>
            <tr>
                <th class="th_style">Product Title</th>
                <th class="th_style">Product Quantity</th>
                <th class="th_style">Price</th>
                <th class="th_style">Image</th>
                <th class="th_style">Action</th>
            </tr>

            <?php $totalprice=0; ?>

            @foreach($cart as $cart)

            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>₹ {{$cart->price}}</td>
                <td><img class="img_style" src="/product/{{$cart->image}}" alt=""></td>
                <td>
                    <a class="btn btn-danger btn_style" href="{{url('/remove_cart', $cart->id)}}" onclick="return confirm('Are you sure to remove this product ? ')">Remove</a>
                </td>
            </tr>

            <?php $totalprice=$totalprice + $cart->price; ?>

            @endforeach

        </table>

        <div>
            <h1 class="total_style">Total Price : ₹ {{$totalprice}}</h1>
        </div>

        <div>
            <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed to Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="" class="btn btn-danger">Pay Using Card</a>
        </div>

      </div>


      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://github.com/imnitesh18">Nitesh Kumar</a><br>
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