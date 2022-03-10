@extends('layouts.app', ['title' => 'Create Project'])


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css">
@endsection


@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Form Input</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customer">Customer Name</label>
                            <input type="text" id="customer" name="customer" value="{{ old('customer') }}"
                                class="form-control @error('customer') is-invalid @enderror">
                            @error('customer')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="value">Project value</label>
                            <input type="number" id="value" name="value" value="{{ old('value') }}"
                                class="form-control @error('value') is-invalid @enderror">
                            @error('value')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="text" id="start_date" name="start_date" value="{{ old('start_date') }}"
                                class="form-control datepicker @error('start_date') is-invalid @enderror">
                            @error('start_date')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="text" id="end_date" name="end_date" value="{{ old('end_date') }}"
                                class="form-control datepicker @error('end_date') is-invalid @enderror">
                            @error('end_date')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sla">Service Level Agreement (SLA)</label>
                            <select id="sla" name="sla" value="{{ old('sla') }}" class="form-control select2">
                                <option value="1">24x7x4 (High Priority)</option>
                                <option value="2">8x5x4 (Medium Priority)</option>
                                <option value="3">8x5xNBD (Low Priority)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="active" id="status">
                                <label class="form-check-label" for="status">
                                Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="expired" id="status1">
                                <label class="form-check-label" for="status1">
                                Expired
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
@endsection
