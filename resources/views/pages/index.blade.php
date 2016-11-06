@extends('./layout')
@section('title', 'Page Title')

@section('content')
    <div class="page page_bg-full-scr">
    <main class="main">
        <div class="main__wrap main__wrap_middle welcome">
            <div class="welcome__title">
                <h1 class="title title_color-white">Добро пожаловать</h1>
            </div>
            <div class="welcome__text">Перед вами сервис, который поможет вам организовать свои фотографии <br />в альбомы и поделиться ими со всем миром!</div>
            <div ui-view></div>
            <div class="welcome__form-wrap">
                <form class="welcome__form form" action="" method="post">
                    <label class="form__row welcome__form-row">
                        <input class="input-text input-text_full-width input-text_rect input-text_with-icon" type="text" placeholder="Имя" required>
                        <svg class="svg-icon svg-icon_name" role="img">
                            <use xlink:href="./assets/img/sprite.svg#name"></use>
                        </svg>
                    </label>
                    <label class="form__row welcome__form-row">
                        <input class="input-text input-text_full-width input-text_rect input-text_with-icon" type="mail" placeholder="Электронная почта" required>
                        <svg class="svg-icon svg-icon_envelope" role="img">
                            <use xlink:href="./assets/img/sprite.svg#envelope"></use>
                        </svg>
                    </label>
                    <label class="form__row welcome__form-row">
                        <input class="input-text input-text_full-width input-text_rect input-text_with-icon" type="password" placeholder="Пароль" required>
                        <svg class="svg-icon svg-icon_password" role="img">
                            <use xlink:href="./assets/img/sprite.svg#password"></use>
                        </svg>
                    </label>
                    <div class="form__row form__helper">Ваши данные остаются строго конфеденциальны</div>
                    <div class="form__tip">
                        <div class="form__tip-message">E-mail или пароль не верен</div>
                    </div>
                    <div class="form__row form__btns">
                        <button class="btn btn_full-width btn_flat">Создать аккаунт</button>
                    </div>
                    <div class="form__row form__helper form__helper_center">Уже зарегистрированы? <a class="form__helper-lnk" href="#" title="">Войти</a></div>
                </form>
            </div>
            <div class="welcome__form-wrap">
                <form class="welcome__form form" action="" method="post">
                    <div class="form__title">Забыли пароль?</div>
                    <div class="form__row form__helper">
                        <p>Ничего страшного, введите свой e-mail, и мы вышлем вам инструкции по востановлению пароля</p>
                    </div>
                    <label class="form__row welcome__form-row">
                        <input class="input-text input-text_full-width input-text_rect input-text_with-icon" type="mail" placeholder="Электронная почта" required>
                        <svg class="svg-icon svg-icon_envelope" role="img">
                            <use xlink:href="./assets/img/sprite.svg#envelope"></use>
                        </svg>
                    </label>
                    <div class="form__tip">
                        <div class="form__tip-message">E-mail или пароль не верен</div>
                    </div>
                    <div class="form__row form__btns">
                        <button class="btn btn_full-width btn_flat">Восстановить пароль</button>
                    </div>
                    <div class="form__row form__helper form__helper_center">Вспомнили пароль?  <a class="form__helper-lnk" href="#" title="">Войти</a></div>
                </form>
            </div>
        </div>
    </main>
    <footer class="footer footer_color_white">
        <div class="footer__wrap">
            <div class="footer__copyright footer__copyright_align_center">2016 Создано командой профессионалов на продвинутом курсе по веб-разработке от LoftSchool</div>
        </div>
    </footer>
</div>
@endsection
