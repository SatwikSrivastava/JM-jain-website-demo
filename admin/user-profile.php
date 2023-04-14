<?php 
    session_start();
    include "config.php";
    if(!isset($_SESSION["username"])){
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>User Profile - Profile </title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">

    <!-- Page CSS -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-profile.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/vendor/js/template-customizer.js"></script>
    <script src="assets/js/config.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <!-- Menu -->

            <?php

              include ('left-menu.php');

            ?>

            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->

                <?php
        
                  include ('nav-bar.php');

                ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="py-3 breadcrumb-wrapper mb-4">
                            <span class="text-muted fw-light">User Profile /</span> Profile
                        </h4>


                        <!-- Header -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="user-profile-header-banner">
                                        <img src="assets/img/pages/profile-banner.png" alt="Banner image"
                                            class="rounded-top">
                                    </div>
                                    <div
                                        class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                            <img src="assets/img/avatars/1.png" alt="user image"
                                                class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img">
                                        </div>
                                        <div class="flex-grow-1 mt-3 mt-sm-5">
                                            <div
                                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                                <div class="user-profile-info">
                                                    <h4>John Doe</h4>
                                                    <ul
                                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                                        <li class="list-inline-item fw-semibold">
                                                            <i class='bx bx-pen'></i> UX Designer
                                                        </li>
                                                        <li class="list-inline-item fw-semibold">
                                                            <i class='bx bx-map'></i> Vatican City
                                                        </li>
                                                        <li class="list-inline-item fw-semibold">
                                                            <i class='bx bx-calendar-alt'></i> Joined April 2021
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-primary text-nowrap">
                                                    <i class='bx bx-user-check'></i> Connected
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Header -->

                        <!-- Navbar pills -->
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                                class='bx bx-user'></i>
                                            Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages-profile-teams.html"><i
                                                class='bx bx-group'></i>
                                            Teams</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages-profile-projects.html"><i
                                                class='bx bx-grid-alt'></i> Projects</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i
                                                class='bx bx-link-alt'></i> Connections</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ Navbar pills -->

                        <!-- User Profile Content -->
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-5">
                                <!-- About User -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <small class="text-muted text-uppercase">About</small>
                                        <ul class="list-unstyled mb-4 mt-3">
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                                    class="fw-semibold mx-2">Full Name:</span> <span>John Doe</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                                    class="fw-semibold mx-2">Status:</span> <span>Active</span></li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                                    class="fw-semibold mx-2">Role:</span> <span>Developer</span></li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                                    class="fw-semibold mx-2">Country:</span> <span>USA</span></li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span
                                                    class="fw-semibold mx-2">Languages:</span> <span>English</span></li>
                                        </ul>
                                        <small class="text-muted text-uppercase">Contacts</small>
                                        <ul class="list-unstyled mb-4 mt-3">
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                                    class="fw-semibold mx-2">Contact:</span> <span>(123) 456-7890</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span
                                                    class="fw-semibold mx-2">Skype:</span> <span>john.doe</span></li>
                                            <li class="d-flex align-items-center mb-3"><i
                                                    class="bx bx-envelope"></i><span
                                                    class="fw-semibold mx-2">Email:</span>
                                                <span>john.doe@example.com</span></li>
                                        </ul>
                                        <small class="text-muted text-uppercase">Teams</small>
                                        <ul class="list-unstyled mt-3 mb-0">
                                            <li class="d-flex align-items-center mb-3"><i
                                                    class="bx bxl-github text-primary me-2"></i>
                                                <div class="d-flex flex-wrap"><span class="fw-semibold me-2">Backend
                                                        Developer</span><span>(126
                                                        Members)</span></div>
                                            </li>
                                            <li class="d-flex align-items-center"><i
                                                    class="bx bxl-react text-info me-2"></i>
                                                <div class="d-flex flex-wrap"><span class="fw-semibold me-2">React
                                                        Developer</span><span>(98
                                                        Members)</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ About User -->
                                <!-- Profile Overview -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <small class="text-muted text-uppercase">Overview</small>
                                        <ul class="list-unstyled mt-3 mb-0">
                                            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                                    class="fw-semibold mx-2">Task Compiled:</span> <span>13.5k</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i
                                                    class='bx bx-customize'></i><span class="fw-semibold mx-2">Projects
                                                    Compiled:</span> <span>146</span></li>
                                            <li class="d-flex align-items-center"><i class="bx bx-user"></i><span
                                                    class="fw-semibold mx-2">Connections:</span> <span>897</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ Profile Overview -->
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-7">
                                <!-- Activity Timeline -->
                                <div class="card card-action mb-4">
                                    <div class="card-header align-items-center">
                                        <h5 class="card-action-title mb-0"><i
                                                class='bx bx-list-ul bx-sm me-2'></i>Activity Timeline</h5>
                                        <div class="card-action-element btn-pinned">
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Share
                                                            timeline</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Suggest
                                                            edits</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Report
                                                            bug</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="timeline ms-2">
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-warning"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Client Meeting</h6>
                                                        <small class="text-muted">Today</small>
                                                    </div>
                                                    <p class="mb-2">Project meeting with john @10:15am</p>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="avatar me-3">
                                                            <img src="assets/img/avatars/3.png" alt="Avatar"
                                                                class="rounded-circle" />
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Lester McCarthy (Client)</h6>
                                                            <span>CEO of Infibeam</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-info"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Create a new project for client</h6>
                                                        <small class="text-muted">2 Day Ago</small>
                                                    </div>
                                                    <p class="mb-0">Add files to new design folder</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-primary"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Shared 2 New Project Files</h6>
                                                        <small class="text-muted">6 Day Ago</small>
                                                    </div>
                                                    <p class="mb-2">Sent by Mollie Dixon <img
                                                            src="assets/img/avatars/4.png" class="rounded-circle ms-3"
                                                            alt="avatar" height="20" width="20"></p>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <a href="javascript:void(0)" class="me-3">
                                                            <img src="assets/img/icons/misc/pdf.png"
                                                                alt="Document image" width="20" class="me-2">
                                                            <span class="h6">App Guidelines</span>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/img/icons/misc/doc.png" alt="Excel image"
                                                                width="20" class="me-2">
                                                            <span class="h6">Testing Results</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-success"></span>
                                                <div class="timeline-event pb-0">
                                                    <div class="timeline-header mb-1">
                                                        <h6 class="mb-0">Project status updated</h6>
                                                        <small class="text-muted">10 Day Ago</small>
                                                    </div>
                                                    <p class="mb-0">Woocommerce iOS App Completed</p>
                                                </div>
                                            </li>
                                            <li class="timeline-end-indicator">
                                                <i class="bx bx-check-circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ Activity Timeline -->
                                <div class="row">
                                    <!-- Connections -->
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="card card-action mb-4">
                                            <div class="card-header align-items-center">
                                                <h5 class="card-action-title mb-0">Connections</h5>
                                                <div class="card-action-element btn-pinned">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="bx bx-dots-vertical-rounded"></i></button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Share connections</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Suggest edits</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Report bug</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/avatars/2.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Cecilia Payne</h6>
                                                                    <small class="text-muted">45 Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/avatars/3.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Curtis Fletcher</h6>
                                                                    <small class="text-muted">1.32k Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button class="btn btn-primary p-1 btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/avatars/10.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Alice Stone</h6>
                                                                    <small class="text-muted">125 Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button class="btn btn-primary p-1 btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/avatars/7.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Darrell Barnes</h6>
                                                                    <small class="text-muted">456 Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/avatars/12.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Eugenia Moore</h6>
                                                                    <small class="text-muted">1.2k Connections</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <button class="btn btn-label-primary p-1 btn-sm"><i
                                                                        class="bx bx-user"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="text-center">
                                                        <a href="javascript:;">View all connections</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Connections -->
                                    <!-- Teams -->
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="card card-action mb-4">
                                            <div class="card-header align-items-center">
                                                <h5 class="card-action-title mb-0">Teams</h5>
                                                <div class="card-action-element btn-pinned">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="bx bx-dots-vertical-rounded"></i></button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Share teams</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Suggest edits</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="javascript:void(0);">Report bug</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/icons/brands/react-label.png"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">React Developers</h6>
                                                                    <small class="text-muted">72 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-danger">Developer</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/icons/brands/support-label.png"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Support Team</h6>
                                                                    <small class="text-muted">122 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-primary">Support</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/icons/brands/figma-label.png"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">UI Designers</h6>
                                                                    <small class="text-muted">7 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-info">Designer</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/icons/brands/vue-label.png"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Vue.js Developers</h6>
                                                                    <small class="text-muted">289 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-danger">Developer</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-start">
                                                                <div class="avatar me-3">
                                                                    <img src="assets/img/icons/brands/twitter-label.png"
                                                                        alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div class="me-w">
                                                                    <h6 class="mb-0">Digital Marketing</h6>
                                                                    <small class="text-muted">24 Members</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:;"><span
                                                                        class="badge bg-label-secondary">Marketing</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="text-center">
                                                        <a href="javascript:;">View all teams</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Teams -->
                                </div>
                                <!-- Projects table -->
                                <div class="card">
                                    <div class="card-datatable table-responsive">
                                        <table class="datatables-projects border-top table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Leader</th>
                                                    <th>Team</th>
                                                    <th class="w-px-200">Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!--/ Projects table -->
                            </div>
                        </div>
                        <!--/ User Profile Content -->


                    </div>
                    <!-- / Content -->




                    <!-- Footer -->
                    
                    <?php

                        include ('footer.php');

                    ?>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->


    <div class="buy-now">
        <a href=""  class="btn btn-danger btn-buy-now">Chat Now</a>
    </div>




    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/libs/hammer/hammer.js"></script>


    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/pages-profile.js"></script>
</body>

</html>