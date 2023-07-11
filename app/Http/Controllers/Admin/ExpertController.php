<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlockDate;
use App\Models\SlotAvailability;
use App\Models\SlotAvailabilityDate;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index(){
        $lists = \App\Models\Expert::orderBy('experts.id','DESC');
        if(!empty(request('month'))){ $lists = $lists->whereMonth('experts.created_at',request('month')); }
        if(!empty(request('year'))){ $lists = $lists->whereYear('experts.created_at',request('year')); }
        if(!empty(request('expertise'))){
            $lists = $lists->join('expert_expertises as expertises','expertises.expert_id','experts.id'); 
            $lists = $lists->where('expertises.expertise_id',request('expertise'));
        }
        if(!empty(request('industries'))){
            $lists = $lists->join('expert_industries as industrie','industrie.expert_id','experts.id'); 
            $lists = $lists->where('industrie.industry_id',request('industries'));
        }
        if(!empty(request('role'))){
            $lists = $lists->join('expert_roles as roles','roles.expert_id','experts.id'); 
            $lists = $lists->where('roles.role',request('role'));
        }
        if(!empty(request('language'))){
            $lists = $lists->join('expert_languages as languages','languages.expert_id','experts.id'); 
            $lists = $lists->where('languages.language_id',request('language'));
        }
        if(!empty(request('search'))){
            $search = request('search');
            $lists = $lists->where(function($q) use ($search){
                $q->where('name','LIKE','%'.$search.'%');
                $q->orwhere('email','LIKE','%'.$search.'%');
                $q->orwhere('mobile','LIKE','%'.$search.'%');
                $q->orwhere('user_id','LIKE','%'.$search.'%');
            });
        }
        $lists = $lists->paginate(1000);
        $industries = \App\Models\Industry::latest()->get();
        $languages = \App\Models\Language::latest()->get();
        $roles = \App\Models\Role::latest()->get();
        $expertises = \App\Models\Expertise::latest()->get();
        return view('admin.experts.lists',compact('lists','languages','industries','roles','expertises'));
    }
    public function sequence(Request $request){
        foreach($request->sequence as $id => $sequence):
            $data =  \App\Models\Expert::find($id);
            $data->sequence = $sequence;
            $data->save();
        endforeach;
        return back()->with(['success'=>'Sequence Updated!']);
    }
    public function status(Request $request){
        $data =  \App\Models\Expert::find($request->id);
        $data->is_publish = $request->status;
        $data->save();

        if($data->is_publish==1){
            $Message='Hi` '.$data->name.'<br>';
            $Message .='This email has been notify you that your account has been approved by the administrator on '.project().'.';

            $mailData = [
                'subject' => 'Account approved & activated : '.project().'.',
                'message' => $Message
            ];   
            \Mail::to($data->email)->send(new \App\Mail\EnquiryMail($mailData));
        }else{
            $Message='Hi` '.$data->name.'<br>';
            $Message .='This email has been notify you that your account has been dis-approved by the administrator on '.project().'.';

            $mailData = [
                'subject' => 'Account dis-approved & de-activated : '.project().'.',
                'message' => $Message
            ];   
            \Mail::to($data->email)->send(new \App\Mail\EnquiryMail($mailData));
        }

    }
    public function destroy($id){
        $data =  \App\Models\Expert::find($id)->delete();
        return back()->with(['success'=>'Data Removed!']);
    }
    public function bulkremove(Request $request){
        if(empty($request->check)){ return back()->with(['error'=>'Please choose at least one data']); }
        foreach($request->check as $id ):
            $data =  \App\Models\Expert::find($id);
            $data->delete();
        endforeach;
        return back()->with(['success'=>'Data Removed!']);
    }
    public function topstatus(Request $request){
        $data =  \App\Models\Expert::find($request->id);
        $data->top_expert = $request->status;
        $data->save();
    }
    public function information($page,$id){
        $data =  \App\Models\Expert::find($id);
        if(empty($data)){ abort(404); }
        if($page=='info'){ return view('admin.experts.information',compact('data')); }
        if($page=='charges'){ 
            $times = \App\Models\SlotTime::where('is_publish',1)->orderBy('sequence','ASC')->get();
            $booktimes = \App\Models\SlotCharge::where(['expert_id'=>$data->id])->get();
            return view('admin.experts.charges',compact('data','times','booktimes')); 
        }
        if($page=='slot'){ 
            $lists = \App\Models\SlotBook::where(['payment'=>1,'expert_id'=>$id])->paginate(100);
            return view('admin.experts.slot',compact('data','lists')); 
        }
        abort(404);
    }
    public function service_charges(Request $request){
        $data = \App\Models\Expert::find($request->expertid);
        $data->service_charges = $request->service_charges;
        $data->save();
        return back()->with('success','Service Charges Updated!');
    }
        public function coupon_code(Request $request){
        $data = \App\Models\Expert::find($request->expertid);
        $data->coupon_title = $request->coupon_title;
        $data->percentage = $request->percentage;
        $data->coupon_start = $request->coupon_start;
        $data->coupon_end = $request->coupon_end;
        $data->save();
        return back()->with('success','Coupon Updated!');
    }
       public function expertTdsharges(Request $request)
    {
        $data = \App\Models\Expert::find($request->expertid);
        $data->tds = $request->tds;
        $data->save();
        return back()->with('success', 'TDS Updated!');
    }
    public function edit($id){
        $lists = \App\Models\Expert::findOrFail($id);
        $countries = \App\Models\Country::where('status',1)->get();
        $workings = \App\Models\Working::where('is_publish',1)->get();
        $roles = \App\Models\Role::where('is_publish',1)->get();
        $languages = \App\Models\Language::where('is_publish',1)->get();
        $expertises = \App\Models\Expertise::where('is_publish',1)->get();
        $industries = \App\Models\Industry::where('is_publish',1)->get();
        $Prelang = [];
        $Prerole = [];
        $Preexpert = [];
        $Preindus = [];
        if(!empty($lists->languages)){
            foreach($lists->languages as $lang){
                $Prelang[] = $lang->language_id;
            }
        }
        if(!empty($lists->roles)){
            foreach($lists->roles as $rol){
                $Prerole[] = $rol->role;
            }
        }
        if(!empty($lists->expertise)){
            foreach($lists->expertise as $exper){
                $Preexpert[] = $exper->expertise_id;
            }
        }
        if(!empty($lists->industries)){
            foreach($lists->industries as $indu){
                $Preindus[] = $indu->industry_id;
            }
        }
        
        return view('admin.experts.edit',compact('lists','countries','workings','roles','industries','expertises','languages','Prelang','Preindus','Preexpert','Prerole'));
    }
    public function update(Request $r){
        $r->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:experts,email,'.$r->preid.',id,deleted_at,NULL',
            'mobile' => 'required|min:10|max:10|unique:experts,mobile,'.$r->preid.',id,deleted_at,NULL',
            // 'address' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            'profile' => 'nullable|mimes:jpg,png,jpeg,webp,avif,svg',
            // 'company_name' => 'required',
            // 'currently_working' => 'required',
            // 'role' => 'required',
            // 'take_session' => 'required|max:3',
            // 'charge' => 'required',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube_channel' => 'nullable|url',
            // 'expertises' => 'required',
            // 'languages' => 'required',
            // 'industries' => 'required',
            // 'bio' => 'required',
        ]);

        $data = \App\Models\Expert::find($r->preid); 
        $data->name = $r->name;
        $data->email = $r->email;
        $data->mobile = $r->mobile;
        $data->ccode = $r->ccode;
        $data->country = $r->country;
        $data->address = $r->address;
        $data->state = $r->state;
        $data->city = $r->city;
        $data->gender = $r->gender;
        $data->linkedin = $r->linkedin ;
        $data->compnay_name = $r->company_name ;
        $data->take_session = $r->take_session ;
        $data->experience = $r->experience ;
        $data->linkedin = $r->linkedin ;
        $data->instagram = $r->instagram ;
        $data->youtube_channel_link = $r->youtube_channel ;
        $data->bio = $r->bio ;
        $data->currently_working_as = $r->currently_working ;
        
        if(!empty($r->profile)){
            $extension =  $r->profile->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='AVIF'){
                $FileName = directFile('uploads/expert/',$r->profile);
            }else{
                $FileName = autoheight('uploads/expert/',476,$r->profile);
            }
            if(!empty($r->profile)){
                if(file_exists(public_path('uploads/expert/'.$r->profile))){
                    unlink(public_path('uploads/expert/'.$r->profile));
                }
                if(file_exists(public_path('uploads/expert/jpg/'.$r->profile.'.jpg'))){
                    unlink(public_path('uploads/expert/jpg/'.$r->profile.'.jpg'));
                }
                if(file_exists(public_path('uploads/expert/'.$r->profile.'.webp'))){
                    unlink(public_path('uploads/expert/'.$r->profile.'.webp'));
                }
            }
            $data->profile = $FileName;
            
        }
        $data->save();

        if(!empty($r->expertises)){
            \App\Models\ExpertExpertise::where('expert_id',$r->preid)->delete();
            foreach($r->expertises as $expertise){
                $expertisedata = new \App\Models\ExpertExpertise();
                $expertisedata->expertise_id = $expertise;
                $expertisedata->expert_id = $r->preid;
                $expertisedata->save();
            }
        }

        if(!empty($r->role)){
            \App\Models\ExpertRole::where('expert_id',$data->id)->delete();
            foreach($r->role as $role){
                $expertrole = new \App\Models\ExpertRole();
                $expertrole->role = $role;
                $expertrole->other_role = $r->other_role;
                $expertrole->expert_id = $data->id;
                $expertrole->save();
            }
        }

        if(!empty($r->industries)){
            \App\Models\ExpertIndustry::where('expert_id',$r->preid)->delete();
            foreach($r->industries as $industry){
                $expertrole = new \App\Models\ExpertIndustry();
                $expertrole->industry_id = $industry;
                $expertrole->expert_id = $r->preid;
                $expertrole->save();
            }
        }

        if(!empty($r->languages)){
            \App\Models\ExpertLanguage::where('expert_id',$r->preid)->delete();
            foreach($r->languages as $language){
                $expertrole = new \App\Models\ExpertLanguage();
                $expertrole->language_id = $language;
                $expertrole->expert_id = $r->preid;
                $expertrole->save();
            }
        }


        return back()->with('success','Expert Information Updated!');
    }
    public function slot_charges($expertid){
        $charges = \App\Models\SlotCharge::where('expert_id',$expertid)->groupBy('slot_time_id')->get();
        $idsToKeep = array_column($charges->toArray(), 'id');
        \App\Models\SlotCharge::where('expert_id',$expertid)->whereNotIn('id', $idsToKeep)->delete();
        $expert = \App\Models\Expert::findorfail($expertid);
        $times = \App\Models\SlotTime::all();
        return view('admin.experts.slotcharges',compact('charges','expert','times'));
    }
    public function saveslotcharges(Request $r){
        $charges = \App\Models\SlotCharge::where('expert_id',$r->expert_id)->delete();
        foreach ($r->charges as $key => $value) {
            $data = new \App\Models\SlotCharge(); 
            $data->charges = $value;
            $data->expert_id = $r->expert_id;
            $data->slot_time_id = $key;
            $data->is_publish = 1;
            $data->sequence = (\App\Models\SlotCharge::max('sequence') + 1);
            $data->save();

            if($data->slot_time_id==2){
                $expertin = \App\Models\Expert::find($r->expert_id);
                $expertin->charge = $value;
                $expertin->save();
            }

        }
        return back()->with('success','Slot Charges Updated!');
    }

    //// videos
    public function videos($expertid){
        $expert = \App\Models\Expert::findorfail($expertid);
        $vidoes = \App\Models\ExpertVideo::where('expert_id',$expertid)->first();
        return view('admin.experts.videos',compact('vidoes','expert'));
    }
    public function updatevideos(Request $r){
        $r->validate([
            'title' => 'required',
            'video_type' => 'required',
            'video_url' => 'required_if:video_type,==,1',
            'description' => 'required',
        ],[
            'video_url.required_if' => 'The video url field is required.',
            'video.required_if' => 'The video field is required.',
            'video_image.required_if' => 'The video image field is required.'
        ]);
        if(!empty($r->video_image)){
            $extension =  $r->video_image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $FileName = directFile('uploads/expert/video/',$r->video_image);
            }else{
                $FileName = autoheight('uploads/expert/video/',480,$r->video_image);
            }
        }
        if(!empty($r->video)){
            $VideoName = directFile('uploads/expert/video/',$r->video);
        }

        if(!empty($r->preid)){
            $data = \App\Models\ExpertVideo::find($r->preid);
        }else{
            $data = new \App\Models\ExpertVideo();
            $data->video_id = generateexpertvideoid();
        }        
        $data->title = $r->title;
        $data->expert_id = $r->expert;
        $data->video_type = $r->video_type;
        $data->video_url = $r->video_url ?? '';
        if(!empty($r->video)){
            $data->video = $VideoName ?? '';
        }
        if(!empty($r->video_image)){
            $data->video_image = $FileName ?? '';
        }
        $data->description = $r->description;
        $data->save();
        return back()->with('success','Data Updated!');
    }

    public function manageSlots($id)
    {
        return view('admin.experts.slots',compact('id'));
    }

    public function slotStore(Request $request)
    {
    
    
        // Save slot availability for selected Mondays
        if ($request->has('mondayCheckbox')) {
            $mondays = explode(',', $request->mondayCheckbox);
    
            foreach ($mondays as $monday) {
                $data = new \App\Models\SlotAvailability();
                $data->is_publish = 1;
                $data->from_time = $request->from_time;
                $data->to_time = $request->to_time;
                $data->day = $monday;
                $data->expert_id = $request->expert_id;
                $data->sequence = (\App\Models\SlotAvailability::max('sequence') + 1);
                $data->save();
    
                // Calculate dates for the selected Monday
                $dates = $this->getDatesForDay($monday);
                
                foreach ($dates as $date) {
                    $slotAvailabilityDate = new \App\Models\SlotAvailabilityDate();
                    $slotAvailabilityDate->date = $date;
                    $slotAvailabilityDate->day = $monday;
                    $slotAvailabilityDate->from_time =  $request->from_time;
                    $slotAvailabilityDate->to_time =  $request->to_time;
                    $slotAvailabilityDate->expert_id =  $request->expert_id;
                    $slotAvailabilityDate->save();
                }
            }
        }
    
        // Retrieve updated availability
        $availability = SlotAvailability::where('expert_id',$request->expert_id)->get();
    
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function tuesday(Request $request)
    {
            
        // Save slot availability for selected Mondays
        if ($request->has('tuesdayCheckbox')) {
            $tuesdays = explode(',', $request->tuesdayCheckbox);
    
            foreach ($tuesdays as $tuesday) {
                $data = new \App\Models\SlotAvailability();
                $data->is_publish = 1;
                $data->from_time = $request->from_time_tuesday;
                $data->to_time = $request->to_time_tuesday;
                $data->day = $tuesday;
                $data->expert_id = $request->expert_id;
                $data->sequence = (\App\Models\SlotAvailability::max('sequence') + 1);
                $data->save();
    
                // Calculate dates for the selected Monday
                $dates = $this->getDatesForDay($tuesday);
                
                foreach ($dates as $date) {
                    $slotAvailabilityDate = new \App\Models\SlotAvailabilityDate();
                    $slotAvailabilityDate->date = $date;
                    $slotAvailabilityDate->day = $tuesday;
                    $slotAvailabilityDate->from_time =  $request->from_time_tuesday;
                    $slotAvailabilityDate->to_time =  $request->to_time_tuesday;
                    $slotAvailabilityDate->expert_id = $request->expert_id;;
                    $slotAvailabilityDate->save();
                }
            }
        }
    
        // Retrieve updated availability
        $availability = SlotAvailability::where('expert_id', $request->expert_id)->get();
    
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function Wednesday(Request $request)
    {
        $expertId = $request->expert_id;
    
        // Save slot availability for selected Mondays
        if ($request->has('weednesdayCheckbox')) {
            $wednesdays = explode(',', $request->weednesdayCheckbox);
    
            foreach ($wednesdays as $wednesday) {
                $data = new \App\Models\SlotAvailability();
                $data->is_publish = 1;
                $data->from_time = $request->from_time_wednesday;
                $data->to_time = $request->to_time_wednesday;
                $data->day = $wednesday;
                $data->expert_id = $expertId;
                $data->sequence = (\App\Models\SlotAvailability::max('sequence') + 1);
                $data->save();
    
                // Calculate dates for the selected Monday
                $dates = $this->getDatesForDay($wednesday);
                
                foreach ($dates as $date) {
                    $slotAvailabilityDate = new \App\Models\SlotAvailabilityDate();
                    $slotAvailabilityDate->date = $date;
                    $slotAvailabilityDate->day = $wednesday;
                    $slotAvailabilityDate->from_time =  $request->from_time_wednesday;
                    $slotAvailabilityDate->to_time =  $request->to_time_wednesday;
                    $slotAvailabilityDate->expert_id = $expertId;
                    $slotAvailabilityDate->save();
                }
            }
        }
    
        // Retrieve updated availability
        $availability = SlotAvailability::where('expert_id', $expertId)->get();
    
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function Thursday(Request $request)
    {
        $expertId = $request->expert_id;
    
        // Save slot availability for selected Mondays
        if ($request->has('thursdayCheckbox')) {
            $thursdays = explode(',', $request->thursdayCheckbox);
    
            foreach ($thursdays as $thursday) {
                $data = new \App\Models\SlotAvailability();
                $data->is_publish = 1;
                $data->from_time = $request->from_time_thursday;
                $data->to_time = $request->to_time_thursday;
                $data->day = $thursday;
                $data->expert_id = $expertId;
                $data->sequence = (\App\Models\SlotAvailability::max('sequence') + 1);
                $data->save();
    
                // Calculate dates for the selected Monday
                $dates = $this->getDatesForDay($thursday);
                
                foreach ($dates as $date) {
                    $slotAvailabilityDate = new \App\Models\SlotAvailabilityDate();
                    $slotAvailabilityDate->date = $date;
                    $slotAvailabilityDate->day = $thursday;
                    $slotAvailabilityDate->from_time =  $request->from_time_thursday;
                    $slotAvailabilityDate->to_time =  $request->to_time_thursday;
                    $slotAvailabilityDate->expert_id = $expertId;
                    $slotAvailabilityDate->save();
                }
            }
        }
    
        // Retrieve updated availability
        $availability = SlotAvailability::where('expert_id', $expertId)->get();
    
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function Friday(Request $request)
    {
        $expertId = $request->expert_id;
    
        // Save slot availability for selected Mondays
        if ($request->has('fridayCheckbox')) {
            $fridays = explode(',', $request->fridayCheckbox);
    
            foreach ($fridays as $friday) {
                $data = new \App\Models\SlotAvailability();
                $data->is_publish = 1;
                $data->from_time = $request->from_time_friday;
                $data->to_time = $request->to_time_friday;
                $data->day = $friday;
                $data->expert_id = $expertId;
                $data->sequence = (\App\Models\SlotAvailability::max('sequence') + 1);
                $data->save();
                $dates = $this->getDatesForDay($friday);
                
                foreach ($dates as $date) {
                    $slotAvailabilityDate = new \App\Models\SlotAvailabilityDate();
                    $slotAvailabilityDate->date = $date;
                    $slotAvailabilityDate->day = $friday;
                    $slotAvailabilityDate->from_time =  $request->from_time_friday;
                    $slotAvailabilityDate->to_time =  $request->to_time_friday;
                    $slotAvailabilityDate->expert_id = $expertId;
                    $slotAvailabilityDate->save();
                }
            }
        }
    
        // Retrieve updated availability
        $availability = SlotAvailability::where('expert_id', $expertId)->get();
    
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function Saturday(Request $request)
    {
        $expertId = $request->expert_id;
    
        // Save slot availability for selected Mondays
        if ($request->has('saturdayCheckbox')) {
            $saturdays = explode(',', $request->saturdayCheckbox);
    
            foreach ($saturdays as $saturday) {
                $data = new \App\Models\SlotAvailability();
                $data->is_publish = 1;
                $data->from_time = $request->from_time_saturday;
                $data->to_time = $request->to_time_saturday;
                $data->day = $saturday;
                $data->expert_id = $expertId;
                $data->sequence = (\App\Models\SlotAvailability::max('sequence') + 1);
                $data->save();
                $dates = $this->getDatesForDay($saturday);
                
                foreach ($dates as $date) {
                    $slotAvailabilityDate = new \App\Models\SlotAvailabilityDate();
                    $slotAvailabilityDate->date = $date;
                    $slotAvailabilityDate->day = $saturday;
                    $slotAvailabilityDate->from_time =  $request->from_time_saturday;
                    $slotAvailabilityDate->to_time =  $request->to_time_saturday;
                    $slotAvailabilityDate->expert_id = $expertId;
                    $slotAvailabilityDate->save();
                }
            }
        }
    
        // Retrieve updated availability
        $availability = SlotAvailability::where('expert_id', $expertId)->get();
    
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function sunday(Request $request)
    {
        $expertId = $request->expert_id;
    
        // Save slot availability for selected Mondays
        if ($request->has('sundayCheckbox')) {
            $sundays = explode(',', $request->sundayCheckbox);
    
            foreach ($sundays as $sunday) {
                $data = new \App\Models\SlotAvailability();
                $data->is_publish = 1;
                $data->from_time = $request->from_time_sunday;
                $data->to_time = $request->to_time_sunday;
                $data->day = $sunday;
                $data->expert_id = $expertId;
                $data->sequence = (\App\Models\SlotAvailability::max('sequence') + 1);
                $data->save();
                $dates = $this->getDatesForDay($sunday);
                
                foreach ($dates as $date) {
                    $slotAvailabilityDate = new \App\Models\SlotAvailabilityDate();
                    $slotAvailabilityDate->date = $date;
                    $slotAvailabilityDate->day = $sunday;
                    $slotAvailabilityDate->from_time =  $request->from_time_sunday;
                    $slotAvailabilityDate->to_time =  $request->to_time_sunday;
                    $slotAvailabilityDate->expert_id = $expertId;
                    $slotAvailabilityDate->save();
                }
            }
        }
    
        // Retrieve updated availability
        $availability = SlotAvailability::where('expert_id', $expertId)->get();
    
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    
    private function getDatesForDay($day)
    {
        $dates = [];
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+1 year')); // Adjust the end date as needed
    
        $currentDate = strtotime($startDate);
        $endDate = strtotime($endDate);
    
        while ($currentDate <= $endDate) {
            if (date('l', $currentDate) === $day) {
                $dates[] = date('Y-m-d', $currentDate);
            }
            $currentDate = strtotime('+1 day', $currentDate);
        }
    
        return $dates;
    }
    
    public function slotGet($expert_id)
    {
        $availability = SlotAvailability::where('expert_id', $expert_id)->where('day','Monday')->get();
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function getTuesday($expert_id)
    {
        $availability = SlotAvailability::where('expert_id', $expert_id)->where('day','tuesday')->get();
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function getWednesday($expert_id)
    {
        $availability = SlotAvailability::where('expert_id', $expert_id)->where('day','Wednesday')->get();
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function thursdayget($expert_id)
    {
        $availability = SlotAvailability::where('expert_id', $expert_id)->where('day','Thursday')->get();
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function fridayget($expert_id)
    {
        $availability = SlotAvailability::where('expert_id', $expert_id)->where('day','Friday')->get();
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function saturdayget($expert_id)
    {
        $availability = SlotAvailability::where('expert_id', $expert_id)->where('day','Saturday')->get();
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
    public function sundayget($expert_id)
    {
        $availability = SlotAvailability::where('expert_id', $expert_id)->where('day','Sunday')->get();
        return response()->json([
            'success' => 'Availability Saved!',
            'availability' => $availability
        ]);
    }
  

    public function slotDelete(Request $request){
      
       $data = SlotAvailability::where('id',$request->id)->first();
        SlotAvailability::where('id',$request->id)->delete();
       SlotAvailabilityDate::where('expert_id',$data->expert_id)->where('day',$data->day)->where('from_time',$data->from_time)
       ->where('to_time',$data->to_time)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
    public function removeBlockDate(Request $request, $date)
    {
        $expertId = $request->expert_id;
        BlockDate::where('expert_id', $expertId)->where('date', $date)->delete();
        // Update status in SlotAvailabilityDate table
        SlotAvailabilityDate::where('expert_id', $expertId)->where('date', $date)
            ->update(['status' => 'available']);
    
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
    

    public function blockDate(Request $request, $date)
    {
        $expertId = $request->expert_id;

        $data = new \App\Models\BlockDate();
        $data->date = $date;
        $data->expert_id = $expertId;
        $data->save();

        SlotAvailabilityDate::where('expert_id', $expertId)->where('date', $date)
        ->update(['status' => 'unavailable']);

        $blockDate = BlockDate::where('expert_id', $expertId)->get();
        return response()->json([
            'success' => 'Record deleted successfully!',
            'blockDate' => $blockDate
        ]);
        
    }
    public function getBlockDate($expert_id)
    {
        $blockDate = BlockDate::where('expert_id', $expert_id)->get();
        return response()->json([
            'success' => 'Record deleted successfully!',
            'blockDate' => $blockDate
        ]);
        
    }
   
}