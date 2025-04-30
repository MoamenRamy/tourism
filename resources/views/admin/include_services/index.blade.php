@extends('theme.default')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Include Services
@endsection

@section('content')
    <a href="{{ route('include-services.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>include</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($includeServices as $includeService)
                        <tr>
                            <td>{{$includeService->id}}</td>
                            <td>{{$includeService->name}}</td>
                            <td>
                                @if ($includeService->include == 1)
                                    True
                                @elseif ($includeService->include == 0)
                                    False
                                @endif
                            </td>

                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('include-services.edit', $includeService)}}"><i class="fa fa-edit"></i>Edit</a>
                                <form method="POST" action="{{route('include-services.destroy', $includeService)}}" style="display: inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#books-table')) {
                $('#books-table').DataTable().destroy();
            }

            $('#books-table').DataTable({
                // "language": {
                //     "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
                // },
                "order": [[0, "desc"]],
                "columnDefs": [
                    { "type": "num", "targets": 0 },
                    // { "orderable": false, "targets": 3 } // Corrected index
                ],
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true
            });
        });
    </script>
@endsection
