<!DOCTYPE html>
<html lang="en">
  <head>

  <style>
    .table_center{
        margin: auto;
        /* width: 50%; */
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .h2_font{
        text-align: center;
        font-size: 40px; 
        padding-top: 20px;
    }

    .image_size{
        width: 150px;
        height: 150px;
    }

    .th_style{
        background: grey;
    }

    .th_style{
        padding: 30px;
    }
  </style>
    <!-- Required meta tags -->
    @include('admin/css')
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

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

            @endif

            <h2 class="h2_font">All Products</h2>

            <table class="table_center">
                <tr class="th_style">
                    <th class="th_style">Product Title </th>
                    <th class="th_style">Description </th>
                    <th class="th_style">Quantity </th>
                    <th class="th_style">Category </th>
                    <th class="th_style">Price </th>
                    <th class="th_style">Discount Price </th>
                    <th class="th_style">Product Image</th>
                    <th class="th_style">Delete </th>
                    <th class="th_style">Edit</th>
                </tr>

                @foreach($product as $product)

                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->catagory}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img class="image_size" src="/product/{{$product->image}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{url('delete_product', $product->id)}}" onclick="return confirm('Are you sure want to Delete')">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product', $product->id)}}">Edit</a>
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