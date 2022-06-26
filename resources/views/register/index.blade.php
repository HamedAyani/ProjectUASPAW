<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{ url('register') }}" method="POST">
          @csrf
          <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Register</p>
          </div>
          {{-- name input --}}
          <div class="form-outline mb-2">
            <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
              placeholder="Enter a Name" required value="{{ old('name') }}"/>
            <label class="form-label">Name</label>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          {{-- usernam input --}}
          <div class="form-outline mb-4">
            <input type="text" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror"
              placeholder="Enter a UserName" required value="{{ old('username') }}"/>
            <label class="form-label" >UserName</label>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Enter a valid email address" required value="{{ old('email') }}"/>
            <label class="form-label" >Email address</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
              placeholder="Enter password" required/>
            <label class="form-label" >Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        
          <div class="d-flex justify-content-between align-items-center">
            <!-- buttonsubmit -->
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
              <br>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login"
                class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>