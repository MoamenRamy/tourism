@extends('theme.default')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Tours
@endsection

@section('content')

    <a href="{{ route('tours.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
    <hr>
    <div class="row table-responsive">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>title</th>
                        <th>defination</th>
                        <th>description</th>
                        <th>destination</th>
                        <th>category</th>
                        <th>price</th>
                        <th>duration</th>
                        <th>duration_type</th>
                        <th>rating</th>
                        <th>available</th>
                        <th>additional_info</th>
                        <th>max_tickets_per_day</th>
                        <th>count</th>
                        <th>pin</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                        <tr>
                            <td>{{$tour->id}}</td>
                            <td>{{$tour->name}}</td>
                            <td>{{$tour->title}}</td>
                            <td>{{$tour->defination}}</td>
                            <td>{{$tour->description}}</td>
                            <td>{{$tour->destination->name}}</td>
                            <td>{{$tour->category->title}}</td>
                            <td>{{$tour->price}}</td>
                            <td>{{$tour->duration}}</td>
                            <td>{{$tour->duration_type}}</td>
                            <td>{{$tour->rating}}</td>
                            <td>{{$tour->available}}</td>
                            <td>{{$tour->additional_info}}</td>
                            <td>{{$tour->max_tickets_per_day}}</td>
                            {{-- <td>{{$tour->longitude}}</td> --}}
                            {{-- <td>{{$tour->latitude}}</td> --}}
                            <td>{{$tour->count}}</td>
                            <td>{{$tour->pin}}</td>


                            {{-- Add --}}

                            {{-- photos --}}
                            {{-- details --}}
                            {{-- include --}}

                            <td>
                                <a class="btn btn-info btn-sm m-1" href="{{route('tours.edit', $tour)}}"><i class="fa fa-edit"></i> Edit</a>

                                <form method="POST" action="{{route('tours.destroy', $tour)}}" style="display: inline-block">
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
