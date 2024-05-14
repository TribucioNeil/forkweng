<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
//==============================================================================================================ADMIN LOG IN
$routes->get('adminlogin', 'AdminController::adminlogin');
$routes->get('logoutAdmin', 'AdminController::logoutAdmin');
$routes->post('adminLoginProcess', 'AdminController::adminLoginProcess');

//=======================================================THIS IS ADMIN SIDE
$routes->group('', ['filter' => 'adminFilter'], function ($routes) {
$routes->get('adminhome', 'AdminController::adminhome');
$routes->get('adminemployer', 'AdminController::employer');
$routes->get('adminjobseeker', 'AdminController::jobseeker');
$routes->get('adminactivities', 'AdminController::activities');
$routes->get('adminjobfairs', 'AdminController::jobfairs');
$routes->get('adminfaqs', 'AdminController::faqs');
$routes->get('adminreviews', 'AdminController::reviews');
$routes->get('adminmanageteam', 'AdminController::manageteam');
$routes->post('jobfairpost', 'AdminController::jobfairpost');
$routes->post('activitiespost', 'AdminController::activitiespost');
$routes->post('faqsseeker', 'AdminController::faqsseeker');
$routes->post('faqsemployer', 'AdminController::faqsemployer');

$routes->get('viewEmployer/(:num)', 'AdminController::viewEmployer/$1');
$routes->post('getEmployer', 'AdminController::getEmployer');
$routes->post('approveEmployer', 'AdminController::approveEmployer');
$routes->post('blockedEmployer', 'AdminController::blockedEmployer');
$routes->get('getEmployerData', 'AdminController::getEmployerData');
$routes->post('declineEmployer', 'AdminController::declineEmployer');
$routes->post('blockEmployer', 'AdminController::blockEmployer');

$routes->post('viewdetailsjobseekers', 'AdminController::viewdetailsjobseekers');

$routes->post('searchJobseekers', 'AdminController::searchJobseekers');

$routes->post('generatePdfAd', 'AdminController::generatePdfAd');
});
//==============================================================================================================THIS IS EMPLOYER SIDE
$routes->group('', ['filter' => 'employerFilter'], function ($routes) {
$routes->get('employerhome', 'EmployerController::employerhome');
$routes->get('employerprofile', 'EmployerController::employerprofile');
$routes->get('newemployerprofile', 'EmployerController::newemployerprofile');
$routes->get('employerjobs', 'EmployerController::employerjobs');
$routes->get('employerapplicants', 'EmployerController::employerapplicants');
$routes->post('viewemployerapplicants', 'EmployerController::viewemployerapplicants');
$routes->get('logoutEmployer', 'EmployerController::logoutEmployer');
$routes->post('companyProfileProcess', 'EmployerController::companyProfileProcess');
$routes->post('getJobseeker', 'EmployerController::getJobseeker');
$routes->post('showError', 'EmployerController::showError');
$routes->post('showErrorBlock', 'EmployerController::showErrorBlock');
$routes->post('showErrorBlocks', 'EmployerController::showErrorBlocks');
});
//==============EMPLOYER LOG IN AND SIGN UP
$routes->get('employerlogin', 'EmployerController::employerlogin');
$routes->get('employersignup', 'EmployerController::employersignup');
$routes->post('employerSignupProcess', 'EmployerController::employerSignupProcess');
$routes->post('employerLoginProcess', 'EmployerController::employerLoginProcess');
//==============EMPLOYER EMAIL VERIFICATION AND FORGOT PASSWORD
$routes->get('activateEmployer/(:any)', 'EmployerController::activateEmployer/$1');
$routes->get('employerVerifyEmail', 'EmployerController::employerVerifyEmail');
$routes->post('employerResend', 'EmployerController::employerResend');

$routes->get('employerForgot', 'EmployerController::employerForgot');
$routes->post('employerForgotProcess', 'EmployerController::employerForgotProcess');
$routes->post('employerForgotFormProcess', 'EmployerController::employerForgotFormProcess');
$routes->get('forgotEmployerLink/(:any)', 'EmployerController::forgotEmployerLink/$1');
$routes->get('employerForgotForm', 'EmployerController::employerForgotForm', ['filter' => 'employerForgotFilter']);
//==============EMPLOYER JOB POST
$routes->post('jobPostProcess', 'EmployerController::jobPostProcess');
$routes->get('deleteJobPost/(:num)', 'EmployerController::deleteJobPost/$1');
$routes->get('updateJobPost/(:num)', 'EmployerController::showUpdateForm/$1');
$routes->get('getJobPost/(:num)', 'EmployerController::getJobPost/$1');
$routes->post('updateJobPost', 'EmployerController::updateJobPost');
//==============HIRE APPLICANT
$routes->post('hireApplicant', 'EmployerController::hireApplicant');

$routes->post('viewdetailsjobseekersemp', 'EmployerController::viewdetailsjobseekersemp');

$routes->post('barangaymap', 'EmployerController::barangaymap');
//=======================================================THIS IS DEFAULT
$routes->get('/', 'JobseekerController::jobseekerhome');
$routes->get('jobcategories', 'JobseekerController::jobcategories');
$routes->get('joblists', 'JobseekerController::joblists');
$routes->get('jobfairs', 'JobseekerController::jobfairs');
$routes->get('activities', 'JobseekerController::activities');
$routes->get('faqs', 'JobseekerController::faqs');
$routes->get('aboutus', 'JobseekerController::aboutus');
$routes->get('contactus', 'JobseekerController::contactus');
$routes->get('ourteam', 'JobseekerController::ourteam');


//================================================================THIS IS JOBSEEKER SIDE

$routes->get('captcha', 'JobseekerController::captcha');
$routes->get('generate_captcha_image', 'JobseekerController::generateCaptchaImage');


//=======JOBSEEKER LOG IN AND SIGN UP
$routes->get('jlogin', 'JobseekerController::jlogin');
$routes->get('jsignup', 'JobseekerController::jsignup');
$routes->match(['get', 'post'],'jsignupprocess', 'JobseekerController::jsignupprocess');
$routes->get('activatenow/(:any)', 'JobseekerController::activatenow/$1');
$routes->get('jverifyemail', 'JobseekerController::jverifyemail');
$routes->get('jlogout', 'JobseekerController::jlogout');
$routes->post('jresendemail', 'JobseekerController::jresendemail');
$routes->match(['get', 'post'],'jloginprocess', 'JobseekerController::jloginprocess');

$routes->get('jforgotpasswordform', 'JobseekerController::jforgotpasswordform', ['filter' => 'jobseekerForgotFilter']);
$routes->get('jobseekerforgot', 'JobseekerController::jobseekerforgot');
$routes->post('jobseekerforgotprocess', 'JobseekerController::jobseekerforgotprocess');
$routes->get('forgotJobseekerLink/(:any)', 'JobseekerController::forgotJobseekerLink/$1');
$routes->post('jobseekerforgotformprocess', 'JobseekerController::jobseekerforgotformprocess');

$routes->post('showErrors', 'JobseekerController::showErrors');

//======PERSONAL DATA
$routes->get('registrationform', 'JobseekerController::registrationform');
$routes->post('personalInformation', 'JobseekerController::personalInformation');
$routes->post('jobPreference', 'JobseekerController::jobPreference');
$routes->post('jobseekerLanguage', 'JobseekerController::jobseekerLanguage');
$routes->post('jobseekerEducBackground', 'JobseekerController::jobseekerEducBackground');
$routes->post('vocationalAndTraining', 'JobseekerController::vocationalAndTraining');
$routes->post('eligibilityLicense', 'JobseekerController::eligibilityLicense');
$routes->post('workExperience', 'JobseekerController::workExperience');
$routes->post('otherSkills', 'JobseekerController::otherSkills');

$routes->post('uploadresume', 'JobseekerController::uploadresume');

$routes->post('jobinfo', 'JobseekerController::jobinfo');
//
$routes->group('', ['filter' => 'jobseekerFilter'], function ($routes) {
$routes->get('mydashboard', 'JobseekerController::mydashboard');
$routes->get('myprofile', 'JobseekerController::myprofile');
$routes->get('myappliedjobs', 'JobseekerController::myappliedjobs');
$routes->get('myresume', 'JobseekerController::myresume');
// $routes->get('mypersonalinfo', 'JobseekerController::mypersonalinfo');
$routes->get('myjobalerts', 'JobseekerController::myjobalerts');

//APPLY JOB
$routes->post('applyNowProcess', 'JobseekerController::applyNowProcess');
$routes->get('applyNow', 'JobseekerController::applyNow');
$routes->get('cancelApply/(:num)', 'JobseekerController::cancelApply/$1');

//GENERATE PDF
$routes->post('generatePdf', 'JobseekerController::generatePdf');
});
$routes->post('jobDetails', 'JobseekerController::jobDetails');
$routes->get('chatbot', 'JobseekerController::chatbot');
$routes->post('get_response', 'JobseekerController::get_response');
// $routes->get('get_response', 'JobseekerController/get_response');