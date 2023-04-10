<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .splide__slide img {
            width: 100%;
            height: auto;
        }

        .splide__slide {
            opacity: 0.6;
        }

        .splide__slide.is-active {
            opacity: 1;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</head>
<body>
    @php
        $product = App\Models\Product::find(105);
        $images = json_decode($product->image)
    @endphp
    <section id="main-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
              <ul class="splide__list">
                  @foreach ($images as $image)
                    <img src="{{asset('img/qr-image/'.$image)}}" alt="">
                  @endforeach
              </ul>
        </div>
    </section>
    <section
            id="thumbnail-carousel"
            class="splide"
            aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel."
            >
        <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($images as $image)                      
                    <li class="splide__slide">
                        <img src="{{asset('img/qr-image/'.$image)}}" alt="">
                    </li>
                    @endforeach
                </ul>
        </div>
    </section>
      <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
      <script>
        document.addEventListener( 'DOMContentLoaded', function () {
            var main = new Splide( '#main-carousel', {
                type      : 'fade',
                rewind    : true,
                pagination: false,
                arrows    : false,
            } );


            var thumbnails = new Splide( '#thumbnail-carousel', {
                fixedWidth  : 100,
                fixedHeight : 60,
                gap         : 10,
                rewind      : true,
                pagination  : true,
                isNavigation: true,
                breakpoints : {
                600: {
                    fixedWidth : 60,
                    fixedHeight: 44,
                },
                },
            } );
            main.sync( thumbnails );
            main.mount();
            thumbnails.mount();
            } );
      </script>
</body>
</html>