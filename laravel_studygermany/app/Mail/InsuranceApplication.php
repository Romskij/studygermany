<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use PDF;

class InsuranceApplication extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $gender;
    public $firstname;
    public $lastname;
    public $birthday;
    public $place_of_birth;
    public $country_of_birth;
    public $nationality;
    public $phone_number;
    public $email;
    public $degree;
    public $university;
    public $semester_begin;
    public $name_of_program;
    public $expected_graduation_date;
    public $bank_name;
    public $bank_iban;
    public $bank_acount_number;
    public $bank_branch_code;
    public $travel_date;
    public $nominee_name;
    public $nominee_date_of_birth;
    public $comments;
    public $sepa_mandate_confirmed;
    public $terms_c_confirmed;
    public $private_thi_confirmed;
    public $admit_letter;
    public $admit_letter_file;
    public $passport_first_page;
    public $passport_first_page_file;
    public $passport_last_page;
    public $passport_last_page_file;
    public $pdf;
    

    public function __construct(
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
        $pdf    
    )
    {
        $this->gender = $gender;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthday = $birthday;
        $this->place_of_birth = $place_of_birth;
        $this->country_of_birth = $country_of_birth;
        $this->nationality = $nationality;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->degree = $degree;
        $this->university = $university;
        $this->semester_begin = $semester_begin;
        $this->name_of_program = $name_of_program;
        $this->expected_graduation_date = $expected_graduation_date;
        $this->bank_name = $bank_name;
        $this->bank_iban = $bank_iban;
        $this->bank_acount_number = $bank_acount_number;
        $this->bank_branch_code = $bank_branch_code;
        $this->travel_date = $travel_date;
        $this->nominee_name = $nominee_name;
        $this->nominee_date_of_birth = $nominee_date_of_birth;
        $this->comments = $comments;
        $this->sepa_mandate_confirmed = $sepa_mandate_confirmed;
        $this->terms_c_confirmed = $terms_c_confirmed;
        $this->private_thi_confirmed = $private_thi_confirmed;
        $this->admit_letter = $admit_letter;
        $this->admit_letter_file = $admit_letter_file;
        $this->passport_first_page = $passport_first_page;
        $this->passport_first_page_file = $passport_first_page_file;
        $this->passport_last_page = $passport_last_page;
        $this->passport_last_page_file = $passport_last_page_file;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $files = [$this->admit_letter_file, $this->passport_first_page_file, $this->passport_last_page_file, $this->pdf]; // array of all files to be attached 
        
        return $this->markdown('emails.InsuranceApplication')
                    ->attach($this->admit_letter_file->getRealPath(),
                    [
                        'as' => $this->admit_letter_file->getClientOriginalName(),
                        'mime' => $this->admit_letter_file->getClientMimeType(),
                    ])
                    ->attach($this->passport_first_page_file->getRealPath(),
                    [
                        'as' => $this->passport_first_page_file->getClientOriginalName(),
                        'mime' => $this->passport_first_page_file->getClientMimeType(),
                    ])
                    ->attach($this->passport_last_page_file->getRealPath(),
                    [
                        'as' => $this->passport_last_page_file->getClientOriginalName(),
                        'mime' => $this->passport_last_page_file->getClientMimeType(),
                    ])
                    ->attach(request('pdf'), [
                        'as' => 'InsuranceApplication.pdf',
                        'mime' => 'application/pdf',
                    ])
                    // ->attachData($this->pdf, 'application.pdf')
                    ;    
    }
}

