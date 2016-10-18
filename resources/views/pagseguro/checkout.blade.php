@extends('template.main')

@section('title')
       Integração com Pagseguro
@endsection


@section('content')



<p>Checkout</p>
    <input type="hidden" value="{{$valorTotal}}" id="valor">

@endsection

@section('js')



    @endsection