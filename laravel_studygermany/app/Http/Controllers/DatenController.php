<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\InsuranceApplication;
use App\Mail\WillkommensMail;
use PDF;
//use Illuminate\Validation\Validator; 
use Validator;

class DatenController extends Controller
{
    public function store(Request $request)
    {
            //$this->validate($request,

            $validator = Validator::make($request->all(),
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'birthday' => 'required',
                'place_of_birth' => 'required',
                'country_of_birth' => 'required',
                'nationality' => 'required',
                'phone_number' => 'required',
                //'email' => 'required|unique:students,email,$this->id,id',
                'degree' => 'required',
                'university' => 'required',
                'semester_begin' => 'required',
                'name_of_program' => 'required',
                'expected_graduation_date' => 'required',
                'travel_date' => 'required',
                'nominee_name' => 'required',
                'nominee_date_of_birth' => 'required',
                'admit_letter' => 'file|required|max:2024',
                'passport_first_page' => 'file|required|max:2024',
                'passport_last_page' => 'file|required|max:2024',
                'sepa_mandate_confirmed' => 'required',
                'nominee_name' => 'required',
                'terms_c_confirmed' => 'required',
                'signature' => 'required'
            ]); 

            if ($validator->passes()) {


            //return response()->json(['success'=>'Added new records.']);

            $student = new student;
            $student->gender = request('gender') ?? 0;
            $student->firstname  = request('firstname') ?? 0;
            // $student->signature = request('signature') ?? 0;
            $student->lastname = request('lastname') ?? 0;
            $student->birthday = request('birthday') ?? 0;
            $student->place_of_birth = request('place_of_birth') ?? 0;
            $student->country_of_birth = request('country_of_birth') ?? 0;
            $student->nationality = request('nationality') ?? 0;
            $student->phone_number = request('phone_number') ?? 0;
            $student->email = request('email') ?? 0;
            $student->degree = request('degree') ?? 0;
            $student->university = request('university') ?? 0;
            $student->semester_begin = request('semester_begin') ?? 0;
            $student->name_of_program = request('name_of_program') ?? 0;
            $student->expected_graduation_date = request('expected_graduation_date') ?? 0;
            $student->bank_name = request('bank_name') ?? 'no bank details';
            $student->bank_iban = request('bank_iban') ?? 'no bank details';
            $student->bank_acount_number = request('bank_acount_number') ?? 'no bank details';
            $student->bank_branch_code = request('bank_branch_code') ?? 'no bank details';
            $student->travel_date = request('travel_date') ?? 0;
            $student->nominee_name = request('nominee_name') ?? 0;
            $student->nominee_date_of_birth = request('nominee_date_of_birth') ?? 0;
            $student->comments = request('comments') ?? 'no comment';
            $student->sepa_mandate_confirmed = request('sepa_mandate_confirmed') ?? 0;
            $student->terms_c_confirmed = request('terms_c_confirmed') ?? 0;
            $student->private_thi_confirmed = request('private_thi_confirmed') ?? 0;

            if ($request->hasFile('admit_letter')) {
                $filenameWithExt = $request->file('admit_letter')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('admit_letter')->getClientOriginalExtension();
                $fileNameToStore_admit = $filename.'_'.time().'.'.$extension;
                $spath = $request->file('admit_letter')->storeAs('public/admit_letters', $fileNameToStore_admit);
             } else {
                 $fileNameToStore_admit = 'noimage.jpg';
             }
            $student->admit_letter = $fileNameToStore_admit;

            if ($request->hasFile('passport_first_page')) {
                $filenameWithExt = $request->file('passport_first_page')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('passport_first_page')->getClientOriginalExtension();
                $fileNameToStore_passport1 = $filename.'_'.time().'.'.$extension;
                $spath = $request->file('passport_first_page')->storeAs('public/passport_first_pages', $fileNameToStore_passport1);
             } else {
                 $fileNameToStore_passport1 = 'noimage.jpg';
             }
            $student->passport_first_page = $fileNameToStore_passport1;

            if ($request->hasFile('passport_last_page')) {
                $filenameWithExt = $request->file('passport_last_page')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('passport_last_page')->getClientOriginalExtension();
                $fileNameToStore_passport2 = $filename.'_'.time().'.'.$extension;
                $spath = $request->file('passport_last_page')->storeAs('public/passport_last_pages', $fileNameToStore_passport2);
             } else {
                 $fileNameToStore_passport2 = 'noimage.jpg';
             }
            $student->passport_last_page = $fileNameToStore_passport2;

            $student->save();

            $gender = $student->gender;
            $firstname  = $student->firstname;
            $lastname = $student->lastname;
            $birthday = $student->birthday;
            $place_of_birth = $student->place_of_birth;
            $country_of_birth = $student->country_of_birth;
            $nationality = $student->nationality;
            $phone_number = $student->phone_number;
            $email = $student->email;
            $degree = $student->degree;
            $university = $student->university;
            $semester_begin = $student->semester_begin;
            $name_of_program = $student->name_of_program;
            $expected_graduation_date = $student->expected_graduation_date;
            $bank_name = $student->bank_name;
            $bank_iban = $student->bank_iban;
            $bank_acount_number = $student->bank_acount_number;
            $bank_branch_code = $student->bank_branch_code;
            $travel_date = $student->travel_date;
            $nominee_name = $student->nominee_name;
            $nominee_date_of_birth = $student->nominee_date_of_birth;
            $comments = $student->comments;
            $sepa_mandate_confirmed = $student->sepa_mandate_confirmed;
            $terms_c_confirmed = $student->terms_c_confirmed;
            $private_thi_confirmed = $student->private_thi_confirmed;
            $admit_letter = $student->admit_letter;
            $admit_letter_file = $request->file('admit_letter');
            $passport_first_page = $student->passport_first_page;
            $passport_first_page_file = $request->file('passport_first_page');
            $passport_last_page = $student->passport_last_page;
            $passport_last_page_file = $request->file('passport_last_page');
            // $signatureimg = $student->signature;
            $signatureimg = request('signature');

            /*
            $data = [
                'gender' => $gender,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'birthday' => $birthday,
                'place_of_birth' => $place_of_birth,
                'country_of_birth' => $country_of_birth,
                'nationality' => $nationality,
                'phone_number' => $phone_number,
                'email' => $email,
                'degree' => $degree,
                'university' => $university,
                'semester_begin' => $semester_begin,
                'name_of_program' => $name_of_program,
                'expected_graduation_date' => $expected_graduation_date,
                'bank_name' => $bank_name,
                'bank_iban' => $bank_iban,
                'bank_acount_number' => $bank_acount_number,
                'bank_branch_code' => $bank_branch_code,
                'travel_date' => $travel_date,
                'nominee_name' => $nominee_name,
                'nominee_date_of_birth' => $nominee_date_of_birth,
                'comments' => $comments,
                'sepa_mandate_confirmed' => $sepa_mandate_confirmed,
                'terms_c_confirmed' => $terms_c_confirmed,
                'signature_img' => $signatureimg,
                'private_thi_confirmed' => $private_thi_confirmed
            ];
            */

            // $pdf = PDF::loadView('pdf', $data);

            // $pdf_content = $pdf->output();

            if (request('is-already-saved')) {
                return view('thankyou');
            }
            else {
				$emails = array("roman@wizzy-sounds.com", "roman.e.decker@gmail.com", "a.tschernyschow@fineandfair.de");
				
                Mail::to($emails)->send(new InsuranceApplication(
                    $gender,
                    $firstname,
                    $lastname,
                    $birthday,
                    $place_of_birth,
                    $country_of_birth,
                    $nationality,
                    $phone_number,
                    $email,
                    $degree,
                    $university,
                    $semester_begin,
                    $name_of_program,
                    $expected_graduation_date,
                    $bank_name,
                    $bank_iban,
                    $bank_acount_number,
                    $bank_branch_code,
                    $travel_date,
                    $nominee_name,
                    $nominee_date_of_birth,
                    $comments,
                    $sepa_mandate_confirmed,
                    $terms_c_confirmed,
                    $private_thi_confirmed,
                    $admit_letter,
                    $admit_letter_file,
                    $passport_first_page,
                    $passport_first_page_file,
                    $passport_last_page,
                    $passport_last_page_file,
                    request('pdf')
                ));

                Mail::to(request('email'))->send(new WillkommensMail(
                
                        
                ));
            }
        }
    
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
