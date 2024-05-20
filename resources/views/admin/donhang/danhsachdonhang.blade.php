@extends('admin.main')
@section('content')
<div class="card listTable">
    <h5 class="card-header">Danh Sách Phiếu Mượn</h5>
    <hr class="my-0">
    <div class="listTable__add add-new">
        <a href="{{route('order.create')}}" class="btn btn-primary waves-effect waves-light">
            <i class="bi bi-plus-lg me-0 me-sm-1 d-inline-block"></i>
            <span class="d-none d-sm-inline-block"> Add New Order </span>
        </a>
    </div>
    <hr class="my-0">
    <div class="card-body">
        <div class="card-datatable text-nowrap">
            <table id="OrderTable" class="listTable__table table table-bordered">
                <thead>
                <tr>
                    <th> Mã Đơn Hàng </th>
                    <th> Mã Nhân Viên </th>
                    <th> Mã Khách Hàng </th>
                    <th> Tổng Tiền </th>
                    <th> Trạng thái mượn </th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                @foreach($donhangs as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->manhanvien}}</td>
                        <td>{{$item->makhachhang}}</td>
                        <td>{{$item->tongtien}}</td>
                        <td>{{$item->trangthai}}</td>
                        <td>
                            <div class="actionFunc">
                                <a href="{{route('order',['id' => $item->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Preview">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{route('order.edit',['id' => $item->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{route('order.edit', [$item->id])}}" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Return Book">
                                    <i class="bi bi-book-half"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect" data-bs-toggle="tooltip" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="{{route('order.edit',['id' => $item->id])}}" class="dropdown-item view-record">
                                        <i class="bi bi-eye"></i>
                                        <span>View</span>
                                    </a>
                                    <a href="{{route('order.edit',['id' => $item->id])}}" class="dropdown-item edit-record">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Edit</span>
                                    </a>
                                    <a href="#" class="dropdown-item delete-record">
                                        <i class="bi bi-trash"></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection