<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Insert Products | Online Store</title>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">BackOffice</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('form')}}">Insert <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{route('formEditRemove')}}">Edit/Remove</a>
          </li>
          <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Mainpage</a>
          </li>
        </ul>
      </div>
    </nav>
    <form action="{{url('/form')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="inputName">Product Name</label>
        <input type="text" class="form-control" id="inputName" name="product_name">
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputFirstSpect">First Spec</label>
          <input type="text" class="form-control" id="inputFirstSpect" name="first_spec">
        </div>
        <div class="form-group col-md-4">
          <label for="inputSecSpect">Second Spec</label>
          <input type="TEXT" class="form-control" id="inputSecSpect" name="second_spec">
        </div>
        <div class="form-group col-md-4">
          <label for="inputThridSpect">Third Spec</label>
          <input type="text" class="form-control" id="inputThridSpect" name="third_spec">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPrice">Price</label>
          <input type="text" class="form-control" id="inputPrice" placeholder="no symbols like € (IVA included)" name="product_price">
        </div>
        <div class="form-group col-md-2">
          <label for="inputStock">Stock</label>
          <input type="text" class="form-control" id="inputStock" name="product_stock">
        </div>
        <div class="form-group col-md-4">
          <label for="inputType">Type</label>
          <select id="inputType" class="form-control" name="product_type">
            <option value="phone">Phone</option>
            <option value="graphic">Graphic Card</option>
            <option value="processor">Processor</option>
            <option value="console">Consoles</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File</label>
        <input type="file" name="picture" class="form-control" id="exampleInputFile">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <br>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>