<?php  
//db parameters  
/*$db_username = 'dbo493639559';  
$db_password = 'heuz43yp';  
$db_database = 'db493639559';  
*/

$db_username = 'root';  
$db_password = 'heuz43yp';  
$db_database = 'cdp'; 
 
$blog_url = 'http://localhost/cdp/'; //base folder for the blog. Make SURE there is a slash at the end  
  
//connect to the database  
mysql_connect('localhost', $db_username, $db_password);  
@mysql_select_db($db_database) or die("Unable to select database"); 
mysql_set_charset("utf8");
  
//get data from database -- !IMPORTANT, the "LIMIT 5" means how many posts will appear. Change the 5 to any whole number.  
$query = "Select * FROM wp_posts WHERE post_type='post' AND post_status='publish' ORDER BY id DESC LIMIT 5";   
  
$query_result = mysql_query($query);  
$num_rows = mysql_numrows($query_result);  

//close database connection  
mysql_close();  
  
?>  




<?php include('include/head-alice.php'); ?>

		<?php include('include/slider-alice.php'); ?>
		
        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
							
				<!-------------------------- ************** -------------------------->
				<!-------------------------- MENU HORIZONTAL-------------------------->
				<!-------------------------- ************** -------------------------->
				<div id="menu">
					<ul>
						<li><a href="#histoire">L'histoire</a></li>
						<li><a href="#spectacle">Le Spectacle</a></li>
						<li><a href="#troupe">La troupe</a></li>
						<li><a href="#photos">Photos</a></li>
						<li><a href="#goodies">Goodies</a></li>
					</ul>
				</div>
				
				<?php include('include/social.php'); ?>
			
				<!-------------------------- ***************** -------------------------->
				<!-------------------------- MAIN ALICE COLUMN -------------------------->
				<!-------------------------- ***************** -------------------------->
                <div id="articles">
				
				<?php 
					//start a loop that starts $i at 0, and make increase until it's at the number of rows  
					for($i=0; $i< $num_rows; $i++){   
					  
					//assign data to variables, $i is the row number, which increases with each run of the loop  
					$blog_date = mysql_result($query_result, $i, "post_date");  
					$blog_title = mysql_result($query_result, $i, "post_title");  
					$blog_content = mysql_result($query_result, $i, "post_content");  
					//$blog_permalink = mysql_result($query_result, $i, "guid"); //use this line for p=11 format.  
					  
					$blog_permalink = $blog_url . mysql_result($query_result, $i, "post_name"); //combine blog url, with permalink title. Use this for title format  
					  
					//format date  
					$blog_date = strtotime($blog_date);  
					$blog_date = strftime("%b %e", $blog_date);  
				?>
					<article>
						 
						<?php echo htmlentities($blog_title); ?><br />
				  
						<?php echo $blog_content; ?>
						
					</article>	

				<?php  
					} //end the for loop  
				?>
				
				</div>
            </div> <!-- #main -->
        </div> <!-- #main-container -->
		
<?php include('include/footer.php'); ?>
