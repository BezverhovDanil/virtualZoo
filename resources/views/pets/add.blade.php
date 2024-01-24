@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить питомца</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pets.add') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="species" class="form-label">Разновидность животного:</label>
                <input type="text" name="species" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Возраст:</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Фотография:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Добавить питомца</button>
        </form>

        
    </div>
@endsection
