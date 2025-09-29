@extends('dashboard.backend.main-page.app')

@section('conetnt')
    
@push('js-bawah')
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
                    
                    { data: 'kodeItem' , name: 'kodeItem'} ,
                    { data: 'nameItem' , name: 'nameItem'} ,
                    { data: 'category_item.nameCategory' , name: 'category_item.nameCategory'} ,
                    { data: 'tipe_item.nameTipe' , name: 'tipe_item.nameTipe'} ,
                    { data: 'uom.nameUom' , name: 'uom.nameUom'} ,
                    { data: 'barcode' , name: 'barcode'} ,
                    // { data: 'foto' , name: 'foto'} ,
                    { 
                        data: 'foto', 
                        name: 'foto',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        // Tambahkan fungsi render di sini!
                        render: function(data, type, row) {
                            // Cek apakah data (URL foto) ada
                            if (data) {
                                // Membuat tag <img>
                                // Menggunakan data sebagai src. Atur tinggi/lebar sesuai kebutuhan Anda.
                                return '<img src="'+ data +'" height="50px" style="max-width: 100px;"/>';
                            }
                            return 'Tidak ada foto'; // Teks jika tidak ada foto
                        }
                    } ,
                    { data: 'merek' , name: 'merek'} ,
                    { data: 'seri' , name: 'seri'} ,
                    { data: 'description' , name: 'description'} ,


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
						<h3 class="fw-bold mb-3">Item</h3>
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
								<a href="#">Item</a>
							</li>
						</ul>
					</div>
					<div class="row">
					
                        <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Item list</h4>
								</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            
                                           <a href="{{ route('item.create') }}" class="btn btn-secondary mb-2"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah</a>

                                            <table class="display table table-striped table-hover" id="crudTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>kodeItem</th>
                                                    <th>nameItem</th>
                                                    <th>categoryItem_id</th>
                                                    <th>tipeItem_id</th>
                                                    <th>uom_id</th>
                                                    <th>barcode</th>
                                                    <th>foto</th>
                                                    <th>merek</th>
                                                    <th>seri</th>
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