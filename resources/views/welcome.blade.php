<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Loan Calculator -example</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<form id="calculateEmiForm" method="get" action="">
    {{ csrf_field()}}
<h2>Calculate your instalment</h2>
<table class="table">
<tr>
<td>Loan capital</td><td><input type="text" name="capital" maxlength="7" size="7"></td>
</tr>
<tr>
<td>Time in years</td>
<td>
<select name="year">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
</select>
</td>
</tr>
<tr>
<td>Interest</td>
<td>
<select name="interest">
<option>1.00</option>
<option>1.25</option>
<option>1.50</option>
<option>1.75</option>
<option>2.00</option>
<option>2.25</option>
<option>2.50</option>
<option>2.75</option>
<option>3.00</option>
<option>3.25</option>
<option>3.50</option>
<option>3.75</option>
<option>4.00</option>
<option>4.25</option>
<option>4.75</option>
<option>5.00</option>
</select>
</td>
</tr>
<tr>
<td>Instalment</td>
<td>
<select name="instalment">
<option>Fixed</option>
<option>Annuity</option>
</select>
</td>
</tr>
</table>
<br />
<input type="button" id="calculateEmi" value="Calculate">
</form>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Script to add table row -->
<script> 
    let lineNo = 1; 
    $(document).ready(function () { 
        $("#calculateEmi").click(function () { 
        $.ajax({
            url: "{{route('calculateEmi')}}",
            type: "get",
            data: $('#calculateEmiForm').serialize(),
            success: function(data){
                console.log(data.data);
                $.each(data.data, function( index, value ) {
                    console.log( index + ": " + value );
                    markup = "<tr><td>" +index + + value + "</td></tr>"; 
                    tableBody = $("table tbody"); 
                    tableBody.append(markup); 
                    lineNo++;
                    });
            }
         }); 
        }); 
    });  
</script> 
