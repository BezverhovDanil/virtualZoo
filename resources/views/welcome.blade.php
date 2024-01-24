@extends('layouts.app')

@section('content')
    <div class="container">
    <div id="carouselExampleControls" class="carousel slide h-300" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($pets as $key => $pet)
                <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                    <img src="{{ asset($pet->image) }}" class="d-block w-100 max-height-slider" alt="{{ $pet->name }}" style="max-height: 400px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $pet->name }}</h5>
                        <p>{{ $pet->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

    <!-- Добавленный код для активации карусели -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-e8ogp5dmk5NlPkO9fsh0QkjEf06F0E4MAq6Ddtzbo0Yq3F8wBEfZaejKftwG3mMz" crossorigin="anonymous"></script>
    </div>
@endsection
