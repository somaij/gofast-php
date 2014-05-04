<?php include '../header.php'?>
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
  $sql = 'SELECT * FROM announcements WHERE id ='. $_GET['id'];


  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not get data: ' . mysql_error());
  }
  while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
  {
    echo "</br><div class='row'><ul class='breadcrumbs large-12 columns'>
          <li><a href='../index.php'>Home</a></li>
          <li><a href='announcements.php'>Announcements</a></li>
          <li class='current'><a href=''>{$row['title']}</a></li></ul></div>";
    echo "<div class='row'><div class='large-12 columns'><h1>{$row['title']}</h1></div></div>";
    echo "<div class='row'><div class='large-12 columns'><p class='right'><em>Date Posted: {$row['date_posted']}</em></p><hr/></div></div>";
    echo "<div class='row'><div class='large-12 columns'><p>{$row['content']}</div></div>";
    
  }
  echo "<div class='row'><div class='large-12 columns'><a href='announcements.php' class='button right'>View All</a></div></div>";
}
else{
  $sql = 'SELECT * FROM announcements';


  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not get data: ' . mysql_error());
  }
  echo "<div class='row'><div class='large-12 columns'><h1>All Announcements</h1></div></div>";
  echo "<div class='row'><div class='large-12 columns'><table>
          <thead>
            <tr>
              <th width='175'>Title</th>
              <th width='100'>Date Posted</th>
              <th>Content</th>
            </tr>
          </thead>
          <tbody>";
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
    {
      echo "<tr><td><a href='announcements.php?id={$row['id']}'>{$row['title']}</a></td><td>{$row['date_posted']}</td>";
       echo "<td>". (strlen($row['content']) > 150 ? substr($row['content'],0,150) : $row['content']) ."...</td>";
      echo "</tr>";
    }
    echo "</tbody>
          </table></div></div>";
}
mysql_close($conn);
?>
<?php include '../footer.php'?>