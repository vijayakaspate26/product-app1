@extends('layout.app')
@section('main')
<div class="section">
  @if (Session::has('success'))
  <div class="alert alert-success">
                          <p>{{Session::get('success')}}</p>
                       </div>
  
  @endif
  
</div>

<section class="section-3  py-5">
    <div class="container">
        <h2>Product List</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $product->name }}</h3>
                                    <p>{{ $product->description }}</p>
                                    
                                    <div class="bg-light p-3 border">
                                     
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                            <span class="ps-1">{{$product->amount}}</span>
                                        </p>

                                        <img src="{{asset('storage/' . $product->image)}}" alt="{{ $product->name }}" width=""><br>
                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="{{route('view',$product->id)}}" class="btn btn-primary btn-lg">Details</a>
                                      
                                    </div>
                                    
                                    <div class="d-grid mt-3">
                                    <a href="{{route('edit', $product->id)}}" class="btn btn-primary btn-lg">Edit</a>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                  @endforeach
                                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection