<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\InstitutionSponsor;
use App\Models\Payment;
use App\Models\PersonalSponsor;
use App\Models\Sponsor;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Throwable;

class SponsorsController extends Controller
{

    public function index()
    {
        $sponsors = Sponsor::all();

        return view('mgmt.index',['sponsors'=>$sponsors]);
    }


    public function create()
    {
        $countries = Country::all();
        $gevernorates = Governorate::all();
        $cities = City::all();
        $streets = Street::all();

        return view('mgmt.create',[
            'countries' => $countries,
            'gevernorates' => $gevernorates,
            'cities' => $cities,
            'streets' => $streets
        ]);
    }


    public function store(Request $request)
    {
        if($request->ty == 'personal'){
            $request->validate([
               'first_name' => 'required',
                'second_name' => 'required',
                'third_name' => 'required',
                'last_name' => 'required',
                'id_number' => 'required|integer|digits:9|digits_between: 0,9|unique:personal_sponsors,id_number',
                'id_type' => 'required',
                'phone' => 'digits:9|digits_between: 0,10',
                'mobile' => 'required|digits:10|digits_between: 0,10',
                'email' => 'required|email|unique:sponsors,email',
                'governorate' => 'required',
                'city' => 'required',
                'street' => 'required',
                'address' => 'required',
                'nationality'=>'required',
                'country'=>'required',
            ]);

            DB::beginTransaction();
            try {
                $name = $request->first_name . ' ' . $request->second_name . ' ' . $request->third_name . ' ' . $request->last_name;
                $email = $request->email;
                $type = 'personal';
                $country = $request->country;
                $governorate = $request->governorate;
                $city = $request->city;
                $street = $request->street;
                $address = $request->address;
                $phone = $request->phone;
                $mobile = $request->mobile;
                $nationality = $request->nationality;
                $id_type = $request->id_type;
                $id_number = $request->id_number;


                //inserting in sponsor table (father table) and getting the ID
                $sponsor_id = Sponsor::insertGetId([
                    'name' => $name,
                    'email' => $email,
                    'type' => $type,
                    'country' => $country,
                ]);


                //inserting in personal sponsor table (child table)
                PersonalSponsor::insert([
                    'sponsor_id' => $sponsor_id,
                    'governorate' => $governorate,
                    'city' => $city,
                    'street' => $street,
                    'address' => $address,
                    'phone' => $phone,
                    'mobile' => $mobile,
                    'nationality' => $nationality,
                    'id_type' => $id_type,
                    'id_number' => $id_number
                ]);

                DB::commit();
                return redirect()->route('sponsors.index')->with('success', 'Sponsor created successfully');
            }catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            }


        }else{
            $request->validate([
                'name' => 'required',
                'contact_person'=> 'required',
                'primary_phone' => 'required|digits:9|digits_between: 0,10',
                'secondary_phone' => 'digits:9|digits_between: 0,10',
                'email' => 'required|email|unique:sponsors,email',
                'address' => 'required',
                'country'=>'required',
            ]);
            DB::beginTransaction();
            try {
                $name = $request->name;
                $email = $request->email;
                $type = 'institution';
                $country = $request->country;
                $address = $request->address;
                $contact_person = $request->contact_person;
                $primary_phone = $request->primary_phone;
                $secondary_phone = $request->secondary_phone;

                //inserting in sponsor table (father table) and getting the ID
                $sponsor_id = Sponsor::insertGetId([
                    'name' => $name,
                    'email' => $email,
                    'type' => $type,
                    'country' => $country,
                ]);

                //inserting in institution sponsor table (child table)
                InstitutionSponsor::insert([
                    'sponsor_id' => $sponsor_id,
                    'address' => $address,
                    'contact_person' => $contact_person,
                    'primary_phone' => $primary_phone,
                    'secondary_phone' => $secondary_phone
                ]);

                DB::commit();
                return redirect()->route('sponsors.index')->with('success', 'Sponsor created successfully');

            }catch (Throwable $e) {
                DB::rollBack();
                throw $e;
             }

        }
    }

    public function profile($id)
    {
        $sponsoer = Sponsor::find($id);
        return view('mgmt.profile',[
            'sponsor' => $sponsoer
        ]);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $sponsoer = Sponsor::find($id);
        $countries = Country::all();
        $gevernorates = Governorate::all();
        $cities = City::all();
        $streets = Street::all();
        return view('mgmt.edit',[
            'sponsor' => $sponsoer,
            'countries' => $countries,
            'gevernorates' => $gevernorates,
            'cities' => $cities,
            'streets' => $streets
        ]);
    }


    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        if($sponsor->type == 'personal'){
            $request->validate([
                'first_name' => 'required',
                'second_name' => 'required',
                'third_name' => 'required',
                'last_name' => 'required',
                'id_number' => 'required|integer|digits:9|digits_between: 0,9',
                'id_type' => 'required',
                'phone' => 'digits:9|digits_between: 0,10',
                'mobile' => 'required|digits:10|digits_between: 0,10',
                'email' => 'required',
                'governorate' => 'required',
                'city' => 'required',
                'street' => 'required',
                'address' => 'required',
                'nationality'=>'required',
                'country'=>'required',
            ]);

            DB::beginTransaction();
            try {
                $name = $request->first_name . ' ' . $request->second_name . ' ' . $request->third_name . ' ' . $request->last_name;
                $email = $request->email;
                $country = $request->country;
                $governorate = $request->governorate;
                $city = $request->city;
                $street = $request->street;
                $address = $request->address;
                $phone = $request->phone;
                $mobile = $request->mobile;
                $nationality = $request->nationality;
                $id_type = $request->id_type;
                $id_number = $request->id_number;

                //updating father table
                $sponsor->name=$name;
                $sponsor->email=$email;
                $sponsor->country=$country;
                $sponsor->save();

                //updating child table
                $personalSponsor = $sponsor->personalSponsor;
                $personalSponsor->governorate=$governorate;
                $personalSponsor->city=$city;
                $personalSponsor->street=$street;
                $personalSponsor->address=$address;
                $personalSponsor->phone=$phone;
                $personalSponsor->mobile=$mobile;
                $personalSponsor->nationality=$nationality;
                $personalSponsor->id_type=$id_type;
                $personalSponsor->id_number=$id_number;
                $personalSponsor->save();

                DB::commit();
                return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully');

            }catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            }
        }else{
            $request->validate([
                'name' => 'required',
                'contact_person'=> 'required',
                'primary_phone' => 'required|digits:9|digits_between: 0,10',
                'secondary_phone' => 'digits:9|digits_between: 0,10',
                'email' => 'required|email',
                'address' => 'required',
                'country'=>'required',
            ]);
            DB::beginTransaction();
            try {
                $name = $request->name;
                $email = $request->email;
                $country = $request->country;
                $address = $request->address;
                $contact_person = $request->contact_person;
                $primary_phone = $request->primary_phone;
                $secondary_phone = $request->secondary_phone;

                //updating father table
                $sponsor->name=$name;
                $sponsor->email=$email;
                $sponsor->country=$country;
                $sponsor->save();

                //updating child table
                $institutionSponsor = $sponsor->institutionSponsor;
                $institutionSponsor->address=$address;
                $institutionSponsor->contact_person=$contact_person;
                $institutionSponsor->primary_phone=$primary_phone;
                $institutionSponsor->secondary_phone=$secondary_phone;
                $institutionSponsor->save();



                DB::commit();
                return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully');

            }catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            }
        }
    }


    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();
        return redirect()->route('sponsors.index')->with('success', 'Sponsor deleted successfully');
    }


    public function beneficiariesIndex($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $beneficiaries = $sponsor->beneficiaries;

        return view('mgmt.showBeneficiaries',[
            'sponsor' => $sponsor,
            'beneficiaries' => $beneficiaries
        ]);
    }


    public function showLateSponsors()
    {
        //define sponsors who are late to their payments to their beneficiaries (yearly)
        $kafalat_yearly_done = DB::table('beneficiary_sponsor as bs')
                ->join('family_members as b','bs.beneficiary_id','=','b.id')
                ->join('sponsors as s','bs.sponsor_id','=','s.id')
                ->where('bs.sponsorship_type','=','yearly')
                ->join('payments as p','p.sponsor_id','=','s.id')
                ->join('payments_benfs as pb','pb.beneficiary_id','=','b.id')
                ->where('bs.created_at','>',DB::raw('DATE_SUB(CURDATE(), INTERVAL 1 YEAR)'))
                ->get([
                    's.id as sponsor_id',
                    's.name as sponsor_name',
                    'b.id as beneficiary_id',
                    'b.name as beneficiary_name',
                    'bs.sponsorship_type as sponsorship_type',
                    'bs.created_at as sponsorship_date',
                    ]);

        $kafalat_yearly_total = DB::table('beneficiary_sponsor as bs')
            ->join('family_members as b','bs.beneficiary_id','=','b.id')
            ->join('sponsors as s','bs.sponsor_id','=','s.id')
            ->where('bs.sponsorship_type','=','yearly')
            ->get([
                's.id as sponsor_id',
                's.name as sponsor_name',
                'b.id as beneficiary_id',
                'b.name as beneficiary_name',
                'bs.sponsorship_type as sponsorship_type',
                'bs.created_at as sponsorship_date',
            ]);


        //get difference between two queries above and
        // return the result as an array that contains beneficiary_id and sponsor_id as key_value pairs
        $kyd=$kafalat_yearly_done->pluck('sponsor_id','beneficiary_id')->toArray();
        $kyt=$kafalat_yearly_total->pluck('sponsor_id','beneficiary_id')->toArray();
        $kydiff=array_diff_assoc($kyt,$kyd);


        //make query to get sponsors and beneficiaries based on array of difference above
        $kyl = DB::table('beneficiary_sponsor as bs')
            ->join('family_members as b','bs.beneficiary_id','=','b.id')
            ->join('sponsors as s','bs.sponsor_id','=','s.id')
            ->where('bs.sponsorship_type','=','yearly')
            ->whereIn('b.id',array_keys($kydiff))
            ->whereIn('s.id',array_values($kydiff))
            ->get([
                's.id as sponsor_id',
                's.name as sponsor_name',
                'b.id as beneficiary_id',
                'b.name as beneficiary_name',
                'bs.sponsorship_type as sponsorship_type',
                'bs.created_at as sponsorship_date',
            ]);




        //define sponsors who are late to their payments to their beneficiaries (monthly)
        $kafalat_monthly_done = DB::table('beneficiary_sponsor as bs')
            ->join('family_members as b','bs.beneficiary_id','=','b.id')
            ->join('sponsors as s','bs.sponsor_id','=','s.id')
            ->where('bs.sponsorship_type','=','monthly')
            ->join('payments as p','p.sponsor_id','=','s.id')
            ->join('payments_benfs as pb','pb.beneficiary_id','=','b.id')
            ->where('bs.created_at','>',DB::raw('DATE_SUB(CURDATE(), INTERVAL 1 MONTH)'))
            ->get([
                's.id as sponsor_id',
                's.name as sponsor_name',
                'b.id as beneficiary_id',
                'b.name as beneficiary_name',
                'bs.sponsorship_type as sponsorship_type',
                'bs.created_at as sponsorship_date',
            ]);

        $kafalat_monthly_total = DB::table('beneficiary_sponsor as bs')
            ->join('family_members as b','bs.beneficiary_id','=','b.id')
            ->join('sponsors as s','bs.sponsor_id','=','s.id')
            ->where('bs.sponsorship_type','=','monthly')
            ->get([
                's.id as sponsor_id',
                's.name as sponsor_name',
                'b.id as beneficiary_id',
                'b.name as beneficiary_name',
                'bs.sponsorship_type as sponsorship_type',
                'bs.created_at as sponsorship_date',
            ]);

        //get difference between two queries above and
        // return the result as an array that contains beneficiary_id and sponsor_id as key_value pairs
        $kmd=$kafalat_monthly_done->pluck('sponsor_id','beneficiary_id')->toArray();
        $kmt=$kafalat_monthly_total->pluck('sponsor_id','beneficiary_id')->toArray();
        $kmdiff=array_diff_assoc($kmt,$kmd);

        //make query to get sponsors and beneficiaries based on array of difference above
        $kml = DB::table('beneficiary_sponsor as bs')
            ->join('family_members as b','bs.beneficiary_id','=','b.id')
            ->join('sponsors as s','bs.sponsor_id','=','s.id')
            ->where('bs.sponsorship_type','=','monthly')
            ->whereIn('b.id',array_keys($kmdiff))
            ->whereIn('s.id',array_values($kmdiff))
            ->get([
                's.id as sponsor_id',
                's.name as sponsor_name',
                'b.id as beneficiary_id',
                'b.name as beneficiary_name',
                'bs.sponsorship_type as sponsorship_type',
                'bs.created_at as sponsorship_date',
            ]);

        //merge the two collections above
        $kl = $kyl->merge($kml);



        return view('mgmt.showLateSponsors',[
            'kl' => $kl
        ]);

    }



    //function to send sms to sponsor to alert him of being late to a payment using his phone number via nexmo package(vonage)
    public function sendSms(Request $request,$id)
    {
        $basic  = new \Vonage\Client\Credentials\Basic("92a22bb0", "ZMhQdZKF6xXbQ2lu");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("+970595659651", 'Nepras', 'أنت متأخر على الدفع برجاء الإنتباه')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return redirect()->back()->with('success', 'SMS sent successfully');
        } else {
            return redirect()->back()->with('error', 'SMS not sent');
        }

    }



}

