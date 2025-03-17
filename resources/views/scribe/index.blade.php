<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>HR System Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
                    body .content .python-example code { display: none; }
            </style>


    <script src="{{ asset("/vendor/scribe/js/theme-default-4.35.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;,&quot;python&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                                            <button type="button" class="lang-button" data-language-name="python">python</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-employee" class="tocify-header">
                <li class="tocify-item level-1" data-unique="employee">
                    <a href="#employee">Employee</a>
                </li>
                                    <ul id="tocify-subheader-employee" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="employee-auth">
                                <a href="#employee-auth">Auth</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-auth" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-POSTapi-v1-dashboard-hr-login">
                                            <a href="#employee-POSTapi-v1-dashboard-hr-login">Login</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-POSTapi-v1-dashboard-hr-forgot-password">
                                            <a href="#employee-POSTapi-v1-dashboard-hr-forgot-password">Forgot Password</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-POSTapi-v1-dashboard-hr-reset-password">
                                            <a href="#employee-POSTapi-v1-dashboard-hr-reset-password">Reset Password</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-PATCHapi-v1-dashboard-hr-employee-password">
                                            <a href="#employee-PATCHapi-v1-dashboard-hr-employee-password">Change Password</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-attendances">
                                <a href="#employee-attendances">Attendances</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-attendances" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out">
                                            <a href="#employee-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out">Cams Biometrics Clock In/Out</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-attendances">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-attendances">Get Attendances</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out">Clock In/Out</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-attendances-statistics">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-attendances-statistics">Get Statistics</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-GETapi-v1-dashboard-hr-employee">
                                <a href="#employee-GETapi-v1-dashboard-hr-employee">Get Basic Information</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="employee-POSTapi-v1-dashboard-hr-employee-fcm-token">
                                <a href="#employee-POSTapi-v1-dashboard-hr-employee-fcm-token">Store FCM Token</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="employee-GETapi-v1-dashboard-hr-employee-personal-information">
                                <a href="#employee-GETapi-v1-dashboard-hr-employee-personal-information">Get Personal Information</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="employee-PUTapi-v1-dashboard-hr-employee-personal-information-update">
                                <a href="#employee-PUTapi-v1-dashboard-hr-employee-personal-information-update">Edit Personal Information</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="employee-GETapi-v1-dashboard-hr-employee-job-information">
                                <a href="#employee-GETapi-v1-dashboard-hr-employee-job-information">Get Job Information</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="employee-employee-relations">
                                <a href="#employee-employee-relations">Employee Relations</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-employee-relations" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations">Get Employee Relations</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store">
                                            <a href="#employee-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store">Create Employee Relation</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-">
                                            <a href="#employee-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-">Update Employee Relation</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-emergency-contacts">
                                <a href="#employee-emergency-contacts">Emergency Contacts</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-emergency-contacts" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-emergency-contacts">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-emergency-contacts">Get Emergency Contacts</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-">
                                            <a href="#employee-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-">Update Emergency Contact</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-">
                                            <a href="#employee-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-">Delete Emergency Contact</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-documents">
                                <a href="#employee-documents">Documents</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-documents" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-documents">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-documents">Get Documents</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-documents--id--attachment">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-documents--id--attachment">Get Document Attachment</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-vacations">
                                <a href="#employee-vacations">Vacations</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-vacations" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-vacations">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-vacations">Get Vacations</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-vacations--id--attachment">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-vacations--id--attachment">Get Vacation Attachment</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-vacations-balances">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-vacations-balances">Get Vacations Balances</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-vacations-types">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-vacations-types">Get Vacation Types</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-leaves">
                                <a href="#employee-leaves">Leaves</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-leaves" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-leaves">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-leaves">Get Leaves</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-allowances">
                                <a href="#employee-allowances">Allowances</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-allowances" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-allowances">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-allowances">Get Allowances</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-deductions">
                                <a href="#employee-deductions">Deductions</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-deductions" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-deductions">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-deductions">Get Deductions</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-salary-advances">
                                <a href="#employee-salary-advances">Salary Advances</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-salary-advances" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-salary-advances">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-salary-advances">Get Salary Advances</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments">Get Salary Advance Repayments</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-administrative-correspondences">
                                <a href="#employee-administrative-correspondences">Administrative Correspondences</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-administrative-correspondences" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-administrative-correspondences">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-administrative-correspondences">Get Administrative Correspondences</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment">Get administrative correspondence Attachment</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-tasks">
                                <a href="#employee-tasks">Tasks</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-tasks" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-tasks">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-tasks">Get Tasks</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-tasks-task-statuses">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-tasks-task-statuses">Get Task Statuses</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status">
                                            <a href="#employee-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status">Edit Task Status</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-calendar">
                                <a href="#employee-calendar">Calendar</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-calendar" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-calendar-events">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-calendar-events">Get Events</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-calendar-holidays">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-calendar-holidays">Get Holidays</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-calendar-tasks">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-calendar-tasks">Get Tasks</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-calendar-leaves">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-calendar-leaves">Get Leaves</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-calendar-vacations">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-calendar-vacations">Get Vacations</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-requests">
                                <a href="#employee-requests">Requests</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-requests" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests">Get Requests</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type">Get Stats By Request Type</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status">Get Stats By Request Status</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status">Get Stats Of Requests</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests-last">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests-last">Get Last Request</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests-request-types">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests-request-types">Get Request Types</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types">Get Request Custom Types</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-POSTapi-v1-dashboard-hr-employee-requests-create">
                                            <a href="#employee-POSTapi-v1-dashboard-hr-employee-requests-create">Create Request</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-PATCHapi-v1-dashboard-hr-employee-requests--request--update">
                                            <a href="#employee-PATCHapi-v1-dashboard-hr-employee-requests--request--update">Update Request</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-requests--request--attachment">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-requests--request--attachment">Get Request Attachment</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-salaries">
                                <a href="#employee-salaries">Salaries</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-salaries" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-salaries">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-salaries">Get Salaries</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-salaries--id--payslip">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-salaries--id--payslip">Download Payslip</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-announcements">
                                <a href="#employee-announcements">Announcements</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-announcements" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-announcements">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-announcements">Get Announcements</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-announcements-history">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-announcements-history">Get Announcements History</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-company-policies">
                                <a href="#employee-company-policies">Company Policies</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-company-policies" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-company-policies">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-company-policies">Get Policies</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies">Accept Policies</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted">Check Policies Accepted</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations">Get Internal Regulations</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="employee-company-forms">
                                <a href="#employee-company-forms">Company Forms</a>
                            </li>
                                                            <ul id="tocify-subheader-employee-company-forms" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-company-forms">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-company-forms">Get Forms</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="employee-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment">
                                            <a href="#employee-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment">Get Form Attachment</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-geo-location" class="tocify-header">
                <li class="tocify-item level-1" data-unique="geo-location">
                    <a href="#geo-location">Geo Location</a>
                </li>
                                    <ul id="tocify-subheader-geo-location" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="geo-location-countries">
                                <a href="#geo-location-countries">Countries</a>
                            </li>
                                                            <ul id="tocify-subheader-geo-location-countries" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="geo-location-GETapi-v1-dashboard-geo-location-countries">
                                            <a href="#geo-location-GETapi-v1-dashboard-geo-location-countries">Get Countries</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="geo-location-governorates">
                                <a href="#geo-location-governorates">Governorates</a>
                            </li>
                                                            <ul id="tocify-subheader-geo-location-governorates" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="geo-location-GETapi-v1-dashboard-geo-location-governorates">
                                            <a href="#geo-location-GETapi-v1-dashboard-geo-location-governorates">Get Governorates</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="geo-location-cities">
                                <a href="#geo-location-cities">Cities</a>
                            </li>
                                                            <ul id="tocify-subheader-geo-location-cities" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="geo-location-GETapi-v1-dashboard-geo-location-cities">
                                            <a href="#geo-location-GETapi-v1-dashboard-geo-location-cities">Get Cities</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="geo-location-districts">
                                <a href="#geo-location-districts">Districts</a>
                            </li>
                                                            <ul id="tocify-subheader-geo-location-districts" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="geo-location-GETapi-v1-dashboard-geo-location-districts">
                                            <a href="#geo-location-GETapi-v1-dashboard-geo-location-districts">Get Districts</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: May 11, 2024</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost/</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="employee">Employee</h1>

    <p>APIs for employee</p>

                        <h2 id="employee-auth">Auth</h2>
                                        <p>
                    <p>Employee Authentication</p>
                </p>
                                        <h2 id="employee-POSTapi-v1-dashboard-hr-login">Login</h2>

<p>
</p>

<p>This endpoint allows you to login to system, The login must be through main domain like hrget.com after login you will get the correct domain for the remaining endpoints.</p>

<span id="example-requests-POSTapi-v1-dashboard-hr-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/dashboard/hr/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"username\": \"test@test.com or +970595872837\",
    \"password\": \"123456789\",
    \"device_name\": \"my-device\",
    \"company\": \"demo.hrget.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "test@test.com or +970595872837",
    "password": "123456789",
    "device_name": "my-device",
    "company": "demo.hrget.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/login';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'username' =&gt; 'test@test.com or +970595872837',
            'password' =&gt; '123456789',
            'device_name' =&gt; 'my-device',
            'company' =&gt; 'demo.hrget.com',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/login'
payload = {
    "username": "test@test.com or +970595872837",
    "password": "123456789",
    "device_name": "my-device",
    "company": "demo.hrget.com"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-dashboard-hr-login">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;token&quot;: &quot;2|Y4ly0vdASwBB03OQ7FtkbUbij1FrICiFVCK36lYf124eec5c&quot;,
        &quot;domain&quot;: &quot;demo.hrget.com&quot;,
        &quot;user&quot;: {
            &quot;first_name&quot;: &quot;test&quot;,
            &quot;last_name&quot;: &quot;test&quot;,
            &quot;full_name&quot;: &quot;test test&quot;,
            &quot;email&quot;: &quot;test@gmail.com&quot;,
            &quot;avatar&quot;: &quot;https://hrget.com/media/tenant6c1aa163-a5a0-4d1e-b0c2-574943b9e092/52/conversions/WzXMDnLOQLvldeFqbLTOPY8AxJcHef-metacGVyc29uLnBuZw==-_1706428191-avatar-lg.webp&quot;,
            &quot;phone_number&quot;: &quot;+970569380363&quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The password field is required.&quot;,
    &quot;errors&quot;: {
        &quot;password&quot;: [
            &quot;The password field is required.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Username or Password is invalid):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Username or Password is invalid&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;Username or Password is invalid&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Too many login attempts, you can try to login 5 times in one minute.):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Too many login attempts. Please try again in 44 seconds.&quot;,
    &quot;errors&quot;: {
        &quot;username&quot;: [
            &quot;Too many login attempts. Please try again in 44 seconds.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-dashboard-hr-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-dashboard-hr-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-dashboard-hr-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-dashboard-hr-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-dashboard-hr-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-dashboard-hr-login" data-method="POST"
      data-path="api/v1/dashboard/hr/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-dashboard-hr-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/dashboard/hr/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-dashboard-hr-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-dashboard-hr-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTapi-v1-dashboard-hr-login"
               value="test@test.com or +970595872837"
               data-component="body">
    <br>
<p>Email or Phone. Example: <code>test@test.com or +970595872837</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-dashboard-hr-login"
               value="123456789"
               data-component="body">
    <br>
<p>Example: <code>123456789</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>device_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="device_name"                data-endpoint="POSTapi-v1-dashboard-hr-login"
               value="my-device"
               data-component="body">
    <br>
<p>The name of mobile device Example: <code>my-device</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>company</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="company"                data-endpoint="POSTapi-v1-dashboard-hr-login"
               value="demo.hrget.com"
               data-component="body">
    <br>
<p>The domain name of the company, it may change in the future. Example: <code>demo.hrget.com</code></p>
        </div>
        </form>

                    <h2 id="employee-POSTapi-v1-dashboard-hr-forgot-password">Forgot Password</h2>

<p>
</p>

<p>This endpoint allows you to request password rest email.</p>

<span id="example-requests-POSTapi-v1-dashboard-hr-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/dashboard/hr/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"example@example.com\",
    \"company\": \"demo.hrget.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@example.com",
    "company": "demo.hrget.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/forgot-password';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'example@example.com',
            'company' =&gt; 'demo.hrget.com',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/forgot-password'
payload = {
    "email": "example@example.com",
    "company": "demo.hrget.com"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-dashboard-hr-forgot-password">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;تم إرسال تفاصيل استعادة كلمة المرور الخاصة بك إلى بريدك الإلكتروني!&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل مطلوب.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;الرجاء الانتظار قبل إعادة المحاولة.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-dashboard-hr-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-dashboard-hr-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-dashboard-hr-forgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-dashboard-hr-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-dashboard-hr-forgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-dashboard-hr-forgot-password" data-method="POST"
      data-path="api/v1/dashboard/hr/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-dashboard-hr-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/dashboard/hr/forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-dashboard-hr-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-dashboard-hr-forgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-dashboard-hr-forgot-password"
               value="example@example.com"
               data-component="body">
    <br>
<p>Example: <code>example@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>company</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="company"                data-endpoint="POSTapi-v1-dashboard-hr-forgot-password"
               value="demo.hrget.com"
               data-component="body">
    <br>
<p>The domain name of the company, it may change in the future. Example: <code>demo.hrget.com</code></p>
        </div>
        </form>

                    <h2 id="employee-POSTapi-v1-dashboard-hr-reset-password">Reset Password</h2>

<p>
</p>

<p>This endpoint allows you to reset your password.</p>

<span id="example-requests-POSTapi-v1-dashboard-hr-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/dashboard/hr/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"example@example.com\",
    \"code\": \"54682154\",
    \"new_password\": \"new_password\",
    \"company\": \"demo.hrget.com\",
    \"new_password_confirmation\": \"new_password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@example.com",
    "code": "54682154",
    "new_password": "new_password",
    "company": "demo.hrget.com",
    "new_password_confirmation": "new_password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/reset-password';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'example@example.com',
            'code' =&gt; '54682154',
            'new_password' =&gt; 'new_password',
            'company' =&gt; 'demo.hrget.com',
            'new_password_confirmation' =&gt; 'new_password',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/reset-password'
payload = {
    "email": "example@example.com",
    "code": "54682154",
    "new_password": "new_password",
    "company": "demo.hrget.com",
    "new_password_confirmation": "new_password"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-dashboard-hr-reset-password">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;تم إرسال تفاصيل استعادة كلمة المرور الخاصة بك إلى بريدك الإلكتروني!&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل مطلوب.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;رمز استعادة كلمة المرور الذي أدخلته غير صحيح.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-dashboard-hr-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-dashboard-hr-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-dashboard-hr-reset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-dashboard-hr-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-dashboard-hr-reset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-dashboard-hr-reset-password" data-method="POST"
      data-path="api/v1/dashboard/hr/reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-dashboard-hr-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/dashboard/hr/reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-dashboard-hr-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-dashboard-hr-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-dashboard-hr-reset-password"
               value="example@example.com"
               data-component="body">
    <br>
<p>Example: <code>example@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-v1-dashboard-hr-reset-password"
               value="54682154"
               data-component="body">
    <br>
<p>Example: <code>54682154</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="POSTapi-v1-dashboard-hr-reset-password"
               value="new_password"
               data-component="body">
    <br>
<p>Example: <code>new_password</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>company</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="company"                data-endpoint="POSTapi-v1-dashboard-hr-reset-password"
               value="demo.hrget.com"
               data-component="body">
    <br>
<p>The domain name of the company, it may change in the future. Example: <code>demo.hrget.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password_confirmation"                data-endpoint="POSTapi-v1-dashboard-hr-reset-password"
               value="new_password"
               data-component="body">
    <br>
<p>Example: <code>new_password</code></p>
        </div>
        </form>

                    <h2 id="employee-PATCHapi-v1-dashboard-hr-employee-password">Change Password</h2>

<p>
</p>

<p>This endpoint allows you to change user password.</p>

<span id="example-requests-PATCHapi-v1-dashboard-hr-employee-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/dashboard/hr/employee/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"current_password\": \"current_password\",
    \"new_password\": \"new_password\",
    \"new_password_confirmation\": \"new_password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "current_password",
    "new_password": "new_password",
    "new_password_confirmation": "new_password"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/password';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'current_password' =&gt; 'current_password',
            'new_password' =&gt; 'new_password',
            'new_password_confirmation' =&gt; 'new_password',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/password'
payload = {
    "current_password": "current_password",
    "new_password": "new_password",
    "new_password_confirmation": "new_password"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PATCH', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-dashboard-hr-employee-password">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;تم تغيير كلمة المرور بنجاح&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل مطلوب. و 1 خطأ اخر&quot;,
    &quot;errors&quot;: {
        &quot;current_password&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;new_password&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-dashboard-hr-employee-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-dashboard-hr-employee-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-dashboard-hr-employee-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-dashboard-hr-employee-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-dashboard-hr-employee-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-dashboard-hr-employee-password" data-method="PATCH"
      data-path="api/v1/dashboard/hr/employee/password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-dashboard-hr-employee-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/dashboard/hr/employee/password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-password"
               value="current_password"
               data-component="body">
    <br>
<p>Example: <code>current_password</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-password"
               value="new_password"
               data-component="body">
    <br>
<p>Example: <code>new_password</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password_confirmation"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-password"
               value="new_password"
               data-component="body">
    <br>
<p>Example: <code>new_password</code></p>
        </div>
        </form>

                                <h2 id="employee-attendances">Attendances</h2>
                                        <p>
                    <p>Employee Attendances</p>
                </p>
                                        <h2 id="employee-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out">Cams Biometrics Clock In/Out</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows employee to clock in/out attendance by Cams Biometrics</p>

<span id="example-requests-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/dashboard/hr/attendances/cams-biometric/clock-in-out?RealTime[PunchLog][UserId]=consectetur&amp;RealTime[PunchLog][LogTime]=2024-05-11T20%3A12%3A46&amp;date=2024-02-01" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/attendances/cams-biometric/clock-in-out"
);

const params = {
    "RealTime[PunchLog][UserId]": "consectetur",
    "RealTime[PunchLog][LogTime]": "2024-05-11T20:12:46",
    "date": "2024-02-01",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/attendances/cams-biometric/clock-in-out';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'RealTime[PunchLog][UserId]' =&gt; 'consectetur',
            'RealTime[PunchLog][LogTime]' =&gt; '2024-05-11T20:12:46',
            'date' =&gt; '2024-02-01',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/attendances/cams-biometric/clock-in-out'
params = {
  'RealTime[PunchLog][UserId]': 'consectetur',
  'RealTime[PunchLog][LogTime]': '2024-05-11T20:12:46',
  'date': '2024-02-01',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;done&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل مطلوب. و 1 خطأ اخر&quot;,
    &quot;errors&quot;: {
        &quot;RealTime.PunchLog.UserId&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;RealTime.PunchLog.LogTime&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;,
    &quot;errors&quot;: {
        &quot;RealTime.PunchLog.UserId&quot;: [
            &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out" data-method="POST"
      data-path="api/v1/dashboard/hr/attendances/cams-biometric/clock-in-out"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/dashboard/hr/attendances/cams-biometric/clock-in-out</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>RealTime.PunchLog</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="RealTime.PunchLog"                data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value=""
               data-component="query">
    <br>

            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>RealTime</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="RealTime"                data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value=""
               data-component="query">
    <br>

            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>RealTime.PunchLog.UserId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="RealTime.PunchLog.UserId"                data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value="consectetur"
               data-component="query">
    <br>
<p>Example: <code>consectetur</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>RealTime.PunchLog.LogTime</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="RealTime.PunchLog.LogTime"                data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value="2024-05-11T20:12:46"
               data-component="query">
    <br>
<p>هذا الحقل ليس تاريخًا صحيحًا. Example: <code>2024-05-11T20:12:46</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="POSTapi-v1-dashboard-hr-attendances-cams-biometric-clock-in-out"
               value="2024-02-01"
               data-component="query">
    <br>
<p>Example: <code>2024-02-01</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-attendances">Get Attendances</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee attendances</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-attendances">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/attendances?date=2024-02-01" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/attendances"
);

const params = {
    "date": "2024-02-01",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/attendances';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'date' =&gt; '2024-02-01',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/attendances'
params = {
  'date': '2024-02-01',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-attendances">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 4,
            &quot;attendance_date&quot;: &quot;2024-02-01&quot;,
            &quot;working_shift&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;صباحي&quot;,
                &quot;start_time&quot;: &quot;09:00:00&quot;,
                &quot;end_time&quot;: &quot;17:00:00&quot;
            },
            &quot;behavior&quot;: &quot;في الوقت&quot;,
            &quot;time_events&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;in_time&quot;: &quot;09:00:00&quot;,
                    &quot;out_time&quot;: &quot;17:00:00&quot;
                }
            ],
            &quot;working_hours&quot;: &quot;08:00&quot;,
            &quot;over_or_shortage_hours&quot;: &quot;00:00&quot;,
            &quot;required_working_hours&quot;: &quot;08:00&quot;,
            &quot;notes&quot;: null
        },
        {
            &quot;id&quot;: 5,
            &quot;attendance_date&quot;: &quot;2024-02-03&quot;,
            &quot;working_shift&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;صباحي&quot;,
                &quot;start_time&quot;: &quot;09:00:00&quot;,
                &quot;end_time&quot;: &quot;17:00:00&quot;
            },
            &quot;behavior&quot;: &quot;في الوقت&quot;,
            &quot;time_events&quot;: [
                {
                    &quot;id&quot;: 8,
                    &quot;in_time&quot;: &quot;09:00:00&quot;,
                    &quot;out_time&quot;: &quot;17:05:00&quot;
                }
            ],
            &quot;working_hours&quot;: &quot;08:04&quot;,
            &quot;over_or_shortage_hours&quot;: &quot;00:04&quot;,
            &quot;required_working_hours&quot;: &quot;08:00&quot;,
            &quot;notes&quot;: null
        },
        {
            &quot;id&quot;: 6,
            &quot;attendance_date&quot;: &quot;2024-02-04&quot;,
            &quot;working_shift&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;صباحي&quot;,
                &quot;start_time&quot;: &quot;09:00:00&quot;,
                &quot;end_time&quot;: &quot;17:00:00&quot;
            },
            &quot;behavior&quot;: &quot;مبكر&quot;,
            &quot;time_events&quot;: [
                {
                    &quot;id&quot;: 13,
                    &quot;in_time&quot;: &quot;08:00:00&quot;,
                    &quot;out_time&quot;: &quot;16:00:00&quot;
                },
                {
                    &quot;id&quot;: 14,
                    &quot;in_time&quot;: &quot;17:00:00&quot;,
                    &quot;out_time&quot;: null
                }
            ],
            &quot;working_hours&quot;: &quot;00:00&quot;,
            &quot;over_or_shortage_hours&quot;: &quot;00:00&quot;,
            &quot;required_working_hours&quot;: &quot;08:00&quot;,
            &quot;notes&quot;: null
        },
        {
            &quot;id&quot;: 7,
            &quot;attendance_date&quot;: &quot;2024-02-06&quot;,
            &quot;working_shift&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;صباحي&quot;,
                &quot;start_time&quot;: &quot;09:00:00&quot;,
                &quot;end_time&quot;: &quot;17:00:00&quot;
            },
            &quot;behavior&quot;: &quot;مبكر&quot;,
            &quot;time_events&quot;: [
                {
                    &quot;id&quot;: 10,
                    &quot;in_time&quot;: &quot;08:30:00&quot;,
                    &quot;out_time&quot;: &quot;16:30:00&quot;
                }
            ],
            &quot;working_hours&quot;: &quot;08:00&quot;,
            &quot;over_or_shortage_hours&quot;: &quot;00:00&quot;,
            &quot;required_working_hours&quot;: &quot;08:00&quot;,
            &quot;notes&quot;: null
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-attendances" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-attendances"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-attendances"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-attendances" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-attendances">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-attendances" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/attendances"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-attendances', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/attendances</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-attendances"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances"
               value="2024-02-01"
               data-component="query">
    <br>
<p>Example: <code>2024-02-01</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out">Clock In/Out</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows employee to clock in/out attendance</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/attendances/clock-in-out" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/attendances/clock-in-out"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/attendances/clock-in-out';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/attendances/clock-in-out'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 77,
        &quot;attendance_date&quot;: &quot;2024-02-26&quot;,
        &quot;behavior&quot;: &quot;في الوقت&quot;,
        &quot;time_events&quot;: [
            {
                &quot;id&quot;: 112,
                &quot;in_time&quot;: &quot;09:00:00&quot;,
                &quot;out_time&quot;: &quot;17:00:00&quot;
            }
        ],
        &quot;working_hours&quot;: &quot;08:00&quot;,
        &quot;over_or_shortage_hours&quot;: &quot;00:00&quot;,
        &quot;required_working_hours&quot;: &quot;08:00&quot;,
        &quot;notes&quot;: null
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 77,
        &quot;attendance_date&quot;: &quot;2024-02-26&quot;,
        &quot;behavior&quot;: &quot;في الوقت&quot;,
        &quot;time_events&quot;: [
            {
                &quot;id&quot;: 112,
                &quot;in_time&quot;: &quot;09:00:00&quot;,
                &quot;out_time&quot;: null
            }
        ],
        &quot;working_hours&quot;: &quot;00:00&quot;,
        &quot;over_or_shortage_hours&quot;: &quot;00:00&quot;,
        &quot;required_working_hours&quot;: &quot;08:00&quot;,
        &quot;notes&quot;: null
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-attendances-clock-in-out" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/attendances/clock-in-out"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-attendances-clock-in-out', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/attendances/clock-in-out</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-attendances-clock-in-out"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances-clock-in-out"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances-clock-in-out"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-attendances-statistics">Get Statistics</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee attendances statistics</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-attendances-statistics">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/attendances/statistics?month=02%2F2024" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/attendances/statistics"
);

const params = {
    "month": "02/2024",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/attendances/statistics';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'month' =&gt; '02/2024',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/attendances/statistics'
params = {
  'month': '02/2024',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-attendances-statistics">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;total_working_days&quot;: 19,
        &quot;attendance&quot;: {
            &quot;total_days&quot;: 5,
            &quot;on_days&quot;: 0,
            &quot;early_days&quot;: 4,
            &quot;late_days&quot;: 1
        },
        &quot;total_absent_days&quot;: 14
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لا يتوافق هذا الحقل مع الشكل m/Y.&quot;,
    &quot;errors&quot;: {
        &quot;month&quot;: [
            &quot;لا يتوافق هذا الحقل مع الشكل m/Y.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-attendances-statistics" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-attendances-statistics"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-attendances-statistics"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-attendances-statistics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-attendances-statistics">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-attendances-statistics" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/attendances/statistics"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-attendances-statistics', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/attendances/statistics</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-attendances-statistics"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances-statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances-statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>month</code></b>&nbsp;&nbsp;
<small>Month</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="month"                data-endpoint="GETapi-v1-dashboard-hr-employee-attendances-statistics"
               value="02/2024"
               data-component="query">
    <br>
<p>Must be in the format of mm/YYYY Example: <code>02/2024</code></p>
            </div>
                </form>

                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee">Get Basic Information</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee basic information</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;first_name&quot;: &quot;Claudia&quot;,
        &quot;last_name&quot;: &quot;Kinney&quot;,
        &quot;full_name&quot;: &quot;Claudia Kinney&quot;,
        &quot;email&quot;: &quot;alqadi.tareq1299@gmail.com&quot;,
        &quot;avatar&quot;: &quot;http://hrm.test/media/33/conversions/223ee6a962779f94846c51cab071b63f82f6648841b4190726074df1f01f1a76-avatar-lg.webp&quot;,
        &quot;phone_number&quot;: &quot;+970595872111&quot;,
        &quot;fcm_token&quot;: &quot;asfdsf354h45hgfg3fsdfg4dsdsfdasd&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee" data-method="GET"
      data-path="api/v1/dashboard/hr/employee"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-POSTapi-v1-dashboard-hr-employee-fcm-token">Store FCM Token</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to store employee fcm token</p>

<span id="example-requests-POSTapi-v1-dashboard-hr-employee-fcm-token">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/dashboard/hr/employee/fcm-token" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"fcm_token\": \"sit\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/fcm-token"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "fcm_token": "sit"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/fcm-token';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'fcm_token' =&gt; 'sit',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/fcm-token'
payload = {
    "fcm_token": "sit"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-dashboard-hr-employee-fcm-token">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;first_name&quot;: &quot;Claudia&quot;,
        &quot;last_name&quot;: &quot;Kinney&quot;,
        &quot;full_name&quot;: &quot;Claudia Kinney&quot;,
        &quot;email&quot;: &quot;alqadi.tareq1299@gmail.com&quot;,
        &quot;avatar&quot;: &quot;http://hrm.test/media/33/conversions/223ee6a962779f94846c51cab071b63f82f6648841b4190726074df1f01f1a76-avatar-lg.webp&quot;,
        &quot;phone_number&quot;: &quot;+970595872111&quot;,
        &quot;fcm_token&quot;: &quot;asfdsf354h45hgfg3fsdfg4dsdsfdasd&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-dashboard-hr-employee-fcm-token" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-dashboard-hr-employee-fcm-token"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-dashboard-hr-employee-fcm-token"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-dashboard-hr-employee-fcm-token" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-dashboard-hr-employee-fcm-token">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-dashboard-hr-employee-fcm-token" data-method="POST"
      data-path="api/v1/dashboard/hr/employee/fcm-token"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-dashboard-hr-employee-fcm-token', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/dashboard/hr/employee/fcm-token</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-dashboard-hr-employee-fcm-token"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-dashboard-hr-employee-fcm-token"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-dashboard-hr-employee-fcm-token"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fcm_token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fcm_token"                data-endpoint="POSTapi-v1-dashboard-hr-employee-fcm-token"
               value="sit"
               data-component="body">
    <br>
<p>Example: <code>sit</code></p>
        </div>
        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-personal-information">Get Personal Information</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get all employee personal information</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-personal-information">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/personal-information" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/personal-information"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/personal-information';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/personal-information'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-personal-information">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;full_name&quot;: &quot;test last&quot;,
        &quot;first_name&quot;: &quot;test&quot;,
        &quot;last_name&quot;: &quot;last&quot;,
        &quot;father_name&quot;: &quot;test&quot;,
        &quot;mother_name&quot;: &quot;test&quot;,
        &quot;email&quot;: &quot;hafez.dababsih@opost.ps&quot;,
        &quot;avatar&quot;: &quot;https://hrm.test/media/2866/conversions/php2C86_1715076684-avatar-lg.webp&quot;,
        &quot;phone_number&quot;: &quot;+970568123250&quot;,
        &quot;gender&quot;: &quot;ذكر&quot;,
        &quot;marital_status&quot;: &quot;أعزب&quot;,
        &quot;date_of_birth&quot;: &quot;1998-01-01&quot;,
        &quot;driver_license_issue_date&quot;: &quot;2020-01-01&quot;,
        &quot;finance_type&quot;: &quot;محفظة&quot;,
        &quot;bank_name&quot;: null,
        &quot;bank_account_number&quot;: null,
        &quot;bank_branch&quot;: null,
        &quot;bank_iban&quot;: null,
        &quot;wallet_name&quot;: &quot;Test&quot;,
        &quot;wallet_number&quot;: &quot;123456&quot;,
        &quot;identity_number&quot;: &quot;123456789&quot;,
        &quot;address&quot;: {
            &quot;country&quot;: &quot;السعودية&quot;,
            &quot;governorate&quot;: &quot;منطقة الرياض&quot;,
            &quot;city&quot;: &quot;الرياض&quot;,
            &quot;district&quot;: &quot;حي الخليج&quot;,
            &quot;address&quot;: &quot;فلسطين - نابلس - الباذان &quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-personal-information" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-personal-information"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-personal-information"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-personal-information" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-personal-information">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-personal-information" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/personal-information"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-personal-information', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/personal-information</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-personal-information"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-personal-information"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-personal-information"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-PUTapi-v1-dashboard-hr-employee-personal-information-update">Edit Personal Information</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to edit employee personal information</p>

<span id="example-requests-PUTapi-v1-dashboard-hr-employee-personal-information-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/v1/dashboard/hr/employee/personal-information/update" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"test@test.com\",
    \"phone_number\": \"+972595123456\",
    \"avatar\": \"in\",
    \"first_name\": \"First Name\",
    \"last_name\": \"Last Name\",
    \"gender\": \"1\",
    \"father_name\": \"Father Name\",
    \"mother_name\": \"Mother Name\",
    \"date_of_birth\": \"2000-5-5\",
    \"identity_number\": \"123456789\",
    \"marital_status\": \"single\",
    \"district_id\": \"2\",
    \"address\": \"address\",
    \"driver_license_issue_date\": \"2022-5-1\",
    \"finance_type\": \"bank\",
    \"bank_name\": \"ut\",
    \"bank_account_number\": \"qui\",
    \"bank_branch\": \"dignissimos\",
    \"bank_iban\": \"voluptatibus\",
    \"wallet_name\": \"commodi\",
    \"wallet_number\": \"placeat\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/personal-information/update"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "test@test.com",
    "phone_number": "+972595123456",
    "avatar": "in",
    "first_name": "First Name",
    "last_name": "Last Name",
    "gender": "1",
    "father_name": "Father Name",
    "mother_name": "Mother Name",
    "date_of_birth": "2000-5-5",
    "identity_number": "123456789",
    "marital_status": "single",
    "district_id": "2",
    "address": "address",
    "driver_license_issue_date": "2022-5-1",
    "finance_type": "bank",
    "bank_name": "ut",
    "bank_account_number": "qui",
    "bank_branch": "dignissimos",
    "bank_iban": "voluptatibus",
    "wallet_name": "commodi",
    "wallet_number": "placeat"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/personal-information/update';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'test@test.com',
            'phone_number' =&gt; '+972595123456',
            'avatar' =&gt; 'in',
            'first_name' =&gt; 'First Name',
            'last_name' =&gt; 'Last Name',
            'gender' =&gt; '1',
            'father_name' =&gt; 'Father Name',
            'mother_name' =&gt; 'Mother Name',
            'date_of_birth' =&gt; '2000-5-5',
            'identity_number' =&gt; '123456789',
            'marital_status' =&gt; 'single',
            'district_id' =&gt; '2',
            'address' =&gt; 'address',
            'driver_license_issue_date' =&gt; '2022-5-1',
            'finance_type' =&gt; 'bank',
            'bank_name' =&gt; 'ut',
            'bank_account_number' =&gt; 'qui',
            'bank_branch' =&gt; 'dignissimos',
            'bank_iban' =&gt; 'voluptatibus',
            'wallet_name' =&gt; 'commodi',
            'wallet_number' =&gt; 'placeat',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/personal-information/update'
payload = {
    "email": "test@test.com",
    "phone_number": "+972595123456",
    "avatar": "in",
    "first_name": "First Name",
    "last_name": "Last Name",
    "gender": "1",
    "father_name": "Father Name",
    "mother_name": "Mother Name",
    "date_of_birth": "2000-5-5",
    "identity_number": "123456789",
    "marital_status": "single",
    "district_id": "2",
    "address": "address",
    "driver_license_issue_date": "2022-5-1",
    "finance_type": "bank",
    "bank_name": "ut",
    "bank_account_number": "qui",
    "bank_branch": "dignissimos",
    "bank_iban": "voluptatibus",
    "wallet_name": "commodi",
    "wallet_number": "placeat"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-dashboard-hr-employee-personal-information-update">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;full_name&quot;: &quot;test last&quot;,
        &quot;first_name&quot;: &quot;test&quot;,
        &quot;last_name&quot;: &quot;last&quot;,
        &quot;father_name&quot;: &quot;test&quot;,
        &quot;mother_name&quot;: &quot;test&quot;,
        &quot;email&quot;: &quot;hafez.dababsih@opost.ps&quot;,
        &quot;avatar&quot;: &quot;https://hrm.test/media/2866/conversions/php2C86_1715076684-avatar-lg.webp&quot;,
        &quot;phone_number&quot;: &quot;+970568123250&quot;,
        &quot;gender&quot;: &quot;ذكر&quot;,
        &quot;marital_status&quot;: &quot;أعزب&quot;,
        &quot;date_of_birth&quot;: &quot;1998-01-01&quot;,
        &quot;driver_license_issue_date&quot;: &quot;2020-01-01&quot;,
        &quot;finance_type&quot;: &quot;محفظة&quot;,
        &quot;bank_name&quot;: null,
        &quot;bank_account_number&quot;: null,
        &quot;bank_branch&quot;: null,
        &quot;bank_iban&quot;: null,
        &quot;wallet_name&quot;: &quot;Test&quot;,
        &quot;wallet_number&quot;: &quot;123456&quot;,
        &quot;identity_number&quot;: &quot;123456789&quot;,
        &quot;address&quot;: {
            &quot;country&quot;: &quot;السعودية&quot;,
            &quot;governorate&quot;: &quot;منطقة الرياض&quot;,
            &quot;city&quot;: &quot;الرياض&quot;,
            &quot;district&quot;: &quot;حي الخليج&quot;,
            &quot;address&quot;: &quot;فلسطين - نابلس - الباذان &quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل مطلوب. و 7 أخطاء أخرى&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;phone_number&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;first_name&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;last_name&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;gender&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;identity_number&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;wallet_name&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ],
        &quot;wallet_number&quot;: [
            &quot;هذا الحقل مطلوب.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-dashboard-hr-employee-personal-information-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-dashboard-hr-employee-personal-information-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-dashboard-hr-employee-personal-information-update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-dashboard-hr-employee-personal-information-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-dashboard-hr-employee-personal-information-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-dashboard-hr-employee-personal-information-update" data-method="PUT"
      data-path="api/v1/dashboard/hr/employee/personal-information/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-dashboard-hr-employee-personal-information-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/dashboard/hr/employee/personal-information/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="test@test.com"
               data-component="body">
    <br>
<p>Example: <code>test@test.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="+972595123456"
               data-component="body">
    <br>
<p>Example: <code>+972595123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>avatar</code></b>&nbsp;&nbsp;
<small>binary</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="avatar"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="in"
               data-component="body">
    <br>
<p>webp, jpg, jpeg, png only<br/> Example: <code>in</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="First Name"
               data-component="body">
    <br>
<p>Example: <code>First Name</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="Last Name"
               data-component="body">
    <br>
<p>Example: <code>Last Name</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>enum</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="1"
               data-component="body">
    <br>
<p>Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>1</code></li> <li><code>0</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>father_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="father_name"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="Father Name"
               data-component="body">
    <br>
<p>Example: <code>Father Name</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mother_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="mother_name"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="Mother Name"
               data-component="body">
    <br>
<p>Example: <code>Mother Name</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date_of_birth</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date_of_birth"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="2000-5-5"
               data-component="body">
    <br>
<p>Example: <code>2000-5-5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>identity_number</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="identity_number"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="123456789"
               data-component="body">
    <br>
<p>Example: <code>123456789</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>marital_status</code></b>&nbsp;&nbsp;
<small>enum</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="marital_status"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="single"
               data-component="body">
    <br>
<p>Example: <code>single</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>single</code></li> <li><code>married</code></li> <li><code>widowed</code></li> <li><code>divorced</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="district_id"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="2"
               data-component="body">
    <br>
<p>Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="address"
               data-component="body">
    <br>
<p>Example: <code>address</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>driver_license_issue_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="driver_license_issue_date"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="2022-5-1"
               data-component="body">
    <br>
<p>Example: <code>2022-5-1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>finance_type</code></b>&nbsp;&nbsp;
<small>enum</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="finance_type"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="bank"
               data-component="body">
    <br>
<p>Example: <code>bank</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>bank</code></li> <li><code>wallet</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bank_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bank_name"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="ut"
               data-component="body">
    <br>
<p>Example: <code>ut</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bank_account_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bank_account_number"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="qui"
               data-component="body">
    <br>
<p>Example: <code>qui</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bank_branch</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bank_branch"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="dignissimos"
               data-component="body">
    <br>
<p>Example: <code>dignissimos</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bank_iban</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bank_iban"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="voluptatibus"
               data-component="body">
    <br>
<p>Example: <code>voluptatibus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>wallet_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="wallet_name"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="commodi"
               data-component="body">
    <br>
<p>Example: <code>commodi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>wallet_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="wallet_number"                data-endpoint="PUTapi-v1-dashboard-hr-employee-personal-information-update"
               value="placeat"
               data-component="body">
    <br>
<p>Example: <code>placeat</code></p>
        </div>
        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-job-information">Get Job Information</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get all employee job information</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-job-information">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/job-information" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/job-information"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/job-information';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/job-information'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-job-information">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;hiring_date&quot;: &quot;2024-02-12&quot;,
        &quot;branch&quot;: {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;رام الله&quot;,
            &quot;latitude&quot;: &quot;31.903355527&quot;,
            &quot;longitude&quot;: &quot;35.194873810&quot;,
            &quot;zone_radius&quot;: &quot;100.00&quot;
        },
        &quot;department&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;دائرة العمليات والمراكز&quot;
        },
        &quot;designation&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;ضابط إداري &quot;
        },
        &quot;work_shift&quot;: {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;الفترة المسائية ( 2 ) &quot;,
            &quot;start_time&quot;: &quot;15:00:00&quot;,
            &quot;end_time&quot;: &quot;21:00:00&quot;
        },
        &quot;employee_number&quot;: &quot;411445752&quot;,
        &quot;base_salary&quot;: &quot;2300.00&quot;,
        &quot;employee_type&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;موظف دائم &quot;
        },
        &quot;company_policies_accepted&quot;: false
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-job-information" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-job-information"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-job-information"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-job-information" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-job-information">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-job-information" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/job-information"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-job-information', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/job-information</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-job-information"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-job-information"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-job-information"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="employee-employee-relations">Employee Relations</h2>
                                        <p>
                    <p>Employee Relations</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations">Get Employee Relations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee relations</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;أب&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;أخ&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;صديق مقرب&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-emergency-contacts-relations" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/emergency-contacts/relations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-emergency-contacts-relations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/emergency-contacts/relations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-emergency-contacts-relations"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-emergency-contacts-relations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-emergency-contacts-relations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store">Create Employee Relation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to create the employee relation</p>

<span id="example-requests-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/store" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Name\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/store"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Name"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/store';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Name',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/store'
payload = {
    "name": "Name"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 4,
        &quot;name&quot;: &quot;أم&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store" data-method="POST"
      data-path="api/v1/dashboard/hr/employee/emergency-contacts/relations/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/dashboard/hr/employee/emergency-contacts/relations/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-dashboard-hr-employee-emergency-contacts-relations-store"
               value="Name"
               data-component="body">
    <br>
<p>Example: <code>Name</code></p>
        </div>
        </form>

                    <h2 id="employee-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-">Update Employee Relation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to update the employee relation</p>

<span id="example-requests-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/et" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Name\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/et"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Name"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/et';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Name',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/relations/et'
payload = {
    "name": "Name"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;صديق&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-" data-method="PUT"
      data-path="api/v1/dashboard/hr/employee/emergency-contacts/relations/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/dashboard/hr/employee/emergency-contacts/relations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-"
               value="et"
               data-component="url">
    <br>
<p>The ID of the relation. Example: <code>et</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-dashboard-hr-employee-emergency-contacts-relations--id-"
               value="Name"
               data-component="body">
    <br>
<p>Example: <code>Name</code></p>
        </div>
        </form>

                                <h2 id="employee-emergency-contacts">Emergency Contacts</h2>
                                        <p>
                    <p>Employee Emergency Contacts</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-emergency-contacts">Get Emergency Contacts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee emergency contacts</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-emergency-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-emergency-contacts">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;relation&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;أب&quot;
            },
            &quot;name&quot;: &quot;Howard Baker&quot;,
            &quot;phone_number&quot;: &quot;+970595111222&quot;,
            &quot;email&quot;: &quot;alqadi.tareq199@gmail.com&quot;,
            &quot;address&quot;: {
                &quot;address&quot;: &quot;Nulla rem voluptatem eu nemo repellendus Velit&quot;
            }
        },
        {
            &quot;relation&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;أخ&quot;
            },
            &quot;name&quot;: &quot;Paki Noble&quot;,
            &quot;phone_number&quot;: &quot;+970595222000&quot;,
            &quot;email&quot;: &quot;alqadi.tareq199@gmail.com&quot;,
            &quot;address&quot;: {
                &quot;country&quot;: &quot;فلسطين&quot;,
                &quot;governorate&quot;: &quot;محافظة الخليل&quot;,
                &quot;city&quot;: &quot;مدينة الخليل&quot;,
                &quot;district&quot;: &quot;دوار ابن رشد&quot;,
                &quot;address&quot;: &quot;In quos tempore aliquip labore&quot;
            }
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-emergency-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-emergency-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-emergency-contacts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-emergency-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-emergency-contacts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-emergency-contacts" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/emergency-contacts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-emergency-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/emergency-contacts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-emergency-contacts"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-emergency-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-emergency-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-">Update Emergency Contact</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to update the employee emergency contact</p>

<span id="example-requests-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/impedit" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_relation_id\": 5,
    \"name\": \"Name\",
    \"email\": \"test@test.com\",
    \"phone_number\": \"+972595123456\",
    \"district_id\": \"2\",
    \"address\": \"address\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/impedit"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_relation_id": 5,
    "name": "Name",
    "email": "test@test.com",
    "phone_number": "+972595123456",
    "district_id": "2",
    "address": "address"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/impedit';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'employee_relation_id' =&gt; 5,
            'name' =&gt; 'Name',
            'email' =&gt; 'test@test.com',
            'phone_number' =&gt; '+972595123456',
            'district_id' =&gt; '2',
            'address' =&gt; 'address',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/impedit'
payload = {
    "employee_relation_id": 5,
    "name": "Name",
    "email": "test@test.com",
    "phone_number": "+972595123456",
    "district_id": "2",
    "address": "address"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PATCH', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 8,
        &quot;relation&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;صديق مقرب&quot;
        },
        &quot;name&quot;: &quot;test&quot;,
        &quot;phone_number&quot;: &quot;+972595123654&quot;,
        &quot;email&quot;: null,
        &quot;address&quot;: {
            &quot;country&quot;: &quot;فلسطين&quot;,
            &quot;governorate&quot;: &quot;محافظة رام الله والبيرة&quot;,
            &quot;city&quot;: &quot;مدينة رام الله&quot;,
            &quot;district&quot;: &quot;البيرة\\حي الجنان&quot;,
            &quot;address&quot;: null
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-" data-method="PATCH"
      data-path="api/v1/dashboard/hr/employee/emergency-contacts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/dashboard/hr/employee/emergency-contacts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="impedit"
               data-component="url">
    <br>
<p>The ID of the emergency contact. Example: <code>impedit</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_relation_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="employee_relation_id"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="5"
               data-component="body">
    <br>
<p>Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="Name"
               data-component="body">
    <br>
<p>Example: <code>Name</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="test@test.com"
               data-component="body">
    <br>
<p>Example: <code>test@test.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="+972595123456"
               data-component="body">
    <br>
<p>Example: <code>+972595123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="district_id"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="2"
               data-component="body">
    <br>
<p>Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="address"
               data-component="body">
    <br>
<p>Example: <code>address</code></p>
        </div>
        </form>

                    <h2 id="employee-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-">Delete Emergency Contact</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to delete the employee emergency contact</p>

<span id="example-requests-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/iste" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/iste"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/iste';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/emergency-contacts/iste'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-">
            <blockquote>
            <p>Example response (204, success):</p>
        </blockquote>
                <pre>
<code>Empty response</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-" data-method="DELETE"
      data-path="api/v1/dashboard/hr/employee/emergency-contacts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/dashboard/hr/employee/emergency-contacts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-dashboard-hr-employee-emergency-contacts--id-"
               value="iste"
               data-component="url">
    <br>
<p>The ID of the emergency contact. Example: <code>iste</code></p>
            </div>
                    </form>

                                <h2 id="employee-documents">Documents</h2>
                                        <p>
                    <p>Employee documents</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-documents">Get Documents</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee documents</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-documents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/documents" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/documents"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/documents';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/documents'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-documents">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 3,
            &quot;document_type&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;رخصة قيادة&quot;
            },
            &quot;name&quot;: &quot;رخصة قيادة&quot;,
            &quot;description&quot;: &quot;رخصة قيادة&quot;,
            &quot;expired_date&quot;: &quot;2024-02-29&quot;,
            &quot;has_attachment&quot;: true
        },
        {
            &quot;id&quot;: 4,
            &quot;document_type&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;هوية&quot;
            },
            &quot;name&quot;: &quot;هوية&quot;,
            &quot;description&quot;: &quot;هوية&quot;,
            &quot;expired_date&quot;: null,
            &quot;has_attachment&quot;: true
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-documents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-documents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-documents"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-documents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-documents">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-documents" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/documents"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-documents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/documents</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-documents"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-documents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-documents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-documents--id--attachment">Get Document Attachment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee document attachment pdf or image.</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-documents--id--attachment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/documents/reiciendis/attachment" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/documents/reiciendis/attachment"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/documents/reiciendis/attachment';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/documents/reiciendis/attachment'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-documents--id--attachment">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">PDF or Image File</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Document Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Document Attachment Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على المرفق&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-documents--id--attachment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-documents--id--attachment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-documents--id--attachment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-documents--id--attachment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-documents--id--attachment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-documents--id--attachment" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/documents/{id}/attachment"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-documents--id--attachment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/documents/{id}/attachment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-documents--id--attachment"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-documents--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-documents--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-dashboard-hr-employee-documents--id--attachment"
               value="reiciendis"
               data-component="url">
    <br>
<p>The ID of the document. Example: <code>reiciendis</code></p>
            </div>
                    </form>

                                <h2 id="employee-vacations">Vacations</h2>
                                        <p>
                    <p>Employee Vacations</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-vacations">Get Vacations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee vacations</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-vacations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/vacations" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/vacations"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/vacations';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/vacations'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-vacations">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;vacation_type&quot;: {
                &quot;name&quot;: &quot;إجازة سنوية&quot;,
                &quot;payment_type&quot;: &quot;مدفوع&quot;
            },
            &quot;start_date&quot;: &quot;2024-02-07&quot;,
            &quot;end_date&quot;: &quot;2024-02-09&quot;,
            &quot;year&quot;: &quot;2024&quot;,
            &quot;notes&quot;: &quot;&lt;p&gt;te&lt;/p&gt;&quot;,
            &quot;vacation_duration_in_days&quot;: 3,
            &quot;has_attachment&quot;: false
        },
        {
            &quot;id&quot;: 6,
            &quot;vacation_type&quot;: {
                &quot;name&quot;: &quot;اجازة عرضية&quot;,
                &quot;payment_type&quot;: &quot;غير مدفوع&quot;
            },
            &quot;start_date&quot;: &quot;2024-02-22&quot;,
            &quot;end_date&quot;: &quot;2024-02-23&quot;,
            &quot;year&quot;: &quot;2024&quot;,
            &quot;notes&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;سبب الاجازة او ملاحظات اخرى&lt;/p&gt;&quot;,
            &quot;vacation_duration_in_days&quot;: 2,
            &quot;has_attachment&quot;: true
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-vacations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-vacations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-vacations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-vacations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-vacations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-vacations" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/vacations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-vacations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/vacations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-vacations"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-vacations--id--attachment">Get Vacation Attachment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee vacation attachment pdf or image.</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-vacations--id--attachment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/vacations/optio/attachment" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/vacations/optio/attachment"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/vacations/optio/attachment';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/vacations/optio/attachment'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-vacations--id--attachment">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">PDF or Image File</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Vacation Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Vacation Attachment Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على المرفق&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-vacations--id--attachment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-vacations--id--attachment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-vacations--id--attachment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-vacations--id--attachment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-vacations--id--attachment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-vacations--id--attachment" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/vacations/{id}/attachment"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-vacations--id--attachment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/vacations/{id}/attachment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-vacations--id--attachment"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations--id--attachment"
               value="optio"
               data-component="url">
    <br>
<p>The ID of the vacation. Example: <code>optio</code></p>
            </div>
                    </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-vacations-balances">Get Vacations Balances</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee vacations balances</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-vacations-balances">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/vacations/balances" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/vacations/balances"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/vacations/balances';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/vacations/balances'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-vacations-balances">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;إجازة سنوية&quot;,
            &quot;payment_type_value&quot;: 2,
            &quot;payment_type_label&quot;: &quot;مدفوع&quot;,
            &quot;total_balance&quot;: 14,
            &quot;used_balance&quot;: 0
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;اجازة عرضية&quot;,
            &quot;payment_type_value&quot;: 1,
            &quot;payment_type_label&quot;: &quot;غير مدفوع&quot;,
            &quot;total_balance&quot;: 14,
            &quot;used_balance&quot;: 0
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-vacations-balances" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-vacations-balances"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-vacations-balances"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-vacations-balances" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-vacations-balances">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-vacations-balances" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/vacations/balances"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-vacations-balances', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/vacations/balances</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-vacations-balances"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations-balances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations-balances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-vacations-types">Get Vacation Types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get vacation types</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-vacations-types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/vacations/types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/vacations/types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/vacations/types';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/vacations/types'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-vacations-types">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;إجازة سنوية&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;اجازة عرضية&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-vacations-types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-vacations-types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-vacations-types"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-vacations-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-vacations-types">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-vacations-types" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/vacations/types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-vacations-types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/vacations/types</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-vacations-types"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-vacations-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="employee-leaves">Leaves</h2>
                                        <p>
                    <p>Employee Leaves</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-leaves">Get Leaves</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee leaves</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-leaves">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/leaves" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/leaves"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/leaves';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/leaves'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-leaves">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;leave_date&quot;: &quot;2024-02-14&quot;,
            &quot;start_time&quot;: &quot;11:00:00&quot;,
            &quot;end_time&quot;: &quot;13:00:00&quot;,
            &quot;notes&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;سبب المغادرة او اي ملاحظة اخرى&lt;/p&gt;&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;leave_date&quot;: &quot;2024-02-22&quot;,
            &quot;start_time&quot;: &quot;12:00:00&quot;,
            &quot;end_time&quot;: &quot;13:00:00&quot;,
            &quot;notes&quot;: null
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-leaves" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-leaves"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-leaves"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-leaves" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-leaves">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-leaves" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/leaves"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-leaves', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/leaves</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-leaves"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-leaves"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-leaves"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="employee-allowances">Allowances</h2>
                                        <p>
                    <p>Employee Allowances</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-allowances">Get Allowances</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee allowances</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-allowances">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/allowances" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/allowances"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/allowances';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/allowances'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-allowances">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;بدل علاوة&quot;,
            &quot;amount&quot;: &quot;₪300.00&quot;,
            &quot;notes&quot;: null,
            &quot;applied_date&quot;: &quot;2024-02-01&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;بدل مواصلات&quot;,
            &quot;amount&quot;: &quot;₪500.00&quot;,
            &quot;notes&quot;: &quot;بدل مواصلات&quot;,
            &quot;applied_date&quot;: &quot;2024-01-01&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-allowances" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-allowances"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-allowances"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-allowances" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-allowances">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-allowances" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/allowances"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-allowances', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/allowances</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-allowances"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-allowances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-allowances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="employee-deductions">Deductions</h2>
                                        <p>
                    <p>Employee Deductions</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-deductions">Get Deductions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee deductions</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-deductions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/deductions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/deductions"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/deductions';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/deductions'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-deductions">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;deduction_type&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;تأمين صحي&quot;
            },
            &quot;amount&quot;: &quot;₪350.00&quot;,
            &quot;notes&quot;: &quot;تأمين صحي&quot;,
            &quot;applied_date&quot;: &quot;2024-02-01&quot;,
            &quot;frequency&quot;: &quot;شهري&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;deduction_type&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;ضريبة&quot;
            },
            &quot;amount&quot;: &quot;₪230.00&quot;,
            &quot;notes&quot;: null,
            &quot;applied_date&quot;: &quot;2024-01-28&quot;,
            &quot;frequency&quot;: &quot;مره واحده&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-deductions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-deductions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-deductions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-deductions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-deductions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-deductions" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/deductions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-deductions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/deductions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-deductions"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-deductions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-deductions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="employee-salary-advances">Salary Advances</h2>
                                        <p>
                    <p>Employee Salary Advances</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-salary-advances">Get Salary Advances</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee salary advances</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-salary-advances">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/salary-advances" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/salary-advances"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/salary-advances';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/salary-advances'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-salary-advances">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;amount&quot;: &quot;₪1,200.00&quot;,
            &quot;reason&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;سبب السلفة او اي ملاحظات&lt;/p&gt;&quot;,
            &quot;repayment_status&quot;: &quot;قيد الانتظار&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;amount&quot;: &quot;₪500.00&quot;,
            &quot;reason&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;سبب&lt;/p&gt;&quot;,
            &quot;repayment_status&quot;: &quot;قيد الانتظار&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-salary-advances" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-salary-advances"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-salary-advances"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-salary-advances" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-salary-advances">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-salary-advances" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/salary-advances"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-salary-advances', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/salary-advances</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-salary-advances"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-salary-advances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-salary-advances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments">Get Salary Advance Repayments</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee salary advance repayments</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/salary-advances/veritatis/repayments" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/salary-advances/veritatis/repayments"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/salary-advances/veritatis/repayments';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/salary-advances/veritatis/repayments'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 387,
            &quot;amount&quot;: &quot;50.00&quot;,
            &quot;repayment_date&quot;: &quot;2024-02-28 00:00:00&quot;,
            &quot;repayment_status&quot;: &quot;قيد الانتظار&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/salary-advances/{id}/repayments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/salary-advances/{id}/repayments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-dashboard-hr-employee-salary-advances--id--repayments"
               value="veritatis"
               data-component="url">
    <br>
<p>The ID of the salary advance. Example: <code>veritatis</code></p>
            </div>
                    </form>

                                <h2 id="employee-administrative-correspondences">Administrative Correspondences</h2>
                                        <p>
                    <p>Employee Administrative Correspondences</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-administrative-correspondences">Get Administrative Correspondences</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee administrative correspondences</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-administrative-correspondences">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences?date=2024-03-02" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences"
);

const params = {
    "date": "2024-03-02",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'date' =&gt; '2024-03-02',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences'
params = {
  'date': '2024-03-02',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-administrative-correspondences">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 44,
            &quot;title&quot;: &quot;انذار خطي أول &quot;,
            &quot;notes&quot;: &quot;انذار خطي أول / تحرك خراج ساعات العمل الرسمي دون تبيلغ &quot;,
            &quot;correspondence_date&quot;: &quot;2024-02-25&quot;,
            &quot;has_attachment&quot;: true
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-administrative-correspondences" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-administrative-correspondences"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-administrative-correspondences"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-administrative-correspondences" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-administrative-correspondences">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-administrative-correspondences" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/administrative-correspondences"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-administrative-correspondences', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/administrative-correspondences</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences"
               value="2024-03-02"
               data-component="query">
    <br>
<p>Example: <code>2024-03-02</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment">Get administrative correspondence Attachment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee administrative correspondence attachment pdf or image.</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences/ipsam/attachment" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences/ipsam/attachment"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences/ipsam/attachment';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/administrative-correspondences/ipsam/attachment'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">PDF or Image File</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Administrative Correspondence Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Administrative Correspondence Attachment Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على المرفق&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/administrative-correspondences/{id}/attachment"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/administrative-correspondences/{id}/attachment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-dashboard-hr-employee-administrative-correspondences--id--attachment"
               value="ipsam"
               data-component="url">
    <br>
<p>The ID of the administrative correspondence. Example: <code>ipsam</code></p>
            </div>
                    </form>

                                <h2 id="employee-tasks">Tasks</h2>
                                        <p>
                    <p>Employee Tasks</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-tasks">Get Tasks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee tasks</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-tasks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/tasks?search=test&amp;due_date=2024-03-18&amp;task_status=3" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/tasks"
);

const params = {
    "search": "test",
    "due_date": "2024-03-18",
    "task_status": "3",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/tasks';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'test',
            'due_date' =&gt; '2024-03-18',
            'task_status' =&gt; '3',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/tasks'
params = {
  'search': 'test',
  'due_date': '2024-03-18',
  'task_status': '3',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-tasks">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;created_by&quot;: {
                &quot;name&quot;: &quot;admin&quot;,
                &quot;email&quot;: &quot;admin2@admin.com&quot;,
                &quot;avatar&quot;: &quot;http://hrm.test/media/1/conversions/d8a2d2e897c88bfcc72b1a12fbd7dd0a6ebfd24fa0a89e16220c3d4a255a14b4-avatar-lg.webp&quot;,
                &quot;phone_number&quot;: &quot;+970599553160&quot;
            },
            &quot;subject&quot;: &quot;مهمة 3&quot;,
            &quot;description&quot;: &quot;مهمة 3&quot;,
            &quot;due_date&quot;: &quot;2024-03-29&quot;,
            &quot;task_status&quot;: &quot;تم إسناده&quot;,
            &quot;created_at&quot;: &quot;2024-03-20 13:19:49&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;created_by&quot;: {
                &quot;name&quot;: &quot;admin&quot;,
                &quot;email&quot;: &quot;admin2@admin.com&quot;,
                &quot;avatar&quot;: &quot;http://hrm.test/media/1/conversions/d8a2d2e897c88bfcc72b1a12fbd7dd0a6ebfd24fa0a89e16220c3d4a255a14b4-avatar-lg.webp&quot;,
                &quot;phone_number&quot;: &quot;+970599553160&quot;
            },
            &quot;subject&quot;: &quot;مهمة 2&quot;,
            &quot;description&quot;: &quot;مهمة 2&quot;,
            &quot;due_date&quot;: &quot;2024-03-28&quot;,
            &quot;task_status&quot;: &quot;تم إسناده&quot;,
            &quot;created_at&quot;: &quot;2024-03-20 13:19:27&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;created_by&quot;: {
                &quot;name&quot;: &quot;admin&quot;,
                &quot;email&quot;: &quot;admin2@admin.com&quot;,
                &quot;avatar&quot;: &quot;http://hrm.test/media/1/conversions/d8a2d2e897c88bfcc72b1a12fbd7dd0a6ebfd24fa0a89e16220c3d4a255a14b4-avatar-lg.webp&quot;,
                &quot;phone_number&quot;: &quot;+970599553160&quot;
            },
            &quot;subject&quot;: &quot;مهمة 1&quot;,
            &quot;description&quot;: &quot;مهمة 1&quot;,
            &quot;due_date&quot;: &quot;2024-03-26&quot;,
            &quot;task_status&quot;: &quot;تم إسناده&quot;,
            &quot;created_at&quot;: &quot;2024-03-20 13:18:09&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-tasks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-tasks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-tasks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-tasks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-tasks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-tasks" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/tasks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-tasks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/tasks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-tasks"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-tasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-tasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-dashboard-hr-employee-tasks"
               value="test"
               data-component="query">
    <br>
<p>Example: <code>test</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>due_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="due_date"                data-endpoint="GETapi-v1-dashboard-hr-employee-tasks"
               value="2024-03-18"
               data-component="query">
    <br>
<p>Example: <code>2024-03-18</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>task_status</code></b>&nbsp;&nbsp;
<small>Task Status</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="task_status"                data-endpoint="GETapi-v1-dashboard-hr-employee-tasks"
               value="3"
               data-component="query">
    <br>
<p>Example: <code>3</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>2</code></li> <li><code>3</code></li> <li><code>4</code></li></ul>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-tasks-task-statuses">Get Task Statuses</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get task statuses</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-tasks-task-statuses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/tasks/task-statuses" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/tasks/task-statuses"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/tasks/task-statuses';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/tasks/task-statuses'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-tasks-task-statuses">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;value&quot;: 2,
            &quot;label&quot;: &quot;قيد التقدم&quot;
        },
        {
            &quot;value&quot;: 3,
            &quot;label&quot;: &quot;مكتمل&quot;
        },
        {
            &quot;value&quot;: 4,
            &quot;label&quot;: &quot;ملغي&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-tasks-task-statuses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-tasks-task-statuses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-tasks-task-statuses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-tasks-task-statuses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-tasks-task-statuses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-tasks-task-statuses" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/tasks/task-statuses"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-tasks-task-statuses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/tasks/task-statuses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-tasks-task-statuses"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-tasks-task-statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-tasks-task-statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status">Edit Task Status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to edit task status</p>

<span id="example-requests-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/dashboard/hr/employee/tasks/dolorum/update-status" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"new_status\": \"4\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/tasks/dolorum/update-status"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "new_status": "4"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/tasks/dolorum/update-status';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'new_status' =&gt; '4',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/tasks/dolorum/update-status'
payload = {
    "new_status": "4"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PATCH', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;created_by&quot;: {
                &quot;name&quot;: &quot;Admin&quot;,
                &quot;email&quot;: &quot;admin@admin.com&quot;,
                &quot;avatar&quot;: &quot;http://hrm.test/media/36/conversions/640a61685fa0ec468a55952fed641a7ef4bc5d409651c8467d03b3838bac9acc-avatar-lg.webp&quot;,
                &quot;phone_number&quot;: &quot;+970595222666&quot;
            },
            &quot;subject&quot;: &quot;مهمة 1&quot;,
            &quot;description&quot;: &quot;وصف المهمة&quot;,
            &quot;due_date&quot;: &quot;2024-02-09&quot;,
            &quot;task_status&quot;: &quot;قيد التقدم&quot;,
            &quot;created_at&quot;: &quot;2024-02-08 18:07:07&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;created_by&quot;: {
                &quot;name&quot;: &quot;Admin&quot;,
                &quot;email&quot;: &quot;admin@admin.com&quot;,
                &quot;avatar&quot;: &quot;http://hrm.test/media/36/conversions/640a61685fa0ec468a55952fed641a7ef4bc5d409651c8467d03b3838bac9acc-avatar-lg.webp&quot;,
                &quot;phone_number&quot;: &quot;+970595222666&quot;
            },
            &quot;subject&quot;: &quot;مهمة 2&quot;,
            &quot;description&quot;: null,
            &quot;due_date&quot;: &quot;2024-02-16&quot;,
            &quot;task_status&quot;: &quot;تم إسناده&quot;,
            &quot;created_at&quot;: &quot;2024-02-08 18:07:18&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل غير موجود.&quot;,
    &quot;errors&quot;: {
        &quot;new_status&quot;: [
            &quot;هذا الحقل غير موجود.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status" data-method="PATCH"
      data-path="api/v1/dashboard/hr/employee/tasks/{id}/update-status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/dashboard/hr/employee/tasks/{id}/update-status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status"
               value="dolorum"
               data-component="url">
    <br>
<p>The ID of the task. Example: <code>dolorum</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_status</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="new_status"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-tasks--id--update-status"
               value="4"
               data-component="body">
    <br>
<p>The value of task status, you can get all allowed statuses by Get Task Statuses endpoint Example: <code>4</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>2</code></li> <li><code>3</code></li> <li><code>4</code></li></ul>
        </div>
        </form>

                                <h2 id="employee-calendar">Calendar</h2>
                                        <p>
                    <p>Employee Calendar</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-calendar-events">Get Events</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get any events</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-calendar-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/calendar/events?date=2024-03-02" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/calendar/events"
);

const params = {
    "date": "2024-03-02",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/events';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'date' =&gt; '2024-03-02',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/events'
params = {
  'date': '2024-03-02',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-calendar-events">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;holidays&quot;: [],
        &quot;leaves&quot;: [
            {
                &quot;id&quot;: 57,
                &quot;title&quot;: &quot;مغادرة&quot;,
                &quot;start&quot;: &quot;2024-04-15&quot;,
                &quot;end&quot;: &quot;2024-04-15&quot;
            }
        ],
        &quot;tasks&quot;: [
            {
                &quot;id&quot;: 8,
                &quot;title&quot;: &quot;مهمة 2&quot;,
                &quot;start&quot;: &quot;2024-04-15&quot;,
                &quot;end&quot;: &quot;2024-04-15&quot;
            }
        ],
        &quot;vacations&quot;: [],
        &quot;attendances&quot;: [
            {
                &quot;id&quot;: 4738,
                &quot;attendance_date&quot;: &quot;2024-04-16&quot;,
                &quot;behavior&quot;: &quot;مبكر&quot;,
                &quot;time_events&quot;: [
                    {
                        &quot;id&quot;: 9797,
                        &quot;in_time&quot;: &quot;2024-04-16 08:00:00&quot;,
                        &quot;out_time&quot;: &quot;2024-04-16 13:00:00&quot;
                    },
                    {
                        &quot;id&quot;: 9798,
                        &quot;in_time&quot;: &quot;2024-04-16 14:00:00&quot;,
                        &quot;out_time&quot;: null
                    }
                ]
            },
            {
                &quot;id&quot;: 4741,
                &quot;attendance_date&quot;: &quot;2024-04-17&quot;,
                &quot;behavior&quot;: &quot;مبكر&quot;,
                &quot;time_events&quot;: [
                    {
                        &quot;id&quot;: 9810,
                        &quot;in_time&quot;: &quot;2024-04-17 08:00:00&quot;,
                        &quot;out_time&quot;: &quot;2024-04-17 12:00:00&quot;
                    },
                    {
                        &quot;id&quot;: 9811,
                        &quot;in_time&quot;: &quot;2024-04-17 13:00:00&quot;,
                        &quot;out_time&quot;: &quot;2024-04-17 17:00:00&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 4742,
                &quot;attendance_date&quot;: &quot;2024-04-22&quot;,
                &quot;behavior&quot;: &quot;متأخر&quot;,
                &quot;time_events&quot;: [
                    {
                        &quot;id&quot;: 9835,
                        &quot;in_time&quot;: &quot;2024-04-22 17:00:00&quot;,
                        &quot;out_time&quot;: &quot;2024-04-22 11:22:14&quot;
                    },
                    {
                        &quot;id&quot;: 9836,
                        &quot;in_time&quot;: &quot;2024-04-22 11:05:25&quot;,
                        &quot;out_time&quot;: &quot;2024-04-22 17:00:00&quot;
                    }
                ]
            }
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-calendar-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-calendar-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-calendar-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-calendar-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-calendar-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-calendar-events" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/calendar/events"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-calendar-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/calendar/events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-events"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-events"
               value="2024-03-02"
               data-component="query">
    <br>
<p>Example: <code>2024-03-02</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-calendar-holidays">Get Holidays</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the holidays</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-calendar-holidays">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/calendar/holidays?date=2024-03-02" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/calendar/holidays"
);

const params = {
    "date": "2024-03-02",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/holidays';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'date' =&gt; '2024-03-02',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/holidays'
params = {
  'date': '2024-03-02',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-calendar-holidays">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;asda&quot;,
            &quot;description&quot;: &quot;Repellendus Culpa optio consequuntur ea voluptatibus ut accusamus voluptatem Commodi&quot;,
            &quot;start_date&quot;: &quot;2024-03-02&quot;,
            &quot;end_date&quot;: &quot;2024-05-16&quot;,
            &quot;is_paid&quot;: true
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-calendar-holidays" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-calendar-holidays"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-calendar-holidays"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-calendar-holidays" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-calendar-holidays">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-calendar-holidays" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/calendar/holidays"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-calendar-holidays', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/calendar/holidays</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-holidays"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-holidays"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-holidays"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-holidays"
               value="2024-03-02"
               data-component="query">
    <br>
<p>Example: <code>2024-03-02</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-calendar-tasks">Get Tasks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get employee tasks</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-calendar-tasks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/calendar/tasks?date=2024-03-02" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/calendar/tasks"
);

const params = {
    "date": "2024-03-02",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/tasks';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'date' =&gt; '2024-03-02',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/tasks'
params = {
  'date': '2024-03-02',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-calendar-tasks">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 8,
            &quot;subject&quot;: &quot;مهمة 2&quot;,
            &quot;description&quot;: null,
            &quot;due_date&quot;: &quot;2024-04-15&quot;,
            &quot;task_status&quot;: &quot;تم إسناده&quot;,
            &quot;created_at&quot;: &quot;2024-04-14 15:02:29&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-calendar-tasks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-calendar-tasks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-calendar-tasks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-calendar-tasks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-calendar-tasks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-calendar-tasks" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/calendar/tasks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-calendar-tasks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/calendar/tasks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-tasks"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-tasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-tasks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-tasks"
               value="2024-03-02"
               data-component="query">
    <br>
<p>Example: <code>2024-03-02</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-calendar-leaves">Get Leaves</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get employee leaves</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-calendar-leaves">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/calendar/leaves?date=2024-03-02" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/calendar/leaves"
);

const params = {
    "date": "2024-03-02",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/leaves';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'date' =&gt; '2024-03-02',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/leaves'
params = {
  'date': '2024-03-02',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-calendar-leaves">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 57,
            &quot;leave_date&quot;: &quot;2024-04-15&quot;,
            &quot;start_time&quot;: &quot;08:30:00&quot;,
            &quot;end_time&quot;: &quot;09:30:00&quot;,
            &quot;notes&quot;: null
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-calendar-leaves" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-calendar-leaves"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-calendar-leaves"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-calendar-leaves" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-calendar-leaves">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-calendar-leaves" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/calendar/leaves"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-calendar-leaves', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/calendar/leaves</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-leaves"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-leaves"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-leaves"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-leaves"
               value="2024-03-02"
               data-component="query">
    <br>
<p>Example: <code>2024-03-02</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-calendar-vacations">Get Vacations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get employee vacations</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-calendar-vacations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/calendar/vacations?date=2024-03-02" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/calendar/vacations"
);

const params = {
    "date": "2024-03-02",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/vacations';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'date' =&gt; '2024-03-02',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/calendar/vacations'
params = {
  'date': '2024-03-02',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-calendar-vacations">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 57,
            &quot;leave_date&quot;: &quot;2024-04-15&quot;,
            &quot;start_time&quot;: &quot;08:30:00&quot;,
            &quot;end_time&quot;: &quot;09:30:00&quot;,
            &quot;notes&quot;: null
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-calendar-vacations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-calendar-vacations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-calendar-vacations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-calendar-vacations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-calendar-vacations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-calendar-vacations" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/calendar/vacations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-calendar-vacations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/calendar/vacations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-vacations"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-vacations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-vacations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-v1-dashboard-hr-employee-calendar-vacations"
               value="2024-03-02"
               data-component="query">
    <br>
<p>Example: <code>2024-03-02</code></p>
            </div>
                </form>

                                <h2 id="employee-requests">Requests</h2>
                                        <p>
                    <p>Employee Requests</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests">Get Requests</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee requests</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests?type=1&amp;status=1&amp;requested_at=2024-03-18&amp;processed_date=2024-03-18" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests"
);

const params = {
    "type": "1",
    "status": "1",
    "requested_at": "2024-03-18",
    "processed_date": "2024-03-18",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'type' =&gt; '1',
            'status' =&gt; '1',
            'requested_at' =&gt; '2024-03-18',
            'processed_date' =&gt; '2024-03-18',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests'
params = {
  'type': '1',
  'status': '1',
  'requested_at': '2024-03-18',
  'processed_date': '2024-03-18',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 231,
            &quot;request_type&quot;: &quot;طلب سلفة&quot;,
            &quot;requested_at&quot;: &quot;2024-02-26 15:40:01&quot;,
            &quot;custom_type&quot;: null,
            &quot;details&quot;: {
                &quot;vacation.vacation_type_id&quot;: null,
                &quot;vacation.vacation_type_name&quot;: null,
                &quot;vacation.start_date&quot;: null,
                &quot;vacation.end_date&quot;: null,
                &quot;vacation.duration_in_days&quot;: null,
                &quot;vacation.reason&quot;: null,
                &quot;leave.date&quot;: null,
                &quot;leave.start_time&quot;: null,
                &quot;leave.end_time&quot;: null,
                &quot;leave.duration_in_hours&quot;: null,
                &quot;leave.reason&quot;: null,
                &quot;advance.amount&quot;: &quot;300&quot;,
                &quot;advance.reason&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;سلفة&lt;/p&gt;&quot;,
                &quot;custom.description&quot;: null
            },
            &quot;description&quot;: null,
            &quot;request_status&quot;: &quot;مقبول&quot;,
            &quot;processed_by&quot;: {
                &quot;name&quot;: &quot;أحمد&quot;,
                &quot;email&quot;: &quot;ahmad@test.ps&quot;,
                &quot;avatar&quot;: &quot;http://hrm.test/media/11/conversions/b546d744c6de9ad5c5de7ca98ffbaa83821c97255d76a57bc314138bda7ea7cf-avatar-lg.webp&quot;,
                &quot;phone_number&quot;: &quot;+970595222888&quot;
            },
            &quot;processed_date&quot;: &quot;2024-02-26&quot;,
            &quot;notes&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;سلفة&amp;nbsp;&lt;/p&gt;&quot;,
            &quot;has_attachment&quot;: false
        },
        {
            &quot;id&quot;: 177,
            &quot;request_type&quot;: &quot;طلب سلفة&quot;,
            &quot;requested_at&quot;: &quot;2024-02-19 15:16:50&quot;,
            &quot;custom_type&quot;: null,
            &quot;details&quot;: {
                &quot;vacation.vacation_type_id&quot;: null,
                &quot;vacation.vacation_type_name&quot;: null,
                &quot;vacation.start_date&quot;: null,
                &quot;vacation.end_date&quot;: null,
                &quot;vacation.duration_in_days&quot;: null,
                &quot;vacation.reason&quot;: null,
                &quot;leave.date&quot;: null,
                &quot;leave.start_time&quot;: null,
                &quot;leave.end_time&quot;: null,
                &quot;leave.duration_in_hours&quot;: null,
                &quot;leave.reason&quot;: null,
                &quot;advance.amount&quot;: &quot;300&quot;,
                &quot;advance.reason&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;300 سلفة&lt;/p&gt;&quot;,
                &quot;custom.description&quot;: null
            },
            &quot;description&quot;: null,
            &quot;request_status&quot;: &quot;مقبول&quot;,
            &quot;processed_by&quot;: {
                &quot;name&quot;: &quot;أحمد&quot;,
                &quot;email&quot;: &quot;ahmad@test.ps&quot;,
                &quot;avatar&quot;: &quot;http://hrm.test/media/11/conversions/b546d744c6de9ad5c5de7ca98ffbaa83821c97255d76a57bc314138bda7ea7cf-avatar-lg.webp&quot;,
                &quot;phone_number&quot;: &quot;+970595222888&quot;
            },
            &quot;processed_date&quot;: &quot;2024-02-20&quot;,
            &quot;notes&quot;: &quot;&lt;p dir=\&quot;rtl\&quot;&gt;سلفة&amp;nbsp;&lt;/p&gt;&quot;,
            &quot;has_attachment&quot;: false
        },
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل المختار غير صالح. و 1 خطأ اخر&quot;,
    &quot;errors&quot;: {
        &quot;type&quot;: [
            &quot;هذا الحقل المختار غير صالح.&quot;
        ],
        &quot;status&quot;: [
            &quot;هذا الحقل المختار غير صالح.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>Request Type</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests"
               value="1"
               data-component="query">
    <br>
<p>Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>0</code></li> <li><code>1</code></li> <li><code>2</code></li> <li><code>3</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>Request Status</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests"
               value="1"
               data-component="query">
    <br>
<p>Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>1</code></li> <li><code>2</code></li> <li><code>3</code></li> <li><code>4</code></li> <li><code>5</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>requested_at</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="requested_at"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests"
               value="2024-03-18"
               data-component="query">
    <br>
<p>Example: <code>2024-03-18</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>processed_date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="processed_date"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests"
               value="2024-03-18"
               data-component="query">
    <br>
<p>Example: <code>2024-03-18</code></p>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type">Get Stats By Request Type</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee stats by request type</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;request_type_value&quot;: 0,
            &quot;request_type_label&quot;: &quot;طلب مخصص&quot;,
            &quot;total_requests&quot;: 0
        },
        {
            &quot;request_type_value&quot;: 1,
            &quot;request_type_label&quot;: &quot;طلب إجازة&quot;,
            &quot;total_requests&quot;: 1
        },
        {
            &quot;request_type_value&quot;: 2,
            &quot;request_type_label&quot;: &quot;طلب مغادرة&quot;,
            &quot;total_requests&quot;: 0
        },
        {
            &quot;request_type_value&quot;: 3,
            &quot;request_type_label&quot;: &quot;طلب سلفة&quot;,
            &quot;total_requests&quot;: 4
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests/stats/count-by-type"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests/stats/count-by-type</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status">Get Stats By Request Status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee stats by request status</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-status" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-status"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-status';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-status'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;request_status_value&quot;: 1,
            &quot;request_status_label&quot;: &quot;قيد الانتظار&quot;,
            &quot;total_requests&quot;: 0
        },
        {
            &quot;request_status_value&quot;: 2,
            &quot;request_status_label&quot;: &quot;قيد التقدم&quot;,
            &quot;total_requests&quot;: 0
        },
        {
            &quot;request_status_value&quot;: 3,
            &quot;request_status_label&quot;: &quot;مقبول&quot;,
            &quot;total_requests&quot;: 4
        },
        {
            &quot;request_status_value&quot;: 4,
            &quot;request_status_label&quot;: &quot;مرفوض&quot;,
            &quot;total_requests&quot;: 0
        },
        {
            &quot;request_status_value&quot;: 5,
            &quot;request_status_label&quot;: &quot;ملغي&quot;,
            &quot;total_requests&quot;: 0
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests/stats/count-by-status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests/stats/count-by-status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status">Get Stats Of Requests</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee requests stats</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type-and-status?type=1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type-and-status"
);

const params = {
    "type": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type-and-status';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'type' =&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/stats/count-by-type-and-status'
params = {
  'type': '1',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;total_requests&quot;: 3,
        &quot;pending_requests&quot;: 1,
        &quot;in_progress_requests&quot;: 0,
        &quot;approved_requests&quot;: 2,
        &quot;rejected_requests&quot;: 0
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل المختار غير صالح.&quot;,
    &quot;errors&quot;: {
        &quot;type&quot;: [
            &quot;هذا الحقل المختار غير صالح.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests/stats/count-by-type-and-status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests/stats/count-by-type-and-status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>Request Type</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-stats-count-by-type-and-status"
               value="1"
               data-component="query">
    <br>
<p>Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>0</code></li> <li><code>1</code></li> <li><code>2</code></li> <li><code>3</code></li></ul>
            </div>
                </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests-last">Get Last Request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee last request</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests-last">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests/last" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/last"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/last';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/last'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests-last">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 67,
        &quot;request_type&quot;: &quot;طلب إجازة&quot;,
        &quot;requested_at&quot;: &quot;2024-02-19 12:02:59&quot;,
        &quot;custom_type&quot;: null,
        &quot;details&quot;: {
            &quot;vacation.vacation_type_id&quot;: &quot;2&quot;,
            &quot;vacation.start_date&quot;: &quot;2024-02-19 12:03:11&quot;,
            &quot;vacation.end_date&quot;: &quot;2024-02-20 12:03:11&quot;,
            &quot;vacation.reason&quot;: &quot;&lt;p&gt;d&lt;/p&gt;&quot;,
            &quot;leave.date&quot;: null,
            &quot;leave.start_time&quot;: null,
            &quot;leave.end_time&quot;: null,
            &quot;leave.reason&quot;: null,
            &quot;advance.amount&quot;: null,
            &quot;advance.reason&quot;: null,
            &quot;custom.description&quot;: null
        },
        &quot;description&quot;: null,
        &quot;request_status&quot;: &quot;قيد الانتظار&quot;,
        &quot;processed_by&quot;: null,
        &quot;processed_date&quot;: null,
        &quot;notes&quot;: null,
        &quot;has_attachment&quot;: false
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests-last" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests-last"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests-last"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests-last" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests-last">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests-last" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests/last"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests-last', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests/last</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests-last"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-last"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-last"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests-request-types">Get Request Types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get request types</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests-request-types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests/request-types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/request-types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/request-types';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/request-types'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests-request-types">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;value&quot;: 0,
            &quot;label&quot;: &quot;طلب مخصص&quot;
        },
        {
            &quot;value&quot;: 1,
            &quot;label&quot;: &quot;طلب إجازة&quot;
        },
        {
            &quot;value&quot;: 2,
            &quot;label&quot;: &quot;طلب مغادرة&quot;
        },
        {
            &quot;value&quot;: 3,
            &quot;label&quot;: &quot;طلب سلفة&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests-request-types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests-request-types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests-request-types"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests-request-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests-request-types">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests-request-types" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests/request-types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests-request-types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests/request-types</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests-request-types"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-request-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-request-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types">Get Request Custom Types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get request custom types</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests/request-types/custom-types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/request-types/custom-types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/request-types/custom-types';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/request-types/custom-types'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;تدريب&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests/request-types/custom-types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests/request-types/custom-types</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests-request-types-custom-types"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-POSTapi-v1-dashboard-hr-employee-requests-create">Create Request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to creating a request</p>

<span id="example-requests-POSTapi-v1-dashboard-hr-employee-requests-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/dashboard/hr/employee/requests/create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"request_type\": \"1\",
    \"data\": {
        \"vacation\": {
            \"vacation_type_id\": \"1\",
            \"start_date\": \"02\\/15\\/2024\",
            \"end_date\": \"02\\/16\\/2024\",
            \"reason\": \"سبب الطلب...\"
        },
        \"leave\": {
            \"date\": \"02\\/15\\/2024\",
            \"start_time\": \"01:00\",
            \"end_time\": \"02:00\",
            \"reason\": \"سبب الطلب...\"
        },
        \"advance\": {
            \"amount\": \"voluptas\",
            \"reason\": \"سبب الطلب...\"
        },
        \"custom\": {
            \"description\": \"وصف الطلب...\"
        }
    },
    \"custom_type_id\": \"1\",
    \"attachment\": \"وصف الطلب...\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/create"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request_type": "1",
    "data": {
        "vacation": {
            "vacation_type_id": "1",
            "start_date": "02\/15\/2024",
            "end_date": "02\/16\/2024",
            "reason": "سبب الطلب..."
        },
        "leave": {
            "date": "02\/15\/2024",
            "start_time": "01:00",
            "end_time": "02:00",
            "reason": "سبب الطلب..."
        },
        "advance": {
            "amount": "voluptas",
            "reason": "سبب الطلب..."
        },
        "custom": {
            "description": "وصف الطلب..."
        }
    },
    "custom_type_id": "1",
    "attachment": "وصف الطلب..."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/create';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'request_type' =&gt; '1',
            'data' =&gt; [
                'vacation' =&gt; [
                    'vacation_type_id' =&gt; '1',
                    'start_date' =&gt; '02/15/2024',
                    'end_date' =&gt; '02/16/2024',
                    'reason' =&gt; 'سبب الطلب...',
                ],
                'leave' =&gt; [
                    'date' =&gt; '02/15/2024',
                    'start_time' =&gt; '01:00',
                    'end_time' =&gt; '02:00',
                    'reason' =&gt; 'سبب الطلب...',
                ],
                'advance' =&gt; [
                    'amount' =&gt; 'voluptas',
                    'reason' =&gt; 'سبب الطلب...',
                ],
                'custom' =&gt; [
                    'description' =&gt; 'وصف الطلب...',
                ],
            ],
            'custom_type_id' =&gt; '1',
            'attachment' =&gt; 'وصف الطلب...',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/create'
payload = {
    "request_type": "1",
    "data": {
        "vacation": {
            "vacation_type_id": "1",
            "start_date": "02\/15\/2024",
            "end_date": "02\/16\/2024",
            "reason": "سبب الطلب..."
        },
        "leave": {
            "date": "02\/15\/2024",
            "start_time": "01:00",
            "end_time": "02:00",
            "reason": "سبب الطلب..."
        },
        "advance": {
            "amount": "voluptas",
            "reason": "سبب الطلب..."
        },
        "custom": {
            "description": "وصف الطلب..."
        }
    },
    "custom_type_id": "1",
    "attachment": "وصف الطلب..."
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-dashboard-hr-employee-requests-create">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 68,
        &quot;request_type&quot;: &quot;طلب إجازة&quot;,
        &quot;requested_at&quot;: &quot;2024-02-26 11:23:13&quot;,
        &quot;custom_type&quot;: null,
        &quot;details&quot;: {
            &quot;vacation.vacation_type_id&quot;: &quot;1&quot;,
            &quot;vacation.start_date&quot;: &quot;2024-02-27T00:00:00.000000Z&quot;,
            &quot;vacation.end_date&quot;: &quot;2024-02-28T00:00:00.000000Z&quot;,
            &quot;vacation.reason&quot;: &quot;سبب الطلب&quot;,
            &quot;leave.date&quot;: null,
            &quot;leave.start_time&quot;: null,
            &quot;leave.end_time&quot;: null,
            &quot;leave.reason&quot;: null,
            &quot;advance.amount&quot;: null,
            &quot;advance.reason&quot;: null,
            &quot;custom.description&quot;: null
        },
        &quot;description&quot;: null,
        &quot;request_status&quot;: &quot;قيد الانتظار&quot;,
        &quot;processed_date&quot;: null,
        &quot;notes&quot;: null,
        &quot;has_attachment&quot;: false
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل غير موجود.&quot;,
    &quot;errors&quot;: {
        &quot;new_status&quot;: [
            &quot;هذا الحقل غير موجود.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-dashboard-hr-employee-requests-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-dashboard-hr-employee-requests-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-dashboard-hr-employee-requests-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-dashboard-hr-employee-requests-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-dashboard-hr-employee-requests-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-dashboard-hr-employee-requests-create" data-method="POST"
      data-path="api/v1/dashboard/hr/employee/requests/create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-dashboard-hr-employee-requests-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/dashboard/hr/employee/requests/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>request_type</code></b>&nbsp;&nbsp;
<small>enum</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="request_type"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="1"
               data-component="body">
    <br>
<p>The value of request type, you can get all allowed request types by Get Request Types endpoint<br/> Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>0</code></li> <li><code>1</code></li> <li><code>2</code></li> <li><code>3</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
<br>
<p>The object of request data.<br/></p>
            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>vacation</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of vacation data. (Required when request type is vacation)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>vacation_type_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.vacation.vacation_type_id"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="1"
               data-component="body">
    <br>
<p>vacation type id from Get Vacations Balances. (Required when request type is vacation)<br/> Example: <code>1</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.vacation.start_date"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="02/15/2024"
               data-component="body">
    <br>
<p>The start date of vacation. (Required when request type is vacation)<br/> Example: <code>02/15/2024</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.vacation.end_date"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="02/16/2024"
               data-component="body">
    <br>
<p>The end date of vacation. (Must be after or equal to start date) (Required when request type is vacation)<br/> Example: <code>02/16/2024</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.vacation.reason"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="سبب الطلب..."
               data-component="body">
    <br>
<p>The reason of vacation. (Required when request type is vacation)<br/> Example: <code>سبب الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                                                    <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>leave</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of leave data. (Required when request type is leave)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.date"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="02/15/2024"
               data-component="body">
    <br>
<p>The date of leave. (Required when request type is leave)<br/> Example: <code>02/15/2024</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>time</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.start_time"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="01:00"
               data-component="body">
    <br>
<p>The start time of leave. (Required when request type is leave)<br/> Example: <code>01:00</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>time</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.end_time"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="02:00"
               data-component="body">
    <br>
<p>The end time of leave. (Required when request type is leave)<br/> Example: <code>02:00</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.reason"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="سبب الطلب..."
               data-component="body">
    <br>
<p>The reason of leave. (Required when request type is leave)<br/> Example: <code>سبب الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                                                    <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>advance</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of advance data. (Required when request type is advance)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>decimal</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.advance.amount"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="voluptas"
               data-component="body">
    <br>
<p>The amount of money needed as advance. (Required when request type is advance)<br/> Example: <code>voluptas</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.advance.reason"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="سبب الطلب..."
               data-component="body">
    <br>
<p>The reason of advance. (Required when request type is advance)<br/> Example: <code>سبب الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                                                    <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>custom</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of custom request data. (Required when request type is custom)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.custom.description"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="وصف الطلب..."
               data-component="body">
    <br>
<p>The description of request. (Required when request type is custom)<br/> Example: <code>وصف الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>custom_type_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="custom_type_id"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="1"
               data-component="body">
    <br>
<p>The value of custom type, you can get all allowed request custom types by Get Request Custom Types endpoint<br/> Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attachment</code></b>&nbsp;&nbsp;
<small>binary</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="attachment"                data-endpoint="POSTapi-v1-dashboard-hr-employee-requests-create"
               value="وصف الطلب..."
               data-component="body">
    <br>
<p>The attachment of request. (webp, jpg, jpeg, png, pdf only)<br/> Example: <code>وصف الطلب...</code></p>
        </div>
        </form>

                    <h2 id="employee-PATCHapi-v1-dashboard-hr-employee-requests--request--update">Update Request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to updating a request</p>

<span id="example-requests-PATCHapi-v1-dashboard-hr-employee-requests--request--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/dashboard/hr/employee/requests/possimus/update" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"request_type\": \"1\",
    \"data\": {
        \"vacation\": {
            \"vacation_type_id\": \"1\",
            \"start_date\": \"02\\/15\\/2024\",
            \"end_date\": \"02\\/16\\/2024\",
            \"reason\": \"سبب الطلب...\"
        },
        \"leave\": {
            \"date\": \"02\\/15\\/2024\",
            \"start_time\": \"01:00\",
            \"end_time\": \"02:00\",
            \"reason\": \"سبب الطلب...\"
        },
        \"advance\": {
            \"amount\": \"provident\",
            \"reason\": \"سبب الطلب...\"
        },
        \"custom\": {
            \"description\": \"وصف الطلب...\"
        }
    },
    \"custom_type_id\": \"1\",
    \"attachment\": \"وصف الطلب...\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/possimus/update"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request_type": "1",
    "data": {
        "vacation": {
            "vacation_type_id": "1",
            "start_date": "02\/15\/2024",
            "end_date": "02\/16\/2024",
            "reason": "سبب الطلب..."
        },
        "leave": {
            "date": "02\/15\/2024",
            "start_time": "01:00",
            "end_time": "02:00",
            "reason": "سبب الطلب..."
        },
        "advance": {
            "amount": "provident",
            "reason": "سبب الطلب..."
        },
        "custom": {
            "description": "وصف الطلب..."
        }
    },
    "custom_type_id": "1",
    "attachment": "وصف الطلب..."
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/possimus/update';
$response = $client-&gt;patch(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'request_type' =&gt; '1',
            'data' =&gt; [
                'vacation' =&gt; [
                    'vacation_type_id' =&gt; '1',
                    'start_date' =&gt; '02/15/2024',
                    'end_date' =&gt; '02/16/2024',
                    'reason' =&gt; 'سبب الطلب...',
                ],
                'leave' =&gt; [
                    'date' =&gt; '02/15/2024',
                    'start_time' =&gt; '01:00',
                    'end_time' =&gt; '02:00',
                    'reason' =&gt; 'سبب الطلب...',
                ],
                'advance' =&gt; [
                    'amount' =&gt; 'provident',
                    'reason' =&gt; 'سبب الطلب...',
                ],
                'custom' =&gt; [
                    'description' =&gt; 'وصف الطلب...',
                ],
            ],
            'custom_type_id' =&gt; '1',
            'attachment' =&gt; 'وصف الطلب...',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/possimus/update'
payload = {
    "request_type": "1",
    "data": {
        "vacation": {
            "vacation_type_id": "1",
            "start_date": "02\/15\/2024",
            "end_date": "02\/16\/2024",
            "reason": "سبب الطلب..."
        },
        "leave": {
            "date": "02\/15\/2024",
            "start_time": "01:00",
            "end_time": "02:00",
            "reason": "سبب الطلب..."
        },
        "advance": {
            "amount": "provident",
            "reason": "سبب الطلب..."
        },
        "custom": {
            "description": "وصف الطلب..."
        }
    },
    "custom_type_id": "1",
    "attachment": "وصف الطلب..."
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PATCH', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-dashboard-hr-employee-requests--request--update">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 6,
        &quot;request_type&quot;: &quot;طلب إجازة&quot;,
        &quot;requested_at&quot;: &quot;2024-02-10 09:15:05&quot;,
        &quot;custom_type&quot;: null,
        &quot;details&quot;: {
            &quot;vacation.vacation_type_id&quot;: &quot;1&quot;,
            &quot;vacation.start_date&quot;: &quot;2024-02-29T00:00:00.000000Z&quot;,
            &quot;vacation.end_date&quot;: &quot;2024-03-02T00:00:00.000000Z&quot;,
            &quot;vacation.reason&quot;: &quot;سبب الطلب&quot;,
            &quot;leave.date&quot;: null,
            &quot;leave.start_time&quot;: null,
            &quot;leave.end_time&quot;: null,
            &quot;leave.reason&quot;: null,
            &quot;advance.amount&quot;: null,
            &quot;advance.reason&quot;: null,
            &quot;custom.description&quot;: null
        },
        &quot;description&quot;: null,
        &quot;request_status&quot;: &quot;قيد الانتظار&quot;,
        &quot;processed_date&quot;: null,
        &quot;notes&quot;: null,
        &quot;has_attachment&quot;: true
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل غير موجود.&quot;,
    &quot;errors&quot;: {
        &quot;new_status&quot;: [
            &quot;هذا الحقل غير موجود.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;يمكن تحديث الطلبات القيد الانتظار فقط.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-dashboard-hr-employee-requests--request--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-dashboard-hr-employee-requests--request--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-dashboard-hr-employee-requests--request--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-dashboard-hr-employee-requests--request--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-dashboard-hr-employee-requests--request--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-dashboard-hr-employee-requests--request--update" data-method="PATCH"
      data-path="api/v1/dashboard/hr/employee/requests/{request}/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-dashboard-hr-employee-requests--request--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/dashboard/hr/employee/requests/{request}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>request</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="request"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="possimus"
               data-component="url">
    <br>
<p>The request. Example: <code>possimus</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>request_type</code></b>&nbsp;&nbsp;
<small>enum</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="request_type"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="1"
               data-component="body">
    <br>
<p>The value of request type, you can get all allowed request types by Get Request Types endpoint<br/> Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>0</code></li> <li><code>1</code></li> <li><code>2</code></li> <li><code>3</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
<br>
<p>The object of request data.<br/></p>
            </summary>
                                                <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>vacation</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of vacation data. (Required when request type is vacation)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>vacation_type_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="data.vacation.vacation_type_id"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="1"
               data-component="body">
    <br>
<p>vacation type id from Get Vacations Balances. (Required when request type is vacation)<br/> Example: <code>1</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.vacation.start_date"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="02/15/2024"
               data-component="body">
    <br>
<p>The start date of vacation. (Required when request type is vacation)<br/> Example: <code>02/15/2024</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.vacation.end_date"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="02/16/2024"
               data-component="body">
    <br>
<p>The end date of vacation. (Must be after or equal to start date) (Required when request type is vacation)<br/> Example: <code>02/16/2024</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.vacation.reason"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="سبب الطلب..."
               data-component="body">
    <br>
<p>The reason of vacation. (Required when request type is vacation)<br/> Example: <code>سبب الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                                                    <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>leave</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of leave data. (Required when request type is leave)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.date"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="02/15/2024"
               data-component="body">
    <br>
<p>The date of leave. (Required when request type is leave)<br/> Example: <code>02/15/2024</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>time</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.start_time"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="01:00"
               data-component="body">
    <br>
<p>The start time of leave. (Required when request type is leave)<br/> Example: <code>01:00</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>time</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.end_time"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="02:00"
               data-component="body">
    <br>
<p>The end time of leave. (Required when request type is leave)<br/> Example: <code>02:00</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.leave.reason"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="سبب الطلب..."
               data-component="body">
    <br>
<p>The reason of leave. (Required when request type is leave)<br/> Example: <code>سبب الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                                                    <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>advance</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of advance data. (Required when request type is advance)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>decimal</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.advance.amount"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="provident"
               data-component="body">
    <br>
<p>The amount of money needed as advance. (Required when request type is advance)<br/> Example: <code>provident</code></p>
                    </div>
                                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.advance.reason"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="سبب الطلب..."
               data-component="body">
    <br>
<p>The reason of advance. (Required when request type is advance)<br/> Example: <code>سبب الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                                                    <div style=" margin-left: 14px; clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>custom</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The object of custom request data. (Required when request type is custom)<br/></p>
            </summary>
                                                <div style="margin-left: 28px; clear: unset;">
                        <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="data.custom.description"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="وصف الطلب..."
               data-component="body">
    <br>
<p>The description of request. (Required when request type is custom)<br/> Example: <code>وصف الطلب...</code></p>
                    </div>
                                    </details>
        </div>
                                        </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>custom_type_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="custom_type_id"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="1"
               data-component="body">
    <br>
<p>The value of custom type, you can get all allowed request custom types by Get Request Custom Types endpoint<br/> Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>attachment</code></b>&nbsp;&nbsp;
<small>binary</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="attachment"                data-endpoint="PATCHapi-v1-dashboard-hr-employee-requests--request--update"
               value="وصف الطلب..."
               data-component="body">
    <br>
<p>The attachment of request. (webp, jpg, jpeg, png, pdf only)<br/> Example: <code>وصف الطلب...</code></p>
        </div>
        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-requests--request--attachment">Get Request Attachment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the request attachment pdf or image.</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-requests--request--attachment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/requests/praesentium/attachment" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/requests/praesentium/attachment"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/requests/praesentium/attachment';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/requests/praesentium/attachment'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-requests--request--attachment">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">PDF or Image File</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Request Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Request Attachment Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على المرفق&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-requests--request--attachment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-requests--request--attachment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-requests--request--attachment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-requests--request--attachment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-requests--request--attachment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-requests--request--attachment" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/requests/{request}/attachment"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-requests--request--attachment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/requests/{request}/attachment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-requests--request--attachment"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests--request--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests--request--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>request</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="request"                data-endpoint="GETapi-v1-dashboard-hr-employee-requests--request--attachment"
               value="praesentium"
               data-component="url">
    <br>
<p>The request. Example: <code>praesentium</code></p>
            </div>
                    </form>

                                <h2 id="employee-salaries">Salaries</h2>
                                        <p>
                    <p>Employee Salaries</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-salaries">Get Salaries</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee salaries</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-salaries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/salaries" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/salaries"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/salaries';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/salaries'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-salaries">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2060,
            &quot;payrun&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;راتب شهر 1&quot;,
                &quot;start_date&quot;: &quot;2024-01-01&quot;,
                &quot;end_date&quot;: &quot;2024-01-31&quot;,
                &quot;total_period_days&quot;: 31,
                &quot;total_required_working_days&quot;: 27,
                &quot;total_weekends&quot;: 4,
                &quot;total_holidays&quot;: 0,
                &quot;total_overlapping_between_weekends_and_holidays&quot;: 0
            },
            &quot;net_salary&quot;: &quot;₪4,738.00&quot;,
            &quot;base_salary&quot;: &quot;₪2,700.00&quot;,
            &quot;required_working_hours&quot;: &quot;216:00&quot;,
            &quot;working_hours&quot;: &quot;216:00&quot;,
            &quot;total_working_days&quot;: 26,
            &quot;over_or_shortage_hours&quot;: &quot;00:00&quot;,
            &quot;total_allowances_amount&quot;: &quot;₪2,070.00&quot;,
            &quot;total_deductions_amount&quot;: &quot;₪32.00&quot;,
            &quot;total_advances_amount&quot;: &quot;₪0.00&quot;,
            &quot;total_vacations_amount&quot;: &quot;₪90.00&quot;,
            &quot;total_overtime_amount&quot;: &quot;₪0.00&quot;,
            &quot;total_shortage_amount&quot;: &quot;₪0.00&quot;,
            &quot;vacations&quot;: [
                {
                    &quot;vacation_type&quot;: &quot;إجازة راس السنة &quot;,
                    &quot;payment_type&quot;: &quot;مدفوع&quot;,
                    &quot;duration&quot;: &quot;1 يوم&quot;
                }
            ],
            &quot;notes&quot;: &quot;&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-salaries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-salaries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-salaries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-salaries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-salaries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-salaries" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/salaries"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-salaries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/salaries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-salaries"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-salaries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-salaries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-salaries--id--payslip">Download Payslip</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to download the employee payslip.</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-salaries--id--payslip">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/salaries/velit/payslip" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/salaries/velit/payslip"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/salaries/velit/payslip';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/salaries/velit/payslip'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-salaries--id--payslip">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">PDF File</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Document Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Document Attachment Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على المرفق&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-salaries--id--payslip" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-salaries--id--payslip"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-salaries--id--payslip"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-salaries--id--payslip" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-salaries--id--payslip">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-salaries--id--payslip" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/salaries/{id}/payslip"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-salaries--id--payslip', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/salaries/{id}/payslip</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-salaries--id--payslip"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-salaries--id--payslip"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-salaries--id--payslip"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-dashboard-hr-employee-salaries--id--payslip"
               value="velit"
               data-component="url">
    <br>
<p>The ID of the salary. Example: <code>velit</code></p>
            </div>
                    </form>

                                <h2 id="employee-announcements">Announcements</h2>
                                        <p>
                    <p>Employee Announcements</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-announcements">Get Announcements</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee announcements</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-announcements">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/announcements" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/announcements"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/announcements';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/announcements'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-announcements">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;عطلة&quot;,
            &quot;start_date&quot;: &quot;2024-03-20&quot;,
            &quot;end_date&quot;: &quot;2024-03-21&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;عطلة&lt;/p&gt;&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-announcements" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-announcements"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-announcements"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-announcements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-announcements">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-announcements" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/announcements"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-announcements', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/announcements</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-announcements"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-announcements"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-announcements"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-announcements-history">Get Announcements History</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the employee announcements history</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-announcements-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/announcements/history?start_date=2024-03-02&amp;end_date=2024-03-05" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/announcements/history"
);

const params = {
    "start_date": "2024-03-02",
    "end_date": "2024-03-05",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/announcements/history';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'start_date' =&gt; '2024-03-02',
            'end_date' =&gt; '2024-03-05',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/announcements/history'
params = {
  'start_date': '2024-03-02',
  'end_date': '2024-03-05',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-announcements-history">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;عطلة&quot;,
            &quot;start_date&quot;: &quot;2024-03-05&quot;,
            &quot;end_date&quot;: &quot;2024-03-07&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;عطلة&lt;/p&gt;&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;اجازة &quot;,
            &quot;start_date&quot;: &quot;2024-01-02&quot;,
            &quot;end_date&quot;: &quot;2024-01-15&quot;,
            &quot;content&quot;: &quot;&lt;p&gt;الاخوة موظفي الشركة&amp;nbsp;&lt;/p&gt;
&lt;p&gt;سيكون يوم الاربعاء الموافق 03/01/2024 اجازة رسمية لموظفي الشركة تعويضا عن دوام يوم الاثنين الموافق 01/01/2024.&lt;/p&gt;&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-announcements-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-announcements-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-announcements-history"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-announcements-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-announcements-history">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-announcements-history" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/announcements/history"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-announcements-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/announcements/history</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-announcements-history"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-announcements-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-announcements-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="GETapi-v1-dashboard-hr-employee-announcements-history"
               value="2024-03-02"
               data-component="query">
    <br>
<p>Example: <code>2024-03-02</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>Date</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="GETapi-v1-dashboard-hr-employee-announcements-history"
               value="2024-03-05"
               data-component="query">
    <br>
<p>Example: <code>2024-03-05</code></p>
            </div>
                </form>

                                <h2 id="employee-company-policies">Company Policies</h2>
                                        <p>
                    <p>Policies</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-company-policies">Get Policies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the company policies</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-company-policies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/company/policies" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/company/policies"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-company-policies">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;تعميم استخدام سيارات الشركة &quot;,
            &quot;content&quot;: &quot;
الموضوع: تعميم استخدام سيارات الشركة 

الاخوة موظفي الشركة المحترمين،،
بعد التحية:


يرجى العلم و للتأكيد بأن استخدام سيارات الشركة هو فقط لإحتياجات العمل، ويمنع إستخدامها والتحرك بالسيارة خارج أوقات العمل الرسمي،  وفي حال الحاجة الى استخدام السيارة خارج العمل، ضرورة التنسيق واخذ الموافقة المسبقة مع مشرف الحركة (الأخ جهاد السباتين، رقم 00972568823261  ).

علماً انه سيتم خصم شيكل واحد عن كل كيلو متر تتحركه السيارة بعد موافقة مشرف الحركة.
وفي حال عدم الالتزام، سيتم أخذ الإجراءات الإدارية المناسبة بحق المخالفين.


الاخوة مدراء المكاتب للتعميم على الموظفين من طرفكم.



مع الاحترام
الموارد البشرية&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;تعميم الالتزام  باستخدام البوالص لكافة الطرود بين المكاتب . &quot;,
            &quot;content&quot;: &quot;
الموضوع: تعميم الالتزام  باستخدام البوالص لكافة الطرود بين المكاتب  .  

للحفاظ على سير العمليات في المراكز بالشكل المطلوب ، يرجى العلم و التأكيد  على ما يلي : 

- يمنع نقل أي طرد او كراتين أو خلافه  بين المكاتب دون استخدام البوالص المناسبة وذات العلاقة .
- يمنع نقل أي طرود شخصية  بين المكاتب لأي موظف كان لأي سبب بدون البوالص المناسبة وذات 
العلاقة .

تحت طائلة المسؤولية، وسيتم أخذ الإجراءات الإدارية المناسبة بحق المخالفين في حال عدم الالتزام.


&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-company-policies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-company-policies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-company-policies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-company-policies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-company-policies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-company-policies" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/company/policies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-company-policies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/company/policies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies">Accept Policies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows employee to accept company policies</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/company/policies/accept-policies" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/company/policies/accept-policies"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies/accept-policies';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies/accept-policies'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;company_policies_accepted&quot;: true
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-company-policies-accept-policies" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/company/policies/accept-policies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-company-policies-accept-policies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/company/policies/accept-policies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-accept-policies"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-accept-policies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-accept-policies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted">Check Policies Accepted</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to check if company policies accepted</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/company/policies/check-policies-accepted" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/company/policies/check-policies-accepted"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies/check-policies-accepted';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies/check-policies-accepted'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;company_policies_accepted&quot;: true
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/company/policies/check-policies-accepted"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/company/policies/check-policies-accepted</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-check-policies-accepted"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations">Get Internal Regulations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows employee to get internal regulations document</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/company/policies/internal-regulations" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/company/policies/internal-regulations"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies/internal-regulations';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/company/policies/internal-regulations'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">PDF or Image File</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, File Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على النظام الداخلي للشركة&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/company/policies/internal-regulations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/company/policies/internal-regulations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-policies-internal-regulations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="employee-company-forms">Company Forms</h2>
                                        <p>
                    <p>Forms</p>
                </p>
                                        <h2 id="employee-GETapi-v1-dashboard-hr-employee-company-forms">Get Forms</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the company forms</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-company-forms">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/company/forms" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/company/forms"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/company/forms';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/company/forms'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-company-forms">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;طلب التحاق ببرنامج تدريبي او دورة تدريبية &quot;,
            &quot;type&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;تدريب و تطوير &quot;
            },
            &quot;notes&quot;: &quot;نموذج طلب التحاق ببرنامج تدريبي او دورة تدريبية &quot;,
            &quot;has_attachment&quot;: true
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;مدونة السلوك الوظيفي وأخلاقيات العمل &quot;,
            &quot;type&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;توظيف &quot;
            },
            &quot;notes&quot;: &quot;مدونة السلوك الوظيفي وأخلاقيات العمل &quot;,
            &quot;has_attachment&quot;: true
        },
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-company-forms" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-company-forms"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-company-forms"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-company-forms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-company-forms">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-company-forms" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/company/forms"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-company-forms', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/company/forms</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="employee-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment">Get Form Attachment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to get the company attachment pdf or word.</p>

<span id="example-requests-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/hr/employee/company/forms/doloribus/attachment?type=pdf" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/hr/employee/company/forms/doloribus/attachment"
);

const params = {
    "type": "pdf",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/hr/employee/company/forms/doloribus/attachment';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'type' =&gt; 'pdf',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/hr/employee/company/forms/doloribus/attachment'
params = {
  'type': 'pdf',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">PDF or Word File</code>
 </pre>
            <blockquote>
            <p>Example response (403, Forbidden):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Form Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على السجل&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Form Attachment Not Found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;لم يتم العثور على المرفق&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;هذا الحقل غير موجود.&quot;,
    &quot;errors&quot;: {
        &quot;type&quot;: [
            &quot;هذا الحقل غير موجود.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-hr-employee-company-forms--id--attachment" data-method="GET"
      data-path="api/v1/dashboard/hr/employee/company/forms/{id}/attachment"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-hr-employee-company-forms--id--attachment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/hr/employee/company/forms/{id}/attachment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms--id--attachment"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms--id--attachment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms--id--attachment"
               value="doloribus"
               data-component="url">
    <br>
<p>The ID of the form. Example: <code>doloribus</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-dashboard-hr-employee-company-forms--id--attachment"
               value="pdf"
               data-component="query">
    <br>
<p>The type of attachemnt pdf or word Example: <code>pdf</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pdf</code></li> <li><code>word</code></li></ul>
            </div>
                </form>

                <h1 id="geo-location">Geo Location</h1>

    <p>APIs for geo location</p>

                        <h2 id="geo-location-countries">Countries</h2>
                                                    <h2 id="geo-location-GETapi-v1-dashboard-geo-location-countries">Get Countries</h2>

<p>
</p>

<p>This endpoint allows you to get all countries.</p>

<span id="example-requests-GETapi-v1-dashboard-geo-location-countries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/geo-location/countries?search=%D9%81%D9%84%D8%B3%D8%B7%D9%8A%D9%86&amp;limit=15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/geo-location/countries"
);

const params = {
    "search": "فلسطين",
    "limit": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/geo-location/countries';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'search' =&gt; 'فلسطين',
            'limit' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/geo-location/countries'
params = {
  'search': 'فلسطين',
  'limit': '15',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-geo-location-countries">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;en_common_name&quot;: &quot;Finland&quot;,
            &quot;en_official_name&quot;: &quot;Republic of Finland&quot;,
            &quot;ar_common_name&quot;: &quot;فنلندا&quot;,
            &quot;ar_official_name&quot;: &quot;جمهورية فنلندا&quot;,
            &quot;native_common_name&quot;: &quot;Suomi&quot;,
            &quot;native_official_name&quot;: &quot;Suomen tasavalta&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;en_common_name&quot;: &quot;Guatemala&quot;,
            &quot;en_official_name&quot;: &quot;Republic of Guatemala&quot;,
            &quot;ar_common_name&quot;: &quot;غواتيمالا&quot;,
            &quot;ar_official_name&quot;: &quot;جمهورية غواتيمالا&quot;,
            &quot;native_common_name&quot;: &quot;Guatemala&quot;,
            &quot;native_official_name&quot;: &quot;Rep&uacute;blica de Guatemala&quot;
        }
        //...
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-geo-location-countries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-geo-location-countries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-geo-location-countries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-geo-location-countries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-geo-location-countries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-geo-location-countries" data-method="GET"
      data-path="api/v1/dashboard/geo-location/countries"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-geo-location-countries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/geo-location/countries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-geo-location-countries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-geo-location-countries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-dashboard-geo-location-countries"
               value="فلسطين"
               data-component="query">
    <br>
<p>Example: <code>فلسطين</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-v1-dashboard-geo-location-countries"
               value="15"
               data-component="query">
    <br>
<p>Example: <code>15</code></p>
            </div>
                </form>

                                <h2 id="geo-location-governorates">Governorates</h2>
                                                    <h2 id="geo-location-GETapi-v1-dashboard-geo-location-governorates">Get Governorates</h2>

<p>
</p>

<p>This endpoint allows you to get all governorate.</p>

<span id="example-requests-GETapi-v1-dashboard-geo-location-governorates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/geo-location/governorates?country_id=2&amp;search=%D8%A7%D9%84%D8%B6%D9%81%D8%A9+%D8%A7%D9%84%D8%BA%D8%B1%D8%A8%D9%8A%D8%A9&amp;limit=15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/geo-location/governorates"
);

const params = {
    "country_id": "2",
    "search": "الضفة الغربية",
    "limit": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/geo-location/governorates';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'country_id' =&gt; '2',
            'search' =&gt; 'الضفة الغربية',
            'limit' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/geo-location/governorates'
params = {
  'country_id': '2',
  'search': 'الضفة الغربية',
  'limit': '15',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-geo-location-governorates">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 14,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة القدس&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة جنين&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة طوباس&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة طولكرم&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة نابلس&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة قلقيلية&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة سلفيت&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة رام الله والبيرة&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة اريحا&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;country_id&quot;: 55,
            &quot;name&quot;: &quot;محافظة بيت لحم&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;القيمة المحددة لهذا الحقل غير موجودة. و 2 أخطاء أخرى&quot;,
    &quot;errors&quot;: {
        &quot;country_id&quot;: [
            &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;
        ],
        &quot;limit&quot;: [
            &quot;يجب على هذا الحقل أن يكون رقمًا.&quot;,
            &quot;يجب أن تكون قيمة هذا الحقل مساوية أو أكبر من 10.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-geo-location-governorates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-geo-location-governorates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-geo-location-governorates"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-geo-location-governorates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-geo-location-governorates">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-geo-location-governorates" data-method="GET"
      data-path="api/v1/dashboard/geo-location/governorates"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-geo-location-governorates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/geo-location/governorates</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-geo-location-governorates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-geo-location-governorates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>country_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="country_id"                data-endpoint="GETapi-v1-dashboard-geo-location-governorates"
               value="2"
               data-component="query">
    <br>
<p>Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-dashboard-geo-location-governorates"
               value="الضفة الغربية"
               data-component="query">
    <br>
<p>Example: <code>الضفة الغربية</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-v1-dashboard-geo-location-governorates"
               value="15"
               data-component="query">
    <br>
<p>Example: <code>15</code></p>
            </div>
                </form>

                                <h2 id="geo-location-cities">Cities</h2>
                                                    <h2 id="geo-location-GETapi-v1-dashboard-geo-location-cities">Get Cities</h2>

<p>
</p>

<p>This endpoint allows you to get all cities.</p>

<span id="example-requests-GETapi-v1-dashboard-geo-location-cities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/geo-location/cities?country_id=2&amp;governorate_id=2&amp;search=%D8%A7%D9%84%D8%B6%D9%81%D8%A9+%D8%A7%D9%84%D8%BA%D8%B1%D8%A8%D9%8A%D8%A9&amp;limit=15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/geo-location/cities"
);

const params = {
    "country_id": "2",
    "governorate_id": "2",
    "search": "الضفة الغربية",
    "limit": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/geo-location/cities';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'country_id' =&gt; '2',
            'governorate_id' =&gt; '2',
            'search' =&gt; 'الضفة الغربية',
            'limit' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/geo-location/cities'
params = {
  'country_id': '2',
  'governorate_id': '2',
  'search': 'الضفة الغربية',
  'limit': '15',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-geo-location-cities">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 4592,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;name&quot;: &quot;مدينة الخليل&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;القيمة المحددة لهذا الحقل غير موجودة. و 3 أخطاء أخرى&quot;,
    &quot;errors&quot;: {
        &quot;country_id&quot;: [
            &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;
        ],
        &quot;governorate_id&quot;: [
            &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;
        ],
        &quot;limit&quot;: [
            &quot;يجب على هذا الحقل أن يكون رقمًا.&quot;,
            &quot;يجب أن تكون قيمة هذا الحقل مساوية أو أكبر من 10.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-geo-location-cities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-geo-location-cities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-geo-location-cities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-geo-location-cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-geo-location-cities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-geo-location-cities" data-method="GET"
      data-path="api/v1/dashboard/geo-location/cities"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-geo-location-cities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/geo-location/cities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-geo-location-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-geo-location-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>country_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="country_id"                data-endpoint="GETapi-v1-dashboard-geo-location-cities"
               value="2"
               data-component="query">
    <br>
<p>Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>governorate_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="governorate_id"                data-endpoint="GETapi-v1-dashboard-geo-location-cities"
               value="2"
               data-component="query">
    <br>
<p>Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-dashboard-geo-location-cities"
               value="الضفة الغربية"
               data-component="query">
    <br>
<p>Example: <code>الضفة الغربية</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-v1-dashboard-geo-location-cities"
               value="15"
               data-component="query">
    <br>
<p>Example: <code>15</code></p>
            </div>
                </form>

                                <h2 id="geo-location-districts">Districts</h2>
                                                    <h2 id="geo-location-GETapi-v1-dashboard-geo-location-districts">Get Districts</h2>

<p>
</p>

<p>This endpoint allows you to get all district.</p>

<span id="example-requests-GETapi-v1-dashboard-geo-location-districts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/dashboard/geo-location/districts?country_id=2&amp;governorate_id=2&amp;city_id=2&amp;search=%D8%A7%D9%84%D8%B6%D9%81%D8%A9+%D8%A7%D9%84%D8%BA%D8%B1%D8%A8%D9%8A%D8%A9&amp;limit=15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/dashboard/geo-location/districts"
);

const params = {
    "country_id": "2",
    "governorate_id": "2",
    "city_id": "2",
    "search": "الضفة الغربية",
    "limit": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/dashboard/geo-location/districts';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'country_id' =&gt; '2',
            'governorate_id' =&gt; '2',
            'city_id' =&gt; '2',
            'search' =&gt; 'الضفة الغربية',
            'limit' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/dashboard/geo-location/districts'
params = {
  'country_id': '2',
  'governorate_id': '2',
  'city_id': '2',
  'search': 'الضفة الغربية',
  'limit': '15',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-dashboard-geo-location-districts">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 3792,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;دوار ابن رشد&quot;
        },
        {
            &quot;id&quot;: 4057,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;نوبا&quot;
        },
        {
            &quot;id&quot;: 4058,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;بيت اولا&quot;
        },
        {
            &quot;id&quot;: 4059,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;سعير&quot;
        },
        {
            &quot;id&quot;: 4060,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;الشيوخ&quot;
        },
        {
            &quot;id&quot;: 4061,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;ترقومية&quot;
        },
        {
            &quot;id&quot;: 4062,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;بيت كاحل&quot;
        },
        {
            &quot;id&quot;: 4063,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;بيت عنون&quot;
        },
        {
            &quot;id&quot;: 4064,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;اذنا&quot;
        },
        {
            &quot;id&quot;: 4065,
            &quot;country_id&quot;: 55,
            &quot;governorate_id&quot;: 24,
            &quot;city_id&quot;: 4592,
            &quot;name&quot;: &quot;تفوح&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation Errors):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;القيمة المحددة لهذا الحقل غير موجودة. و 4 أخطاء أخرى&quot;,
    &quot;errors&quot;: {
        &quot;country_id&quot;: [
            &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;
        ],
        &quot;governorate_id&quot;: [
            &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;
        ],
        &quot;city_id&quot;: [
            &quot;القيمة المحددة لهذا الحقل غير موجودة.&quot;
        ],
        &quot;limit&quot;: [
            &quot;يجب على هذا الحقل أن يكون رقمًا.&quot;,
            &quot;يجب أن تكون قيمة هذا الحقل مساوية أو أكبر من 10.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500, Server Error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-dashboard-geo-location-districts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-dashboard-geo-location-districts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-dashboard-geo-location-districts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-dashboard-geo-location-districts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-dashboard-geo-location-districts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-dashboard-geo-location-districts" data-method="GET"
      data-path="api/v1/dashboard/geo-location/districts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-dashboard-geo-location-districts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/dashboard/geo-location/districts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-dashboard-geo-location-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-dashboard-geo-location-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>country_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="country_id"                data-endpoint="GETapi-v1-dashboard-geo-location-districts"
               value="2"
               data-component="query">
    <br>
<p>Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>governorate_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="governorate_id"                data-endpoint="GETapi-v1-dashboard-geo-location-districts"
               value="2"
               data-component="query">
    <br>
<p>Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="city_id"                data-endpoint="GETapi-v1-dashboard-geo-location-districts"
               value="2"
               data-component="query">
    <br>
<p>Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-v1-dashboard-geo-location-districts"
               value="الضفة الغربية"
               data-component="query">
    <br>
<p>Example: <code>الضفة الغربية</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-v1-dashboard-geo-location-districts"
               value="15"
               data-component="query">
    <br>
<p>Example: <code>15</code></p>
            </div>
                </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                                                        <button type="button" class="lang-button" data-language-name="python">python</button>
                            </div>
            </div>
</div>
</body>
</html>
