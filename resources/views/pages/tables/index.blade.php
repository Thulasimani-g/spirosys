<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" class="text-primary">Home</a></li>
                    <li class="breadcrumb-item active text-muted">Dashboard</li>
                </ol>
            </div>
        </div>
    </x-slot>


    <div class="card shadow-sm border-light rounded">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Job Details Dashboard</h5>
          
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tbl-format" class="table table-hover text-nowrap" width="100%">
                    <thead>
                        <tr class="bg-light text-primary">
                            <th>S.No</th>
                            <th>Job No</th>
                            <th>Borough</th>
                            <th>Street Name</th>
                            <th>Job Type</th>
                            <th>Filling Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            // Initialize DataTable 
            $('#tbl-format').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('home') }}', 
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'Job_', name: 'Job_' },
                    { data: 'Borough', name: 'Borough' },
                    { data: 'Street_Name', name: 'Street_Name' },
                    { data: 'Job_Type', name: 'Job_Type' },
                    { data: 'Latest_Action_Date', name: 'Latest_Action_Date' }
                ],
                responsive: true, 
                pageLength: 10, 
                lengthChange: true,
                order: [[0, 'asc']] 
            });
        </script>
    </x-slot>
</x-app-layout>
