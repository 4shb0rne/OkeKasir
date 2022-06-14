<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- {{-- bootstrap --}} -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- {{-- font awesome --}} -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
    integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
    crossorigin="anonymous"></script>
    <!-- {{-- css --}} -->
    <link rel="stylesheet" href="css/style.css">
    <!-- {{-- QuilJs CSS --}} -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body>
  <img src="{{asset('assets/background.jpeg')}}" alt="" class="background">
  <main class="form-login position-absolute top-50 start-50 translate-middle">
    <form action="/register" method="POST" enctype="multipart/form-data">
        @csrf
        <center>
          <img src="{{ asset('assets/logo 2.png') }}" alt="Logo" width="300px">
        </center>
      <h1 class="h3 m-3 fw-normal text-center font-weight-bold">Sign up</h1>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control @error("username") is-invalid @enderror"  placeholder="Enter your name" required value="{{ old("username") }}">
        @error ("username")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="useremail" id="email"  class="form-control @error("email") is-invalid @enderror" placeholder="xxxx@example.com" required value="{{ old("email") }}">
        @error ("email")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="**********" required value="{{ old('password') }}">
        @error ('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Repeat Password</label>
        <input type="password" name="userrepeatpassword" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="**********" required value="{{ old('password') }}">
        @error ('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="dob" class="form-label">Date of birth</label>
        <input type="date" name="userdob" class="form-control @error('dob') is-invalid @enderror" id="dob" required value="{{ old('dob') }}">
        @error ('dob')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <button class="submitBtn w-100 btn" type="submit">Sign Up</button>
    </form>
    <small class="d-block text-center mt-3">Already have an account? <a href="/login" style="color:rgb(42, 42, 42); font-weight:bold">Log in here</a></small>
  </main>
</body>
</html>

