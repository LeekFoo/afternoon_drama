@extends('layouts.app')

@section('content')
    <h1>{{ $message }}</h1>
    <button type="button" id="draw-btn" class="btn btn-primary">ドロー！</button>

    {{-- <h2>7文字</h1>
    @foreach($word7 as $word)
        <div>{{ $word->word }}</div>
    @endforeach

    <h2>5文字</h1>
    @foreach($word5 as $word)
        <div>{{ $word->word }}</div>
    @endforeach --}}
    <div id="five-card" class="container">
        <div class="row"></div>
    </div>
    <div id="seven-card" class="container">
        <div class="row"></div>
    </div>
@endsection