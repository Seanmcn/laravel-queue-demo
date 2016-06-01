<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Customer;
use App\Service;

class CustomerController extends Controller
{
    function index() {

        return view('dashboard', [
            'customers' => Customer::get(),
            'services' => Service::get()
        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function store(Request $request)
    {
        $customerType = !empty($request->input('customer_type_store')) ? $request->input('customer_type_store') : FALSE;
        $acceptedTypes = ['citizen', 'organisation', 'anonymous'];
        $name = 'Anonymous';

        // Make sure customer type is an accepted type
        if (!in_array($customerType, $acceptedTypes)) {
            // Note: Not bothering with an error here as this would only happen maliciously.
            return redirect('/')->withInput();
        }

        // Setup validation rules array
        $rules = [
            'customer_service' => 'required',
        ];


        // Create validation rules for different types and set a name variable
        switch ($customerType) {
            case "citizen":
                $rules['citizen_title'] = 'required';
                $rules['citizen_first_name'] = 'required|max:55';
                $rules['citizen_last_name'] = 'required|max:200';
                $name = $request->input('citizen_title') . " " . $request->input('citizen_first_name') . " " . $request->input('citizen_last_name');
                break;

            case "organisation":
                $rules['organisation_name'] = 'required|max:255';
                $name = $request->input('organisation_name');
                break;
        }

        $messages = [
            'customer_service.required' => 'Selecting a service is required!',
            'citizen_title.required' => 'Selecting a title is required!',
            'citizen_first_name.required' => 'Providing a first name for a citizen is required!',
            'citizen_first_name.max' => 'First name cannot be more than :max characters!',
            'citizen_last_name.required' => 'Providing a last name for a citizen is required!',
            'citizen_last_name.max' => 'Last name cannot be more than :max characters!',
            'organisation_name.required' => 'Proving a name for an organisation is required!',
            'organisation_name.max' => 'Last name cannot be more than :max characters!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Crate the customer

        $customer = new Customer;
        $customer->name = $name;
        $customer->service_id = (int) $request->input('customer_service');
        $customer->type = $request->input('customer_type_store');
        $customer->save();


        return redirect('/');
    }
}
