@extends('layouts.base')
@section('title', 'محطات القرآن الكريم')
@section('content')
    <div class="alert_danger animate__animated animate__flash" role="" id="alert_danger" style="display: none">
        يرجى اختيار المحطة أولاً
    </div>
    <div class="container" id="container">
        {{-- audio player at top page --}}
        <div class="myPlayer">
            <div id="audio-player-container">
                <div class="audio-player-inside-container">
                    <p class="titel_player" lang="ar" id="titel_player">audio player</p>
                    <button onclick="test()" id="play_icon_button" class="plays_buttons"
                        style="position: absolute;left: 6%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-play" viewBox="0 0 16 16">
                            <path
                                d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" />
                        </svg>
                    </button>
                    <button id="pause_icon_button" class="plays_buttons" style="position: absolute;left: 6%;display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-pause" viewBox="0 0 16 16">
                            <path
                                d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </button>
                    <input hidden type="range" id="seek-slider" max="100" value="0">
                    <output id="volume-output"></output>
                    <input type="range" id="volume-slider" max="100" value="100">
                    <button id="mute-icon"></button>
                    <div id="alert_before_playing" class="alert_before_playing"></div>
                </div>
            </div>
        </div>
        {{-- input to search for player name --}}
        <audio hidden id="myAudio" controls src="" class="radio"></audio>
        <div class="input_search" id="input_search" style="position: relative;">
            <input onkeyup="remove_text_on_write()" class="form-control custom_search_input" type="text"
                id="search_channel" placeholder="اكتب اسم المحطة او جزء من الأسم المراد البحث عنها">
            <button id="search_button" onclick="search_channel()" class="btn btn-primary custom_search_button">بحث</button>
            <button onclick="remove_text()">
                <i id="icon_remove" class="fa-regular fa-trash-can fa-xl icon_remove"></i>
            </button>
        </div>
        {{-- divs and buttons to play radio --}}
        <div class="row RowCard" id="RowCard">
            @foreach ($allData as $key => $value)
                <div class="col-4" id="DivcolCard">
                    <div class="mycard" id="mycard">
                        <h6 class="card-title">{{ $value['name'] }}</h6>
                        <button class="btn btn-primary button_play" id="button_play{{ $value['id'] }}"
                            onclick="add_whiteList({{ $value['id'] }})">تشغيل
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Error page have buttons to return home page --}}
    <div class="sorry" id="sorry">
        <div style="display: block;" class="Div_sorry"> عذراً لا يوجد محطه بهذا الأسم</div>
        <button type="button" class="btn btn-danger" onclick="remove_text()">رجوع</button>
    </div>

    <div id="wrapper">
    </div>
    <div class="scrollbar" id="style-1">
        <div class="force-overflow"></div>
    </div>
@endsection
