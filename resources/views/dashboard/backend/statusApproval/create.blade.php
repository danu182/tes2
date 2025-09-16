@extends('dashboard.backend.main-page.app')

@section('conetnt')
    
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Status Approval</h3>
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
                    <a href="#">Add Status Approval</a>
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
                            <form action="{{ route('status-approval.store') }}" method="POST">
                                @csrf

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputnameApproval6" class="col-form-label">name Approval</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputnameApproval6" class="form-control @error('nameApproval') is-invalid @enderror" aria-describedby="emailHelpInline" name="nameApproval" value="{{ old('nameApproval') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                        masukkan name Approval.
                                        </span>
                                    </div>
                                    @error('email')
                                            <span class="text-danger">{{ $message }}</span>
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
                                    <button class="btn btn-danger">Cancel</button>
                                
                            </form>
                            {{-- form end --}}
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>


@endsection