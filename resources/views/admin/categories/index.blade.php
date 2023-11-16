@extends('layouts.admin')

@section('content')
    <h2>AllCategories</h2>

    <div class="row">
        <div class="col">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Category?</label>
                    <input type="text" class="form-control" name="name" id="name"
                        aria-describedby="categoryNameHelper" placeholder="type a category">
                    <small id="categoryNameHelper" class="form-text text-muted">type a category name</small>
                </div>

                <button type="submit" class="btn btn-primary">save</button>

            </form>
        </div>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Cars Counter</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr class="">
                                <td scope="row">{{ $category->name }}</td>
                                <td class="badge bg-primary ">{{ $category->cars->count() }}</td>
                                <td>

                                    Delete


                                </td>
                            </tr>
                        @empty
                            <h2>no categories</h2>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
