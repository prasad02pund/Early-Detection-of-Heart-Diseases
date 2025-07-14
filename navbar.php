  <!-- Navbar -->
  <style>
  body.blur::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(5px);
      z-index: 999;
  }

  #profile-info {
      z-index: 1000;
      display: none; /* Hide by default */
  }

  #profile-info.active {
      display: block;
  }
</style>



 
  <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="Home.php"><img src="image/logo.png" alt="Heart Care Logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item"><a href="Home.php" class="nav-link">Home</a></li>
                  <li class="nav-item"><a href="Report.php" class="nav-link">Report</a></li>
                  <li class="nav-item"><a href="About Us.php" class="nav-link">About </a></li>
                  <li class="nav-item"><a href="Contactus.php" class="nav-link">Contact</a></li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-user-circle"></i>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Profile</a></li>
                          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <!-- Profile Information Section -->
  <div id="profile-info" class="profile-panel">
      <button id="close-profile" class="close-btn">&times;</button>
      <div class="text-center">
          <img src="image/imgLogin.jpg" alt="Profile Picture" class="rounded-circle mb-3" width="100">
          <h4 class="mb-3" id="fullname"><?php echo $user['fullname']; ?></h4>
      </div>
      <form id="profile-form" method="POST">
          <div class="mb-3">
              <label class="form-label">Mobile Number</label>
              <input type="text" class="form-control" id="mobile" value="<?php echo $user['mobile']; ?>" readonly>
          </div>
          <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" id="name" value="<?php echo $user['fullname']; ?>">
          </div>
          <div class="mb-3">
              <label class="form-label">Date of Birth</label>
              <input type="date" class="form-control" id="dob" value="<?php echo $user['dob']; ?>">
          </div>


          <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="mb-3">
                  <select class="form-control" id="gender" name="gender">
                      <option value="<?php echo strtolower($user['gender']); ?>" selected>
                          <?php echo ucfirst($user['gender']); ?>
                      </option>
                      <?php if (strtolower($user['gender']) == 'male'): ?>
                          <option value="female">Female</option>
                      <?php else: ?>
                          <option value="male">Male</option>
                      <?php endif; ?>
                  </select>
              </div>

          </div>

          <button type="submit" id="save-profile" class="btn btn-success w-100 mt-2" style="display: block;">Save</button>

      </form>
  </div>

  <script>
      $(document).ready(function() {
          $(".dropdown-item:contains('Profile')").click(function(e) {
              e.preventDefault();
              $("#profile-info").addClass("active");
              $("body").addClass("blur");

          });

          $("#close-profile").click(function() {
              $("#profile-info").removeClass("active");
              $("body").removeClass("blur");

          });


          $("#profile-form").submit(function(event) {
              event.preventDefault();

              $.ajax({
                  url: 'update_profile.php',
                  type: 'POST',
                  data: {
                      fullname: $("#name").val(),
                      dob: $("#dob").val(),
                      gender: $("#gender").val(),
                      mobile: $("#mobile").val()
                  },
                  dataType: 'json',
                  success: function(response) {
                      if (response.status === "success") {
                          alert(response.message);
                      } else {
                          alert(response.message);
                      }
                      $("#profile-info").removeClass("active");
                      document.getElementById('fullname').textContent = document.getElementById("name").value;
                      location.reload();
                  }
              });
          });
      });
  </script>