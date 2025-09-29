@extends('dashboard.backend.main-page.app')

@section('conetnt')
    
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
                    <a href="{{route('item.index')}}">Base</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Item</a>
                </li>
            </ul>
        </div>
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ADD Item</h4>
                    </div>
                        <div class="card-body">
                            {{-- form start --}}
                            <form action="{{ route('item.store') }}" method="POST">
                                @csrf

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="kodeItem" class="col-form-label">kodeItem</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="kodeItem" class="form-control @error('kodeItem') is-invalid @enderror" aria-describedby="emailHelpInline" name="kodeItem" value="{{ old('kodeItem') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan kode item.
                                        </span>
                                    </div>
                                    @error('kodeItem')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="nameItem" class="col-form-label">nameItem</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="nameItem" class="form-control @error('nameItem') is-invalid @enderror" aria-describedby="emailHelpInline" name="nameItem" value="{{ old('nameItem') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan name item.
                                        </span>
                                    </div>
                                    @error('nameItem')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="foto" class="col-form-label">foto</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="foto" class="form-control @error('foto') is-invalid @enderror" aria-describedby="emailHelpInline" name="foto" value="{{ old('foto') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan foto.
                                        </span>
                                    </div>
                                    @error('foto')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="merek" class="col-form-label">merek</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="merek" class="form-control @error('merek') is-invalid @enderror" aria-describedby="emailHelpInline" name="merek" value="{{ old('merek') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan merek.
                                        </span>
                                    </div>
                                    @error('merek')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="seri" class="col-form-label">seri</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="seri" class="form-control @error('seri') is-invalid @enderror" aria-describedby="emailHelpInline" name="seri" value="{{ old('seri') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan seri.
                                        </span>
                                    </div>
                                    @error('seri')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="barcode" class="col-form-label">barcode</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="barcode" class="form-control @error('barcode') is-invalid @enderror" aria-describedby="emailHelpInline" name="barcode" value="{{ old('barcode') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan barcode.
                                        </span>
                                    </div>
                                    @error('barcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>


                                {{-- category start --}}
                                <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="category" class="col-form-label">category</label>
                                    </div>
                                    <div class="col-auto">
                                       <select class="form-select form-control" id="category" name="categoryItem_id">
                                            
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan category.
                                        </span>
                                    </div>
                                    @error('categoryItem_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                {{-- category end --}}

                                {{-- tipeItem_id start --}}
                                <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="tipeItem_id" class="col-form-label">tipeItem_id</label>
                                    </div>
                                    <div class="col-auto">
                                       <select class="form-select form-control" id="tipeItem_id" name="tipeItem_id">
                                            
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan tipeItem_id.
                                        </span>
                                    </div>
                                    @error('tipeItem_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                {{-- tipeItem_id end --}}

                                {{-- uom_id start --}}
                                <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="uom_id" class="col-form-label">uom_id</label>
                                    </div>
                                    <div class="col-auto">
                                       <select class="form-select form-control" id="uom_id" name="uom_id">
                                            
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan uom_id.
                                        </span>
                                    </div>
                                    @error('uom_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                {{-- uom_id end --}}


                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputdescription6" class="col-form-label">description</label>
                                    </div>
                                    <div class="col-auto">
                                        <textarea name="description" id="" cols="30" rows="10" id="inputdescription6" class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHelpInline">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="col-auto">
                                        <span id="descriptionHelpInline" class="form-text">
                                        masukkan description.
                                        </span>
                                    </div>
                                    @error('description')
                                            <span class="text-danger form-text">{{ $message }}</span>
                                        @enderror
                                </div>

                                    <button class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location='{{ route('item.index') }}'">Cancel</button>
                                
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
        var path = "{{ route('autocompleteCategory') }}";
    
        $('#category').select2({
            placeholder: 'Select an category',
            ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nameCategory,
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
        var path = "{{ route('autocompleteTipeItem') }}";
    
        $('#tipeItem_id').select2({
            placeholder: 'Select an tipe Item',
            ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nameTipe,
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
        var path = "{{ route('autocompleteUom') }}";
    
        $('#uom_id').select2({
            placeholder: 'Select an uom',
            ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results:  $.map(data, function (item) {
                        return {
                            text: item.nameUom,
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