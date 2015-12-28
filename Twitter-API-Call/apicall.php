<?php 

include "twitteroauth/twitteroauth.php";

$consumer_key = "Enter consumer key here";
$consumer_secret = "Enter consumer secret here";
$access_token = "Enter token here";
$access_token_secret = "Enter token secret here";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.urlencode($_POST["twitterQuery"]).'&result_type=recent&count='.$_POST["tweetNumber"].'');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Twitter Search API - Prophsee Task</title>
    
		 <link href="css/reset.css" rel="stylesheet" type="text/css" />
   		 <link href="css/text.css" rel="stylesheet" type="text/css" />
		 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
<body style="background:#F5F8FA">
<div class="container-fluid">
<?php foreach ($tweets->statuses as $key => $tweet) { ?>
			<div class="row" style="border:1px solid #ccc;border-radius:5px;background:#fff;margin:20px; padding:20px">
			<div class="col-md-12">
				<img class="img-rounded" src="<?=$tweet->user->profile_image_url;?>" />
				<h4 style="display:inline"><?=$tweet->user->name;?> <small>@<?=$tweet->user->screen_name;?></small></h4>
				<p style="line-height:3em;"><?=$tweet->text; ?></p>
				<h5><small><?=$tweet->user->created_at;?></small></h5>
			</div>
			</div>
				<?php } ?>
			
    
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!--Scripts for Bootstrap-->
	<script src="js/bootstrap.min.js" ></script>
</body>
</html>