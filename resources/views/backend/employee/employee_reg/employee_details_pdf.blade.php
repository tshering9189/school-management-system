<html>
<head>
<style>
table{
width: 100%;
border-collapse:collapse;
border: 1px solid black;
}
table td{line-height:25px;padding-left:15px;}
table th{background-color:#fbc403; color:#363636;}
</style>

</head>
<body>


<?php $image_path='/upload/easyschool.png'; ?>
<p style="text-align:center;">
<img src="{{ public_path() . $image_path }}" alt="school logo" width="150px" >
</p>
<br>


<h2 style="text-align:center;">Employee Details</h2>

<div style="text-align:right;">
    <i>This document is printed on date: {{ date("d M Y") }}</i>
</div>


<hr>

<table border="1">
<tr height="100px" style="background-color:#363636;color:#ffffff;text-align:center;font-size:24px; font-weight:600;">
<td colspan='4' style="color:white;"><strong>Employee Name: </strong>{{  $details->name }}</td>
</tr>
<!-----2 row--->
<tr>
<th>Father's Name:</th>
<td>{{ $details->fname }}</td>
<th>Mother's Name:</th>
<td>{{ $details->mname }}</td>
</tr>
<!------3 row---->
<tr>
<th>Mobile No:</th>
<td>{{ $details->mobile }}</td>
<th>Address:</th>
<td>{{ $details->address }}</td>
</tr>
<!------4 row---->
<tr>
<th>Gender:</th>
<td>{{ $details->gender }}</td>
<th>Religion:</th>
<td>{{ $details->religion }}</td>
</tr>
<!------5 row---->
<tr>
<th>D.O.B:</th>
<td>{{ date('d-m-y',strtotime($details->dob)) }}</td>
</tr>
<!------5 row---->
<tr>
<th>Designation:</th>
<td>{{ $details['designation']['name'] }}</td>
<th>Joining Date:</th>
<td>{{ date('d-m-y',strtotime($details->join_date)) }}</td>
</tr>
<!------6 row---->
<tr>
<th>Salary:</th>
<td>{{ $details->salary }}</td>
</tr>
</table>

<hr style="border: dashed 2px; color:#000000; margin-bottom: 50px ">


<br/>
</body>
</html>
