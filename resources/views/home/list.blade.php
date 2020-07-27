@extends('layouts.app')

@section('content')
<div class="container">
    <h1>カード一覧</h1>
    <h2>5文字</h2>
    <div id="five-card" class="container">
        <div class="row">
            @foreach ($word5 as $word)
            <div class="five card col-md-2 ui-draggable ui-draggable-handle">{{ $word->word }}</div>
            @endforeach
        </div>
    </div>
    <h2>7文字</h2>
    <div id="seven-card" class="container">
        <div class="row">
            @foreach ($word7 as $word)
            <div class="seven card col-md-2 ui-draggable ui-draggable-handle">{{ $word->word }}</div>
            @endforeach
        </div>
    </div>
</div>
@endsection