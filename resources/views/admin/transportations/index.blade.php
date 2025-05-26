@extends('theme.default')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Transportation
@endsection

@section('content')
    <a href="{{ route('transportations.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
    <hr>
    <div class="row table-responsive">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>destination</th>
                        <th>from</th>
                        <th>to</th>
                        {{-- <th>price</th> --}}
                        {{-- <th>vehicle</th> --}}
                        <th>available</th>
                        <th>created at</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transportations as $transportation)
                        <tr>
                            <td>{{$transportation->id}}</td>
                            <td>{{$transportation->destination->name}}</td>
                            <td>{{$transportation->from}}</td>
                            <td>{{$transportation->to}}</td>
                            {{-- <td>{{$transportation->price}}</td> --}}
                            {{-- <td>{{$transportation->vehicle->translate(app()->getLocale())->name ?? 'N/A'}}</td> --}}
                            {{-- <td>{{$transportation->vehicle->name ?? 'N/A'}}</td> --}}
                            {{-- {{ dd($transportation->vehicle) }} --}}
                            <td>{{$transportation->available}}</td>
                            <td>{{$transportation->created_at}}</td>

                            {{-- include --}}

                            <td>
                                <a class="btn btn-info btn-sm m-1" href="{{route('transportations.edit', $transportation)}}"><i class="fa fa-edit"></i> Edit</a>

                                <form method="POST" action="{{route('transportations.destroy', $transportation)}}" style="display: inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>Delete</button>
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
                    // { "orderable": false, "targets": 0 } // Corrected index
                ],
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true
            });
        });
    </script>
@endsection
