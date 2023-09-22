

<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <div class="card shadow"  style="margin-top : 100px">
        <h4 class="text-center mt-3">Login</h4>
        <p class="text-center fw-bold text-success">BUMDES SUNGAI ULAR</p>
        <hr>

        <div class="card-body">

          <form method="post" action="<?= base_url('login/act_login') ?>">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Username">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Password</label>
              <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login sekarang</button>
          </form>

        </div>
      </div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() ?>assets/alert.js"></script>
  <?php echo "<script>".$this->session->flashdata('message')."</script>"?> 
</body>
</html>