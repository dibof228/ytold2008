<?php
    require_once 'include/config.php';

    $data = json_decode(file_get_contents("$instance/api/v1/channels/" .$_GET['c']), true);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($data['author']); ?> - Broadcast Yourself.</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <a href="index.php">Домой</a>
    <hr>
    <form action="results.php" method="get">
        <input name="search_query" type="text">
        <button type="submit">Поиск</button>
    </form>
    <hr>
    <div>
        <div style="float: left;">
            <img src="<?php echo($data['authorThumbnails'][3]['url']); ?>">
        </div>
        <div>
            <b><?php echo($data['author']); ?></b><br>
            <p>Subscribers: <?php echo($data['subCount']); ?></p>
            <p>Channel Views: <?php echo($data['totalViews']); ?></p>
        </div>
        <hr>
    </div>
    
    <?php for($i = 0; $i <= count($data['latestVideos']) - 1; $i++): ?>
        <a href="watch.php?v=<?php echo($data['latestVideos'][$i]['videoId']); ?>">
            <div>
                <div style="float: left;">
                    <img src="<?php echo($data['latestVideos'][$i]['videoThumbnails'][5]['url']); ?>">
                </div>
                <div>
                    <b><?php echo($data['latestVideos'][$i]['title']); ?></b><br>
                    <p>From: <?php echo($data['latestVideos'][$i]['author']); ?></p>
                </div><br>
                <hr>
            </div><br>
        </a>
    <?php endfor; ?>
</body>
</html>