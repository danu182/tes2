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
                            <form action="{{ route('pr.update', $purchaseRequisition->id ) }}" method="POST">
                                @csrf
                                @method('PUT')

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="title" class="col-form-label">title</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="emailHelpInline" name="title" value="{{ $purchaseRequisition->title ?: old('title') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan title.
                                        </span>
                                    </div>
                                    @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>


                                <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="sister_company_id" class="col-form-label">Sister Company</label>
                                    </div>
                                    <div class="col-auto">
                                       <select class="form-select form-control" id="search" name="sister_company_id">
                                            {{-- <option value="{{ $purchaseRequisition->title }}">{{ $purchaseRequisition->sister_company['name'] }}</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan sister_company_id.
                                        </span>
                                    </div>
                                    @error('sister_company_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>




                                {{-- supplier start --}}
                                <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="supplier_id" class="col-form-label">supplier</label>
                                    </div>
                                    <div class="col-auto">
                                       <select class="form-select form-control" id="supplier" name="supplier_id">
                                            {{-- <option value="{{ $purchaseRequisition->supplier_id }}">{{ $purchaseRequisition->supplier?->nameSupplier }}</option> --}}

                                            <option value="{{$purchaseRequisition->supplier_id }}" {{ ( $purchaseRequisition->supplier_id) ? 'selected' : '' }}>{{$purchaseRequisition->supplier?->nameSupplier}}</option>

                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan supplier_id.
                                        </span>
                                    </div>
                                    @error('supplier_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                {{-- supplier end --}}
                                


                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="description" class="col-form-label">description</label>
                                    </div>
                                    <div class="col-auto">
                                        <textarea name="description" id="" cols="30" rows="10" id="description" class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHelpInline">{{ $purchaseRequisition->description ?: old('description') }}</textarea>
                                    </div>
                                    <div class="col-auto">
                                        <span id="descriptionHelpInline" class="form-text">
                                        masukkan description approval.
                                        </span>
                                    </div>
                                    @error('description')
                                            <span class="text-danger form-text">{{ $message }}</span>
                                        @enderror
                                </div>

                                    <button class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location='{{ route('status-approval.index') }}'">Cancel</button>
                                
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
        var path = "{{ route('autocomplete') }}";
    
        $('#search').select2({
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

    <script type="text/javascript">
        var path = "{{ route('autocompleteSupplier') }}";
    
        $('#supplier').select2({
            placeholder: 'Select an supplier',
            ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nameSupplier,
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