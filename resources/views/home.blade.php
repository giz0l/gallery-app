@extends('layouts.base')

@section('title', 'ArtGallery')

@section('content')
    <div class="mx-auto my-5 text-center w-25">
        <form action="{{ route('getImages') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">Wprowadź liczbę obrazów do pobrania z "Art Institute of Chicago API - Artworks" <small>(max 30)</small></label>
                <input type="number" style="width: 100px;" class="form-control mx-auto @error('name') is-invalid @enderror" name="number" id="number" required>
                @error('number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Wczytaj</button>
        </form>
    </div>
    <hr>
    <div class="mx-auto mt-5 w-75">
        @if(count($images) > 0)
            <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true }'>
                @foreach($images as $image)
                    <div class="carousel-cell">
                        <img class="m-5" src='{{ asset('storage/' . $image ) }}' height="400px">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
