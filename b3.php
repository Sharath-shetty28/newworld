
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Distance</title>
</head>

<body>
<h2>Distance</h2>
<form action="" method="post">
Distance1:<br />
Feet1:<input type="number" name="feet1" required="required" /><br />
Inches1:<input type="number" name="inches1" required /><br />
Distance2:<br />
Feet2:<input type="number" name="feet2" required="required" /><br />
Inches2:<input type="number" name="inches2" required /><br />
<br />
<input type="submit" name="calculate" value="calculate" />
</form>
<?php
class DistanceCalculator
{
	public static function add($feet1,$inches1,$feet2,$inches2)
	{
		$total_feet = $feet1 + $feet2;
		$total_inches = $inches1 + $inches2;
		if($total_inches>=12)
		{
			$total_feet += floor($total_inches/12);
			$total_inches %=12;
		}
		return array($total_feet,$total_inches);
	}
	public static function subtract($feet1,$inches1,$feet2,$inches2)
	{
		$total_feet = $feet1 - $feet2;
		$total_inches = $inches1 - $inches2;
		if($total_inches<0)
		{
			$total_feet -=1;
			$total_inches +=12;
		}
		return array($total_feet,$total_inches);
	}
}
if(isset($_POST["calculate"]))
{
	$feet1 = $_POST["feet1"];
	$inches1 = $_POST["inches1"];
	$feet2 = $_POST["feet2"];
	$inches2 = $_POST["inches2"];
	list($sum_feet,$sum_inches) = DistanceCalculator::add($feet1,$inches1,$feet2,$inches2);
	list($diff_feet,$diff_inches) = DistanceCalculator::subtract($feet1,$inches1,$feet2,$inches2);
	echo"<br>Sum:$sum_feet feet $sum_inches inches <br>";
	echo"<br>Diff:$diff_feet feet $diff_inches inches";
}

	
?>
</body>
</html>
