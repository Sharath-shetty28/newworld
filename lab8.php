<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Analyzer</title>
</head>
<body>
    <h1>Word Frequency Analyzer</h1>
    <form action="" method="post">
        <label for="text">Enter string:</label>
        <input type="text" name="text">
        <input type="submit" value="analyze">
    </form>

    <?php
    function sortwordcount($array, $order) {
        if ($order == 'asc') {
            ksort($array);
        } else {
            krsort($array);
        }
        return $array;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];
        $text = strtolower($text);
        $words = str_word_count($text, 1);
        $wordcount = array_count_values($words);

        // Storing most and least used words before sorting
        reset($wordcount);
        $mostusedwordBefore = key($wordcount);
        $mostusedcountBefore = current($wordcount);

        end($wordcount);
        $leastusedwordBefore = key($wordcount);
        $leastusedcountBefore = current($wordcount);

        // Sorting word count array
        if (isset($_POST['sorted'])) {
            $sorted = $_POST['sorted'];
            $wordcount = sortwordcount($wordcount, $sorted);
        }

        echo "<h3>Word frequencies</h3>";
        foreach ($wordcount as $word => $count) {
            echo "$word: $count times <br>";
        }

        // Printing most and least used words using the stored values
        echo "most used word: $leastusedwordBefore (used $leastusedcountBefore times) <br>";
        echo "least used word: $mostusedwordBefore (used $mostusedcountBefore times) <br>";

        echo "<form method='post'>
            <input type='hidden' name='text' value='$text'>
            <input type='hidden' name='sorted' value='asc'>
            <button type='submit'>Sort Ascending</button>
        </form>";

        echo "<form method='post'>
            <input type='hidden' name='text' value='$text'>
            <input type='hidden' name='sorted' value='desc'>
            <button type='submit'>Sort Descending</button>
        </form>";
    }
    ?>
</body>
</html>
