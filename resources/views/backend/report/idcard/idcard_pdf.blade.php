<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>Easy School ERP</h2>
<p>School Address</p>
<p>Phone : 343434343434</p>
<p>Email : support@easylerningbd.com</p>
<p> <b> Student ID Card </b> </p>

    </td> 
  </tr>
  
   
</table>

<br> <br>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

@foreach($allData as $value)
<table id="customers">
    <tr>
        <td>Image</td>
        <td>Druk School</td>
        <td>Student ID Card</td>
    </tr>


    <tr>
        <td>Name: {{ $value['student']['name'] }}</td>
        <td>Session: {{ $value['student_year']['name'] }}</td>
        <td>Class: {{ $value['student_class']['name'] }}</td>
    </tr>
    <tr>
        <td>Roll: {{ $value->roll }}</td>
        <td>ID No: {{ $value['student']['id_no'] }}</td>
        <td>Mobile: {{ $value['student']['mobile'] }}</td>
    </tr>
</table>
<br>
@endforeach
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

 

</body>
</html>
