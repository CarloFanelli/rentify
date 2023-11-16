@extends('layouts.admin')

@section('content')
    <h1>all Cars</h1>

    @include('partials.session-message')

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table
                    class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                    <thead class="table-light">
                        <caption>Cars</caption>
                        <tr>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Fuel</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @forelse ($cars as $car)
                            <tr class="table-primary">
                                <td scope="row">{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->price }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('storage/' . $car->image) }}"
                                        alt="{{ $car->model }} image">
                                </td>
                                <td>{{ $car->fuel_type }}</td>
                                <td>

                                    <a class="btn btn-info" href="{{ route('admin.cars.show', $car) }}">view</a>
                                    <a class="btn btn-secondary" href="{{ route('admin.cars.edit', $car) }}">edit</a>

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#deleteCar{{ $car->id }}">
                                        delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="deleteCar{{ $car->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="deleteCarModalTitle{{ $car->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteCarModalTitle{{ $car->id }}">
                                                        Delete car {{ $car->brand }} {{ $car->model }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.cars.destroy', $car) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit">delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Optional: Place to the bottom of scripts -->
                                    <script>
                                        const myModal = new bootstrap.Modal(document.getElementById('deleteCar{{ $car->id }}'), options)
                                    </script>

                                </td>

                            </tr>
                        @empty
                            <h1>no cars!</h1>
                        @endforelse
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{--     {{$cars->('links:pagination-bootstrap-5')}}
 --}}
        </div>
    </div>
@endsection
