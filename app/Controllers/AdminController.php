<?php

namespace App\Controllers;

use App\Models\JobFairModel;
use App\Models\ActivitiesModel;
use App\Models\FaqsModel;
use App\Models\AdminLoginModel;
use Dompdf\Dompdf;

class AdminController extends BaseController
{
    protected $jobfair;
    protected $activities;
    protected $faqs;
    protected $adminlog;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->jobfair = new \App\Models\JobFairModel();
        $this->activities = new \App\Models\ActivitiesModel();
        $this->faqs = new \App\Models\FaqsModel();
        $this->adminlog = new \App\Models\AdminLoginModel();
        $this->ecmodel = new \App\Models\EmployerCompanyModel();
        $this->pimodel = new \App\Models\PersonalInformationModel();
        $this->jpmodel = new \App\Models\JobPreferenceModel();
        $this->languagemodel = new \App\Models\LanguageModel();
        $this->ebmodel = new \App\Models\EducationalBackgroundModel();
        $this->tmodel = new \App\Models\TrainingModel();
        $this->elmodel = new \App\Models\EligibilityModel();
        $this->wemodel = new \App\Models\WorkExperienceModel();
        $this->osmodel = new \App\Models\OthersSkillsModel();
    }

    public function blockedEmployer()
    {
        $employerId = $this->request->getPost('employerId');
        $emp = $this->ecmodel->where('id', $employerId)->first();
        if (!$emp) {
            return redirect()->to('adminemployer')->with('error', 'Employer not found.');
        }else{
            $updateData = [
                'profileStatus' => 'Blocked'
            ];
            $result = $this->ecmodel->update($emp['id'], $updateData);
            if($result){
                return redirect()->to('adminemployer')->with('success', 'Blocked successfully.');
            }
            else{
                return redirect()->to('adminemployer')->with('error', 'Error while blocking employer.');
            }
        }
    }

    public function searchJobseekers()
    {
        // Get the civil status and tertiary course from the form
        $civilStatus = $this->request->getPost('civilStatus');
        $tertiaryCourse = $this->request->getPost('tertiaryCourse');
    
        // Query the database to find job seekers with the specified civil status
        $query = $this->db->table('jobseekerperinfo')
            ->select('jobseekerperinfo.*, jobseekerjobpre.*, jobseekereducback.*, jobseekereligibility.*, jobseekerlanguage.*, jobseekerskills.*, jobseekertraining.*, jobseekerworkexp.*')
            ->join('jobseekerjobpre', 'jobseekerperinfo.jobseekerId = jobseekerjobpre.jobseekerId')
            ->join('jobseekereducback', 'jobseekerperinfo.jobseekerId = jobseekereducback.jobseekerId')
            ->join('jobseekereligibility', 'jobseekerperinfo.jobseekerId = jobseekereligibility.jobseekerId')
            ->join('jobseekerlanguage', 'jobseekerperinfo.jobseekerId = jobseekerlanguage.jobseekerId')
            ->join('jobseekerskills', 'jobseekerperinfo.jobseekerId = jobseekerskills.jobseekerId')
            ->join('jobseekertraining', 'jobseekerperinfo.jobseekerId = jobseekertraining.jobseekerId')
            ->join('jobseekerworkexp', 'jobseekerperinfo.jobseekerId = jobseekerworkexp.jobseekerId')
            ->where('jobseekerperinfo.CivilStatus', $civilStatus);
    
        // Conditionally add the where clause for tertiary course if it's not empty
        if (!empty($tertiaryCourse)) {
            $query->where('jobseekereducback.TertiaryCourse', $tertiaryCourse);
        }
    
        // Execute the query and get the result
        $jobseekers = $query->get()->getResultArray();
    
        // Check if any job seekers were found
        if (!empty($jobseekers)) {
            // Pass the job seeker data to the view
            return view('admin/pages/jobseekers', ['jobseekerData' => $jobseekers]);
        } else {
            // No job seekers found, handle accordingly (e.g., display a message)
            return view('admin/pages/no_results'); // Create this view file with appropriate message
        }
    }

    public function adminhome()
    {
        return view('admin/pages/home');
    }

    public function employer()
    {
        $employers = $this->ecmodel->where('profileStatus !=', 'Nothing')->findAll();
        $sumAll = $this->ecmodel->where('profileStatus !=', 'Nothing')->get()->getNumRows();
        $sumApproved = $this->ecmodel->where('profileStatus', 'Approved')->get()->getNumRows();
        $sumPending = $this->ecmodel->where('profileStatus', 'Pending')->get()->getNumRows();
        $sumDeclined = $this->ecmodel->where('profileStatus', 'Declined')->get()->getNumRows();
        $sumBlocked = $this->ecmodel->where('profileStatus', 'Blocked')->get()->getNumRows();

        $data = [
            'employers' => $employers,
            'sumAll' => $sumAll,
            'sumApproved' => $sumApproved,
            'sumPending' => $sumPending,
            'sumDeclined' => $sumDeclined,
            'sumBlocked' => $sumBlocked,
        ];
        return view('admin/pages/employers', $data);
    }

    public function jobseeker()
    {
        $combined = [
            'jobseekerData' => $this->db->table('jobseekerperinfo')
            ->select('jobseekerperinfo.*, jobseekerjobpre.*, jobseekereducback.*, jobseekereligibility.*, jobseekerlanguage.*, jobseekerskills.*, jobseekertraining.*, jobseekerworkexp.*')
            ->join('jobseekerjobpre', 'jobseekerperinfo.jobseekerId = jobseekerjobpre.jobseekerId')
            ->join('jobseekereducback', 'jobseekerperinfo.jobseekerId = jobseekereducback.jobseekerId')
            ->join('jobseekereligibility', 'jobseekerperinfo.jobseekerId = jobseekereligibility.jobseekerId')
            ->join('jobseekerlanguage', 'jobseekerperinfo.jobseekerId = jobseekerlanguage.jobseekerId')
            ->join('jobseekerskills', 'jobseekerperinfo.jobseekerId = jobseekerskills.jobseekerId')
            ->join('jobseekertraining', 'jobseekerperinfo.jobseekerId = jobseekertraining.jobseekerId')
            ->join('jobseekerworkexp', 'jobseekerperinfo.jobseekerId = jobseekerworkexp.jobseekerId')
            ->get()
            ->getResultArray()
        ];
        return view('admin/pages/jobseekers', $combined);
    }

    public function activities()
    {
        $data = [
            'activities' => $this->activities->findAll(),
        ];
        return view('admin/pages/activities', $data);
    }

    public function reviews()
    {
        return view('admin/pages/reviews');
    }

    public function jobfairs()
    {
        $data = [
            'jobfair' => $this->jobfair->findAll(),
        ];
        return view('admin/pages/jobfairs', $data);
    }

    public function faqs()
    {
        $data = [
            'faqsseek' => $this->faqs->where('type', 'jobseeker')->findAll(),
            'faqsemp' => $this->faqs->where('type', 'employer')->findAll(),
        ];
        return view('admin/pages/faqs', $data);
    }

    public function manageteam()
    {
        return view('admin/pages/manageteam');
    }

    public function adminlogin()
    {
        return view('admin/pages/login');
    }

    public function logoutAdmin()
    {
        session()->destroy();
        return redirect()->to('adminlogin');

    }

    public function adminLoginProcess()
    {
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    // $result = $this->adminlog->find($username);
    $result = $this->adminlog->where('username', $username)->first();

    if ($result !== null) {
        // Check if the 'password' key exists in the result array
        if (array_key_exists('password', $result) && $password === $result['password']) {
            session()->set('adminLoggedIn', $result['id']);
            return redirect()->to('adminhome');
        } else {
            $this->session->setFlashdata('error', 'Incorrect password. Please try again');
            return redirect()->to('adminlogin');
        }
    } else {
        $this->session->setFlashdata('error', 'Invalid username. Please try again.');
        return redirect()->to('adminlogin');
    }

    
    }
    

    public function jobfairpost()
    {
        $schedule = $this->request->getPost('schedule');
        $site = $this->request->getPost('site');
        $description = $this->request->getPost('description');

        $data = [
            'schedule'=>$schedule,
            'site'=>$site,
            'description'=>$description,
        ];

        $result = $this->jobfair->insert($data);
        if($result){
            return redirect()->to('adminjobfairs')->with('success', 'Added Successfully.');
        } else {
            return redirect()->to('adminjobfairs')->with('errors', 'An error occured.');
        }
    }

    public function faqsseeker()
    {
        $question = $this->request->getPost('question');
        $answer = $this->request->getPost('answer');

        $data = [
            'question'=>$question,
            'answer'=>$answer,
            'type'=> 'jobseeker',
        ];

        $result = $this->faqs->insert($data);
        if($result){
            return redirect()->to('adminfaqs')->with('success', 'Added Successfully.');
        } else {
            return redirect()->to('adminfaqs')->with('errors', 'An error occured.');
        }
    }

    public function faqsemployer()
    {
        $question = $this->request->getPost('question');
        $answer = $this->request->getPost('answer');

        $data = [
            'question'=>$question,
            'answer'=>$answer,
            'type'=> 'employer',
        ];

        $result = $this->faqs->insert($data);
        if($result){
            return redirect()->to('adminfaqs')->with('success', 'Added Successfully.');
        } else {
            return redirect()->to('adminfaqs')->with('errors', 'An error occured.');
        }
    }

    public function activitiespost()
    {
        $date = $this->request->getPost('date');
        $activity = $this->request->getPost('activity');
        $description = $this->request->getPost('description');
        $activityImage = $this->request->getFile('activityimage');

        if ($activityImage !== null && $activityImage->isValid()) {
            $activityImageName = $activityImage->getRandomName();
            if ($activityImage->move('./uploads/activities/', $activityImageName)) {
                $data = [
                    'date' => $date,
                    'activity' => $activity,
                    'description' => $description,
                    'activityImage' => $activityImageName,
                ];

                $result = $this->activities->insert($data);
                if ($result) {
                    $this->session->setFlashdata('success', 'Added Successfully.');
                    return redirect()->to('adminactivities');
                } else {
                    $this->session->setFlashdata('error', 'An error occurred while inserting data.');
                    return redirect()->to('adminactivities');
                }
            } else {
                $this->session->setFlashdata('error', 'Failed to move uploaded file.');
                return redirect()->to('adminactivities');
            }
        } else {
            $this->session->setFlashdata('error', 'No file uploaded or invalid file uploaded.');
            return redirect()->to('adminactivities');
        }
    }

    public function viewEmployer($id = null)
    {
        $data = [
            'emps' => $this->ecmodel->where('id', $id)->first(),
        ];
        return view('admin/pages/registeredemployer', $data);
    }

    public function getEmployer()
    {
        $employerId = $this->request->getPost('employerId');
        $employer = $this->ecmodel->find($employerId);
        return view('admin/pages/employerdata', ['employer' => $employer]);
    }
    
    public function approveEmployer()
    {
        $employerId = $this->request->getPost('employerId');
        $emp = $this->ecmodel->where('id', $employerId)->first();
        if (!$emp) {
            return redirect()->to('adminemployer')->with('error', 'Employer not found.');
        }else{
            $updateData = [
                'profileStatus' => 'Approved'
            ];
            $result = $this->ecmodel->update($emp['id'], $updateData);
            if($result){
                return redirect()->to('adminemployer')->with('success', 'Approved successfully.');
            }
            else{
                return redirect()->to('adminemployer')->with('error', 'Error while approving.');
            }
        }
    }

    public function declineEmployer()
    {
        $employerId = $this->request->getPost('employerId');
        $emp = $this->ecmodel->where('id', $employerId)->first();
        if (!$emp) {
            return redirect()->to('adminemployer')->with('error', 'Employer not found.');
        }else{
            $updateData = [
                'profileStatus' => 'Declined'
            ];
            $result = $this->ecmodel->update($emp['id'], $updateData);
            if($result){
                return redirect()->to('adminemployer')->with('success', 'Declined successfully.');
            }
            else{
                return redirect()->to('adminemployer')->with('error', 'Error occured.');
            }
        }
    }

    public function blockEmployer()
    {
        $employerId = $this->request->getPost('employerId');
        $emp = $this->ecmodel->where('id', $employerId)->first();
        if (!$emp) {
            return redirect()->to('adminemployer')->with('error', 'Employer not found.');
        }else{
            $updateData = [
                'profileStatus' => 'Blocked'
            ];
            $result = $this->ecmodel->update($emp['id'], $updateData);
            if($result){
                return redirect()->to('adminemployer')->with('success', 'Blocked successfully.');
            }
            else{
                return redirect()->to('adminemployer')->with('error', 'Error occured.');
            }
        }
    }

    public function viewdetailsjobseekers()
    {
        $jobseekerId = $this->request->getVar('jobseekerId');

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
            return view('admin/pages/jpersonaldata', $combinedData);
        }else{
            echo 'error';
        }
    }

    public function jperosnaldata()
    {
        
    }
    public function generatePdfAd() {
        // Load the Dompdf library
        require_once APPPATH . '../vendor/autoload.php';
    
        // Use the Dompdf namespace
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
    
        // Get the jobseeker info
        $jobseekerId = $this->request->getPost('id');
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
