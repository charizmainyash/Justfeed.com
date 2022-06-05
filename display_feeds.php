<div class = "feed" onclick="window.location = 'viewpost.php?artid=<?php echo $articles[0]; ?>' ">
				<b id="aid">	<?php echo $articles[0]; ?><br></b>
				<b id="tt">		<?php echo $articles[1]; ?><br></b><br><br>
				<b id="taag">	Tagged As:&nbsp;<?php echo $articles[6]; ?><br></b>
				<b id="naa">	By:&nbsp;<?php $naam=mysqli_query($connect,"select name from users where userid='$articles[3]'");
										$naamarr=mysqli_fetch_array($naam); 
										echo$naamarr[0];?> </b><br>
					<p style = "display:none;">
						<?php echo $articles[2]; ?><br>
						<?php echo $articles[4]; ?><br>
						<?php echo $articles[5]; ?>
					</p>
</div>