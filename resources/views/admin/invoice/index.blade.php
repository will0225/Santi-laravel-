@extends('layouts.admin_app')
@section('title', 'ADMIN - INVOICES')
@section('content')
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1">INVOICES</h6>
                                </div>
                                <div class="col-md-6 col-lg-6" style="text-align: right">
                                </div>
                            </div>
						</div>
                        <div class="panel-body tabs-menu-body main-content-body-right" style="padding-left: 10%; padding-right: 10%;">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="transactions">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">INVOICE_ID</th>
                                            <th class="wd-15p border-bottom-0">CUSTOMER</th>
                                            <th class="wd-20p border-bottom-0">INVOICE_DATE</th>
                                            <th class="wd-15p border-bottom-0">TOTAL</th>
                                            <th class="wd-10p border-bottom-0">PAYMENT_METHOD</th>
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