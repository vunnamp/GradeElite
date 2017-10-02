
<center><div class="jumbotron" style="width:70%; align:center;">
  
<h3><span style="color:green;"><?php echo @$_GET['logout']; ?></span></h3>
<?php if(isset($_SESSION['message'])){

  echo $_SESSION['message'];


  } ?>

<form class="form-horizontal" method="post">
  <fieldset>

    <legend>GradeElite Login</legend>
<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required="required">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required="required">
        </div>
    </div>
   <!--  <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="select" name="role">
          <option>Select</option>>
          <option>Admin</option>
          <option>Instructure</option>
          <option>Student</option>
          </select>
        </div>
    </div> -->
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </fieldset>
  <h3><span style="color:red;"><?php echo @$_GET['error3']; ?></span></h3>
</form>
</div>
</center>