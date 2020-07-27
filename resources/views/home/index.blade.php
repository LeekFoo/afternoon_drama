@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ $message }}</h1>
    <div class="btn_area container">
        <div class="row justify-content-around">
            <button type="button" id="draw-btn" class="btn-circle-fishy palse">ドロー！</button>
            <button type="button" id="redraw-btn" class="btn-circle-fishy">引き直し</button>
        </div>
        <div class="row justify-content-center mt-3">
            <button type="button" id="sample-btn" class="btn btn-secondary">作例</button>
            <a href="/list" target="_blank" class="btn btn-secondary ml-2">カードリスト</a>
        </div>
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