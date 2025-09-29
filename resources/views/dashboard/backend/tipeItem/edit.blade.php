@extends('dashboard.backend.main-page.app')

@section('conetnt')
    
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">tipe-item</h3>
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
                    <a href="#">Edit tipe-item</a>
                </li>
            </ul>
        </div>
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit tipe-item</h4>
                    </div>
                        <div class="card-body">
                            {{-- form start --}}
                            <form action="{{ route('tipe-item.update', $tipeItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="kodeTipe" class="col-form-label">kode tipe</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="kodeTipe" class="form-control @error('kodeTipe') is-invalid @enderror" aria-describedby="emailHelpInline" name="kodeTipe" value="{{ $tipeItem->kodeTipe ?: old('kodeTipe') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan kode tipe.
                                        </span>
                                    </div>
                                    @error('kodeTipe')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="nameTipe" class="col-form-label">name tipe</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="nameTipe" class="form-control @error('nameTipe') is-invalid @enderror" aria-describedby="emailHelpInline" name="nameTipe" value="{{  $tipeItem->nameTipe ?: old('nameTipe') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan name Tipe.
                                        </span>
                                    </div>
                                    @error('nameTipe')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>


                                <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputdescription6" class="col-form-label">description</label>
                                    </div>
                                    <div class="col-auto">
                                        <textarea name="description" id="" cols="30" rows="10" id="inputdescription6" class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHelpInline">{{ $tipeItem->description ?: old('description') }}</textarea>
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
                                    <button type="button" class="btn btn-danger" onclick="window.location='{{ route('tipe-item.index') }}'">Cancel</button>
                                
                            </form>
                            {{-- form end --}}
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>


@endsection