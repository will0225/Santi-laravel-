@extends('layouts.app')
@section('title', 'Billing')
@section('content')
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1">Billing</h6>
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
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">ADD FUNDS</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">INVOICES</a></li>
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
                            <h4>YOUR CREDIT CARDS</h4>
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <label class="rdiobox wd-16 mg-b-0"><input type="radio" checked><span></span></label>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder=".....254" disabled>
                                        <span class="input-group-append">
                                            <button class="btn btn-info" type="button"><i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
                                            <i class="fab fa-cc-mastercard"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <label class="rdiobox wd-16 mg-b-0"><input type="radio" checked><span></span></label>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="ADD NEW CREDIT CARD" disabled>
                                    </div>
                                </div>
                            </div>
                            <h4 style="margin-top: 25px">CHOOSE PAYMENT AMOUNT</h4>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <input class="form-control" placeholder="amount" type="text">
                                    <button class="btn btn-primary" style="width: 100%; margin-top: 15px">Pay</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="transactions">
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