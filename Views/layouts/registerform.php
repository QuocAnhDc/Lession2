<div class="container my-3">
  <form action="http://localhost/lession2/index.php?controller=user&action=register" method="POST">
    <div class="form-group">
      <label for="">Username</label>
      <input type="text" name="pUsername" class="form-control">
      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" name="pPassword" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="pEmail" class="form-control">
    </div>
    <button type="submit" name="register" class="btn btn-primary">Register</button>
    <p>Have a account <span><a href="http://localhost/lession2/index.php?controller=user&&action=indexPage">Login here!</a></span></p> 
    <p></p>
  </form>
</div>