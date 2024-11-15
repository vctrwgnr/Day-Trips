<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops! Something Went Sideways</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            color: #333;
        }

        h1 {
            font-size: 100px;
            font-weight: bold;
            color: #ff6b6b;
        }

        p {
            font-size: 1.2rem;
            text-align: center;
        }

        .lead {
            font-size: 1.5rem;
            font-weight: 500;
            color: #4e5d6b;
        }

        .construction {
            margin: 20px;
            font-size: 1.3rem;
            color: #6c757d;
        }

        .construction-icon {
            font-size: 5rem;
            color: #ffcc00;
        }

        .btn-back {
            margin-top: 30px;
            padding: 10px 30px;
            background-color: #ff6b6b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #ff3b3b;
        }

        .footer {
            margin-top: 50px;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="text-center">
    <h1>🚧</h1>
    <p class="lead">Whoops! Looks like we're under construction...</p>
    <p class="construction"><i class="construction-icon fas fa-construction"></i></p>
    <p class="lead">Our team of digital wizards has been notified, and they'll be on it faster than a cat meme goes viral.</p>
    <p class="text-muted">In the meantime, maybe grab a coffee ☕ or try again later.</p>
    <a href="index.php?action=showPublic&area=public" class="btn btn-back btn-lg">Back to Homepage</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
