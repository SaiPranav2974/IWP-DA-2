<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher Encryption Result</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Caesar Cipher Encryption Result</h2>
        <?php
        // Retrieve input text from the form
        $input_text = $_POST['input_text'];

        // Explode the input text by '*' to get each character
        $characters = explode('*', $input_text);

        // Apply Caesar Cipher with a seed of 3
        $encrypted_characters = [];
        foreach ($characters as $char) {
            // Ignore the asterisks
            if ($char !== '') {
                $ascii_value = ord($char);
                $encrypted_ascii = ($ascii_value + 3) % 256; // Considering extended ASCII
                $encrypted_char = chr($encrypted_ascii);
                $encrypted_characters[] = $encrypted_char;
            }
        }

        // Concatenate the encrypted characters replacing '*' with '&'
        $encrypted_text = implode('', $encrypted_characters);
        $encrypted_text = str_replace('*', '&', $encrypted_text);

        // Display the encrypted text and its length
        echo "<p><strong>Encrypted Text:</strong> $encrypted_text</p>";
        echo "<p><strong>Length of Encrypted Text:</strong> " . strlen($encrypted_text) . "</p>";

        // Sort the encrypted characters based on ASCII value
        sort($encrypted_characters);

        // Extract repeated characters and unique characters
        $repeated_characters = [];
        $unique_characters = [];
        foreach ($encrypted_characters as $key => $char) {
            if ($key > 0 && $char === $encrypted_characters[$key - 1]) {
                $repeated_characters[] = $char;
            } else {
                $unique_characters[] = $char;
            }
        }

        // Display repeated characters
        echo "<p><strong>Repeated Characters:</strong> " . implode(', ', $repeated_characters) . "</p>";

        // Display unique characters
        echo "<p><strong>Unique Characters:</strong> " . implode(', ', $unique_characters) . "</p>";
        ?>
    </div>
</body>
</html>
