<?php include "connect.php" ?>

<html class="no-js" lang="en">
    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">
        
        <!-- title of site -->
        <title>HomePageCustomers</title>

        <!--responsive.css-->
    <link rel="stylesheet" href="responsive.css">

	<link rel="stylesheet" href="Navbar_admin.css">
    <link rel="stylesheet" href="HomePageCustomers.css">
	<link rel="stylesheet" href="/lib/w3.css">
   
    </head>
	<body>
		<header>
			<a href="#" class="logo">Veraruk</a>
			<nav class="navbar">
				<ul>
					<li><a href="HomePageCustomers.php">หน้าหลัก</a></li>
					<li><a href="admin_Drugstorage.php">เกี่ยวกับเรา</a></li>
					<li><a href="CheckNoAppointment.html">นัดหมาย</a></li>
					<li><a href="admin_medrecords.php">ติดต่อเรา</a></li>
					<li><a href="#">User + </a>
					  <ul>
						<li><a href="#">ข้อมูล</a></li>
						<li><a href="#">Logout</a></li>
					  </ul>
				  </li>
				</ul>

		</header>
		<div id="welcome-hero" class="welcome-hero"></div>
		<div id="font-text">บริการของเรา</div>
		
		<?php
        $stmt = $pdo->prepare("SELECT * FROM course");
        $stmt->execute();
        while($row = $stmt->fetch()) :
    ?>
	<div class="container">
    <div class="square">
        <img src="https://scontent.fbkk22-1.fna.fbcdn.net/v/t39.30808-6/423193735_357428190472840_8309647011787178866_n.jpg?
		_nc_cat=101&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeF73DaqcuRpHJPG8Fzh2gHueerER2l7M9556sRHaXsz3usmm32gk-LUJHk726gApZuoEpsxE4e_
		WUxmKmjYSQsF&_nc_ohc=EXUjv4THRskAX8NMjOt&_nc_ht=scontent.fbkk22-1.fna&oh=00_AfDzFVhH1lbnyIgqhwohTJgQ7EBiURASgXnGYxeY2ywZfw&oe=65DC8B1C" 
		class="mask">
     <div class="h1"><?=$row ["course_name"] ?></div>
        <p><?=$row ["recommend"] ?></p>
        
     <div><a href="https://medium.com/@laheshk/is-apple-a-design-company-f5c83514e261" target="_" class="button">Read More</a></div>
      </div>
      
      </div>
	  <?php endwhile; ?>
  
    </div>
	</body>
	
</html>
		
