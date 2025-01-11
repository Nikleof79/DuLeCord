<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DuLeCord</title>
</head>

<body>
    <h1>There is an error</h1>
    <h1> <?php
    function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }
    echo $_GET['error'] ? $_GET['error'] : redirect('/');
    ?> </h1>
    <a href="/" class="btn">Go back</a>
</body>

</html>