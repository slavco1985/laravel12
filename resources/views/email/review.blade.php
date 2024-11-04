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
            <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; " width="40%" height="22" class="bbg" ><b>Business Name</b></td>
            <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333; border-top:1px solid #333; ">&nbsp;&nbsp;&nbsp; {{ $review->listing->business_name }}</td>
      </tr>
     
      <tr class="invtable">
        <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; " width="15%" class=" bbg" ><b>Rating</b></td>
        <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;" height="22">&nbsp;&nbsp;&nbsp; {{ $review->rating }}</td>
      </tr>

      <tr class="invtable">
        <td style="border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; " width="15%" class=" bbg" ><b>Message</b></td>
        <td style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;" height="22">&nbsp;&nbsp;&nbsp; {{ $review->message }} Months</td>
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