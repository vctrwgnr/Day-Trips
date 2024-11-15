<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--    <link rel="stylesheet" href="css/style.css"/>-->

    <style>
        body {
            padding-top: 70px;
        }

        figure{
            width: 10px;
            height: 10px;
        }

        .message {
            background-color: #ffe6e6;
            color: salmon;
            font-size: 20px;
            text-align: center;
            /*border: 2px solid black;*/
            padding: 5px;
            visibility: visible;
        }
    </style>
</head>
<body>
<div class="message"><?php echo $message; ?></div>
<?php include 'views/navigation.php'; ?>