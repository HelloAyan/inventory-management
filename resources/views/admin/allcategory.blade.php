@extends('admin.layouts.template')

@section('page_title')
    Dashboard - All Category
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Category</h4>
        <div class="card">
            <h5 class="card-header">Available Category</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $category->category_name }} </td>
                            <td>{{ $category->subcategory_count }}</td>
                            <td>{{ $category->product_count }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-warning">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
