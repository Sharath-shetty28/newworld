
<!DOCTYPE html>
<html>
<head>
    <title>Dictionary</title>
</head>
<body>
    <h2>Dictionary</h2>
    <form method="post" >
        <label for="word">Enter a word:</label>
        <input type="text" name="word">
        <input type="submit" value="Search">
<br>
    </form>
</body>
</html>
<?php

// Dictionary associative array
$dictionary = array(
    "apple" => "a round fruit with red ",
    "banana" => "the color is yellow",
    "cat" => "my cat name is yoyo",
    "dog" => " claws and a barking",
    "elephant" => "a large animal ",
    "fish" => "lives in water",
    "guitar" => " musical instrument ",
    "house" => " small group of people",
    "ice cream" => " flavored milk fat",
    "jazz" => "a type of music of black "
);

// Check if word is provided by the user
if(isset($_POST['word'])) {
    $word = strtolower($_POST['word']); 
    
    // Check if the word exists in the dictionary
    if(array_key_exists($word, $dictionary)) {
        
        $meaning = $dictionary[$word];
        echo "Meaning::$word: $meaning";
    } else {
        echo "Word not found";
    }
}
?>
