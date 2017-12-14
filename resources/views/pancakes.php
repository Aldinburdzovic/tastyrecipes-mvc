<?php
//include '../../getCommentsP.php';
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tasty Recepies</title>
                <link rel="stylesheet" type="text/css" href="../css/tastycss.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                
               
        
        <script>
            $(document).ready(function()
                {
                    $(function(){
 
                        $.ajax({                                      
                            url: '../../get-commentP.php',                          
                            data: "",
                            dataType: 'json',                   
                            success: function(data)        
                            {
                                $('#form1').append("<button id='com-btn' onclick='postComment()' >Comment</button>"); 
                                for(var i = 0; i < data.length; i++)
                                {
                                  var user = data[i].user_uid;              
                                  date = data[i].date; 
                                  message = data[i].message;
                                  deletable = data[i].deletable;
                                  cid = data[i].cid;
                                  if(deletable)
                                  {
                                       $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message + "<br>"+ "<button id='del-btn' onclick=deleteComment("+cid+")>Delete</button></p>");
                                  }
                                  else
                                  {
                                    $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message +"</p>"); 
                                  }

                                }
                            } 
                        }); 
                    }); 
                });
                
                function postComment()
                 {
                    var uid = $("#uid").val();
                    date = $("#date").val();
                    message = $("#message").val();
                           
                     $.ajax({
                         url: '../../do-commentP.php',
                         type: 'post',
                         dataType: 'json',
                         data:
                                 {
                                     uid: uid,
                                     date: date,
                                     message: message
                                 },
                         success: function (data)
                                   {
                                       $('.comment-box1').html(" ");
                                       for (var i = 0; i < data.length; i++)
                                       {
                                           var user = data[i].user_uid;              
                                            date = data[i].date; 
                                            message = data[i].message;
                                            deletable = data[i].deletable;
                                            cid = data[i].cid;
                                           if (deletable)
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message + "<br>"+ "<button id='del-btn' onclick=deleteComment("+cid+")>Delete</button></p>");
                                           } else
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message +"</p>"); 
                                           }
                                       }
                                   }
     });
     }
                    function deleteComment(cid)
                           {
                               $.ajax({
                               url: '../../deleteCommentsP.php',
                               type: 'post',
                               dataType: 'json',
                                  data:
                                           {
                                               'cid': cid,
                                        
                                           },
                                   success: function (data)
                                   {
                                       $('.comment-box1').html(" ");
                                       for (var i = 0; i < data.length; i++)
                                       {
                                           var user = data[i].user_uid;              
                                            date = data[i].date; 
                                            message = data[i].message;
                                            deletable = data[i].deletable;
                                            cid = data[i].cid;
                                           if (deletable)
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message + "<br>"+ "<button id='del-btn' onclick=deleteComment("+cid+")>Delete</button></p>");
                                           } else
                                           {
                                               $('.comment-box1').append("<div class='comment-box'><p><p class='user-date'>" +user+": "+ "<br></p>"+date+ "<br>"+ message +"</p>"); 
                                           }
                                       }
                                   }
                               });
                           }
        </script>
	</head>
	<body>
		<div id="header">
			<section id = "it">
                            <a href = "index.html"><img class="logo" alt="logo" src="https://s-media-cache-ak0.pinimg.com/originals/69/4d/8f/694d8fb5051bc6d44480e318de11f3b3.gif"/></a>
			<nav class="main-nav">
				<ul id = "navbar">
					<li><a href="home.php" class="nav">Home</a></li>
					<li><a href="meatballs.php" class="nav">Meatballs</a></li>
                                        <li><a href="pancakes.php" class="nav">Pancakes</a></li>
					<li><a href="calendar.php" class="nav">Calendar</a></li>
				</ul>
			</nav>
			</section>
		</div>
		<div id="main">
		<div id = "right">
			<h1>The Best Pancake Recipe</h1>
			<img class="pic" alt="Pancakes" src="https://media.eggs.ca/assets/RecipePhotos/_resampled/FillWyIxMjgwIiwiNjIwIl0/Fluffy-Pancakes-New-CMS.jpg"/>

			<h2>Ingredients</h2>
			<ul id = "recepie">

				<li><b>2</b> cups Original Bisquick mix</li>
				<li><b>1</b> cup milk</li>
				<li><b>2</b> eggs</li>
				
			</ul>
		</div>


			<h2>Steps</h2>
			<ol id = "steps">

				<li>Heat griddle or skillet over medium-high heat or electric griddle to 375F; grease with cooking spray, vegetable oil or shortening. (Surface is ready when a few drops of water sprinkled on it dance and disappear.)</li>
				<li>Stir all ingredients until blended. Pour by slightly less than 1/4 cupfuls onto hot griddle.</li>
				<li>Cook until edges are dry. Turn; cook until golden. Note: If you like thin pancakes, use 1 1/2 cups milk.</li>
			</ol>

			<h2>Comments</h2>
			<?php
                        if (isset($_SESSION['u_id'])) {
				echo "<div id='form1' >   
                            <input type='hidden' name='uid' id='uid' value='".$_SESSION['u_id']."'>
                            <input type='hidden' name='date' id='date' value='".date('Y-m-d H:i:s')."'>
                            <textarea name='message' id='message'></textarea><br>
                            
                        </div> ";
			}else{
                            echo '<div id="login-link"><form action="signup.php" method="POST">
				<button type="submit" name="submit">Login</button>
				</form>Log in to write a comment</div>';
                        }
                        
                       
                        echo"<div class='comment-box1'>";
                        //getComments($conn);
                           //<form id='form1' >  </form>   
                         echo "</div>";
                        ?>
                        
		</div>
		<div id="footer">

		</div>
	</body>
</html>
