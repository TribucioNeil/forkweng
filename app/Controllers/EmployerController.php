<?php

namespace App\Controllers;

use App\Models\EmployerLoginModel;

class EmployerController extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->elmodel = new \App\Models\EmployerLoginModel();
        $this->ecmodel = new \App\Models\EmployerCompanyModel();
        $this->ejpmodel = new \App\Models\EmployerJobPostModel();
        $this->jsmodel = new \App\Models\JobseekerModel();
        $this->jsamodel = new \App\Models\JobseekerApplyModel();
    }

    public function barangaymap()
    {
        $id = $this->request->getPost('id');
        $jobinfoId = $this->ejpmodel->find($id);
        if($jobinfoId){
            $data = [
                'lat' => $jobinfoId['lat'],
                'lng' => $jobinfoId['lng'],
                'coordinates' => [
                    "Balingayan" => ["lat" => "13.267330" , "lng" => "121.144463"], "Balite" => ["lat" => "13.41622490022688" , "lng" => "121.15896673224688"],
                    "Baruyan" => ["lat" => "13.356410" , "lng" => "121.139870"], "Batino" => ["lat" => "13.36664332396049" , "lng" => "121.20272798669446"],
                    "Bayanan 1" => ["lat" => "13.365597573883665" , "lng" => "121.16240359194168"], "Bayanan 2" => ["lat" => "13.362775646879088" , "lng" => "121.17250610018233"],
                    "Bulusan" => ["lat" => "13.40368838150444" , "lng" => "121.20572085898694"], "Comunal" => ["lat" => "13.316414039138754" , "lng" => "121.15506196598129"],
                    "Guinobatan" => ["lat" => "13.396495727713228" , "lng" => "121.18643508465983"], "Gutad" => ["lat" => "13.37767358580131" , "lng" => "121.21756046149638"],
                    "Ibaba East" => ["lat" => "13.415084989527791" , "lng" => "121.17945803810771"], "Ibaba West" => ["lat" => "13.413953988297331" , "lng" => "121.17527916983742"],
                    "Ilaya" => ["lat" => "13.414693861993891" , "lng" => "121.18289899472632"], "Lalud" => ["lat" => "13.400421761570605" , "lng" => "121.17584345251527"],
                    "Lazareto" => ["lat" => "13.424834646323504" , "lng" => "121.20202190805063"], "Libis" => ["lat" => "13.412304953616225" , "lng" => "121.17963407867863"],
                    "Lumangbayan" => ["lat" => "13.401608716781409" , "lng" => "121.17975575963835"], "Maidlang" => ["lat" => "13.392477475726434" , "lng" => "121.21779799772851"],
                    "Malamig" => ["lat" => "13.347969642353188" , "lng" => "121.14549122811088"], "Managpi" => ["lat" => "13.325683020359014" , "lng" => "121.19522603663877"],
                    "Nag-Iba 1" => ["lat" => "13.345346642458018" , "lng" => "121.25987732529413"], "Nag-Iba 2" => ["lat" => "13.350512928349103" , "lng" => "121.25310215598486"],
                    "Navotas" => ["lat" => "13.368139152952573" , "lng" => "121.25900409450091"], "Pachoca" => ["lat" => "13.4110566222515" , "lng" => "121.16690391403883"],
                    "Palhi" => ["lat" => "13.385448526729405" , "lng" => "121.19964896650636"], "Panggalaan" => ["lat" => "13.30979682156256" , "lng" => "121.20539414537659"],
                    "Parang" => ["lat" => "13.400177490522694" , "lng" => "121.22432371137333"], "Patas" => ["lat" => "13.347402471651746" , "lng" => "121.11846622786756"],
                    "Puting Tubig" => ["lat" => "13.341907238972242" , "lng" => "121.18129549646044"], "San Antonio" => ["lat" => "13.378178354215988" , "lng" => "121.16482760929728"],
                    "San Vicente Central" => ["lat" => "13.412442760592585" , "lng" => "121.1781357653511"], "San Vicente East" => ["lat" => "13.409733796320534" , "lng" => "121.18036590980373"],
                    "San Vicente North" => ["lat" => "13.413232552039398" , "lng" => "121.17853140504774"], "San Vicente South" => ["lat" => "13.41010570353853" , "lng" => "121.17782329657751"],
                    "San Vicente West" => ["lat" => "13.412108097143307" , "lng" => "121.17645140239817"], "Sta. Cruz" => ["lat" => "13.33102536909592" , "lng" => "121.25208903567889"],
                    "Sta. Isabel" => ["lat" => "13.376312056805324" , "lng" => "121.17253355619333"], "Sto. Niño (formerly Nacoco)" => ["lat" => "13.407540958285361" , "lng" => "121.18551888639936"],
                    "Sapul" => ["lat" => "13.359693342833634" , "lng" => "121.18426350668923"], "Silonay" => ["lat" => "13.401151024016396" , "lng" => "121.21045178611415"],
                    "Sta. Maria Village" => ["lat" => "13.405601322098592" , "lng" => "121.16861519751387"], "Suqui" => ["lat" => "13.418627431384328" , "lng" => "121.20505779103442"],
                    "Tawagan" => ["lat" => "13.381037135649294" , "lng" => "121.14476182100721"], "Tawiran" => ["lat" => "13.393967604375495" , "lng" => "121.16779729903342"],
                    "Tibag" => ["lat" => "13.410632118328717" , "lng" => "121.17393716271954"], "Wawa" => ["lat" => "13.398626242375562," , "lng" => "121.1519895104849"],
                    // Add the rest of your coordinates here
                ]
            ];
            return view('default/barangaymap', $data);
        }
    }
        
    public function viewdetailsjobseekersemp()
    {
        $employerId = session()->get('employerLoggedIn');
        $empdata = $this->ecmodel->where('employerId', $employerId)->first();

        $jobseekerId = $this->request->getVar('jobApplyId');


        if($empdata){
            $jobseekerData = $this->jsamodel->where('id', $jobseekerId)->first();

            $jobpostId = $this->ejpmodel->where('id', $jobseekerData['jobPostId'])->first();

            $combinedData = [
                'empdata' => $empdata,
                'info' => $jobseekerData,
                'jobpostid' => $jobpostId,
            ];
            return view('employer/pages/viewdetailsjobseekeremp', $combinedData);
        }else{
            echo 'error';
        }
    } public function employerapplicants()
    {
        $employerId = session()->get('employerLoggedIn');
        $empdata = $this->ecmodel->where('employerId', $employerId)->first();
        if ($empdata) {
            $applicants = $this->jsamodel->where('employerId', $employerId)->findAll();
    
            $data = [
                'empdata' => $empdata,
                'applicants' => $applicants
            ];
    
            return view('employer/pages/applicants', $data);
        } else {
            return redirect()->route('errorPage');
        }
    }

    
    public function employerhome()
        {
        $employerId = session()->get('employerLoggedIn');
        $empdata = $this->ecmodel->where('employerId', $employerId)->first();
        
        if ($empdata) {
            $applicants = $this->jsamodel->where('employerId', $employerId)->findAll();
        
            $employedCount = 0;
            $unemployedCount = 0;
        
            // Loop through applicants and count based on profileStatus
            foreach ($applicants as $applicant) {
            switch ($applicant['status']) {
                case 'approved':
                $employedCount++;
                break;
                case 'pending': // Consider pending as unemployed (modify as needed)
                $unemployedCount++;
                break;
                default:
                // Handle unexpected profileStatus values (optional)
                break;
            }
            }
        
            $data = [
            'empdata' => $empdata,
            'applicants' => $applicants,
            'employedCount' => $employedCount,
            'unemployedCount' => $unemployedCount,
            ];
        
            return view('employer/pages/home', $data);
        } else {
            return redirect()->to(route('errorPage'));
        }
        }
        
    

    public function newemployerprofile()
    {
        $employerId = session()->get('employerLoggedIn');
        $matchId = $this->ecmodel->where('employerId', $employerId)->first();
        if($matchId){
            return view('employer/pages/employerprofile', ['empdata' => $matchId]);
        }
    }

    public function employerprofile()
    {
        $employerId = session()->get('employerLoggedIn');
        $matchId = $this->ecmodel->where('employerId', $employerId)->first();
        if($matchId){
            return view('employer/pages/companyprofile', ['empdata' => $matchId]);
        }
    }

    public function employerjobs()
    {
        $employerId = session()->get('employerLoggedIn');

        $empdata = $this->ecmodel->where('employerId', $employerId)->first();
        
        if ($empdata) {
            $jobPosts = $this->ejpmodel->where('employerId', $employerId)->where('job_status', 'posted')->findAll();
            
            $data = [
                'empdata' => $empdata,
                'jobPosts' => $jobPosts
            ];
    
            return view('employer/pages/joblist', $data);
        } else {
            // Handle the case when $empdata is null, e.g., redirect to an error page
            return redirect()->route('errorPage');
        }
    }
    

   

    public function viewemployerapplicants()
    {
        $employerId = session()->get('employerLoggedIn');
        
        // Retrieve empdata from your model or session
        $empdata = $this->ecmodel->where('employerId', $employerId)->first();

        $jobseekerId = $this->request->getVar('jobApplyId');


        if ($empdata) {
    
            $jobseekerData = $this->jsamodel->where('jobPostId', $jobseekerId)->findAll();


            $combinedData = [
                'empdata' => $empdata,
                'jobseekerData' => $jobseekerData,
            ];
    
            return view('employer/pages/viewapplicants', $combinedData);
        } else {
            return redirect()->route('errorPage');
        }
    }
    


    public function employerapplicantssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss()
    {
        $employerId = session()->get('employerLoggedIn');

        $applicants  = $this->jsamodel->where('employerId', $employerId)->findAll();
        return view('employer/pages/applicants', ['applicants' => $applicants]);
    }

    public function viewJobseeker($id = null)
    {
        $data = [
            'jobbb' => $this->jsamodel->where('id', $id)->first(),
        ];
        return view('admin/pages/jobseekerapplydetails', $data);
    }

    public function getJobseeker()
    {
        $jobseekerId = $this->request->getPost('jobseekerId');
        $jobseeker = $this->jsamodel->find($jobseekerId);
        return view('employer/pages/jobseekerapplydetails', ['jobbb' => $jobseeker]);
    }

    public function employerlogin()
    {
        return view('employer/pages/employerlogin');
    }

    public function employersignup()
    {
        return view('employer/pages/employersignup');
    }

    public function employerForgot()
    {
        return view('employer/pages/employerforgot');
    }

    public function employerForgotForm()
    {
        return view('employer/pages/employerforgotform');
    }

    public function showError()
    {
        return redirect()->to('employerjobs')->with('error', 'Please wait for your account approval by the admin.');
    }

    public function showErrorBlock()
    {
        return redirect()->to('employerjobs')->with('error', 'Sorry, you cannot post as you do not meet the required qualifications.');
    }

    public function showErrorBlocks()
    {
        return redirect()->to('employerjobs')->with('error', 'Sorry, you cannot post because your account has been blocked by the admin.');
    }
    
    public function employerForgotFormProcess()
    {
        $employerId = session()->get('employerForgot');
        $employerData = $this->elmodel->find($employerId);

        $password = $this->request->getPost('password');
        $confirmpassword = $this->request->getPost('confirmpassword');

        $validationRules = [
            'password'=>'required|min_length[8]|matches[confirmpassword]',
            'confirmpassword'=>'required'
        ];

        if(!$this->validate($validationRules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updatedData = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $success = $this->elmodel->update($employerId, $updatedData);

        if($success){
            $this->session->setFlashdata('success', 'Your password has been reset!');
            return redirect()->to('logoutEmployer');
        }else{
            $this->session->setFlashdata('error', 'Error!');
            return redirect()->to('logoutEmployer');
        }
        

    }

    public function employerForgotProcess()
    {   
        $email = $this->request->getPost('email');

        $employerEmail = $this->elmodel->where('emailAddress', $email)->first();

        if(!$employerEmail){
            $this->session->setFlashdata('error', 'Error. Email cant find');
            return redirect()->to('employerForgot');

        }else{
            $message = "Someone (hopefully you!) requested a password reset for your account. Click the link below to choose a new password. ".anchor('forgotEmployerLink/'.$employerEmail['activationKey'], 'Reset your password');
            $emailInstance = \Config\Services::email();

            $emailInstance->setFrom('PESO Calapan');
            $emailInstance->setTo($employerEmail['emailAddress']);
            $emailInstance->setSubject('Forgot password');
            $emailInstance->setMessage($message);
            if($emailInstance->send()){
                $this->session->setFlashdata('success', 'We have emailed your password reset link!');
                return redirect()->to('employerForgot');
            }else{
                $this->session->setFlashdata('error', 'Error. Email cant find');
                return redirect()->to('employerForgot');
            }
        }
    }

    public function forgotEmployerLink($linkHere)
    {
        $checkEmployerLink = $this->elmodel->where('activationKey', $linkHere)->findAll();
        if(count($checkEmployerLink)>0){
            session()->set('employerForgot', $checkEmployerLink[0]['id']);
            return redirect()->to('employerForgotForm');
        }
        else{
            echo 'error while ';
        }
    }

    public function employerSignupProcess()
    {
        $fullname = $this->request->getPost('Fullname');
        $email = $this->request->getPost('Email');
        $password = $this->request->getPost('Password');
        $confirmpassword = $this->request->getPost('confirmPassword');
        $captcha = $this->request->getPost('captcha');

        if($password !== $confirmpassword){
            $this->session->setFlashdata('error', 'Password and confirm password do not match');
            return redirect()->to('employersignup');
        }

        $captcha_code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()'), 0, 6);
        session()->set('captcha_code', $captcha_code);

        $captchaSession = session()->get('captcha');
        if($captcha !== $captchaSession){
            $this->session->setFlashdata('error', 'CAPTCHA code is incorrect. Please try again.');
            return redirect()->to('employersignup');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'fullName'=>$fullname,
            'emailAddress'=>$email,
            'password'=>$password,
            'activationKey'=>bin2hex(random_bytes(50)),
        ];

        $message = "Please activate your account ".anchor('activateEmployer/'.$data['activationKey'], 'Activate Now');
        $emailInstance = \Config\Services::email();

        $emailInstance->setFrom('PESO Calapan', 'Activate your account');
        $emailInstance->setTo($data['emailAddress']);
        $emailInstance->setSubject('Activate the account');
        $emailInstance->setMessage($message);

        $GetEmail = $this->elmodel->where('emailAddress', $email)->first();
        if($GetEmail){
            $this->session->setFlashdata('error', 'Email already exists. Please choose a different email address.');
            return redirect()->to('employersignup');
        }else{
            if($emailInstance->send()){
                $result = $this->elmodel->insert($data);
                $getEmail = $this->elmodel->where('emailAddress', $email)->first();
                if($getEmail){
                    if($result){
                        $getId = $this->elmodel->where('emailAddress', $email)->first();
                        $employerId = $getId['id'];
                        $id = [
                            'employerId' => $employerId,
                        ];
                        $resulting = $this->ecmodel->insert($id);
                        if($resulting){
                            session()->set('isEmailVerify', $getEmail['id']);
                            $this->session->setFlashdata('success', 'Check your email or in spam folder to validated your account');
                            return redirect()->to('employerVerifyEmail');
                        }else{
                            $this->session->setFlashdata('error', 'Id not insert to company table');
                            return redirect()->to('employersignup');
                        }
                    }
                    else{
                        echo 'Error while register';
                        $this->session->setFlashdata('error', 'Data cannot insert to the database');
                        return redirect()->to('employersignup');
                    }
                }else{
                    $this->session->setFlashdata('error', 'Incorrect email');
                    return redirect()->to('employersignup');
                }
            }else{
                $data = $emailInstance->printDebugger(['headers']);
                print($data);
            }
    
            if($result){
                $this->session->setFlashdata('success', 'Successfully register, wait for the admin to approved.');
                return redirect()->to('employerlogin');
            }
            else{
                $this->session->setFlashdata('error', 'Error. Please try again');
                return redirect()->to('employersignup');
            }
        }
        
    }

    public function employerResend()
    {
        $employerEmailMatch = $this->request->getPost('emailAddress');

        $employerData = $this->elmodel->where('emailAddress', $employerEmailMatch)->first();

        if($employerData){
            if($employerData['activationStatus'] == 'Approved'){
                return redirect()->to('employerVerifyEmail')->with('error', 'Your account is already validated');
            }
            elseif($employerData['activationStatus'] == 'Pending'){
                $message = "Please activate your account ".anchor('activateEmployer/'.$employerData['activationKey'], 'Activate Now');
                $email = \Config\Services::email();
        
                $email->setFrom('PESO Calapan', 'Activate your account');
                $email->setTo($employerData['emailAddress']);
        
                $email->setSubject('Activate the account');
                $email->setMessage($message);
        
                if($email->send()){
                    return redirect()->to('employerVerifyEmail')->with('success', 'Check your email or in spam folder to validate your account');
                }
                else{
                    $employerData = $email->printDebugger(['headers']);
                }
                $email->printDebugger(['headers']);
            }
        }else{
            return redirect()->to('employerVerifyEmail')->with('error', 'Email address is not existing');
        }

        
    }

    public function employerVerifyEmail()
    {
        // if (!session()->get('isEmailVerify')) {
        //     return redirect()->to('employersignup');
        // }
    
        // $employerId = session()->get('isEmailVerify');
        // $employerData = $this->elmodel->find($employerId);
    
        // if ($employerData) {
        //     $data['email'] = $employerData['emailAddress'];
        // } else {
            // Handle the case where user data is not found
            // You may redirect to an error page or handle it as needed
        // }
        
        return view('employer/pages/employerverifyemail');
    }

    public function activateEmployer($linkHere)
    {
        $checkEmployerLink = $this->elmodel->where('activationKey', $linkHere)->findAll();
        if(count($checkEmployerLink)>0){
            $data['activationStatus'] = 'Approved';
            $activationStatus = $this->elmodel->update($checkEmployerLink[0]['id'], $data);
            if($activationStatus){
                $this->session->setFlashdata('success', 'You can now login.');
                return redirect()->to('employerlogin');
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

    public function employerLoginProcess()
{
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $result = $this->elmodel->where('emailAddress', $email)->first();
    if($result !== null){
        if($result['activationStatus'] == 'Approved'){
            $passwordValidation = password_verify($password, $result['password']);
            if($passwordValidation){
                session()->set('employerLoggedIn', $result['id']);
                return redirect()->to('employerhome');
            }
            else{
                $this->session->setFlashdata('error', 'Incorrect password. Please try again');
                return redirect()->to('employerlogin');
            }
        }
        elseif($result['activationStatus'] == 'Blocked'){
            $this->session->setFlashdata('error', 'Your account is blocked. Please contact support.');
            return redirect()->to('employerlogin');
        }
        else{
            $this->session->setFlashdata('error', 'Your account is not yet approved.');
            return redirect()->to('employerlogin');
        }
    }
    else{
        $this->session->setFlashdata('error', 'Invalid email address. Please try again.');
        return redirect()->to('employerlogin');
    }
}


    public function logoutEmployer()
    {
        session()->destroy();
        return redirect()->to('employerlogin');

    }
    
    public function companyProfileProcess()
    {
        $companyName = $this->request->getPost('companyName');
        $workForce = $this->request->getPost('workForce');
        $industry = $this->request->getPost('industry');
        $address = $this->request->getPost('address');
        $barangay = $this->request->getPost('barangay');
        $city = $this->request->getPost('city');
        $province = $this->request->getPost('province');

        $renewalLicense = $this->request->getFile('renewalLicense'); // Use getFile to retrieve uploaded file
        $jobOrder = $this->request->getFile('jobOrder');
        $certificationRegistration = $this->request->getFile('certificationRegistration');
        $exchangeCommission = $this->request->getFile('exchangeCommission');
        $letterIntent = $this->request->getFile('letterIntent');
        $accreditation = $this->request->getFile('accreditation');
        $poea = $this->request->getFile('poea');

        $barangayCoordinates = [
            "Balingayan" => ["lat" => "13.267330" , "lng" => "121.144463"], "Balite" => ["lat" => "13.41622490022688" , "lng" => "121.15896673224688"],
            "Baruyan" => ["lat" => "13.356410" , "lng" => "121.139870"], "Batino" => ["lat" => "13.36664332396049" , "lng" => "121.20272798669446"],
            "Bayanan 1" => ["lat" => "13.365597573883665" , "lng" => "121.16240359194168"], "Bayanan 2" => ["lat" => "13.362775646879088" , "lng" => "121.17250610018233"],
            "Bulusan" => ["lat" => "13.40368838150444" , "lng" => "121.20572085898694"], "Comunal" => ["lat" => "13.316414039138754" , "lng" => "121.15506196598129"],
            "Guinobatan" => ["lat" => "13.396495727713228" , "lng" => "121.18643508465983"], "Gutad" => ["lat" => "13.37767358580131" , "lng" => "121.21756046149638"],
            "Ibaba East" => ["lat" => "13.415084989527791" , "lng" => "121.17945803810771"], "Ibaba West" => ["lat" => "13.413953988297331" , "lng" => "121.17527916983742"],
            "Ilaya" => ["lat" => "13.414693861993891" , "lng" => "121.18289899472632"], "Lalud" => ["lat" => "13.400421761570605" , "lng" => "121.17584345251527"],
            "Lazareto" => ["lat" => "13.424834646323504" , "lng" => "121.20202190805063"], "Libis" => ["lat" => "13.412304953616225" , "lng" => "121.17963407867863"],
            "Lumangbayan" => ["lat" => "13.401608716781409" , "lng" => "121.17975575963835"], "Maidlang" => ["lat" => "13.392477475726434" , "lng" => "121.21779799772851"],
            "Malamig" => ["lat" => "13.347969642353188" , "lng" => "121.14549122811088"], "Managpi" => ["lat" => "13.325683020359014" , "lng" => "121.19522603663877"],
            "Nag-Iba 1" => ["lat" => "13.345346642458018" , "lng" => "121.25987732529413"], "Nag-Iba 2" => ["lat" => "13.350512928349103" , "lng" => "121.25310215598486"],
            "Navotas" => ["lat" => "13.368139152952573" , "lng" => "121.25900409450091"], "Pachoca" => ["lat" => "13.4110566222515" , "lng" => "121.16690391403883"],
            "Palhi" => ["lat" => "13.385448526729405" , "lng" => "121.19964896650636"], "Panggalaan" => ["lat" => "13.30979682156256" , "lng" => "121.20539414537659"],
            "Parang" => ["lat" => "13.400177490522694" , "lng" => "121.22432371137333"], "Patas" => ["lat" => "13.347402471651746" , "lng" => "121.11846622786756"],
            "Puting Tubig" => ["lat" => "13.341907238972242" , "lng" => "121.18129549646044"], "San Antonio" => ["lat" => "13.378178354215988" , "lng" => "121.16482760929728"],
            "San Vicente Central" => ["lat" => "13.412442760592585" , "lng" => "121.1781357653511"], "San Vicente East" => ["lat" => "13.409733796320534" , "lng" => "121.18036590980373"],
            "San Vicente North" => ["lat" => "13.413232552039398" , "lng" => "121.17853140504774"], "San Vicente South" => ["lat" => "13.41010570353853" , "lng" => "121.17782329657751"],
            "San Vicente West" => ["lat" => "13.412108097143307" , "lng" => "121.17645140239817"], "Sta. Cruz" => ["lat" => "13.33102536909592" , "lng" => "121.25208903567889"],
            "Sta. Isabel" => ["lat" => "13.376312056805324" , "lng" => "121.17253355619333"], "Sto. Niño (formerly Nacoco)" => ["lat" => "13.407540958285361" , "lng" => "121.18551888639936"],
            "Sapul" => ["lat" => "13.359693342833634" , "lng" => "121.18426350668923"], "Silonay" => ["lat" => "13.401151024016396" , "lng" => "121.21045178611415"],
            "Sta. Maria Village" => ["lat" => "13.405601322098592" , "lng" => "121.16861519751387"], "Suqui" => ["lat" => "13.418627431384328" , "lng" => "121.20505779103442"],
            "Tawagan" => ["lat" => "13.381037135649294" , "lng" => "121.14476182100721"], "Tawiran" => ["lat" => "13.393967604375495" , "lng" => "121.16779729903342"],
            "Tibag" => ["lat" => "13.410632118328717" , "lng" => "121.17393716271954"], "Wawa" => ["lat" => "13.398626242375562," , "lng" => "121.1519895104849"],
        ];

        $coordinates = $barangayCoordinates[$barangay];
        $lat = $coordinates['lat'];
        $lng = $coordinates['lng'];

        $employerId = session()->get('employerLoggedIn');
        $employerData = $this->elmodel->where('id', $employerId)->first();


        $renewalLicenseName = '';
        $jobOrderName = '';
        $certificationRegistrationName = '';
        $exchangeCommissionName = '';
        $letterIntentName = '';
        $accreditationName = '';
        $poeaName = '';
        try {
            if ($renewalLicense !== null && $renewalLicense->isValid() && !$renewalLicense->hasMoved()) {
                $renewalLicenseName = $renewalLicense->getRandomName();
                $renewalLicense->move('./uploads/employerProfile/renewalLicense', $renewalLicenseName);
            }
            if ($jobOrder !== null && $jobOrder->isValid() && !$jobOrder->hasMoved()) {
                $jobOrderName = $jobOrder->getRandomName();
                $jobOrder->move('./uploads/employerProfile/jobOrder', $jobOrderName);
            }
            if ($certificationRegistration !== null && $certificationRegistration->isValid() && !$certificationRegistration->hasMoved()) {
                $certificationRegistrationName = $certificationRegistration->getRandomName();
                $certificationRegistration->move('./uploads/employerProfile/certificationRegistration', $certificationRegistrationName);
            }
            if ($exchangeCommission !== null && $exchangeCommission->isValid() && !$exchangeCommission->hasMoved()) {
                $exchangeCommissionName = $exchangeCommission->getRandomName();
                $exchangeCommission->move('./uploads/employerProfile/exchangeCommission', $exchangeCommissionName);
            }
            if ($letterIntent !== null && $letterIntent->isValid() && !$letterIntent->hasMoved()) {
                $letterIntentName = $letterIntent->getRandomName();
                $letterIntent->move('./uploads/employerProfile/letterIntent', $letterIntentName);
            }
            if ($accreditation !== null && $accreditation->isValid() && !$accreditation->hasMoved()) {
                $accreditationName = $accreditation->getRandomName();
                $accreditation->move('./uploads/employerProfile/accreditation', $accreditationName);
            }
            if ($poea !== null && $poea->isValid() && !$poea->hasMoved()) {
                $poeaName = $poea->getRandomName();
                $poea->move('./uploads/employerProfile/poea', $poeaName);
            }
        
        } catch (\RuntimeException $e) {
            $errorMessage = 'Error: ' . $e->getMessage();
            return redirect()->to('employerprofile')->with('error', $errorMessage);
        } catch (\Exception $e) {
            $errorMessage = 'Unexpected error occurred: ' . $e->getMessage();
            return redirect()->to('employerprofile')->with('error', $errorMessage);
        }

        $data = [
            'companyName' => $companyName,
            'workForce' => $workForce,
            'industry' => $industry,
            'address' => $address,
            'barangay' => $barangay,
            'city' => $city,
            'province' => $province,
            
            'renewalLicense' => $renewalLicenseName, 
            'jobOrder' => $jobOrderName, 
            'certificationRegistration' => $certificationRegistrationName, 
            'exchangeCommission' => $exchangeCommissionName, 
            'letterIntent' => $letterIntentName, 
            'accreditation' => $accreditationName, 
            'poea' => $poeaName, 
            'profileStatus' => 'Pending',

            'lat' => $lat,
            'lng' => $lng,

            'employerName'=> $employerData['fullName'],
        ];
            $emp = $this->ecmodel->where('employerId', $employerId)->first();
            if($emp){
                $result = $this->ecmodel->update($emp['id'], $data);

                if ($result) {
                    return redirect()->to('newemployerprofile')->with('success', 'Successfully registered. Please wait for admin approval.');
                } else { 
                    
                    return redirect()->to('newemployerprofile')->with('error', 'An error occured. Please try again');
                }
            }else{
                echo 'error';
            }
    }
 
    public function jobPostProcess()
    {
        $jobTitle = $this->request->getPost('jobTitle');
        // $workLocation = $this->request->getPost('workLocation');
        $barangay = $this->request->getPost('barangay');
        $city = $this->request->getPost('city');
        $province = $this->request->getPost('province');

        $educBackground = $this->request->getPost('educBackground');
        $jobOption = $this->request->getPost('jobOption');
        $salary = $this->request->getPost('salary');
        $jobDescription = $this->request->getPost('jobDescription');
        $jobQualification = $this->request->getPost('jobQualification');
        $remarks = $this->request->getPost('remarks');

        $barangayCoordinates = [
            "Balingayan" => ["lat" => "13.267330" , "lng" => "121.144463"], "Balite" => ["lat" => "13.41622490022688" , "lng" => "121.15896673224688"],
            "Baruyan" => ["lat" => "13.356410" , "lng" => "121.139870"], "Batino" => ["lat" => "13.36664332396049" , "lng" => "121.20272798669446"],
            "Bayanan 1" => ["lat" => "13.365597573883665" , "lng" => "121.16240359194168"], "Bayanan 2" => ["lat" => "13.362775646879088" , "lng" => "121.17250610018233"],
            "Bulusan" => ["lat" => "13.40368838150444" , "lng" => "121.20572085898694"], "Comunal" => ["lat" => "13.316414039138754" , "lng" => "121.15506196598129"],
            "Guinobatan" => ["lat" => "13.396495727713228" , "lng" => "121.18643508465983"], "Gutad" => ["lat" => "13.37767358580131" , "lng" => "121.21756046149638"],
            "Ibaba East" => ["lat" => "13.415084989527791" , "lng" => "121.17945803810771"], "Ibaba West" => ["lat" => "13.413953988297331" , "lng" => "121.17527916983742"],
            "Ilaya" => ["lat" => "13.414693861993891" , "lng" => "121.18289899472632"], "Lalud" => ["lat" => "13.400421761570605" , "lng" => "121.17584345251527"],
            "Lazareto" => ["lat" => "13.424834646323504" , "lng" => "121.20202190805063"], "Libis" => ["lat" => "13.412304953616225" , "lng" => "121.17963407867863"],
            "Lumangbayan" => ["lat" => "13.401608716781409" , "lng" => "121.17975575963835"], "Maidlang" => ["lat" => "13.392477475726434" , "lng" => "121.21779799772851"],
            "Malamig" => ["lat" => "13.347969642353188" , "lng" => "121.14549122811088"], "Managpi" => ["lat" => "13.325683020359014" , "lng" => "121.19522603663877"],
            "Nag-Iba 1" => ["lat" => "13.345346642458018" , "lng" => "121.25987732529413"], "Nag-Iba 2" => ["lat" => "13.350512928349103" , "lng" => "121.25310215598486"],
            "Navotas" => ["lat" => "13.368139152952573" , "lng" => "121.25900409450091"], "Pachoca" => ["lat" => "13.4110566222515" , "lng" => "121.16690391403883"],
            "Palhi" => ["lat" => "13.385448526729405" , "lng" => "121.19964896650636"], "Panggalaan" => ["lat" => "13.30979682156256" , "lng" => "121.20539414537659"],
            "Parang" => ["lat" => "13.400177490522694" , "lng" => "121.22432371137333"], "Patas" => ["lat" => "13.347402471651746" , "lng" => "121.11846622786756"],
            "Puting Tubig" => ["lat" => "13.341907238972242" , "lng" => "121.18129549646044"], "San Antonio" => ["lat" => "13.378178354215988" , "lng" => "121.16482760929728"],
            "San Vicente Central" => ["lat" => "13.412442760592585" , "lng" => "121.1781357653511"], "San Vicente East" => ["lat" => "13.409733796320534" , "lng" => "121.18036590980373"],
            "San Vicente North" => ["lat" => "13.413232552039398" , "lng" => "121.17853140504774"], "San Vicente South" => ["lat" => "13.41010570353853" , "lng" => "121.17782329657751"],
            "San Vicente West" => ["lat" => "13.412108097143307" , "lng" => "121.17645140239817"], "Sta. Cruz" => ["lat" => "13.33102536909592" , "lng" => "121.25208903567889"],
            "Sta. Isabel" => ["lat" => "13.376312056805324" , "lng" => "121.17253355619333"], "Sto. Niño (formerly Nacoco)" => ["lat" => "13.407540958285361" , "lng" => "121.18551888639936"],
            "Sapul" => ["lat" => "13.359693342833634" , "lng" => "121.18426350668923"], "Silonay" => ["lat" => "13.401151024016396" , "lng" => "121.21045178611415"],
            "Sta. Maria Village" => ["lat" => "13.405601322098592" , "lng" => "121.16861519751387"], "Suqui" => ["lat" => "13.418627431384328" , "lng" => "121.20505779103442"],
            "Tawagan" => ["lat" => "13.381037135649294" , "lng" => "121.14476182100721"], "Tawiran" => ["lat" => "13.393967604375495" , "lng" => "121.16779729903342"],
            "Tibag" => ["lat" => "13.410632118328717" , "lng" => "121.17393716271954"], "Wawa" => ["lat" => "13.398626242375562," , "lng" => "121.1519895104849"],
        ];

        $coordinates = $barangayCoordinates[$barangay];
        $lat = $coordinates['lat'];
        $lng = $coordinates['lng'];

        // Handle the checkboxes and set default values if not checked
        $vaccination = isset($_POST['vaccination']) ? $_POST['vaccination'] : 'no';
        $sss = isset($_POST['sss']) ? $_POST['sss'] : 'no';
        $pagibig = isset($_POST['pagibig']) ? $_POST['pagibig'] : 'no';
        $philhealth = isset($_POST['philhealth']) ? $_POST['philhealth'] : 'no';
        $tin = isset($_POST['tin']) ? $_POST['tin'] : 'no';

        $otherrequirement = isset($_POST['otherrequirement']) ? $_POST['otherrequirement'] : 'no';
        $otherrequirements = isset($_POST['otherrequirements']) ? $_POST['otherrequirements'] : '';
        // Now you can use these variables in your further logic or database operations

    
        $employerId = session()->get('employerLoggedIn');
        $employerData = $this->elmodel->find($employerId);
    
        $data = [
            'jobTitle' => $jobTitle,
            // 'workLocation' => $workLocation,
            'educBackground' => $educBackground,
            'barangay' => $barangay,
            'city' => $city,
            'province' => $province,

            'jobOption' => $jobOption,
            'salary' => $salary,
            'jobDescription' => $jobDescription,
            'jobQualification' => $jobQualification,
            'remarks' => $remarks,
            'employerId' => $employerData['id'],

            'vaccination' => $vaccination,
            'sss' => $sss,
            'pagibig' => $pagibig,
            'philhealth' => $philhealth,
            'tin' => $tin,
            'otherrequirement' => $otherrequirement,
            'otherrequirements' => $otherrequirements,

            'lat' => $lat,
            'lng' => $lng,
        ];

        $result = $this->ejpmodel->insert($data);

        if($result){
            return redirect()->to('employerjobs')->with('success','Job added successfully');
        }else{
            return redirect()->to('employerjobs')->with('error','Error while adding job');
        }
    }

        public function deleteJobPost($id)
    {
        $result = $this->ejpmodel->set('job_status', 'hidden')->where('id', $id)->update();

        if ($result) {
            return redirect()->to('/employerjobs')->with('success', 'Deleted Successfully');
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to delete job post']);
        }
    }

    public function getJobPost($id)
    {
        $jobPost = $this->ejpmodel->find($id); // Assuming 'ejpmodel' is your model for job posts
        return $this->response->setJSON($jobPost);
    }

    public function updateJobPost()
    {
        $postId = $this->request->getPost('postId');

        $jobPost = $this->ejpmodel->find($postId);

        if(!$jobPost){
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Job post not found']);
        }

        $jobTitle = $this->request->getPost('jobTitle');
        $workLocation = $this->request->getPost('workLocation');
        $educBackground = $this->request->getPost('educBackground');
        $jobOption = $this->request->getPost('jobOption');
        $salary = $this->request->getPost('salary');
        $jobDescription = $this->request->getPost('jobDescription');
        $jobQualification = $this->request->getPost('jobQualification');
        $remarks = $this->request->getPost('remarks');
    
        $data = [
            'jobTitle' => $jobTitle,
            'workLocation' => $workLocation,
            'educBackground' => $educBackground,
            'jobOption' => $jobOption,
            'salary' => $salary,
            'jobDescription' => $jobDescription,
            'jobQualification' => $jobQualification,
            'remarks' => $remarks,
        ];

        $result = $this->ejpmodel->update($jobPost['id'], $data);

        if($result){
            return redirect()->to('employerjobs')->with('success', 'Updated Successfully');
        }else{
            echo 'error';
        }
    }

    public function hireApplicant()
    {
        $applicantId = $this->request->getPost('applicantId');
        $employerId = $this->request->getPost('employerId');
        $message = $this->request->getPost('message');
        $plainId = $this->request->getPost('plainId');

        $employerEmail = $this->elmodel->where('id', $employerId)->first();
        $jobseekerEmail = $this->jsmodel->where('id', $applicantId)->first();
        $status = $this->jsamodel->where('id', $plainId)->first();

        $updatedData = [
            'status' => 'Hired'
        ];
       
        $emailInstance = \Config\Services::email();

        $emailInstance->setFrom($employerEmail['emailAddress']);
        $emailInstance->setTo($jobseekerEmail['emailAddress']);
        $emailInstance->setMessage($message);


        // $request = new HTTP_Request2();
        // $request->setUrl('https://vvgljp.api.infobip.com/sms/2/text/advanced');
        // $request->setMethod(HTTP_Request2::METHOD_POST);
        // $request->setConfig(array(
        //     'follow_redirects' => TRUE
        // ));
        // $request->setHeader(array(
        //     'Authorization' => 'App cbd294822614c0241f87aa6f04d898d4-8ac57a5e-e46f-4eea-98b9-0adefe23c8fb',
        //     'Content-Type' => 'application/json',
        //     'Accept' => 'application/json'
        // ));
        // $request->setBody(json_encode(array(
        //     "messages" => array(
        //         array(
        //             "destinations" => array(array("to" => "639812517605")),
        //             "from" => "ServiceSMS",
        //             "text" => $messageText
        //         )
        //     )
        // )));

        
        if($emailInstance->send()){
            $success = $this->jsamodel->update($plainId, $updatedData);
            
            if($success){
                return redirect()->to('employerapplicants')->with('success','Successfully hired applicant');
            }else{
                return redirect()->to('employerapplicants')->with('error','Error');
            }
        }else{
            return redirect()->to('employerapplicants')->with('error','Error!');
        }
    }
}