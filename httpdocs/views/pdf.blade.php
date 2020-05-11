<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .page-break {
        page-break-after: always;
        }
        </style>
    </style>
</head>
<body>
    <div class="container-fluid">
        
        <table width="100%">
            <tr>
                <td><h6><strong>Student membership application form</strong></h6><br><br>I would like to change to TK as of
                {{ $travel_date }}</td>
                <td height="100">
                <img src="assets/tk_logo_eps.png" class="float-center" alt="tk_logo" width="100" height="100">
                </td>
            </tr>
            <tr>
                <td><h6><u>Personal Information</u></h6></td>
                <td><h6><u>Details on your studies</u></h6></td>
            </tr>
            <tr>
                <td class="small"><strong>Gender: </strong> {{ $gender }}</td>
                <td class="small"><strong>Degree: </strong> {{ $degree }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>First Name: </strong> {{ $firstname }}</td>
                <td class="small"><strong>University: </strong> {{ $university }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Last Name: </strong> {{ $lastname }}</td>
                <td class="small"><strong>Semester Beginning: </strong> {{ $semester_begin }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Birthday: </strong> {{ $birthday }}</td>
                <td class="small"><strong>Name of Program: </strong> {{ $name_of_program }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Place of Birth: </strong> {{ $place_of_birth }}</td>
                <td class="small"><strong>Expected Graduation Date: </strong> {{ $expected_graduation_date }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Country of Birth: </strong> {{ $country_of_birth }}</td>
                <td class="small"></td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Nationality: </strong> {{ $nationality }}</td>
                <td><h6><u>Bank Information</u></h6></td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Phone Number: </strong> {{ $phone_number }}</td>
                <td class="small"><strong>Bank Name: </strong> {{ $bank_name }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Email: </strong> {{ $email }}</td>
                <td class="small"><strong>Bank IBAN: </strong> {{ $bank_iban }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"></td>
                <td class="small"><strong>Bank Account Number: </strong> {{ $bank_acount_number }}</td>
            </tr>
            <tr>
                <td width="50%"><h6><u>Travel Details</u></h6></td>
                <td class="small"><strong>Bank Branch Code: </strong> {{ $bank_branch_code }}</td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Travel Date: </strong> {{ $travel_date }}</td>
                <td class="small" style="border: 1px solid">
                    @if ($terms_c_confirmed === "1")
                    By signing this application form, I have read and understood the terms and conditions policy. 
                    @else
                    I do not confirm the terms and conditions policy. 
                    @endif
                </td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Nominee Date of Birth: </strong> {{ $nominee_date_of_birth }}</td>
                <td width="50%" class="small" style="border: 1px solid">
                    @if ($sepa_mandate_confirmed === "1")
                    I agree with the issuance of a SEPA direct debit mandate for the chosen Insurance Company.
                    @else
                    <strong>Please note: </strong> I do not confirm with the issuance of a SEPA direct debit mandate for the chosen Insurance Company.
                    @endif
                </td>
            </tr>
            <tr>
                <td width="50%" class="small"><strong>Nominee Name: </strong> {{ $nominee_name }}</td>
                <td width="50%" class="small" style="border: 1px solid">
                    @if ($private_thi_confirmed === "1")
                    I also would like to apply for Private Travel Health Insurance to cover the VISA requirements for German Student Visa.
                    @else
                    <strong>Please note: </strong> I do not want to apply for Private Travel Health Insurance to cover the VISA requirements for German Student Visa.
                    @endif
                </td>
            </tr>
        </table> 
            <div class="row">
                <div class="col mt-2">
                    <p style="font-size: 10px !important"><strong>Comments: </strong> {{ $comments }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p style="font-size: 10px !important">We require personal data (social data) in order to carry out our tasks correctly. The legal basis for this is Section 284 SGB V [German Social Security Code, Book V] and Section 94 SGB XI. The information about TK's data processing pursuant to Article 13 DSGVO [EU General Data Protection Regulation] is available on www.tk.de/dataprotection. 7 Hereby I am informed that TK informs the sales partner for billing purposes about a membership that has come about. </p>
                </div>
            </div>
        <table width="100%">
            <tr>
                <td width="50%" class="small">
                    <img src="{{ $signature_img }}" alt="" width="300px"><br>
                    ____________________________________________<br>Date, signature (legal representative, if applicable)
                </td>
                <td width="50%" class="small">
                    <strong><u>Daten des Beraters:</u></strong><br>
                    <strong>Gesellschaft, Name: </strong>fine&fair UG (haftungsberschränkt)<br>
                    <strong>PLZ, Standort: </strong>76297 Stutensee<br>
                    <strong>Telefon: </strong>017682001957<br>
                    <strong>TK-Partnernummer: </strong>T0208078J6<br>
                </td>
            </tr>
        </table>
            
            
               
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>