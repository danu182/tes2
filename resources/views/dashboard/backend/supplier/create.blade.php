@extends('dashboard.backend.main-page.app')

@section('conetnt')
    
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
                    <a href="#">ADD Supplier</a>
                </li>
            </ul>
        </div>
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ADD Supplier</h4>
                    </div>
                        <div class="card-body">
                            {{-- form start --}}
                            <form action="{{ route('supplier.store') }}" method="POST">
                                @csrf

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputnameSupplier6" class="col-form-label">name Supplier</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputnameSupplier6" class="form-control @error('nameSupplier') is-invalid @enderror" aria-describedby="nameSupplierHelpInline" name="nameSupplier" value="{{ old('nameSupplier') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="nameSupplierHelpInline" class="form-text">
                                        masukkan name Supplier.
                                        </span>
                                    </div>
                                    @error('nameSupplier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputcontact_person6" class="col-form-label">contact_person</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputcontact_person6" class="form-control @error('contact_person') is-invalid @enderror" aria-describedby="contact_personHelpInline" name="contact_person" value="{{ old('contact_person') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="contact_personHelpInline" class="form-text">
                                        masukkan name Supplier.
                                        </span>
                                    </div>
                                    @error('contact_person')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputphone6" class="col-form-label">Phone</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputphone6" class="form-control @error('phone') is-invalid @enderror" aria-describedby="emailHelpInline" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan phone.
                                        </span>
                                    </div>
                                    @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputemail6" class="col-form-label">email</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputemail6" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelpInline" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan email.
                                        </span>
                                    </div>
                                    @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="address6" class="col-form-label">address</label>
                                    </div>
                                    <div class="col-auto">
                                        <textarea name="address" id="" cols="30" rows="10" id="address6" class="form-control @error('address') is-invalid @enderror" aria-describedby="addressHelpInline">{{ old('address') }}</textarea>
                                    </div>
                                    <div class="col-auto">
                                        <span id="addressHelpInline" class="form-text">
                                        masukkan address.
                                        </span>
                                    </div>
                                    @error('address')
                                            <span class="text-danger form-text">{{ $message }}</span>
                                        @enderror
                                </div>
                                 

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputdescription6" class="col-form-label">description</label>
                                    </div>
                                    <div class="col-auto">
                                        <textarea name="description" id="" cols="30" rows="10" id="inputdescription6" class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHelpInline">{{ old('description') }}</textarea>
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
                                    <button type="button" class="btn btn-danger" onclick="window.location='{{ route('supplier.index') }}'">Cancel</button>
                                
                            </form>
                            {{-- form end --}}
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>


@endsection