@extends('layouts.default')

@section('content')
    <h3 class="header">Checkout</h3>

    <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#step1">Suas informações</a></li>
        <li class="tab"><a href="#step2">Entrega</a></li>
        <li class="tab"><a href="#step3">Pagamento</a></li>
    </ul>

    <form id="form" action="/checkout/{{ $id }}" method="post">

        {{ csrf_field() }}

        <input type="hidden" name="itemId1" value="0001">
        <input type="hidden" name="itemDescription1" value="Produto PagSeguroI">
        <input type="hidden" name="itemAmount1" value="250.00">
        <input type="hidden" name="itemQuantity1" value="2">

        <div id="step1">
            <p>Preencha suas informações</p>

            <input type="hidden" id="creditCardToken" name="creditCardToken">
            <input type="hidden" id="senderHash" name="senderHash">
            <input type="hidden" id="installmentValue" name="installmentValue">

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="senderName" name="senderName">
                    <label for="senderName">Nome completo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="senderCPF" name="senderCPF">
                    <label for="senderCPF">CPF</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="senderEmail" name="senderEmail">
                    <label for="senderEmail">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <input type="text" id="senderPhone" name="senderPhone">
                    <label for="senderPhone">Telefone</label>
                </div>
            </div>

        </div>

        <div id="step2">
            <p>Informe os dados para Entrega</p>
            <div class="row">
                <div class="input-field col s6">
                    <input class="cep" type="text" id="shippingAddressPostalCode" name="shippingAddressPostalCode">
                    <label for="shippingAddressPostalCode">CEP</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressStreet" name="shippingAddressStreet">
                    <label for="shippingAddressStreet">Logradouro</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressNumber" name="shippingAddressNumber">
                    <label for="shippingAddressNumber">Número</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressDistrict" name="shippingAddressDistrict">
                    <label for="shippingAddressDistrict">Bairro</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="shippingAddressComplement" name="shippingAddressComplement">
                    <label for="shippingAddressComplement">Complemento</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressCity" name="shippingAddressCity">
                    <label for="shippingAddressCity">Cidade</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressState" name="shippingAddressState">
                    <label for="shippingAddressState">Estado</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressCountry" name="shippingAddressCountry" value="BRA">
                        <label for="shippingAddressCountry">País</label>
                    </div>
                </div>
                <div class="col s6 offset-s3">
                    <input type="hidden" name="shippingCost" value="21.50">
                    <select name="shippingType" id="shippingType" class="browser-default">
                        <option disabled selected>Forma de Entrega</option>
                        <option value="1">Encomenda Normal via PAC</option>
                        <option value="2">SEDEX</option>
                        <option value="3">Tipo de frete não especificado</option>
                    </select>
                    <label for="shippindType">Forma de entrega</label>
                </div>
            </div>
        </div>

        <div id="step3">
            <p>Preencha os dados para pagamento</p>
            <div class="row">
                <div class="input-field col s9">
                    <input type="text" id="cardNumber">
                    <label for="cardNumber">Número do Cartão</label>
                    <div id="_card_brand"></div>
                </div>
                <div class="input-field col s3">
                    <input type="text" id="cvv">
                    <label for="cvv">Código de Segurança</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input type="text" id="expirationMonth">
                    <label for="expirationMonth">Mês Validade</label>
                </div>
                <div class="input-field col s4">
                    <input type="text" id="expirationYear">
                    <label for="shippingAdressNumber">Ano de validade</label>
                </div>
                <div class="col s4">
                    <select class="browser-default" name="installmentQuantity" id="installmentQuantity">
                        <option disabled selected>Parcelamento</option>
                    </select>
                </div>
            </div>

            <p> Dados do dono do Cartão</p>

            <p>
                <label>
                    <input type="checkbox" id="copy_from_me"/>
                    <span>Copiar de mim</span>
                </label>
            </p>


            <div id="holder_data">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="creditCardHolderName" name="creditCardHolderName">
                        <label for="creditCardHolderName">Nome completo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="creditCardHolderCPF" name="creditCardHolderCPF">
                        <label for="creditCardHolderCPF">CPF</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="creditCardHolderPhone" name="creditCardHolderPhone">
                        <label for="creditCardHolderPhone">Telefone</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="creditCardHolderBirthDate" name="creditCardHolderBirthDate">
                    <label for="creditCardHolderBirthDate">Data de Nascimento</label>
                </div>
            </div>

            <p> Endereço da Fatura</p>

            <p>
                <label>
                    <input type="checkbox" id="copy_from_shipping"/>
                    <span>Copiar do meu endereço</span>
                </label>
            </p>

            <div id="shipping_data">
                <div class="row">
                    <div class="input-field col s6">
                        <input class="cep" type="text" id="billingAddressPostalCode" name="billingAddressPostalCode">
                        <label for="billingAddressPostalCode">CEP</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressStreet" name="billingAddressStreet">
                        <label for="billingAddressStreet">Logradouro</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressNumber" name="billingAddressNumber">
                        <label for="billingAddressNumber">Número</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressDistrict" name="billingAddressDistrict">
                        <label for="billingAddressDistrict">Bairro</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="billingAddressComplement" name="billingAddressComplement">
                        <label for="billingAddressComplement">Complemento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressCity" name="billingAddressCity">
                        <label for="billingAddressCity">Cidade</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressState" name="billingAddressState">
                        <label for="billingAddressState">Estado</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="billingAddressCountry" name="billingAddressCountry" value="BRA">
                        <label for="billingAddressCountry">País</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 ">
                    <input class="btn" type="submit" value="pagar">
                </div>
            </div>
        </div>
    </form>

    <div id="payment_methods"></div>


    <script type="text/javascript"
            src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="/js/checkout/pagseguro.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script>
        const paymentData = {
            brand: '',
            amount: {{ $amount }}
        }

        PagSeguroDirectPayment.setSessionId('{!! $session !!}');

        pagSeguro.getPaymentMethods(paymentData.amount)
            .then(function (urls) {
                let html = '';

                urls.forEach(function (url) {
                   html += '<img src="'+ url +'" class="credit_card">'
                });

                $('#payment_methods').html(html);
            });

        $('#senderName').on('change', function () {
            pagSeguro.getSenderHash().then(function (data) {
               $('#senderHash').val(data);
            });
        });

        $('#cardNumber').on('keyup', function () {
            if($(this).val().length >= 6 ){
                let bin = $(this).val();
                pagSeguro.getBrand(bin)
                    .then(function (res) {
                        paymentData.brand = res.result.brand.name;
                        $('#_card_brand').html('<img src="'+ res.url +'" class="credit_card">')
                        return pagSeguro.getInstallments(paymentData.amount, paymentData.brand);
                    })
                    .then(function (res) {
                        let html = '';
                        res.forEach(function (item) {
                           html += '<option value="' +item.quantity+ '">'+ item.quantity + ' x R$'+ item.installmentAmount + ' - total R$'+ item.totalAmount +' </option>'
                        });
                        $('#installmentQuantity').html(html);
                        $('#installmentValue').val(res[0].installmentAmount);
                        $('#installmentQuantity').on('change', function () {
                            let value = res[$('#installmentQuantity').val() - 1].installmentAmount;

                            $('#installmentValue').val(value);
                        });
                    });
            }
        });
        $('#form').on('submit', function (e) {
            e.preventDefault();
            let params = {
                cardNumber: $('#cardNumber').val(),
                cvv: $('#cvv').val(),
                expirationMonth: $('#expirationMonth').val(),
                expirationYear: $('#expirationYear').val(),
                brand: paymentData.brand
            };
            pagSeguro.createCardToken(params)
                .then(function (token) {
                    $('#creditCardToken').val(token);
                    let url = $('#form').attr('action');
                    let data = $('#form').serialize();
                    $.post(url, data).then(function () {
                        window.location = '/checkout/success';
                    });
                });
        });

        let toggle = function (element, verification, callbackShow, callbackHide) {
            if(!verification.is(':checked')){
                $(element).show();
                callbackShow();
            }else{
                $(element).hide();
                callbackHide();
            }
        };

        let holderShow = function(){
            $('#creditCardHolderName').val('');
            $('#creditCardHolderCPF').val('');
            $('#creditCardHolderPhone').val('');
        };

        let holderHide = function(){
            $('#creditCardHolderName').val($('#senderName').val());
            $('#creditCardHolderCPF').val($('#senderCPF').val());
            $('#creditCardHolderPhone').val($('#senderPhone').val());
        };

        let shippingShow = function(){
            $('#billingAddressPostalCode').val('');
            $('#billingAddressCity').val('');
            $('#billingAddressComplement').val('');
            $('#billingAddressDistrict').val('');
            $('#billingAddressNumber').val('');
            $('#billingAddressState').val('');
            $('#billingAddressStreet').val('');
        };

        let shippingHide = function(){
            console.log($('#shippingAddressStreet').val());
            $('#billingAddressPostalCode').val($('#shippingAddressPostalCode').val());
            $('#billingAddressCity').val($('#shippingAddressCity').val());
            $('#billingAddressComplement').val($('#shippingAddressComplement').val());
            $('#billingAddressDistrict').val($('#shippingAddressDistrict').val());
            $('#billingAddressNumber').val($('#shippingAddressNumber').val());
            $('#billingAddressState').val($('#shippingAddressState').val());
            $('#billingAddressStreet').val($('#shippingAddressStreet').val());

        };

        toggle('#holder_data', $(this), holderShow, holderHide);
        toggle('#shipping_data', $(this), shippingShow, shippingHide);

        $('#copy_from_me').on('change', function () {
            toggle('#holder_data', $(this), holderShow, holderHide)
        });

        $('#copy_from_shipping').on('change', function () {
            toggle('#shipping_data', $(this), shippingShow, shippingHide)
        });

    </script>

@endsection





