@extends('dashboard.backend.main-page.app')

@section('conetnt')
    
@push('js-bawah')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                // processing: true,
                // serverSide: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    { data: 'id', name: 'id', width: '5%'},
                    { data:'nameSupplier', name: 'nameSupplier'},
                    { data:'contact_person', name: 'contact_person'},
                    { data: 'phone' , name: 'phone'},
                    { data: 'email' , name: 'email'}, 
                    { data: 'address' , name: 'address'},
                    { data: 'description' , name: 'description'},

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ],
            });
        </script>
@endpush


<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h3 class="fw-bold mb-3">Supplier</h3>
						<ul class="breadcrumbs mb-3">
							<li class="nav-home">
								<a href="#">
									<i class="icon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="icon-arrow-right"></i>
							</li>
							<li class="nav-item">
								<a href="#">Base</a>
							</li>
							<li class="separator">
								<i class="icon-arrow-right"></i>
							</li>
							<li class="nav-item">
								<a href="#">list Supplier</a>
							</li>
						</ul>
					</div>
					<div class="row">
					
                        <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Status Approval</h4>
								</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            
                                           <a href="{{ route('supplier.create') }}" class="btn btn-secondary mb-2"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah</a>

                                            <table class="display table table-striped table-hover" id="crudTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>nameSupplier</th>
                                                    <th>contact_person</th>
                                                    <th>phone</th>
                                                    <th>email</th> 
                                                    <th>address</th>
                                                    <th>description</th>

                                                    <th>Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                        </div>
                                </div>
							</div>
						</div>
					
					</div>
				</div>
			</div>

            @push('js-bawah')
                @include('sweet.success')
            @endpush


@endsection