<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Gurdwara;
use App\Models\YatriVisa;
use App\Models\VisaPassengers;
use App\Models\Country;

class PackagesController extends Controller
{
    public function index($id)
    {
        $data['packages'] = Package::where("id", $id)->first();
        $data['all_packages'] = Package::all();
        return view('packages', $data);
    }

    public function package(Request $request, $id)
    {
        $data['all_packages'] = Package::all();
        $data['id'] = $id;
        $data['packages'] = Package::where("id", $id)->first();
        return view('forms.package', $data);
    }

    public function all_package(Request $request)
    {
        $data['all_packages'] = Package::all();
        return view('forms.all_package', $data);
    }

    public function package_apply($id)
    {
        $data['all_packages'] = Package::all();
        $data['id'] = $id;
        $data['packages'] = Package::where("id", $id)->first();
        $data['gurdwaras'] = Gurdwara::all();
        $data['countries'] = Country::all();
        return view('forms.package-apply', $data);
    }

    public function payment(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $payment_type = $request->payment_type;
            if ($payment_type == "Bank Wire Transfer") {
                $routing_number = $request->routing_number;
                $account_number = $request->account_number;
                $amount = $request->amount;
                $data = ["payment_type" => $payment_type, "routing_number" => $routing_number, "account_number" => $account_number, "amount" => $amount, "payment_status" => "paid"];
                YatriVisa::where("id", $id)->update($data);
            } else if ($payment_type == "Check") {
                $check_number = $request->check_number;
                $date_of_check = $request->date_of_check;
                $data = ["payment_type" => $payment_type, "check_number" => $check_number, "date_of_check" => $date_of_check, "payment_status" => "paid"];
                YatriVisa::where("id", $id)->update($data);
            } else {
                $data = ["payment_type" => $payment_type, "payment_status" => "paid"];
                YatriVisa::where("id", $id)->update($data);
            }

            return redirect(url("thank-you"));
        }

        $data['all_packages'] = Package::all();
        $data['id'] = $id;
        return view('payment', $data);
    }

    public function apply($id)
    {
        $data['packages'] = Package::where("id", $id)->first();
        $data['all_packages'] = Package::all();
        return view('apply-package', $data);
    }

    public function thank_you()
    {
        return view('thank-you');
    }

    public function store_yatri_visa(Request $request)
    {
        $total_count = YatriVisa::where("state", $request->state)->count();
        $total_child_count = VisaPassengers::where("state", $request->state)->count();
        $total_count = $total_count + $total_child_count + 1;

        $package = Package::where("id", $request->package_id)->first();

        $yatri_visa = new YatriVisa();
        $photo = null;
        if($request->file('photo'))
        {
            
            $file = $request->file('photo');
            $fileName = uniqid().$file->getClientOriginalName();
            $destinationPath = public_path('photo_uploads');
            $file->move($destinationPath,$fileName);
            $photo = $fileName;
        }
        $passport = null;
        if($request->file('us_passport'))
        {
            
            $file = $request->file('us_passport');
            $fileName = uniqid().$file->getClientOriginalName();
            $destinationPath = public_path('passport_uploads');
            $file->move($destinationPath,$fileName);
            $passport = $fileName;
        }
        $greencard = null;
        if($request->file('green_card'))
        {
            
            $file = $request->file('green_card');
            $fileName = uniqid().$file->getClientOriginalName();
            $destinationPath = public_path('greencard_uploads');
            $file->move($destinationPath,$fileName);
            $greencard = $fileName;
        }
        $drivinglicense = null;
        if($request->file('driving_license'))
        {
            
            $file = $request->file('driving_license');
            $fileName = uniqid().$file->getClientOriginalName();
            $destinationPath = public_path('drivinglicense_uploads');
            $file->move($destinationPath,$fileName);
            $drivinglicense = $fileName;
        }
        $yatri_visa->package_id = $request->package_id;
        $yatri_visa->yatri_id = $request->state."-00".$total_count;
        $yatri_visa->package_month = $request->package_month;
        $yatri_visa->package_type = $request->package_type;
        $yatri_visa->ticket_type = $request->ticket_type;
        $yatri_visa->first_name = $request->first_name;
        $yatri_visa->middle_name = $request->middle_name;
        $yatri_visa->last_name = $request->last_name;
        $yatri_visa->place_birth = $request->place_birth;
        $yatri_visa->gurdwara_id = $request->gurdwara_id;
        $yatri_visa->dob = $request->dob;
        $yatri_visa->nationality = $request->nationality;
        $yatri_visa->other_nationality = $request->other_nationality;
        $yatri_visa->acquisition_date = $request->acquisition_date;
        $yatri_visa->other_passport = @$request->other_passport;
        $yatri_visa->father_name = $request->father_name;
        $yatri_visa->father_nationality = $request->father_nationality;
        $yatri_visa->mother_name = $request->mother_name;
        $yatri_visa->mother_nationality = $request->mother_nationality;
        $yatri_visa->passport = $request->passport;
        $yatri_visa->issue_date = $request->issue_date;
        $yatri_visa->expiry_date = $request->expiry_date;
        $yatri_visa->gender = $request->gender;
        $yatri_visa->marital_status = $request->marital_status;
        $yatri_visa->first_visit = $request->first_visit;
        $yatri_visa->pre_visit_date = $request->pre_visit_date;
        $yatri_visa->port_of_entry = $request->port_of_entry;
        $yatri_visa->profession = $request->profession;
        $yatri_visa->traveling_members = $request->total_traveling_members;
        $yatri_visa->gurdwara_name = $request->gurdwara_name;
        $yatri_visa->address = $request->address;
        $yatri_visa->city = $request->city;
        $yatri_visa->state = $request->state;
        $yatri_visa->zip = $request->zip;
        $yatri_visa->email_address = $request->email;
        $yatri_visa->secetary_name = $request->secetary_name;
        $yatri_visa->secretary_phone = $request->secretary_phone;
        $yatri_visa->telephone = $request->telephone;
        $yatri_visa->reference_name = $request->reference_name;
        $yatri_visa->reference_phone = $request->reference_phone;
        $yatri_visa->photo = $photo;
        $yatri_visa->us_passport = $passport;
        $yatri_visa->green_card = $greencard;
        $yatri_visa->driving_license = $drivinglicense;
        $yatri_visa->signature = $request->signature;
        $yatri_visa->payment_status = "pending";
        $yatri_visa->save();

        if (!empty($request->passenger_first_name) && count($request->passenger_first_name) > 0) {
            $input = $request->all();
            foreach ($request->passenger_first_name as $key => $value) {
                $total_parent_count = YatriVisa::where("state", $request->passenger_state[$key])->count();
                $total_child_count = VisaPassengers::where("state", $request->passenger_state[$key])->count();
                $total_count = $total_parent_count + $total_child_count + 1;

                $passenger_photo = null;
                if(!empty($request->passenger_photo[$key]))
                {
                    
                    $file = $request->passenger_photo[$key];
                    $fileName = uniqid().$file->getClientOriginalName();
                    $destinationPath = public_path('photo_uploads');
                    $file->move($destinationPath,$fileName);
                    $passenger_photo = $fileName;
                }
                $passenger_passport = null;
                if(!empty($request->passenger_us_passport[$key]))
                {
                    $file = $request->passenger_us_passport[$key];
                    $fileName = uniqid().$file->getClientOriginalName();
                    $destinationPath = public_path('passport_uploads');
                    $file->move($destinationPath,$fileName);
                    $passenger_passport = $fileName;
                }
                $passenger_greencard = null;
                if(!empty($request->passenger_green_card[$key]))
                { 
                    $file = $request->passenger_green_card[$key];
                    $fileName = uniqid().$file->getClientOriginalName();
                    $destinationPath = public_path('greencard_uploads');
                    $file->move($destinationPath,$fileName);
                    $passenger_greencard = $fileName;
                }
                $passenger_drivinglicense = null;
                if(!empty($request->passenger_driving_license[$key]))
                {
                    $file = $request->passenger_driving_license[$key];
                    $fileName = uniqid().$file->getClientOriginalName();
                    $destinationPath = public_path('drivinglicense_uploads');
                    $file->move($destinationPath,$fileName);
                    $passenger_drivinglicense = $fileName;
                }

                $passenger = new VisaPassengers;
                $passenger->visa_id = $yatri_visa->id;
                $passenger->package_id = $request->package_id;
                $passenger->yatri_id = $request->passenger_state[$key]."-00".$total_count;    
                $passenger->first_name = @$value;    
                $passenger->middle_name = @$request->passenger_middle_name[$key];    
                $passenger->last_name = @$request->passenger_last_name[$key];    
                $passenger->place_birth = @$request->passenger_pob[$key];    
                $passenger->gurdwara_id = @$request->passenger_gurdwara_id[$key];    
                $passenger->dob = @$request->passenger_dob[$key];    
                $passenger->nationality = @$request->passenger_nationality[$key];
                $passenger->other_nationality = $request->passenger_other_nationality[$key];
                $passenger->acquisition_date = $request->passenger_acquisition_date[$key];
                $passenger->other_passport = @$request->passenger_other_passport_no[$key]; 
                $passenger->father_name = @$request->passenger_father[$key];
                $passenger->father_nationality = $request->passenger_father_nationality[$key];
                $passenger->mother_name = $request->passenger_mother_name[$key];
                $passenger->mother_nationality = $request->passenger_mother_nationality[$key];   
                $passenger->passport = @$request->passenger_passport_no[$key];
                $passenger->issue_date = $request->passenger_issue_date[$key];    
                $passenger->expiry_date = @$request->passenger_expiry_date[$key];    
                $passenger->gender = @$input['passenger_gender_'.(string)($key+1)];
                $passenger->marital_status = @$input['passenger_marital_status_'.(string)($key+1)];    
                $passenger->first_visit = @$input['passenger_first_visit_'.(string)($key+1)];    
                $passenger->pre_visit_date = @$request->passenger_pre_visit_date[$key];    
                $passenger->port_of_entry = @$request->passenger_port_of_entry[$key];    
                $passenger->profession = @$request->passenger_profession[$key];    
                $passenger->address = @$request->passenger_address[$key];    
                $passenger->city = @$request->passenger_city[$key];    
                $passenger->state = @$request->passenger_state[$key];    
                $passenger->zip = @$request->passenger_zip[$key];    
                $passenger->email_address = $request->passenger_email_address[$key];
                $passenger->secetary_name = $request->passenger_secetary_name[$key];
                $passenger->secretary_phone = $request->passenger_secretary_phone[$key];
                $passenger->telephone = @$request->passenger_telephone[$key];
                $passenger->reference_name = @$request->passenger_reference_name[$key];    
                $passenger->reference_phone = @$request->passenger_reference_phone[$key];      
                $passenger->have_passport = @$input['passenger_have_passport_'.(string)($key+1)];    
                $passenger->photo = $passenger_photo;    
                $passenger->us_passport = $passenger_passport;    
                $passenger->green_card = $passenger_greencard;    
                $passenger->driving_license = $passenger_drivinglicense;
                $passenger->save();   
            }
        }

        return redirect(url("all-packages/payment", $yatri_visa->id));
    }
}
