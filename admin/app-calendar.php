<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Fullcalendar - Apps</title>
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
    <link rel="stylesheet" href="assets/vendor/libs/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="assets/vendor/css/pages/app-calendar.css" />
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


                        <div class="card app-calendar-wrapper">
                            <div class="row g-0">
                                <!-- Calendar Sidebar -->
                                <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                                    <div class="border-bottom p-4 my-sm-0 mb-3">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-toggle-sidebar"
                                                data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar"
                                                aria-controls="addEventSidebar">
                                                <i class="bx bx-plus"></i>
                                                <span class="align-middle">Add Event</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <!-- inline calendar (flatpicker) -->
                                        <div class="ms-n2">
                                            <div class="inline-calendar"></div>
                                        </div>

                                        <hr class="container-m-nx my-4">

                                        <!-- Filter -->
                                        <div class="mb-4">
                                            <small
                                                class="text-small text-muted text-uppercase align-middle">Filter</small>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input class="form-check-input select-all" type="checkbox" id="selectAll"
                                                data-value="all" checked>
                                            <label class="form-check-label" for="selectAll">View All</label>
                                        </div>

                                        <div class="app-calendar-events-filter">
                                            <div class="form-check form-check-danger mb-2">
                                                <input class="form-check-input input-filter" type="checkbox"
                                                    id="select-personal" data-value="personal" checked>
                                                <label class="form-check-label" for="select-personal">Personal</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input input-filter" type="checkbox"
                                                    id="select-business" data-value="business" checked>
                                                <label class="form-check-label" for="select-business">Business</label>
                                            </div>
                                            <div class="form-check form-check-warning mb-2">
                                                <input class="form-check-input input-filter" type="checkbox"
                                                    id="select-family" data-value="family" checked>
                                                <label class="form-check-label" for="select-family">Family</label>
                                            </div>
                                            <div class="form-check form-check-success mb-2">
                                                <input class="form-check-input input-filter" type="checkbox"
                                                    id="select-holiday" data-value="holiday" checked>
                                                <label class="form-check-label" for="select-holiday">Holiday</label>
                                            </div>
                                            <div class="form-check form-check-info">
                                                <input class="form-check-input input-filter" type="checkbox"
                                                    id="select-etc" data-value="etc" checked>
                                                <label class="form-check-label" for="select-etc">ETC</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Calendar Sidebar -->

                                <!-- Calendar & Modal -->
                                <div class="col app-calendar-content">
                                    <div class="card shadow-none border-0">
                                        <div class="card-body pb-0">
                                            <!-- FullCalendar -->
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                    <div class="app-overlay"></div>
                                    <!-- FullCalendar Offcanvas -->
                                    <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1"
                                        id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                                        <div class="offcanvas-header border-bottom">
                                            <h6 class="offcanvas-title" id="addEventSidebarLabel">Add Event</h6>
                                            <button type="button" class="btn-close text-reset"
                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                                                <div class="mb-3">
                                                    <label class="form-label" for="eventTitle">Title</label>
                                                    <input type="text" class="form-control" id="eventTitle"
                                                        name="eventTitle" placeholder="Event Title" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="eventLabel">Label</label>
                                                    <select class="select2 select-event-label form-select"
                                                        id="eventLabel" name="eventLabel">
                                                        <option data-label="primary" value="Business" selected>Business
                                                        </option>
                                                        <option data-label="danger" value="Personal">Personal</option>
                                                        <option data-label="warning" value="Family">Family</option>
                                                        <option data-label="success" value="Holiday">Holiday</option>
                                                        <option data-label="info" value="ETC">ETC</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="eventStartDate">Start Date</label>
                                                    <input type="text" class="form-control" id="eventStartDate"
                                                        name="eventStartDate" placeholder="Start Date" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="eventEndDate">End Date</label>
                                                    <input type="text" class="form-control" id="eventEndDate"
                                                        name="eventEndDate" placeholder="End Date" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="switch">
                                                        <input type="checkbox" class="switch-input allDay-switch" />
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-on"></span>
                                                            <span class="switch-off"></span>
                                                        </span>
                                                        <span class="switch-label">All Day</span>
                                                    </label>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="eventURL">Event URL</label>
                                                    <input type="url" class="form-control" id="eventURL" name="eventURL"
                                                        placeholder="https://www.google.com/" />
                                                </div>
                                                <div class="mb-3 select2-primary">
                                                    <label class="form-label" for="eventGuests">Add Guests</label>
                                                    <select class="select2 select-event-guests form-select"
                                                        id="eventGuests" name="eventGuests" multiple>
                                                        <option data-avatar="1.png" value="Jane Foster">Jane Foster
                                                        </option>
                                                        <option data-avatar="3.png" value="Donna Frank">Donna Frank
                                                        </option>
                                                        <option data-avatar="5.png" value="Gabrielle Robertson">
                                                            Gabrielle Robertson</option>
                                                        <option data-avatar="7.png" value="Lori Spears">Lori Spears
                                                        </option>
                                                        <option data-avatar="9.png" value="Sandy Vega">Sandy Vega
                                                        </option>
                                                        <option data-avatar="11.png" value="Cheryl May">Cheryl May
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="eventLocation">Location</label>
                                                    <input type="text" class="form-control" id="eventLocation"
                                                        name="eventLocation" placeholder="Enter Location" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="eventDescription">Description</label>
                                                    <textarea class="form-control" name="eventDescription"
                                                        id="eventDescription"></textarea>
                                                </div>
                                                <div
                                                    class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                                                    <div>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-update-event d-none me-sm-3 me-1">Update</button>
                                                        <button type="reset"
                                                            class="btn btn-label-secondary btn-cancel me-sm-0 me-1"
                                                            data-bs-dismiss="offcanvas">Cancel</button>
                                                    </div>
                                                    <div><button
                                                            class="btn btn-label-danger btn-delete-event d-none">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Calendar & Modal -->
                            </div>
                        </div>


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
        <a href="" class="btn btn-danger btn-buy-now">Buy Now</a>
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
    <script src="assets/vendor/libs/fullcalendar/fullcalendar.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="assets/vendor/libs/moment/moment.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/app-calendar-events.js"></script>
    <script src="assets/js/app-calendar.js"></script>
</body>

</html>