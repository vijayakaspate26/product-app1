
@extends('layout.app')
@section('main')
<!-- #register section-->
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action="{{route('process_register')}}" name="registerfrom" id="registerform" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                            <span class="text-danger">    @error('name'){{$message}}@enderror
                                 </span>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                            <span class="text-danger">    @error('email') {{$message}}@enderror
                                 </span>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="name" class="form-control" placeholder="Enter Password">
                            <span class="text-danger">
                                  @error('password'){{$message}}@enderror 
                                </span>
                        </div> 
                      
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href="{{route('login')}}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



