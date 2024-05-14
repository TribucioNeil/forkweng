<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <form action="<?= site_url('personalInformation') ?>" method="post">
        <h4 class="mb-3 text-uppercase fw-bold">I. PERSONAL INFORMATION</h4>
        <div class="mb-3">
            <label for="surName" class="form-label fw-bold">SURNAME</label>
            <input name="surName" id="surName" type="text" class="form-control" placeholder="SURNAME">

            <label for="firstName" class="form-label fw-bold">FIRST NAME</label>
            <input name="firstName" id="firstName" type="text" class="form-control" placeholder="FIRST NAME">

            <label for="middleName" class="form-label fw-bold">MIDDLE NAME</label>
            <input name="middleName" id="middleName" type="text" class="form-control" placeholder="MIDDLE NAME">

            <label for="suffix" class="form-label fw-bold">SUFFIX</label>
            <input name="suffix" id="suffix" type="text" class="form-control" placeholder="Ex: Sr., Jr., III, etc.">
        </div>
<br>
        <div>
            <label for="dateOfBirth" class="form-label fw-bold">DATE OF BIRTH</label>
            <input name="dateOfBirth" id="dateOfBirth" type="date" class="form-control">

            <label for="placeOfBirth" class="form-label fw-bold">PLACE OF BIRTH</label>
            <input name="placeOfBirth" id="placeOfBirth" type="text" class="form-control">
        </div>
<br>
        <div>
            <label class="form-label fw-bold">SEX</label>
            
            <input class="form-check-input" type="radio" value="male" id="male" name="sex">
            <label class="form-check-label" for="male">Male</label>

            <input class="form-check-input" type="radio" value="female" id="female" name="sex">
            <label class="form-check-label" for="female">Female</label>

            <label for="presentAddress" class="form-label fw-bold">PRESENT ADDRESS</label>
            <input name="presentAddress" id="presentAddress" type="text" class="form-control">
        </div>
<br>
        <div>
            <label for="religion" class="form-label fw-bold">RELIGION</label>
            <input name="religion" id="religion" type="text" class="form-control">

            <label for="houseNo" class="form-label fw-semibold">House no./Street Village</label>
            <input name="houseNo" id="houseNo" type="text" class="form-control">
        </div>
<br>
        <div>
            <label class="form-label fw-bold">CIVIL STATUS</label>
            
            <input class="form-check-input" type="radio" value="Single" id="single" name="civilStatus">
            <label class="form-check-label" for="single">Single</label>

            <input class="form-check-input" type="radio" value="married" id="married" name="civilStatus">
            <label class="form-check-label" for="married">Married</label>

            <input class="form-check-input" type="radio" value="widowed" id="widowed" name="civilStatus">
            <label class="form-check-label" for="widowed">Widowed</label>

            <input class="form-check-input" type="radio" value="separated" id="separated" name="civilStatus">
            <label class="form-check-label" for="separated">Separated</label>

            <input class="form-check-input" type="radio" value="liveIn" id="liveIn" name="civilStatus">
            <label class="form-check-label" for="liveIn">Live-in</label>

            <div>
                <label for="barangay" class="form-label fw-bold">Barangay</label>
                <input name="barangay" id="barangay" type="text" class="form-control">

                <label for="municipality" class="form-label fw-bold">Municipality/City</label>
                <input name="municipality" id="municipality" type="text" class="form-control">

                <label for="province" class="form-label fw-bold">Province</label>
                <input name="province" id="province" type="text" class="form-control">
            </div>

        </div>
<br>
        <div>
            <label for="tin" class="form-label fw-bold">TIN</label>
            <input name="tin" id="tin" type="text" class="form-control">

            <label for="gsis" class="form-label fw-bold">GSIS/SSS ID NO.</label>
            <input name="gsis" id="gsis" type="text" class="form-control">

            <label for="pagibig" class="form-label fw-bold">PAG-IBIG NO.</label>
            <input name="pagibig" id="pagibig" type="text" class="form-control">

            <label for="philhealth" class="form-label fw-bold">PHILHEALTH NO.</label>
            <input name="philhealth" id="philhealth" type="text" class="form-control">
        </div>
<br>
        <div>
            <label for="height" class="form-label fw-bold">HEIGHT</label>
            <input name="height" id="height" type="text" class="form-control">

            <label for="emailAddress" class="form-label fw-bold">EMAIL ADDRESS</label>
            <input name="emailAddress" id="emailAddress" type="text" class="form-control">

            <label for="landlineNumber" class="form-label fw-bold">LANDLINE NUMBER</label>
            <input name="landlineNumber" id="landlineNumber" type="text" class="form-control">

            <label for="cellphoneNumber" class="form-label fw-bold">CELLPHONE NUMBER</label>
            <input name="cellphoneNumber" id="cellphoneNumber" type="text" class="form-control">
        </div>
<br>
        <div>
            <label class="form-label fw-bold">DISABILITY</label>
            
            <input class="form-check-input" type="radio" value="Visual" id="single" name="disability">
            <label class="form-check-label" for="single">Visual</label>

            <input class="form-check-input" type="radio" value="Hearing" id="married" name="disability">
            <label class="form-check-label" for="married">Hearing</label>

            <input class="form-check-input" type="radio" value="Speech" id="widowed" name="disability">
            <label class="form-check-label" for="widowed">Speech</label>

            <input class="form-check-input" type="radio" value="Physical" id="separated" name="disability">
            <label class="form-check-label" for="separated">Physical</label>

            <input class="form-check-input" type="radio" value="others" id="others" name="disability">
            <label class="form-check-label" for="others">Others, specify:</label>
            <input id="othersInput" style="display: none;" type="text" class="form-control" name="disability" placeholder="Specify other disability">

        </div>

<br>
        <div>
            <label class="form-label fw-bold">EMPLOYMENT STATUS</label>

            <input class="form-check-input" type="radio" value="Employed" id="employed" name="employmentStatus">
            <label class="form-check-label" for="employed">Employed</label>

            <input class="form-check-input" type="radio" value="Unemployed" id="unemployed" name="employmentStatus">
            <label class="form-check-label" for="unemployed">Unemployed</label>
        </div>

        <!-- Additional options for employed -->
        <div>
            <div id="employedOptions" style="display: none;">
            <label class="form-label fw-bold">EMPLOYED TYPE</label>
                <input class="form-check-input" type="radio" value="Wage Employed" id="wageEmployed" name="employmentType">
                <label class="form-check-label" for="wageEmployed">Wage Employed</label>

                <input class="form-check-input" type="radio" value="Self Employed" id="selfEmployed" name="employmentType">
                <label class="form-check-label" for="selfEmployed">Self Employed</label>
            </div>

            <div id="unemployedOptions" style="display: none;">
            <label class="form-label fw-bold">UNEMPLOYED TYPE</label>
                <input class="form-check-input" type="radio" value="New Entrant/ Fresh Graduate" id="newEntrant" name="employmentType">
                <label class="form-check-label" for="newEntrant">New Entrant/Fresh Graduate</label>

                <input class="form-check-input" type="radio" value="Finished Contract" id="finishedContract" name="employmentType">
                <label class="form-check-label" for="finishedContract">Finished Contract</label>

                <input class="form-check-input" type="radio" value="Resigned" id="resigned" name="employmentType">
                <label class="form-check-label" for="resigned">Resigned</label>

                <input class="form-check-input" type="radio" value="Retired" id="retired" name="employmentType">
                <label class="form-check-label" for="retired">Retired</label>

                <input class="form-check-input" type="radio" value="Terminated/Laidoff(local)" id="terminatedLaidOffLocal" name="employmentType">
                <label class="form-check-label" for="terminatedLaidOffLocal">Terminated/Laidoff(local)</label>

                <input class="form-check-input" type="radio" value="othersUnemployedTypeAbroad" id="othersUnemployedTypeAbroad" name="employmentType">
                <label class="form-check-label" for="othersUnemployedTypeAbroad">Terminated/Laidoff(abroad) specify country</label>
                <input id="othersInputUnemployedType" style="display: none;" type="text" class="form-control" name="otherDisability" placeholder="Specify country">
            
                <input class="form-check-input" type="radio" value="othersUnemployedType" id="othersUnemployedType" name="employmentType">
                <label class="form-check-label" for="othersUnemployedType">Others, specify</label>
                <input id="othersInputUnemployedTypeTwo" style="display: none;" type="text" class="form-control" name="employmentType" placeholder="Specify other">
            </div>
        </div>

<br>

        <div>
            <label class="form-label fw-bold">Are you actively looking for work?</label>
            
            <input class="form-check-input" type="radio" value="Yes" id="yesActively" name="activelyLooking">
            <label class="form-check-label" for="yesActively">Yes</label>

            <input class="form-check-input" type="radio" value="No" id="noActively" name="activelyLooking">
            <label class="form-check-label" for="noActively">No</label>

            <label for="howLong" class="form-label fw-bold">How long have you been looking for work?</label>
            <input name="howLong" id="howLong" type="text" class="form-control">
            <div>
                <label class="form-label fw-bold">Willing to work immediately?</label>
                
                <input class="form-check-input" type="radio" value="Yes" id="yesWilling" name="willingWork">
                <label class="form-check-label" for="yesWilling">Yes</label>

                <input class="form-check-input" type="radio" value="No" id="noWhen" name="willingWork">
                <label class="form-check-label" for="noWhen">If no, when?</label>
                <input id="noInputWhen" style="display: none;" type="text" class="form-control" name="ifNoWilling" placeholder="Specify when">
            </div>


        </div>
        <div>
                <label class="form-label fw-bold">Are you a 4PS beneficiary?</label>
                
                <input class="form-check-input" type="radio" value="Yes" id="yesBeneficiary" name="beneficiary">
                <label class="form-check-label" for="yesBeneficiary">If yes, Household ID No.</label>
                <input id="yesInputHousehold" style="display: none;" type="text" class="form-control" name="householdId" placeholder="">
       
                <input class="form-check-input" type="radio" value="No" id="noBeneficiary" name="beneficiary">
                <label class="form-check-label" for="noBeneficiary">No</label>
        </div>



        <button class="btn btn-primary w-100" type="submit">Submit</button>
    </form>
<br>
<br>
<br>
<!-- JOB PREFERENCE FORM --> 
<h4 class="mb-3 text-uppercase fw-bold">II. JOB PREFERENCE</h4>
    <form action="<?= site_url('jobPreference') ?>" method="post">
        <label for="" class="form-label fw-bold">PREFERRED OCCUPATION</label>
        <label for="" class="form-label fw-bold">1.</label>
        <input name="occupation1" id="occupation1" type="text" class="form-control">
        <label for="" class="form-label fw-bold">2.</label>
        <input name="occupation2" id="occupation2" type="text" class="form-control">
        <label for="" class="form-label fw-bold">3.</label>
        <input name="occupation3" id="occupation3" type="text" class="form-control">
        <label for="" class="form-label fw-bold">4.</label>
        <input name="occupation4" id="occupation4" type="text" class="form-control">

        <br>
        <label class="form-label fw-bold">PREFERRED WORK LOCATION</label>

        <input class="form-check-input" type="radio" id="localLocation">
        <label class="form-check-label" for="localLocation">Local, specify cities/municipalities:</label>

        <input class="form-check-input" type="radio" id="overseasLocation">
        <label class="form-check-label" for="overseasLocation">Overseas, specify countries:</label>

        <div id="localSpecifyOptions" style="display: none;">
            <label for="" class="form-label fw-bold">1.</label>
            <input name="localSpecify1" id="localSpecify1" type="text" class="form-control" placeholder="Specify cities/municipalities">

            <label for="" class="form-label fw-bold">2.</label>
            <input name="localSpecify2" id="localSpecify2" type="text" class="form-control" placeholder="Specify cities/municipalities">

            <label for="" class="form-label fw-bold">3.</label>
            <input name="localSpecify3" id="localSpecify3" type="text" class="form-control" placeholder="Specify cities/municipalities">
        </div>

        <div id="overseasSpecifyOptions" style="display: none;">
            <label for="" class="form-label fw-bold">1.</label>
            <input name="overseasSpecify1" id="overseasSpecify1" type="text" class="form-control" placeholder="Specify countries">

            <label for="" class="form-label fw-bold">2.</label>
            <input name="overseasSpecify2" id="overseasSpecify2" type="text" class="form-control" placeholder="Specify countries">

            <label for="" class="form-label fw-bold">3.</label>
            <input name="overseasSpecify3" id="overseasSpecify3" type="text" class="form-control" placeholder="Specify countries">
        </div>
<br>

        <div>
            <label for="expectedSalary" class="form-label fw-bold">Expected Salary(Range)</label>
            <input name="expectedSalary" id="expectedSalary" type="text" class="form-control" placeholder="">

            <label for="passportNo" class="form-label fw-bold">Passport No.</label>
            <input name="passportNo" id="passportNo" type="text" class="form-control" placeholder="">

            <label for="passportExpiry" class="form-label fw-bold">Expiry date</label>
            <input name="passportExpiry" id="passportExpiry" type="text" class="form-control" placeholder="">
        </div>

        <button class="btn btn-primary w-100" type="submit">Submit</button>
    </form>

<br>
<br>
<br>
<!-- LANGUAGE/DIALECT PROFICIENCY -->
<h4 class="mb-3 text-uppercase fw-bold">III. LANGUAGE/DIALECT PROFICIENCY</h4>
    <form action="<?= site_url('jobseekerLanguage') ?>" method="post">
        <div>
            <label class="form-label fw-bold">ENGLISH</label>
            
            <input class="form-check-input" type="checkbox" value="Yes" id="englishRead" name="englishRead">
            <label class="form-check-label" for="englishRead">READ</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="englishWrite" name="englishWrite">
            <label class="form-check-label" for="englishWrite">WRITE</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="englishSpeak" name="englishSpeak">
            <label class="form-check-label" for="englishSpeak">SPEAK</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="englishUnderstand" name="englishUnderstand">
            <label class="form-check-label" for="englishUnderstand">UNDERSTAND</label>
        </div>

        <div>
            <label class="form-label fw-bold">FILIPINO</label>
            
            <input class="form-check-input" type="checkbox" value="Yes" id="filipinoRead" name="filipinoRead">
            <label class="form-check-label" for="filipinoRead">READ</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="filipinoWrite" name="filipinoWrite">
            <label class="form-check-label" for="filipinoWrite">WRITE</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="filipinoSpeak" name="filipinoSpeak">
            <label class="form-check-label" for="filipinoSpeak">SPEAK</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="filipinoUnderstand" name="filipinoUnderstand">
            <label class="form-check-label" for="filipinoUnderstand">UNDERSTAND</label>
        </div>

        <div>
            <label class="form-label fw-bold">Others:</label>
            <input class="form-check-input" type="text" id="othersLanguage" name="othersLanguage" placeholder="">
            
            <input class="form-check-input" type="checkbox" value="Yes" id="othersRead" name="othersRead">
            <label class="form-check-label" for="othersRead">READ</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="othersWrite" name="othersWrite">
            <label class="form-check-label" for="othersWrite">WRITE</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="othersSpeak" name="othersSpeak">
            <label class="form-check-label" for="othersSpeak">SPEAK</label>

            <input class="form-check-input" type="checkbox" value="Yes" id="othersUnderstand" name="othersUnderstand">
            <label class="form-check-label" for="othersUnderstand">UNDERSTAND</label>
        </div>

        <button class="btn btn-primary w-100" type="submit">Submit</button>
    </form>

<br>
<br>
<br>
<!-- EDUCATIONAL BACKGFROUND -->
<h4 class="mb-3 text-uppercase fw-bold">IV. EDUCATIONAL BACKGFROUND</h4>
<form action="<?= site_url('jobseekerEducBackground') ?>" method="post">
    <table class="table">
        <tbody>
            <!-- Elementary -->
            <tr>
                <td colspan="2"><label class="form-label fw-bold">Elementary</label></td>
            </tr>
            <tr>
                <td><label for="elementarySchool" class="form-label fw-bold">School</label></td>
                <td><input name="elementarySchool" id="elementarySchool" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="elementaryYearGrad" class="form-label fw-bold">Year Graduated</label></td>
                <td><input name="elementaryYearGrad" id="elementaryYearGrad" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2"><label class="form-label fw-bold">If undergraduate</label></td>
            </tr>
            <tr>
                <td><label for="elementaryLevel" class="form-label fw-bold">What level?</label></td>
                <td><input name="elementaryLevel" id="elementaryLevel" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="elementaryLastAttend" class="form-label fw-bold">Year last attended</label></td>
                <td><input name="elementaryLastAttend" id="elementaryLastAttend" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="elementaryAwardsReceived" class="form-label fw-bold">Awards received</label></td>
                <td><input name="elementaryAwardsReceived" id="elementaryAwardsReceived" type="text" class="form-control"></td>
            </tr>

            <!-- Secondary -->
            <tr>
                <td colspan="2"><br><label class="form-label fw-bold">Secondary</label></td>
            </tr>
            <tr>
                <td><label for="secondarySchool" class="form-label fw-bold">School</label></td>
                <td><input name="secondarySchool" id="secondarySchool" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="secondaryCourse" class="form-label fw-bold">Course</label></td>
                <td><input name="secondaryCourse" id="secondaryCourse" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="secondaryYearGrad" class="form-label fw-bold">Year Graduated</label></td>
                <td><input name="secondaryYearGrad" id="secondaryYearGrad" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2"><label class="form-label fw-bold">If undergraduate</label></td>
            </tr>
            <tr>
                <td><label for="secondaryLevel" class="form-label fw-bold">What level?</label></td>
                <td><input name="secondaryLevel" id="secondaryLevel" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="secondaryLastAttend" class="form-label fw-bold">Year last attended</label></td>
                <td><input name="secondaryLastAttend" id="secondaryLastAttend" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="secondaryAwardsReceived" class="form-label fw-bold">Awards received</label></td>
                <td><input name="secondaryAwardsReceived" id="secondaryAwardsReceived" type="text" class="form-control"></td>
            </tr>

            <!-- Tertiary -->
            <tr>
                <td colspan="2"><br><label class="form-label fw-bold">Tertiary</label></td>
            </tr>
            <tr>
                <td><label for="tertiarySchool" class="form-label fw-bold">School</label></td>
                <td><input name="tertiarySchool" id="tertiarySchool" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="tertiaryCourse" class="form-label fw-bold">Course</label></td>
                <td><input name="tertiaryCourse" id="tertiaryCourse" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="tertiaryYearGrad" class="form-label fw-bold">Year Graduated</label></td>
                <td><input name="tertiaryYearGrad" id="tertiaryYearGrad" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2"><label class="form-label fw-bold">If undergraduate</label></td>
            </tr>
            <tr>
                <td><label for="tertiaryLevel" class="form-label fw-bold">What level?</label></td>
                <td><input name="tertiaryLevel" id="tertiaryLevel" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="tertiaryLastAttend" class="form-label fw-bold">Year last attended</label></td>
                <td><input name="tertiaryLastAttend" id="tertiaryLastAttend" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="tertiaryAwardsReceived" class="form-label fw-bold">Awards received</label></td>
                <td><input name="tertiaryAwardsReceived" id="tertiaryAwardsReceived" type="text" class="form-control"></td>
            </tr>

             <!-- Graduate Studies -->
             <tr>
                <td colspan="2"><br><label class="form-label fw-bold">Graduate Studies</label></td>
            </tr>
            <tr>
                <td><label for="gradStudiesSchool" class="form-label fw-bold">School</label></td>
                <td><input name="gradStudiesSchool" id="gradStudiesSchool" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="gradStudiesCourse" class="form-label fw-bold">Course</label></td>
                <td><input name="gradStudiesCourse" id="gradStudiesCourse" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="gradStudiesYearGrad" class="form-label fw-bold">Year Graduated</label></td>
                <td><input name="gradStudiesYearGrad" id="gradStudiesYearGrad" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="gradStudiesAwardsReceived" class="form-label fw-bold">Awards received</label></td>
                <td><input name="gradStudiesAwardsReceived" id="gradStudiesAwardsReceived" type="text" class="form-control"></td>
            </tr>
        </tbody>
    </table>

    <button class="btn btn-primary w-100" type="submit">Submit</button>
</form>

<br>
<br>
<br>
        <!-- TECHNICAL /VOCATIONAL AND OTHER TRAINING(Include courses takens as part of college education) -->
        <h4 class="mb-3 text-uppercase fw-bold">V. TECHNICAL /VOCATIONAL AND OTHER TRAINING(Include courses takens as part of college education)</h4>
        <form action="<?= site_url('vocationalAndTraining') ?>" method="post">
            <div>
                <label class="form-label fw-bold">TRAINING/VOCATIONAL COURSE</label>
                <label class="form-label fw-bold">Duration (mm/dd/yyyy to mm/dd/yyyy)</label>
                <label class="form-label fw-bold">Training Institution</label>
                <label class="form-label fw-bold">Certificate Received</label>
            </div>
            <div>
                <input name="training1" id="training1" type="text" class="form-control">
                <input name="duration1" id="duration1" type="text" class="form-control">
                <input name="trainingInstitution1" id="trainingInstitution1" type="text" class="form-control">
                <input name="certificates1" id="certificates1" type="text" class="form-control">
            </div>

            <div>
                <input name="training2" id="training2" type="text" class="form-control">
                <input name="duration2" id="duration2" type="text" class="form-control">
                <input name="trainingInstitution2" id="trainingInstitution2" type="text" class="form-control">
                <input name="certificates2" id="certificates2" type="text" class="form-control">
            </div>

            <div>
                <input name="training3" id="training3" type="text" class="form-control">
                <input name="duration3" id="duration3" type="text" class="form-control">
                <input name="trainingInstitution3" id="trainingInstitution3" type="text" class="form-control">
                <input name="certificates3" id="certificates3" type="text" class="form-control">
            </div>
            <button class="btn btn-primary w-100" type="submit">Submit</button>
        </form>

<br>
<br>
<br>
        <!-- ELIGIBILITY/PROFESSIONAL LICENSE -->
        <h4 class="mb-3 text-uppercase fw-bold">VI. ELIGIBILITY/PROFESSIONAL LICENSE</h4>
        <form action="<?= site_url('eligibilityLicense') ?>" method="post">
            <div>
                <label class="form-label fw-bold">ELIGIBILTY(Civil Service)</label>
                <label class="form-label fw-bold">Rating</label>
                <label class="form-label fw-bold">Date of examination</label>
            </div>

            <div>
                <label class="form-label fw-bold">1.</label>
                <input name="eligibilityA" id="eligibilityA" type="text" class="form-control">
                <label class="form-label fw-bold">1.</label>
                <input name="ratingA" id="ratingA" type="text" class="form-control">
                <label class="form-label fw-bold">1.</label>
                <input name="dateExamA" id="dateExamA" type="text" class="form-control">
            </div>
            <div>
                <label class="form-label fw-bold">2.</label>
                <input name="eligibilityB" id="eligibilityB" type="text" class="form-control">
                <label class="form-label fw-bold">2.</label>
                <input name="ratingB" id="ratingB" type="text" class="form-control">
                <label class="form-label fw-bold">2.</label>
                <input name="dateExamB" id="dateExamB" type="text" class="form-control">
            </div>
            <br>
            <div>
                <label class="form-label fw-bold">PROFESSIONAL LICENSE (PRC)</label>
                <label class="form-label fw-bold">Valid Until</label>
            </div>

            <div>
                <label class="form-label fw-bold">1.</label>
                <input name="proLicenseA" id="proLicenseA" type="text" class="form-control">
                <label class="form-label fw-bold">1.</label>
                <input name="validUntilA" id="validUntilA" type="text" class="form-control">
            </div>
            <div>
                <label class="form-label fw-bold">2.</label>
                <input name="proLicenseB" id="proLicenseB" type="text" class="form-control">
                <label class="form-label fw-bold">2.</label>
                <input name="validUntilB" id="validUntilB" type="text" class="form-control">

            </div>

            <button class="btn btn-primary w-100" type="submit">Submit</button>
        </form>

<br>
<br>
<br>
        <!-- WORK EXPERIENCE -->
        <h4 class="mb-3 text-uppercase fw-bold">VII. WORK EXPERIENCE(Limit to 10 year period, start with the most recent employment)</h4>
        <form action="<?= site_url('workExperience') ?>" method="post">
            <div>
                <label class="form-label fw-bold">Company Name</label>
                <label class="form-label fw-bold">Address(City/Municipality)</label>
                <label class="form-label fw-bold">Position</label>
                <label class="form-label fw-bold">Inclusive Dates(mm/yyyy to mm/yyyy)</label>
                <label class="form-label fw-bold">Status(Permanent, Contractual, Part-time, Probationary)</label>
            </div>
            <div>
                <label class="form-label fw-bold">1.</label>
                <input name="companyNameA" id="companyNameA" type="text" class="form-control">
                <label class="form-label fw-bold">1.</label>
                <input name="addressCompanyA" id="addressCompanyA" type="text" class="form-control">
                <label class="form-label fw-bold">1.</label>
                <input name="positionCompanyA" id="positionCompanyA" type="text" class="form-control">
                <label class="form-label fw-bold">1.</label>
                <input name="inclusiveDatesA" id="inclusiveDatesA" type="text" class="form-control">
                <label class="form-label fw-bold">1.</label>
                <input name="statusCompanyA" id="statusCompanyA" type="text" class="form-control">
            </div>

            <div>
                <label class="form-label fw-bold">2.</label>
                <input name="companyNameB" id="companyNameB" type="text" class="form-control">
                <label class="form-label fw-bold">2.</label>
                <input name="addressCompanyB" id="addressCompanyB" type="text" class="form-control">
                <label class="form-label fw-bold">2.</label>
                <input name="positionCompanyB" id="positionCompanyB" type="text" class="form-control">
                <label class="form-label fw-bold">2.</label>
                <input name="inclusiveDatesB" id="inclusiveDatesB" type="text" class="form-control">
                <label class="form-label fw-bold">2.</label>
                <input name="statusCompanyB" id="statusCompanyB" type="text" class="form-control">
            </div>

            <div>
                <label class="form-label fw-bold">3.</label>
                <input name="companyNameC" id="companyNameC" type="text" class="form-control">
                <label class="form-label fw-bold">3.</label>
                <input name="addressCompanyC" id="addressCompanyC" type="text" class="form-control">
                <label class="form-label fw-bold">3.</label>
                <input name="positionCompanyC" id="positionCompanyC" type="text" class="form-control">
                <label class="form-label fw-bold">3.</label>
                <input name="inclusiveDatesC" id="inclusiveDatesC" type="text" class="form-control">
                <label class="form-label fw-bold">3.</label>
                <input name="statusCompanyC" id="statusCompanyC" type="text" class="form-control">
            </div>

            <div>
                <label class="form-label fw-bold">4.</label>
                <input name="companyNameD" id="companyNameD" type="text" class="form-control">
                <label class="form-label fw-bold">4.</label>
                <input name="addressCompanyD" id="addressCompanyD" type="text" class="form-control">
                <label class="form-label fw-bold">4.</label>
                <input name="positionCompanyD" id="positionCompanyD" type="text" class="form-control">
                <label class="form-label fw-bold">4.</label>
                <input name="inclusiveDatesD" id="inclusiveDatesD" type="text" class="form-control">
                <label class="form-label fw-bold">4.</label>
                <input name="statusCompanyD" id="statusCompanyD" type="text" class="form-control">
            </div>

            <div>
                <label class="form-label fw-bold">5.</label>
                <input name="companyNameE" id="companyNameE" type="text" class="form-control">
                <label class="form-label fw-bold">5.</label>
                <input name="addressCompanyE" id="addressCompanyE" type="text" class="form-control">
                <label class="form-label fw-bold">5.</label>
                <input name="positionCompanyE" id="positionCompanyE" type="text" class="form-control">
                <label class="form-label fw-bold">5.</label>
                <input name="inclusiveDatesE" id="inclusiveDatesE" type="text" class="form-control">
                <label class="form-label fw-bold">5.</label>
                <input name="statusCompanyE" id="statusCompanyE" type="text" class="form-control">
            </div>


            <button class="btn btn-primary w-100" type="submit">Submit</button>
        </form>

<br>
<br>
<br>
        <!-- OTHER SKILLS ACQUIRED WITHOUT FORMAL TRAINING -->
        
        <form action="<?= site_url('otherSkills') ?>" method="post">
        <h4 class="mb-3 text-uppercase fw-bold">VII. OTHER SKILLS ACQUIRED WITHOUT FORMAL TRAINING</h4>
            <div>
                <input class="form-check-input" type="checkbox" value="Auto Mechanic" id="autoMechanic" name="autoMechanic">
                <label class="form-check-label" for="autoMechanic">AUTO MECHANIC</label>

                <input class="form-check-input" type="checkbox" value="Beautician" id="beautician" name="beautician">
                <label class="form-check-label" for="beautician">BEAUTICIAN</label>

                <input class="form-check-input" type="checkbox" value="Carpentry Work" id="carpentryWork" name="carpentryWork">
                <label class="form-check-label" for="carpentryWork">CARPENTRY WORK</label>

                <input class="form-check-input" type="checkbox" value="Computer Literate" id="computerLiterate" name="computerLiterate">
                <label class="form-check-label" for="computerLiterate">COMPUTER LITERATE</label>

                <input class="form-check-input" type="checkbox" value="Domestic Chores" id="domesticChores" name="domesticChores">
                <label class="form-check-label" for="domesticChores">DOMESTIC CHORES</label>

                <input class="form-check-input" type="checkbox" value="Driver" id="driver" name="driver">
                <label class="form-check-label" for="driver">DRIVER</label>
            </div>
            <br>
            <div>
                <input class="form-check-input" type="checkbox" value="Electrician" id="electrician" name="electrician">
                <label class="form-check-label" for="electrician">ELECTRICIAN</label>

                <input class="form-check-input" type="checkbox" value="Embroidery" id="embroidery" name="embroidery">
                <label class="form-check-label" for="embroidery">EMBROIDERY</label>

                <input class="form-check-input" type="checkbox" value="Gardening" id="gardening" name="gardening">
                <label class="form-check-label" for="gardening">GARDENING</label>

                <input class="form-check-input" type="checkbox" value="Masonry" id="masonry" name="masonry">
                <label class="form-check-label" for="masonry">MASONRY</label>

                <input class="form-check-input" type="checkbox" value="Painter/Artist" id="painterArtist" name="painterArtist">
                <label class="form-check-label" for="painterArtist">PAINTER/ARTIST</label>

                <input class="form-check-input" type="checkbox" value="Painting Jobs" id="paintingJobs" name="paintingJobs">
                <label class="form-check-label" for="paintingJobs">PAINTING JOBS</label>
            </div>
            <br>
            <div>
                <input class="form-check-input" type="checkbox" value="Photography" id="photography" name="photography">
                <label class="form-check-label" for="photography">PHOTOGRAPHY</label>

                <input class="form-check-input" type="checkbox" value="Plumbing" id="plumbing" name="plumbing">
                <label class="form-check-label" for="plumbing">PLUMBING</label>

                <input class="form-check-input" type="checkbox" value="Sewing Dresses" id="sewingDresses" name="sewingDresses">
                <label class="form-check-label" for="sewingDresses">SEWING DRESSES</label>

                <input class="form-check-input" type="checkbox" value="Stenography" id="stenography" name="stenography">
                <label class="form-check-label" for="stenography">STENOGRAPHY</label>

                <input class="form-check-input" type="checkbox" value="Tailoring" id="tailoring" name="tailoring">
                <label class="form-check-label" for="tailoring">TAILORING</label>

                <input class="form-check-input" type="checkbox" id="otherSkills">
                <label class="form-check-label" for="otherSkills">OTHERS:</label>
                <input id="othersInputSkills" style="display: none;" type="text" class="form-control" name="otherSkills" placeholder="Others skill">
            </div>
            <button class="btn btn-primary w-100" type="submit">Submit</button>
        </form>
</body>
</html>
<!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
        var otherSkillsCheckbox = document.getElementById('otherSkills');
        var othersInputSkills = document.getElementById('othersInputSkills');

        otherSkillsCheckbox.addEventListener('change', function() {
            othersInputSkills.style.display = this.checked ? 'block' : 'none';
        });
    });
</script> -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var otherSkillsCheckbox = document.getElementById('otherSkills');
        var othersInputSkills = document.getElementById('othersInputSkills');

        otherSkillsCheckbox.addEventListener('change', function() {
            othersInputSkills.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var othersRadio = document.getElementById('others');
        var othersInput = document.getElementById('othersInput');

        othersRadio.addEventListener('change', function() {
            othersInput.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var othersUnemployedTypeAbroadRadio = document.getElementById('othersUnemployedTypeAbroad');
        var othersInputUnemployedType = document.getElementById('othersInputUnemployedType');

        othersUnemployedTypeAbroadRadio.addEventListener('change', function() {
            othersInputUnemployedType.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var othersUnemployedTypeRadio = document.getElementById('othersUnemployedType');
        var othersInputUnemployedTypeTwo = document.getElementById('othersInputUnemployedTypeTwo');

        othersUnemployedTypeRadio.addEventListener('change', function() {
            othersInputUnemployedTypeTwo.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var noWhenRadio = document.getElementById('noWhen');
        var noInputWhen = document.getElementById('noInputWhen');

        noWhenRadio.addEventListener('change', function() {
            noInputWhen.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var employedRadio = document.getElementById('employed');
        var unemployedRadio = document.getElementById('unemployed');
        var employedOptionsDiv = document.getElementById('employedOptions');
        var unemployedOptionsDiv = document.getElementById('unemployedOptions');

        employedRadio.addEventListener('change', function() {
            employedOptionsDiv.style.display = this.checked ? 'block' : 'none';
            unemployedOptionsDiv.style.display = 'none';
        });

        unemployedRadio.addEventListener('change', function() {
            unemployedOptionsDiv.style.display = this.checked ? 'block' : 'none';
            employedOptionsDiv.style.display = 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var localLocationRadio = document.getElementById('localLocation');
        var overseasLocationRadio = document.getElementById('overseasLocation');
        var localSpecifyOptionsDiv = document.getElementById('localSpecifyOptions');
        var overseasSpecifyOptionsDiv = document.getElementById('overseasSpecifyOptions');

        localLocationRadio.addEventListener('change', function() {
            localSpecifyOptionsDiv.style.display = this.checked ? 'block' : 'none';
            overseasSpecifyOptionsDiv.style.display = 'none';
        });

        overseasLocationRadio.addEventListener('change', function() {
            overseasSpecifyOptionsDiv.style.display = this.checked ? 'block' : 'none';
            localSpecifyOptionsDiv.style.display = 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    // Uncheck other checkboxes in the same group
                    checkboxes.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox && otherCheckbox.name === checkbox.name) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var yesBeneficiaryRadio = document.getElementById('yesBeneficiary');
        var yesInputHousehold = document.getElementById('yesInputHousehold');

        yesBeneficiaryRadio.addEventListener('change', function() {
            yesInputHousehold.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>

<script src="assets/default/jsss/theme.js"></script>
  <!-- Plugin Js -->
  <script src="assets/default/jsss/bundle/jquerysteps.bundle.js"></script>
  <script>
    // Step Demo 1
    $('.v-wizard-demo1').steps({});
    // Step Demo 2
    $('.v-wizard-demo2').steps({});
  </script>