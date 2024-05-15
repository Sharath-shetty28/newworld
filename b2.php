<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Operations</title>
</head>
<body>
    <h1>Matrix Operations</h1>

    <form method="post">
        <h2>Enter Matrix A dimensions:</h2>
        Rows: <input type="number" min="1" name="rowA" placeholder="Enter rows" >
        Columns: <input type="number" min="1" name="colA" placeholder="Enter columns" ><br/>

        <h2>Enter Matrix B dimensions:</h2>
        Rows: <input type="number" min="1" name="rowB" placeholder="Enter rows" >
        Columns: <input type="number" min="1" name="colB" placeholder="Enter columns" ><br/>

        <br/><br/>
        <input type="submit" name="operation" value="Add"/> 
        <input type="submit" name="operation" value="Multiply"/>

        <!-- Matrix A -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rowA = $_POST['rowA'] ?? 0;
            $colA = $_POST['colA'] ?? 0;
            $rowB = $_POST['rowB'] ?? 0;
            $colB = $_POST['colB'] ?? 0;

            if ($_POST['operation'] == 'Add') {
                if ($rowA > 0 && $colA > 0 && $rowB > 0 && $colB > 0) {
                    if ($rowA != $rowB || $colA != $colB) {
                        echo "<p style='color: red'>Dimensions of both matrices must be the same for addition.</p>";
                    } else {
                        echo "<h2>Enter Matrix A values:</h2>";
                        echoMatrixInput($rowA, $colA, 'A');
                        echo "<h2>Enter Matrix B values:</h2>";
                        echoMatrixInput($rowB, $colB, 'B');
                    }
                }
            } elseif ($_POST['operation'] == 'Multiply') {
                if ($rowA > 0 && $colA > 0 && $rowB > 0 && $colB > 0) {
                    if ($colA != $rowB) {
                        echo "<p style='color: red'>Number of columns in matrix A must match number of rows in matrix B for multiplication.</p>";
                    } else {
                        echo "<h2>Enter Matrix A values:</h2>";
                        echoMatrixInput($rowA, $colA, 'A');
                        echo "<h2>Enter Matrix B values:</h2>";
                        echoMatrixInput($rowB, $colB, 'B');
                    }
                }
            }
        }

        function echoMatrixInput($rows, $cols, $label) {
            echo "<table>";
            for ($i = 0; $i < $rows; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $cols; $j++) {
                    echo "<td><input type='number' name='matrix{$label}[$i][$j]' min='1' placeholder='Enter value for {$label}[$i][$j]' required></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br/><br/>";
        }
        ?>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['operation'])) {
        $matrixA = $_POST['matrixA'] ?? [];
        $matrixB = $_POST['matrixB'] ?? [];

        if ($_POST['operation'] == 'Add') {
            $result = addMatrices($matrixA, $matrixB);
            printMatrix($result, 'A + B');
        } elseif ($_POST['operation'] == 'Multiply') {
            $result = multiplyMatrices($matrixA, $matrixB);
            printMatrix($result, 'A * B');
        }
    }

    function addMatrices($matrixA, $matrixB) {
        if (empty($matrixA) || empty($matrixB)) {
            return [];
        }
    
        $rowsA = count($matrixA);
        $colsA = count($matrixA[0]);
        $rowsB = count($matrixB);
        $colsB = count($matrixB[0]);
    
        if ($colsA == 0 || $colsB == 0) {
            return [];
        }
    
        $result = [];
        for ($i = 0; $i < $rowsA; $i++) {
            $result[$i] = [];
            for ($j = 0; $j < $colsA; $j++) {
                $result[$i][$j] = $matrixA[$i][$j] + $matrixB[$i][$j];
            }
        }
        return $result;
    }

    function multiplyMatrices($matrixA, $matrixB) {
        $rowsA = count($matrixA);
        $colsA = $rowsA > 0 ? count($matrixA[0]) : 0;
        $rowsB = count($matrixB);
        $colsB = $rowsB > 0 ? count($matrixB[0]) : 0;
    
        if ($colsA == 0 || $colsB == 0) {
            return [];
        }
    
        $result = [];
        for ($i = 0; $i < $rowsA; $i++) {
            $result[$i] = [];
            for ($j = 0; $j < $colsB; $j++) {
                $sum = 0;
                for ($k = 0; $k < $colsA; $k++) {
                    $sum += $matrixA[$i][$k] * $matrixB[$k][$j];
                }
                $result[$i][$j] = $sum;
            }
        }
        return $result;
    }

    function printMatrix($matrix, $label) {
        echo "<h2>$label</h2>";
        echo "<table border='1'>";
        foreach ($matrix as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>