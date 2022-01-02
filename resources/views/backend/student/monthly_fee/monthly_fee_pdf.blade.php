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

@php

$registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();

$originalfee = $registrationfee->amount;
    	 	$discount = $details['discount']['discount'];
    	 	$discounttablefee = $discount/100*$originalfee;
    	 	$finalfee = (float)$originalfee-(float)$discounttablefee;

@endphp

<?php $image_path='/upload/easyschool.png'; ?>
<p style="text-align:center;">
<img src="{{ public_path() . $image_path }}" alt="school logo" width="150px" >
</p>
<br>


<h2 style="text-align:center;">Monthly Fee Payslip - Student Copy</h2>
<h2 style="text-align:center;">For the Month: {{ $month }}</h2>

<div style="text-align:right;">
    <i>This document is printed on date: {{ date("d M Y") }}</i>
</div>


<hr>

<table border="1">
<tr height="100px" style="background-color:#363636;color:#ffffff;text-align:center;font-size:24px; font-weight:600;">
<td colspan='4' style="color:white;"><strong>Name: </strong>{{  $details['student']['name'] }}</td>
</tr>
<tr>
<th>ID No:</th>
<td>{{  $details['student']['id_no'] }}</td>
<th>Roll No:</th>
<td>{{ $details->roll }}</td>
</tr>
<!-----2 row--->
<tr>
<th>Session:</th>
<td>{{ $details['student_year']['name'] }}</td>
<th>Class:</th>
<td>{{ $details['student_class']['name'] }}</td>
</tr>
<tr>
<th>Father's Name:</th>
<td>{{ $details['student']['fname'] }}</td>
<th>Mother's Name:</th>
<td>{{ $details['student']['mname'] }}</td>
</tr>
<!------3 row---->
<tr>
<th>Monthly Fee:</th>
<td>Nu. {{ $originalfee }}</td>
<th>Discount Fee:</th>
<td>Nu. {{ $discount }}%</td>
</tr>
<!------4 row---->
<tr>
<th>Fee For this Student:</th>
<td>Nu. {{ $finalfee }}</td>
<th></th>
<td></td>
</tr>
</table>

<hr style="border: dashed 2px; color:#000000; margin-bottom: 50px ">


<p style="text-align:center;">
<img src="{{ public_path() . $image_path }}" alt="school logo" width="150px" >
</p>
<br>

<h2 style="text-align:center;">Monthly Fee Payslip - Office Copy</h2>
<h2 style="text-align:center;">For the Month: {{ $month }}</h2>

<div style="text-align:right;">
    <i>This document is printed on date: {{ date("d M Y") }}</i>
</div>


<hr>

<table border="1">
<tr height="100px" style="background-color:#363636;color:#ffffff;text-align:center;font-size:24px; font-weight:600;">
<td colspan='4' style="color:white;"><strong>Name: </strong>{{  $details['student']['name'] }}</td>
</tr>
<tr>
<th>ID No:</th>
<td>{{  $details['student']['id_no'] }}</td>
<th>Roll No:</th>
<td>{{ $details->roll }}</td>
</tr>
<!-----2 row--->
<tr>
<th>Session:</th>
<td>{{ $details['student_year']['name'] }}</td>
<th>Class:</th>
<td>{{ $details['student_class']['name'] }}</td>
</tr>
<tr>
<th>Father's Name:</th>
<td>{{ $details['student']['fname'] }}</td>
<th>Mother's Name:</th>
<td>{{ $details['student']['mname'] }}</td>
</tr>
<!------3 row---->
<tr>
<th>Monthly Fee:</th>
<td>Nu. {{ $originalfee }}</td>
<th>Discount Fee:</th>
<td>Nu. {{ $discount }}%</td>
</tr>
<!------4 row---->
<tr>
<th>Fee For this Student:</th>
<td>Nu. {{ $finalfee }}</td>
<th></th>
<td></td>
</tr>
</table>

<br/>
</body>
</html>
