@section('header')
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">IGOlyd</p>
  <nav class="my-2 my-md-0 me-md-3">
    <a class="p-2 text-dark" href="{{ route('home') }}">Новости</a>
    <a class="p-2 text-dark" href="{{ route('forum') }}">Форум</a>
    <a class="p-2 text-dark" href="{{ route('provile') }}">Профиль</a>
    <a class="p-2 text-dark" href="{{ route('contact') }}">Поддержка</a>
  </nav>
  <a class="btn btn-outline-primary d-flex" href="{{ route('auth') }}">Войти</a>
  <a class="btn btn-outline-primary ml-2 d-flex"  href="{{ route('reg') }}">Регистрация</a>
</header>