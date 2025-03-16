@extends('theme.default')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Tours Reservations
@endsection

@section('content')

    <div class="row table-responsive">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>tour</th>
                        <th>user</th>
                        <th>name</th>
                        <th>address</th>
                        <th>guest</th>
                        <th>reservation date</th>
                        <th>price</th>
                        <th>phone</th>
                        <th>what's app</th>
                        <th>currency</th>
                        <th>note</th>
                        <th>payment status</th>
                        <th>created at</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tourReservations as $tourReservation)
                        <tr>
                            <td>{{$tourReservation->id}}</td>
                            @if ($tourReservation->tour())
                                <td>{{$tourReservation->tour->title}}</td>
                            @else
                                <td>not found</td>
                            @endif
                            @if ($tourReservation->user())
                                <td>{{$tourReservation->user->name}}</td>
                            @else
                                <td>not found</td>
                            @endif
                            <td>{{$tourReservation->first_name}} {{$tourReservation->last_name}}</td>
                            <td>{{$tourReservation->address}}</td>
                            <td>{{$tourReservation->guest}}</td>
                            <td>{{$tourReservation->reservation_date}}</td>
                            <td>{{$tourReservation->price}}</td>
                            <td>{{$tourReservation->phone}}</td>
                            <td>{{$tourReservation->whatsapp}}</td>
                            @if ($tourReservation->currency())
                                <td>{{$tourReservation->currency->code}}</td>
                            @else
                                <td>not found</td>
                            @endif
                            <td>{{$tourReservation->note}}</td>
                            <td>{{$tourReservation->payment_status}}</td>
                            <td>{{$tourReservation->created_at}}</td>

                            {{-- additional reservations --}}

                            <td>
                                <form method="POST" action="{{route('tour-reservations.destroy', $tourReservation)}}" style="display: inline-block">
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
                //     "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/en.json"
                // },
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
