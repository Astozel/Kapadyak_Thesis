<?php
	include('../dbcon.php');
	include ('../session.php');

    $id=$_GET['id'];
   	$post_query = $conn->query("select * from post LEFT JOIN members on post.member_id = members.member_id where post_id='$id'");
									while($post_row = $post_query->fetch())
                                    {
									   
								
    
?>
<form target="_self" method="post" action="delete_post.php">
<input name="del_id" type="hidden" value="<?php  echo $id;  ?>" />

<div class="alert alert-danger">
<center>
<table width="600" border="0">
<tr>
<td  >
<div class="alert alert-info">
 <font size="5">
 <center>
 CONFIRMATION </center></font> </div>
</td><td></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td colspan="2">
 <font size="5">
Are you sure you want to delete this Post?
 </font>
</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td> <font size="4"><?php echo "Posted by: ".$post_row['first_name']." ".$post_row['middle_name']." ".$post_row['last_name'];?> </font></td>
<td> <font size="4"><?php echo  "Topic: ".$post_row['topic'];?> </font></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td> <font size="4"><?php echo   "Topic Title: ".$post_row['post_title'] ;?> </font></td>
<td> <font size="4"><?php echo  "Date Posted: ".$post_row['date_posted'] ;?> </font></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td width="300">
<button class="btn btn-danger" name="delete" ><li class="fa fa-trash-o"></li> Delete</button>
 &nbsp;<a href="index.php" class="btn btn-default"  >Cancel</a>
</td>
<td></td>
</tr>

</table></center>
</div>
</form>



	<?php }
							if (isset($_POST['delete'])){
					  
                         $del_id = $_POST['del_id'];
					   
								$conn->query("delete  from post where post_id = '$del_id'");
					
                    ?>
					<script>
			 window.location = 'index.php?id=<?php echo $del_id;?>';
							</script>
	
                     <?php   }		?>