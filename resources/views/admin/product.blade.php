<!DOCTYPE html> 
<html lang="en">
    <head>
        <style> 
        .div_center{ 
            text-align: center; 
            padding-to: 40px; 
        } 
        .h1_font{
            font-size: 40px;
            padding-bottom: 40px; 
        }
        .text_color{ 
            color: black; 
            padding-bottom: 20px; 
        } 
        label{ 
            display: inline-block; 
            width: 200px; 
        } 
        .div_design{
            padding-bottom: 15px; 
        } 
        </style>

<!-- Required meta tags -->

@include('admin/css')
</head>

<body> <div class="container-scroller"> <!-- partial:partials/_sidebar.html -->
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


            <div class="div_center">
                <h1 class="h1_font">Add Products</h1>

                <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="div_design">
                        <label for="">Product Title : </label>
                        <input class="text_color" type="text" name="title" placeholder="Write the Title" required="">
                    </div>

                    <div class="div_design">
                        <label for="">Product Description : </label>
                        <input class="text_color" type="text" name="description" placeholder="Write the Description"
                            required="">
                    </div>

                    <div class="div_design">
                        <label for="">Product Price : </label>
                        <input class="text_color" type="number" name="price" placeholder="Write the Price" required="">
                    </div>

                    <div class="div_design">
                        <label for="">Discount Price : </label>
                        <input class="text_color" type="number" name="discount_price" placeholder="Write the Discount">
                    </div>

                    <div class="div_design">
                        <label for="">Product Quantity : </label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write the Quantity"
                            required="">
                    </div>

                    <div class="div_design">
                        <label for="">Product Catagory : </label>
                        <select class="text_color" name="catagory" required="">
                            <option value="" selected="">Select a Catagory</option>
                            
                            @foreach($catagory as $catagory)
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="div_design">
                        <label for="">Product Images : </label>
                        <input type="file" name="image" required="">
                    </div>

                    <div class="div_design">
                        <input class="btn btn-primary" type="submit" value="Add Product">
                    </div>

                </form>
            </div>

        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin/script')

    <!-- End custom js for this page -->
    </body>

    </html>