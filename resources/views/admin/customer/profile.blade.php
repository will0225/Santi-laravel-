@extends('layouts.admin_app')
@section('title', 'ADMIN - CUSTOMER PROFILE')
@section('content')

    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1">CUSTOMER PROFILE</h6>
                                    <h5 class="main-profile-name"># {{ $customer->id }}    {{$customer->first_name}}   {{$customer->last_name}}</h5>
                                </div>
                                <div class="col-md-6 col-lg-6" style="text-align: right">
                                    <h6 class="card-title mb-1">{{$balance}}EUR</h6>
                                </div>
                            </div>
						</div>
                        <div class="text-wrap" style="padding-left: 10%; padding-right: 10%">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                    <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link  {{ Session::has('success')?'':'active'}}" data-toggle="tab">CUSTOMER SUMMARY</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">CUSTOMER PROFILE</a></li>
                                            <li><a href="#tab3" class="nav-link {{ Session::has('success')?'active':''}}" data-toggle="tab">CUSTOMER TRANSACTIONS</a></li>
                                            <li><a href="#tab4" class="nav-link" data-toggle="tab">CUSTOMER INVOICES</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">CUSTOMER ACTIVIY LOGS</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
				    </div>
			    </div>
		    </div>
            <div class="panel-body tabs-menu-body main-content-body-right" style="padding-left: 10%; padding-right: 10%; width: 100%; margin-bottom: 200px">
                <div class="tab-content">
                <div class="tab-pane {{ Session::has('success')?'':'active'}}" id="tab1">  
                    <div>
                        <h5 class="main-profile-name"># {{ $customer->id }}    {{$customer->first_name}}   {{$customer->last_name}}</h5>
                        <p class="main-profile-name-text">{{$customer->name}}</p>
                    </div>
                    <h6>Bio</h6>
                    <div class="main-profile-bio">
                    {{$customer->bio}}
                    </div>
                </div>
                <div class="tab-pane" id="tab2">  
                    <div class="card" style="box-shadow: none">
                        <div class="card-body">
                            <div class="mb-4 main-content-label">Personal Information</div>
                            <form class="form-horizontal">
                                <div class="mb-4 main-content-label">Name</div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">User Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="User Name" value="{{$customer->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">First Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="First Name" value="{{$customer->first_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">last Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="Last Name" value="{{$customer->last_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Nick Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="Nick Name" value="{{$customer->nick_name}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4 main-content-label">Contact Info</div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Email<i>(required)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="Email" value="{{$customer->email}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Phone</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  placeholder="phone number" value="{{$customer->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Address</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="example-textarea-input" rows="2"  placeholder="Address">{{$customer->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane {{ Session::has('success')?'active':''}}" id="tab3">  
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="transactions">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ID</th>
                                    <th class="wd-15p border-bottom-0">DATE</th>
                                    <th class="wd-20p border-bottom-0">TYPE</th>
                                    <th class="wd-15p border-bottom-0">DESCRIPTION</th>
                                    <th class="wd-10p border-bottom-0">AMOUNT</th>
                                    <th class="wd-25p border-bottom-0">BALANCE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td><button class="btn btn-outline-{{ $transaction->type == 'add_fund'?'success':'danger' }}">{{ $transaction->type == 'add_fund'?'SALDO':'PAGO' }}</button></td>
                                    <td>{{ $transaction->description }}</td>
                                    <td>{{$transaction->type == 'add_fund'?'+':'-'}}{{ $transaction->amount }}EUR</td>
                                    <td>{{ $transaction->balance }}EUR</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div  class="add-transaction" style="margin-top: 25px; position: fixed; bottom: 0;background: #bfc2e0;
                    z-index: 999;
                    border: 1px solid black;
                    padding: 15px;
                    width: 100%;
                    left: 0;
                ">
                    <h4>Add Transaction</h4>
                    <div class="col-md-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="main-toggle main-toggle-success" id="manualButton" onclick="manualTransaction()">
                                    <span></span>
                                </div>
                                Manual Transaction
                            </div>
                            <div class="col-md-2">
                                <div class="main-toggle main-toggle-success" id="cashOnButton" onclick="cashOnDelievery()">
                                    <span></span>
                                </div>
                                Cash on Delivery
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <button class="btn btn-success"  type="button"  id="transactionButton">Start Transaction</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12" style="padding: 10px; border: 1px solid black" >
                        <div class="transaction-box">
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Date</h5>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Date:
                                            </div>
                                        </div><input class="form-control" id="dateMask" placeholder="MM/DD/YYYY" type="text" >
                                    </div>
                                </div>
                                <div class="col-md-2 manual">
                                    <h5>Order Number</h5>
                                    <div class="input-group">
                                        <input class="form-control"  type="text" id="order">
                                    </div>
                                </div>
                                <div class="col-md-2 cash" style="display: none">
                                    <h5>Product Price</h5>
                                    <div class="input-group">
                                        <input class="form-control"  type="text" id="productPrice" >
                                    </div>
                                </div>
                                <div class="col-md-2 manual">
                                    <h5>Zone</h5>
                                    <div class="input-group">
                                        <select class="form-control"  type="text" id="zone">
                                            <option value="1">City A</option>
                                            <option value="2">City B</option>
                                            <option value="3">City C</option>    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 manual">
                                    <h5>Weight</h5>
                                    <div class="input-group">
                                        <input class="form-control"  type="text" id="weight">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h5>Description</h5>
                                    <div class="input-group">
                                        <input class="form-control"  type="text" id="description">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h5>Total</h5>
                                    <div class="input-group">
                                        <input class="form-control"  type="text"  id="totalValue">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
    
                <div class="tab-pane" id="tab4">  
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="invoices">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">INVOICE NUMBER</th>
                                    <th class="wd-15p border-bottom-0">DATE</th>
                                    <th class="wd-20p border-bottom-0">INVOICE DESCRIPTION</th>
                                    <th class="wd-15p border-bottom-0">INVOICE TOTAL</th>
                                    <th class="wd-10p border-bottom-0">INVOICE RELATED TRANSACTION</th>
                                    <th class="wd-25p border-bottom-0">INVOICE DOWNLOAD</th>
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
                                    <td><a href="/admin/invoices/pdf/{{$customer->id}}/{{$invoice->id}}"><i class="far fa-file-alt"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>
                <div class="tab-pane" id="tab5">  
                    5
                </div>
            </div>              
        </div>
        
    </div>
        <script>
            $(document).ready(function(){
                $('#transactionButton').click(() => {
                    var description = $('#description').val();
                    var date = $('#date').val();
                    var amount = $('#totalValue').val();
                    var productPrice = $('#productPrice').val();
                    var cash = 0;
                    if($('#cashOnButton').hasClass('on')) {
                        if(productPrice == '')  {
                         alert('Please input Product Price input!');  
                        }
                        cash = 1;
                    }
                    if(amount == '') {
                        alert('Please enter amount input!');
                        return;
                    }

                    if(description == "") {
                        alert('Plase enter description input!');
                    }

                    if(amount < 0.005) {
                        alert('amount must be more larger than 0.005');
                    }

                    $.ajax({
                        url: '/admin/customers/addTransaction',
                        method: 'post',
                        data: {
                            amount: amount,
                            description: description,
                            _token: '{{csrf_token()}}',
                            customer_id: '{{$customer->id}}',
                            cash: cash
                        },
                        success: (res) => {
                            if(res.status) {
                                window.location.reload();
                            } else {
                                alert(res.message);
                            }
                        }
                    })
                })
            })

            function manualTransaction() {
               if($('#manualButton').hasClass('on')) {
                   $('.manual').css('display', 'block');

               } else {
                $('.manual').css('display', 'none')
                $('.cash').css('display', 'none');
                $('#cashOnButton').removeClass('on')
               }
            }

            function cashOnDelievery() {
                if($('#manualButton').hasClass('on')) {
                    $('#cashOnButton').removeClass('on')
                    return;
                }
                if($('#cashOnButton').hasClass('on')) {
                   $('.cash').css('display', 'none');

               } else {
                $('.cash').css('display', 'block')
               }
            }

            function totalValueChange() {
                var totalValue = 0;
                var productPrice = $('#productPrice').val();
                var zone = $('#zone').val();
                var weight = $('#weight').val();
                console.log(productPrice, zone, weight);
                if(weight == "") { 
                    return;
                }
                switch (zone) {
                    case "1":
                        totalValue = caculate(weight, 3, 5, 10 , 1);
                        break;
                    case "2":
                        totalValue = caculate(weight, 2, 4, 8 , 2);
                        break;
                    case "3":
                        totalValue = caculate(weight, 4, 8, 12 , 2);
                        break;
                    default:
                        console.log(1)
                }

                if(productPrice !== '') {
                    totalValue = totalValue + productPrice*0.05;
                }
                $('#totalValue').val(totalValue);

            }

            $('#productPrice').keyup((e) => {
                totalValueChange();
            })

            $('#zone').change((e) => {
                totalValueChange();
            })

            $('#weight').keyup((e) => {
                totalValueChange();
            })

            function caculate(value, firstValue, secondValue, fifthValue, extraValue) {
                var totalValue = 0;
                if(value % 1) {
                    totalValue += extraValue;
                }
                value = parseInt(value);
                totalValue += (fifthValue * parseInt(value/5)); 
                totalValue += (secondValue * (parseInt((value%5)/2)));
                totalValue += (firstValue * ((value%5)%2));
                return totalValue;
            }

        </script>
    </div>
@endsection