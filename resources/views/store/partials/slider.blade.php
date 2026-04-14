<div id="slider" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
     <ul class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
        <div class="slider-image" style="background-image: url('{{ asset('img/slider/Polygon-1.png') }}');"></div>
        </div>
        <div class="carousel-item ">
        <div class="slider-image" style="background-image: url('{{ asset('img/slider/carretera.jpg') }}');"></div>
        </div>
        <div class="carousel-item ">
        <div class="slider-image" style="background-image: url('{{ asset('img/slider/RRD_PD.png') }}');"></div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#slider" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slider" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>

