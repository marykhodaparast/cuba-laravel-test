@extends('layouts.simple.master')

@section('title', 'Wescosa Dashboard')

@section('main_content')
    <!-- Table -->
    <div class="table-responsive table-wrapper mt-5 " style="overflow-x: auto; white-space: nowrap; max-width: 100%;">
        <table class="table table-hover table-borderless sticky-table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>PO NUMBER</th>
                    <th>PRODUCT NAME</th>
                    <th>CUSTOMER</th>
                    <th>REQUEST DATE</th>
                    <th>ETD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><a href="/orders/single_order/1/" class=""
                            style="text-decoration: none;color: black;">PO-1001</a></td>
                    <td>
                        DB Single Phase
                    </td>
                    <td>test</td>
                    <td>Jul. 3, 2025</td>
                    <td>Jul. 25, 2025</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td><a href="/orders/single_order/2/" class=""
                            style="text-decoration: none;color: black;">PO-1002</a></td>
                    <td>
                        Aluminum Busbar 200A
                    </td>
                    <td>test2</td>
                    <td>Jul. 3, 2025</td>
                    <td>Jul. 18, 2025</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td><a href="/orders/single_order/3/" class=""
                            style="text-decoration: none;color: black;">PO-1003</a></td>
                    <td>
                        Energy Meter
                    </td>
                    <td>test</td>
                    <td>Jul. 3, 2025</td>
                    <td>Jul. 18, 2025</td>
                </tr>

                <tr>
                    <td>4</td>
                    <td><a href="/orders/single_order/4/" class=""
                            style="text-decoration: none;color: black;">PO-1004</a></td>
                    <td>
                        Starter Panel
                    </td>
                    <td>tset23</td>
                    <td>Jul. 3, 2025</td>
                    <td>Jul. 17, 2025</td>
                </tr>


            </tbody>
        </table>
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
