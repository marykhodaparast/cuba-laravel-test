@extends('layouts.simple.master')

@section('title', 'Wescosa Dashboard')

@section('css')
    <style>
        .divider {
            height: 1px;
            background-color: black;
            flex: 1;
        }

        .or-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 30px 0;
        }

        /* Add internal padding inside card body */
        .card-body {
            padding: 1.5rem;
            /* increase if needed */
        }

        /* Spacing between form groups */
        .form-group {
            margin-bottom: 1.2rem;
        }

        /* Button area spacing */
        .buttons {
            padding-top: 1rem;
            padding-bottom: 2rem;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        /* Optional: make buttons consistent size */
        .buttons .btn {
            min-width: 120px;
        }

        /* Responsive spacing on smaller screens */
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }
        }

        .error-msg {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
            margin-left: 3px;
        }

        .toast{
            display: none !important;
        }
    </style>
@endsection

@section('main_content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="text-center d-flex justify-content-center align-items-center mt-5">
                    <div class="me-5">Upload Bulk Purchase Orders</div>
                    <div><input class="form-control" id="formFile" type="file" required></div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="or-container">
                    <div class="divider"></div>
                    <span>OR</span>
                    <div class="divider"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="row">
                <form class="form" method="post" action="{{ route('admin.orders_add_purchase.store') }}"
                    id="purchaseForm" onsubmit="return validateAddPurchaseForm();">
                    @csrf

                    <div class="row">
                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Job Number</label>
                                                            <input type="text" id="job_number" class="form-control"
                                                                placeholder="Job Number" name="job_number">
                                                            <p class="error-msg" id="error-msgjob"></p>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="product-select">Product</label>
                                                            <select id="product-select" class="form-control"
                                                                name="product_name" id="product_name" required>
                                                                <option value="">-- Select Product --</option>
                                                                <option value="1">MS100 Main Switch</option>

                                                                <option value="2">MS250 Main Switch</option>

                                                                <option value="3">TB125 Tie Breaker</option>

                                                                <option value="4">TB160 Tie Breaker</option>

                                                                <option value="5">DB Single Phase</option>

                                                                <option value="6">DB Three Phase</option>

                                                                <option value="7">Starter Panel</option>

                                                                <option value="8">PLC Control Panel</option>

                                                                <option value="9">Copper Busbar 100A</option>

                                                                <option value="10">Aluminum Busbar 200A</option>

                                                                <option value="11">Relay 230V</option>

                                                                <option value="12">Contactor 40A</option>

                                                                <option value="13">Cable Lug</option>

                                                                <option value="14">PVC Trunking</option>

                                                                <option value="15">1kVA Transformer</option>

                                                                <option value="16">5kVA Transformer</option>

                                                                <option value="17">MCB 10A</option>

                                                                <option value="18">RCCB 63A</option>

                                                                <option value="19">Digital Voltmeter</option>

                                                                <option value="20">Energy Meter</option>


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">Project Name</label>
                                                            <input type="text" id="project_name" class="form-control"
                                                                placeholder="Project Name" name="project_name">
                                                        </div>
                                                        <p class="error-msg" id="error-msgproject"></p>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Customer</label>
                                                            <input type="text" id="customer" class="form-control"
                                                                name="customer" placeholder="Customer">
                                                            <p class="error-msg" id="error-msgcustomer"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">No. of Structures</label>
                                                            <input type="number" min="0" max="9999"
                                                                id="no_of_structures" class="form-control"
                                                                name="no_of_structures" placeholder="No. of Structures">
                                                            <p class="error-msg" id="error-msgstructures"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">No. of Workers</label>
                                                            <input type="number" min="0" max="9999"
                                                                id="no_of_workers" class="form-control"
                                                                placeholder="No. of Workers" name="no_of_workers">
                                                            <p class="error-msg" id="error-msgworkers"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Feeders</label>
                                                            <input type="number" min="0" max="9999"
                                                                id="feeders" class="form-control" placeholder="Feeders"
                                                                name="feeders">
                                                            <p class="error-msg" id="error-msgfeeders"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">Main</label>
                                                            <input type="number" min="0" max="9999"
                                                                id="main" class="form-control" placeholder="Main"
                                                                name="main">
                                                            <p class="error-msg" id="error-msgmain"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Tie</label>
                                                            <input type="number" min="0" max="9999"
                                                                id="tie" class="form-control" name="tie"
                                                                placeholder="Tie">
                                                            <p class="error-msg" id="error-msgtie"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Request Date</label>
                                                            <input type="date" id="request_date" class="form-control"
                                                                name="request_date" placeholder="Request Date">
                                                            <p class="error-msg" id="error-msgrequestdate"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">Start Date</label>
                                                            <input type="date" id="start_date" class="form-control"
                                                                name="start_date" placeholder="Start Date">
                                                            <p class="error-msg" id="error-msgstartdate"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">End Date</label>
                                                            <input type="date" id="end_date" class="form-control"
                                                                name="end_date" placeholder="End Date">
                                                            <p class="error-msg" id="error-msgenddate"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">ETD</label>
                                                            <input type="date" id="etd" class="form-control"
                                                                name="etd" placeholder="ETD">
                                                            <p class="error-msg" id="error-msgetd"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">ATD</label>
                                                            <input type="date" id="atd" class="form-control"
                                                                name="atd" placeholder="ATD">
                                                            <p class="error-msg" id="error-msgatd"></p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="row">
                        <div class="ms-auto buttons">
                            <button type="submit" class="btn btn-primary">Add Purchase(s)</button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/clock.js') }}"></script>
    {{-- Apex Chart --}}
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/chart-custom-wescosa.js') }}"></script>
    {{-- End Apex Chart --}}
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.select.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/select.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>

    <script src="{{ asset('assets/js/common-chat.js') }}"></script>
    <script src="{{ asset('assets/js/emoji-js/custom-emoji.js') }}"></script>
    <script src="{{ asset('assets/js/emoji-js/custom-emojis.js') }}"></script>

    <script src="{{ asset('assets/js/icons/icons-notify.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon-clipart.js') }}"></script>
    <script>
        ValidateJobNumber = () => {
            const jobNumber = document.getElementById('job_number').value;
            const errorMsg = document.getElementById('error-msgjob');
            if (jobNumber.trim() === '') {
                errorMsg.textContent = 'Job Number is required.';
                return false;
            } else {
                errorMsg.textContent = '';
                return true;
            }
        };
        validateProjectName = () => {
            const projectName = document.getElementById('project_name').value;
            const errorMsg = document.getElementById('error-msgproject');
            if (projectName.trim() === '') {
                errorMsg.textContent = 'Project Name is required.';
                return false;
            } else {
                errorMsg.textContent = '';
                return true;
            }
        };
        validateCustomer = () => {
            const customer = document.getElementById('customer').value;
            const errorMsg = document.getElementById('error-msgcustomer');
            if (customer.trim() === '') {
                errorMsg.textContent = 'Customer is required.';
                return false;
            } else {
                errorMsg.textContent = '';
                return true;
            }
        };
        validateNoOfStructures = () => {
            const noOfStructuresInput = document.getElementById('no_of_structures');
            const value = noOfStructuresInput.value.trim();
            const errorMsg = document.getElementById('error-msgstructures');

            errorMsg.textContent = ''; // Clear previous error

            if (value === '') {
                errorMsg.textContent = 'No. of Structures is required. You can enter 0 if not applicable.';
                noOfStructuresInput.classList.add('is-invalid');
                return false;
            } else if (isNaN(value) || parseInt(value) < 0) {
                errorMsg.textContent = 'Negative numbers are not allowed.';
                noOfStructuresInput.classList.add('is-invalid');
                return false;
            } else if (parseInt(value) > 9999) {
                errorMsg.textContent = 'Please enter a value less than or equal to 9999.';
                noOfStructuresInput.classList.add('is-invalid');
                return false;
            }

            noOfStructuresInput.classList.remove('is-invalid');
            return true;
        };
        validateNoOfWorkers = () => {
            const noOfWorkersInput = document.getElementById('no_of_workers');
            const value = noOfWorkersInput.value.trim();
            const errorMsg = document.getElementById('error-msgworkers');
            errorMsg.textContent = ''; // Clear previous error
            if (value === '') {
                errorMsg.textContent = 'No. of Workers is required. You can enter 0 if not applicable.';
                noOfWorkersInput.classList.add('is-invalid');
                return false;
            } else if (isNaN(value) || parseInt(value) < 0) {
                errorMsg.textContent = 'Negative numbers are not allowed.';
                noOfWorkersInput.classList.add('is-invalid');
                return false;
            } else if (parseInt(value) > 9999) {
                errorMsg.textContent = 'Please enter a value less than or equal to 9999.';
                noOfWorkersInput.classList.add('is-invalid');
                return false;
            }
            noOfWorkersInput.classList.remove('is-invalid');
            return true;
        };
        validateFeeders = () => {
            const feedersInput = document.getElementById('feeders');
            const value = feedersInput.value.trim();
            const errorMsg = document.getElementById('error-msgfeeders');
            errorMsg.textContent = ''; // Clear previous error
            if (value === '') {
                errorMsg.textContent = 'Feeders is required. You can enter 0 if not applicable.';
                feedersInput.classList.add('is-invalid');
                return false;
            } else if (isNaN(value) || parseInt(value) < 0) {
                errorMsg.textContent = 'Negative numbers are not allowed.';
                feedersInput.classList.add('is-invalid');
                return false;
            } else if (parseInt(value) > 9999) {
                errorMsg.textContent = 'Please enter a value less than or equal to 9999.';
                feedersInput.classList.add('is-invalid');
                return false;
            }
            feedersInput.classList.remove('is-invalid');
            return true;
        };
        validateMain = () => {
            const mainInput = document.getElementById('main');
            const value = mainInput.value.trim();
            const errorMsg = document.getElementById('error-msgmain');
            errorMsg.textContent = ''; // Clear previous error
            if (value === '') {
                errorMsg.textContent = 'Main is required. You can enter 0 if not applicable.';
                mainInput.classList.add('is-invalid');
                return false;
            } else if (isNaN(value) || parseInt(value) < 0) {
                errorMsg.textContent = 'Negative numbers are not allowed.';
                mainInput.classList.add('is-invalid');
                return false;
            } else if (parseInt(value) > 9999) {
                errorMsg.textContent = 'Please enter a value less than or equal to 9999.';
                mainInput.classList.add('is-invalid');
                return false;
            }
            mainInput.classList.remove('is-invalid');
            return true;
        };
        validateTie = () => {
            const tieInput = document.getElementById('tie');
            const value = tieInput.value.trim();
            const errorMsg = document.getElementById('error-msgtie');
            errorMsg.textContent = ''; // Clear previous error
            if (value === '') {
                errorMsg.textContent = 'Tie is required. You can enter 0 if not applicable.';
                tieInput.classList.add('is-invalid');
                return false;
            } else if (isNaN(value) || parseInt(value) < 0) {
                errorMsg.textContent = 'Negative numbers are not allowed.';
                tieInput.classList.add('is-invalid');
                return false;
            } else if (parseInt(value) > 9999) {
                errorMsg.textContent = 'Please enter a value less than or equal to 9999.';
                tieInput.classList.add('is-invalid');
                return false;
            }
            tieInput.classList.remove('is-invalid');
            return true;
        };
        validateRequestDate = () => {
            const requestDateInput = document.getElementById('request_date');
            const requestDate = new Date(requestDateInput.value);
            const today = new Date();
            const errorMsg = document.getElementById('error-msgrequestdate');
            errorMsg.textContent = ''; // Clear previous error
            if (requestDateInput.value === '') {
                errorMsg.textContent = 'Request Date is required.';
                requestDateInput.classList.add('is-invalid');
                return false;
            }
            // else if (requestDate < today) {
            //     errorMsg.textContent = 'Request Date cannot be in the past.';
            //     requestDateInput.classList.add('is-invalid');
            //     return false;
            // }
            requestDateInput.classList.remove('is-invalid');
            return true;
        };
        validateStartDate = () => {
            const startDateInput = document.getElementById('start_date');
            const startDate = new Date(startDateInput.value);
            const requestDateInput = document.getElementById('request_date');
            const requestDate = new Date(requestDateInput.value);

            const errorMsg = document.getElementById('error-msgstartdate');
            errorMsg.textContent = ''; // Clear previous error

            if (startDateInput.value === '') {
                errorMsg.textContent = 'Start Date is required.';
                startDateInput.classList.add('is-invalid');
                return false;
            } else if (startDate < requestDate) {
                errorMsg.textContent = 'Start Date cannot be before Request Date.';
                startDateInput.classList.add('is-invalid');
                return false;
            }
            startDateInput.classList.remove('is-invalid');
            return true;
        };
        validateEndDate = () => {
            const endDateInput = document.getElementById('end_date');
            const endDate = new Date(endDateInput.value);
            const startDateInput = document.getElementById('start_date');
            const startDate = new Date(startDateInput.value);
            const errorMsg = document.getElementById('error-msgenddate');
            errorMsg.textContent = ''; // Clear previous error
            if (endDateInput.value === '') {
                // errorMsg.textContent = 'End Date is required.';
                // endDateInput.classList.add('is-invalid');
                return true;
            }
            if (endDateInput) {
                if (endDate < startDate) {
                    errorMsg.textContent = 'End Date cannot be before Start Date.';
                    endDateInput.classList.add('is-invalid');
                    return false;
                }
            }
            endDateInput.classList.remove('is-invalid');
            return true;
        }

        function validateETD() {
            const etdInput = document.getElementById('etd');
            const etd = new Date(etdInput.value);
            const startDateInput = document.getElementById('start_date');
            const startDate = new Date(startDateInput.value);
            const errorMsg = document.getElementById('error-msgetd');
            errorMsg.textContent = ''; // Clear previous error
            if (etdInput.value === '') {
                // errorMsg.textContent = 'ETD is required.';
                // etdInput.classList.add('is-invalid');
                return true;
            }
            if (etd < startDate) {
                errorMsg.textContent = 'ETD cannot be before Start Date.';
                etdInput.classList.add('is-invalid');
                return false;
            }
            etdInput.classList.remove('is-invalid');
            return true;
        }

        function validateATD() {
            const atdInput = document.getElementById('atd');
            const atd = new Date(atdInput.value);
            const startdateInput = document.getElementById('start_date');
            const start_date = new Date(startdateInput.value);
            const errorMsg = document.getElementById('error-msgatd');
            errorMsg.textContent = ''; // Clear previous error
            if (atdInput.value === '') {
                // errorMsg.textContent = 'ATD is required.';
                // atdInput.classList.add('is-invalid');
                return true;
            }
            if (atd < start_date) {
                errorMsg.textContent = 'ATD cannot be before Start Date.';
                atdInput.classList.add('is-invalid');
                return false;
            }
            atdInput.classList.remove('is-invalid');
            return true;
        }

        // Master validation function called on form submission
        function validateAddPurchaseForm() {
            let isValid = true;

            // Run all validations and update isValid
            isValid = ValidateJobNumber() && isValid; // Validate Job Number
            isValid = validateProjectName() && isValid; // Validate Project Name
            isValid = validateCustomer() && isValid; // Validate Customer
            isValid = validateNoOfStructures() && isValid; // Validate No. of Structures
            isValid = validateNoOfWorkers() && isValid; // Validate No. of Workers
            isValid = validateFeeders() && isValid; // Validate Feeders
            isValid = validateMain() && isValid; // Validate Main
            isValid = validateTie() && isValid; // Validate Tie
            isValid = validateRequestDate() && isValid; // Validate Request Date
            isValid = validateStartDate() && isValid; // Validate Start Date
            isValid = validateEndDate() && isValid; // Validate End Date
            isValid = validateETD() && isValid; // Validate ETD
            isValid = validateATD() && isValid; // Validate ATD
            return isValid; // Return the final validation result
        }

        //add event listener to the form submit event
        document.addEventListener('DOMContentLoaded', function() {
            const jobnumberInput = document.getElementById('job_number');
            const projectNameInput = document.getElementById('project_name');
            const customerInput = document.getElementById('customer');
            const noOfStructuresInput = document.getElementById('no_of_structures');
            const noOfWorkersInput = document.getElementById('no_of_workers');
            const feedersInput = document.getElementById('feeders');
            const mainInput = document.getElementById('main');
            const tieInput = document.getElementById('tie');
            const requestDateInputEl = document.getElementById('request_date');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const ETDInput = document.getElementById('etd');
            const ATDInput = document.getElementById('atd');

            //event listener for input change
            jobnumberInput.addEventListener('input', ValidateJobNumber);
            projectNameInput.addEventListener('input', validateProjectName);
            customerInput.addEventListener('input', validateCustomer);
            noOfStructuresInput.addEventListener('input', validateNoOfStructures);
            noOfWorkersInput.addEventListener('input', validateNoOfWorkers);
            feedersInput.addEventListener('input', validateFeeders);
            mainInput.addEventListener('input', validateMain);
            tieInput.addEventListener('input', validateTie);
            requestDateInputEl.addEventListener('input', validateRequestDate);
            startDateInput.addEventListener('input', validateStartDate);
            endDateInput.addEventListener('input', validateEndDate);
            ETDInput.addEventListener('input', validateETD);
            ATDInput.addEventListener('input', validateATD);

        });
    </script>
@endsection
