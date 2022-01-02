<html>

 <body>

 This report is generated on: {{ date('d M Y') }}
 <hr>

  <table width="800" border="0" align="center" cellpadding="5">
   <tr>
    <td colspan="2">Basic Info<hr/></td>
   </tr>
   <tr>
    <td width="50%" align="right">Full Name:</td>
    <td>{{ $details['student']['name']}}</td>
   </tr>
   <tr>
    <td align="right">Father's Name:</td>
    <td>{{ $details['student']['fname']}}</td>
   </tr>
   <tr>
    <td align="right">Mother's Name:</td>
    <td>{{ $details['student']['mname']}}</td>
   </tr>
   <tr>
    <td align="right">Student ID Number:</td>
    <td>{{ $details['student']['id_no']}}</td>
   </tr>
   <tr>
    <td align="right">Date of Birth:</td>
    <td>{{ $details['student']['dob']}}</td>
   </tr>
   <tr>
    <td align="right">Religion:</td>
    <td>{{ $details['student']['religion']}}</td>
   </tr>
   <tr>
    <td align="right">Nationality:</td>
    <td>{{ $details['student']['name']}}</td>
   </tr>
   <tr>
    <td colspan="2">Contact Details<hr/></td>
   </tr>
   <tr>
    <td align="right" valign="top">Address:</td>
    <td>{{ $details['student']['address']}}</td>
   </tr>
   <tr>
    <td align="right" valign="top">Phone Number:</td>
    <td>{{ $details['student']['mobile']}}</td>
   </tr>
   <tr>
    <td align="right">Gender:</td>
    <td>{{ $details['student']['gender']}}</td>
   </tr>
   <tr>
    <td colspan="2">Eduction & Knowledge<hr/></td>
   </tr>
   <tr>
    <td align="right">Year:</td>
    <td>{{ $details['student_year']['name'] }}</td>
   </tr>
   <tr>
    <td align="right">Class:</td>
    <td>{{ $details['student_class']['name'] }}</td>
   </tr>
   <tr>
    <td align="right">Shift:</td>
    <td>{{ $details['shift']['name'] }}</td>
   </tr>
   <tr>
    <td align="right">Group:</td>
    <td>{{ $details['group']['name'] }}</td>
   </tr>
   <tr>
    <td align="right">Student Roll:</td>
    <td>{{ $details->roll }}</td>
   </tr>
   <tr>
    <td align="right">Discount:</td>
    <td>{{ $details['discount']['discount'] }}%</td>
   </tr>
  </table>

  <hr>
  END
 </body>

</html>