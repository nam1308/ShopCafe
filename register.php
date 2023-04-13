<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/register.css">
    <style>
      .show_error{
        position: absolute;
        top: -17px;
        left: 19px;
      }
    </style>
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form action="process_register.php" method="POST">

              <div class="row">
                <div class="col-md-6 mb-4">
               
                  <div class="form-outline">
                     <?php if(!empty($_POST['name_error'])) echo '<span class="show_error" style="color:red;font-size:10px;">'.$_POST['name_error'].'</span>'; ?>
                    <input name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>" type="text" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">Tên Người Dùng</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                  <?php if(!empty($_POST['address_error'])) echo '<span class="show_error" style="color:red;font-size:10px;">'.$_POST['address_error'].'</span>' ?>
                    <input name="address" value="<?php if(!empty($_POST['address'])) echo $_POST['address']; ?>" type="text" id="lastName" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Địa Chỉ</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                  <?php if(!empty($_POST['birth_error'])) echo '<span class="show_error" style="color:red;font-size:10px;">'.$_POST['birth_error'].'</span>' ?>
                    <input name="birth" value="<?php if(!empty($_POST['birth'])) echo $_POST['birth']; ?>" type="date" class="form-control form-control-lg" id="birthdayDate" />
                    <label for="birthdayDate" class="form-label">Ngày Sinh</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Giới Tính: </h6>

                  <div class="form-check form-check-inline">
                  
                    <input class="form-check-input" type="radio" name="sex" id="femaleGender"
                      value="1" checked />
                    <label class="form-check-label" for="femaleGender">Nam</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="maleGender"
                      value="2" />
                    <label class="form-check-label" for="maleGender">Nữ</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="otherGender"
                      value="3" />
                    <label class="form-check-label" for="otherGender">Khác</label>
                  </div>
                  <?php if(!empty($_POST['sex_error'])) echo '<span style="color:red;">'.$_POST['sex_error'].'</span>' ?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <?php if(!empty($_POST['email_error'])) echo '<span class="show_error" style="color:red;font-size:10px;">'.$_POST['email_error'].'</span>'; ?>
                    <input name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>" type="email" id="emailAddress" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <?php if(!empty($_POST['phone_error'])) echo '<span class="show_error" style="color:red;font-size:10px;">'.$_POST['phone_error'].'</span>'; ?>
                    <input name="phone" value="<?php if(!empty($_POST['phone'])) echo $_POST['phone']; ?>" type="tel" id="phoneNumber" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Số Điện Thoại</label>
                  </div>

                </div>
              </div>    
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <?php if(!empty($_POST['account_error'])) echo '<span class="show_error" style="color:red;font-size:10px;">'.$_POST['account_error'].'</span>'; ?>
                    <input name="account" value="<?php if(!empty($_POST['account'])) echo $_POST['account']; ?>" type="text" id="emailAddress" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">
                        Tài Khoản
                    </label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <?php if(!empty($_POST['password_error'])) echo '<span class="show_error" style="color:red;font-size:10px;">'.$_POST['password_error'].'</span>'; ?>
                    <input name="password" type="password" id="phoneNumber" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Mật Khẩu</label>
                  </div>

                </div>
              </div>    
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>