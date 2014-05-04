<?php include '../header.php'?>

<div class="row">
  <div class="large-12 columns">
    
    
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
mysql_select_db($database);
if(!empty($_GET["id"])){
  $sql = 'SELECT * FROM job_postings WHERE id ='. $_GET['id'];


  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not get data: ' . mysql_error());
  }
  while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
  {
    echo "</br><div class='row'><ul class='breadcrumbs large-12 columns'>
          <li><a href='../index.php'>Home</a></li>
          <li><a href='jobs.php'>Jobs</a></li>
          <li class='current'><a href=''>{$row['title']}</a></li></ul></div>";
    echo "<div class='row'><div class='large-12 columns'><h1>{$row['title']}</h1></div></div>";
    echo "<div class='row'><div class='large-12 columns'><p class='right'><em>Date Posted: {$row['post_date']} - Closing Date: {$row['closing_date']}</em></p><hr/></div></div>";
    echo "<div class='row'><div class='large-12 columns'><h3>Description</h3></div></div>";
    echo "<div class='row'><div class='large-12 columns'><p>{$row['description']}</p></div></div>";
    echo "<div class='row'><div class='large-12 columns'><h3>Requirements</h3></div></div>";
    echo "<div class='row'><div class='large-12 columns'><p>{$row['requirements']}</p></div></div>";
  }
  echo "<div class='row'><div class='large-12 columns'><a href='jobs.php' class='button right'>View All</a></div></div>";
}
else{
$sql = 'SELECT * FROM job_postings';

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo '
  <h1>Looking for work? <small>Take a look at our open positions!</small></h1>
  <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Post Date</th>
          <th>Closing Date</th>
          <th>Description</th>
          <th>Requirements</th>
        </tr>
      </thead>
      <tbody>';
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "<tr><td><a href='jobs.php?id={$row['id']}'>{$row['title']}</a></td><td>{$row['post_date']}</td><td>{$row['closing_date']}</td>";
    echo "<td>". (strlen($row['description']) > 150 ? substr($row['description'],0,150) : $row['description']) ."...</td>";
    echo "<td>". (strlen($row['requirements']) > 150 ? substr($row['requirements'],0,150) : $row['requirements']) ."...</td>";
    echo "</tr>";
}
echo "</tbody>
</table>";
}
mysql_close($conn);
?>
  </div>
</div>
<?php include '../footer.php'?>