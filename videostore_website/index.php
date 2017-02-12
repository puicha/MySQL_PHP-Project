<?php
# video store home page 

require_once "videostore_pdo.php";

$title = "Video Store";
html_begin ($title, $title);
?>

<p>Welcome to Video Store.</p>

<?php
try
{
  $dbh = videostore_connect ();
  $sth = $dbh->query ("SELECT COUNT(*) FROM video");
  $count = $sth->fetchColumn (0);
  print ("<p>The video store currently has $count videos.</p>");
  $dbh = NULL;  # close connection
}
catch (PDOException $e) { } # empty handler (catch but ignore errors)
?>

<p>
You can view the directory of videos <a href="dump_videos.php">here</a>.
</p>

<?php
try
{
  $dbh = videostore_connect ();
  $sth = $dbh->query ("SELECT COUNT(*) FROM customer");
  $count = $sth->fetchColumn (0);
  print ("<p>The video store currently has $count customers.</p>");
  $dbh = NULL;  # close connection
}
catch (PDOException $e) { } # empty handler (catch but ignore errors)
?>

<p>
You can view the directory of customers <a href="dump_customers.php">here</a>.
</p>

<p>
You can view videos available status <a href="videos_available_status.php">here</a>.
</p>

<p>
You can view customers who are overdue for videos rental <a href="overdue_rentals.php">here</a>.
</p


<?php
html_end ();
?>

