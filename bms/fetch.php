<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "banking");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM users 
  WHERE id LIKE '%".$search."%'
  OR name LIKE '%".$search."%' 
  OR email LIKE '%".$search."%' 
  OR mobile LIKE '%".$search."%' 
  OR aadhar LIKE '%".$search."%'
  OR account_number LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM users ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name :</th>
	 <th>Account Number:</th>
     <th>Email :</th>
     <th>Mobile :</th>
     <th>Aadhar :</th>
	 <th>Ops</th>
	 
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
	
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
	<td>'.$row["account_number"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["mobile"].'</td>
    <td>'.$row["aadhar"].'</td>
	<td><a href="ops.php?user='.$row["id"].'"><button class="btn btn-default" data-toggle="modal" data-target="#details">Deails</button> </a></td>
   </tr>
   
   <div id="details" class="modal fade" role="dialog">
  <div class="modal-dialog">

   
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Deails</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>