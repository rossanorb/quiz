<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .jumbotron{margin-top: 10%;}
        .jumbotron h1 {text-align: center;}
        .jumbotron p {text-align: center};

    </style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1><?php echo $result['serie']; ?></h1>
        <p><?php echo $result['msg']; ?></p>
        <p><a class="btn btn-lg btn-success" href="/quiz.php" role="button">Refazer Teste</a></p>
    </div>
</div>
</body>
</html>
