
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
        <h2>Product List</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


