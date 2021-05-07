@extends('layouts.app')
@section('title', 'Billing')
@section('content')
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px; box-shadow: none; border-bottom: 1px solid">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1" >Facturación</h6>
                                </div>
                                <div class="col-md-6 col-lg-6" style="text-align: right">
                              
                                </div>
                            </div>
						</div>
                        <div class="text-wrap" style="padding-left: 10%; padding-right: 10%">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                    <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">Añadir saldo</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">Facturas</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
				    </div>
			    </div>
                <div class="panel-body tabs-menu-body main-content-body-right" style="padding-left: 10%; padding-right: 10%;">
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                         <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Well done!</strong>    {{ Session::get('success') }}
                </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mg-b-0" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Error!</strong> {{ $error }}
                    </div>
                    @endforeach
			    @endif
                <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="input-group">
                                <button class="btn btn-default" style="background: white;border: 2px solid #ff1c05; margin-bottom: 10px; margin-top: 25px"
                                data-effect="effect-rotate-bottom" data-toggle="modal" href="#modaldemo8"
                                >
                                    Añadir tarjeta
                                </button>
                            </div>
                            <h4>Tus tarjetas</h4>
                            <div class="row">
                            <div class="col-md-4 col-sm-6">
                                @foreach ($cards as $card)  
                                <div class="input-group" style="margin-bottom: 5px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <label class="rdiobox wd-16 mg-b-0">
                                                <input type="radio"  name="card-check" 
                                                    data-paymentid="{{$card->id}}"
                                                    onchange="cardChange(event)"
                                                >
                                                
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="...{{$card->card->last4}}" disabled>
                                    <span class="input-group-append">
                                        <button class="btn btn-info" type="button"><i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
                                        <i class="fab fa-cc-mastercard"></i></button>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-block" style="margin-left: 25px" href="{{route('delete-card', $card->id)}}">Eliminar</a>
                                    </span>
                                </div>    
                                @endforeach
                                </div>
                                
                            </div>
                            <form role="form" action="{{ route('make-payment') }}" method="post">
                                @csrf
                                <input type="hidden" id="payment_id" name="payment_id" />
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" name="description" placeholder="description" type="text">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" name="amount" placeholder="amount" type="text">
                                    </div>
                                </div>
                                <button class="btn ripple btn-primary" type="submit" 
                                    style="
                                margin-top: 15px;
                                background-color: red;
                                    background-image: linear-gradient(
                                0deg
                                , red, #fea31f);
                                ">Pay with saved card</button>
                            </form>
                            <div class="row" style="margin-top: 20px">
                                <!-- <div class="col-md-4 col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <label class="rdiobox wd-16 mg-b-0"><input type="radio" checked><span></span></label>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="ADD NEW CREDIT CARD" disabled>
                                    </div>
                                </div> -->
                                <div class="col-md-4 col-sm-12">
                                    <form role="form" action="{{ route('make-payment') }}" method="post" class="stripe-payment"
                                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                        id="stripe-payment">
                                        @csrf

                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Nombre en la tarjeta</label> 
                                            <input class='form-control'
                                                size='4' type='text'>
                                        </div>
                                        
                                      
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Número de tarjeta</label> <input autocomplete='off'
                                                class='form-control card-num' size='20' type='text'>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label'>CVC</label>
                                                <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 595'
                                                    size='4' type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Mes de expiración</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Año de expiración</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-md-12 hide error form-group'>
                                                <div class='alert-danger alert'>Rellena todos los campos correctamente antes de continuar</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <input class="form-control" name="description" placeholder="description" type="text">
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <input class="form-control" name="amount" placeholder="amount" type="text">
                                        </div>
                                        <div class="row">
                                            <button class="btn btn-primary" type="submit" style="width: 100%; margin-top: 15px;
                                                background-color: red;
                                                    background-image: linear-gradient(
                                                0deg
                                                , red, #fea31f);
                                            ">Pay</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="transactions">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Número de factura</th>
                                            <th class="wd-15p border-bottom-0">Fecha</th>
                                            <th class="wd-20p border-bottom-0">Descripción de la factura</th>
                                            <th class="wd-15p border-bottom-0">Total de la factura</th>
                                            <th class="wd-10p border-bottom-0">Transacción relacionada</th>
                                            <th class="wd-25p border-bottom-0">Descargar factura</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice) 
                                        <tr>
                                            <td>{{ $invoice->id }}</td>
                                            <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $invoice->description }}</td>
                                            <td>{{ $invoice->amount }}</td>
                                            <td>{{ $invoice->transaction?"payment":"add_fund" }}</td>
                                            <td><a href="/invoices/pdf/{{$invoice->id}}"><i class="far fa-file-alt"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
		    </div>
        </div>
        <div class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Añadir tarjeta</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form method="post" action="{{route('add-card')}}" id="add-form">
                        @csrf
                            <div class="input-group" style="margin-bottom: 15px">
                              <input type="text" class="form-control" placeholder="card name" name="name" id="name">
                            </div>
                            <input name="payment_method" value="" id="payment_method" type="hidden"> 
                            <div id="card-element"></div>
                        </form>
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="button" id="add-button" style="
                                background-color: red;
                                    background-image: linear-gradient(
                                0deg
                                , red, #fea31f);
                        ">Añadir</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
    </div>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function () {
            var stripe = Stripe( '{{ env('STRIPE_KEY') }}' );
            var elements = stripe.elements();
            card = elements.create('card');
            card.mount('#card-element');
            var $form = $(".stripe-payment");
            $('form.stripe-payment').bind('submit', function (e) {
                var $form = $(".stripe-payment"),
                    inputVal = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputVal),
                    $errorStatus = $form.find('div.error'),
                    valid = true;
                $errorStatus.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorStatus.removeClass('hide');
                        e.preventDefault();
                    }
                });
            
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-num').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeRes);
                }

            });

            function stripeRes(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

            $('#add-button').click(() => { 
                submitPaymentMethod();
                if($('#name').val() == '') {
                    alert('Input name input');
                    return;
                }
               
            })

            function submitPaymentMethod(){
                stripe.confirmCardSetup(
                    '{{ $intent->client_secret }}', {
                        payment_method: {
                            card:  card,
                            billing_details: {
                                name: $('#name').val()
                            }
                        }
                    }
                ).then(function(result) {console.log(result);
                    if (result.error) {
                        alert(result.error.message);
                    } else {
                        card.clear();
                        $('#payment_method').val(result.setupIntent.payment_method);
                        $('#add-form').submit();
                    }
                });
            }

        });
        
        function cardChange(e) {
            var paymentid = $(e.target).data('paymentid');
            $('#payment_id').val(paymentid);
        }
        

</script>

@endsection