<!DOCTYPE html>
<html>
<body>
 <form method="post">
 enter the number of row:<input type="number" name="row" placeholder="Enter the number of rows"><br>
 enter the number of column:<input type="number" name="col" placeholder="Enter the number of columns"><br/>
 <input type="submit" name="submit" value="Submit">
 </form>
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['row']) && isset($_POST['col'])) {
     $row = $_POST['row'];
     $col = $_POST['col'];
     
     echo "<form method='post'>";
     echo "Enter matrix A<br>";
     for ($i = 0; $i < $row; $i++) {
         for ($j = 0; $j < $col; $j++) {
             echo "<input type='number' name='matrixA[$i][$j]' placeholder='Enter the value of matrixA[$i][$j]' required>";
         }
         echo "<br>";
     }
     
     echo "<br/><br>Enter matrix B<br>";
     for ($i = 0; $i < $row; $i++) {
         for ($j = 0; $j < $col; $j++) {
             echo "<input type='number' name='matrixB[$i][$j]' placeholder='Enter the value of matrixB[$i][$j]' required>";
         }
         echo "<br>";
     }
     
     echo "<input type='submit' name='Add' value='Add'> <input type='submit' name='Multiply' value='Multiply'>";
 }
 echo "</form>";
 function printMatrix($matrix) {
     echo '<table border="1">';
     foreach ($matrix as $row) {
         echo '<tr>';
         foreach ($row as $element) {
             echo '<td>' . $element . '</td>';
         }
         echo '</tr>';
     }
     echo '</table>';
 }
 if (isset($_POST['Add'])) {
     $matrixA = $_POST['matrixA'];
     $matrixB = $_POST['matrixB'];
     
     if (count($matrixA) != count($matrixB) || count($matrixA[0]) != count($matrixB[0])) {
          echo "error";
     } else {
         $result = [];
         foreach ($matrixA as $i => $rowA) {
             foreach ($rowA as $j => $colA) {
                 $result[$i][$j] = $colA + $matrixB[$i][$j];
             }
         }
         printMatrix($result);
     }
 }
 if (isset($_POST['Multiply'])) {
     $matrixA = $_POST['matrixA'];
     $matrixB = $_POST['matrixB'];
     
     if (count($matrixA[0]) != count($matrixB)) {
          echo "must equal";
     } else {
         $result = [];
         for ($i = 0; $i < count($matrixA); $i++) {
             for ($j = 0; $j < count($matrixB[0]); $j++) {
                 $result[$i][$j] = 0;
                 for ($k = 0; $k < count($matrixB); $k++) {
                     $result[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
                 } } }
         printMatrix($result);
     }
 }
 ?>
</body>
</html>
