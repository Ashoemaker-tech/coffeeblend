@extends('layouts.app')
@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Product Detail</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="/">Home</a></span>
            <span>Product Detail</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 ftco-animate">
        <a href="images/menu-2.jpg" class="image-popup"><img src="images/{{ $product['image'] }}" class="img-fluid" alt="Colorlib Template"></a>
      </div>
      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <h3>{{ $product['name'] }}</h3>
        <p class="price"><span>{{ $product['price'] }}</span></p>
        <p>{{ $product['description'] }}</p>
        <div class="row mt-4">
          <form action="/cart" method="POST">
            <div class="col-md-6">
              <div class="form-group d-flex">
                <div class="select-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="attributes" id="" class="form-control">
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                    <option value="Extra Large">Extra Large</option>
                  </select>
                  {{-- TODO fix this --}}
                  {{-- <input type="hidden" name="attribute" value="Small"> --}}
                </div>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="input-group col-md-6 d-flex mb-3">
              <span class="input-group-btn mr-2">
                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                  <i class="icon-minus"></i>
                </button>
              </span>
              <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
              <span class="input-group-btn ml-2">
                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                  <i class="icon-plus"></i>
                </button>
              </span>
            </div>
        </div>
        <!-- Add To Cart -->
        <input type="hidden" name="name" value="{{ $product['name'] }}">
        <input type="hidden" name="image" value="{{ $product['image'] }}">
        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
        <input type="hidden" name="description" value="{{ $product['description'] }}">
        <input type="hidden" name="price" value="{{ $product['price'] }}">
        <button type="submit" class="btn btn-primary py-3 px-5">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Related products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
          the blind texts.</p>
      </div>
    </div>
    <div class="row">
     @include('partials.relatedproducts') 
    </div>
  </div>
</section>
@endsection
