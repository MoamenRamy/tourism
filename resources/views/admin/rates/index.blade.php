@extends('theme.default')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Rates
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>user</th>
                        <th>tour</th>
                        <th>rate</th>
                        <th>comment</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rates as $rate)
                        <tr>
                            <td>{{$rate->id}}</td>
                            <td>{{$rate->user->name}}</td>

                            @if ($rate->tour())
                                <td>{{$rate->tour->title}}</td>
                            @else
                                <td>not found</td>
                            @endif

                            <td>{{$rate->rating}}</td>
                            <td>{{$rate->comment}}</td>

                            <td>
                                <form method="POST" action="{{route('rates.destroy', $rate)}}" style="display: inline-block">
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
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
                },
                "order": [[0, "asc"]],
                "columnDefs": [
                    { "type": "num", "targets": 0 },
                    { "orderable": false, "targets": 2 } // Corrected index
                ],
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true
            });
        });
    </script>
@endsection
