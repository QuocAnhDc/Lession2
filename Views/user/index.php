<h1>User page</h1>
<!-- Modal -->
<!-- View User Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">USER ID:</label>
          <input type="text" name="pName" id="view_uId" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="">USERNAME:</label>
          <input type="text" name="pName" id="view_uUsername" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="">PASSWORD:</label>
          <input type="text" name="pName" id="view_uPassword" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="">EMAIL:</label>
          <input type="text" name="pName" id="view_uEmail" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="">ROLE:</label>
          <input type="text" name="pName" id="view_uRole" class="form-control" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- View Edit Modal -->
<div class="modal fade" id="viewEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="http://localhost/lession2/?controller=user&action=updateInfor" method="POST">
        <div class="modal-body">
          <!-- <input type="hidden" name="uId" id="edit_uId"> -->
          <div class="form-group">
            <!-- <label for="">USER ID:</label> -->
            <input type="hidden" name="uId" id="edit_uId" class="form-control">
          </div>
          <div class="form-group">
            <label for="">USERNAME:</label>
            <input type="text" name="uUsername" id="edit_uUsername" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="">PASSWORD:</label>
            <input type="text" name="uPassword" id="edit_uPassword" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="">EMAIL:</label>
            <input type="text" name="uEmail" id="edit_uEmail" class="form-control" placeholder="Enter Email">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" name="update_userInfor" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Content -->
<div class="wrapper mt-4 container justify-content-center">
  <div class="row">
    <div class="col-md-12">
      <div class="mt-5 mb-3 clearfix">
        <h2 class="pull-left">Your information</h2>
      </div>

      <?php

      if ($user != null) {
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>USERNAME</th>";
        echo "<th>PASSWORD</th>";
        echo "<th>EMAIL</th>";
        echo "<th>ROLE</th>";
        echo "<th>OPERATION</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($user as $key => $value) {
          // echo $value['id'];
          echo "<tr>";
          echo '<th class="user_id">' . $value['id'] . "</th>";
          echo "<td>" . $value['username'] . "</td>";
          echo "<td>" . $value['password'] . "</td>";
          echo "<td>" . $value['email'] . "</td>";
          echo "<td>" . $value['role'] . "</td>";
          echo "<td>";

          echo '<a class="mr-3 view_btn" title="View Record" ><span class="fa fa-eye"></span></a>';
          echo '<a href="" class="mr-3 edit_btn" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';

          echo "</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";


      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      ?>
    </div>
  </div>
</div>

<!-- Script -->

<script>
  $(document).ready(function() {
    $('.view_btn').click(function(e) {
      e.preventDefault();
      var user_id = $(this).closest('tr').find('.user_id').text();
      console.log(user_id);
      $.ajax({
        type: "POST",
        url: "http://localhost/lession2/?controller=user&action=show&id=" + user_id,
        success: function(response) {
          //  console.log(response['1']);
          $.each(response['0'], function(key, value) {
            // console.log(value['id']);
            $('#view_uId').val(value['id']);
            $('#view_uUsername').val(value['username']);
            $('#view_uPassword').val(value['password']);
            $('#view_uEmail').val(value['email']);
            $('#view_uRole').val(value['role']);
          });
          $('#viewUserModal').modal('show');
        }
      });
    });

    // edit user
    $('.edit_btn').click(function(e) {
      e.preventDefault();
      var user_id = $(this).closest('tr').find('.user_id').text();
      console.log(user_id);
      $.ajax({
        type: "POST",
        url: "http://localhost/lession2/?controller=user&action=show&id=" + user_id,
        success: function(response) {
          //  console.log(response['1']);
          $.each(response['0'], function(key, value) {
            // console.log(value['id']);
            $('#edit_uId').val(value['id']);
            $('#edit_uUsername').val(value['username']);
            $('#edit_uPassword').val(value['password']);
            $('#edit_uEmail').val(value['email']);
          });
          $('#viewEditModal').modal('show');
        }
      });
    });
    // });
  });
</script>