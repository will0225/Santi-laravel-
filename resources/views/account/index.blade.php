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
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <strong>Wow!</strong> {{ session('message') }}
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
                <div class="panel-body tabs-menu-body main-content-body-right" style="padding-left: 10%; padding-right: 10%;">
                    <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4 main-content-label">Personal Information</div>
                                        <form class="form-horizontal" method="post" action={{route('profileUpdate')}}>
                                            @csrf
                                            <div class="mb-4 main-content-label">Name</div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">User Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="name" placeholder="User Name" value="{{old('name',$profile->name)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">First Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="First Name" name="first_name" value="{{ old('first_name', $profile->first_name) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">last Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="Last Name" name="last_name" value="{{ old('last_name', $profile->last_name) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Nick Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="Nick Name" name="nick_name" value="{{ old('nick_name', $profile->nick_name) }}">
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
                                                        <input type="text" class="form-control"  placeholder="Email" name="email" value="{{ old('email', $profile->email) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Phone</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  placeholder="phone number" name="phone" value="{{ old('phone', $profile->phone) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Address</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control"  rows="2"  placeholder="Address" name="address" value="{{ old('address', $profile->address) }}"></input>
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
                                                        <textarea class="form-control"  rows="4" placeholder="" name="bio">{{ old('bio', $profile->bio) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <h4>TWO FACTOR AUTHENTICATION</h4>
                                <button class="btn btn-primary">MANAGEY 2FA</button>
                                <h4 class="text-left" style="margin-top: 25px">Change Your Password</h4>
                                <div class="row">
                                    <div class="col-md-4 col-sm6">
                                        <form method="post" action={{route('passwordUpdate')}}>
                                        @csrf
                                            <div class="form-group text-left" >
                                                <label>Old password</label>
                                                <input class="form-control" placeholder="Old password" name="current_password" type="text">
                                            </div>
                                            <div class="form-group text-left">
                                                <label>New Password</label>
                                                <input class="form-control" placeholder="Enter your password" name="password" type="password">
                                            </div>
                                            <div class="form-group text-left">
                                                <label>Confirm Password</label>
                                                <input class="form-control" placeholder="Enter your password" type="password" name="confirmation_password">
                                            </div>
                                            <button class="btn ripple btn-main-primary btn-block" type="submit">Change Password</button>
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