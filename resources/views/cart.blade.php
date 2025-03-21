@extends('layouts.app')
@section('content')
    <div class="cart container">
        @if (count($cart) > 0)
            <table class="cart__table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Итого</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr class="cart__raw">
                        <td>{{$item->title}}</td>
                        <td class="cart__qty">
                            <button class="btn {{ $item->qty == $item->limit ? 'disabled' : '' }}" id="increase" cartid="{{ $item->id }}">+</button>
                            <span class="cart__qty-value">{{ $item->qty }}</span>
                            <button class="btn" id="decrease" cartid="{{ $item->id }}">-</button>
                        </td>
                        <td>{{$item->price}} ₽</td>
                        <td>{{$item->price * $item->qty}} ₽</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="cart__actions mt-4">
                <a href="{{route('create-order')}}" class="btn btn-success">Оформить заказ</a>
            </div>
        @else
            <h3 class="cart__table--empty">Корзина пуста</h3>
        @endif
    </div>

<script>
    const cartRaws = document.querySelectorAll('.cart__raw');

    cartRaws.forEach(raw => {
        const increase = raw.querySelector('#increase');
        const decrease = raw.querySelector('#decrease');
        const pid = Number(increase.attributes.cartid.value);

        increase.addEventListener('click', () => {
            fetch(`/changeqty/incr/${pid}`)
                .finally(() => window.location.reload());
        });
        decrease.addEventListener('click', () => {
            fetch(`/changeqty/decr/${pid}`)
                .finally(() => window.location.reload());
        });
    });
</script>
@endsection
