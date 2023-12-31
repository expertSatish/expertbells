@include('control-panel.inc.header')

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      @include('control-panel.inc.side-menu')

      <div class="right_col" role="main">
        <div class="row">
          @if(session()->has('success_msg')) <?php echo Helper::SuccessAlert(session()->get('success_msg')); ?> @endif
          @if(session()->has('error_msg')) <?php echo Helper::ErrorAlert(session()->get('error_msg')); ?> @endif

        </div>

        <div class="row">
          <!--------------------table data start-------------------------->
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Consultancy Enquiry Management</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered bulk_action">
                  <thead>
                    <tr>
                      <th>Sr.No. </th>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Message</th>
                      <th>From</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($enquiry as $i)
                    <tr>
                      <td> {{ $loop->iteration }} </td>
                      <td>{{date('d M Y, H:i A',strtotime($i->created_at))}}</td>
                      <td> {{ $i->name }} </td>
                      <td> {{ $i->email }}</td>
                      <td> {{ $i->phone }}</td>
                      <td> {{ $i->message }}</td>
                      <td> {{ $i->from_page }}</td>
                      <td>
                        <a href="{{url('/control-panel/consultancy-enquiry-delete/'.$i->consultancy_enquiry_id)}}" onclick="return confirm('Are you sure? Want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>
          <!--------------------table data end-------------------------->
        </div>
      </div>


      <footer> @include('control-panel.inc.footer') </footer>