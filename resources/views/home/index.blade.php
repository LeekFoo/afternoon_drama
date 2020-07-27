@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $message }}</h1>
    <div class="btn_area">
        <button type="button" id="draw-btn" class="btn btn-primary">ドロー！</button>
        <button type="button" id="sample-btn" class="btn btn-primary">作例</button>
        <button type="button" id="all-btn" class="btn btn-primary">カードリスト</button>
    </div>

    <div class="sample-area mt-3"></div>
    <div id="five-card" class="container">
        <div class="row"></div>
    </div>
    <div id="seven-card" class="container">
        <div class="row"></div>
    </div>
</div>
@endsection