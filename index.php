<?php include 'header.php'?>
<div id="slideshow">
    <div class="row">
      <div class="large-12 columns">
        <h1>Welcome to <span style="color:#ee6123;">Go Fast Express</span>!</h1>
        <h4 class="subheader">Got a load? We got you covered. Request a quote today!</h4>
      </div>
    </div>
    <div class="row">
    <div class="large-12 columns">
    <div class="orbit-container show-for-medium-up">
      <ul data-orbit>
        <li>
          <img src="http://placehold.it/1000x400&text=[%20img%201%20]" alt="slide 1" />
          <div class="orbit-caption">
            Caption One.
          </div>
        </li>
        <li class="active">
          <img src="http://placehold.it/1000x400&text=[%20img%202%20]" alt="slide 2" />
          <div class="orbit-caption">
            Caption Two.
          </div>
        </li>
        <li>
          <img src="http://placehold.it/1000x400&text=[%20img%203%20]" alt="slide 3" />
          <div class="orbit-caption">
            Caption Three.
          </div>
        </li>
      </ul>
    </div>
  </div>
  </div>
</div>
<div class="row">
<h2 class="large-12 columns">What's new</h2>
</div>
<!-- Three-up Content Blocks -->
<div class="row">
<?php $dbhost = "mysql16.000webhost.com";
$database = "a3281475_gofast";
$dbuser = "a3281475_admin";
$dbpass = "yolob0xx";
// Create connection
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT id, title, content FROM announcements ORDER BY id DESC';

mysql_select_db($database);
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while(($row = mysql_fetch_array($retval, MYSQL_ASSOC)) && ($count<3))
{
    echo "<div class='medium-4 columns'><h4><a href='/pages/announcements.php?id={$row['id']}'>{$row['title']}</a>  </h4> ";
    echo "<p>". (strlen($row['content']) > 150 ? substr($row['content'],0,150) : $row['content']) ."...</p></div>";
    $count = $count + 1;
}
mysql_close($conn);
?>
  
    </div>
    </div>
  </div>
<?php include 'footer.php'?>
