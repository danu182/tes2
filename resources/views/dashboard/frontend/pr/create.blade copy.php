@extends('dashboard.backend.main-page.app')

@section('conetnt')

@push('js-atas')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
    
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">PR</h3>
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
                    <a href="#">Add PR</a>
                </li>
            </ul>
        </div>
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ADD PR</h4>
                    </div>
                        <div class="card-body">
                           
                            {{-- form start --}}
                        <form action="{{ route('pr.store') }}" method="POST">
                            @csrf 
                            {{-- header form start --}}
                            <div class="row row-demo-grid">
                                
                                <div class="col-md-6">
                                    <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Perusahaan</h5>

                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">No PR</label>
                                                <div class="col-sm-9">
                                               <input type="text" class="form-control" id="inputPassword" disabled>  
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-9">
                                               <input type="text" class="form-control" id="inputPassword" value="{{ date('Y-m-d') }}" disabled>  
                                                </div>
                                            </div>

                                            {{-- category start --}}
                                            <div class="mb-3">
                                                <div class="col-auto">
                                                    <label for="category" class="col-form-label">Peminta sister Compnay</label>
                                                </div>
                                                <div class="col-auto">
                                                <select class="form-select form-control" id="sisterCompany_id" name="sisterCompany_id">
                                                        
                                                    </select>
                                                </div>
                                                {{-- <div class="col-auto">
                                                    <span id="emailHelpInline" class="form-text">
                                                    masukkan sister company.
                                                    </span>
                                                </div> --}}
                                                @error('categoryItem_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            {{-- category end --}}

                                            <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Jenis</label>
                                            <div class="col-sm-9">
                                                <select name="jenis" id="jenis" class="form-control">
                                                    <option value="1">rutin</option>
                                                    <option value="2">Non Rutin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Sifat</label>
                                            <div class="col-sm-9">
                                                <select name="sifat" id="sifat" class="form-control">
                                                    <option value="1">biasa</option>
                                                    <option value="2">segera</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-6 ms-auto">
                                    <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Jenis</h5>

                                        
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Judul</label>
                                            <div class="col-sm-9">
                                                <textarea name="title" id="" cols="30" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">ketreangan</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                            {{-- header form end --}}

                            {{-- <h5 class="card-title mt-3">item</h> --}}
                            
                                <form>
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">item</th>
                                                <th scope="col">qty</th>
                                                <th scope="col">baseprice</th>
                                                <th scope="col">total</th>
                                                <th scope="col">description</th>
                                                <th scope="col">Aksi</th> </tr>
                                        </thead>
                                        <tbody id="item-list">
                                            <tr id="row-1">
                                                
                                                <!-- {{-- item start --}} -->
                                                <!-- {{-- <td><input type="text" class="form-control" name="item[]" placeholder="Nama Item"></td> --}} -->
                                                <td><select class="form-select form-control item-select2" id="item_id" name="item_id[]"></select></td>
                                                <!-- {{-- item end --}} -->


                                                <td><input type="number" class="form-control" name="qty[]" value="1" min="1"></td>
                                                <td><input type="number" class="form-control" name="baseprice[]" placeholder="0.00" min="0" step="0.01"></td>
                                                <td><input type="text" class="form-control" name="total[]" value="0.00" readonly></td>
                                                <td><input type="text" class="form-control" name="description[]" placeholder="Keterangan"></td>
                                                <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <button type="button" class="btn btn-primary" onclick="tambahBaris()">Tambah Item</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </form>

                            </form>
                            {{-- form end --}}

                        </div>
                </div>
            </div>
        
        </div>
    </div>
</div>

@push('js-bawah')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        var path = "{{ route('autocompleteSisterCompany') }}";
    
        $('#sisterCompany_id').select2({
            placeholder: 'Select an sister company',
            ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
            }
        });
    
    </script>

    <!-- <script type="text/javascript">
        var path = "{{ route('autocompleteItem') }}";
    
        $('#item_id').select2({
            placeholder: 'Select an item',
            ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nameItem,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
            }
        });
    
    </script> -->

@push('js-bawah')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        // This is a single setup function to run once the document is ready.
        $(document).ready(function() {
            // Initialize Select2 for the initial sister company dropdown.
            $('#sisterCompany_id').select2({
                placeholder: 'Select an sister company',
                ajax: {
                    url: "{{ route('autocompleteSisterCompany') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            // Initialize Select2 and event listeners for all existing item rows.
            // Using a class selector '.item-select2' to target all of them.
            $('.item-select2').each(function() {
                initializeItemSelect2($(this));
                addCalculationListeners($(this).closest('tr'));
            });
        });

        let rowCount = 1;

        // A reusable function to initialize Select2 for a given item element.
        function initializeItemSelect2(element) {
            var path = "{{ route('autocompleteItem') }}";

            element.select2({
                placeholder: 'Select an item',
                width: '100%',
                ajax: {
                    url: path,
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.nameItem,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        // A reusable function to add event listeners for calculation to a given row.
        function addCalculationListeners(row) {
            const qtyInput = row.find('input[name="qty[]"]');
            const priceInput = row.find('input[name="baseprice[]"]');
            const totalInput = row.find('input[name="total[]"]');

            // Listen for changes on both quantity and base price inputs.
            qtyInput.on('input', function() {
                calculateTotal(qtyInput, priceInput, totalInput);
            });
            
            priceInput.on('input', function() {
                calculateTotal(qtyInput, priceInput, totalInput);
            });
        }

        // The core calculation logic.
        function calculateTotal(qtyInput, priceInput, totalInput) {
            const qty = parseFloat(qtyInput.val()) || 0;
            const price = parseFloat(priceInput.val()) || 0;
            const total = qty * price;
            totalInput.val(total.toFixed(2));
        }

        // This function adds a new row to the table.
        function tambahBaris() {
            rowCount++;
            const tableBody = $('#item-list');
            const newRowHtml = `
                <tr id="row-${rowCount}">
                    <td><select class="form-select form-control item-select2" name="item_id[]"></select></td>
                    <td><input type="number" class="form-control" name="qty[]" value="1" min="1"></td>
                    <td><input type="number" class="form-control" name="baseprice[]" placeholder="0.00" min="0" step="0.01"></td>
                    <td><input type="text" class="form-control" name="total[]" value="0.00" readonly></td>
                    <td><input type="text" class="form-control" name="description[]" placeholder="Keterangan"></td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button></td>
                </tr>
            `;
            tableBody.append(newRowHtml);

            // Get the newly added row and initialize Select2 and listeners on it.
            const newRow = tableBody.find(`#row-${rowCount}`);
            const newSelectElement = newRow.find('.item-select2');
            
            initializeItemSelect2(newSelectElement);
            addCalculationListeners(newRow);
        }

        // This function removes a row from the table.
        function hapusBaris(buttonElement) {
            const rowToRemove = $(buttonElement).closest('tr');
            if (rowToRemove.siblings().length > 0) {
                 rowToRemove.remove();
            }
        }
    </script>
@endpush

    

<script type="text/javascript">
        var path = "{{ route('autocompleteItem') }}";
    
        $('#item_id').select2({
            placeholder: 'Select an item',
            width: '100%',  
            ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nameItem,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
            }
        });
    
</script>

@endpush


@endsection