
@extends('layout.app')
@section('main')
<!-- #register section-->
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Add Product Data</h1>
                    <form action="{{route('add_product')}}" name="" id="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Product Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name">
                            <span class="text-danger">    @error('name'){{$message}}@enderror
                                 </span>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Product Amount*</label>
                            <input type="text" name="amount" id="" class="form-control" placeholder="Enter Amount">
                            <span class="text-danger">    @error('amount') {{$message}}@enderror
                                 </span>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Description*</label>
                            <textarea type="" name="description" id="" class="form-control" placeholder=" Enter description..." rows="3" cols="15">
                                </textarea>

                            <span class="text-danger">
                                  @error('description'){{$message}}@enderror 
                                </span>
                        </div> 
                        <div class="mb-3">
        <label for="image">Image*</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
                        <button class="btn btn-primary mt-2">Add Product</button>
                    </form>                    
                </div>
              
            </div>
        </div>
    </div>
</section>
@endsection



