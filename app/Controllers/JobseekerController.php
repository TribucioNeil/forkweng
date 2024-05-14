<?php

namespace App\Controllers;

use App\Models\JobseekerModel;
use App\Models\EmployerJobPostModel;
use Dompdf\Dompdf;

class JobseekerController extends BaseController
{
    protected $pimodel;
    protected $jpmodel;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->pimodel = new \App\Models\PersonalInformationModel();
        $this->jpmodel = new \App\Models\JobPreferenceModel();
        $this->languagemodel = new \App\Models\LanguageModel();
        $this->ebmodel = new \App\Models\EducationalBackgroundModel();
        $this->tmodel = new \App\Models\TrainingModel();
        $this->elmodel = new \App\Models\EligibilityModel();
        $this->wemodel = new \App\Models\WorkExperienceModel();
        $this->osmodel = new \App\Models\OthersSkillsModel();
        $this->jsmodel = new \App\Models\JobseekerModel();
        $this->resmodel = new \App\Models\ResumeModel();
        $this->ejpmodel = new \App\Models\EmployerJobPostModel();
        $this->jsamodel = new \App\Models\JobseekerApplyModel();
        $this->cmodel = new \App\Models\ChatbotModel();
    }

    public function chatbot()
    {
        return view('default/chatbot');
    }

    public function get_response() {
        // Ensure it's an AJAX request
        if ($this->input->is_ajax_request()) {
            // Get the message from the AJAX request
            $message = $this->input->get('message');
    
            // Load the model
            $this->load->model('ChatbotModel');
    
            // Retrieve the bot response from the model
            $response = $this->ChatbotModel->get_bot_response($message);
    
            // Return the response as JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['response_message' => $response]));
        } else {
            // If not an AJAX request, return an error message
            show_error('Invalid request');
        }
    }
    
        // public function barangaymap()
    // {
    //     $id = $this->request->getPost('id');
    //     $jobinfoId = $this->ejpmodel->find($id);
    //     if($jobinfoId){
    //         $data = [
    //             'lat' => $jobinfoId['lat'],
    //             'lng' => $jobinfoId['lng'],
    //         ];
    //         return view('default/barangaymap', $data);
            
    //     }
    // }

    public function jobinfo()
    {
        $id = $this->request->getPost('id');
        $jobinfoId = $this->ejpmodel->find($id);
        if($jobinfoId){
            return view('default/jobinfo', ['jobss' => $jobinfoId]);
        }else{
            return redirect()->to('joblists')->with('error', 'Job not exist');
        }    
    }

    public function captcha()
    {
        session_start();
        $random_alpha = md5(rand());
        $captcha_code = substr($random_alpha, 0, 6);
        $_SESSION["captcha_code"] = $captcha_code;
        $target_layer = imagecreatetruecolor(170, 70);
        $captcha_background = imagecolorallocate($target_layer, 255,255, 255);
        imagefill($target_layer,0,0,$captcha_background);
        $captcha_text_color = imagecolorallocate($target_layer, 39,55,70);
        $font_size = 32;
        $img_width = 80;
        $img_height = 48;
        $line_color = imagecolorallocate($target_layer, 64, 64, 64);
        for($i=0; $i<6; $i++){
            imageline($target_layer, 0, rand()%50,  200, rand()%50, $line_color);
        }
        $pixel_color = imagecolorallocate($target_layer, 0,0,255);
        for($i=0; $i<1000; $i++){
            imagesetpixel($target_layer, rand()%200, rand()%50, $pixel_color);
        }
        imagettftext($target_layer, $font_size, 0, 25, 35, $captcha_text_color, 'You are the one.ttf', $captcha_code);
        header("Content-type: image/jpeg");
        imagejpeg($target_layer);
    }


    public function jobseekerhome()
    
    {
        return view('default/home');
    }
    

    public function jobcategories()
    {
        return view('default/categories');
    }

    public function joblistss()
    {
        $data = [
            'jobss' => $this->ejpmodel->where('job_status', 'posted')->findAll()
        ];
            return view('default/lists', $data);

    }

    public function joblists()
    {
        $jobseekerId = session()->get('isLoggedIn');
        $personalInfo = $this->pimodel->where('jobseekerId', $jobseekerId)->first();
        $jobPreference = $this->jpmodel->where('jobseekerId', $jobseekerId)->first();
        $language = $this->languagemodel->where('jobseekerId', $jobseekerId)->first();
        $educBackground = $this->ebmodel->where('jobseekerId', $jobseekerId)->first();
        $training = $this->tmodel->where('jobseekerId', $jobseekerId)->first();
        $eligibility = $this->elmodel->where('jobseekerId', $jobseekerId)->first();
        $workExperience = $this->wemodel->where('jobseekerId', $jobseekerId)->first();
        $otherSkills = $this->osmodel->where('jobseekerId', $jobseekerId)->first();

        $jobs = $this->ejpmodel->where('job_status', 'posted')->findAll();

        $data = [
            'jobss' => $this->ejpmodel->where('job_status', 'posted')->findAll()
        ];

        if($personalInfo && $jobPreference && $language && $educBackground && $training && $eligibility && $workExperience && $otherSkills){
            $combinedData = [
                'personalInfo' => $personalInfo,
                'jobPreference' => $jobPreference,
                'language' => $language,
                'educBackground' => $educBackground,
                'training' => $training,
                'eligibility' => $eligibility,
                'workExperience' => $workExperience,
                'otherSkills' => $otherSkills,
                'jobss' => $jobs,
            ];
            return view('default/lists', $combinedData);
        }else{
            return view('default/lists', $data);
        }
    }

    public function showErrors()
    {
        return redirect()->to('jlogin')->with('error', 'Login first');
    }

    public function jobfairs()
    {
        return view('default/jobfairs');
    }

    public function aboutus()
    {
        return view('default/aboutus');
    }

    public function activities()
    {
        return view('default/activities');
    }

    public function faqs()
    {
        return view('default/faqs');
    }

    public function contactus()
    {
        return view('default/contact');
    }

    public function ourteam()
    {
        return view('default/ourteam');
    }

    public function jlogin()
    {
        return view('default/jobseeker/jlogin');
    }
    public function jsignup()
    {
        return view('default/jobseeker/jsignup');
    }
   
    public function mydashboard()
    {
        return view('jobseeker/pages/dashboard');
    }

    public function myprofile()
    {
        $jobseekerId = session()->get('isLoggedIn');
        $personalInfo = $this->pimodel->where('jobseekerId', $jobseekerId)->first();
        $jobPreference = $this->jpmodel->where('jobseekerId', $jobseekerId)->first();
        $language = $this->languagemodel->where('jobseekerId', $jobseekerId)->first();
        $educBackground = $this->ebmodel->where('jobseekerId', $jobseekerId)->first();
        $training = $this->tmodel->where('jobseekerId', $jobseekerId)->first();
        $eligibility = $this->elmodel->where('jobseekerId', $jobseekerId)->first();
        $workExperience = $this->wemodel->where('jobseekerId', $jobseekerId)->first();
        $otherSkills = $this->osmodel->where('jobseekerId', $jobseekerId)->first();

        if($personalInfo && $jobPreference && $language && $educBackground && $training && $eligibility && $workExperience && $otherSkills){
            $combinedData = [
                'personalInfo' => $personalInfo,
                'jobPreference' => $jobPreference,
                'language' => $language,
                'educBackground' => $educBackground,
                'training' => $training,
                'eligibility' => $eligibility,
                'workExperience' => $workExperience,
                'otherSkills' => $otherSkills,
            ];
            return view('jobseeker/pages/profile', $combinedData);
        }else{
            echo 'error';
        }
    }

    public function mypersonalinfo()
    {
        $jobseekerId = session()->get('isLoggedIn');
        $personalInfo = $this->pimodel->where('jobseekerId', $jobseekerId)->first();
        $jobPreference = $this->jpmodel->where('jobseekerId', $jobseekerId)->first();
        $language = $this->languagemodel->where('jobseekerId', $jobseekerId)->first();
        $educBackground = $this->ebmodel->where('jobseekerId', $jobseekerId)->first();
        $training = $this->tmodel->where('jobseekerId', $jobseekerId)->first();
        $eligibility = $this->elmodel->where('jobseekerId', $jobseekerId)->first();
        $workExperience = $this->wemodel->where('jobseekerId', $jobseekerId)->first();
        $otherSkills = $this->osmodel->where('jobseekerId', $jobseekerId)->first();

        if($personalInfo && $jobPreference && $language && $educBackground && $training && $eligibility && $workExperience && $otherSkills){
            $combinedData = [
                'personalInfo' => $personalInfo,
                'jobPreference' => $jobPreference,
                'language' => $language,
                'educBackground' => $educBackground,
                'training' => $training,
                'eligibility' => $eligibility,
                'workExperience' => $workExperience,
                'otherSkills' => $otherSkills,
            ];
            return view('jobseeker/pages/personaldata', $combinedData);
        }else{
            echo 'error';
        }
    }

    public function myresume()
    {

        $id = session()->get('isLoggedIn');
        $auth = new JobseekerModel();
        $data = [
            'resumes' => $auth->select('*')
                ->join('jobseekerresume', 'jobseekerresume.jobseekerId = jobseekerlogin.id', 'right')
                ->where('jobseekerresume.jobseekerId',  session()->get('isLoggedIn'))
                ->where('jobseekerresume.resume !=', '')
                ->get()->getResultArray()
        ];
            return view('jobseeker/pages/resume', $data);
    }

    public function myappliedjobs()
    {
        $jobseekerId = session()->get('isLoggedIn');
        $myAppliedJobs = $this->jsamodel->where('jobseekerId', $jobseekerId)->findAll();   
    
        $data = [
            'appliedJob' => $myAppliedJobs,
        ];
        return view('jobseeker/pages/appliedjobs', $data);
    }

    public function myjobalerts()
    {
        return view('jobseeker/pages/jobalerts');
    }

    public function registrationform()
    {
        return view('jobseeker/pages/registrationform');
    }

    public function jlogout()
    {
        session()->destroy();
        return redirect()->to('jlogin');
    }
    public function jobseekerforgot()
    {
        return view('default/jobseeker/jobseekerforgot');
    }

    public function jforgotpasswordform()
    {
        return view('default/jobseeker/jforgotpasswordform');
    }

    public function jobseekerforgotprocess()
    {   
        $email = $this->request->getPost('email');

        $jobseekerEmail = $this->jsmodel->where('emailAddress', $email)->first();

        if(!$jobseekerEmail){
            $this->session->setFlashdata('error', 'Error. Email cant find');
            return redirect()->to('jobseekerforgot');

        }else{
            $message = "Someone (hopefully you!) requested a password reset for your account. Click the link below to choose a new password. ".anchor('forgotJobseekerLink/'.$jobseekerEmail['activationKey'], 'Reset your password');
            $emailInstance = \Config\Services::email();

            $emailInstance->setFrom('PESO Calapan');
            $emailInstance->setTo($jobseekerEmail['emailAddress']);
            $emailInstance->setSubject('Forgot password');
            $emailInstance->setMessage($message);
            if($emailInstance->send()){
                $this->session->setFlashdata('success', 'We have emailed your password reset link!');
                return redirect()->to('jobseekerforgot');
            }else{
                $this->session->setFlashdata('error', 'Error. Email cant find');
                return redirect()->to('jobseekerforgot');
            }
        }
    }

    public function forgotJobseekerLink($linkHere)
    {
        $checkJobseekerLink = $this->jsmodel->where('activationKey', $linkHere)->findAll();
        if(count($checkJobseekerLink)>0){
            session()->set('jobseekerForgot', $checkJobseekerLink[0]['id']);
            return redirect()->to('jforgotpasswordform');
        }
        else{
            $this->session->setFlashdata('error', 'Error. Email cant find');
            return redirect()->to('jobseekerforgot');
        }
    }

    public function jobseekerforgotformprocess()
    {
        $jobseekerId = session()->get('jobseekerForgot');
        $jobseekerData = $this->jsmodel->find($jobseekerId);

        $password = $this->request->getPost('password');
        $confirmpassword = $this->request->getPost('confirmpassword');

        $validationRules = [
            'password'=>'required|min_length[8]|matches[confirmpassword]',
            'confirmpassword'=>'required'
        ];

        if(!$this->validate($validationRules)){
            $this->session->setFlashdata('error', 'Invalid input');
            return redirect()->to('jforgotpasswordform');
        }

        $updatedData = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $success = $this->jsmodel->update($jobseekerId, $updatedData);

        if($success){
            $this->session->setFlashdata('success', 'Your password has been reset!');
            return redirect()->to('jlogin');
        }else{
            $this->session->setFlashdata('error', 'Error!');
            return redirect()->to('jobseekerforgot');
        }
    }

    public function jloginprocess()
    {
        $JobSeeker = new JobseekerModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $JobSeeker->where('emailAddress', $email)->first();
        if($result !== null && $result['id'] > 0){
            if($result['activationStatus']=='Approved'){
                $passwordValidation = password_verify($password, $result['password']);
                if($passwordValidation){
                    session()->set('isLoggedIn', $result['id']);
                    return redirect()->to('mydashboard');
                }
                else{
                    $this->session->setFlashdata('error', 'Incorrect password. Please try again.');
                    return redirect()->to('jlogin');
                }
            }
            else{
                $this->session->setFlashdata('error', 'Activate your email before you login.');
                return redirect()->to('jlogin'); 
            }
        }
        else{
            $this->session->setFlashdata('error', 'Incorrect email or email does not exist. Please try again.');
            return redirect()->to('jlogin');
        }
    }
    
    public function jresendemail()
    {
        $jobseekerEmailMatch = $this->request->getPost('emailAddress');

        $userData = $this->jsmodel->where('emailAddress', $jobseekerEmailMatch)->first();

        if($userData){
            if($userData['activationStatus'] == 'Approved'){
                return redirect()->to('jverifyemail')->with('error', 'Your account is already validated');
            }
            elseif($userData['activationStatus'] == 'Pending'){
                $message = "Please activate your account ".anchor('activatenow/'.$userData['activationKey'], 'Activate Now');
                $email = \Config\Services::email();
        
                $email->setFrom('PESO Calapan', 'Activate your account');
                $email->setTo($userData['emailAddress']);
        
                $email->setSubject('Activate the account');
                $email->setMessage($message);
        
                if($email->send()){
                    return redirect()->to('jverifyemail')->with('success', 'Check your email or in spam to validate your account');
                }
                else{
                    $userData = $email->printDebugger(['headers']);
                }
                $email->printDebugger(['headers']);
            }
        }else{
            return redirect()->to('jlogin')->with('error', 'Email address is not existing');
        }
    }

    public function jverifyemail()
    {
        // if (!session()->get('isEmailVerify')) {
        //     return redirect()->to('jsignup');
        // }
     
        // $JobSeeker = new JobseekerModel();
        // $userId = session()->get('isEmailVerify');
        // $userData = $JobSeeker->find($userId);
    
        // if ($userData) {
        //     $data['email'] = $userData['emailAddress'];
        // } else {
            // Handle the case where user data is not found
            // You may redirect to an error page or handle it as needed
        // }
    
        return view('default/jobseeker/jverifyemail');
    }

    public function captchas()
    {
        # code...
        $this->load->helper('captcha');
        $vals = array(
            'word' => 'Random word',
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_with' => '150',
            'img_height' => 30,
            'expiration' => 7200,
            'word_length' => 8,
            'font_size' => 16,
            'img_id' => 'Imageid',
            'pool' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
        );

        $cap = create_captcha($vals);
        echo $cap['image'];
    }
    
    public function jsignupprocess()
    {
        $JobSeeker = new JobseekerModel();

        $fullname = $this->request->getPost('Fullname');
        $email = $this->request->getPost('Email');
        $password = $this->request->getPost('Password');
        $confirmpassword = $this->request->getPost('confirmPassword');
        $captcha = $this->request->getPost('captcha');

        if($password !== $confirmpassword){
            $this->session->setFlashdata('error', 'Password and confirm password do not match');
            return redirect()->to('jsignup');
        }

        $captcha_code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()'), 0, 6);
        session()->set('captcha_code', $captcha_code);

        $captchaSession = session()->get('captcha');
        if($captcha !== $captchaSession){
            $this->session->setFlashdata('error', 'CAPTCHA code is incorrect. Please try again.');
            return redirect()->to('jsignup');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'fullname'=>$fullname,
            'emailAddress'=>$email,
            'password'=>$password,
            'activationKey'=>bin2hex(random_bytes(50)),
        ];

        $message = "Please activate your account ".anchor('activatenow/'.$data['activationKey'], 'Activate Now');
        $emailInstance = \Config\Services::email();

        $emailInstance->setFrom('PESO Calapan', 'Activate your account');
        $emailInstance->setTo($data['emailAddress']);
        $emailInstance->setSubject('Activate the account');
        $emailInstance->setMessage($message);
        
        $GetEmail = $JobSeeker->where('emailAddress', $email)->first();
        if($GetEmail){
            $this->session->setFlashdata('error', 'Email already exists. Please choose a different email address.');
            return redirect()->to('jsignup');
        }
        else{
            if($emailInstance->send()){
                $result = $JobSeeker->insert($data);
                if($result){
                    $Getget = $JobSeeker->where('emailAddress', $email)->first();
                    $employerId = $Getget['id'];
                    $id = [
                        'jobseekerId' => $employerId,
                    ];

                    $resulting = $this->pimodel->insert($id);
                    $resulting = $this->jpmodel->insert($id);
                    $resulting = $this->languagemodel->insert($id);
                    $resulting = $this->ebmodel->insert($id);
                    $resulting = $this->tmodel->insert($id);
                    $resulting = $this->elmodel->insert($id);
                    $resulting = $this->wemodel->insert($id);
                    $resulting = $this->osmodel->insert($id);
                    $resulting = $this->resmodel->insert($id);

                    if($resulting){
                        session()->set('isEmailVerify', $Getget['id']);
                        return redirect()->to('jverifyemail')->with('success', 'Check your email or in spam folder to validated your account');
                    }
                    else{
                        echo "error inserting id";
                    }    
                }
                else{
                    echo 'Error while register';
                }

            }
            else{
                $data = $emailInstance->printDebugger(['headers']);
                print($data);
            }
        } 
    }

    public function activatenow($linkHere)
    {
        $JobseekerModel = new JobseekerModel();
        $checkJobseekerLink = $JobseekerModel->where('activationKey', $linkHere)->findAll();
        if(count($checkJobseekerLink)>0){
            $data['activationStatus'] = 'Approved';
            $activationStatus = $JobseekerModel->update($checkJobseekerLink[0]['id'], $data);
            if($activationStatus){
                $this->session->setFlashdata('success', 'You can now login.');
                return redirect()->to('jlogin');
            }
            else{
                'error ';
            }
            echo 'fine';
        }
        else{
            echo 'activation not found';
        }
    }

    public function personalInformation()
{
    $Id = session()->get('isLoggedIn');

    if ($Id) {
        // Find the corresponding ID from the other table (replace 'other_table' with the actual table name)
        $otherTableId = $this->jsmodel->where('id', $Id)->first();

        if ($otherTableId) {
            $surName = $this->request->getVar('surName');
            $firstName = $this->request->getVar('firstName');
            $middleName = $this->request->getVar('middleName');
            $suffix = $this->request->getVar('suffix');
            $dateOfBirth = $this->request->getVar('dateOfBirth');
            $placeOfBirth = $this->request->getVar('placeOfBirth');
            $sex = $this->request->getVar('sex');
            $religion = $this->request->getVar('religion');
            $houseNo = $this->request->getVar('houseNo');
            $civilStatus = $this->request->getVar('civilStatus');
            $barangay = $this->request->getVar('barangay');
            $municipality = $this->request->getVar('municipality');
            $province = $this->request->getVar('province');
            $tin = $this->request->getVar('tin');
            $gsis = $this->request->getVar('gsis');
            $pagibig = $this->request->getVar('pagibig');
            $philhealth = $this->request->getVar('philhealth');
            $height = $this->request->getVar('height');
            $emailAddress = $this->request->getVar('emailAddress');
            $landlineNumber = $this->request->getVar('landlineNumber');
            $cellphoneNumber = $this->request->getVar('cellphoneNumber');
            $disability = $this->request->getVar('disability');
            $employmentStatus = $this->request->getVar('employmentStatus');
            $employmentType = $this->request->getVar('employmentType');
            $terminatedAbroad = $this->request->getVar('terminatedAbroad');
            $activelyLooking = $this->request->getVar('activelyLooking');
            $howLong = $this->request->getVar('howLong');
            $willingWork = $this->request->getVar('willingWork');
            $ifNoWilling = $this->request->getVar('ifNoWilling');
            $beneficiary = $this->request->getVar('beneficiary');
            $householdId = $this->request->getVar('householdId');

            $data = [
                'SurName' => $surName,
                'FirstName' => $firstName,
                'MiddleName' => $middleName,
                'Suffix' => $suffix,
                'DateOfBirth' => $dateOfBirth,
                'PlaceOfBirth' => $placeOfBirth,
                'Sex' => $sex,
                'Religion' => $religion,
                'HouseNoOrStreet' => $houseNo,
                'CivilStatus' => $civilStatus,
                'Barangay' => $barangay,
                'MunicipalityOrCity' => $municipality,
                'Province' => $province,
                'TinNo' => $tin,
                'GsisOrSssNo' => $gsis,
                'PagibigNo' => $pagibig,
                'PhilhealthNo' => $philhealth,
                'Height' => $height,
                'EmailAddress' => $emailAddress,
                'LandlineNo' => $landlineNumber,
                'CellphoneNo' => $cellphoneNumber,
                'Disability' => $disability,
                'EmploymentStatus' => $employmentStatus,
                'Type' => $employmentType,
                'TerminatedAbroadSpecify' => $terminatedAbroad,
                'ActivelyLooking' => $activelyLooking,
                'LookingWork' => $howLong,
                'WillingWork' => $willingWork,
                'IfNo' => $ifNoWilling,
                'Beneficiary' => $beneficiary,
                'IfYesHousehold' => $householdId,
            ];
            $existingRecord = $this->pimodel->where('jobseekerId', $otherTableId['id'])->first();

            if ($existingRecord) {
                $result = $this->pimodel->update($existingRecord['id'], $data);

                if ($result) {
                    $this->session->setFlashdata('success', 'Successfully insert personal information');
                    return redirect()->to('myprofile');
                } else {
                    echo 'Failed to update personal information';
                }
            } else {
                echo 'No record found with the matching jobseekerId';
            }
        } else {
            echo 'Corresponding ID from other table not found';
        }
    } else {
        echo 'Job seeker ID not found';
    }
}

    public function jobPreference()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
    
            if ($otherTableId) {
                $occupation1 = $this->request->getVar('occupation1');
                $occupation2 = $this->request->getVar('occupation2');
                $occupation3 = $this->request->getVar('occupation3');
                $occupation4 = $this->request->getVar('occupation4');
                $mybutton = $this->request->getVar('mybutton');
                $localSpecify1 = $this->request->getVar('localSpecify1');
                $localSpecify2 = $this->request->getVar('localSpecify2');
                $localSpecify3 = $this->request->getVar('localSpecify3');
                $overseasSpecify1 = $this->request->getVar('overseasSpecify1');
                $overseasSpecify2 = $this->request->getVar('overseasSpecify2');
                $overseasSpecify3 = $this->request->getVar('overseasSpecify3');
                $expectedSalary = $this->request->getVar('expectedSalary');
                $passportNo = $this->request->getVar('passportNo');
                $passportExpiry = $this->request->getVar('passportExpiry');

                $data = [
                    'PreferredOccu1'=>$occupation1,
                    'PreferredOccu2'=>$occupation2,
                    'PreferredOccu3'=>$occupation3,
                    'PreferredOccu4'=>$occupation4,
                    'mybutton'=>$mybutton,
                    'PreferredLocCity1'=>$localSpecify1,
                    'PreferredLocCity2'=>$localSpecify2,
                    'PreferredLocCity3'=>$localSpecify3,
                    'PreferredLocOverseas1'=>$overseasSpecify1,
                    'PreferredLocOverseas2'=>$overseasSpecify2,
                    'PreferredLocOverseas3'=>$overseasSpecify3,
                    'ExpectedSalaryRange'=>$expectedSalary,
                    'PassportNo'=>$passportNo,
                    'ExpiryDate'=>$passportExpiry,
                ];

                $existingRecord = $this->jpmodel->where('jobseekerId', $otherTableId['id'])->first();

                if ($existingRecord) {
                    $result = $this->jpmodel->update($existingRecord['id'], $data);

                    if ($result) {
                        $this->session->setFlashdata('success', 'Successfully insert personal information');
                        return redirect()->to('myprofile');
                    } else {
                        echo 'Failed to update personal information';
                    }
                } else {
                    echo 'No record found with the matching jobseekerId';
                }
            } else {
                echo 'Corresponding ID from other table not found';
            }
        } else {
            echo 'Job seeker ID not found';
        }
    }

    public function jobseekerLanguage()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
    
            if ($otherTableId) {
                $englishRead = $this->request->getVar('englishRead');
                $englishWrite = $this->request->getVar('englishWrite');
                $englishSpeak = $this->request->getVar('englishSpeak');
                $englishUnderstand = $this->request->getVar('englishUnderstand');
                $filipinoRead = $this->request->getVar('filipinoRead');
                $filipinoWrite = $this->request->getVar('filipinoWrite');
                $filipinoSpeak = $this->request->getVar('filipinoSpeak');
                $filipinoUnderstand = $this->request->getVar('filipinoUnderstand');
                $othersLanguage = $this->request->getVar('othersLanguage');
                $othersRead = $this->request->getVar('othersRead');
                $othersWrite = $this->request->getVar('othersWrite');
                $othersSpeak = $this->request->getVar('othersSpeak');
                $othersUnderstand = $this->request->getVar('othersUnderstand');

                $data = [
                    'EnglishRead' => isset($englishRead) ? 'Yes' : 'No',
                    'EnglishWrite' => isset($englishWrite) ? 'Yes' : 'No',
                    'EnglishSpeak' => isset($englishSpeak) ? 'Yes' : 'No',
                    'EnglishUnderstand' => isset($englishUnderstand) ? 'Yes' : 'No',
                    'FilipinoRead' => isset($filipinoRead) ? 'Yes' : 'No',
                    'FilipinoWrite' => isset($filipinoWrite) ? 'Yes' : 'No',
                    'FilipinoSpeak' => isset($filipinoSpeak) ? 'Yes' : 'No',
                    'FilipinoUnderstand' => isset($filipinoUnderstand) ? 'Yes' : 'No',
                    'OthersLanguage' => $othersLanguage,
                    'OthersRead' => ($othersLanguage !== '') ? (isset($othersRead) ? 'Yes' : null) : null,
                    'OthersWrite' => ($othersLanguage !== '') ? (isset($othersWrite) ? 'Yes' : null) : null,
                    'OthersSpeak' => ($othersLanguage !== '') ? (isset($othersSpeak) ? 'Yes' : null) : null,
                    'OthersUnderstand' => ($othersLanguage !== '') ? (isset($othersUnderstand) ? 'Yes' : null) : null,
                ];
                
                $existingRecord = $this->languagemodel->where('jobseekerId', $otherTableId['id'])->first();

                if ($existingRecord) {
                    $result = $this->languagemodel->update($existingRecord['id'], $data);

                    if ($result) {
                        $this->session->setFlashdata('success', 'Successfully insert personal information');
                        return redirect()->to('myprofile');
                    } else {
                        echo 'Failed to update personal information';
                    }
                } else {
                    echo 'No record found with the matching jobseekerId';
                }
            } else {
                echo 'Corresponding ID from other table not found';
            }
        } else {
            echo 'Job seeker ID not found';
        }
    }

    public function jobseekerEducBackground()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
    
            if ($otherTableId) {
                $elementarySchool = $this->request->getVar('elementarySchool');
                $elementaryYearGrad = $this->request->getVar('elementaryYearGrad');
                $elementaryLevel = $this->request->getVar('elementaryLevel');
                $elementaryLastAttend = $this->request->getVar('elementaryLastAttend');
                $elementaryAwardsReceived = $this->request->getVar('elementaryAwardsReceived');
                $secondarySchool = $this->request->getVar('secondarySchool');
                $secondaryCourse = $this->request->getVar('secondaryCourse');
                $secondaryYearGrad = $this->request->getVar('secondaryYearGrad');
                $secondaryLevel = $this->request->getVar('secondaryLevel');
                $secondaryLastAttend = $this->request->getVar('secondaryLastAttend');
                $secondaryAwardsReceived = $this->request->getVar('secondaryAwardsReceived');
                $tertiarySchool = $this->request->getVar('tertiarySchool');
                $tertiaryCourse = $this->request->getVar('tertiaryCourse');
                $tertiaryYearGrad = $this->request->getVar('tertiaryYearGrad');
                $tertiaryLevel = $this->request->getVar('tertiaryLevel');
                $tertiaryLastAttend = $this->request->getVar('tertiaryLastAttend');
                $tertiaryAwardsReceived = $this->request->getVar('tertiaryAwardsReceived');
                $gradStudiesSchool = $this->request->getVar('gradStudiesSchool');
                $gradStudiesCourse = $this->request->getVar('gradStudiesCourse');
                $gradStudiesYearGrad = $this->request->getVar('gradStudiesYearGrad');
                $gradStudiesAwardsReceived = $this->request->getVar('gradStudiesAwardsReceived');
                
                $data = [
                    'ElementarySchool'=>$elementarySchool,
                    'ElementaryYearGrad'=>$elementaryYearGrad,
                    'ElementaryLevel'=>$elementaryLevel,
                    'ElementaryLastAttend'=>$elementaryLastAttend,
                    'ElementaryAwards'=>$elementaryAwardsReceived,
                    'SecondarySchool'=>$secondarySchool,
                    'SecondaryCourse'=>$secondaryCourse,
                    'SecondaryYearGrad'=>$secondaryYearGrad,
                    'SecondaryLevel'=>$secondaryLevel,
                    'SecondaryLastAttend'=>$secondaryLastAttend,
                    'SecondaryAwards'=>$secondaryAwardsReceived,
                    'TertiarySchool'=>$tertiarySchool,
                    'TertiaryCourse'=>$tertiaryCourse,
                    'TertiaryYearGrad'=>$tertiaryYearGrad,
                    'TertiaryLevel'=>$tertiaryLevel,
                    'TertiaryLastAttend'=>$tertiaryLastAttend,
                    'TertiaryAwards'=>$tertiaryAwardsReceived,
                    'GradStudiesSchool'=>$gradStudiesSchool,
                    'GradStudiesCourse'=>$gradStudiesCourse,
                    'GradStudiesYearGrad'=>$gradStudiesYearGrad,
                    'GradStudiesAward'=>$gradStudiesAwardsReceived,
                ];
                $existingRecord = $this->ebmodel->where('jobseekerId', $otherTableId['id'])->first();

                if ($existingRecord) {
                    $result = $this->ebmodel->update($existingRecord['id'], $data);

                    if ($result) {
                        $this->session->setFlashdata('success', 'Successfully insert personal information');
                        return redirect()->to('myprofile');
                    } else {
                        echo 'Failed to update personal information';
                    }
                } else {
                    echo 'No record found with the matching jobseekerId';
                }
            } else {
                echo 'Corresponding ID from other table not found';
            }
        } else {
            echo 'Job seeker ID not found';
        }
    }
    public function vocationalAndTraining()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
    
            if ($otherTableId) {
                $training1 = $this->request->getVar('training1');
                $duration1 = $this->request->getVar('duration1');
                $duration1A = $this->request->getVar('duration1A');
                $trainingInstitution1 = $this->request->getVar('trainingInstitution1');
                $certificates1 = $this->request->getVar('certificates1');
                $training2 = $this->request->getVar('training2');
                $duration2 = $this->request->getVar('duration2');
                $duration2A = $this->request->getVar('duration2A');
                $trainingInstitution2 = $this->request->getVar('trainingInstitution2');
                $certificates2 = $this->request->getVar('certificates2');
                $training3 = $this->request->getVar('training3');
                $duration3 = $this->request->getVar('duration3');
                $duration3A = $this->request->getVar('duration3A');
                $trainingInstitution3 = $this->request->getVar('trainingInstitution3');
                $certificates3 = $this->request->getVar('certificates3');
                
                $data = [
                    'TrainingTitle1'=>$training1,
                    'TrainingDuration1'=>$duration1,
                    'TrainingDuration1A'=>$duration1A,
                    'TrainingInstitution1'=>$trainingInstitution1,
                    'TrainingCertificate1'=>$certificates1,
                    'TrainingTitle2'=>$training2,
                    'TrainingDuration2'=>$duration2,
                    'TrainingDuration2A'=>$duration2A,
                    'TrainingInstitution2'=>$trainingInstitution2,
                    'TrainingCertificate2'=>$certificates2,
                    'TrainingTitle3'=>$training3,
                    'TrainingDuration3'=>$duration3,
                    'TrainingDuration3A'=>$duration3A,
                    'TrainingInstitution3'=>$trainingInstitution3,
                    'TrainingCertificate3'=>$certificates3,
                ];
        
                $existingRecord = $this->tmodel->where('jobseekerId', $otherTableId['id'])->first();

                if ($existingRecord) {
                    $result = $this->tmodel->update($existingRecord['id'], $data);

                    if ($result) {
                        $this->session->setFlashdata('success', 'Successfully insert personal information');
                        return redirect()->to('myprofile');
                    } else {
                        echo 'Failed to update personal information';
                    }
                } else {
                    echo 'No record found with the matching jobseekerId';
                }
            } else {
                echo 'Corresponding ID from other table not found';
            }
        } else {
            echo 'Job seeker ID not found';
        }
    }

    public function eligibilityLicense()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
    
            if ($otherTableId) {
                $eligibilityA = $this->request->getVar('eligibilityA');
                $ratingA = $this->request->getVar('ratingA');
                $dateExamA = $this->request->getVar('dateExamA');
                $eligibilityB = $this->request->getVar('eligibilityB');
                $ratingB = $this->request->getVar('ratingB');
                $dateExamB = $this->request->getVar('dateExamB');
                $proLicenseA = $this->request->getVar('proLicenseA');
                $validUntilA = $this->request->getVar('validUntilA');
                $proLicenseB = $this->request->getVar('proLicenseB');
                $validUntilB = $this->request->getVar('validUntilB');
                
                $data = [
                    'EligibilityTitle1'=>$eligibilityA,
                    'EligibilityRating1'=>$ratingA,
                    'EligibilityDate1'=>$dateExamA,
                    'EligibilityTitle2'=>$eligibilityB,
                    'EligibilityRating2'=>$ratingB,
                    'EligibilityDate2'=>$dateExamB,
                    'LicenseTitle1'=>$proLicenseA,
                    'LicenseUntil1'=>$validUntilA,
                    'LicenseTitle2'=>$proLicenseB,
                    'LicenseUntil2'=>$validUntilB,
                ];
        
                $existingRecord = $this->elmodel->where('jobseekerId', $otherTableId['id'])->first();

                if ($existingRecord) {
                    $result = $this->elmodel->update($existingRecord['id'], $data);

                    if ($result) {
                        $this->session->setFlashdata('success', 'Successfully insert personal information');
                        return redirect()->to('myprofile');
                    } else {
                        echo 'Failed to update personal information';
                    }
                } else {
                    echo 'No record found with the matching jobseekerId';
                }
            } else {
                echo 'Corresponding ID from other table not found';
            }
        } else {
            echo 'Job seeker ID not found';
        }
    }

    public function workExperience()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
    
            if ($otherTableId) {
                $companyNameA = $this->request->getVar('companyNameA');
                $addressCompanyA = $this->request->getVar('addressCompanyA');
                $positionCompanyA = $this->request->getVar('positionCompanyA');
                $inclusiveDatesA = $this->request->getVar('inclusiveDatesA');
                $statusCompanyA = $this->request->getVar('statusCompanyA');
                $companyNameB = $this->request->getVar('companyNameB');
                $addressCompanyB = $this->request->getVar('addressCompanyB');
                $positionCompanyB = $this->request->getVar('positionCompanyB');
                $inclusiveDatesB = $this->request->getVar('inclusiveDatesB');
                $statusCompanyB = $this->request->getVar('statusCompanyB');
                $companyNameC = $this->request->getVar('companyNameC');
                $addressCompanyC = $this->request->getVar('addressCompanyC');
                $positionCompanyC = $this->request->getVar('positionCompanyC');
                $inclusiveDatesC = $this->request->getVar('inclusiveDatesC');
                $statusCompanyC = $this->request->getVar('statusCompanyC');
                $companyNameD = $this->request->getVar('companyNameD');
                $addressCompanyD = $this->request->getVar('addressCompanyD');
                $positionCompanyD = $this->request->getVar('positionCompanyD');
                $inclusiveDatesD = $this->request->getVar('inclusiveDatesD');
                $statusCompanyD = $this->request->getVar('statusCompanyD');
                $companyNameE = $this->request->getVar('companyNameE');
                $addressCompanyE = $this->request->getVar('addressCompanyE');
                $positionCompanyE = $this->request->getVar('positionCompanyE');
                $inclusiveDatesE = $this->request->getVar('inclusiveDatesE');
                $statusCompanyE = $this->request->getVar('statusCompanyE');
                
                $data = [
                    'CompanyName1'=>$companyNameA,
                    'CompanyAddress1'=>$addressCompanyA,
                    'CompanyPosition1'=>$positionCompanyA,
                    'CompanyDates1'=>$inclusiveDatesA,
                    'CompanyStatus1'=>$statusCompanyA,
                    'CompanyName2'=>$companyNameB,
                    'CompanyAddress2'=>$addressCompanyB,
                    'CompanyPosition2'=>$positionCompanyB,
                    'CompanyDates2'=>$inclusiveDatesB,
                    'CompanyStatus2'=>$statusCompanyB,
                    'CompanyName3'=>$companyNameC,
                    'CompanyAddress3'=>$addressCompanyC,
                    'CompanyPosition3'=>$positionCompanyC,
                    'CompanyDates3'=>$inclusiveDatesC,
                    'CompanyStatus3'=>$statusCompanyC,
                    'CompanyName4'=>$companyNameD,
                    'CompanyAddress4'=>$addressCompanyD,
                    'CompanyPosition4'=>$positionCompanyD,
                    'CompanyDates4'=>$inclusiveDatesD,
                    'CompanyStatus4'=>$statusCompanyD,
                    'CompanyName5'=>$companyNameE,
                    'CompanyAddress5'=>$addressCompanyE,
                    'CompanyPosition5'=>$positionCompanyE,
                    'CompanyDates5'=>$inclusiveDatesE,
                    'CompanyStatus5'=>$statusCompanyE,

                ];
        
        
                $existingRecord = $this->wemodel->where('jobseekerId', $otherTableId['id'])->first();

                if ($existingRecord) {
                    $result = $this->wemodel->update($existingRecord['id'], $data);

                    if ($result) {
                        $this->session->setFlashdata('success', 'Successfully insert personal information');
                        return redirect()->to('myprofile');
                    } else {
                        echo 'Failed to update personal information';
                    }
                } else {
                    echo 'No record found with the matching jobseekerId';
                }
            } else {
                echo 'Corresponding ID from other table not found';
            }
        } else {
            echo 'Job seeker ID not found';
        }
    }

    public function otherSkills()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
    
            if ($otherTableId) {
                $autoMechanic = $this->request->getVar('autoMechanic');
                $beautician = $this->request->getVar('beautician');
                $carpentryWork = $this->request->getVar('carpentryWork');
                $computerLiterate = $this->request->getVar('computerLiterate');
                $domesticChores = $this->request->getVar('domesticChores');
                $driver = $this->request->getVar('driver');
                $electrician = $this->request->getVar('electrician');
                $embroidery = $this->request->getVar('embroidery');
                $gardening = $this->request->getVar('gardening');
                $masonry = $this->request->getVar('masonry');
                $painterArtist = $this->request->getVar('painterArtist');
                $paintingJobs = $this->request->getVar('paintingJobs');
                $photography = $this->request->getVar('photography');
                $plumbing = $this->request->getVar('plumbing');
                $sewingDresses = $this->request->getVar('sewingDresses');
                $stenography = $this->request->getVar('stenography');
                $tailoring = $this->request->getVar('tailoring');
                $otherSkills = $this->request->getVar('otherSkills');
                
                $data = [
                    'AutoMechanic'=>$autoMechanic,
                    'Beautician'=>$beautician,
                    'CarpentryWork'=>$carpentryWork,
                    'ComputerLiterate'=>$computerLiterate,
                    'DomesticChores'=>$domesticChores,
                    'Driver'=>$driver,
                    'Electrician'=>$electrician,
                    'Embroidery'=>$embroidery,
                    'Gardening'=>$gardening,
                    'Masonry'=>$masonry,
                    'PainterArtist'=>$painterArtist,
                    'PaintingJobs'=>$paintingJobs,
                    'Photography'=>$photography,
                    'Plumbing'=>$plumbing,
                    'SewingDresses'=>$sewingDresses,
                    'Stenography'=>$stenography,
                    'Tailoring'=>$tailoring,
                    'OthersSkill'=>$otherSkills,
                ];
        
            
                $existingRecord = $this->osmodel->where('jobseekerId', $otherTableId['id'])->first();

                if ($existingRecord) {
                    $result = $this->osmodel->update($existingRecord['id'], $data);

                    if ($result) {
                        $this->session->setFlashdata('success', 'Successfully insert personal information');
                        return redirect()->to('myprofile');
                    } else {
                        echo 'Failed to update personal information';
                    }
                } else {
                    echo 'No record found with the matching jobseekerId';
                }
            } else {
                echo 'Corresponding ID from other table not found';
            }
        } else {
            echo 'Job seeker ID not found';
        }
    }

    public function uploadresume()
    {
        $Id = session()->get('isLoggedIn');

        if ($Id) {
            $otherTableId = $this->jsmodel->where('id', $Id)->first();
            if ($otherTableId) {

                $uploadResume = $this->request->getFile('uploadResume');
                $uploadPortfolio = $this->request->getFile('uploadPortfolio');

                if ($uploadResume !== null && $uploadResume->isValid()){
                    if ($uploadPortfolio !== null && $uploadPortfolio->isValid()){
                        $uploadResumeName = $uploadResume->getRandomName();
                        $uploadPortfolioName = $uploadPortfolio->getRandomName();
                        if ($uploadResume->move('./uploads/resume/', $uploadResumeName) && $uploadPortfolio->move('./uploads/portfolio/', $uploadPortfolioName)){
                            $data = [
                                'resume' => $uploadResumeName,
                                'portfolio' => $uploadPortfolioName,
                            ];

                            $existingRecord = $this->resmodel->where('jobseekerId', $otherTableId['id'])->first();

                            if ($existingRecord) {
                                $result = $this->resmodel->update($existingRecord['id'], $data);
                                if ($result) {
                                    return redirect()->to('myresume')->with('success', 'Successfully upload resume');
                                }else{
                                    $this->session->setFlashdata('error', 'Error!');
                                    return redirect()->to('myresume');
                                }
                            }else{
                                $this->session->setFlashdata('error', 'Error!');
                                return redirect()->to('myresume');
                            }
                        }else{
                            $this->session->setFlashdata('error', 'Error!');
                            return redirect()->to('myresume');
                        }
                    }else{
                        $this->session->setFlashdata('error', 'Error!');
                        return redirect()->to('myresume');
                    }
                }else{
                    $this->session->setFlashdata('error', 'Error!');
                    return redirect()->to('myresume');
                }
            }else{
                $this->session->setFlashdata('error', 'Error!');
                return redirect()->to('myresume');
            }

        }else{
            $this->session->setFlashdata('error', 'Error!');
            return redirect()->to('myresume');
        }
    }

    public function listOfJob()
    {
        $jobs = $this->ejpmodel->findAll();
        return view('employer/pages/joblist', ['jobss' => $jobs]);
    }

    public function employerapplicants()
    {
        // return view('employer/pages/applicants');
        $applicants  = $this->jsmodel->findAll();
        return view('employer/pages/applicants', ['applicants' => $applicants]);
    }

    public function cancelApply($id)
    {
        $result = $this->jsamodel->set('status', 'Cancelled')->where('id', $id)->update();

        if ($result) {
            return redirect()->to('/myappliedjobs')->with('success', 'Cancelled Successfully');
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to delete job post']);
        }
    }

    public function applyNowProcess()
    {
        $jobseekerId = session()->get('isLoggedIn');
        
        $jobPostId = $this->request->getPost('jobpostId');
        $vaccination = $this->request->getFile('vaccination');
        $sss = $this->request->getFile('sss');
        $pagibig = $this->request->getFile('pagibig');
        $philhealth = $this->request->getFile('philhealth');
        $tin = $this->request->getFile('tin');
        $otherRequirementsFiles = $this->request->getFiles('otherRequirements');


        $otherRequirementFileNames = [];

        foreach ($otherRequirementsFiles as $files){
            foreach($files as $file){
                if($file->isValid() && !$file->hasMoved() && $file->getSize() > 0){
                    $fileName = $file->getRandomName();
                    $file->move('./uploads/jobseekerRequirements/others', $fileName);
    
                    $otherRequirementFileNames[] = $fileName;
                }
            }
        }

        $otherRequirementFileNamesString = implode(',', $otherRequirementFileNames);

        $matchId = $this->ejpmodel->where('id', $jobPostId)->first();
        $matchName = $this->jsmodel->where('id', $jobseekerId)->first();

        $vaccinationName = '';
        $sssName = '';
        $pagibigName = '';
        $philhealthName = '';
        $tinName = '';

        try { 
            if ($vaccination !== null) {
                if ($vaccination->isValid() && !$vaccination->hasMoved()) {
                    if ($vaccination->getSize() > 0) { // Check if the file is not empty
                        $vaccinationName = $vaccination->getRandomName();
                        $vaccination->move('./uploads/jobseekerRequirements/vaccination', $vaccinationName);
                    }
                }
            }

            if ($sss !== null) {
                if ($sss->isValid() && !$sss->hasMoved()) {
                    if ($sss->getSize() > 0) { // Check if the file is not empty
                        $sssName = $sss->getRandomName();
                        $sss->move('./uploads/jobseekerRequirements/sss', $sssName);
                    }
                }
            }

            if ($pagibig !== null) {
                if ($pagibig->isValid() && !$pagibig->hasMoved()) {
                    if ($pagibig->getSize() > 0) { // Check if the file is not empty
                        $pagibigName = $pagibig->getRandomName();
                        $pagibig->move('./uploads/jobseekerRequirements/pagibig', $pagibigName);
                    }
                }
            }

            if ($philhealth !== null) {
                if ($philhealth->isValid() && !$philhealth->hasMoved()) {
                    if ($philhealth->getSize() > 0) { // Check if the file is not empty
                        $philhealthName = $philhealth->getRandomName();
                        $philhealth->move('./uploads/jobseekerRequirements/philhealth', $philhealthName);
                    }
                }
            }

            if ($tin !== null) {
                if ($tin->isValid() && !$tin->hasMoved()) {
                    if ($tin->getSize() > 0) { // Check if the file is not empty
                        $tinName = $tin->getRandomName();
                        $tin->move('./uploads/jobseekerRequirements/tin', $tinName);
                    }
                }
            }

        } catch (\RuntimeException $e) {
            $errorMessage = 'Error: ' . $e->getMessage();
            return redirect()->to('joblists')->with('error', $errorMessage);
        } catch (\Exception $e) {
            $errorMessage = 'Unexpected error occurred: ' . $e->getMessage();
            return redirect()->to('joblists')->with('error', $errorMessage);
        }


        if ($jobseekerId) {
            // Check if the jobseeker ID already exists in the database
            $existingRecord = $this->jsamodel->where('jobseekerId', $jobseekerId)->first();

            $existingApplication = $this->jsamodel->where('jobseekerId', $jobseekerId)->where('jobPostId', $jobPostId)->first();
            
            // If the jobseeker ID already exists, don't insert a new record
            if ($existingApplication) {
                return redirect()->to('joblists')->with('error', 'You have already applied.');
            }
            
            // If the jobseeker ID doesn't exist, proceed with insertion
            $jobseeker = $this->resmodel->where('jobseekerId', $jobseekerId)->first();
            
            $data = [
                'resume' => $jobseeker['resume'],
                'jobseekerId' => $jobseekerId,
                'jobPostId' => $jobPostId,
                'jobTitle' =>$matchId['jobTitle'],
                'employerId' =>$matchId['employerId'],
                'fullname' =>$matchName['fullname'],
                // 'location' =>$matchName['workLocation'],
                'typeEmployment' =>$matchId['jobOption'],
                'salary' =>$matchId['salary'],

                'vaccination' => $vaccinationName,
                'sss' => $sssName,
                'pagibig' => $pagibigName,
                'philhealth' => $philhealthName,
                'tin' => $tinName,
                'otherrequirements' => $otherRequirementFileNamesString,
            ];
            
            $result = $this->jsamodel->insert($data);
            
            if ($result) {
                return redirect()->to('joblists')->with('success', 'Resume uploaded successfully.');
            } else {
                return redirect()->to('joblists')->with('error', 'Failed to upload resume.');
            }
        } else {
            // Handle the case where the jobseeker ID is not set
            return redirect()->to('joblists')->with('error', 'Please log in to apply.');
        }
    }
    
    public function applyNow()
    {
        return view('default/applyNowForm');
        
    }

    public function jobDetails()
    {
        $jobId = $this->request->getPost('jobId');

        $jobseekerId = session()->get('isLoggedIn');
        
        $personalInfo = $this->pimodel->where('jobseekerId', $jobseekerId)->first();
        $jobPreference = $this->jpmodel->where('jobseekerId', $jobseekerId)->first();
        $language = $this->languagemodel->where('jobseekerId', $jobseekerId)->first();
        $educBackground = $this->ebmodel->where('jobseekerId', $jobseekerId)->first();
        $training = $this->tmodel->where('jobseekerId', $jobseekerId)->first();
        $eligibility = $this->elmodel->where('jobseekerId', $jobseekerId)->first();
        $workExperience = $this->wemodel->where('jobseekerId', $jobseekerId)->first();
        $otherSkills = $this->osmodel->where('jobseekerId', $jobseekerId)->first();

        $jobIdDetails = $this->ejpmodel->where('id', $jobId)->first();

        if($personalInfo && $jobPreference && $language && $educBackground && $training && $eligibility && $workExperience && $otherSkills){
            $combinedData = [
                'personalInfo' => $personalInfo,
                'jobPreference' => $jobPreference,
                'language' => $language,
                'educBackground' => $educBackground,
                'training' => $training,
                'eligibility' => $eligibility,
                'workExperience' => $workExperience,
                'otherSkills' => $otherSkills,
                'details' => $jobIdDetails,
            ];
            return view('default/jobdetails', $combinedData);
        }else{
            return view('default/jobdetails', ['details' => $jobIdDetails]);
        }
    }       
    
    public function generatePdf() {
        // Load the Dompdf library
        require_once APPPATH . '../vendor/autoload.php';
    
        // Use the Dompdf namespace
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
    
        // Get the jobseeker info
        $jobseekerId = session()->get('isLoggedIn');
        $matchId = $this->pimodel->where('jobseekerId', $jobseekerId)->first();
        $matchIdJp = $this->jpmodel->where('jobseekerId', $jobseekerId)->first();
        $matchIdL = $this->languagemodel->where('jobseekerId', $jobseekerId)->first();
        $matchIdEb = $this->ebmodel->where('jobseekerId', $jobseekerId)->first();
        $matchIdT = $this->tmodel->where('jobseekerId', $jobseekerId)->first();
        $matchIdEl = $this->elmodel->where('jobseekerId', $jobseekerId)->first();
        $matchIdWe = $this->wemodel->where('jobseekerId', $jobseekerId)->first();
        $matchIdOs = $this->osmodel->where('jobseekerId', $jobseekerId)->first();
        
        // Format the personal information for the PDF
        $personalInfo = "
        <div style='margin: 0 auto; width: 100%;'>
            <br>
            <br>
            <table border='1' style='width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;'>
                <tr>
                    <td colspan='1' style='vertical-align: top;'> 
                        <b style='margin-top: 0;'>NSRP Form 1<br>January 2017</b>
                    </td>
                    <td colspan='11' style='text-align: center; vertical-align: top;'> 
                        <p style='margin: 0;'>Republic of the Philippines<br>Department of Labor and Employment</p>
                        <b style='margin-bottom: 0;'>PESO EMPLOYMENT INFORMATION SYSTEM<br>REGISTRATION FORM</b>
                    </td>
                </tr>
                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0;'><b>I. PERSONAL INFORMATION</b></h5>
                    </td>
                </tr>
                <tr>
                    <td colspan='3' style='vertical-align: top;'>
                        <div>
                            <h5 style='text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['SurName']}</h5>
                        </div>
                        <h5 style='margin-bottom: 0; font-size: 14px;'>SURNAME</h5>
                    </td>
                    <td colspan='5' style='vertical-align: top;'>
                        <div>
                            <h5 style='text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['FirstName']}</h5>
                        </div>
                        <h5 style='margin-bottom: 0; font-size: 14px;'>FIRST NAME</h5>
                    </td>
                    <td colspan='3' style='vertical-align: top;'>
                        <div>
                            <h5 style='text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['MiddleName']}</h5>
                        </div>
                        <h5 style='margin-bottom: 0; font-size: 14px;'>MIDDLE NAME</h5>
                    </td>
                    <td colspan='1' style='vertical-align: top;'>
                        <div>
                            <h5 style='text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Suffix']}</h5>
                        </div>
                        <h5 style='margin-bottom: 0; font-size: 14px;'>SUFFIX</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>DATE OF BIRTH</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['DateOfBirth']}</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>PLACE OF BIRTH</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['PlaceOfBirth']}</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>SEX</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Sex']}</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>RELIGION</h5>
                    </td>
                    <td colspan='5'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Religion']}</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>PRESENT ADDRESS</b></h5>
                    </td>
                </tr>
                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>House No./Street Village</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['HouseNoOrStreet']}</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>Barangay</h5>
                    </td>
                    <td colspan='5'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Barangay']}</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>Municipality/City</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['MunicipalityOrCity']}</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>Province</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Province']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>CIVIL STATUS</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['CivilStatus']}</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>DISABILITY</h5>
                    </td>
                    <td colspan='5'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Disability']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>TIN</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['TinNo']}</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>HEIGHT</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Height']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>GSIS/SSS ID NO.</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['GsisOrSssNo']}</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>EMAIL ADDRESS</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['EmailAddress']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>PAG-IBIG NO.</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['PagibigNo']}</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>LANDLINE NUMBER</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['LandlineNo']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>PHILHEALTH NO.</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['PhilhealthNo']}</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>CELLPHONE NUMBER</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['CellphoneNo']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'>EMPLOYMENT STATUS</h5>
                    </td>
                    <td colspan='3'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['EmploymentStatus']}</h5>
                    </td>
                    <td colspan='1'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>TYPE</h5>
                    </td>
                    <td colspan='6'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Type']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Are you actively</b></h5>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>looking for work?</b></h5>
                    </td>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['ActivelyLooking']}</h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>How long have you</b></h5>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>been looking for work?</b></h5>
                    </td>
                    <td colspan='4'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['LookingWork']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Willing to work immediately?</b></h5>
                    </td>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['WillingWork']}</h5>
                    </td>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>If no, when?</b></h5>
                    </td>
                    <td colspan='6'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['IfNo']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Are you a 4Ps beneficiary?</b></h5>
                    </td>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['Beneficiary']}</h5>
                    </td>
                    <td colspan='2'>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>If yes, Household ID No.</b></h5>
                    </td>
                    <td colspan='6'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchId['IfYesHousehold']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>II. JOB PREFERENCE</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>PREFERRED OCCUPATION</b></h5>
                    </td>

                    <td colspan='9' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>PREFERRED WORK LOCATION</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>1. {$matchIdJp['PreferredOccu1']}</h5>
                    </td>
                   
                    <td colspan='5' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>Local specify cities/municipalities:</h5>
                    </td>
                
                    <td colspan='4' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>Overseas, specify countries:</h5>
                    </td>

                </tr>

                <tr>
                    <td  colspan='3' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>2. {$matchIdJp['PreferredOccu2']}</h5>
                    </td>
                
                    <td  colspan='5' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>1. {$matchIdJp['PreferredLocCity1']}</h5>
                    </td>

                    <td  colspan='4' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>1. {$matchIdJp['PreferredLocOverseas1']}</h5>
                    </td>

                <tr>
                    <td  colspan='3' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdJp['PreferredOccu3']}</h5>
                    </td>
                
                    <td  colspan='5' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>2. {$matchIdJp['PreferredLocCity2']}</h5>
                    </td>

                    <td  colspan='4' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>2. {$matchIdJp['PreferredLocOverseas2']}</h5>
                    </td>

                <tr>
                    <td  colspan='3' style='vertical-align: top;'>
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>4. {$matchIdJp['PreferredOccu4']}</h5>
                    </td>
                
                    <td  colspan='5' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdJp['PreferredLocCity3']}</h5>
                    </td>

                    <td  colspan='4' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdJp['PreferredLocOverseas3']}</h5>
                    </td>

                <tr>
                    <td colspan='1' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>Expected salary (Range)</h5>
                    </td>
                
                    <td colspan='3' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdJp['ExpectedSalaryRange']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>Passport No.</h5>
                    </td>
                
                    <td colspan='4' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdJp['PassportNo']}</h5>
                    </td>

                    <td colspan='1'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; font-size: 14px;'>Expiry date</h5>
                    </td>
                
                    <td td colspan='2' style='vertical-align: top;'>
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdJp['ExpiryDate']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0;  font-size: 14px;'><b>III. LANGUAGE/DIALECT PROFICIENCY</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0;'><b></b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>READ</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>WRITE</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>SPEAK</b></h5>
                    </td>

                    <td colspan='4' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>UNDERSTAND</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>English</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['EnglishRead']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['EnglishRead']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['EnglishRead']}</h5>
                    </td>

                    <td colspan='4' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['EnglishRead']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Filipino</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['FilipinoRead']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['FilipinoRead']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['FilipinoRead']}</h5>
                    </td>

                    <td colspan='4' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['FilipinoRead']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Others: {$matchIdL['OthersLanguage']}</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['OthersRead']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['OthersRead']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['OthersRead']}</h5>
                    </td>

                    <td colspan='4' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdL['OthersRead']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>IV. EDUCATIONAL BACKGROUND</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='9' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0;'><b></b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>If undergraduate</b></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0;'><b></b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0;'><b></b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>School</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Course</b></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Year</b></h5>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>graduated</b></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>what level?</b></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>year last</b></h5>
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>attended</b></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Awards received</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Elementary</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['ElementarySchool']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['ElementaryYearGrad']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['ElementaryLevel']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['ElementaryLastAttend']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['ElementaryAwards']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Secondary</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['SecondarySchool']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['SecondaryCourse']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['SecondaryYearGrad']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['SecondaryLevel']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['SecondaryLastAttend']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['SecondaryAwards']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Tertiary</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['TertiarySchool']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['TertiaryCourse']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['TertiaryYearGrad']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['TertiaryLevel']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['TertiaryLastAttend']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['TertiaryAwards']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Graduate Studies</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['GradStudiesSchool']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['GradStudiesCourse']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['GradStudiesYearGrad']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEb['GradStudiesAward']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>V. TECHNICAL/VOCATIONAL AND OTHER TRAINING</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='4' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>TRAINING/VOCATIONAL COURSE</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Duration</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Training Institution</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Certificates Received</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='4' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>1. {$matchIdT['TrainingTitle1']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingDuration1']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingInstitution1']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingCertificate1']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='4' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>2. {$matchIdT['TrainingTitle2']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingDuration2']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingInstitution2']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingCertificate2']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='4' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdT['TrainingTitle3']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingDuration3']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingInstitution3']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdT['TrainingCertificate3']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>VI. ELIGIBILITY/PROFESSIONAL LICENSE</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Civil Service</b></h5>
                    </td>

                    <td colspan='1' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Rating</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Date of Examination</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>PROFESSIONAL LICENSE</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Valid Until</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>1. {$matchIdEl['EligibilityTitle1']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEl['EligibilityRating1']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEl['EligibilityDate1']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>1. {$matchIdEl['LicenseTitle1']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEl['LicenseUntil1']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>2. {$matchIdEl['EligibilityTitle2']}</h5>
                    </td>

                    <td colspan='1' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEl['EligibilityRating2']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEl['EligibilityDate2']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>2. {$matchIdEl['LicenseTitle2']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdEl['LicenseUntil2']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>VII. WORK EXPERIENCE</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Company Name</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Address</b></h5>
                    </td>

                    <td colspan='3' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Position</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Inclusive Dates</b></h5>
                    </td>

                    <td colspan='2' style='vertical-align: top; text-align: center;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>Status</b></h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>1. {$matchIdWe['CompanyName1']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyAddress1']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyPosition1']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyDates1']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyStatus1']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>2. {$matchIdWe['CompanyName2']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyAddress2']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyPosition2']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyDates2']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyStatus2']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>3. {$matchIdWe['CompanyName3']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyAddress3']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyPosition3']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyDates3']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyStatus3']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>4. {$matchIdWe['CompanyName4']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyAddress4']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyPosition4']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyDates4']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyStatus4']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='3' style='vertical-align: top;'> 
                    <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>5. {$matchIdWe['CompanyName5']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyAddress5']}</h5>
                    </td>

                    <td colspan='3' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyPosition5']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyDates5']}</h5>
                    </td>

                    <td colspan='2' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdWe['CompanyStatus5']}</h5>
                    </td>
                </tr>

                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0; margin-top: 0; font-size: 14px;'><b>VIII. OTHER SKILLS ACQUIRED WITHOUT FORMAL TRAINING</b></h5>
                    </td>
                </tr>

         
                
                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdOs['Beautician']}</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan='12' style='vertical-align: top;'> 
                        <h5 style='margin-bottom: 0;  margin-top: 0; text-transform: uppercase; font-weight: normal; font-size: 14px;'>{$matchIdOs['CarpentryWork']}</h5>
                    </td>
                </tr>

            </table>
        </div>
        ";
    

    
        // Load HTML content into Dompdf
        $dompdf->loadHtml($personalInfo);
    
        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
    
        // Render PDF (important step)
        $dompdf->render();
    
        // Output generated PDF to browser
        $dompdf->stream('personal_information.pdf', ['Attachment' => 0]);
    }
    
    
}

// $personalInfo = "
//         <br>
//         <br>
//             <table border='1'>
//             <tr>
//                 <td> 
//                     <b>NSRP Form 1 
//                     <br>
//                     January 2017
//                     </b>
//                 </td>
//                 <td> 
//                     <b>Republic of the Philippines
//                     <br>
//                     Department of Labor and Employment
//                     <br>
//                     PESO EMPLOYMENT INFORMATION SYSTEM
//                     <br>
//                     REGISTRATION FORM
//                     </b>
//                 </td>
//             </tr>
//             SURNAME: {$matchId['SurName']}\n
//             FIRST NAME: {$matchId['FirstName']}\n
//             MIDDLE NAME: {$matchId['MiddleName']}\n
//             SUFFIX: {$matchId['Suffix']}\n
//             DATE OF BIRTH: {$matchId['DateOfBirth']}\n
//             PLACE OF BIRTH: {$matchId['PlaceOfBirth']}\n
//             SEX: {$matchId['Sex']}\n
//             RELIGION: {$matchId['Religion']}\n
//             House No./Street Village: {$matchId['HouseNoOrStreet']}\n
//             CIVIL STATUS: {$matchId['CivilStatus']}\n
//             Barangay: {$matchId['Barangay']}\n
//             Municipality/City: {$matchId['MunicipalityOrCity']}\n
//             Province: {$matchId['Province']}\n
//             TIN: {$matchId['TinNo']}\n
//             HEIGHT: {$matchId['Height']}\n
//             GSIS/SSS ID NO.: {$matchId['GsisOrSssNo']}\n
//             EMAIL ADDRESS: {$matchId['EmailAddress']}\n
//             PAG-IBIG NO.: {$matchId['PagibigNo']}\n
//             LANDLINE NUMBER: {$matchId['LandlineNo']}\n
//             PHILHEALTH NO.: {$matchId['PhilhealthNo']}\n
//             CELLPHONE NUMBER: {$matchId['CellphoneNo']}\n
//             DISABILITY: {$matchId['Disability']}\n
//             EMPLOYMENT STATUS: {$matchId['EmploymentStatus']}\n
//             TYPE: {$matchId['Type']}\n
//             Are you actively looking for work?: {$matchId['ActivelyLooking']}\n
//             How long have you been looking for work?: {$matchId['LookingWork']}\n
//             Willing to work immediately?: {$matchId['WillingWork']}\n
//             If no, when?: {$matchId['IfNo']}\n
//             Are you a 4Ps beneficiary?: {$matchId['Beneficiary']}\n
//             If yes, Household ID No.: {$matchId['IfYesHousehold']}\n

//             </table>
//         ";