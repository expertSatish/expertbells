@extends('admin.layouts.app')
@section('content')
<div class="br-mainpanel">

    <div class="br-pageheader pd-y-15 pd-l-20">
    <div class="br-pagebody">

<div class="row row-sm mg-t-20">

    <div class="col-sm-12 mg-t-20 mg-sm-t-0">

        <div class="card shadow-base bd-0">
    <main>
        <section class="inner-banner">
            <div class="section">
                <div class="bg-white"></div>
            </div>
        </section>
        <section class="grey pt-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fal fa-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a aria-current="page">Availability Slots</a></li>
                </ol>
                <div class="row MainBoxAc">
                  
                    <div class="col-md-12">
                        <div class="pb-2 d-block d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h3 class="m-0 h4">Availability Slots</h3>
                            </div>
                           
                        </div>
                        <div>
                        <div class="row">
                        <div class="col-lg-7 px-2">
                            <div class="row mx-1" style="background-color: #0c233b; color: white;">
                                <div class="col-lg-3 text-center ms-3 py-1"><strong>Days</strong></div>
                                <div class="col-lg-3 text-center py-1"><strong>Start Time</strong></div>
                                <div class="col-lg-3 text-center py-1"><strong>End Time</strong></div>
                            </div>
                            <div class="card shadow-lg" style="background-color: #f3f3f3;">
                                <div class="card-body">
                                    <div class="container text-center">
                                        <div class="row p-1">
                                            <div class="form-check col-2">
                                                <input class="form-check-input" type="checkbox" value="Monday"
                                                    id="mondayCheckbox">
                                                <label class="form-check-label" for="mondayCheckbox">
                                                    Mon
                                                </label>
                                            </div>
                                            <div class="col-4">
                                              <input type="hidden" name="expert_id" id="expert_id" value="{{$id}}">
                                            <input type="time" class="form-control" name="from_time" id="from_time" placeholder="Time">
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="to_time" id="to_time" placeholder="Time">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn border rounded btn-sm px-2" style="background-color: #0c236b; color: white"
                                                    onclick="addField()" id="time1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                            <div class="row" id="selectedTimesContainer1"></div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="form-check col-2">
                                                <input class="form-check-input" type="checkbox" value="Tuesday"
                                                    id="tuesdayCheckbox">
                                                <label class="form-check-label" for="tuesdayCheckbox">
                                                    Tue
                                                </label>
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="from_time" id="from_time_tuesday" placeholder="Time">
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="to_time" id="to_time_tuesday" placeholder="Time">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn border rounded btn-sm px-2" style="background-color: #0c236b; color: white"
                                                    onclick="addFieldsTuesday()" id="time1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                            <div class="row" id="selectedTimesContainer2"></div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="form-check col-2">
                                                <input class="form-check-input" type="checkbox" value="Wednesday"
                                                    id="weednesdayCheckbox">
                                                <label class="form-check-label" for="weednesdayCheckbox">
                                                    Wed
                                                </label>
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="from_time" id="from_time_wednesday" placeholder="Time">
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="to_time" id="to_time_wednesday" placeholder="Time">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn border rounded btn-sm px-2" style="background-color: #0c236b; color: white"
                                                    onclick="addFieldsWednesday()" id="time1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                            <div class="row" id="selectedTimesContainer3"></div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="form-check col-2">
                                                <input class="form-check-input" type="checkbox" value="Thursday"
                                                    id="thursdayCheckbox">
                                                <label class="form-check-label" for="thursdayCheckbox">
                                                    Thu
                                                </label>
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="from_time" id="from_time_thursday" placeholder="Time">
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="to_time" id="to_time_thursday" placeholder="Time">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn border rounded btn-sm px-2" style="background-color: #0c236b; color: white"
                                                    onclick="addFieldsThursday()" id="time1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                            <div class="row" id="selectedTimesContainer4"></div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="form-check col-2">
                                                <input class="form-check-input" type="checkbox" value="Friday"
                                                    id="fridayCheckbox">
                                                <label class="form-check-label" for="fridayCheckbox">
                                                    Fri
                                                </label>
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="from_time" id="from_time_friday" placeholder="Time">
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="to_time" id="to_time_friday" placeholder="Time">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn border rounded btn-sm px-2" style="background-color: #0c236b; color: white"
                                                    onclick="addFieldsFriday()" id="time1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                            <div class="row" id="selectedTimesContainer5"></div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="form-check col-2">
                                                <input class="form-check-input" type="checkbox" value="Saturday"
                                                    id="saturdayCheckbox">
                                                <label class="form-check-label" for="saturdayCheckbox">
                                                    Sat
                                                </label>
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="from_time" id="from_time_saturday" placeholder="Time">
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="to_time" id="to_time_saturday" placeholder="Time">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn border rounded btn-sm px-2" style="background-color: #0c236b; color: white"
                                                    onclick="addFieldsSaturday()" id="time1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                            <div class="row" id="selectedTimesContainer6"></div>
                                        </div>
                                        <div class="row p-1">
                                            <div class="form-check col-2">
                                                <input class="form-check-input" type="checkbox" value="Sunday"
                                                    id="sundayCheckbox">
                                                <label class="form-check-label" for="sundayCheckbox">
                                                    Sun
                                                </label>
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="from_time" id="from_time_sunday" placeholder="Time">
                                            </div>
                                            <div class="col-4">
                                            <input type="time" class="form-control" name="to_time" id="to_time_sunday" placeholder="Time">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn border rounded btn-sm px-2" style="background-color: #0c236b; color: white"
                                                    onclick="addFieldsSunday()" id="time1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                            <div class="row" id="selectedTimesContainer7"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5">
    <div class="card shadow-lg" style="background-color: #f3f3f3;">
        <div class="card-body">
    <div class="container p-3">
      <span class="fs-5"><strong>Block dates</strong></span>
      <div>
        Add dates on which you are unavailable to take calls.
      </div>
      <div class="mt-3">
        <button class="btn col-12" id="openDatepickerBtn" style="background-color: #0c233b; color: white;">Add unavailable dates</button>
      </div>
      <div class="mt-3" id="selectedDatesContainer"></div>
    </div>
</div>  
</div>
</div>  
                    </div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </div>
</div>

@endsection
@push('css')
<title>Manage Slots : {{ project() }}</title>
<meta name="description" content="Welcome to Expert Bells">
<meta name="keywords" content="Welcome to Expert Bells">
<link rel="stylesheet" href="{{ asset('frontend/css/account.css') }}">
<style>
.slick-track{display:flex!important}
.owl-nav{top:20px;bottom:auto!important}
.owl-nav button.owl-prev{left:0!important}
.owl-nav button.owl-next{right:0!important}
.owl-nav button.owl-next,.owl-nav button.owl-prev{width:24px!important;height:36px!important;margin:0!important}
.DateS{border-bottom:1px solid rgb(var(--blackrgb)/.1);border-top:1px solid rgb(var(--blackrgb)/.1);border-left:1px solid rgb(var(--blackrgb)/.1);margin-bottom:9px;padding-bottom:6px;/*margin-top:9px;*/padding-top:6px;font-size:13px;color:rgb(var(--blackrgb)/.5);background:rgb(var(--blackrgb)/.05)}
.DateS>span{margin:0;color:var(--black)}
.UserBox>div{align-items:start}
.SlotingDate{align-items:flex-start!important;overflow:hidden;display:flex}
.SlotingDate div.sitem{min-width:14.285%}
.SlotingDate div.sitem.no-drop{opacity:.6}
.SlotingDate div.sitem.no-drop ul li a,.SlotingDate div.sitem.no-drop ul li>span{cursor:not-allowed;pointer-events:none}
.SlotingDate ul{margin:0 auto;padding:0;width:calc(100% - 30px)}
.SlotingDate ul li{margin-bottom:6px;position:relative}
.SlotingDate ul li>a,.SlotingDate ul li>span{background:rgb(var(--thmrgb3)/.05);border:1px solid rgb(var(--thmrgb3)/.1);padding:2px 6px;border-radius:3px;display:inline-block;font-size:13px;cursor:pointer;width:100%;line-height:150%;font-weight:600}
.SlotingDate ul li>a>span,.SlotingDate ul li>span>span{display:block;color:rgb(var(--blackrgb)/.6);font-weight:400;font-size:11px}
.SlotingDate ul li.book>a,.SlotingDate ul li.book>span{background:none;border-color:#ffc107!important;cursor:inherit}
.SlotingDate ul li button{background:var(--thm) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") no-repeat 4px center/7px auto;border:none;height:15px;width:15px;border-radius:50%;position:absolute;top:-4px;right:-4px;opacity:0;transition:all .5s}
.SlotingDate ul li:hover button{opacity:1}
.EditSlots .SlotingDate ul li:last-child>a,.EditSlots .SlotingDate ul li:last-child>span{background:var(--thm);color:var(--white)}
.SlotingDate>button.slick-arrow{border:none;border-radius:0 5px 5px 0;cursor:pointer;width:24px!important;height:36px!important;margin:0!important;opacity:.6;display:flex;align-items:center;justify-content:center;position:absolute;color:var(--black)!important;background:var(--white)!important;top:20px;left:0;box-shadow:3px 0 5px rgb(var(--blackrgb)/.2);z-index:1;transition:all .5s}
.SlotingDate>button.slick-arrow.owl-next{right:0;left:auto;border-radius:5px 0 0 5px;box-shadow:-3px 0 5px rgb(var(--blackrgb)/.2)}
.SlotingDate>button.slick-arrow:hover{background:var(--thm)!important;color:var(--white)!important;opacity:1}
.SlotingDate ul li button,.SlotingDate ul li>span+a{background:var(--thm) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") no-repeat 4px center/7px auto;border:none;height:15px;width:15px;border-radius:50%;position:absolute;top:-4px;right:-4px;opacity:0;z-index:9;transition:all .5s}
.SlotingDate ul li:hover button,.SlotingDate ul li:hover>span+a{opacity:1}
.Edit{position:absolute;height:100%;width:100%;left:0;top:0;z-index:2;background:rgb(var(--thmrgb)/.5);opacity:0}
.SlotingDate ul li:hover>span .Edit{opacity:1}
#AddTime .form-select,.TimeBoxIn input{border-radius:1.5rem;padding:.6rem .75rem;font-size:15px}
.TimeBoxIn{flex-wrap:nowrap!important}
.TimeBoxIn>*{width:50%}
.TimeBoxIn>span:first-child input{border-right:none!important;border-radius:1.5rem 0 0 1.5rem}
.TimeBoxIn>span:last-child input{border-radius:0 1.5rem 1.5rem 0}
.slick-track{margin-left:0!important}
.no-drop{cursor:not-allowed}
.datepicker {
  width: auto; /* Adjust the width as needed */
  border: none;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  font-family: Arial, sans-serif;
}

.datepicker table {
  width: 100%;
  border-collapse: collapse;
}

.datepicker table th,
.datepicker table td {
  text-align: center;
  padding: 10px;
}

.datepicker table td {
  cursor: pointer;
}

.datepicker .datepicker-days tbody span {
  display: inline-block;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 50%;
}

.datepicker-container .datepicker .datepicker-days tbody .active {
  border-radius: 50%;
  background-color: #333;
  color: #fff;
}


.datepicker .datepicker-days tbody span:hover {
  background-color: #383e44;
  color: #fff;
}

.datepicker .datepicker-days tbody .disabled {
  color: #ccc;
  cursor: not-allowed;
}

.datepicker-container {
  display: inline-block;
  position: relative;
}

.datepicker-container .datepicker {
  position: absolute;
  top: 40px;
  left: 0;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 10px;
  z-index: 9999;
}

/* Additional styles for selected date */
.datepicker-container .datepicker .datepicker-days tbody .selected {
  background-color: #007bff;
  color: #fff;
}

.datepicker-container .datepicker .datepicker-days tbody .selected:hover {
  background-color: #007bff;
  color: #fff;
}

/* Date Picker */
.fas
{
    color: #0c233b;
}
.fa{
    color: #ffffff;
}

@media (max-width:450px){.form-select{background-position:right .3rem center;padding:.25rem 1.1rem .25rem .4rem;background-size:10px;font-size:14px}}
@media (max-width:350px){.form-select{font-size:13px}}
</style>
@endpush
@push('js')
        <script>

$(document).ready(function() {
  // Check if data exists in the database
  // Assuming you have a variable named 'dataExists' indicating the presence of data
  var dataExists = true; // Set it to 'true' if data exists, or 'false' if not
  var expert_id = document.getElementById("expert_id").value;
  if (dataExists) {
    // Check the checkbox
    $("#tuesdayCheckbox").prop("checked", true);

    // Get the data from the database
    $.ajax({
      url: "/control-panel/experts/slot-getTuesday/" + expert_id,
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if(availability.length){
          $("#tuesdayCheckbox").prop("checked", true);
        }
        else{
          $("#tuesdayCheckbox").prop("checked", false);
        }
        // Clear the existing data
        $("#selectedTimesContainer2").empty();
        // Display the data
        availability.forEach(function(slot) {
            console.log(slot);
          // Access individual slot properties and append them to the container
          $("#selectedTimesContainer2").append('<div class="col-sm-2 p-2 me-2"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.from_time + '" placeholder="Time"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.to_time + '" placeholder="Time"></div><div class="col-sm-1"><i class="fas fa-trash-alt ps-3 pt-3" onclick="deleteData(' + slot.id + ')" style="color:#0c236b" aria-hidden="true"></i></div>');
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }
});
$(document).ready(function() {
  var dataExists = true; 
  var expert_id = document.getElementById("expert_id").value;
  if (dataExists) {
    // Check the checkbox
    $("#mondayCheckbox").prop("checked", true);

    // Get the data from the database
    $.ajax({
      url: "/control-panel/experts/slot-get/" + expert_id,
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if(availability.length){
          $("#mondayCheckbox").prop("checked", true);
        }
        else{
          $("#mondayCheckbox").prop("checked", false);
        }
        // Clear the existing data
        $("#selectedTimesContainer1").empty();
        
        // Display the data
        availability.forEach(function(slot) {
            console.log(slot);
          // Access individual slot properties and append them to the container
          $("#selectedTimesContainer1").append('<div class="col-sm-2 p-2 me-2"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.from_time + '" placeholder="Time"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.to_time + '" placeholder="Time"></div><div class="col-sm-1"><i class="fas fa-trash-alt ps-3 pt-3" onclick="deleteData(' + slot.id + ')" style="color:#0c236b" aria-hidden="true"></i></div>');
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }
});

$(document).ready(function() {
  // Check if data exists in the database
  // Assuming you have a variable named 'dataExists' indicating the presence of data
  var dataExists = true; // Set it to 'true' if data exists, or 'false' if not
  var expert_id = document.getElementById("expert_id").value;

  if (dataExists) {
    // Check the checkbox
    $("#weednesdayCheckbox").prop("checked", true);

    // Get the data from the database
    $.ajax({
      url: "/control-panel/experts/slot-wednesdayget/" + expert_id ,
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if(availability.length){
          $("#weednesdayCheckbox").prop("checked", true);
        }
        else{
          $("#weednesdayCheckbox").prop("checked", false);
        }
        // Clear the existing data
        $("#selectedTimesContainer3").empty();
        
        // Display the data
        availability.forEach(function(slot) {
            console.log(slot);
          // Access individual slot properties and append them to the container
          $("#selectedTimesContainer3").append('<div class="col-sm-2 p-2 me-2"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.from_time + '" placeholder="Time"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.to_time + '" placeholder="Time"></div><div class="col-sm-1"><i class="fas fa-trash-alt ps-3 pt-3" onclick="deleteData(' + slot.id + ')" style="color:#0c236b" aria-hidden="true"></i></div>');
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }
});
$(document).ready(function() {
  var dataExists = true; 
  var expert_id = document.getElementById("expert_id").value;
  if (dataExists) {
    // Check the checkbox
    $("#thursdayCheckbox").prop("checked", true);

    // Get the data from the database
    $.ajax({
      url: "/control-panel/experts/slot-thursdayget/" + expert_id,
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if(availability.length){
          $("#thursdayCheckbox").prop("checked", true);
        }
        else{
          $("#thursdayCheckbox").prop("checked", false);
        }
        // Clear the existing data
        $("#selectedTimesContainer4").empty();
        
        // Display the data
        availability.forEach(function(slot) {
            console.log(slot);
          // Access individual slot properties and append them to the container
          $("#selectedTimesContainer4").append('<div class="col-sm-2 p-2 me-2"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.from_time + '" placeholder="Time"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.to_time + '" placeholder="Time"></div><div class="col-sm-1"><i class="fas fa-trash-alt ps-3 pt-3" onclick="deleteData(' + slot.id + ')" style="color:#0c236b" aria-hidden="true"></i></div>');
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }
});
$(document).ready(function() {
  var dataExists = true; 
  var expert_id = document.getElementById("expert_id").value;

  if (dataExists) {
    // Check the checkbox
    $("#fridayCheckbox").prop("checked", true);

    // Get the data from the database
    $.ajax({
      url: "/control-panel/experts/slot-fridayget/" +expert_id,
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if(availability.length){
          $("#fridayCheckbox").prop("checked", true);
        }
        else{
          $("#fridayCheckbox").prop("checked", false);
        }
        // Clear the existing data
        $("#selectedTimesContainer5").empty();
        
        // Display the data
        availability.forEach(function(slot) {
            console.log(slot);
          // Access individual slot properties and append them to the container
          $("#selectedTimesContainer5").append('<div class="col-sm-2 p-2 me-2"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.from_time + '" placeholder="Time"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.to_time + '" placeholder="Time"></div><div class="col-sm-1"><i class="fas fa-trash-alt ps-3 pt-3" onclick="deleteData(' + slot.id + ')" style="color:#0c236b" aria-hidden="true"></i></div>');
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }
});
$(document).ready(function() {
  var dataExists = true; 
  var expert_id = document.getElementById("expert_id").value;

  if (dataExists) {
    // Check the checkbox
    $("#saturdayCheckbox").prop("checked", true);

    // Get the data from the database
    $.ajax({
      url: "/control-panel/experts/slot-saturdayget/" + expert_id,
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if(availability.length){
          $("#saturdayCheckbox").prop("checked", true);
        }
        else{
          $("#saturdayCheckbox").prop("checked", false);
        }
        // Clear the existing data
        $("#selectedTimesContainer6").empty();
        
        // Display the data
        availability.forEach(function(slot) {
            console.log(slot);
          // Access individual slot properties and append them to the container
          $("#selectedTimesContainer6").append('<div class="col-sm-2 p-2 me-2"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.from_time + '" placeholder="Time"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.to_time + '" placeholder="Time"></div><div class="col-sm-1"><i class="fas fa-trash-alt ps-3 pt-3" onclick="deleteData(' + slot.id + ')" style="color:#0c236b" aria-hidden="true"></i></div>');
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }
});
$(document).ready(function() {
 
  var dataExists = true; 
  var expert_id = document.getElementById("expert_id").value;


  if (dataExists) {
    // Check the checkbox
    $("#sundayCheckbox").prop("checked", true);

    // Get the data from the database
    $.ajax({
      url: "/control-panel/experts/slot-sundayget/" +expert_id,
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if(availability.length){
          $("#sundayCheckbox").prop("checked", true);
        }
        else{
          $("#sundayCheckbox").prop("checked", false);
        }
        // Clear the existing data
        $("#selectedTimesContainer7").empty();
        
        // Display the data
        availability.forEach(function(slot) {
            console.log(slot);
          // Access individual slot properties and append them to the container
          $("#selectedTimesContainer7").append('<div class="col-sm-2 p-2 me-2"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.from_time + '" placeholder="Time"></div><div class="col-sm-4 p-2 me-2"><input type="time" class="form-control" value="' + slot.to_time + '" placeholder="Time"></div><div class="col-sm-1"><i class="fas fa-trash-alt ps-3 pt-3" onclick="deleteData(' + slot.id + ')" style="color:#0c236b" aria-hidden="true"></i></div>');
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }
});


function deleteData(id) {
    var id = id;
    
  $.ajax({
    url: '/control-panel/experts/slots-delete/' + id,
    type: 'POST',
    data: {
        _token: "{{ csrf_token() }}",
        id: id,
    },
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    success: function(response) {
      // Handle success response
      console.log('Data deleted successfully');
      location.reload();
    },
    error: function(xhr, status, error) {
    console.log('Error deleting data:');
    console.log(xhr);
    console.log(status);
    console.log(error);
    }
  });
}

function addField() {
    var mondayCheckbox = document.getElementById("mondayCheckbox").value;
    var from_time = document.getElementById("from_time").value;
    var to_time = document.getElementById("to_time").value;
    var expert_id = document.getElementById("expert_id").value;

    $.ajax({
    url: "/control-panel/experts/slot-store",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        mondayCheckbox: mondayCheckbox,
        from_time: from_time,
        to_time: to_time,
        expert_id: expert_id,
    },
    success: function(response) {
        // Assuming the checkbox has the ID "myCheckbox"
        console.log(response.availability);
        location.reload();
    },
    error: function(error) {
        console.error("An error occurred while storing data");

        // Show "Unavailable" in case of an error
    }
    });
}


function addFieldsTuesday() {
    var tuesdayCheckbox = document.getElementById("tuesdayCheckbox").value;
    var from_time_tuesday = document.getElementById("from_time_tuesday").value;
    var to_time_tuesday = document.getElementById("to_time_tuesday").value;
    var expert_id = document.getElementById("expert_id").value;

    $.ajax({
    url: "/control-panel/experts/slotTuesday-store",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        tuesdayCheckbox: tuesdayCheckbox,
        from_time_tuesday: from_time_tuesday,
        to_time_tuesday: to_time_tuesday,
        expert_id: expert_id,
    },
    success: function(response) {
        // Assuming the checkbox has the ID "myCheckbox"
        console.log(response.availability);
        location.reload();
        console.log('hello');
    },
    error: function(error) {
        console.error("An error occurred while storing data");

        // Show "Unavailable" in case of an error
    }
    });
}

function addFieldsWednesday() {
    var weednesdayCheckbox = document.getElementById("weednesdayCheckbox").value;
    var from_time_wednesday = document.getElementById("from_time_wednesday").value;
    var to_time_wednesday = document.getElementById("to_time_wednesday").value;
    var expert_id = document.getElementById("expert_id").value;

    $.ajax({
    url: "/control-panel/experts/slotWednesday-store",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        weednesdayCheckbox: weednesdayCheckbox,
        from_time_wednesday: from_time_wednesday,
        to_time_wednesday: to_time_wednesday,
        expert_id: expert_id,
    },
    success: function(response) {
        // Assuming the checkbox has the ID "myCheckbox"
        console.log(response.availability);
        location.reload();
        console.log('hello');
    },
    error: function(error) {
        console.error("An error occurred while storing data");

        // Show "Unavailable" in case of an error
    }
    });
}
function addFieldsThursday() {
    var thursdayCheckbox = document.getElementById("thursdayCheckbox").value;
    var from_time_thursday = document.getElementById("from_time_thursday").value;
    var to_time_thursday = document.getElementById("to_time_thursday").value;
    var expert_id = document.getElementById("expert_id").value;

    $.ajax({
    url: "/control-panel/experts/slotThursday-store",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        thursdayCheckbox: thursdayCheckbox,
        from_time_thursday: from_time_thursday,
        to_time_thursday: to_time_thursday,
        expert_id: expert_id
    },
    success: function(response) {
        // Assuming the checkbox has the ID "myCheckbox"
        console.log(response.availability);
        location.reload();
        console.log('hello');
    },
    error: function(error) {
        console.error("An error occurred while storing data");

        // Show "Unavailable" in case of an error
    }
    });
}
function addFieldsFriday() {
    var fridayCheckbox = document.getElementById("fridayCheckbox").value;
    var from_time_friday = document.getElementById("from_time_friday").value;
    var to_time_friday = document.getElementById("to_time_friday").value;
    var expert_id = document.getElementById("expert_id").value;

    $.ajax({
    url: "/control-panel/experts/slotFriday-store",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        fridayCheckbox: fridayCheckbox,
        from_time_friday: from_time_friday,
        to_time_friday: to_time_friday,
        expert_id:expert_id
    },
    success: function(response) {
        // Assuming the checkbox has the ID "myCheckbox"
        console.log(response.availability);
        location.reload();
        console.log('hello');
    },
    error: function(error) {
        console.error("An error occurred while storing data");

        // Show "Unavailable" in case of an error
    }
    });
}
function addFieldsSaturday() {
    var saturdayCheckbox = document.getElementById("saturdayCheckbox").value;
    var from_time_saturday = document.getElementById("from_time_saturday").value;
    var to_time_saturday = document.getElementById("to_time_saturday").value;
    var expert_id = document.getElementById("expert_id").value;
    console.log(expert_id);

    $.ajax({
    url: "/control-panel/experts/slotsaturday-store",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        saturdayCheckbox: saturdayCheckbox,
        from_time_saturday: from_time_saturday,
        to_time_saturday: to_time_saturday,
        expert_id: expert_id,
    },
    success: function(response) {
        // Assuming the checkbox has the ID "myCheckbox"
        console.log(response.availability);
        location.reload();
    },
    error: function(error) {
        console.error("An error occurred while storing data");

        // Show "Unavailable" in case of an error
    }
    });
}
function addFieldsSunday() {
    var sundayCheckbox = document.getElementById("sundayCheckbox").value;
    var from_time_sunday = document.getElementById("from_time_sunday").value;
    var to_time_sunday = document.getElementById("to_time_sunday").value;
    var expert_id = document.getElementById("expert_id").value;

    $.ajax({
    url: "/control-panel/experts/slotsunday-store",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        sundayCheckbox: sundayCheckbox,
        from_time_sunday: from_time_sunday,
        to_time_sunday: to_time_sunday,
        expert_id: expert_id,
    },
    success: function(response) {
        // Assuming the checkbox has the ID "myCheckbox"
        console.log(response.availability);
        location.reload();
    },
    error: function(error) {
        console.error("An error occurred while storing data");

        // Show "Unavailable" in case of an error
    }
    });
}

</script>
    <script>

        
$('#openDatepickerBtn').click(function() {
var buttonOffset = $(this).offset();
var buttonHeight = $(this).outerHeight();
$('#datepickerInput').datepicker('show');
$('.datepicker').css({
  'top': buttonOffset.top + buttonHeight,
  'left': buttonOffset.left
});
});

$('<input>').attr({
type: 'text',
id: 'datepickerInput',
readonly: 'readonly'
}).hide().appendTo('body');

$(window).on('load', function() {
  var expert_id = document.getElementById("expert_id").value;
    $.ajax({
      url: "/control-panel/experts/getBlock-Dates/" +expert_id,
      type: "GET",
      success: function(response) {
        // Assuming the response blockDate the data you want to display
        var blockDate = response.blockDate; // Update the property name here

        // Display the data
        blockDate.forEach(function(date) {
          console.log(date);
        // $('#selectedDatesContainer').append('<div>'+date.date+'</div>');
        var selectedDateDiv = $('<div>').addClass('border rounded text-center row m-2');
        var dateText = $('<span>').text(date.date).addClass('col-5 p-2').css('font-size', '14px');
        var unavailableText = $('<span>').text('unavailable').addClass('col-5 p-2');
        var deleteButton = $('<button onclick="blockDateRemove(\'' + date.date + '\')">').addClass('btn btn-link delete-button col-2');
        var deleteIcon = $('<i>').addClass('fas fa-trash-alt');
        deleteButton.append(deleteIcon);
        selectedDateDiv.append(dateText, unavailableText, deleteButton);
        $('#selectedDatesContainer').append(selectedDateDiv);
                });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  // Your code here
  // This code will execute when the window finishes loading
  // You can place your existing code or additional code here
  // ...
});

function blockDateRemove(date)
{
    var date = date;
    var expert_id = document.getElementById("expert_id").value;
    $.ajax({
      url: '/control-panel/experts/remove-blockDate/' + date,
      type: 'POST',
      data: {
          _token: "{{ csrf_token() }}",
          date: date,
          expert_id: expert_id,
      },
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      success: function(response) {
        // Handle success response
        console.log('Data deleted successfully');
        location.reload();
      },
      error: function(xhr, status, error) {
      console.log('Error deleting data:');
      console.log(xhr);
      console.log(status);
      console.log(error);
      }
    });
}


$(document).ready(function() {
var datePickerOptions = {
format: 'dd MM yyyy',
autoclose: true,
todayHighlight: true
};

var selectedDates = [];
// var selectDate=null;

$('#datepickerInput').datepicker(datePickerOptions).on('changeDate', function(e) {
  var selectedDate = formatDate(e.date);
  var expert_id = document.getElementById("expert_id").value;
  $.ajax({
    url: '/control-panel/experts/slots-block/' + selectedDate,
    type: 'POST',
    data: {
      _token: "{{ csrf_token() }}",
      selectedDate: selectedDate,
      expert_id: expert_id
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

         GetBlockDates(selectedDate)
    }
  });
  
});
  // Check if data exists in the database
  // Assuming you have a variable named 'dataExists' indicating the presence of data
 

function GetBlockDates(selectedDate)
{
    if (selectedDates.includes(selectedDate)) {
    return; // Date already selected, do not proceed
  }
    selectedDates.push(selectedDate);

var selectedDateDiv = $('<div>').addClass('border rounded text-center row m-2');
var dateText = $('<span>').text(selectedDate).addClass('col-5 p-2').css('font-size', '14px');
var unavailableText = $('<span>').text('unavailable').addClass('col-5 p-2');
var deleteButton = $('<button onclick="blockDate(\'' + selectedDate + '\')">').addClass('btn btn-link delete-button col-2');
var deleteIcon = $('<i>').addClass('fas fa-trash-alt');
deleteButton.append(deleteIcon);
selectedDateDiv.append(dateText, unavailableText, deleteButton);
$('#selectedDatesContainer').append(selectedDateDiv);

deleteButton.click(function() {
  var index = selectedDates.indexOf(selectedDate);
  if (index > -1) {
    selectedDates.splice(index, 1);
  }
  selectedDateDiv.remove();
  enableDate(selectedDate);
});
dateText.addClass('fw-bold'); // Add the CSS class for bold font
$(this).datepicker('hide'); // Hide the date picker

disableDate(selectedDate);
    
}   


  





function formatDate(date) {
  var year = date.getFullYear();
  var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Adding 1 to month since it is zero-based
  var day = date.getDate().toString().padStart(2, '0');
  return year + '-' + month + '-' + day;
}



// function formatDate(date) {
// var day = date.getDate().toString().padStart(2, '0');
// var month = date.toLocaleString('default', { month: 'long' });
// var year = date.getFullYear();
// return day + ' ' + month + ' ' + year;
// }

function disableDate(date) {
var formattedDate = $.datepicker.formatDate(datePickerOptions.format, new Date(date));
$('#datepickerInput').datepicker('setDate', null);
$('td[data-date="' + formattedDate + '"]').addClass('disabled fw-bold');
}

function enableDate(date) {
var formattedDate = $.datepicker.formatDate(datePickerOptions.format, new Date(date));
$('td[data-date="' + formattedDate + '"]').removeClass('disabled').removeClass('text-muted');
}
}); 
        
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endpush