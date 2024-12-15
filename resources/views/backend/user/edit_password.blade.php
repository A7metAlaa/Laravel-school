@extends('admin.admin_master')

@section('admin')
    
<div class="content-wrapper">
    <div class="container-full">
       		<!-- Main content -->
		<section class="content">

<!-- Basic Forms -->

@if($errors->any())
<div class="alert alert-danger">
    <ul> 
        @foreach ($errors->all () as $error)
         <li> {{$error }} </li>
        @endforeach
    </ul>
</div>

@endif
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Change password </h4>
     @if(Session::has('error'))
     <div class="alert alert-danger">
        {{Session::get('error')}}
     </div>
     @endif
    </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form method="POST"  action="{{route('password.update')}}">
            @csrf
                <div class="row">
                <div class="col-12"> 
                    <div class="row">	 
                
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <h5>Current_password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password"
                                            id="current_password"
                                            name="current_password"
                                            class="form-control"
                                            autocomplete="true"
                                            autofocus="true" 
                                            
                                             data-validation-required-message="This field is required"> 
                                </div>
                                @error('current_password')
                                    <span class="bg bg-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12"> 
                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password"
                                            id="newpassword"
                                            name="newpassword"
                                            class="form-control"
                                            autocomplete="true"
                                            autofocus="true" 
                                             data-validation-required-message="This field is required"> 
                            </div>
                                @error('newpassword')
                                    <span> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
           
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password"
                                        id="password_confirmation"
                                            name="password_confirmation"
                                            class="form-control"
                                            autocomplete="true"
                                            autofocus="true" 
                                             data-validation-required-message="This field is required"> 
                                </div>
                                @error('password_confirmation')
                                    <span> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                    </div>
            </form>

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>
<!-- /.content -->
    </div>
</div>
@endsection