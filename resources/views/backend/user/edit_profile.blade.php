@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
     <h4 class="box-title">update User</h4>
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
           <form  method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data">
            @csrf
             <div class="row">
               <div class="col-12"> 
                <div class="row">	  

                    <div class="col-md-6"> 
                        <div class="form-group">
                            <h5>UserName <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"
                                name="name"
                                class="form-control"
                                value="{{$userData?->name}}"
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
                                        value="{{$userData?->email}}"
                                        data-validation-required-message="This field is required"> </div>
                     
                                @error('email')
                                <span>{{$message}}</span>
                                @enderror
                        </div> 
                  </div>

                    <div class="col-md-6"> 
                        <div class="form-group">
                            <h5>User Mobile <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"
                                        name="mobile"
                                        class="form-control"
                                        value="{{$userData?->mobile}}"
                                        data-validation-required-message="This field is required">
                            </div>
                                @error('mobile')
                                <span>{{$message}}</span>
                                @enderror
                        </div> 
                  </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <h5>User Address <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="address"
                                        name="address"
                                        class="form-control"
                                        value="{{$userData?->address}}"
                                        data-validation-required-message="This field is required">
                            </div>
                                @error('address')
                                <span>{{$message}}</span>
                                @enderror
                        </div> 
            
                  </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <h5>User Gender <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="gender"  id="select" required class="form-control">
                                <option value="" selected disabled>Select Gender </option>
                                <option value="Male" {{($userData->usertype=="Male"? "selected":"")}} >Male</option>
                                <option value="Female"  {{($userData->usertype=="Female"? "selected":"")}}>Female</option>
                    
                            </select>
                        </div>  
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="form-group">
                        <h5> Profile Image <span class="text-danger">*</span></h5>
                        <div class="controls"> 
                            <input type="file" name="image" class="form-control" id="image"> </div>
                        </div>
                        
                            <div class="form-group">
                                <div class="controls">
                                <img id="showImage"  class="w-70 h-70"
                                src="{{ !empty($user->image) ? url('upload/users_images/' . $user->image) : url('upload/no_image.jpg') }}" />
                                    </div>
                            </div>
                        </div>
                    </div> 

 
               <div class="text-xs-right">  
                   <button type="submit" class="btn btn-rounded btn-info mb-5" >Update</button>
                   <button 
                    type="Button" 
                    class="btn btn-rounded btn-primary"
                    onclick="history.back()">Return Back</button>
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


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0])
        });

    });
   
</script>
@endsection