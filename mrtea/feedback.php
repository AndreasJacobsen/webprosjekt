<? session_start() ;?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Mr. Tea - Home</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" media="(max-width: 480px)" href="assets/css/mobil.css" />
		<link rel="stylesheet" media="(max-width: 768px)" href="assets/css/tablet.css" />
		<link rel="stylesheet" media="(min-width: 769px)" href="assets/css/desktop.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css" />
	</head>
	<body>
		<header>
			<a href="./" id="top" title="Mr. Tea - Feedback" tabindex="1">
			<img src="assets/images/header.png" alt="Tea leafs header, click to go to the home page" id="header">
			</a>
			<!-- if not mobil-->
		</header>

			<aside>
  			

			</aside>


		<nav>
			<div id="menu">
				<ul>
					<li class="file"><a href="plants.html" title="Mr. Tea - Plants" tabindex="2">Plants</a></li>
				</ul>
				<ul>
					<li class="file"><a href="regions/" title="Mr. Tea - Tea producing regions" tabindex="3">Region</a>
						<ul>
							<li class="menuli"><a href="regions/china.html#China">China</a></li>
							<li class="menuli"><a href="regions/india.html#India">India</a></li>
							<li class="menuli"><a href="regions/kenya.html#Kenya">Kenya</a></li>
							<li class="menuli"><a href="regions/srilanka.html#Sri-Lanka">Sri-Lanka</a></li>
							<li class="menuli"><a href="regions/turkey.html#Turkey">Turkey</a></li>
						</ul>
					</li>
				</ul>
				<ul>
					<li class="file"><a href="teatrade.html" title="Mr. Tea - History of the tea trade" tabindex="4">Tea trade</a></li>
				</ul>
				<ul>
					<li class="file"><a href="ourgear.html" title="Mr. Tea - The tea gang talks tea" tabindex="5">Our gear</a>
						<ul>
							<li class="menuli"><a href="ourgear.html#Boris">Boris tea</a></li>
							<li class="menuli"><a href="ourgear.html#Dag">Dag tea</a></li>
							<li class="menuli"><a href="ourgear.html#Andreas">Andreas tea</a></li>
							<li class="menuli"><a href="ourgear.html#Kristian">Kristian tea</a></li>
						</ul>
					</li>
				</ul>
				<ul>
					<li class="file"><a href="feedback.php" title="Mr. Tea - Your feedback" tabindex="6">Feedback</a></li>
				</ul>
			</div><!-- Slutt på div menu -->
		</nav><br />
		<main>
			<h1 id="feedh1">Feedback!</h1><?php if(!isset($_POST['submit'])){ ?>
			<form action="" method="post">
				<fieldset>
					<input id="formName" type="text" name="name" placeholder="Your name" required /><br />
					

					<input id="formFavTea" type="text" name="favTea" placeholder="Your favorite tea" required /><br />
					
					<textarea id="formFeedback" name="feedback" placeholder="Your feedback" required/></textarea><br />
					
					<input type="submit" name="submit" value="Submit feedback" />
				</fieldset>
			</form>
			<?php 
				}else{ 
					$line = $_POST['name'] . "***---***" . $_POST['favTea'] . "***---***" . $_POST['feedback'] . "***---***" ;
					$line .= date('Y.m.d H:i:s') . "***---***" ;
					$line = htmlentities($line) ;
					$line = str_replace("\r\n", '<br />', $line) ;
					
					$fileref = fopen('assets/txt/feedback.txt', 'a+') ;
					fwrite($fileref, $line) ;
					fwrite($fileref, "\n") ;
					fclose($fileref) ;
					
					$_SESSION['submited'] = 'submited' ;
					
					echo '<h2>Mr. Tea thanks you for the feedback, foo</h2>' ;
				}
			?>
			<hr />
			<?php
				$array = file('assets/txt/feedback.txt') ;
				$array = array_reverse($array) ;
				
				foreach($array as $line){
					$next = explode("***---***", $line) ;
					echo 'Feedback from: ', $next[0], "<br />\n\t",
						'Favorite Tea: ', $next[1], "<br />\n\t",
						'<blockquote>"<em>', $next[2], '"</em></blockquote><br />', "\n\t",
						'<em>', $next[3], '</em>', "\n\t",
						'<hr />', "\n\t" ;
				}
			?>
		</main>
		<footer>
			<div id="topbutton">
				<a href="#top">
				<p>[To page-top]</p>
				<img src="assets/images/top.png" alt="This arrow will take you to the top of the page" />
				</a>
			</div>
			<p><strong>Disclaimer:</strong><em>
			Mr. Tea is in no way related to Mr. T, Lawrence Tureaud, Clubber Lang or B.A. Baracus.<br />
			Mr. Tea is a website created as a final assessment work for ADTS1200 Web-project 2014.<br />
			The views, opinions or grasp of reality shared by Mr. Tea, 
			is not necessarily shared by the participating developers of this page.</em></p>
			<p><strong>Group name:</strong> Syntax Error<br />
			<strong>Group members:</strong> Ilievski s236725, Jacobsen s236778, Simonsen s236789, Sørvoll s236758.</p>
			<p>To voice views or opinions, please use the <a href="http://student.cs.hioa.no/~s236758/mrtea/feedback.php">feedback-page</a>.</p>
		</footer>
	</body>
</html>
