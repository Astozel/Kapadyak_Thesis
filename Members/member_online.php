<?php
 error_reporting(0);
 include '../dbcon.php';
 include '../session.php';
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../Scripts/index.js"></script>
 

  <title>Events | Kapadyak</title>
</head>

<body>

  <div class="member-online-content">

 	<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example"  >
 
	<tr>
<td>  <h1>Members</h1>
  Administrators :
                  <hr />
	<?php
		$query = $conn->query("select * from user order by lname ASC") or die(mysql_error());
		while ($row = $query->fetch()) {?>
        
        
         <table cellpadding="0" cellspacing="0" border="0"   id="example" width="220">
         
         <tr>
        
   <td rowspan="2"><img src="../Images/logo_forum.png" width="25" height="35" class="img-square"/></td>
   
   <td width="197"><?php echo $row['username']." | Admin"; ?> &nbsp; 
          <span class="sendMessageBtn">
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="getid" value="<?php echo $row['user_id']; ?>">
                <button type="submit" name="send-message-admin" class="edit-delete-button">
                    <a title="click to send a message to <?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?>">
                        <li>Message</li>    
                        <i class="fa fa-comment-o"></i>
                    </a>
                </button>
                </form> 
                    
                </span>
          </td> 

	 <td  rowspan="2"><?php 
            
            if($row['status']=="active"){  
                ?>
            <img src="../Images/active.png" width="12" height="12" alt="..." class="img-circle">
                 <?php    
            }
            else
            {
                ?>
                <img src="../Images/inactive.png" width="12" height="12" alt="..." class="img-circle">
             <?php    
            }
            
             ?> </td> 
 
	    
		</tr>
       
        
        <tr>
        	<td colspan="2"> <?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?> </td> 
            
            	 
        </tr>
       
        
         
        	</table>
        <?php
		  
          
          
		}?>
</td>
</tr>





		<tr>
         <td>
           Members :
                  <hr />
                
           	<?php
		$query = $conn->query("select * from members where email_status = '1' order by last_name ASC") or die(mysql_error());
      
		while ($row = $query->fetch()) {
		$id = $row['member_id'];

        if($id==$id2){

            	$query1 = $conn->query("select * from members where member_id='$id2'") or die(mysql_error());
		while ($row1 = $query1->fetch()) 
        {
		   if($row1['acct_status']=="Unactive") 
           
           {
            ?>
            <script>
						 alert('Your account has been Deactivated by the Administrator. Pls. contact the admin for clarifications. Thank you.');
                     	window.location = 'logout.php';
							</script>
            <?php
           }
		}
            
        }else{
        
		?>
  
         <table cellpadding="0" cellspacing="0" border="0"   id="example" width="220">
         
         <tr>
  
   <td rowspan="2"><img src="
            <?php if($access=="Admin"){echo  "../images/logo_forum.png";}else{
            $getImage = $row['image'];
            if($getImage == ""){
              echo "../Images/default-profile.png";
            } else{
              echo $row['image'];
            }
          }
            ?>
          " width="25" height="35" class="img-square" alt="../Images/default-profile.png"/></td>

        	<td width="197"><?php echo $row['username']." | ".$row['access']; ?> &nbsp;  
       
                <span class="sendMessageBtn">
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="getid" value="<?php echo $id; ?>">
                <button type="submit" name="send-message" class="edit-delete-button">
                    <a title="click to send a message to <?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?>">
                        <li>Message</li>    
                        <i class="fa fa-comment-o"></i>
                    </a>
                </button>
                </form> 
                    
                </span>
              
       
            </td> 
	 <td  rowspan="2"><?php 
  
            if($row['online_status']=="active"){  
                ?>
            <img src="../Images/active.png" width="12" height="12" alt="..." class="img-circle">
                 <?php    
            }
            else
            {
                ?>
                <img src="../Images/inactive.png" width="12" height="12" alt="..." class="img-circle">
             <?php    
            }
            
             ?> </td> 
 
	    
		</tr>   
        
        <tr>
        	<td colspan="2"><a href="view_profile.php?id=<?php echo $id; ?>"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?></a></td> 
            
            	 
        </tr>
       
        
         
        	</table>
                <hr />
               <?php
              }}?>    
        </td>
        </tr>

	
	 
	</table>
    </div>