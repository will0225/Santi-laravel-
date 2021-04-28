@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px; box-shadow: none; border-bottom: 1px solid">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1" >Escritorio</h6>
                                </div>
                                <div class="col-md-6 col-lg-6" style="text-align: right">
                                    <h6 class="card-title mb-1" >{{ $balance }}EUR</h6>
                                </div>
                            </div>
						</div>
                        <div class="text-wrap" style="padding-left: 10%; padding-right: 10%">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                    <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">Transacciones</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">Saldo de contra reembolsa</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
				    </div>
			    </div>
                <div class="panel-body tabs-menu-body main-content-body-right" style="padding-left: 10%; padding-right: 10%;">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <!-- <div class="card-body"> -->
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="transactions" style="text-align: center">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#ID</th>
												<th class="wd-15p border-bottom-0">Fecha</th>
												<th class="wd-20p border-bottom-0">Tipo</th>
												<th class="wd-15p border-bottom-0">Descripción</th>
												<th class="wd-10p border-bottom-0">Importe</th>
												<th class="wd-25p border-bottom-0">Balance</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($transactions as $transaction)
											<tr>
												<td>{{ $transaction->id }}</td>
												<td>{{ $transaction->created_at }}</td>
												<td><button class="btn btn-outline-{{ $transaction->type == 'add_fund'?'success':'danger' }}">{{ $transaction->type == 'add_fund'?'SALDO':'PAGO' }}</button></td>
												<td>{{ $transaction->description }}</td>
												<td>{{ $transaction->type == 'add_fund'?'+':'-' }}{{ $transaction->amount }}EUR</td>
												<td>{{ $transaction->balance }}EUR</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							<!-- </div> -->
                        </div>
                        <div class="tab-pane" id="tab2">
                                <div class="table-responsive">
									<table class="table text-md-nowrap" id="cash_on_delivery" style="width: 100%">
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
										
										</tbody>
									</table>
								</div>
                        </div>
                    </div>
                </div>
		    </div>
        </div>
    </div>
@endsection