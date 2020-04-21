<?php
$str= mysqli_connect('mysql', 'userdb', 'fzL3YUCgQ?Ho2', 'world');
$select= mysqli_query($str, "SELECT region, name, continent FROM `world`.`country`;");
while ($r= mysqli_fetch_array($select)) {
 echo $r['region'] . " ";
 echo $r['name'] . " ";
 echo $r['continent'] . "<br />";
}
mysqli_close($str);
?>