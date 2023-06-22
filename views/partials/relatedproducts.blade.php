@foreach ($relatedProducts as $relatedProduct)
      <div class="col-md-3">
        <div class="menu-entry">
          <a href="/product?id={{ $relatedProduct['id'] }}" class="img" style="background-image: url(images/{{ $relatedProduct['image'] }});">
          </a>
          <div class="text text-center pt-4">
            <h3>
              <a href="/product?id={{ $relatedProduct['id'] }}">{{ $relatedProduct['name'] }}</a>
            </h3>
            <p>{{ $relatedProduct['description'] }}</p>
            <p class="price"><span>{{ $relatedProduct['price'] }}</span></p>
            <p>
              <a href="/product?id={{ $relatedProduct['id'] }}" class="btn btn-primary btn-outline-primary">View Options
              </a>
            </p>
          </div>
        </div>
      </div>
      @endforeach
