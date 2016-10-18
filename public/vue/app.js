

new Vue({
    el: 'body',

    http:{
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    },
    data: {

        dados: [],

        produtos: true,

        Metodopagamento: false,

        paymentMethods: [],

        itens: [],
        creditCard: {
          num: '',
          cvv: '',
          monthExp: '',
          yearExp: '',
          brand: '',
          token: ''
        },

        carrinho:{

            quantidade: null,
            valorTotal:0,
            resultado: []

        },

        arr: [],

    },

    methods: {

        goCheckout: function () {

            this.Metodopagamento = true;

            PagSeguroDirectPayment.getPaymentMethods({
                success: response => {

                    var resultado = response;
                    var i = 0;

                    for(pagamento in resultado.paymentMethods){
                       this.paymentMethods = Object.keys(response.paymentMethods).map(function(k) { return response.paymentMethods[k] });
                       console.log(this.paymentMethods[i].name);
                       i++;

                   }

                },

            });


        },


        paymentCreditCard: function(){
          this.getCreditCardBrand();
        },

        getCreditCardBrand: function(){
          PagSeguroDirectPayment.getBrand({
              cardBin: this.creditCard.num.substring(0,6),
              success: response => {
                  this.creditCard.brand = response.brand.name;
                  this.getCreditCardToken();
              },


          });
        },

        getCreditCardToken: function(){
          PagSeguroDirectPayment.createCardToken({
              cardNumber: this.creditCard.num,
              brand: this.creditCard.brand,
              cvv: this.creditCard.cvv,
              expirationMonth: this.creditCard.monthExp,
              expirationYear: this.creditCard.yearExp,
              success: response => {
                  this.creditCard.token = response.card.token;
                  this.sendPayment();
              },


          });
        },

        sendPayment: function(){
 
            this.$http.post('http://localhost:8000/order',{items: this.itens, token: this.creditCard.token,  hash: PagSeguroDirectPayment.getSenderHash(), method: this.paymentMethods, total: this.carrinho.valorTotal }).then(function(response){

            }.bind(this), function(error){

            });

        },

        compras: function(item, valor) {

            this.itens.push(item);

            console.log(this.itens);

             this.carrinho.valorTotal = this.carrinho.valorTotal+valor;

            this.carrinho.quantidade++;
        },

        getSessao:function () {

            this.$http.get('/session').then(function (resposta) {


              PagSeguroDirectPayment.setSessionId(resposta.data.sessionId);

            }).catch(function () {

            }).bind(this)

        },
    },

    ready:function () {

        this.$http.get('/listar').then(function (resposta) {

            this.dados = resposta.data;

            this.getSessao();
        }).catch(function () {

        }).bind(this)


    }
});
