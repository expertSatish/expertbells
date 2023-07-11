<?php
$active = Request::segment(2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Enquire Now : Expert Bells</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    @include('inc.header')
    <section class="Home Login">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="Blocks w60 left-align">
                        <h1 class="h4 Heading">Enquiry Form</h1><br>
                        <form action="{{route('enquirySave')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="">
                                    <div class="input-field">
                                        <input type="text" name="name" class="border p-2" value="{{old('name')}}" style="border-radius: 15px;" placeholder="Name">
                                         <label for="name"></label>
                                              @if ($errors->has('name')) <div id="CategoryName-error" class="error">{{ $errors->first('name') }} </div> @endif
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="">
                                    <div class="input-field">
                                        <input type="text" value="{{old('phone') }}" class="border p-2" style="border-radius: 15px;" placeholder="Phone"  name="phone">
                                        <label for="phone"></label>
                                           @if ($errors->has('phone')) <div id="CategoryName-error" class="error">{{ $errors->first('phone') }} </div> @endif
                                        
                                      
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="">
                                    <div class="input-field">
                                        <input type="text" value="{{old('email') }}" class="border p-2" style="border-radius: 15px;" placeholder="Email"  name="email">
                                         <label for="email"></label>
                                           @if ($errors->has('email')) <div id="CategoryName-error" class="error">{{ $errors->first('email') }} </div> @endif
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="">
                                    <div class="input-field">
                                      <textarea name="message"  style="max-height:120px!important;border-radius: 15px; height:auto; overflow-y: auto;" class="materialize-textarea"  maxlength="300" data-length="300"></textarea>
                                         <label for="message">Message</label>
                                        @if ($errors->has('message')) <div id="CategoryName-error" class="error">{{ $errors->first('message') }} </div> @endif
                                       
                                    </div>
                                </div>
                            </div>
                               
                                <div class="row">
                                    <button  type="submit" class="btn btn-main1 mt20px waves-effect waves-light" style="background-color:#0c233b !important; color:white !important">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('inc.footer')
