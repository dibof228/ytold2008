<?php
    require_once 'include/config.php';

    $data = json_decode(file_get_contents("$instance/api/v1/popular?region=RU"), true);
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>YouTube - Broadcast Yourself.</title>
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div id="baseDiv">
			<div id="masthead">
				<a href="index.php" class="logo"><img src="blank.gif" width="132" height="63"></a>
				
				<div class="user-info">	

					<div id="util-links" class="normal-utility-links">
						<span class="util-item first"><b><a href="https://github.com/KovshKomeij/oldyt2008">Github</a></b></span>
					</div>

				</div>

				<div class="nav">
					<div class="nav-item first selected" id="nav-item-home">
						<span class="leftcap"></span>
						<a class="content" href="index.php">Home</a>
						<span class="rightcap"></span>
					</div>
					<div class="nav-item" id="nav-item-videos">
						<div class="nav-tab">
							<span class="leftcap"></span>
							<a class="content" href="videos.php">Videos</a>
							<span class="rightcap"></span>
						</div>
					</div>
				</div>
				
				<form action="results.php" method="get" name="searchForm">
					<div class="bar">
						<span class="leftcap"></span>
						<div class="search-bar">
							<div id="search-form">
								<input id="search-term" name="search_query" type="text" maxlength="128">
								<select class="search-type" name="search_type">
									<option value="search_videos">Videos</option>
								</select>
								<input id="search-button" type="submit" value="Search">
							</div>
						</div>
						<span class="rightcap"></span>
					</div>
				</form>

			</div> 

			<div id="homepage-main-content"> 
				<div id="homepage-featured-heading">
					<h1 id="hpVideoListHead">Featured Videos</h1>
				</div>

				<div id="homepage-video-list" class="browseListView">
					<div id="hpFeatured">
						<?php for($i = 0; $i <= count($data) - 1; $i++): ?>
							<div class="vlentry">
								<div class="vlcontainer">
									<div class="v120WideEntry">
										<div class="v120WrapperOuter">
											<div class="v120WrapperInner">
												<a href="watch.php?v=<?php echo($data[$i]['videoId']); ?>">
													<img src="<?php echo($data[$i]['videoThumbnails'][5]['url']); ?>" class="vimg120" title="Acoustic guitar impro solo Liberta (in A# minor)" alt="video">
												</a>
											</div>
										</div>
									</div>

									<div class="vldescbox">
										<div class="vltitle">
											<div class="vllongTitle">
												<a href="watch.php?v=<?php echo($data[$i]['videoId']); ?>" title="<?php echo($data[$i]['title']); ?>"><?php echo($data[$i]['title']); ?></a>
											</div>
										</div>
										
										<div class="vldesc">
											<span id="BeginvidDesctawEuTNRmVA"><?php echo($data[$i]['descriptionHtml']); ?></span>
										</div>
									</div>

									<div class="vlclearaltl"></div>

								</div>

								<div class="vlfacets">
									<div class="vladded"></div>

									<div>
										<span class="grayText vlfromlbl">From:</span>
										<span class="vlfrom">
											<a href="channel.php?c=<?php echo($data[$i]['authorId']); ?>"><?php echo($data[$i]['author']); ?></a>
										</span>
									</div>

									<div class="clearL"></div>

									<span class="grayText">Views:</span> <?php echo(number_format($data[$i]['viewCount'])); ?><br>

									<div class="video-thumb-duration-rating">
										<div>
											<img class="ratingVS ratingVS-5.0" alt="4.7737704918" src="blank.gif">
										</div>
										<div class="runtime"><?php echo(date('i:s', $data[$i]['lengthSeconds'])); ?></div>
									</div>

									<div class="clear"></div>
								</div>

								<div class="vlclearaltl"></div>
							</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>