<template>
    <div>
        <input id="card-holder-name" type="text" v-model="name">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>

        <button id="card-button" v-on:click="submitPayment">
            Update Payment Method
        </button>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                stripeAPIToken: 'pk_test_51HxnO0GDeLuTbz9Vt4iGRr9Jg6WbWMf2QrzRyEQRWxoWY60AR7kVFmfLGT1X9063L1BVtcMSWZXds4DjEKSspnPK00ZzI5zT2n',
                stripe: '',
                elements: '',
                card: '',
                intentToken: '',
                addPaymentStatus: 0,
                addPaymentStatusError: '',
                name: ''
            }
        },
        mounted() {
            this.configureStripe();
            this.loadIntent();
        },
        methods: {
            configureStripe() {
                this.stripe = Stripe(this.stripeAPIToken);

                this.elements = this.stripe.elements();
                this.card = this.elements.create('card');

                this.card.mount('#card-element');
            },
            loadIntent() {
                axios.get('/getIntent')
                    .then(function (response) {
                        this.intentToken = response.data;
                    }.bind(this));
            },
            savePaymentMethod( method ){
                console.log("1.1");
                axios.post('postPayment', {
                    payment_method: method
                }).then( function(){
                    console.log("1.2");
                }.bind(this));
            },
            submitPayment() {
                this.addPaymentStatus = 1;
                this.stripe.confirmCardSetup(
                    this.intentToken.client_secret,
                    {
                        payment_method: {
                            card: this.card,
                            billing_details: {
                                name: this.name
                            }
                        }
                    }
                ).then(function (result) {
                    if (result.error) {
                        console.log(result.error)
                        this.addPaymentStatus = 3;
                        this.addPaymentStatusError = result.error.message;
                    } else {
                        console.log("1");
                        console.log(result);
                        this.savePaymentMethod(result.setupIntent.payment_method);
                        console.log("2");
                        this.addPaymentStatus = 2;
                        console.log("3");
                        this.card.clear();
                        this.name = '';
                    }
                }.bind(this));
            },
        }
    }
</script>
