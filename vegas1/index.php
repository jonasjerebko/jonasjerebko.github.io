<?php
/**
 * Name: FartsHD Player
 * Version: 1.0
*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your favorite teams in one place</title>
    <meta charset="UTF-8">
    <meta name="referrer" content="never">
    <meta name="referrer" content="no-referrer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script type="text/javascript" src="https://ssl.p.jwpcdn.com/player/v/8.7.6/jwplayer.js"></script>
	<script type="text/javascript">jwplayer.key="64HPbvSQorQcd52B8XFuhMtEoitbvY/EXJmMBfKcXZQU2Rnn";</script>
	<style type="text/css" media="screen">html,body{padding:0;margin:0;height:100%}#fartshd-player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}</style>
</head>
<body>

<?php 
		error_reporting(0);

		$link = (isset($_GET['link'])) ? $_GET['link'] : 'https://player.vimeo.com/video/326824140';

		$sub = (isset($_GET['sub'])) ? $_GET['sub'] : '';

		$poster = (isset($_GET['poster'])) ? $_GET['poster'] : '';

		if ($link != '') {

			include_once 'packer.php';
	
			include_once 'curl.php';

			$curl = new cURL();
			
			$getSource = $curl->get($link);
			
			preg_match_all('/"url":"(.*?)"/', $getSource, $matchHLS);
					

			$sources = '[{"label":"HD","type":"video\/mp4","file":"'.$matchHLS[1][1].'"}]';


			$result = '<div id="fartshd-player"></div>';

			$data = 'var player = jwplayer("fartshd-player");
						player.setup({
							sources: '.$sources.',
							aspectratio: "16:9",
							startparam: "start",
							primary: "html5",
							autostart: false,
							preload: "auto",
							image: "'.$poster.'",
						    captions: {
						        color: "#f3f368",
						        fontSize: 16,
						        backgroundOpacity: 0,
						        fontfamily: "Helvetica",
						        edgeStyle: "raised"
						    },
						    tracks: [{ 
						        file: "'.$sub.'", 
						        label: "English",
						        kind: "captions",
						        "default": true 
						    }]
						});
			            player.on("setupError", function() {
			              swal("Server Error!", "Please contact us. Thank you!", "error");
			            });
						player.on("error" , function(){
							swal("Server Error!", "Please contact us. Thank you!", "error");
						});';

			$packer = new Packer($data, 'Normal', true, false, true);

			$packed = $packer->pack();

			$result .= '<script type="text/javascript">' . $packed . '</script>';
		
			echo $result;

		} else echo 'Empty link!';

?>

</body>
</html>
