@extends('dashboard.backend.main-page.app')

@section('conetnt')
    
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Sister Company</h3>
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
                    <a href="#">Add Sister Company</a>
                </li>
            </ul>
        </div>
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ADD Sister company</h4>
                    </div>
                        <div class="card-body">
                            {{-- form start --}}
                            <form action="{{ route('sister-company.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputCode6" class="col-form-label">Code</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputCode6" class="form-control @error('code') is-invalid @enderror" aria-describedby="CodeHelpInline" name="code" value="{{ $sisterCompany->code ?: old('code') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="CodeHelpInline" class="form-text">
                                        harus unik.
                                        </span>
                                         @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputname6" class="col-form-label">name</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputname6" class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelpInline" name="name" value="{{ $sisterCompany->name ?: old('name') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="nameHelpInline" class="form-text">
                                        masukkan nama perusahaan.
                                        </span>
                                    </div>
                                    @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputpicUser6" class="col-form-label">picUser</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputpicUser6" class="form-control @error('picUser') is-invalid @enderror" aria-describedby="picUserHelpInline" name="picUser" value="{{$sisterCompany->picUser ?: old('picUser') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="picUserHelpInline" class="form-text">
                                        masukkan nama PIC perusahaan.
                                        </span>
                                    </div>
                                    @error('picUser')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputtlp6" class="col-form-label">tlp</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputtlp6" class="form-control @error('tlp') is-invalid @enderror" aria-describedby="tlpHelpInline" name="tlp" value="{{ $sisterCompany->tlp ?: old('tlp') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="tlpHelpInline" class="form-text">
                                        masukkan No TLP perusahaan.
                                        </span>
                                    </div>
                                    @error('tlp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputemail6" class="col-form-label">email</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="email" id="inputemail6" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelpInline" name="email" value="{{ $sisterCompany->email ?: old('email') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan No email perusahaan.
                                        </span>
                                    </div>
                                    @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputaddress6" class="col-form-label">address</label>
                                    </div>
                                    <div class="col-auto">
                                        {{-- <input type="text" id="inputaddress6" class="form-control @error('name') is-invalid @enderror" aria-describedby="addressHelpInline" name="address"> --}}
                                        <textarea name="address" id="" cols="30" rows="10" id="inputaddress6" class="form-control @error('address') is-invalid @enderror" aria-describedby="addressHelpInline">{{ $sisterCompany->address ?: old('address') }}</textarea>
                                    </div>
                                    <div class="col-auto">
                                        <span id="addressHelpInline" class="form-text">
                                        masukkan No address perusahaan.
                                        </span>
                                    </div>
                                    @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputdescription6" class="col-form-label">description</label>
                                    </div>
                                    <div class="col-auto">
                                        {{-- <input type="text" id="inputdescription6" class="form-control @error('name') is-invalid @enderror" aria-describedby="descriptionHelpInline" name="description"> --}}
                                        <textarea name="description" id="" cols="30" rows="10" id="inputdescription6" class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHelpInline">{{ $sisterCompany->description ?: old('description') }}</textarea>
                                    </div>
                                    <div class="col-auto">
                                        <span id="descriptionHelpInline" class="form-text">
                                        masukkan description perusahaan.
                                        </span>
                                    </div>
                                    @error('description')
                                            <span class="text-danger form-text">{{ $message }}</span>
                                        @enderror
                                </div>

                                    <button class="btn btn-success">Submit</button>
                                    {{-- <button class="btn btn-danger">Cancel</button> --}}
                                    <button type="button" class="btn btn-danger" onclick="window.location='{{ route('sister-company.index') }}'">Cancel</button>
                                
                            </form>
                            {{-- form end --}}
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>


@endsection