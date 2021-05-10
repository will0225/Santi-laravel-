@extends('layouts.admin_app')
@section('title', 'ADMIN - MANAGEMENT')
@section('content')
    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
				<div class="card" id="basic-alert" style="margin-top: 25px">
					<div class="card-body" style="padding: 0">
						<div style="padding-left: 10%; padding-right: 10%;margin-top: 60px; margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6" style="text-align: left">
                                    <h6 class="card-title mb-1">MANAGEMENT</h6>
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
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">GENERAL SETTINGS</a></li>
                                            <li><a href="#tab3" class="nav-link" data-toggle="tab">GROUP AND PRICE MANAGEMENT</a></li>
                                            <li><a href="#tab4" class="nav-link" data-toggle="tab">ADMIN USERS MANAGEMENT</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">ADMIN ACTIVIY LOGS</a></li>
                                        </ul>
                                    </div>
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
                                <div class="mb-4 main-content-label">Settings</div>
                                <form class="form-horizontal" method="post" action={{route('admin.management.setting.update')}}>
                                    @csrf
                                    
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">App Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="App Name" name="app_name" value="{{ old('app_name', $setting->app_name) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">User Register Enable</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-control" value="{{ old('user_register_enable', $setting->user_register_enable) }}" name="user_register_enable">
                                                    <option value="0">disable</option>
                                                    <option value="1">enable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Maintenance</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-control" value="{{ old('maintenance', $setting->maintenance) }}" name="maintenance">
                                                    <option value="0">disable</option>
                                                    <option value="1">enable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Invoice Info</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Invoice Info" name="invoice_info" value="{{ old('invoice_info', $setting->invoice_info) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Invoice Number</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control"  rows="2"  placeholder="Invoice Number" name="invoice_number" value="{{ old('invoice_number', $setting->invoice_number) }}"></input>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Invoice Format</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control"  rows="2"  placeholder="Invoice Format" name="invoice_format" value="{{ old('invoice_format', $setting->invoice_format) }}"></input>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Invoice Reset</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control"  rows="2"  placeholder="Invoice Reset" name="invoice_reset" value="{{ old('invoice_reset', $setting->invoice_reset) }}"></input>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Date Format</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control"  rows="2"  placeholder="Date Format" name="date_format" value="{{ old('date_format', $setting->date_format) }}"></input>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Setting</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                    <div class="tab-pane" id="tab3">
                        <button class="btn btn-success" data-toggle="modal" href="#create_group_modal">Group Create</button>
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="transactions">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">ID</th>
                                        <th class="wd-15p border-bottom-0">Group Name</th>
                                        <th class="wd-20p border-bottom-0">Group Users</th>
                                        <th class="wd-15p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                    <tr>
                                        <td>{{$group->id}}</td>
                                        <td>{{$group->name}}</td>
                                        <td>{{count($group->users)}}</td>
                                        <td>
                                            <button class="btn btn-default" data-toggle="modal" data-name="{{$group->name}}" onclick="editGroup(event)" data-id="{{$group->id}}" data-price="{{$group->price}}" href="#update_group_modal">Edit</button>
                                            <a class="btn btn-danger" href="{{route('admin.management.group.delete', $group->id)}}"><i class="typcn typcn-trash"></i></a>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal" id="create_group_modal">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 100%">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Create Group</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('admin.management.group.create')}}">
                                        @csrf
                                            <div class='form-group required'>
                                                <label class='control-label'>Group Name</label> 
                                                <input class='form-control' size='20' type='text' name="name" style="width: 50%">
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table text-md-nowrap" id="gropus">
                                                    <thead>    
                                                        <tr>
                                                            <td class="wd-15p border-bottom-0">Zone</td>
                                                            <td class="wd-15p border-bottom-0">First Price</td>
                                                            <td class="wd-15p border-bottom-0">Second Price</td>
                                                            <td class="wd-15p border-bottom-0">Third Price</td>
                                                            <td class="wd-15p border-bottom-0">Extra Price</td>
                                                            <td class="wd-15p border-bottom-0">Cash On Delivery Percentage</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>zone A</td>
                                                            <td><input class="form-control" name="first_price[0]"/></td>
                                                            <td><input class="form-control" name="second_price[0]"/></td>
                                                            <td><input class="form-control" name="third_price[0]"/></td>
                                                            <td><input class="form-control" name="extra_price[0]"/></td>
                                                            <td><input class="form-control" name="cash_on_delivery_percent[0]" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>zone B</td>
                                                            <td><input class="form-control" name="first_price[1]"/></td>
                                                            <td><input class="form-control" name="second_price[1]"/></td>
                                                            <td><input class="form-control" name="third_price[1]"/></td>
                                                            <td><input class="form-control" name="extra_price[1]"/></td>
                                                            <td><input class="form-control" name="cash_on_delivery_percent[1]"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td>zone C</td>
                                                            <td><input class="form-control" name="first_price[2]"/></td>
                                                            <td><input class="form-control" name="second_price[2]"/></td>
                                                            <td><input class="form-control" name="third_price[2]"/></td>
                                                            <td><input class="form-control" name="extra_price[2]"/></td>
                                                            <td><input class="form-control" name="cash_on_delivery_percent[2]"/></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button 
                                                class="btn ripple btn-primary" 
                                                type="submit"  
                                                style="background-color: red;
                                                    background-image: linear-gradient(0deg, red, #fea31f);
                                                ">
                                            Update
                                            </button>
                                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="update_group_modal">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 100%" >
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Update Group</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('admin.management.group.update')}}" id="update-group-form">
                                        @csrf
                                        @method('put')
                                        <input name="id" id="update-id"type="hidden"/>
                                            <div class='form-group required'>
                                                <label class='control-label'>Group Name</label> 
                                                <input class='form-control' size='20' type='text' name="name" id="update-name" style="width: 50%">
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table text-md-nowrap" id="gropus">
                                                    <thead>    
                                                        <tr>
                                                            <td class="wd-15p border-bottom-0">Zone</td>
                                                            <td class="wd-15p border-bottom-0">First Price</td>
                                                            <td class="wd-15p border-bottom-0">Second Price</td>
                                                            <td class="wd-15p border-bottom-0">Third Price</td>
                                                            <td class="wd-15p border-bottom-0">Extra Price</td>
                                                            <td class="wd-15p border-bottom-0">Cash On Delivery Percentage</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>zone A</td>
                                                            <td><input class="form-control" name="first_price[0]"/></td>
                                                            <td><input class="form-control" name="second_price[0]"/></td>
                                                            <td><input class="form-control" name="third_price[0]"/></td>
                                                            <td><input class="form-control" name="extra_price[0]"/></td>
                                                            <td><input class="form-control" name="cash_on_delivery_percent[0]" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>zone B</td>
                                                            <td><input class="form-control" name="first_price[1]"/></td>
                                                            <td><input class="form-control" name="second_price[1]"/></td>
                                                            <td><input class="form-control" name="third_price[1]"/></td>
                                                            <td><input class="form-control" name="extra_price[1]"/></td>
                                                            <td><input class="form-control" name="cash_on_delivery_percent[1]"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td>zone C</td>
                                                            <td><input class="form-control" name="first_price[2]"/></td>
                                                            <td><input class="form-control" name="second_price[2]"/></td>
                                                            <td><input class="form-control" name="third_price[2]"/></td>
                                                            <td><input class="form-control" name="extra_price[2]"/></td>
                                                            <td><input class="form-control" name="cash_on_delivery_percent[2]"/></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button class="btn ripple btn-primary" type="submit"  style="
                                            background-color: red;
                                            background-image: linear-gradient(0deg, red, #fea31f);">Update</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4">
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
                                        @foreach ($admins as $customer)
                                            <tr>
                                                <td>{{$customer->id}}</td>
                                                <td>{{$customer->first_name}}</td>
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
                    <div class="tab-pane" id="tab5">  
                            <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="logs">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0"> NUMBER</th>
                                                <th class="wd-15p border-bottom-0">DATE</th>
                                                <th class="wd-20p border-bottom-0">TYPE</th>
                                                <th class="wd-15p border-bottom-0">IP ADDRESS</th>
                                                <th class="wd-10p border-bottom-0">DEVICE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($logs as $invoice) 
                                            <?php $data = json_decode($invoice->data);
                                        
                                            ?>
                                            <tr>
                                                <td>{{ $invoice->id }}</td>
                                                <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $invoice->log_type == 'edit'?"logout":$invoice->log_type }}</td>
                                                <td>{{ $invoice->log_type == 'edit'? "":$data->ip }}</td>
                                                <td>{{ $invoice->log_type == 'edit'? "": $data->user_agent }}</td>
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
        function editGroup(e) {
            e.preventDefault();
            var name = $(e.target).data('name');
            var id = $(e.target).data('id');
            $('#update-name').val(name);
            $('#update-id').val(id);
            var price = $(e.target).data('price');
            $('#update-group-form').find('input[name="first_price[0]"]').val(price?.first_price[0]);
            $('#update-group-form').find('input[name="first_price[1]"]').val(price?.first_price[1]);
            $('#update-group-form').find('input[name="first_price[2]"]').val(price?.first_price[2]);
            $('#update-group-form').find('input[name="second_price[0]"]').val(price?.second_price[0]);
            $('#update-group-form').find('input[name="second_price[1]"]').val(price?.second_price[1]);
            $('#update-group-form').find('input[name="second_price[2]"]').val(price?.second_price[2]);
            $('#update-group-form').find('input[name="third_price[0]"]').val(price?.third_price[0]);
            $('#update-group-form').find('input[name="third_price[1]"]').val(price?.third_price[1]);
            $('#update-group-form').find('input[name="third_price[2]"]').val(price?.third_price[2]);
            $('#update-group-form').find('input[name="extra_price[0]"]').val(price?.extra_price[0]);
            $('#update-group-form').find('input[name="extra_price[1]"]').val(price?.extra_price[1]);
            $('#update-group-form').find('input[name="extra_price[2]"]').val(price?.extra_price[2]);
            $('#update-group-form').find('input[name="cash_on_delivery_percent[0]"]').val(price?.cash_on_delivery_percent[0]);
            $('#update-group-form').find('input[name="cash_on_delivery_percent[1]"]').val(price?.cash_on_delivery_percent[1]);
            $('#update-group-form').find('input[name="cash_on_delivery_percent[2]"]').val(price?.cash_on_delivery_percent[2]);
            
        }
    </script>
@endsection