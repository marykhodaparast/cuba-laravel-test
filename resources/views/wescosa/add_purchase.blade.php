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

        
    </style>
@endsection

@section('main_content')
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
                <form class="form" method="post" action="/orders/add_purchase/" id="purchaseForm"
                    onsubmit="return validateAddPurchaseForm();">
                    <input type="hidden" name="csrfmiddlewaretoken"
                        value="CmxiCAIS6FJmDkyqN4rrwDygMW6u5ZiCvihNbBkyfmGiPVMSpxKVEtP98sSJhcHy">

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
@endsection
