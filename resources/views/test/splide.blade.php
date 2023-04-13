<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css"
    />
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"
    ></script>
    <title>Gallery</title>
    <style>
      
    </style>
  </head>
  @php
      $product = App\Models\Product::findOrFail(103);
      $images = json_decode($product->image);
  @endphp
  <body>
    <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
      <div class="splide__track">
        <ul class="splide__list">
          @foreach ($images as $image)
          <li class="splide__slide">
            <img
              src="{{asset('img/qr-image/'.$image)}}"
              alt=""
            />
          </li>
          @endforeach
        </ul>
      </div>
    </section>

    <ul id="thumbnails" class="thumbnails">
      <li class="thumbnail">
        <img src="https://source.unsplash.com/random/1000x1000?sig=1" alt="" />
      </li>
      <li class="thumbnail">
        <img src="https://source.unsplash.com/random/1000x1000?sig=2" alt="" />
      </li>
      <li class="thumbnail">
        <img src="https://source.unsplash.com/random/1000x1000?sig=3" alt="" />
      </li>
      <li class="thumbnail">
        <img src="https://source.unsplash.com/random/1000x1000?sig=4" alt="" />
      </li>
    </ul>
  </body>
</html>
