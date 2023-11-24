<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageDetails;
use App\Models\PriceDetails;
use App\Models\YatariPackage;
use App\Models\YatriVisa;
use App\Models\VisaPassengers;
use App\Models\Remarks;
use App\Models\User;
use App\Models\Events;
use App\Models\News;
use App\Models\Hotels;
use App\Models\Bus;
use App\Models\Locations;
use App\Models\Gallery;
use App\Models\YatriIds;

class PackagesController extends Controller
{
    public function index()
    {
        $data = Package::all();
        $yatri_package =  Package::all();
        return view('admin.packages.packages',['packages'=>$data],['yatri_package'=>$yatri_package]);
    }

    public function users()
    {
        $data = Package::all();
        $users = User::where('role', 'user')->get();
        return view('admin.users',['packages'=>$data],['users'=>$users]);
    }

    public function booking_detail($id)
    {
        $data['yatri'] = YatriVisa::with("passenger", "package", "gurdwara", "hotel", "bus")->where('id',$id)->first();
        return view('admin.booking-detail', $data);
    }

    public function airline_list()
    {
        $data['yatri'] = YatriVisa::with("passenger")->get();
        return view('admin.airline-list', $data);
    }

    public function visa()
    {
        $data['visa'] = YatriVisa::with("passenger", "package", "gurdwara", "hotel", "bus")->get();
        return view('admin.visa.visa', $data);
    }

    public function visa_detail($id)
    {
        $data['visa'] = YatriVisa::with("passenger", "package", "gurdwara", "hotel", "bus")->where('id', $id)->first();
        return view('admin.visa.visa_detail', $data);
    }

    public function sub_visa_detail($id)
    {
        $data['visa'] = VisaPassengers::with("package", "gurdwara", "hotel", "bus")->where('id', $id)->first();
        return view('admin.visa.sub_visa_detail', $data);
    }

    public function invitation_detail()
    {
        $data['detail'] = YatriVisa::with("passenger", "package", "gurdwara", "hotel", "bus")->get();
        return view('admin.invitation-detail', $data);
    }

    public function add_remarks(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $data['user_id'] = $id;
            Remarks::create($data);

            return back()->with("success", "Remarks Added Successfully!");
        }
        $data['packages'] = Package::all();
        $data['remarks'] = Remarks::where("user_id", $id)->get();
        $data['id'] = $id;
        return view('admin.add-remarks', $data);
    }

    public function delete_users($id)
    {
        $user = User::where('id', $id);
        if($user)
        {
            $user->delete();
            return back()->with("success", "User Deleted Successfully!");
        }
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('assets/flyers');
                $file->move($destinationPath,$fileName);
            }

            $package = new Package;
            $package->name = @$data['package_name'];
            $package->state = @$data['state'];
            $package->month_year = @$data['month_year'];
            $package->round_single_price = @$data['round_single_price'];
            $package->round_double_price = @$data['round_double_price'];
            $package->round_triple_price = @$data['round_triple_price'];
            $package->round_way_description = @$data['round_way_description'];
            $package->one_single_price = (int)@$data['one_single_price'];
            $package->one_double_price = @$data['one_double_price'];
            $package->one_triple_price = @$data['one_triple_price'];
            $package->one_way_description = @$data['one_way_description'];
            $package->image = @$fileName;
            $package->description = @$data['description'];
            $package->save();

            $package_details = new PackageDetails;
            $package_details->package_id = @$package->id;
            $package_details->day_1 = @$data['day_1'];
            $package_details->plan_1 = @$data['plan_1'];
            $package_details->no_1 = @$data['no_1'];
            $package_details->day_2 = @$data['day_2'];
            $package_details->plan_2 = @$data['plan_2'];
            $package_details->no_2 = @$data['no_2'];
            $package_details->day_3 = @$data['day_3'];
            $package_details->plan_3 = @$data['plan_3'];
            $package_details->no_3 = @$data['no_3'];
            $package_details->day_4 = @$data['day_4'];
            $package_details->plan_4 = @$data['plan_4'];
            $package_details->no_4 = @$data['no_4'];
            $package_details->day_5 = @$data['day_5'];
            $package_details->plan_5 = @$data['plan_5'];
            $package_details->no_5 = @$data['no_5'];
            $package_details->day_6 = @$data['day_6'];
            $package_details->plan_6 = @$data['plan_6'];
            $package_details->no_6 = @$data['no_6'];
            $package_details->day_7 = @$data['day_7'];
            $package_details->plan_7 = @$data['plan_7'];
            $package_details->no_7 = @$data['no_7'];
            $package_details->day_8 = @$data['day_8'];
            $package_details->plan_8 = @$data['plan_8'];
            $package_details->no_8 = @$data['no_8'];
            $package_details->save();

            $price_details = new PriceDetails;
            $price_details->package_id = @$package->id;
            $price_details->single_ticket = @$data['single_ticket'];
            $price_details->double_ticket = @$data['double_ticket'];
            $price_details->triple_ticket = @$data['triple_ticket'];
            $price_details->single_isb_to_lhr = @$data['single_isb_to_lhr'];
            $price_details->double_isb_to_lhr = @$data['double_isb_to_lhr'];
            $price_details->triple_isb_to_lhr = @$data['triple_isb_to_lhr'];
            $price_details->single_tolls = @$data['single_tolls'];
            $price_details->double_tolls = @$data['double_tolls'];
            $price_details->triple_tolls = @$data['triple_tolls'];
            $price_details->single_isb_hotel = @$data['single_isb_hotel'];
            $price_details->double_isb_hotel = @$data['double_isb_hotel'];
            $price_details->triple_isb_hotel = @$data['triple_isb_hotel'];
            $price_details->single_transport = @$data['single_transport'];
            $price_details->double_transport = @$data['double_transport'];
            $price_details->triple_transport = @$data['triple_transport'];
            $price_details->single_lhr_hotel = @$data['single_lhr_hotel'];
            $price_details->double_lhr_hotel = @$data['double_lhr_hotel'];
            $price_details->triple_lhr_hotel = @$data['triple_lhr_hotel'];
            $price_details->single_food = @$data['single_food'];
            $price_details->double_food = @$data['double_food'];
            $price_details->triple_food = @$data['triple_food'];
            $price_details->single_visa = @$data['single_visa'];
            $price_details->double_visa = @$data['double_visa'];
            $price_details->triple_visa = @$data['triple_visa'];
            $price_details->single_misc = @$data['single_misc'];
            $price_details->double_misc = @$data['double_misc'];
            $price_details->triple_misc = @$data['triple_misc'];
            $price_details->single_margin = @$data['single_margin'];
            $price_details->double_margin = @$data['double_margin'];
            $price_details->triple_margin = @$data['triple_margin'];
            $price_details->single_local_tour = @$data['single_local_tour'];
            $price_details->double_local_tour = @$data['double_local_tour'];
            $price_details->triple_local_tour = @$data['triple_local_tour'];
            $price_details->single_crew = @$data['single_crew'];
            $price_details->double_crew = @$data['double_crew'];
            $price_details->triple_crew = @$data['triple_crew'];
            $price_details->single_kartarpur = @$data['single_kartarpur'];
            $price_details->double_kartarpur = @$data['double_kartarpur'];
            $price_details->triple_kartarpur = @$data['triple_kartarpur'];
            $price_details->single_nanakana = @$data['single_nanakana'];
            $price_details->double_nanakana = @$data['double_nanakana'];
            $price_details->triple_nanakana = @$data['triple_nanakana'];
            $price_details->save();

            $response = array('status'=>'1','message'=>'Package is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }

        $data['action'] = url('/admin/apply_packages/create');
        $data['btn_text'] = "Create";
        return view('admin.packages.create_edit', $data);
    }

    public function edit(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('assets/flyers');
                $file->move($destinationPath,$fileName);
            }

            $package = [
                "name" => @$data['package_name'],
                "state" => @$data['state'],
                "month_year" => @$data['month_year'],
                "round_single_price" => @$data['round_single_price'],
                "round_double_price" => @$data['round_double_price'],
                "round_triple_price" => @$data['round_triple_price'],
                "round_way_description" => @$data['round_way_description'],
                "one_single_price" => @$data['one_single_price'],
                "one_double_price" => @$data['one_double_price'],
                "one_triple_price" => @$data['one_triple_price'],
                "one_way_description" => @$data['one_way_description'],
                "description" => @$data['description']
            ];
            if (!empty(@$fileName)) {
                $package["image"] = $fileName;
            }
            Package::where("id", $id)->update($package);

            $package_details = [
                "day_1" => @$data['day_1'],
                "plan_1" => @$data['plan_1'],
                "no_1" => @$data['no_1'],
                "day_2" => @$data['day_2'],
                "plan_2" => @$data['plan_2'],
                "no_2" => @$data['no_2'],
                "day_3" => @$data['day_3'],
                "plan_3" => @$data['plan_3'],
                "no_3" => @$data['no_3'],
                "day_4" => @$data['day_4'],
                "plan_4" => @$data['plan_4'],
                "no_4" => @$data['no_4'],
                "day_5" => @$data['day_5'],
                "plan_5" => @$data['plan_5'],
                "no_5" => @$data['no_5'],
                "day_6" => @$data['day_6'],
                "plan_6" => @$data['plan_6'],
                "no_6" => @$data['no_6'],
                "day_7" => @$data['day_7'],
                "plan_7" => @$data['plan_7'],
                "no_7" => @$data['no_7'],
                "day_8" => @$data['day_8'],
                "plan_8" => @$data['plan_8'],
                "no_8" => @$data['no_8']
            ];

            PackageDetails::where("package_id", $id)->update($package_details);

            $price_details = [
                "single_ticket" => @$data['single_ticket'],
                "double_ticket" => @$data['double_ticket'],
                "triple_ticket" => @$data['triple_ticket'],
                "single_isb_to_lhr" => @$data['single_isb_to_lhr'],
                "double_isb_to_lhr" => @$data['double_isb_to_lhr'],
                "triple_isb_to_lhr" => @$data['triple_isb_to_lhr'],
                "single_tolls" => @$data['single_tolls'],
                "double_tolls" => @$data['double_tolls'],
                "triple_tolls" => @$data['triple_tolls'],
                "single_isb_hotel" => @$data['single_isb_hotel'],
                "double_isb_hotel" => @$data['double_isb_hotel'],
                "triple_isb_hotel" => @$data['triple_isb_hotel'],
                "single_transport" => @$data['single_transport'],
                "double_transport" => @$data['double_transport'],
                "triple_transport" => @$data['triple_transport'],
                "single_lhr_hotel" => @$data['single_lhr_hotel'],
                "double_lhr_hotel" => @$data['double_lhr_hotel'],
                "triple_lhr_hotel" => @$data['triple_lhr_hotel'],
                "single_food" => @$data['single_food'],
                "double_food" => @$data['double_food'],
                "triple_food" => @$data['triple_food'],
                "single_visa" => @$data['single_visa'],
                "double_visa" => @$data['double_visa'],
                "triple_visa" => @$data['triple_visa'],
                "single_misc" => @$data['single_misc'],
                "double_misc" => @$data['double_misc'],
                "triple_misc" => @$data['triple_misc'],
                "single_margin" => @$data['single_margin'],
                "double_margin" => @$data['double_margin'],
                "triple_margin" => @$data['triple_margin'],
                "single_local_tour" => @$data['single_local_tour'],
                "double_local_tour" => @$data['double_local_tour'],
                "triple_local_tour" => @$data['triple_local_tour'],
                "single_crew" => @$data['single_crew'],
                "double_crew" => @$data['double_crew'],
                "triple_crew" => @$data['triple_crew'],
                "single_kartarpur" => @$data['single_kartarpur'],
                "double_kartarpur" => @$data['double_kartarpur'],
                "triple_kartarpur" => @$data['triple_kartarpur'],
                "single_nanakana" => @$data['single_nanakana'],
                "double_nanakana" => @$data['double_nanakana'],
                "triple_nanakana" => @$data['triple_nanakana']
            ];
            
            PriceDetails::where("package_id", $id)->update($price_details);

            $response = array('status'=>'1','message'=>'Package is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }

        $data['package'] = Package::with('package_details', 'price_details')->where("id", $id)->first();
        $data['action'] = url('/admin/apply_packages/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.packages.create_edit', $data);
    }

    public function profile(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if (!empty($data['password'])) {
                $data['password'] = \Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
            $Obj = User::find(\Auth::user()->id);
            $Obj->update($data);
            $response = array('status'=>'1', 'message'=>'Profile is updated sucessfully.', 'action'=>'reload');
            echo json_encode($response); return;
        }

        $data["user"] = User::where('id', \Auth::user()->id)->first();
        return view('admin.profile', $data);
    }

    public function edit_yatri_package($id)
    {
        $yatri = YatariPackage::where('id',$id)->first();
        if($yatri)
        {
            return response()->json($yatri,200);
        }
        else
        {
            return response()->json(['error' => 'Yatri not found'], 404);
        }
    }

    public function update_yatri_package(Request $request)
    {
        $yatri = YatariPackage::where('id',$request->id)->first();
        if($yatri)
        {
            $yatri->month = $request->month;
            $yatri->single_price = $request->single_price;
            $yatri->double_price = $request->double_price;
            $yatri->triple_price = $request->triple_price;
            $yatri->save();
            return back()->with('success','Package Updated Successfully');
        }
        else
        {
            return back()->with('error','Something went Wrong');
        }
    }

    public function delete($id)
    {
        $package = Package::where('id', $id);
        if($package)
        {
            $package->delete();
            PackageDetails::where('package_id', $id)->delete();
            PriceDetails::where('package_id', $id)->delete();
            return back()->with("success", "Package Deleted Successfully");
        }
    }

    public function store(Request $request)
    {
        // $date =  \Carbon\Carbon::parse($request->date_1st);
        // $nextDay = $date->addDay();
        // dd($request->date_1st,$nextDay->format('Y-m-d'));
        $package = new Package();
        $package->create([
            'g_name'=>$request->g_name,
            'state'=>$request->state,
            'month' =>$request->month,
            'date_1st' =>$request->date_1st,
        ]);
        return back()->with('success','Package Applied Successfuly');
    }

    public function yatri_visa()
    {
        $yatries = YatriVisa::with("package")->get();
        return view('admin.packages.yatri',compact('yatries'));
    }

    public function passenger_list(Request $request)
    {
        $data['yatries'] = YatriVisa::with("passenger", "package", "package.price_details", "package.package_details");
        if (!empty($request->state) && $request->state !== "all") {
            $data['state'] = $request->state;
            $data['yatries'] = $data['yatries']->where("package_id", $request->state);
        }
        if (!empty($request->ticket_type) && $request->ticket_type !== "all") {
            $data['ticket_type'] = $request->ticket_type;
            $data['yatries'] = $data['yatries']->where("ticket_type", $request->ticket_type);
        }
        $data['yatries'] = $data['yatries']->get();
        $data['packages'] = Package::all();
        return view('admin.passenger-list', $data);
    }

    public function view_yatri_visa($id)
    {
        $yatri = YatriVisa::with("passenger", "gurdwara", "hotel", "bus")->where('id',$id)->first();
        if($yatri)
        {
            $data['yatri'] = $yatri;
            $data['bus'] = Bus::all();
            $data['hotel'] = Hotels::all();
            return view('admin.packages.view-yatri', $data);
        }
        else
        {
            return back()->with('error','Something went wrong');
        }
    }

    public function edit_yatri_visa($id)
    {
        $packages = YatariPackage::all();
        $yatri = YatriVisa::where('id',$id)->first();
        if($yatri)
        {
            return view('admin.packages.edit-yatri',compact('yatri','packages'));
        }
        else
        {
            return back()->with('error','Something went wrong');
        }
    }
    public function delete_yatri($id)
    {
        $yatri = YatriVisa::where('id',$id)->first();
        if($yatri)
        {
            $yatri->delete();
            VisaPassengers::where("visa_id", $id)->delete();
            return back()->with('success','Yatri Visa Record Deleted Successfully');
        }
        else
        {
            return back()->with('error','Something went wrong');
        }
    }

    public function events()
    {
        $data = Events::all();
        return view('admin.events.events',['events'=>$data]);
    }

    public function create_events(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('news_and_events');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }

            Events::create($data);

            // $response = array('status'=>'1','message'=>'Event is added sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/events'))->with("success", "Events added successfully!");
        }

        $data['action'] = url('/admin/events/create');
        $data['btn_text'] = "Create";
        return view('admin.events.create_edit', $data);
    }

    public function edit_events(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('news_and_events');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }

            unset($data['_token']);
            Events::where("id", $id)->update($data);

            // $response = array('status'=>'1','message'=>'Event is updated sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/events'))->with("success", "Events updated successfully!");
        }

        $data['events'] = Events::where("id", $id)->first();
        $data['action'] = url('/admin/events/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.events.create_edit', $data);
    }

    public function delete_events($id)
    {
        $event = Events::where('id', $id);
        if($event)
        {
            $event->delete();
            return back()->with("success", "Event deleted successfully!");
        }
    }

    public function news()
    {
        $data = News::all();
        return view('admin.news.news',['news'=>$data]);
    }

    public function create_news(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('news_and_events');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }

            News::create($data);

            // $response = array('status'=>'1','message'=>'News is added sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/news'))->with("success", "News added successfully!");
        }

        $data['action'] = url('/admin/news/create');
        $data['btn_text'] = "Create";
        return view('admin.news.create_edit', $data);
    }

    public function edit_news(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('news_and_events');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }

            unset($data['_token']);
            News::where("id", $id)->update($data);

            // $response = array('status'=>'1','message'=>'Event is updated sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/news'))->with("success", "News updated successfully!");
        }

        $data['news'] = News::where("id", $id)->first();
        $data['action'] = url('/admin/news/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.news.create_edit', $data);
    }

    public function delete_news($id)
    {
        $news = News::where('id', $id);
        if($news)
        {
            $news->delete();
            return back()->with("success", "News deleted successfully!");
        }
    }

    public function hotels()
    {
        $data = Hotels::all();
        return view('admin.hotels.hotels',['hotels'=>$data]);
    }

    public function create_hotels(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('hotels');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }
            Hotels::create($data);

            // $response = array('status'=>'1','message'=>'News is added sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/hotels'))->with("success", "Hotel added successfully!");
        }

        $data['action'] = url('/admin/hotels/create');
        $data['btn_text'] = "Create";
        return view('admin.hotels.create_edit', $data);
    }

    public function edit_hotels(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('hotels');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }
            unset($data['_token']);
            Hotels::where("id", $id)->update($data);

            // $response = array('status'=>'1','message'=>'Event is updated sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/hotels'))->with("success", "Hotel updated successfully!");
        }

        $data['hotels'] = Hotels::where("id", $id)->first();
        $data['action'] = url('/admin/hotels/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.hotels.create_edit', $data);
    }

    public function delete_hotels($id)
    {
        $hotels = Hotels::where('id', $id);
        if($hotels)
        {
            $hotels->delete();
            return back()->with("success", "Hotels deleted successfully!");
        }
    }

    public function bus()
    {
        $data = Bus::all();
        return view('admin.bus.bus',['bus'=>$data]);
    }

    public function create_bus(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            Bus::create($data);

            // $response = array('status'=>'1','message'=>'News is added sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/bus'))->with("success", "Bus added successfully!");
        }

        $data['action'] = url('/admin/bus/create');
        $data['btn_text'] = "Create";
        return view('admin.bus.create_edit', $data);
    }

    public function edit_bus(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            unset($data['_token']);
            Bus::where("id", $id)->update($data);

            // $response = array('status'=>'1','message'=>'Event is updated sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/bus'))->with("success", "Bus updated successfully!");
        }

        $data['bus'] = Bus::where("id", $id)->first();
        $data['action'] = url('/admin/bus/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.bus.create_edit', $data);
    }

    public function delete_bus($id)
    {
        $bus = Bus::where('id', $id);
        if($bus)
        {
            $bus->delete();
            return back()->with("success", "Bus deleted successfully!");
        }
    }

    public function assign_hotel(Request $request)
    {
        $id = $request->visa_id;
        YatriVisa::where('id', $id)->update(["hotel_id" => $request->hotel, "room_number" => $request->room_number, "color" => $request->color]);
        VisaPassengers::where('visa_id', $id)->update(["hotel_id" => $request->hotel, "room_number" => $request->room_number, "color" => $request->color]);
        return back()->with("success", "Hotel assigned successfully!");
    }

    public function assign_bus(Request $request)
    {
        $id = $request->visa_id;
        YatriVisa::where('id', $id)->update(["bus_id" => $request->bus]);
        VisaPassengers::where('visa_id', $id)->update(["bus_id" => $request->bus]);
        return back()->with("success", "Bus assigned successfully!");
    }

    public function locations()
    {
        $data = Locations::all();
        return view('admin.locations.locations',['locations'=>$data]);
    }

    public function create_locations(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('locations');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }
            Locations::create($data);

            // $response = array('status'=>'1','message'=>'News is added sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/locations'))->with("success", "Location added successfully!");
        }

        $data['action'] = url('/admin/locations/create');
        $data['btn_text'] = "Create";
        return view('admin.locations.create_edit', $data);
    }

    public function edit_locations(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('locations');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }
            unset($data['_token']);
            Locations::where("id", $id)->update($data);

            // $response = array('status'=>'1','message'=>'Event is updated sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/locations'))->with("success", "Location updated successfully!");
        }

        $data['locations'] = Locations::where("id", $id)->first();
        $data['action'] = url('/admin/locations/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.locations.create_edit', $data);
    }

    public function delete_locations($id)
    {
        $locations = Locations::where('id', $id);
        if($locations)
        {
            $locations->delete();
            return back()->with("success", "Locations deleted successfully!");
        }
    }

    public function gallery()
    {
        $data = Gallery::all();
        return view('admin.gallery.gallery',['gallery'=>$data]);
    }

    public function create_gallery(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('gallery');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }

            Gallery::create($data);

            // $response = array('status'=>'1','message'=>'News is added sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/gallery'))->with("success", "Gallery added successfully!");
        }

        $data['action'] = url('/admin/gallery/create');
        $data['btn_text'] = "Create";
        return view('admin.gallery.create_edit', $data);
    }

    public function edit_gallery(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('image')) {   
                $file = $request->file('image');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('gallery');
                $file->move($destinationPath,$fileName);
                $data['image'] = $fileName;
            }

            unset($data['_token']);
            Gallery::where("id", $id)->update($data);

            // $response = array('status'=>'1','message'=>'Event is updated sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/gallery'))->with("success", "Gallery updated successfully!");
        }

        $data['gallery'] = Gallery::where("id", $id)->first();
        $data['action'] = url('/admin/gallery/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.gallery.create_edit', $data);
    }

    public function delete_gallery($id)
    {
        $gallery = Gallery::where('id', $id);
        if($gallery)
        {
            $gallery->delete();
            return back()->with("success", "Gallery deleted successfully!");
        }
    }

    public function ids()
    {
        $data = YatriIds::all();
        return view('admin.ids.ids',['yatri_ids'=>$data]);
    }

    public function create_ids(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('photo')) {   
                $file = $request->file('photo');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('ids');
                $file->move($destinationPath,$fileName);
                $data['photo'] = $fileName;
            }
            YatriIds::create($data);

            // $response = array('status'=>'1','message'=>'News is added sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/ids'))->with("success", "ID is added successfully!");
        }

        $data['action'] = url('/admin/ids/create');
        $data['btn_text'] = "Create";
        return view('admin.ids.create_edit', $data);
    }

    public function edit_ids(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->file('photo')) {   
                $file = $request->file('photo');
                $fileName = uniqid().$file->getClientOriginalName();
                $destinationPath = public_path('ids');
                $file->move($destinationPath,$fileName);
                $data['photo'] = $fileName;
            }
            unset($data['_token']);
            YatriIds::where("id", $id)->update($data);

            // $response = array('status'=>'1','message'=>'Event is updated sucessfully.','action'=>'reload');
            // echo json_encode($response); return;
            return redirect(url('admin/ids'))->with("success", "ID is updated successfully!");
        }

        $data['yatri_id'] = YatriIds::where("id", $id)->first();
        $data['action'] = url('/admin/ids/edit', $id);
        $data['btn_text'] = "Update";
        return view('admin.ids.create_edit', $data);
    }

    public function delete_ids($id)
    {
        $ids = YatriIds::where('id', $id);
        if($ids)
        {
            $ids->delete();
            return back()->with("success", "ID is deleted successfully!");
        }
    }

    public function yatri_id($id)
    {
        $data = new YatriIds;
        if ($id <= 1) {
            $data = $data->limit(8);
        } else {
            $offset = ((int)$id - 1) * 8;
            $data = $data->offset($offset)->limit(8);
        }
        $data = $data->get();
        $all_data['yatri_ids'] = $data;
        $all_data['id'] = (int)$id + 1;
        return view('admin.ids.yatri_id', $all_data);
    }
}
