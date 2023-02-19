<div class="container my-3">
  <form action="http://localhost/lession2/index.php?controller=user&action=login" method="POST">
    <div class="form-group">
      <label for="">Username</label>
      <input type="text" name="pUsername" value="<?php if (isset($_COOKIE["username"])) {
                                                    echo $_COOKIE["username"];
                                                  } ?>" class="form-control">
      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" name="pPassword" value="<?php if (isset($_COOKIE["password"])) {
                                                        echo $_COOKIE["password"];
                                                      } ?>" class="form-control">
    </div>
    <div class="form-group form-check">
      <div><input type="checkbox" name="remember" class="form-check-input" id="remember" <?php if (isset($_COOKIE["username"])) { ?> checked <?php } ?> />
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button>
      <p>Not have a account <span><a href="http://localhost/lession2/index.php?controller=user&&action=registerPage">Register here!</a></span></p>
  </form>
</div>