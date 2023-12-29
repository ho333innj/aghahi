<?php 
include ('config/app.php');
include ('codes/auth.php');
// include_once ('controllers/RegisterController.php');


?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت آگهی و فروش nj || حساب کاربری</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/login.css">

    <link rel="stylesheet" href="./assets/style/hesabkarbari.css">

   
</head>
<body>
<?php 
  include __DIR__."/templates/header.php";
?>


        <?php include('message.php') ?>

        <div class="dashboard_header">
                <div class="dash_menu">
                    <ul>    
                        <li>
                            <a class="text-white" href="index.php"><img src="./assets/img/icons8-home-50 (2).png"></a>
                        </li>
                        <span class="text-white">|</span>
                        <li>
                            <a class="text-white"  href="">حساب من</a>
                        </li> 
                        <span class="text-white">|</span>
                        <li>
                            <a class="text-white" href="">آگهی های من</a>
                        </li>
                    </ul>
                </div>
                <div class="dash_down_part">
                <div class="dash_welcome_text">
                    <a class="text-white" >خوش آمدید : نام کاربری</a> 
                </div>
                <div class="dash_logout_btn">
                    <form method="POST" action="">
                        <button class="Shabnam "  name="logout_btn" >خروج</button>
                    </form>
                    <img src="./assets/img/icons8-logout-48.png">
                </div>
                
                </div>
                
        </div>

        <div class="dashboard_container">
            <div class="profile_image">
                <img src="./assets/img/gtr.jpg">
            </div>
        </div>
        <div class="advert_detail">
            <div class="advert_count">
                    <div class="advert_count_image">
                        <img src="./assets/img/icons8-pass-fail-64.png">
                    </div>
                    <div class="advert_count_details">
                        <p>تعداد آگهی های من</p>
                        <p>0</p>
                    </div>
            </div>
        </div>
        <div class="advert_list">
            <div class="advert_list_title">
                <p><span class="underline">آگهی </span>های من</p>
            </div>
            <div class="advert_list_content">
                    <div class="advert_list_image">
                        <img src="./assets/img/—Pngtree—no result search icon_6511543.png" >
                    </div>
                    <div class="advert_list_detail" >
                        <p>هنوز آگهی ثبت نکردی !</p>
                    </div>
                    <div class="insert_advert_btn">
                            <form method="POST" action="">
                                <button class="Shabnam "  name="" >ثبت آگهی جدید</button>
                            </form>
                    </div>
            </div>
        </div>
      
              
<?php include __DIR__."/templates/footer.php";?>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>