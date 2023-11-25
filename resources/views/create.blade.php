
@extends('layouts.app')


<?php 
  
  $servername = "localhost"; 
  $username = "root"; 
  $password = ""; 
  $databasename = "ims"; 
  
  
  $conn = new mysqli($servername, $username, $password, $databasename); 
  

  if ($conn->connect_error) { 
      die("Connection failed: " . $conn->connect_error); 
  } 
  $query = "SELECT * FROM `product`;"; 
  

  $products = $conn->query($query); 
  $conn->close(); 
  
?>
@section('content')
    <div class="container">
        <h2>Create Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
