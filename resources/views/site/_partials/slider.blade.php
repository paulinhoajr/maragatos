<div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($sliders as $slider)
            <div class="carousel-item {{ ($loop->index==0) ? 'active' : '' }}">
                <img src="
                    {{ asset("uploads/{$slider->imagem}") }}
                " class="d-block w-100" alt="{{ $slider->titulo }}">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
