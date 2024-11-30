<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DobLatestAction;
use DataTables;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page and handle AJAX requests for data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return $this->getDatatableResponse();
        }

        // Return the welcome view if not an AJAX request
        return view('pages.tables.index');
    }

    /**
     * Get the data for the Datatable in JSON format.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function getDatatableResponse()
    {
        // Fetch the required data with pagination (if needed) or other customizations
        $data = DobLatestAction::select('Job_', 'Borough', 'Street_Name', 'Job_Type', 'Latest_Action_Date')
                               ->latest();

        // Create a Datatable from the Eloquent query
        $table = Datatables::eloquent($data);
        
        // Add an index column
        $table->addIndexColumn();

        // Return the response as JSON
        return $table->make(true);
    }
}
