
@extends('layouts.app')

@section('content')
    
    
    <div class="container">
    <h1>Список питомцев</h1>
        @foreach($pets as $pet)
        <div class="card" style="width: 18rem;">
        
        @if($pet->image)
                    <img class="card-img-top" src="{{ asset($pet->image) }}" alt="Pet Image" style="max-width: 300px; max-height: 200px;">
                @endif
            <div class="card-body">
                <h5 class="card-title">{{ $pet->name }}</h5>
                <p class="card-text">{{ $pet->age }}</p>
                <p class="card-text">{{ $pet->description }} </p>
                
                <form action="{{ route('pets.delete', ['id' => $pet->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button style="border-radius:200px;" type="submit">Удалить питомца</button>
                </form>
            </div>
        </div>
        
            
        @endforeach
        
    </div>
@endsection
