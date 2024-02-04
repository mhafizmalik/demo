<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Environment Variable Demo</title>
    <style>
        <?php
        // Read the color name from the environment variable
        $colorName = strtolower(getenv('BACKGROUND_COLOR')) ?: 'white';

        // Define colors based on color names
        $colorMap = [
            'red' => '#ff0000',
            'green' => '#00ff00',
            'blue' => '#0000ff',
            'yellow' => '#ffff00',
            'white' => '#ffffff',
        ];

        // Use the defined color or default to white
        $bgColor = $colorMap[$colorName] ?? $colorMap['white'];
        echo "body { background-color: $bgColor; }";
        ?>
    </style>
</head>
<body>
    <h1>Hello, Docker!</h1>
    <p>This is a simple PHP application with a customizable background color.</p>
</body>
</html>
