<!-- HOME -->
<div id="home" >
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                @foreach($sliders as $slider)
                    <div class="banner banner-1 {{ $loop->first ? 'active' : ' ' }}">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($slider->image)}}" style="height: 400px" alt="">
                        <div class="banner-caption text-center ">
                            <h3>{{$slider->title}}</h3>
                            <h2 class="white-color font-weak">{{$slider->price}}</h2>
                            <a href="{{route('product',['id' => $slider->id, 'slug' => $slider->slug])}}" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <!-- /banner -->
                @endforeach
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->
