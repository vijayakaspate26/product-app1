@extends('layout.app')
@section('main')
<div class="section">
 
  
</div>

<section class="section-3  py-5">
    <div class="container">
        <h2>Product details page</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                
                        <div class="col-md-8">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $product->name }}</h3>
                                    <p>{{ $product->description }}</p>
                                    
                                    <div class="bg-light p-3 border">
                                     
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                            <span class="ps-1">{{$product->amount}}</span>
                                        </p>
                                    </div>

                                    <img src="{{asset('storage/' . $product->image)}}" alt="{{ $product->name }}" class="mt-2php" style="width:350px"><br>
<a href="{{ route('list') }}" class="btn btn-primary btn-lg">Back to Products</a>
                                </div>
                            </div>
                        </div>
         
                                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection