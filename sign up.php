<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>






<form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label" for="validationServer01">Email</label>
    <input type="email" class="form-control" id="validationServer01"" class="form-control is-valid" required>
    <div class="valid-feedback">
      looks good
    </div>
  </div><br>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div><br>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="inputName" placeholder="First Name">
  </div>
  <div class="col-12">
    <label for="inputName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="inputName" placeholder="Last Name">
  </div>
  <div class="col-md-6">
    <label for="inputCompany" class="form-label">Company</label>
    <input type="text" class="form-control" id="inputCompany">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select">
      <option selected>IT consultant</option>
      <option>Business Man</option>
      <option>Business Woman</option>
      <option>Tech consultant</option>
      <option>Student</option>
    </select>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Proceed</button>
  </div>
</form>





</body>
</html>