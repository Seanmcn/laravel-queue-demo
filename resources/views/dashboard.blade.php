<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>New Customer</h2>
                </div>
                <div class="panel-body">


                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Customer Form -->
                    <form action="{{ url('customer') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="queue-service" class="control-label">Services</label>
                            @if (count($services) > 0)
                                @foreach ($services as $key => $service)
                                    <div class="radio">
                                        <label>
                                            @if ($key == 0)
                                                <input type="radio" name="customer_service" value="{{ $service->id }}"
                                                       checked="checked">
                                            @else
                                                <input type="radio" name="customer_service" value="{{ $service->id }}">
                                            @endif
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-danger" role="alert">
                                    There are no services available, please seed the database.
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary customer-type active" id="btn_citizen">
                                Citizen
                            </button>
                            <button type="button" class="btn btn-primary customer-type" id="btn_organisation">
                                Organisation
                            </button>
                            <button type="button" class="btn btn-primary customer-type" id="btn_anonymous">Anonymous
                            </button>
                        </div>

                        <div class="customer-form" id="citizen-form">
                            <div class="form-group">
                                <label for="citizen_title">
                                    Title
                                </label>
                                <select name="citizen_title" id="citizen_title" class="form-control">
                                    <option>Mr.</option>
                                    <option>Mrs</option>
                                    <option>Ms</option>
                                    <option>Miss</option>
                                    <option>Master</option>
                                    <option>Madam</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="citizen_first_name">First Name</label>
                                <input type="text" id="citizen_first_name" name="citizen_first_name"
                                       placeholder="First Name"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="citizen_last_name">Last Name</label>
                                <input type="text" id="citizen_last_name" name="citizen_last_name"
                                       placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="customer-form" id="organisation-form">
                            <div class="form-group">
                                <label for="organisation_name">Name</label>
                                <input type="text" id="organisation_name" name="organisation_name" placeholder="Name"
                                       class="form-control">
                            </div>
                        </div>

                        <input type="hidden" id="customer-type-store" name="customer_type_store" value="citizen">

                        <!-- Add Customer Button -->
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Current Customers -->
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Queue</h2>
                </div>

                <div class="panel-body">
                    @if (count($customers) > 0)
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Queued At</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        {{ $customer->id }}
                                    </td>
                                    <td>
                                        {{ ucfirst($customer->type) }}
                                    </td>
                                    <td>
                                        {{ $customer->name }}

                                    </td>
                                    <td>
                                        {{ $customer->service->name }}
                                    </td>
                                    <td>
                                        {{ date('H:i', strtotime($customer->created_at)) }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        There are currently no customers in the queue, perhaps add some?
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection