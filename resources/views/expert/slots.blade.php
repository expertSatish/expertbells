@extends('layouts.app')
@section('content')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
  .form-control {
    font-size: small;
  }

  tr {
    background-color: white;
    color: #0c233b;
  }

  td {
    padding-bottom: 10px;
  }
</style>
<main class="grey">
  <div class="container">
    <section class="inner-banner">
      <div class="section">
        <div class="bg-white"></div>
      </div>
    </section>
    <section class="grey pt-3">
      <div class="m-2 p-1">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fal fa-home-alt"></i></a></li>
          <li class="breadcrumb-item"><a aria-current="page">Availability Slots</a></li>
        </ol>
        <div class="row MainBoxAc">
          <div class="col-md-3">
            <div class="position-sticky top-0">
              <x-expert.left-bar />
            </div>
          </div>
          <div class="col-md-9">
            <div class="pb-2 d-block d-flex justify-content-between align-items-center mb-2">


            </div>
            <div>
              <div class="row">
                <div class="col-xl-8 px-2" id="refreshdiv">
                  <div class=" rounded shadow" style="background-color: #0c233b; color: white">
                    <form action="{{ url('expert/store-input_fields') }}" method="POST">
                      <div class="row pb-3">
                        <div class="col-8">
                          <h3 class="m-0 h4 p-3 pb-0 ">Availability Slots</h3>
                        </div>
                        <div class="col-3 pt-3 d-flex justify-content-end p-2 pb-0">
                          <button type="submit" class="btn btn-success btn-block">Save</button>
                        </div>
                      </div>
                      @csrf
                      <div class="p-3" style="font-size: small; background-color: white; color: #0c233b">
                        <table class="table-responsive" id="dynamicAddRemove" style="width: 100%;">
                          <tr>
                            <th style="padding-bottom: 10px;">Day</th>
                            <th style="padding-bottom: 10px;">From Time</th>
                            <th style="padding-bottom: 10px;">To Time</th>
                            <th style="padding-bottom: 10px;">Action</th>
                          </tr>
                          @if(!(isset($availabilityMonday[0])))
                          <tr style="border-top: 1px solid rgba(128, 128, 128, 0.5);">
                            <td style="padding-top:15px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Monday" id="mondayCheckbox" onchange="handleCheckboxChange(this,1)">
                              <label class="form-check-label" for="mondayCheckbox"> Mon </label>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker1" style="display: none;">
                                <select class="border rounded p-2" id="select1" name="addMoreInputFields[Monday][0][from_time]">
                                  <option selected disabled value="">from</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable1"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker2" style="display: none;">
                                <select class="border rounded p-2" id="select2" name="addMoreInputFields[Monday][0][to_time]">
                                  <option selected disabled value="">to</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable2"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time1" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @else
                          @foreach($availabilityMonday ?? [] as $index => $res)
                          @if($index!=0)
                          <tr class="availability-row1" style="display: none;" id="remove-{{$res->id}}">
                            <td>
                              <label></label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <button type="button" onclick="deleteConfirmation({{$res->id}})" class="btn remove-input {{$res->id}}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                          </tr>
                          @else
                          <tr class="availability-row1" style="display: none;" id="remove-{{$res->id}}">
                          <td style="padding-top:15px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Monday" id="mondayCheckbox" onchange="handleCheckboxChange(this,1)">
                              <label class="form-check-label" for="mondayCheckbox"> Mon </label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time8" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @endif
                          @endforeach
@endif
                          <tr style="border-top: 1px solid rgba(128, 128, 128, 0.5);">
                            <td style="padding-top:10px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Tuesday" id="tuesdayCheckbox" onchange="handleCheckboxChange(this,2)">
                              <label class="form-check-label" for="tuesdayCheckbox"> Tue
                              </label>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker3" disabled style="display: none;">
                                <select class="border rounded p-2" id="select3" name="addMoreInputFields[Tuesday][0][from_time]">
                                  <option selected disabled value="">from</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable3"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker4" disabled style="display: none;">
                                <select class="border rounded p-2" id="select4" name="addMoreInputFields[Tuesday][0][to_time]">
                                  <option selected disabled value="">to</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable4"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time2" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @foreach($availabilityTuesday ?? [] as $index => $res)
                          <tr class="availability-row2" style="display: none;" id="remove-{{$res->id}}">
                            <td>
                              <label>

                              </label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <button type="button" onclick="deleteConfirmation({{$res->id}})" class="btn  remove-input {{$res->id}}"><i class="fas fa-trash-alt "></i></button>
                            </td>
                            </td>
                          </tr>

                          @endforeach
                          <tr style="border-top: 1px solid rgba(128, 128, 128, 0.5);;">
                            <td style="padding-top:10px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Wednesday" id="wednesdayCheckbox" onchange="handleCheckboxChange(this,3)">
                              <label class="form-check-label" for="wednesdayCheckbox"> Wed
                              </label>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker5" disabled style="display: none;">
                                <select class="border rounded p-2" id="select5" name="addMoreInputFields[Wednesday][0][from_time]">
                                  <option selected disabled value="">from</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable5"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker6" disabled style="display: none;">
                                <select class="border rounded p-2" id="select6" name="addMoreInputFields[Wednesday][0][to_time]">
                                  <option selected disabled value="">to</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable6"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time3" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @foreach($availabilityWednesday ?? [] as $index => $res)
                          <tr class="availability-row3" style="display: none;" id="remove-{{$res->id}}">
                            <td>
                              <label>

                              </label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <button type="button" onclick="deleteConfirmation({{$res->id}})" class="btn  remove-input {{$res->id}}"><i class="fas fa-trash-alt "></i></button>
                            </td>
                            </td>
                          </tr>
                          @endforeach
                          <tr style="border-top: 1px solid rgba(128, 128, 128, 0.5);;">
                            <td style="padding-top:10px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Thursday" id="thursdayCheckbox" onchange="handleCheckboxChange(this,4)">
                              <label class="form-check-label" for="thursdayCheckbox"> Thu
                              </label>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker7" disabled style="display: none;">
                                <select class="border rounded p-2" id="select7" name="addMoreInputFields[Thursday][0][from_time]">
                                  <option selected disabled value="">from</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable7"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker8" disabled style="display: none;">
                                <select class="border rounded p-2" id="select8" name="addMoreInputFields[Thursday][0][to_time]">
                                  <option selected disabled value="">to</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable8"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time4" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @foreach($availabilityThursday ?? [] as $index => $res)
                          <tr class="availability-row4" style="display: none;" id="remove-{{$res->id}}">
                            <td>
                              <label>

                              </label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <button type="button" onclick="deleteConfirmation({{$res->id}})" class="btn  remove-input {{$res->id}}"><i class="fas fa-trash-alt "></i></button>
                            </td>
                            </td>
                          </tr>
                          @endforeach
                          <tr style="border-top: 1px solid rgba(128, 128, 128, 0.5);;">
                            <td style="padding-top:10px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Friday" id="fridayCheckbox" onchange="handleCheckboxChange(this,5)">
                              <label class="form-check-label" for="fridayCheckbox"> Fri
                              </label>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker9" disabled style="display: none;">
                                <select class="border rounded p-2" id="select9" name="addMoreInputFields[Friday][0][from_time]">
                                  <option selected disabled value="">from</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable9"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker10" disabled style="display: none;">
                                <select class="border rounded p-2" id="select10" name="addMoreInputFields[Friday][0][to_time]">
                                  <option selected disabled value="">to</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable10"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time5" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @foreach($availabilityFriday ?? [] as $index => $res)
                          <tr class="availability-row5" style="display: none;" id="remove-{{$res->id}}">
                            <td>
                              <label>

                              </label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <button type="button" onclick="deleteConfirmation({{$res->id}})" class="btn  remove-input {{$res->id}}"><i class="fas fa-trash-alt "></i></button>
                            </td>
                            </td>
                          </tr>
                          @endforeach
                          <tr style="border-top: 1px solid rgba(128, 128, 128, 0.5);;">
                            <td style="padding-top:10px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Saturday" id="saturdayCheckbox" onchange="handleCheckboxChange(this,6)">
                              <label class="form-check-label" for="saturdayCheckbox"> Sat
                              </label>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker11" disabled style="display: none;">
                                <select class="border rounded p-2" id="select11" name="addMoreInputFields[Saturday][0][from_time]">
                                  <option selected disabled value="">from</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable11"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker12" disabled style="display: none;">
                                <select class="border rounded p-2" id="select12" name="addMoreInputFields[Saturday][0][to_time]">
                                  <option selected disabled value="">to</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable12"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time6" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @foreach($availabilitySaturday ?? [] as $index => $res)
                          <tr class="availability-row6" style="display: none;" id="remove-{{$res->id}}">
                            <td>
                              <label>

                              </label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <button type="button" onclick="deleteConfirmation({{$res->id}})" class="btn  remove-input {{$res->id}}"><i class="fas fa-trash-alt "></i></button>
                            </td>
                            </td>
                          </tr>
                          @endforeach
                          <tr style="border-top: 1px solid rgba(128, 128, 128, 0.5);;">
                            <td style="padding-top:10px;">
                              <input class="form-check-input" name="day[]" type="checkbox" value="Sunday" id="sundayCheckbox" onchange="handleCheckboxChange(this,7)">
                              <label class="form-check-label" for="sundayCheckbox"> Sun
                              </label>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker13" disabled style="display: none;">
                                <select class="border rounded p-2" id="select13" name="addMoreInputFields[Sunday][0][from_time]">
                                  <option selected disabled value="">from</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable13"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <span id="timePicker14" disabled style="display: none;">
                                <select class="border rounded p-2" id="select14" name="addMoreInputFields[Sunday][0][to_time]">
                                  <option selected disabled value="">to</option>
                                  <?php
                                  for ($hour = 0; $hour <= 23; $hour++) {
                                    for ($minute = 0; $minute <= 45; $minute += 30) {
                                      $time = sprintf("%02d:%02d", $hour, $minute);
                                      $displayTime = date("g:i A", strtotime($time));
                                      echo "<option value=\"$time\">$displayTime</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </span>
                              <span id="unavailable14"> Unavailable</span>
                            </td>
                            <td style="padding-top:10px;">
                              <button type="button" class="btn border rounded btn-sm add-subject" name="add" style="background-color: #0c236b; color: white" id="time7" disabled><i class="fa fa-plus-circle"></i></button>
                            </td>
                          </tr>
                          @foreach($availabilitySunday ?? [] as $index => $res)
                          <tr class="availability-row7" style="display: none;" id="remove-{{$res->id}}">
                            <td>
                              <label>

                              </label>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->from_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <select class="border rounded p-2">
                                <?php
                                for ($hour = 0; $hour <= 23; $hour++) {
                                  for ($minute = 0; $minute <= 45; $minute += 30) {
                                    $time = sprintf("%02d:%02d", $hour, $minute);
                                    $displayTime = date("g:i A", strtotime($time));
                                    $selected = ($time === date("H:i", strtotime($res->to_time ?? ''))) ? 'selected' : '';
                                    echo "<option value=\"$time\" $selected>$displayTime</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td>
                              <button type="button" onclick="deleteConfirmation({{$res->id}})" class="btn  remove-input {{$res->id}}"><i class="fas fa-trash-alt "></i></button>
                            </td>
                            </td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="col-xl-4">
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
  </div>
</main>
@endsection
@push('css')
<title>Manage Slots : {{ project() }}</title>
<meta name="description" content="Welcome to Expert Bells">
<meta name="keywords" content="Welcome to Expert Bells">
<link rel="stylesheet" href="{{ asset('frontend/css/account.css') }}">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" onload="this.rel='stylesheet'" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
  .slick-track {
    display: flex !important
  }

  .owl-nav {
    top: 20px;
    bottom: auto !important
  }

  .owl-nav button.owl-prev {
    left: 0 !important
  }

  .owl-nav button.owl-next {
    right: 0 !important
  }

  .owl-nav button.owl-next,
  .owl-nav button.owl-prev {
    width: 24px !important;
    height: 36px !important;
    margin: 0 !important
  }

  .DateS {
    border-bottom: 1px solid rgb(var(--blackrgb)/.1);
    border-top: 1px solid rgb(var(--blackrgb)/.1);
    border-left: 1px solid rgb(var(--blackrgb)/.1);
    margin-bottom: 9px;
    padding-bottom: 6px;
    /*margin-top:9px;*/
    padding-top: 6px;
    font-size: 13px;
    color: rgb(var(--blackrgb)/.5);
    background: rgb(var(--blackrgb)/.05)
  }

  .DateS>span {
    margin: 0;
    color: var(--black)
  }

  .UserBox>div {
    align-items: start
  }

  .SlotingDate {
    align-items: flex-start !important;
    overflow: hidden;
    display: flex
  }

  .SlotingDate div.sitem {
    min-width: 14.285%
  }

  .SlotingDate div.sitem.no-drop {
    opacity: .6
  }

  .SlotingDate div.sitem.no-drop ul li a,
  .SlotingDate div.sitem.no-drop ul li>span {
    cursor: not-allowed;
    pointer-events: none
  }

  .SlotingDate ul {
    margin: 0 auto;
    padding: 0;
    width: calc(100% - 30px)
  }

  .SlotingDate ul li {
    margin-bottom: 6px;
    position: relative
  }

  .SlotingDate ul li>a,
  .SlotingDate ul li>span {
    background: rgb(var(--thmrgb3)/.05);
    border: 1px solid rgb(var(--thmrgb3)/.1);
    padding: 2px 6px;
    border-radius: 3px;
    display: inline-block;
    font-size: 13px;
    cursor: pointer;
    width: 100%;
    line-height: 150%;
    font-weight: 600
  }

  .SlotingDate ul li>a>span,
  .SlotingDate ul li>span>span {
    display: block;
    color: rgb(var(--blackrgb)/.6);
    font-weight: 400;
    font-size: 11px
  }

  .SlotingDate ul li.book>a,
  .SlotingDate ul li.book>span {
    background: none;
    border-color: #ffc107 !important;
    cursor: inherit
  }

  .SlotingDate ul li button {
    background: var(--thm) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") no-repeat 4px center/7px auto;
    border: none;
    height: 15px;
    width: 15px;
    border-radius: 50%;
    position: absolute;
    top: -4px;
    right: -4px;
    opacity: 0;
    transition: all .5s
  }

  .SlotingDate ul li:hover button {
    opacity: 1
  }

  .EditSlots .SlotingDate ul li:last-child>a,
  .EditSlots .SlotingDate ul li:last-child>span {
    background: var(--thm);
    color: var(--white)
  }

  .SlotingDate>button.slick-arrow {
    border: none;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    width: 24px !important;
    height: 36px !important;
    margin: 0 !important;
    opacity: .6;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    color: var(--black) !important;
    background: var(--white) !important;
    top: 20px;
    left: 0;
    box-shadow: 3px 0 5px rgb(var(--blackrgb)/.2);
    z-index: 1;
    transition: all .5s
  }

  .SlotingDate>button.slick-arrow.owl-next {
    right: 0;
    left: auto;
    border-radius: 5px 0 0 5px;
    box-shadow: -3px 0 5px rgb(var(--blackrgb)/.2)
  }

  .SlotingDate>button.slick-arrow:hover {
    background: var(--thm) !important;
    color: var(--white) !important;
    opacity: 1
  }

  .SlotingDate ul li button,
  .SlotingDate ul li>span+a {
    background: var(--thm) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") no-repeat 4px center/7px auto;
    border: none;
    height: 15px;
    width: 15px;
    border-radius: 50%;
    position: absolute;
    top: -4px;
    right: -4px;
    opacity: 0;
    z-index: 9;
    transition: all .5s
  }

  .SlotingDate ul li:hover button,
  .SlotingDate ul li:hover>span+a {
    opacity: 1
  }

  .Edit {
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    z-index: 2;
    background: rgb(var(--thmrgb)/.5);
    opacity: 0
  }

  .SlotingDate ul li:hover>span .Edit {
    opacity: 1
  }

  #AddTime .form-select,
  .TimeBoxIn input {
    border-radius: 1.5rem;
    padding: .6rem .75rem;
    font-size: 15px
  }

  .TimeBoxIn {
    flex-wrap: nowrap !important
  }

  .TimeBoxIn>* {
    width: 50%
  }

  .TimeBoxIn>span:first-child input {
    border-right: none !important;
    border-radius: 1.5rem 0 0 1.5rem
  }

  .TimeBoxIn>span:last-child input {
    border-radius: 0 1.5rem 1.5rem 0
  }

  .slick-track {
    margin-left: 0 !important
  }

  .no-drop {
    cursor: not-allowed
  }

  .datepicker {
    width: auto;
    /* Adjust the width as needed */
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
  .fas {
    color: #0c233b;
  }

  .fa {
    color: #ffffff;
  }

  .no-spinners::-webkit-calendar-picker-indicator,
  .no-spinners::-webkit-inner-spin-button {
    display: none;
    -webkit-appearance: none;
  }

  .sizing-time {
    font-size: 14px;
  }

  @media(max-width:770px) {
    .sizing-time {
      font-size: 11px;
    }
  }


  @media (max-width:450px) {
    .form-select {
      background-position: right .3rem center;
      padding: .25rem 1.1rem .25rem .4rem;
      background-size: 10px;
      font-size: 14px
    }
  }

  @media (max-width:350px) {
    .form-select {
      font-size: 13px
    }
  }

  .datepicker .datepicker-days tbody .disabled span {
    color: #ccc;
    cursor: not-allowed;
    pointer-events: none;
    opacity: 0.5;
  }
</style>
@endpush
@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).on('click', '.deleteData', function() {
    var id = $(this).data('id');
    var element = this;

    $.ajax({
      url: '/expert/slots-delete/' + id,
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        id: id,
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        $(element).closest('.row').fadeOut(function() {
          $(this).remove();
        });
      },
      error: function(xhr, status, error) {
        console.log('Error deleting data:');
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  });

  $(document).ready(function() {
    GetMonday();
  });

  function addField() {
    var mondayCheckbox = document.getElementById("mondayCheckbox").value;
    var from_time = document.getElementById("from_time").value;
    var to_time = document.getElementById("to_time").value;

    $.ajax({
      url: "/expert/slot-store",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        mondayCheckbox: mondayCheckbox,
        from_time: from_time,
        to_time: to_time,
      },
      success: function(response) {
        $("#from_time").val("");
        $("#to_time").val("");
        GetMonday();
      },
      error: function(error) {
        console.error("An error occurred while storing data");
      }
    });
  }

  function padZero(num) {
    return (num < 10 ? '0' : '') + num;
  }

 function GetMonday() {
  $.ajax({
    url: "/expert/slot-get",
    type: "GET",
    success: function(response) {
      // Assuming the response contains the data you want to display
      var availability = response.availability;
      if (availability.length) {
        $("#mondayCheckbox").prop("checked", true);
        handleCheckboxChange(document.getElementById("mondayCheckbox"),1);
      } else {
        $("#mondayCheckbox").prop("checked", false);
        handleCheckboxChange(document.getElementById("mondayCheckbox"),1);
      }
      // Clear the existing data
      $("#selectedTimesContainer1").empty();

      // Display the data
      availability.forEach(function(slot) {
        console.log(slot);
        // Access individual slot properties and append them to the container
        var html = '<div class="row p-1"><div class="col-2 me-2 me-md-3"></div><span class="col-4 ms-1"> <select class="border rounded p-2" id="timeid"><option value="' + slot.from_time + '">' + formatTimeTo12Hour(slot.from_time) + ' ' + getPeriod(slot.from_time) + '</option>';

        for (var i = 0; i < 24; i++) {
          for (var j = 0; j < 60; j += 15) {
            var time = padZero(i) + ':' + padZero(j);
            html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
          }
        }

        html += '</select></span><span class="col-4 ms-2 me-xl-1"><select class="border rounded p-2 ms-1" id="timeid"><option value="' + slot.to_time + '">' + formatTimeTo12Hour(slot.to_time) + ' ' + getPeriod(slot.to_time) + '</option>';

        for (var i = 0; i < 24; i++) {
          for (var j = 0; j < 60; j += 15) {
            var time = padZero(i) + ':' + padZero(j);
            html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
          }
        }

        html += '</select></span><div class="col-1"><i class="fas fa-trash-alt deleteData ps-4 ms-md-4 ps-md-4 ms-lg-4 ps-lg-3 ms-xl-3 ps-xl-3" data-id="' + slot.id + '" style="color:#0c236b;" aria-hidden="true"></i></div></div>';

        $("#selectedTimesContainer1").append(html);
        // ...
      });
    },
    error: function(xhr, status, error) {
      console.error("An error occurred while retrieving data");
    }
  });
}



  $(document).ready(function() {
    GetTuesday();
  });

  function addFieldsTuesday() {
    var tuesdayCheckbox = document.getElementById("tuesdayCheckbox").value;
    var from_time_tuesday = document.getElementById("from_time_tuesday").value;
    var to_time_tuesday = document.getElementById("to_time_tuesday").value;
    console.log(tuesdayCheckbox);
    console.log(from_time_tuesday);
    console.log(to_time_tuesday);

    $.ajax({
      url: "/expert/slotTuesday-store",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        tuesdayCheckbox: tuesdayCheckbox,
        from_time_tuesday: from_time_tuesday,
        to_time_tuesday: to_time_tuesday,
      },
      success: function(response) {
        $("#from_time_tuesday").val("");
        $("#to_time_tuesday").val("");
        GetTuesday();
      },
      error: function(error) {
        console.error("An error occurred while storing data");
      }
    });
  }

  function GetTuesday() {
    $.ajax({
      url: "/expert/slot-getTuesday",
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if (availability.length) {
          $("#tuesdayCheckbox").prop("checked", true);
          handleCheckboxChange(document.getElementById("tuesdayCheckbox"),2);
        } else {
          $("#tuesdayCheckbox").prop("checked", false);
          handleCheckboxChange(document.getElementById("tuesdayCheckbox"),2);
        }

        // Clear the existing data
        $("#selectedTimesContainer2").empty();

        // Display the data
        availability.forEach(function(slot) {
          var html = '<div class="row p-1"><div class="col-2 me-2 me-md-3"></div><span class="col-4 ms-1"> <select class="border rounded p-2" id="timeid"><option value="' + slot.from_time + '">' + formatTimeTo12Hour(slot.from_time) + ' ' + getPeriod(slot.from_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><span class="col-4 ms-2 me-xl-1"><select class="border rounded p-2 ms-1" id="timeid"><option value="' + slot.to_time + '">' + formatTimeTo12Hour(slot.to_time) + ' ' + getPeriod(slot.to_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><div class="col-1"><i class="fas fa-trash-alt deleteData ps-4 ms-md-4 ps-md-4 ms-lg-4 ps-lg-3 ms-xl-3 ps-xl-3" data-id="' + slot.id + '" style="color:#0c236b;" aria-hidden="true"></i></div></div>';

          $("#selectedTimesContainer2").append(html);
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }




  $(document).ready(function() {
    GetWednesday();
  });

  function addFieldsWednesday() {
    var wednesdayCheckbox = document.getElementById("wednesdayCheckbox").value;
    var from_time_wednesday = document.getElementById("from_time_wednesday").value;
    var to_time_wednesday = document.getElementById("to_time_wednesday").value;

    $.ajax({
      url: "/expert/slotWednesday-store",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        wednesdayCheckbox: wednesdayCheckbox,
        from_time_wednesday: from_time_wednesday,
        to_time_wednesday: to_time_wednesday,
      },
      success: function(response) {
        $("#from_time_wednesday").val("");
        $("#to_time_wednesday").val("");
        GetWednesday();
      },
      error: function(error) {
        console.error("An error occurred while storing data");
      }
    });
  }

  function GetWednesday() {
    $.ajax({
      url: "/expert/slot-getWednesday",
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if (availability.length) {
          $("#wednesdayCheckbox").prop("checked", true);
        handleCheckboxChange(document.getElementById("wednesdayCheckbox"),3);
        } else {
          $("#wednesdayCheckbox").prop("checked", false);
          handleCheckboxChange(document.getElementById("wednesdayCheckbox"),3);
        }

        // Clear the existing data
        $("#selectedTimesContainer3").empty();

        // Display the data
        availability.forEach(function(slot) {
          var html = '<div class="row p-1"><div class="col-2 me-2 me-md-3"></div><span class="col-4 ms-1"> <select class="border rounded p-2" id="timeid"><option value="' + slot.from_time + '">' + formatTimeTo12Hour(slot.from_time) + ' ' + getPeriod(slot.from_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><span class="col-4 ms-2 me-xl-1"><select class="border rounded p-2 ms-1" id="timeid"><option value="' + slot.to_time + '">' + formatTimeTo12Hour(slot.to_time) + ' ' + getPeriod(slot.to_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><div class="col-1"><i class="fas fa-trash-alt deleteData ps-4 ms-md-4 ps-md-4 ms-lg-4 ps-lg-3 ms-xl-3 ps-xl-3" data-id="' + slot.id + '" style="color:#0c236b;" aria-hidden="true"></i></div></div>';

          $("#selectedTimesContainer3").append(html);
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }



  $(document).ready(function() {
    GetThursday();
  });

  function addFieldsThursday() {
    var thursdayCheckbox = document.getElementById("thursdayCheckbox").value;
    var from_time_thursday = document.getElementById("from_time_thursday").value;
    var to_time_thursday = document.getElementById("to_time_thursday").value;

    $.ajax({
      url: "/expert/slotThursday-store",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        thursdayCheckbox: thursdayCheckbox,
        from_time_thursday: from_time_thursday,
        to_time_thursday: to_time_thursday,
      },
      success: function(response) {
        $("#from_time_thursday").val("");
        $("#to_time_thursday").val("");
        GetThursday();
      },
      error: function(error) {
        console.error("An error occurred while storing data");
      }
    });
  }

  function GetThursday() {
    $.ajax({
      url: "/expert/slot-getThursday",
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if (availability.length) {
          $("#thursdayCheckbox").prop("checked", true);
          handleCheckboxChange(document.getElementById("thursdayCheckbox"),4);
        } else {
          $("#thursdayCheckbox").prop("checked", false);
          handleCheckboxChange(document.getElementById("thursdayCheckbox"),4);
        }

        // Clear the existing data
        $("#selectedTimesContainer4").empty();

        // Display the data
        availability.forEach(function(slot) {
          var html = '<div class="row p-1"><div class="col-2 me-2 me-md-3"></div><span class="col-4 ms-1"> <select class="border rounded p-2" id="timeid"><option value="' + slot.from_time + '">' + formatTimeTo12Hour(slot.from_time) + ' ' + getPeriod(slot.from_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><span class="col-4 ms-2 me-xl-1"><select class="border rounded p-2 ms-1" id="timeid"><option value="' + slot.to_time + '">' + formatTimeTo12Hour(slot.to_time) + ' ' + getPeriod(slot.to_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><div class="col-1"><i class="fas fa-trash-alt deleteData ps-4 ms-md-4 ps-md-4 ms-lg-4 ps-lg-3 ms-xl-3 ps-xl-3" data-id="' + slot.id + '" style="color:#0c236b;" aria-hidden="true"></i></div></div>';

          $("#selectedTimesContainer4").append(html);
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }


  $(document).ready(function() {
    GetFriday();
  });

  function addFieldsFriday() {
    var fridayCheckbox = document.getElementById("fridayCheckbox").value;
    var from_time_friday = document.getElementById("from_time_friday").value;
    var to_time_friday = document.getElementById("to_time_friday").value;

    $.ajax({
      url: "/expert/slotFriday-store",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        fridayCheckbox: fridayCheckbox,
        from_time_friday: from_time_friday,
        to_time_friday: to_time_friday,
      },
      success: function(response) {
        $("#from_time_friday").val("");
        $("#to_time_friday").val("");
        GetFriday();
      },
      error: function(error) {
        console.error("An error occurred while storing data");
      }
    });
  }

  function GetFriday() {
    $.ajax({
      url: "/expert/slot-getFriday",
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if (availability.length) {
          $("#fridayCheckbox").prop("checked", true);
          handleCheckboxChange(document.getElementById("fridayCheckbox"),5);
        } else {
          $("#fridayCheckbox").prop("checked", false);
          handleCheckboxChange(document.getElementById("fridayCheckbox"),5);
        }

        // Clear the existing data
        $("#selectedTimesContainer5").empty();

        // Display the data
        availability.forEach(function(slot) {
          var html = '<div class="row p-1"><div class="col-2 me-2 me-md-3"></div><span class="col-4 ms-1"> <select class="border rounded p-2" id="timeid"><option value="' + slot.from_time + '">' + formatTimeTo12Hour(slot.from_time) + ' ' + getPeriod(slot.from_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><span class="col-4 ms-2 me-xl-1"><select class="border rounded p-2 ms-1" id="timeid"><option value="' + slot.to_time + '">' + formatTimeTo12Hour(slot.to_time) + ' ' + getPeriod(slot.to_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><div class="col-1"><i class="fas fa-trash-alt deleteData ps-4 ms-md-4 ps-md-4 ms-lg-4 ps-lg-3 ms-xl-3 ps-xl-3" data-id="' + slot.id + '" style="color:#0c236b;" aria-hidden="true"></i></div></div>';

          $("#selectedTimesContainer5").append(html);
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }


  $(document).ready(function() {
    GetSaturday();
  });

  function addFieldsSaturday() {
    var saturdayCheckbox = document.getElementById("saturdayCheckbox").value;
    var from_time_saturday = document.getElementById("from_time_saturday").value;
    var to_time_saturday = document.getElementById("to_time_saturday").value;

    $.ajax({
      url: "/expert/slotSaturday-store",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        saturdayCheckbox: saturdayCheckbox,
        from_time_saturday: from_time_saturday,
        to_time_saturday: to_time_saturday,
      },
      success: function(response) {
        $("#from_time_saturday").val("");
        $("#to_time_saturday").val("");
        GetSaturday();
      },
      error: function(error) {
        console.error("An error occurred while storing data");
      }
    });
  }

  function GetSaturday() {
    $.ajax({
      url: "/expert/slot-getSaturday",
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if (availability.length) {
          $("#saturdayCheckbox").prop("checked", true);
          handleCheckboxChange(document.getElementById("saturdayCheckbox"),6);
        } else {
          $("#saturdayCheckbox").prop("checked", false);
          handleCheckboxChange(document.getElementById("saturdayCheckbox"),6);
        }

        // Clear the existing data
        $("#selectedTimesContainer6").empty();

        // Display the data
        availability.forEach(function(slot) {
          var html = '<div class="row p-1"><div class="col-2 me-2 me-md-3"></div><span class="col-4 ms-1"> <select class="border rounded p-2" id="timeid"><option value="' + slot.from_time + '">' + formatTimeTo12Hour(slot.from_time) + ' ' + getPeriod(slot.from_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><span class="col-4 ms-2 me-xl-1"><select class="border rounded p-2 ms-1" id="timeid"><option value="' + slot.to_time + '">' + formatTimeTo12Hour(slot.to_time) + ' ' + getPeriod(slot.to_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><div class="col-1"><i class="fas fa-trash-alt deleteData ps-4 ms-md-4 ps-md-4 ms-lg-4 ps-lg-3 ms-xl-3 ps-xl-3" data-id="' + slot.id + '" style="color:#0c236b;" aria-hidden="true"></i></div></div>';

          $("#selectedTimesContainer6").append(html);
          // ...
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }


  $(document).ready(function() {
    GetSunday();
  });

  function addFieldsSunday() {
    var sundayCheckbox = document.getElementById("sundayCheckbox").value;
    var from_time_sunday = document.getElementById("from_time_sunday").value;
    var to_time_sunday = document.getElementById("to_time_sunday").value;

    $.ajax({
      url: "/expert/slotSunday-store",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        sundayCheckbox: sundayCheckbox,
        from_time_sunday: from_time_sunday,
        to_time_sunday: to_time_sunday,
      },
      success: function(response) {
        $("#from_time_sunday").val("");
        $("#to_time_sunday").val("");
        GetSunday();
      },
      error: function(error) {
        console.error("An error occurred while storing data");
      }
    });
  }

  function GetSunday() {
    $.ajax({
      url: "/expert/slot-getSunday",
      type: "GET",
      success: function(response) {
        // Assuming the response contains the data you want to display
        var availability = response.availability;
        if (availability.length) {
          $("#sundayCheckbox").prop("checked", true);
          handleCheckboxChange(document.getElementById("sundayCheckbox"),7);
        } else {
          $("#sundayCheckbox").prop("checked", false);
          handleCheckboxChange(document.getElementById("sundayCheckbox"),7);
        }

        // Clear the existing data
        $("#selectedTimesContainer7").empty();

        // Display the data
        availability.forEach(function(slot) {
          var html = '<div class="row p-1"><div class="col-2 me-2 me-md-3"></div><span class="col-4 ms-1"> <select class="border rounded p-2" id="timeid"><option value="' + slot.from_time + '">' + formatTimeTo12Hour(slot.from_time) + ' ' + getPeriod(slot.from_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><span class="col-4 ms-2 me-xl-1"><select class="border rounded p-2 ms-1" id="timeid"><option value="' + slot.to_time + '">' + formatTimeTo12Hour(slot.to_time) + ' ' + getPeriod(slot.to_time) + '</option>';

          for (var i = 0; i < 24; i++) {
            for (var j = 0; j < 60; j += 15) {
              var time = padZero(i) + ':' + padZero(j);
              html += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
            }
          }

          html += '</select></span><div class="col-1"><i class="fas fa-trash-alt deleteData ps-4 ms-md-4 ps-md-4 ms-lg-4 ps-lg-3 ms-xl-3 ps-xl-3" data-id="' + slot.id + '" style="color:#0c236b;" aria-hidden="true"></i></div></div>';

          $("#selectedTimesContainer7").append(html);
        });
      },
      error: function(xhr, status, error) {
        console.error("An error occurred while retrieving data");
      }
    });
  }

  function enableTimePickers(weekday, enabled) {
    var timePickerId1 = "timePicker" + (weekday * 2 - 1);
    var timePickerId2 = "timePicker" + (weekday * 2);
    var timePickerId3 = "unavailable" + (weekday * 2 - 1);
    var timePickerId4 = "unavailable" + (weekday * 2);
    var timePickerId5 = "time" + (weekday);
    var timePickerId7 = "time" + (weekday+7);
    var a = document.getElementById(timePickerId1);
    var b = document.getElementById(timePickerId2);
    var c = document.getElementById(timePickerId3);
    var d = document.getElementById(timePickerId4);
    var e = document.getElementById(timePickerId5);
    var g = document.getElementById(timePickerId7);
    if (enabled) {
      a.style.display = 'block';
      b.style.display = 'block';
      c.style.display = 'none';
      d.style.display = 'none';
      e.removeAttribute("disabled");
      g.removeAttribute("disabled");
    } else {
      a.style.display = 'none';
      b.style.display = 'none';
      c.style.display = 'block';
      d.style.display = 'block';
      e.setAttribute("disabled", "disabled");
      g.setAttribute("disabled", "disabled");
    }
  }

  function enableCheckBox(weekday, enabled) {
    var timePickerId1 = "timePicker" + (weekday * 2 - 1);
    var timePickerId2 = "timePicker" + (weekday * 2);
    var timePickerId3 = "unavailable" + (weekday * 2 - 1);
    var timePickerId4 = "unavailable" + (weekday * 2);
    var timePickerId5 = "time" + (weekday);
    var timePickerId7 = "time" + (weekday+7);
    console.log("hello  iiii"+timePickerId7);
    var a = document.getElementById(timePickerId1);
    var b = document.getElementById(timePickerId2);
    var c = document.getElementById(timePickerId3);
    var d = document.getElementById(timePickerId4);
    var e = document.getElementById(timePickerId5);
    var g = document.getElementById(timePickerId7);
    if (enabled) {
      a.style.display = 'block';
      b.style.display = 'block';
      c.style.display = 'none';
      d.style.display = 'none';
      e.removeAttribute("disabled");
      g.removeAttribute("disabled");
    } else {
      a.style.display = 'none';
      b.style.display = 'none';
      c.style.display = 'block';
      d.style.display = 'block';
      e.setAttribute("disabled", "disabled");
      g.setAttribute("disabled", "disabled");
    }
  }

 
  function handleCheckboxChange(weekday, checkbox) {
    if (checkbox.checked) {
      enablecheckbox(weekday, true);
    } else {
      enablecheckbox(weekday, false);
    }
  }

  function formatTimeTo12Hour(time) {
    var timeParts = time.split(":");
    var hours = parseInt(timeParts[0]);
    var minutes = parseInt(timeParts[1]);

    var period = hours >= 12 ? "PM" : "AM";

    if (hours > 12) {
      hours -= 12;
    }
    if (hours == 00) {
      hours = 12;
    }
    return hours.toString().padStart(2, "0") + ":" + minutes.toString().padStart(2, "0");
  }

  function getPeriod(time) {
    var hour = Number(time.split(':')[0]);
    return hour >= 12 ? 'PM' : 'AM';
  }
</script>
<script>
  // Date Picker :    
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
    console.log("hello");
    $.ajax({
      url: "/expert/getBlock-Dates",
      type: "GET",
      success: function(response) {
        // Assuming the response blockDate the data you want to display
        var blockDate = response.blockDate; // Update the property name here

        // Display the data
        blockDate.forEach(function(date) {
          console.log(date);
          // $('#selectedDatesContainer').append('<div>'+date.date+'</div>');
          var selectedDateDiv = $('<div>').addClass('border rounded text-center row m-2');
          var dateText = $('<span>').text(date.date).addClass('col-6 p-2').css('font-size', '12px');
          var unavailableText = $('<span>').text('unavailable').addClass('col-4 px-1 py-2').css('font-size', '11px');
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
  });

  function blockDateRemove(date) {
    $.ajax({
      url: '/expert/remove-blockDate/' + date,
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        date: date,
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        // Handle success response
        console.log('Data deleted successfully');
        // Remove the deleted date element from the DOM
        $("#selectedDatesContainer").find("div:contains('" + date + "')").remove();
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
    var today = new Date();
    $('#datepickerInput').datepicker(datePickerOptions).on('show', function() {
      $(this).datepicker('setStartDate', today);
    }).on('changeDate', function(e) {
      var selectedDate = formatDate(e.date);
      console.log(selectedDate);
      $.ajax({
        url: '/expert/slots-block/' + selectedDate,
        type: 'POST',
        data: {
          _token: "{{ csrf_token() }}",
          selectedDate: selectedDate,
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


    function GetBlockDates(selectedDate) {
      if (selectedDates.includes(selectedDate)) {
        return; // Date already selected, do not proceed
      }
      selectedDates.push(selectedDate);

      var selectedDateDiv = $('<div>').addClass('border rounded text-center row m-2');
      var dateText = $('<span>').text(selectedDate).addClass('col-6 p-2').css('font-size', '12px');
      var unavailableText = $('<span>').text('unavailable').addClass('col-4 px-1 py-2').css('font-size', '11px');
      var deleteButton = $('<button onclick="blockDateRemove(\'' + selectedDate + '\')">').addClass('btn btn-link delete-button col-2');
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
      // dateText.addClass('fw-bold'); // Add the CSS class for bold font
      $(this).datepicker('hide'); // Hide the date picker

      disableDate(selectedDate);

    }


    function formatDate(date) {
      var year = date.getFullYear();
      var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Adding 1 to month since it is zero-based
      var day = date.getDate().toString().padStart(2, '0');
      return year + '-' + month + '-' + day;
    }

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on("click", ".add-subject", function() {
      var dayRow = $(this).closest('tr');
      var day = dayRow.find('input[type="checkbox"]').val();
      var rowCount = dayRow.nextAll('tr').length;
      var f='';
      if(day=='Monday')
      {
        f=1;
      }
      else if(day=='Tuesday')
      {
        f=2;
      }
      else if(day=='Wednesday')
      {
        f=3;
      }
      else if(day=='Thursday')
      {
        f=4;
      }
      else if(day=='Friday')
      {
        f=5;
      }
      else if(day=='Saturday')
      {
        f=6;
      }
      else if(day=='Sunday')
      {
        f=7;
      }
      var html1 = '';
      for (var i = 0; i < 24; i++) {
        for (var j = 0; j < 60; j += 30) {
          var time = padZero(i) + ':' + padZero(j);
          html1 += '<option value="' + time + '">' + formatTimeTo12Hour(time) + ' ' + getPeriod(time) + '</option>';
        }
      }
      var newFieldsRow = $('<tr>' +
        '<td>' +
        '</td>' +
        '<td><select name="addMoreInputFields[' + day +
        '][' + rowCount + '][from_time]" class="border rounded availability-row'+f+' p-2"><option selected disabled value="">from</option>' + html1 + '</select></td>' +
        '<td><select name="addMoreInputFields[' + day +
        '][' + rowCount + '][to_time]" class="border rounded availability-row'+f+' p-2"><option selected disabled value="">to</option>' + html1 + '</select></td>' +
        '<td><button type="button" class="btn remove-input-field availability-row'+f+'"><i class="fas fa-trash-alt"></i></button></td>' +
        '</tr>');
        var nextDayRow = dayRow.nextAll('tr:has(input[type="checkbox"])').first();
        if (nextDayRow.length === 0) {
        dayRow.closest('tbody').append(newFieldsRow);
      } else {
        nextDayRow.before(newFieldsRow);
      }
    });


    $(document).on('click', '.remove-input-field', function() {
      $(this).parents('tr').remove();
    });
  });
</script>
<script type="text/javascript">
  function deleteConfirmation(id) {
    swal.fire({
      title: "Delete?",
      icon: 'question',
      text: "Please ensure and then confirm!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true
    }).then(function(result) {
      if (result.value) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          type: 'POST',
          url: "{{url('/expert/slots-delete')}}/" + id,
          data: {
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(response) {
            if (response.success === true) {
              swal.fire("Done!", response.message, "success").then(function() {
                // Remove the deleted record from the DOM
                $("#remove-" + id).remove();
              });
            } else {
              swal.fire("Error!", response.message, "error");
            }
          }
        });

      } else if (result.dismiss === swal.DismissReason.cancel) {
        swal.fire("Cancelled", "Your record is safe.", "info");
      }
    }, function(dismiss) {
      return false;
    })
  }
</script>





<script>
  function handleCheckboxChange(checkbox,weekday) {
    var rows = document.getElementsByClassName('availability-row'+weekday);
    console.log("here for "+weekday);
    for (var i = 0; i < rows.length; i++) {
      if (checkbox.checked) {
        rows[i].style.display = 'table-row';
      } else {
        rows[i].style.display = 'none';
      }
    }
  if(checkbox.checked)
  {
    enableTimePickers(weekday,true);
  }
  else
  {
    enableTimePickers(weekday,false);
  }
}
</script>

@endpush