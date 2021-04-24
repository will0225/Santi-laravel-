@extends('layouts.admin_app')
@section('title', 'ADMIN - CUSTOMERS')
@section('content')
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div id="customer-alert">
                            </div>
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Well done!</strong> {{ Session::get('success') }}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1">CUSTOMERS</h6>
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
                                            <th class="wd-15p border-bottom-0">CLIENT_ID</th>
                                            <th class="wd-15p border-bottom-0">FIRST_NAME</th>
                                            <th class="wd-20p border-bottom-0">LAST_NAME</th>
                                            <th class="wd-15p border-bottom-0">COMPANY_NAME</th>
                                            <th class="wd-10p border-bottom-0">EMAIL_ADDRESS</th>
                                            <th class="wd-25p border-bottom-0">GROUP</th>
                                            <th class="wd-25p border-bottom-0">CREATED_AT</th>
                                            <th class="wd-25p border-bottom-0">STATUS</th>
                                            <th class="wd-25p border-bottom-0">ACTION</th>
                                        </tr>
                                    
                                    </thead>
                                    <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td><a href="{{ route('admin.customer.profile', ['id' => $customer->id ]) }}">{{$customer->id}}</a></td>
                                            <td><a href="{{ route('admin.customer.profile', ['id' => $customer->id ]) }}">{{$customer->first_name}}</a></td>
                                            <td>{{$customer->last_name}}</td>
                                            <td>{{$customer->company}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td></td>
                                            <td>{{$customer->created_at}}</td>
                                            <td>
                                                <div class="main-toggle main-toggle-success {{$customer->is_active?'on':'off'}}" onClick="isActive({{ $customer->id }})">
                                                    <span></span>
                                                </div>
                                            </td>
                                            <td><button class="btn btn-danger btn-block" onclick="customerDelete({{ $customer->id }})">Delete</button></td>
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
    </div>
    <script>
        function isActive (id) {
            $.ajax({
                url: '/admin/customers/active',
                method: 'post',
                data: {
                    user_id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    if(res == 1) {
                        $('#customer-alert').append(`
                            <div class="alert alert-success" role="alert" >
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Success!</strong> 
                            </div>
                        `)
                    }
                }
            })
        }

        function customerDelete(id) {
            $.ajax({
                url: '/admin/customers/delete',
                method: 'post',
                data: {
                    user_id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection