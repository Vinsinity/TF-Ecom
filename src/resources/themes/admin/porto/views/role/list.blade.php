@extends('app', ['title' => 'Role List'])
@section('content')
    <!-- start: page -->
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-error alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="datatables-header-footer-wrapper">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">

                                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                                    <a href="{{ route('admin.roles.add') }}" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Add Role</a>
                                </div>

                                <div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label class="ws-nowrap me-3 mb-0">Filter By:</label>
                                        <select class="form-control select-style-1 filter-by" name="filter-by">
                                            <option value="all" selected>All</option>
                                            <option value="1">ID</option>
                                            <option value="2">Customer Name</option>
                                            <option value="3">Date</option>
                                            <option value="4">Total</option>
                                            <option value="5">Status</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label class="ws-nowrap me-3 mb-0">Show:</label>
                                        <select class="form-control select-style-1 results-per-page" name="results-per-page">
                                            <option value="12" selected>12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto ps-lg-1">
                                    <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                                        <div class="input-group">
                                            <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Order">
                                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-ecommerce-simple table-borderless table-striped mb-0" id="datatable-ecommerce-list">

                            <thead>
                                <tr>
                                    <th width="3%"><input type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2" value="" /></th>
                                    <th width="3%">ID</th>
                                    <th>Role Name</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Permissions</th>
                                    <th width="8%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td width="30">
                                                <input type="checkbox" name="checkboxRow1" class="checkbox-style-1 p-relative top-2" value="" />
                                            </td>
                                            <td>
                                                {{ $role->id }}
                                            </td>
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td>{{ $role->created_at }}</td>
{{--                                            <td>$200</td>--}}
                                            <td>
                                                @foreach($role->permissions as $permission)
                                                    <h6 class="m-0">{{ $permission->name }}</h6>
                                                @endforeach
{{--                                                {{ $role->permissions->count() }}--}}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.roles.show', ['slug' => $role->slug]) }}" type="button" class="mb-1 mt-1 me-1 btn btn-primary"><i class="bx bx-pencil"></i></a>
                                                <a class="mb-1 mt-1 me-1 modal-basic btn btn-default btn-danger"><i class="bx bx-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        <hr class="solid mt-5 opacity-4">
                        <div class="datatable-footer">
                            <div class="row align-items-center justify-content-between mt-3">
                                <div class="col-md-auto order-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-stretch">
                                        <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                                            <select class="form-control select-style-1 bulk-action" name="bulk-action" style="min-width: 170px;">
                                                <option value="" selected>Bulk Actions</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                            <a href="ecommerce-orders-detail.html" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-auto text-center order-3 order-lg-2">
                                    <div class="results-info-wrapper"></div>
                                </div>
                                <div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
                                    <div class="pagination-wrapper"></div>
                                </div>
                            </div>
                        </div>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end: page -->
@endsection
