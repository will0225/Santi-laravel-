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
                                </div>
                                <div class="col-md-6 col-lg-6" style="text-align: right">
                                    <h6 class="card-title mb-1">99.99EUR</h6>
                                </div>
                            </div>
						</div>
                        <div class="text-wrap" style="padding-left: 10%; padding-right: 10%">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                    <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">CUSTOMER SUMMARY</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">CUSTOMER PROFILE</a></li>
                                            <li><a href="#tab3" class="nav-link" data-toggle="tab">CUSTOMER TRANSACTIONS</a></li>
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
            <div class="panel-body tabs-menu-body main-content-body-right" style="padding-left: 10%; padding-right: 10%;">
                            
            </div>
        </div>
    </div>
@endsection