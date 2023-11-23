@extends('layout')
@push('css')
<link rel="stylesheet" href="../assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../assets/css/pages/datatables.css">
<link rel="stylesheet" href="../assets/extensions/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" href="../assets/extensions/toastify-js/src/toastify.css">
@endpush

@section('body')
<div class="page-heading">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h2>{{ $title }}</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="page-content">
    <section class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                    Tambah Data
                </a>
                <br /><br />
                <div class="modal fade text-left" id="add" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel160" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title white" id="myModalLabel160">
                                    Tambah Data
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="form form-vertical" id="forminput">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input
                                                        type="text"
                                                        id="name"
                                                        class="form-control" name="name"
                                                        required
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label for="dob">DOB</label>
                                                    <input
                                                        type="date"
                                                        id="dob"
                                                        class="form-control" name="dob"
                                                        required
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <input
                                                        type="text"
                                                        id="status"
                                                        class="form-control" name="status"
                                                        required
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label for="join_date">Join Date</label>
                                                    <input
                                                        type="date"
                                                        id="join_date"
                                                        class="form-control" name="join_date"
                                                        required
                                                    />
                                                </div>

                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1"> Submit
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1"> Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel160" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title white" id="myModalLabel160">
                                    Edit Data
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="form form-vertical" id="formupdate">
                                    @csrf
                                    <input type="hidden" id="editid" name="id" value="">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group">
                                                    <label for="editname">Name</label>
                                                    <input
                                                        type="text"
                                                        id="editname"
                                                        class="form-control" name="name"
                                                        required
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label for="editdob">DOB</label>
                                                    <input
                                                        type="date"
                                                        id="editdob"
                                                        class="form-control" name="dob"
                                                        required
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label for="editstatus">Status</label>
                                                    <input
                                                        type="text"
                                                        id="editstatus"
                                                        class="form-control" name="status"
                                                        required
                                                    />
                                                </div>

                                                <div class="form-group">
                                                    <label for="editjoin_date">Join Date</label>
                                                    <input
                                                        type="date"
                                                        id="editjoin_date"
                                                        class="form-control" name="join_date"
                                                        required
                                                    />
                                                </div>

                                            </div>


                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1"> Update
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1"> Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade text-left" id="editdetail" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel160" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title white" id="myModalLabel160">
                                Edit Data
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form class="form form-vertical" id="formupdatedetail">
                                @csrf
                                <input type="hidden" id="editemployee_id" name="employee_id" value="">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="form-group">
                                                <label for="editexperience">Experience</label>
                                                <input
                                                    type="text"
                                                    id="editexperience"
                                                    class="form-control" name="experience"
                                                    required
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="editjob_title">job_title</label>
                                                <input
                                                    type="text"
                                                    id="editjob_title"
                                                    class="form-control" name="job_title"
                                                    required
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="editjob_desc">job_desc</label>
                                                <input
                                                    type="text"
                                                    id="editjob_desc"
                                                    class="form-control" name="job_desc"
                                                    required
                                                />
                                            </div>

                                        </div>


                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"> Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1"> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

                <div id="table"></div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="../assets/extensions/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/extensions/toastify-js/src/toastify.js"></script>

<script>
    function table() {
        $('#table').load(window.location.pathname+'/table');
    }
    table();

    function editdata(value) {
        $('#editid').val('')
        $('#editname').val('')
        $('#editdob').val('')
        $('#editstatus').val('')
        $('#editjoin_date').val('')
        $.ajax({
            type: "GET",
            url: window.location.pathname+'/read/' + value,
            dataType: "json",
        }).done(function (data) {
            if (data.status == true) {
                $('#editid').val(value)
                $('#editname').val(data.result.name)
                $('#editdob').val(data.result.dob)
                $('#editstatus').val(data.result.status)
                $('#editjoin_date').val(data.result.join_date)
            }
        })
    }

    function editdatadetail(value) {
        $('#editemployee_id').val('')
        $('#editexperience').val('')
        $('#editjob_title').val('')
        $('#editjob_desc').val('')
        $.ajax({
            type: "GET",
            url: window.location.pathname+'_detail/read/' + value,
            dataType: "json",
        }).done(function (data) {
            if (data.status == true) {
                $('#editemployee_id').val(value)
                $('#editexperience').val(data.result.experience)
                $('#editjob_title').val(data.result.job_title)
                $('#editjob_desc').val(data.result.job_desc)
            }
        })
    }

    $(document).ready(function () {

        $('#forminput').on('submit', function (e) {

            e.preventDefault();

            var param = $("#forminput").serialize();

            $.ajax({
                type: "POST",
                url: window.location.pathname+'/create',
                dataType: "json",
                data: param
            }).done(function (data) {
                if (data.status == true) {
                    Toastify({
                        text: "Added Successfully",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#198754",
                    }).showToast()
                    table();
                } else {
                    Toastify({
                        text: "Failed to add",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
                }
                document.getElementById("forminput").reset();
                $('#add').modal('hide')
            }).fail(function (jqXHR, textStatus, errorThrown) {
                    Toastify({
                        text: "Terjadi Error",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
            })
        });

        $('#formupdate').on('submit', function (e) {

            e.preventDefault();

            var param = $("#formupdate").serialize();

            $.ajax({
                type: "POST",
                url: window.location.pathname+'/update/' + $('#editid').val(),
                dataType: "json",
                data: param
            }).done(function (data) {
                if (data.status == true) {
                    Toastify({
                        text: "Updated Successfully",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#198754",
                    }).showToast()
                    table();
                } else {
                    Toastify({
                        text: "Failed to Update",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
                }
                document.getElementById("formupdate").reset();
                $('#edit').modal('hide')
            }).fail(function (jqXHR, textStatus, errorThrown) {
                    Toastify({
                        text: "Terjadi Error",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
            })
        });

         $('#formupdatedetail').on('submit', function (e) {

            e.preventDefault();

            var param = $("#formupdatedetail").serialize();

            $.ajax({
                type: "POST",
                url: window.location.pathname+'_detail/update/' + $('#editemployee_id').val(),
                dataType: "json",
                data: param
            }).done(function (data) {
                if (data.status == true) {
                    Toastify({
                        text: "Updated Successfully",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#198754",
                    }).showToast()
                    table();
                } else {
                    Toastify({
                        text: "Failed to Update",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
                }
                document.getElementById("formupdatedetail").reset();
                $('#editdetail').modal('hide')
            }).fail(function (jqXHR, textStatus, errorThrown) {
                    Toastify({
                        text: "Terjadi Error",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
            })
        });

    });

    function deletedata(str) {
        var id = str;
        Swal.fire({
            title: "Warning!!",
            text: "Are you sure you want to delete it??",
            icon: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: window.location.pathname+'/delete/' + id
                }).done(function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Delete',
                            timer: 1500
                        });
                        table();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to delete',
                            timer: 1500
                        });
                    }

                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Toastify({
                        text: "Terjadi Error",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
                })
            }

        });
    }
</script>
@endpush
