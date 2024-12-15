@extends('admin.admin_master')

@section('admin')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 
			<div class="col-12">

			<!-- Current Users  List-->
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">User List</h3>
                  <a href="{{route('user.add')}}" style="float:right" class="btn btn-rounded btn-success mb-5"> Add User </a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th >SL</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
 							</tr>
						</thead>
						<tbody>
                            @foreach($data as $key => $user) 
							<tr> 
								<td>{{$user->id}}</td>
								<td>{{$user->usertype ? : 'Not assigned'}}</td> 
								<td>{{$user->name ? : 'Not assigned'}}</td> 
								<td>{{$user->email ? : 'Not assigned'}}</td> 
 
 								<td>
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-info"> Edit </a>
									<a href="{{route('user.delete',$user->id)}}" 
									  data-name="{{ $user->name }}"
									 class="btn btn-danger" id="tdelete" > Delete </a>

                                </td>
 								    
							 
							</tr>
							@endforeach
                           
						</tbody>
					 
					  </table>

					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
          
			</div>




				<!-- Trashed Users -->
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Trashed Users</h3>
                  <a href="{{route('user.add')}}" style="float:right" class="btn btn-rounded btn-success mb-5 disabled" >Restore all </a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th >SL</th>
									<th>Role</th>
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
								@forelse($trasheddata as $key => $user) 
							<tr> 
								<td>{{$user->id}}</td>
								<td>{{$user->usertype ? : 'Not assigned'}}</td> 
								<td>{{$user->name ? : 'Not assigned'}}</td> 
								<td>{{$user->email ? : 'Not assigned'}}</td> 
 
 								<td>
                                    <a href="{{route('user.restore',$user->id)}}" class="btn btn-info"> Restore </a>
							
									<a href="{{route('user.pdelete',$user->id)}}" 
										data-name="{{ $user->name }}"
										class="btn btn-danger" id="delete">	permanently deleted 
									</a>
								
                                </td>
 								    
							 
							</tr>
							@empty 
							<h3> There are no deleted users </h3>
						
                           
							@endforelse
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection