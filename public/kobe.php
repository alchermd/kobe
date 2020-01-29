<?php require '../vendor/autoload.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kobe Buckets</title>

    <style>
        .data {
            background-color: black; 
            color: white;
            font-family: monospace;
            padding: 10px;
            height: 300px;
            width: 800px;
        }

        code {
            color: red;
            font-family: monospace;
            font-weight: bolder;
            font-size: 90%;
            background-color: #f9f2f4;
            padding-left: 3px;
            padding-right: 3px;
        }
    </style>
</head>
<body>
    <?php if(isset($_COOKIE['KOBE_DATA'])) : ?>
        <?php foreach (json_decode($_COOKIE['KOBE_DATA'], true) as $data): ?>
            <p>
                From the url <code><?= $data['url'] ?></code>
                in file <code><?= $data['caller'] ?></code> (line <code><?= $data['line'] ?></code>), 
                you logged <?= diffForHumans($data['time_elapsed']) ?>: 
                 
                <br>
                
                <?php dump($data['data']); ?>
            </p>
        <?php endforeach; ?>
    <?php else : ?>
        <h1>No buckets logged yet. To start, use the <code>kobe()</code> function in your code.</h1>
    <?php endif; ?>
</body>
</html>