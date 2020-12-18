<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Area de Cliente | Login</title>
    <link rel="stylesheet" href="{{ asset('css/mycss.css')}}" >
</head>

<body>
    <div class="container">
        <h1 style="color:white">Login</h1>
        <form mehtod="post">
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="   Email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="   Password">
            </div>
            <div class="container text-center">
                <div class="forgot-pw">
                    <p><a href="http://homestead.test/projeto/customer/account/recoverpw.php" style="color: white "> Forgot Passoword?</a></p>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button> <br></br>
                <a type="submit" class="btn btn-primary" href = "http://homestead.test/projeto/customer/account/register.php" style="height:3.5%">Register</a>
            </div>
        </form>
    </div>
</body>

</html>