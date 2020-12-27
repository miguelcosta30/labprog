<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td align ="right">
            <h3>Online Store</h3>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Online Store </td>
        <td><strong>To:</strong>Street: {{$streetName}} Door Number: {{$doorNumber}} Floor: {{$floor}} Zipcode: {{$zipcode}}</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price €</th>
      </tr>
    </thead>
    <tbody>
    @foreach($prod as $id => $product)
    
      <tr>
        <td>{{$product[1]}}</td>
        <td align="right">{{$product[3]}}</td>
        <td align="right">{{$product[2]}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total €</td>
            <td align="right" class="gray">{{$total}} €</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>