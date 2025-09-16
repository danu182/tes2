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
                            <form action="{{ route('status-approval.update', $statusApproval->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputnameApproval6" class="col-form-label">Name Approval</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="inputnameApproval6" class="form-control @error('nameApproval') is-invalid @enderror" aria-describedby="nameHelpInline" name="nameApproval" value="{{ $statusApproval->nameApproval ?: old('nameApproval') }}">
                                    </div>
                                    <div class="col-auto">
                                        <span id="nameHelpInline" class="form-text">
                                        masukkan name Approval.
                                        </span>
                                    </div>
                                    @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                 <div class="mb-3">
                                    <div class="col-auto">
                                        <label for="inputdescription6" class="col-form-label">description</label>
                                    </div>
                                    <div class="col-auto">
                                        <textarea name="description" id="" cols="30" rows="10" id="inputdescription6" class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHelpInline">{{ $statusApproval->description ?: old('description') }}</textarea>
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