<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dualshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('Layouts.app')
@section('content')

<section class="banner">
    <div class="banner__content text-center">
        <div class="banner__image-container">
            <a href="/catalog?filter=1">
                <img src="{{ Vite::asset('resources/media/images/rtx.svg') }}" alt="Видеокарта" class="banner__image img-fluid">
            </a>            
            <div class="banner__text">
                <h1 class="banner__h1">RTX4090</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <section class="about">
        <h3 class="about__title text-start">Dualshop – всё для технологий</h3>
        <p class="about__text-block">
            Добро пожаловать в Dualshop! Мы предлагаем широкий ассортимент техники и аксессуаров, чтобы вы всегда оставались на пике технологий.
        </p>
        <p class="about__text-block">
            У нас вы найдете последние новинки электроники от мировых брендов, отличные цены и гарантированное качество. Доставка осуществляется по всей России, а также доступны услуги самовывоза.
        </p>
    </section>

    <!-- Секция "Почему стоит выбрать нас?" -->
    <section class="why-choose-us my-5">
    <h3 class="about__title text-start">Почему стоит выбрать нас?</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card text-center">
                    <img src="{{ Vite::asset('resources/media/images/preim (1).svg') }}" class="card-img-top" alt="Широкий ассортимент">
                    <div class="card-body">
                        <h5 class="card-title">Широкий ассортимент</h5>
                        <p class="card-text">Товары от ведущих брендов.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card text-center">
                    <img src="{{ Vite::asset('resources/media/images/preim (3).svg') }}" class="card-img-top" alt="Конкурентные цены">
                    <div class="card-body">
                        <h5 class="card-title">Конкурентные цены</h5>
                        <p class="card-text">Регулярные акции и скидки.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card text-center">
                    <img src="{{ Vite::asset('resources/media/images/preim(2).svg') }}" class="card-img-top" alt="Гарантия качества">
                    <div class="card-body">
                        <h5 class="card-title">Гарантия качества</h5>
                        <p class="card-text">На все товары.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Слайдер с картинками -->
    <section class="slider">
    <h3 class="about__title text-start">Популярные товары</h3>
        @if ($products->isNotEmpty())
        <div id="carouselExampleCaptions" class="carousel carousel-dark slide">
            <div class="carousel-indicators pt-4">
                @foreach($products as $product)
                <button type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"
                        aria-current="{{ $loop->index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $loop->iteration }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($products as $product)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                <img src="{{ Vite::asset('resources/media/images/' . $product->img) }}" alt="{{ $product->title }}" class="product__image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $product->title }}</h5>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        @else
        <p>Нет доступных продуктов для отображения.</p>
        @endif
    </section>

    <!-- После существующих секций -->
    <section class="new-products">
        <div class="container">
            <h3 class="about__title text-start">Новинки</h3>
            <div class="new-products__grid">
                @foreach($newProducts as $product)
                <div class="new-product__card">
                    <div class="new-product__image-container">
                        <img src="{{ Vite::asset('resources/media/images/' . $product->img) }}" 
                             alt="{{ $product->title }}" 
                             class="new-product__image">
                        <div class="new-product__badge">New</div>
                    </div>
                    <div class="new-product__info">
                        <h4 class="new-product__title">{{ $product->title }}</h4>
                        <p class="new-product__price">{{ $product->price }} ₽</p>
                        <div class="new-product__actions">
                            <a href="/product/{{ $product->id }}" class="btn btn-outline-success">Подробнее</a>
                            @auth
                                <button onclick="addToCart({{ $product->id }})" class="btn btn-success">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@auth
<div class="position-fixed" style="top: 20px; right: 20px; z-index: 9999;">
    <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="fas fa-check-circle me-2"></i>
            <strong class="me-auto">Успешно</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-success text-white">
            Товар успешно добавлен в корзину
        </div>
    </div>
    
    <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong class="me-auto">Ошибка</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white">
            Товара нет в наличии
        </div>
    </div>
</div>

<script>
function addToCart(productId) {
    fetch(`/add-to-cart/${productId}`)
        .then(response => {
            if (response.ok) {
                const toast = new bootstrap.Toast(document.getElementById('successToast'), {
                    autohide: true,
                    delay: 3000
                });
                toast.show();
            } else {
                const toast = new bootstrap.Toast(document.getElementById('errorToast'), {
                    autohide: true,
                    delay: 3000
                });
                toast.show();
            }
        })
        .catch(() => {
            const toast = new bootstrap.Toast(document.getElementById('errorToast'), {
                autohide: true,
                delay: 3000
            });
            toast.show();
        });
}



</script>

<style>
.toast {
    min-width: 300px;
    background: transparent;
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    margin-bottom: 10px;
    position: relative;
    right: 0;
    opacity: 1 !important;
}

.toast-header {
    border-bottom: none;
    padding: 12px 15px;
    border-radius: 8px 8px 0 0;
}

.toast-body {
    padding: 12px 15px;
    border-radius: 0 0 8px 8px;
}

.btn-close {
    opacity: 0.8;
    padding: 12px;
}

.btn-close:hover {
    opacity: 1;
}

/* Анимация появления */
.toast.showing {
    opacity: 1 !important;
    transform: translateX(0);
    transition: all 0.3s ease;
}

.toast.hide {
    opacity: 0 !important;
    transform: translateX(100%);
    transition: all 0.3s ease;
}

/* Убираем паддинги у контейнера */
.position-fixed {
    padding: 0;
}
</style>
@endauth

@endsection
</body>
</html>
