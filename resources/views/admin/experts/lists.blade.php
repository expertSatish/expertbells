@extends('admin.layouts.app')
@section('content')

<div class="br-mainpanel">

    <div class="br-pageheader pd-y-15 pd-l-20">

        <div class="col-md-6">

            <nav class="breadcrumb pd-0 mg-0 tx-12">

                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>

                <span class="breadcrumb-item active">Experts</span>

            </nav>

        </div>

        <div class="col-md-6">
            <div class="text-right">
                <a href="#cmsmodel" data-bs-type="cmsmodel" data-bs-toggle="modal" data-bs-id="1"
                    class="btn btn-dark btn-with-icon btn-xs sws-left sws-bounce" data-title="Request a time(CMS)">
                    <div class="ht-40">
                        <span class="icon wd-40"><i class="fas fa-file-alt"></i></span>
                    </div>
                </a>
                {{-- <a href="#cmsmodel" data-bs-type="cmsmodel" data-bs-toggle="modal" data-bs-id="2" class="btn btn-dark btn-with-icon btn-xs sws-left sws-bounce" data-title="Gift a session(CMS)">
                        <div class="ht-40">
                            <span class="icon wd-40"><i class="far fa-file-alt"></i></span>
                        </div>
                    </a>
                    <a href="#cmsmodel" data-bs-type="cmsmodel" data-bs-toggle="modal" data-bs-id="3" class="btn btn-dark btn-with-icon btn-xs sws-left sws-bounce" data-title="Special Note(CMS)">
                        <div class="ht-40">
                            <span class="icon wd-40"><i class="fas fa-files-medical"></i></span>
                        </div>
                    </a> --}}
            </div>
        </div>

    </div>

    <div class="br-pagebody">

        <div class="row row-sm mg-t-20">

            <div class="col-sm-12 mg-t-20 mg-sm-t-0">

                <div class="card shadow-base bd-0">

                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">

                        <h6 class="card-title tx-uppercase tx-12 mg-b-0"> </h6>

                        <form action="{{ url()->current() }}" class="tx-12 searfrm tx-uppercase d-flex">
                            @csrf
                            <select name="expertise" class="form-select me-2" onchange="$('.searfrm').submit();">
                                <option value="">Choose Expertise</option>
                                @foreach ($expertises as $expertise)
                                <option value="{{ $expertise->id }}"
                                    {{ request('expertise') ? ($expertise->id == request('expertise') ? 'selected' : '') : '' }}>
                                    {{ $expertise->title }}</option>
                                @endforeach
                            </select>
                            <select name="industries" class="form-select me-2" onchange="$('.searfrm').submit();">
                                <option value="">Choose Industries</option>
                                @foreach ($industries as $industrie)
                                <option value="{{ $industrie->id }}"
                                    {{ request('industries') ? ($industrie->id == request('industries') ? 'selected' : '') : '' }}>
                                    {{ $industrie->title }}</option>
                                @endforeach
                            </select>
                            <select name="role" class="form-select me-2" onchange="$('.searfrm').submit();">
                                <option value="">Choose Role</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ request('role') ? ($role->id == request('role') ? 'selected' : '') : '' }}>
                                    {{ $role->title }}</option>
                                @endforeach
                            </select>
                            <select name="language" class="form-select me-2" onchange="$('.searfrm').submit();">
                                <option value="">Choose Languages</option>
                                @foreach ($languages as $language)
                                <option value="{{ $language->id }}"
                                    {{ request('language') ? ($language->id == request('language') ? 'selected' : '') : '' }}>
                                    {{ $language->title }}</option>
                                @endforeach
                            </select>
                            <input type="search" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search Here...">
                            <button class="btn btn-dark ms-2"><i class="fa fa-search"></i></button>
                            <a href="{{ url()->current() }}" class="btn btn-dark ms-2"><i class="fa fa-refresh"></i></a>
                            <a href="{{ url()->current() }}" class="btn btn-dark ms-2"><i class="fa fa-refresh"></i></a>
                                <span class="ms-2"><a href="{{url('/control-panel/expert-export')}}" class="btn text-white" style="background-color: #0c233b;"><i class="fa fa-download" aria-hidden="true" style="color: white;"></i></a></span>
                        </form>

                    </div><!-- card-header -->

                    <div class="card-body justify-content-between align-items-center">

                        @if ($lists->count() == 0)
                        <x-admin.no-data-box />
                        @endif

                        @if ($lists->count() > 0)
                        <form method="POST" class="table-wrapper">
                            @csrf
                            <table id="myTable" class="table  table-bordered table-colored table-dark">

                                <thead>

                                    <tr>

                                        <th class="wd-5p">
                                            <label class="ckbox ckbox-success mb-0"><input type="checkbox"
                                                    id="checkall"><span></span></label>

                                        </th>

                                        <th onclick="sortTable(0)">Date</th>
                                        <th onclick="sortTable(1)">Information</th>
                                        <th>Other Info</th>
                                        <th onclick="sortTable(2)">Sequence</th>
                                        <th>Top / Home</th>
                                        <th>Approved</th>
                                        <th class="wd-5p">
                                            <div class="dropdown TAction show">

                                                <a href="#" class="nav-link p-0 w-auto text-white text-center"
                                                    data-toggle="dropdown" aria-expanded="true"><i
                                                        class="fa fa-ellipsis-v"></i></a>

                                                <ul class="dropdown-menu" x-placement="bottom-end">

                                                    <li class="sequenceform"><a href="javascript:void(0)"><i
                                                                class="fa fa-sitemap"></i> Update Sequence</a>
                                                    </li>

                                                    <li class="bulkremoveform"><a href="javascript:void(0)"
                                                            class="text-danger"><i class="fa fa-trash"></i> Bulk
                                                            Remove</a></li>

                                                </ul>

                                            </div>
                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($lists as $list)
                                    <tr>

                                        <td>

                                            <label class="ckbox ckbox-dark">

                                                <input type="checkbox" class="listcheck" name="check[]"
                                                    value="{{ $list->id }}">

                                                <span></span>

                                            </label>
                                        </td>

                                        <td>
                                            <small><b>DATE :</b>
                                                {{ datetimeformat($list->created_at) }}</small><br>
                                            <small><b>Expert Id :</b> {{ $list->user_id }}</small><br>
                                            <small><b>Last login :</b>
                                                {{ datetimeformat($list->last_login) }}</small><br>
                                            @if ($list->profile_complete == 0)
                                            <small style="font-size: 11px;" class="text-danger"><b>Profile
                                                    Not Completed</b></small><br>
                                            @endif
                                            {!! trackregistraionstep($list->registration_step) !!}
                                        </td>
                                        <td>
                                            <small><b>Name :</b> {{ $list->name }}</small><br>
                                            <small><b>Email :</b> {{ $list->email }}</small><br>
                                            <small><b>Mobile :</b> {{ $list->mobile }}</small><br>
                                            <small><b>Wallet :</b> ₹ {{ $list->wallet }}</small><br>
                                        </td>
                                        <td>
                                            <small><b>Session In Week :</b>
                                                {{ $list->take_session ?? '-----' }} </small><br>
                                            <small><b>Charges (Pr. Hour) :</b> ₹ {{ $list->charge ?? '0' }}
                                            </small><br>
                                            <small><b>Service Charges :</b>
                                                {{ $list->service_charges ?? 0 }}%</small><br>
                                        </td>
                                        <td><input type="text" class="form-control" style="width: 80px;"
                                                name="sequence[{{ $list->id }}]" value="{{ $list->sequence }}"></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" @checked($list->top_expert)
                                                type="checkbox" value="{{ $list->id }}" role="switch"
                                                onclick="topexpertstatus(this.value)"
                                                id="ExpertSwitchCheckDefault{{ $list->id }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" @checked($list->is_publish)
                                                type="checkbox" value="{{ $list->id }}"
                                                role="switch" onclick="changestatus(this.value)"
                                                id="flexSwitchCheckDefault{{ $list->id }}">
                                            </div>
                                        </td>
                                        <td class="pd-r-0-force tx-center">

                                            <div class="dropdown TAction show">

                                                <a href="#" class="nav-link" data-toggle="dropdown"
                                                    aria-expanded="true"><i class="fa fa-ellipsis-v"></i></a>

                                                <ul class="dropdown-menu" x-placement="bottom-end">
                                                    <li><a
                                                            href="{{ route('admin.experts.edit', ['id' => $list->id]) }}"><i
                                                                class="fa fa-pencil"></i> Edit Information</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('admin.experts.information', ['page' => 'info', 'id' => $list->id]) }}"><i
                                                                class="fa fa-address-card"></i> View Information</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('admin.experts.videos', ['id' => $list->id]) }}"><i
                                                                class="fa fa-video-camera"></i> Introduction Video</a>
                                                    </li>
                                                    <li><a href="#slotcharges" data-slot-expert="{{ $list->id }}"
                                                            data-toggle="modal">
                                                            <i class="fa fa-calculator"></i> Slot Charges
                                                        </a>
                                                    </li>
                                                    <li><a href="#servicecharges" data-bs-expert="{{ $list->id }}"
                                                            data-bs-charges="{{ $list->service_charges }}"
                                                            data-toggle="modal"><i class="fa fa-calculator"></i>
                                                            Service Charges</a></li>
                                                    <li><a href="#manageTds" data-bs-expert="{{ $list->id }}"
                                                            data-bs-charges="{{ $list->service_charges }}"
                                                            data-toggle="modal"><i class="fa fa-calculator"></i>
                                                            Manage TDS</a></li>
                                                             <li><a href="{{url('control-panel/experts/manage-slots/'.$list->id)}}" ><i class="fa fa-calculator"></i>
                                                            Manage Slots</a></li>
                                                    <li><a href="#couponCode" data-bs-expert="{{ $list->id }}"
                                                            data-toggle="modal"><i class="fa fa-calculator"></i>
                                                            Coupon Code</a></li>
                                                    <li><a href="{{ route('admin.experts.remove', ['id' => $list->id]) }}"
                                                            class="text-danger" onclick="return RemoveRecord()"><i
                                                                class="fa fa-trash"></i> Remove Profile</a></li>

                                                </ul>

                                            </div>

                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            


                        </form>
                        @endif

                    </div><!-- card-body -->

                </div><!-- card -->

            </div><!-- col-4 -->

        </div><!-- row -->

    </div>

</div>
@endsection
@push('js')
<script src="{{ asset('admin/lib/parsleyjs/parsley.js') }}"></script>
<script>
function RemoveRecord() {
    if (confirm('Are you sure! you want to remove this qualification.')) {
        return true;
    }
    return false;
}
$('.sequenceform').on('click', function() {
    $('.table-wrapper').attr('action', @json(route('admin.experts.sequence')));
    $('.table-wrapper').submit();
});
$('.bulkremoveform').on('click', function() {
    $('.table-wrapper').attr('action', @json(route('admin.experts.bulkremove')));
    $('.table-wrapper').submit();
});

function changestatus(id) {
    let status = 0;
    if ($('#flexSwitchCheckDefault' + id).prop('checked') == true) {
        status = 1;
    }
    let url = @json(route('admin.experts.status'));
    databasestatuschange(url, status, id);
}

$(document).ready(function() {
  $('#myTable').DataTable({
    "paging": true, // Enable pagination
    "lengthChange": false, // Hide the page length options
    "searching": false, // Disable search functionality
    "ordering": true, // Enable sorting
    "info": true, // Show information about the table
    "autoWidth": false, // Disable automatic column width calculation
    // Add any other options or customization as needed
  });
});
function topexpertstatus(id) {
    let status = 0;
    if ($('#ExpertSwitchCheckDefault' + id).prop('checked') == true) {
        status = 1;
    }
    let url = @json(route('admin.experts.topstatus'));
    databasestatuschange(url, status, id);
}
$('[data-bs-type]').on('click', function() {
    let id = $(this).attr('data-bs-id');
    $('.modal-content').html(
        '<div class="text-center pd-20"><i class="fad fa-spinner-third fa-spin" style="font-size: 35px;"></i></div>'
    );
    $('.modal-content').load(@json(url('control-panel/cmsmodal')) + '/' + id);
});
$('[data-bs-expert]').on('click', function() {
    let id = $(this).attr('data-bs-expert');
    let charges = $(this).attr('data-bs-charges');
    $('input[name=expertid]').val(id);
    $('input[name=service_charges]').val(charges);
});
$('[data-slot-expert]').on('click', function() {
    let id = $(this).attr('data-slot-expert');
    $('.modal-content').html(
        '<div class="text-center pd-20"><i class="fad fa-spinner-third fa-spin" style="font-size: 35px;"></i></div>'
    );
    $('#cmsmodel').modal('show');
    $('.modal-content').load(@json(url('control-panel/expert-slot-charges')) + '/' + id);
});
</script>
<div id="cmsmodel" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="text-center pd-20"><i class="fad fa-spinner-third fa-spin" style="font-size: 35px;"></i>
            </div>
        </div>
    </div>
</div>
<div id="servicecharges" class="modal fade">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.experts.expertservicecharges') }}" class="modal-content bd-0 tx-14">
            @csrf
            <input type="hidden" name="expertid">
            <div class="modal-header justify-content-center">
                <h5 class="tx-gray-800 mb-0 tx-uppercase tx-semibold tx-13">Service Charges</h5>
            </div>
            <div class="modal-body">
                <small class="servicemdltl">Please enter your service charges (IN PERCENTAGE %) for this expert</small>
                <input type="text" name="service_charges" required id="servicecharges" class="form-control"
                    placeholder="Enter Service Charges">
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-dark">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<div id="manageTds" class="modal fade">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.experts.expertTdsharges') }}" class="modal-content bd-0 tx-14">
            @csrf
            <input type="hidden" name="expertid">
            <div class="modal-header justify-content-center">
                <h5 class="tx-gray-800 mb-0 tx-uppercase tx-semibold tx-13">TDS</h5>
            </div>
            <div class="modal-body">
                <small class="servicemdltl">Please enter TDS (IN PERCENTAGE %) for this expert</small>
                <input type="text" name="tds" required id="servicecharges" class="form-control" placeholder="Enter TDS">
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-dark">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<div id="couponCode" class="modal fade">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.experts.couponCode') }}" class="modal-content bd-0 tx-14">
            @csrf
            <input type="hidden" name="expertid">
            <div class="col-lg-12 form-group">
                <label>Coupon Name</label>
                <input type="text" class="form-control" name="coupon_title" placeholder="Enter Name" required>
            </div>
            <div class="col-lg-12 form-group">
                <label>Coupon Percentage (%)</label>
                <input type="text" class="form-control" name="percentage" onkeypress="return isNumberKey(event);"
                    placeholder="Percentage" required>
            </div>
            <div class="col-lg-12 form-group">
                <label>Start Date</label>
                <input type="date" class="form-control" placeholder="Select date" name="coupon_start">
            </div>
            <div class="col-lg-12 form-group">
                <label>End Date</label>
                <input type="date" class="form-control" placeholder="Select date" name="coupon_end">
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-dark">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">

<!-- JS -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script> -->
$(".form-select").chosen();
</script>

@endpush
@push('css')
<title>Experts : {{ project() }}</title>
<link href="{{ asset('admin/lib/SpinKit/spinkit.css') }}" rel="stylesheet">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css"> -->
@endpush