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
     <h4 class="box-title">Add User</h4>
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
           <form  method="POST" action="{{route('user.store')}}">
            @csrf
             <div class="row">
               <div class="col-12"> 
                <div class="row">	 

                    <div class="col-md-6">
                        <div class="form-group">
                        <h5>User Role <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="usertype"  id="select" required class="form-control">
                                <option value="" selected disabled>Select User Type</option>
                                <option value="admin">Admin</option>
                                <option value="user">user</option>
                    
                            </select>
                        </div>
                        </div>
                    </div> 

                    
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <h5>UserName <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"
                                name="name"
                                class="form-control"
                                autocomplete="true"
                                autofocus="true" 
                                required
                                data-validation-required-message="This field is required"> </div>
                                
                                @error('name')
                                        <span> {{$message}}</span>
                                @enderror
                            </div>
                    </div>


                    <div class="col-md-6"> 
                        <div class="form-group">
                            <h5>UserEmail <span class="text-danger">*</span></h5>
                            <div class="controls">
                               
                                <input type="email"
                                        name="email"
                                        class="form-control"
                                        autocomplete="true"
                                        autofocus="true" 
                                        required data-validation-required-message="This field is required"> </div>
                      
                            </div>
                                @error('email')
                                <span>{{$message}}</span>
                                @enderror
                                </div>
                    
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <h5>UserPassword <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password"
                                        name="password"
                                        class="form-control"
                                        autocomplete="true"
                                        autofocus="true" 
                                        required data-validation-required-message="This field is required"> </div>
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