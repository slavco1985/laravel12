<!DOCTYPE html>
<html>
<head>
    <title>Payment Recieved Sucessfully</title>
    <!-- CSS only -->
    <style>
      .invtable td{ padding: 5px; }
       .right{
         text-align:right;
       }
       .center{
         text-align:center;
       }
       .bbg{
         background-color:rgba(204, 204, 204, 0.19);
       }
    </style>
</head>
<body>


   
<table style="padding:10px" width="50%" cellspacing="0" cellpadding="0">
  @if(!empty($detail->logo))
  <tr>
      <td colspan="2"><img src="{{ asset('uploads/logo/'.$detail->logo) }}" width="250"  /></td>
  </tr>
  @endif
  <tr>
    <td colspan="2"> </td>
  </tr>
  
  <tr >
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="invtable" >
            <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; " width="40%" height="22" class="bbg" ><b>Package Name</b></td>
            <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333; border-top:1px solid #333; ">&nbsp;&nbsp;&nbsp; {{ $trans->package->name }}</td>
      </tr>
     
      <tr class="invtable">
        <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; " width="15%" class=" bbg" ><b>Package Price</b></td>
        <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;" height="22">&nbsp;&nbsp;&nbsp; {{currency()}}{{ $trans->amount }}</td>
      </tr>

      <tr class="invtable">
        <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; " width="15%" class=" bbg" ><b>Package Validity</b></td>
        <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;" height="22">&nbsp;&nbsp;&nbsp; {{ $trans->package->validity }} Months</td>
      </tr>
       
      <tr class="invtable">
        <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333;" width="15%" class=" bbg" ><b>Status</b></td>
        <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;" height="22">&nbsp;&nbsp;&nbsp; Success</td>
      </tr>

      <tr class="invtable">
        <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333;" width="15%" class=" bbg" ><b>Transaction ID</b></td>
        <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;" height="22">&nbsp;&nbsp;&nbsp; {{ $trans->payment_id }}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"> </td>
  </tr>
 

  <tr>
    <td colspan="2"> </td>
  </tr>
</table>
</body>
</html>