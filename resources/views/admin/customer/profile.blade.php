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
                                    <h6 class="card-title mb-1">{{$customer->balance}}EUR</h6>
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
            <div class="panel-body tabs-menu-body main-content-body-right" style="padding-left: 10%; padding-right: 10%; width: 100%">
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">  
                    <div>
                        <h5 class="main-profile-name">{{$customer->first_name}}   {{$customer->last_name}}</h5>
                        <p class="main-profile-name-text">{{$customer->name}}</p>
                    </div>
                    <h6>Bio</h6>
                    <div class="main-profile-bio">
                    {{$customer->bio}}
                    </div>
                </div>
                <div class="tab-pane" id="tab2">  
                    <div class="card">
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
                <div class="tab-pane" id="tab3">  
                    3
                </div>
                <div class="tab-pane" id="tab4">  
                    4
                </div>
                <div class="tab-pane" id="tab5">  
                    5
                </div>
            </div>              
            </div>
        </div>
    </div>
@endsection