<?php
    require_once 'include/config.php';

    if(empty($_GET['v'])){
        header("Location: index.php");
    }

    $data = json_decode(file_get_contents("$instance/api/v1/videos/" .$_GET['v']), true);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($data['title']); ?> - Broadcast Yourself.</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        body{
            width: 875px; 
            margin-left: auto; 
            margin-right: auto;
        }

        #left{
            float: left; 
            width: 480px;
        }

        #left video{
            width: 480px;
            height: 360px;
        }

        #left embed{
            width: 480px;
            height: 360px;
        }

        #right{
            float: right; 
            width: 360px;
        }
    </style>
</head>
<body>
    <a href="index.php">Домой</a>
    <hr>
    <div id="left">
        <h1><?php echo($data['title']); ?></h1>
        <embed src="<?php echo($data['formatStreams'][0]['url']); ?>" type="<?php echo($data['formatStreams'][0]['type']); ?>">
        <p><b>Rate: </b><?php echo($data['likeCount']); ?> ratings</p>
        <p><b>Views: </b><?php echo($data['viewCount']); ?></p>
    </div>
    <div id="right">
        <p>
            <img src="<?php echo($data['authorThumbnails'][1]['url']); ?>">
            From: <?php echo($data['author']); ?>
        </p>
        <hr>
        <p>Added: <?php echo(date('F d, Y', $data['published'])); ?></p>
        <p><?php echo($data['descriptionHtml']); ?></p>
    </div>
</body>
</html>