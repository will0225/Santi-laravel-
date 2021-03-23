@extends('layouts.app')
@section('title', 'Account')
@section('content')
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1">ACCOUNT</h6>
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
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">PROFILE</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">AUTHENTICATION</a></li>
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4 main-content-label">Personal Information</div>
                                        <form class="form-horizontal">
                                            <div class="mb-4 main-content-label">Name</div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">User Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="User Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">First Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="First Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">last Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Nick Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="Nick Name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4 main-content-label">Contact Info</div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Email<i>(required)</i></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Phone</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="phone number" value="+245 354 654">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Address</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="example-textarea-input" rows="2"  placeholder="Address">San Francisco, CA</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="mb-4 main-content-label">About Yourself</div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Biographical Info</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="example-textarea-input" rows="4" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <h4>TWO FACTOR AUTHENTICATION</h4>
                                <button class="btn btn-primary">MANAGEY 2FA</button>
                                <h4 class="text-left" style="margin-top: 25px">Change Your Password</h4>
                                <div class="row">
                                    <div class="col-md-4 col-sm6">
                                        <form>
                                            <div class="form-group text-left" >
                                                <label>Old password</label>
                                                <input class="form-control" placeholder="Old password" type="text">
                                            </div>
                                            <div class="form-group text-left">
                                                <label>New Password</label>
                                                <input class="form-control" placeholder="Enter your password" type="password">
                                            </div>
                                            <div class="form-group text-left">
                                                <label>Confirm Password</label>
                                                <input class="form-control" placeholder="Enter your password" type="password">
                                            </div>
                                            <button class="btn ripple btn-main-primary btn-block">Change Password</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
		    </div>
        </div>
    </div>
@endsection