<div class="container my-3">
  <form action="http://localhost/lession2/index.php?controller=user&&action=login" method="POST">
    <div class="form-group">
      <label for="">Username</label>
      <input type="text" name="pUsername" class="form-control">
      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" name="pPassword" class="form-control">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" name ="remember" class="form-check-input" id="remember">
      <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <button type="submit" name="login" class="btn btn-primary">Login</button>
  </form>
</div>