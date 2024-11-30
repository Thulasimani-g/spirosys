<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Dashboard</div>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table id="tbl-format" class="table table-hover text-nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Job No</th>
                            <th>Borough</th>
                            <th>Street Name</th>
                            <th>Job Type</th>
                            <th>Filling Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <!-- Other rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
           $('#tbl-format').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('home') }}', // Set the route to fetch data
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'Job_', name: 'Job_' },
                    { data: 'Borough', name: 'Borough' },
                    { data: 'Street_Name', name: 'Street_Name' },
                    { data: 'Job_Type', name: 'Job_Type' },
                    { data: 'Latest_Action_Date', name: 'Latest_Action_Date' },
                   
                ]
            });
        </script>
    </x-slot>
</x-app-layout>
