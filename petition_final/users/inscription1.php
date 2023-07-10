
<?php 
require('db.php');
?>
<!doctype html ng-app>
 <html>
 <head>
  <meta charset="utf-8"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>inscription</title>
  <!-- Bootstrap Files -->
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Stylesheet -->
	<!--<link rel="stylesheet" href="../css/style.css">-->
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/ca0905f6a5.js"></script>
	<!-- TechSavvy Font -->
	<link href="https://fonts.googleapis.com/css?family=Saira+Stencil+One&display=swap" rel="stylesheet">
	<!-- Headings Blog -->
	<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
	<!-- Paragraph Blog -->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style type="text/css">

*{
margin :0 ;
padding: 0;
box-sizing:  border-box;
font-family: 'poppins' , sans-serif;

}

body{
height:100vh ;
display: flex;
align-items: center;
justify-content: center;
background-color: #4070f4 ;

}

.container {

position: relative;
max-width: 100%;
width: 100%;
background: #fff;
border-radius: 10px;
box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.container .form {
padding: 30px;

}

.container .form .title{
position: relative;
font-size: 27px;
font-weight: 600;
}

input[type=text]{
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}

input[type=password]{
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}

input[type=submit] {
width: 100%;
background-color: #4070f4;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
}

a:link {
color: #4070f4;
background-color: transparent;
text-decoration: none;
}
</style> 
<script language="javascript">
    function IsNotphone(phone){
    if((phone.value.length > 11) || (phone.length < 8)){
        return (false);
    }
    else{
        return (true);
    }
 }
    function isNotEmail(email)
    {
     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
      {
        return (false)
      }
        return (true)
    }
    function isNotName(name){
    var regName = /^[a-zA-Z]+$/;
    if(!regName.test(name)){
        return true;
    }else{
        return false;
    }}
    function validate(form) {
       if(isNotEmail(form[0].value)){
               alert("entrez un email valid");
               return false;
       }
       if(form[1].value!=form[2].value){
                      alert("verification de mot de passe est faux");
                      return false;
              }
       if(isNotName(form[3].value)){
                      alert("entrez un nom valid");
                      return false;
              }
       if(isNotName(form[4].value)){
                             alert("entrez un prenom valid");
                             return false;
                     }
       if (IsNotphone(form[5].value)){
        alert("enter a valid phone no");
                             return false;
       }
       return true;

    }
</script>
 </head>
 <body>
 <center>

  <div class="container">
<div class="form" >

  <form onsubmit="return validate(this);"  name="f1" action="functions/register.php" method="post" enctype="multipart/form-data">
  	<h3 class="title">Inscription</h3>
<p style="color:red; <?php echo isset($_SESSION["errors"])?"display:block;":"display:none;" ?>"><?php echo isset($_SESSION["errors"])?$_SESSION["errors"]:"" ?></p>
      <table>

      	<tr>
          
          <td><input type="text" name="email" placeholder="Email" required></td>
        </tr>



        <tr>
          
          <td><input type="password" name="pwd" placeholder="Password" id="textpass"required></td>
        </tr>



        <tr>
        
          <td><input type="password" name="pwdconfirmation" placeholder="Confirm Password" id="textpassconf" required></td>
        </tr>



        <tr>
        
          <td><input type="text" name="famname" placeholder="First Name" required></td>
        </tr>



        <tr>
        
          <td><input type="text" name="name" placeholder="Last Name" required></td>
        </tr>
        <tr>
        
          <td><input type="text" name="phone" placeholder="Phone" required></td>
        </tr>
        <tr>
                  <td>Insert your image: <br>
                  <input class="form-control" type="file" name="image" placeholder="Enter name Here" required></td>
         </tr>



        <tr>
          <td> you are: <br>
          <input type="radio" name="role" value="etudiant" required> student <br>
          <input type="radio" name="role" value="prof"> proffessor <br>
          <input type="radio" name="role" value="p_admin"> administrator<br>
          </td>
        </tr>


        <tr>
           <td><p><a href="connexion.php">Already a member ?</a></p></td>
        </tr>


        <tr>   <td><input type="submit" name="submit"  value="Register" style="padding-left: 6px; margin-left: 10px; onclick="Validate();">
	</td>
 	</tr>
      </table>
  </form>

  </center>

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
	 </html>

	 	 <?php if(isset($_SESSION["errors"])){
     	 unset($_SESSION["errors"]);} ?>

