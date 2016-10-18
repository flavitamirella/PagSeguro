
@extends('template.main')

@section('css')

    {{Html::style('plugins/font-awesome/css/font-awesome.min.css')}}
    {{Html::style('plugins/bootstrap/css/bootstrap.min.css')}}


@endsection

@section('content')


    <div v-if="produtos">
<div class="col-md-12">

    <div class="col-md-11"></div>

    <i class="fa fa-2x fa-shopping-cart right" aria-hidden="true"></i> &nbsp;R$ &nbsp;@{{carrinho.valorTotal }}

</div>


    <ul>

        <h1>Array de Produtos</h1>

        <li v-for="dado in dados">

            @{{ dado.name }}
            @{{ dado.value }}

            <a @click="compras(dado, dado.value)">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            </a>

        </li>

    </ul>

<br><br><br>

<center><button class="btn-danger" v-on:click="goCheckout">Comprar</button></center>
    </div>

    <div v-if="Metodopagamento">

      <h1>Array de Métodos de Pagamento</h1>

        <li v-for="pagamento in paymentMethods">

            @{{ pagamento.name }}

        </li>


        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <h4>Dados do cartão</h4>

            <div class="row">
                <div class="col-md-10 col-lg-10">
                    <div class="form-group">
                        <label>Nome do titular</label>

                        <input class="form-control" name="first_name" required="" type="text">

                    </div>
                  </div>
                </div>

            <div class="row">
                <div class="col-md-7 col-lg-7">
                    <div class="form-group"><label>Número do cartão</label>
                        <input class="form-control" name="number" required="" type="text" v-model="creditCard.num">
                    </div>

                </div>

                <br>
                <br>
                <div class="col-lg-4">
                    <img alt="" class="logo_son_cart" src="https://assets.schoolofnet.com/img/card-buy.png">
                </div></div>
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Vencimento</label>
                        <select class="form-control" v-model="creditCard.monthExp">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        </select>
                    </div></div>
                <div class="col-md-2 col-lg-2">
                    <div class="form-group">
                      <label>Ano</label>

                        <select class="form-control" name="year" v-model="creditCard.yearExp">
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div></div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Cod. Segurança</label>
                        <input class="form-control" name="verification_value" placeholder="3 ou 4 Dígitos" type="text" v-model="creditCard.cvv">
                    </div></div></div><div class="row">
                <div class="col-md-10 col-lg-10"><br>
                    <a href="/subscribe/bankslip">Não possui cartão de crédito? Clique aqui</a>
                </div></div><div class="row"><div class="form-group">
                    <div class="col-md-10 col-lg-10">
                        <button v-on:click="getCreditCardBrand" class="btn btn-success">Avançar</button>
                    </div></div></div>


    @endsection


@section('js')

    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    {{Html::script('vue/vue.js')}}
    {{Html::script('vue/vue-resource.js')}}
    {{Html::script('vue/app.js')}}



    @endsection
