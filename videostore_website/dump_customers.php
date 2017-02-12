<?php
# dump_customers.php - dump customers directory as HTML table

require_once "videostore_pdo.php";

$title = "Customers Directory";
html_begin ($title, $title);

$dbh = videostore_connect ();

# issue statement
$stmt = "SELECT first_name, last_name, phone, email FROM customer ORDER BY customer_id";
$sth = $dbh->query ($stmt);

print ("<table>\n");          # begin table
# read results of statement, then clean up
#@ _ROW_PRINT_LOOP_
while ($row = $sth->fetch (PDO::FETCH_NUM))
{
  print ("<tr>\n");           # begin table row
  for ($i = 0; $i < $sth->columnCount (); $i++)
  {
    # escape any special characters and print table cell
    print ("<td>" . htmlspecialchars ($row[$i]) . "</td>\n");
  }
  print ("</tr>\n");          # end table row
}
#@ _ROW_PRINT_LOOP_
print ("</table>\n");         # end table

$dbh = NULL;  # close connection

html_end ();
?>


