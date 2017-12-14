<?php
session_start();
date_default_timezone_set('Europe/Stockholm');
    include '../../classes/integration/dbhandler.inc.php';
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
                            url: '../../get-comment.php',                          
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
                         url: '../../do-commentM.php',
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
                               url: '../../deleteComments.php',
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
			<h1>The Best Meatballs Recipe</h1>
			<img class="pic" alt="meatballs" src="https://media3.s-nbcnews.com/i/newscms/2016_37/1158018/meatballs-today-160914-tease-02_9473265cce330fbbe87dc3cad7ac7654.jpg"/>

			<h2>Ingredients</h2>
			<ul id = "recepie">

				<li><b>1</b> lb lean (at least 80%) ground beef</li>
				<li><b>1/2</b> cup Progresso Italian-style bread crumbs</li>
				<li><b>1/4</b> cup milk</li>
				<li><b>1/2</b> teaspoon salt</li>
				<li><b>1/2</b> teaspoon Worcestershire sauce</li>
				<li><b>1/4</b> teaspoon pepper</li>
				<li><b>1</b> small onion, finely chopped (1/4 cup)</li>
				<li><b>1</b> egg</li>
			</ul>
		</div>


			<h2>Steps</h2>
			<ol id = "steps">

				<li>Heat oven to 400F. Line 13x9-inch pan with foil; spray with cooking spray.</li>
				<li>In large bowl, mix all ingredients. Shape mixture into 20 to 24 (1 1/2-inch) meatballs. Place 1 inch apart in pan.</li>
				<li>Bake uncovered 18 to 22 minutes or until no longer pink in center.</li>
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
