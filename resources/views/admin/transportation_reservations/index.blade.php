@extends('theme.default')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Transportation Reservations
@endsection

@section('content')

    <a href="{{ route('transportation_reservations.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
    <hr>
    <div class="row table-responsive">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>from</th>
                        <th>to</th>
                        <th>price</th>
                        <th>currency</th>
                        <th>guest</th>
                        <th>vehicle</th>
                        <th>user name</th>
                        <th>name</th>
                        <th>address</th>
                        <th>hotel</th>
                        <th>flight number</th>
                        <th>reservation date</th>
                        <th>phone</th>
                        <th>what's app</th>
                        <th>note</th>
                        <th>payment status</th>
                        <th>created at</th>
                        <th>options</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{$reservation->id}}</td>
                            <td>{{$reservation->transportation->from ?? 'N/A'}}</td>
                            <td>{{$reservation->transportation->to ?? 'N/A'}}</td>
                            <td>{{$reservation->price}}</td>
                            <td>{{$reservation->currency->code ?? 'N/A'}}</td>
                            <td>{{$reservation->guest}}</td>
                            <td>{{$reservation->transportation->vehicle->model ?? 'N/A'}}</td>
                            <td>{{$reservation->user->name ?? 'not found'}}</td>
                            <td>{{$reservation->first_name}} {{$reservation->last_name}}</td>
                            <td>{{$reservation->address}}</td>
                            <td>{{$reservation->hotel}}</td>
                            <td>{{$reservation->flight_number}}</td>
                            <td>{{$reservation->reservation_dateTime}}</td>
                            <td>{{$reservation->phone}}</td>
                            <td>{{$reservation->whatsapp}}</td>
                            <td>{{$reservation->note}}</td>
                            <td>{{$reservation->payment_status}}</td>
                            <td>{{$reservation->created_at}}</td>

                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('transportation_reservations.edit', $reservation)}}"><i class="fa fa-edit"></i> Edit</a>

                                <form method="POST" action="{{route('transportation_reservations.destroy', $reservation)}}" style="display: inline-block">
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
