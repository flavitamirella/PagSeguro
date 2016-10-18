

new Vue({
    el: 'body',
    http:{
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    },
    data: {

    },


    methods: {


    },

    ready:function () {

       var valor = document.getElementById('valor').value;

        console.log(valor);

        PagSeguroDirectPayment.getPaymentMethods({

            amount: valor,
            sucess: function (response) {
                console.log(response);
            }
        })


    }
});
