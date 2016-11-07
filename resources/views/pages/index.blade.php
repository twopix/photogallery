@extends('layouts.layout')
@section('title', 'Page Title')

@section('content')
    <div class="page page_bg-full-scr">
        <main class="main">
            <div class="main__section main__section_middle welcome">
                <div class="welcome__title">
                    <h1 class="title title_color-white">Добро пожаловать</h1>
                </div>
                <div class="welcome__text">Перед вами сервис, который поможет вам организовать свои фотографии <br />в альбомы и поделиться ими со всем миром!</div>
                <div ui-view></div>

            </div>
        </main>
        <footer class="footer footer_color_white">
            <div class="footer__wrap">
                <div class="footer__copyright footer__copyright_align_center">2016 Создано командой профессионалов на продвинутом курсе по веб-разработке от LoftSchool</div>
            </div>
        </footer>
    </div>
@endsection
