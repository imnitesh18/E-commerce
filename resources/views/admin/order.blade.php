<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin/css')

    <style>
        .title_style{
            text-align: enter;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_style{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .th_style{
            background-color: skyblue;
        }

        .img_style{
            width: 200px;
            height: 200px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin/sidebar')
      <!-- partial -->
      @include('admin/header')
        <!-- partial -->
        
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_style">All Orders</h1>

                <table class="table_style">
                    <tr class="th_style">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                    </tr>

                    @foreach($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <th>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="img_style" src="/product/{{$order->image}}" alt="">
                        </td>
                        <td>
                            @if($order->delivery_status == 'Processing')

                            <a class="btn btn-primary" href="{{url('delivered', $order->id)}}">Delivered</a>
                            
                            @else

                            <p style="color: red;">Delivered</p>

                            @endif

                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin/script')
    
    <!-- End custom js for this page -->
  </body>
</html>