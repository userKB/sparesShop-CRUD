<?php

require 'db.php';
session_start();

$output = '';
$exchange = '';

$id = $_SESSION['id'];
$result = $mysqli->query("SELECT * FROM  WHERE item_owner='$id'");

if(isset($_POST["val"])){

}


if(isset($_POST["query"]))
{
 $search = $_POST["query"];
 $query = "
  SELECT * FROM items 
  WHERE item_name LIKE '%".$search."%'
  OR item_desc LIKE '%".$search."%' 
  OR item_owner LIKE '%".$search."%' 
  OR item_id LIKE '%".$search."%' 
  ";
}
else
{
 $query = "
  SELECT * FROM items ORDER BY item_id
 ";
}
$result = $mysqli->query($query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class = "masonry">
   
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  
  <div class ="item">
  
    <img height="200" width="160"src="img/'.$row['img_path'].'">
    <br>'.$row["item_name"].'<br>
    '.$row["item_desc"].'<br>
    owner:&nbsp;'.$row["item_owner"].'<br>
    <button value="'.$row["item_id"].'" class="btn btn-secondary item_exch" onclick="myfunction(this.value)">exchange</button></br>
  </div>

  ';
 }
 $output .='</div>';
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>