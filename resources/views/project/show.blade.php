@extends('layouts.app', ['title' => 'Show Project'])


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Project Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">{{ $project->id }} - {{ $project->name }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Customer Name</td>
                                        <td>{{ $project->customer }}</td>
                                    </tr>
                                    <tr>
                                        <td>Project Value</td>
                                        <td>{{ currencyIDR($project->value) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Start Date / End Date</td>
                                        <td>{{ $project->start_date }} - {{ $project->end_date }} </td>
                                    </tr>
                                    <tr>
                                        <td>Service Level Agreement(SLA)</td>
                                        @if ($project->sla == 1)
                                        <td>24x7x4 (High Priority)</td>
                                        @elseif ($project->sla == 2)
                                        <td>8x5x4 (Medium Priority)</td>
                                        @elseif ($project->sla == 3)
                                        <td>8x5xNBD (Low Priority)</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        @if($project->status = 'active')
                                            <td><div class="badge badge-success">Active</div></td>
                                        @else
                                            <td><div class="badge badge-danger">Expired</div></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Created At</td>
                                        <td>{{ $project->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Updated At</td>
                                        <td>{{ $project->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Project file</h4>
                            <a href="{{ route('project.file.create', ['id' => $project->id]) }}"
                                class="btn btn-primary">Upload Multiple File</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-doc">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projectFiles as $key => $file)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $file->file }}</td>
                                                <td><a href="{{ route('project.file.show', $file->id) }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i> View</a>
                                                    <a href="{!! route('project.file.download', $file->id) !!}" class="btn btn-success"><i
                                                            class="fas fa-download"></i> Download</a>
                                                    <button onClick="destroyFile(this.id)" id="{{ $file->id }}"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="card-footer">
            Footer Card
        </div>
    </div>
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

    <script>
        $("#table-doc").dataTable({

        });
    </script>
    <script>
        function destroyFile(id) {
            Swal.fire({
                title: 'APAKAH KAMU YAKIN ?',
                text: "INGIN MENGHAPUS DATA INI!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'BATAL',
                confirmButtonText: 'YA, HAPUS!',
            }).then((result) => {
                if (result.isConfirmed) {
                    //ajax delete
                    jQuery.ajax({
                        type: 'DELETE',
                        url: `/project/file/delete/${id}`,
                        data: {
                            "id": id,
                            "_token": "{{ csrf_token() }}"
                        },

                        success: function(response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            })
        }
    </script>
@endsection
