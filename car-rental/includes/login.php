<?php
if(isset($_POST['login']))
  {
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $sql ="SELECT EmailId,Password,FullName FROM USERS WHERE EmailId=:email and Password=:password";
  

  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
     //your site secret key
    $secret = '6Lciem0UAAAAAEt6ht6Il-UUmk2QDXYwlIN8msOx';
    
    //get verify response data
    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    //getting JSON
    $response = json_decode($verify);
    
    
    if($response->success && $query->rowCount() > 0)
    {
      $_SESSION['login']=$_POST['email'];
      $_SESSION['status']=$results->Status;
      $_SESSION['fname']=$results->FullName;
      $currentpage=$_SERVER['REQUEST_URI'];
      echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
      
    }
} else {
  echo "<script>alert('Please Check Recaptcha box');</script>";
   
}

echo "<script type = \"text/javascript\">
alert(\"Something went wrong. Please try again. \");
window.location = (\"index.php\")
</script>";

  }

?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email address*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password*">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">
                </div>
                
                <div class="form-group">
                  <input type="submit" name="login" value="Login" class="btn btn-block">
                </div>
                

                 <!--Google recaptch -->
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-2">
                        <div class="g-recaptcha" data-sitekey="6Lciem0UAAAAANciVcyORnGYIRROetMYRfl8jKVH"></div>
                    </div>
                </div>




              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>