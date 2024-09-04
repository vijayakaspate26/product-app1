@extends('layout.app')
@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Login</h1>
                  
                     <!-- #region -->

                     @if(Session::has('errors'))
                     <div class="alert alert-danger">
                        <p>{{Session::get('errors')}}</p>
                     </div>
                      @endif
                      
                      <form action="{{ route('POSTlogin') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="mb-2">Email*</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="example@example.com" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="password" class="mb-2">Password*</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="justify-content-between d-flex">
        <button class="btn btn-primary mt-2">Login</button>
        <!-- <a href="forgot-password.html" class="mt-3">Forgot Password?</a> -->
    </div>
</form>
                  
                </div>
                <div class="mt-4 text-center">
                    <p>Do not have an account? <a  href="{{route('register')}}">Register</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
@endsection