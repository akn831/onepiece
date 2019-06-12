<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
    <form action="complete.php" method="POST" enctype="multipart/form-data">
        <img class="wanted" src="img/wanted.png" alt="">
        <div class="detail">
            <div class="sub-menu">
                <p>名前：</p>
                <input type="text" placeholder="LUFFY" name="name" required>
            </div>
            <div class="sub-menu">
                <p>懸賞金：</p>
                <input type="text" placeholder="20,000,000-" name="reward" required>
            </div>
            <div class="pic">
                <p>写真：</p>
                <input type="file" name="image">
            </div>
            <input id="btn" type="submit" value="手配書発行">
        </div>
    </form>
    <script src="./js/app.js"></script>
</body>
</html>