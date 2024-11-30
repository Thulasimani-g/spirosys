<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TopPermit;
use DataTables;

class ReportController extends Controller
{
    public function index(Request $req)
    {
        // Parse the date range
        list($from_date, $to_date) = $this->parseDateRange($req->reportrange);

        // Get the permits for the given date range
        $topPermits = $this->getTopPermits($from_date, $to_date);

        // Check if the request is an AJAX request for DataTables
        if ($req->ajax()) {
            return $this->getDatatablesResponse($topPermits);
        }

        // Return the view with the permits
        return view('pages.permit');
    }

    /**
     * Parse the date range from the request and return the formatted start and end dates.
     *
     * @param string|null $dateRange
     * @return array
     */
    private function parseDateRange($dateRange)
    {
        list($from_date, $to_date) = array_pad(explode('-', $dateRange, 2), 2, null);
        
        // Trim any extra spaces
        $from_date = trim($from_date);
        $to_date = trim($to_date);

        // Set default dates if not provided
        $from_date_value = $this->parseDate($from_date);
        $to_date_value = $this->parseDate($to_date);

        return [$from_date_value, $to_date_value];
    }

    /**
     * Parse a single date and return it in Y-m-d format or default to one year ago.
     *
     * @param string|null $date
     * @return string
     */
    private function parseDate($date)
    {
        if ($date) {
            return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        }

        
        return Carbon::now()->subYear()->format('Y-m-d');
    }

    /**
     * Retrieve the top permits filtered by the date range.
     *
     * @param string $from_date
     * @param string $to_date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getTopPermits($from_date, $to_date)
    {
        return TopPermit::select('Job_', 'Borough', 'Street_Name', 'Job_Type', 'Latest_Action_Date', 'Initial_Cost')
            ->whereBetween('Latest_Action_Date', [$from_date, $to_date])
            ->orderByRaw('CAST(Initial_Cost AS DECIMAL(10,2)) DESC')
            ->limit(50);
    }

    /**
     * Get the DataTables response.
     *
     * @param \Illuminate\Database\Eloquent\Builder $topPermits
     * @return \Illuminate\Http\JsonResponse
     */
    private function getDatatablesResponse($topPermits)
    {
        $table = Datatables::eloquent($topPermits);
        $table->addIndexColumn(); 

        return $table->make(true);
    }
}
