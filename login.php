    <!doctype html>  
    <html>  
    <head>  
    <title>Login</title>  
        <style>   
            body{  
                  
        margin-top: 100px;  
        margin-bottom: 100px;  
        margin-right: 150px;  
        margin-left: 80px;  
        background-color: azure ;  
        color: palevioletred;  
        font-family: verdana;  
        font-size: 100%  
          
            }  
                h1 {  
        color: indigo;  
        font-family: verdana;  
        font-size: 100%;  
    }  
            h3 {  
        color: indigo;  
        font-family: verdana;  
        font-size: 100%;  
    } </style>  
    </head>  
    <body>  
         <center><h1>ONLINE VOTING</h1></center>  
        
	  
    <center><h3>Login Form</h3></center>  
    <center><form action="" method="POST">  
    Username: <input type="text" name="user"><br/><br/>  
    Password: <input type="password" name="pass"><br/><br/>   
    <input type="submit" value="Login" name="submit" />  
    </form> </center> 
    <?php  
    if(isset($_POST["submit"])){  
      
    if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
        $user=$_POST['user'];  
        $pass=$_POST['pass'];  
      
        $con=mysqli_connect('localhost','root','tiger','2015CSE005') 		or die(mysqli_error());  
          
      
        $query=mysqli_query("SELECT * FROM login WHERE 		     		username='".$user."' AND password='".$pass."'");  
        $numrows=mysqli_num_rows($query);  
        if($numrows!=0)  
        {  
        while($row=mysqli_fetch_assoc($query))  
        {  
        $dbusername=$row['username'];  
        $dbpassword=$row['password'];  
        }  
      
        if($user == $dbusername && $pass == $dbpassword)  
        {  
          
        $_SESSION['sess_user']=$user;  
      
        /* Redirect browser */  
        header("Location: member.php");  
        }  
        } else {  
        echo "<center>Invalid username or password!</center>";  
        }  
      
    } else {  
      echo "<br/><center>All fields are required!</center>";  
    }  
    }  
    ?>  
    </body>  
    </html>   
