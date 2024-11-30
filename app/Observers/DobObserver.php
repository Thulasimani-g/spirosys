<?php

namespace App\Observers;

use App\Models\DobLatestAction;
use App\Models\TopPermit;

class DobObserver
{
    /**
     * Handle the DobLatestAction "created" event.
     */
    public function created(DobLatestAction $dobLatestAction): void
    {
        $this->logHistory($dobLatestAction, 'created');
    }




 
    protected function logHistory(DobLatestAction $dobLatestAction, $action)
    {
        $post = $dobLatestAction;
        $historyData = [];
        $historyData[] = [
            // Job Information
            'Job_' => $post->Job_ ?? null,
            'Doc_' => $post->Doc_ ?? null,
            'Borough' => $post->Borough ?? null,
            'zipcode_' => $post->zipcode_ ?? null,
            'House_' => $post->House_ ?? null,
            'Street_Name' => $post->Street_Name ?? null,
            'Block' => $post->Block ?? null,
            'Lot' => $post->Lot ?? null,
            'Bin_' => $post->Bin_ ?? null,
            'Job_Type' => $post->Job_Type ?? null,
            'Job_Status' => $post->Job_Status ?? null,
            'Job_Status_Descrp' => $post->Job_Status_Descrp ?? null,
            'Latest_Action_Date' => $post->Latest_Action_Date ?? null,
            'Building_Type' => $post->Building_Type ?? null,
            'Community__Board' => $post->Community__Board ?? null,
            'Cluster' => $post->Cluster ?? null,
            'Landmarked' => $post->Landmarked ?? null,
            'Adult_Estab' => $post->Adult_Estab ?? null,
            'Loft_Board' => $post->Loft_Board ?? null,
            'City_Owned' => $post->City_Owned ?? null,
            'Little_e' => $post->Little_e ?? null,
            'PC_Filed' => $post->PC_Filed ?? null,
            'eFiling_Filed' => $post->eFiling_Filed ?? null,
            'Plumbing' => $post->Plumbing ?? null,
            'Mechanical' => $post->Mechanical ?? null,
            'Boiler' => $post->Boiler ?? null,
            'Fuel_Burning' => $post->Fuel_Burning ?? null,
            'Fuel_Storage' => $post->Fuel_Storage ?? null,
            'Standpipe' => $post->Standpipe ?? null,
            'Sprinkler' => $post->Sprinkler ?? null,
            'Fire_Alarm' => $post->Fire_Alarm ?? null,
            'Equipment' => $post->Equipment ?? null,
            'Fire_Suppression' => $post->Fire_Suppression ?? null,
            'Curb_Cut' => $post->Curb_Cut ?? null,
            'Other' => $post->Other ?? null,
            'Other_Description' => $post->Other_Description ?? null,
    
            // Applicant Information
            'Applicants_First_Name' => $post->Applicants_First_Name ?? null,
            'Applicants_Last_Name' => $post->Applicants_Last_Name ?? null,
            'Applicant_Professional_Title' => $post->Applicant_Professional_Title ?? null,
            'Applicant_License_' => $post->Applicant_License_ ?? null,
            'Professional_Cert' => $post->Professional_Cert ?? null,
            'Pre_Filing_Date' => $post->Pre_Filing_Date ?? null,
            'Paid' => $post->Paid ?? null,
            'Fully_Paid' => $post->Fully_Paid ?? null,
            'Assigned' => $post->Assigned ?? null,
            'Approved' => $post->Approved ?? null,
            'Fully_Permitted' => $post->Fully_Permitted ?? null,
            'Initial_Cost' => $post->Initial_Cost ?? null,
            'Total_Est_Fee' => $post->Total_Est_Fee ?? null,
            'Fee_Status' => $post->Fee_Status ?? null,
            'Existing_Zoning_Sqft' => $post->Existing_Zoning_Sqft ?? null,
            'Proposed_Zoning_Sqft' => $post->Proposed_Zoning_Sqft ?? null,
            'Horizontal_Enlrgmt' => $post->Horizontal_Enlrgmt ?? null,
            'Vertical_Enlrgmt' => $post->Vertical_Enlrgmt ?? null,
            'Enlargement_SQ_Footage' => $post->Enlargement_SQ_Footage ?? null,
            'Street_Frontage' => $post->Street_Frontage ?? null,
            'ExistingNo_of_Stories' => $post->ExistingNo_of_Stories ?? null,
            'Proposed_No_of_Stories' => $post->Proposed_No_of_Stories ?? null,
            'Existing_Height' => $post->Existing_Height ?? null,
            'Proposed_Height' => $post->Proposed_Height ?? null,
      
            'Proposed_Dwelling_Units' => $post->Proposed_Dwelling_Units ?? null,
            'Existing_Occupancy' => $post->Existing_Occupancy ?? null,
            'Proposed_Occupancy' => $post->Proposed_Occupancy ?? null,
            'Site_Fill' => $post->Site_Fill ?? null,
            'Zoning_Dist1' => $post->Zoning_Dist1 ?? null,
            'Zoning_Dist2' => $post->Zoning_Dist2 ?? null,
            'Zoning_Dist3' => $post->Zoning_Dist3 ?? null,
            'Special_District_1' => $post->Special_District_1 ?? null,
            'Special_District_2' => $post->Special_District_2 ?? null,
            'Owner_Type' => $post->Owner_Type ?? null,
            'NonProfit' => $post->NonProfit ?? null,
            'Owners_First_Name' => $post->Owners_First_Name ?? null,
            'Owners_Last_Name' => $post->Owners_Last_Name ?? null,
            'Owners_Business_Name' => $post->Owners_Business_Name ?? null,
            'Owners_House_Number' => $post->Owners_House_Number ?? null,
            'OwnersHouse_Street_Name' => $post->OwnersHouse_Street_Name ?? null,
            'City_' => $post->City_ ?? null,
            'State' => $post->State ?? null,
            'Zip' => $post->Zip ?? null,
            'OwnersPhone_' => $post->OwnersPhone_ ?? null,
    
            // GIS Info
            'GIS_LATITUDE' => $post->GIS_LATITUDE ?? null,
            'latitude' => $post->latitude ?? null,
            'GIS_LONGITUDE' => $post->GIS_LONGITUDE ?? null,
            'longitude' => $post->longitude ?? null,
            'GIS_COUNCIL_DISTRICT' => $post->GIS_COUNCIL_DISTRICT ?? null,
            'GIS_CENSUS_TRACT' => $post->GIS_CENSUS_TRACT ?? null,
            'GIS_NTA_NAME' => $post->GIS_NTA_NAME ?? null,
            'GIS_BIN' => $post->GIS_BIN ?? null,
            'project_type' => $post->project_type ?? null,
            'Filing_Status' => $post->Filing_Status ?? null,
    
            // Filing Representative Info
            'Filing_Representative_First_Name' => $post->Filing_Representative_First_Name ?? null,
            'Filing_Representative_Last_Name' => $post->Filing_Representative_Last_Name ?? null,
            'Filing_Representative_Business_Name' => $post->Filing_Representative_Business_Name ?? null,
            'Filing_Representative_Street_Name' => $post->Filing_Representative_Street_Name ?? null,
            'Filing_Representative_City' => $post->Filing_Representative_City ?? null,
            'Filing_Representative_State' => $post->Filing_Representative_State ?? null,
            'Filing_Representative_Zip' => $post->Filing_Representative_Zip ?? null,
    
            // Additional Info from DobLatestAction
            'SpecialInspectionRequirement' => $dobLatestAction->SpecialInspectionRequirement ?? null,
            'Special_Inspection_Agency_Number' => $dobLatestAction->Special_Inspection_Agency_Number ?? null,
            'ProgressInspectionRequirement' => $dobLatestAction->ProgressInspectionRequirement ?? null,
    
            // Automation and Date Fields
            'automated_at' => now(),
            'expired_date' => $dobLatestAction->expired_date ?? null,
            'issued_date' => $dobLatestAction->issued_date ?? null,
    
         
            
            'action_type' => $action,   
        ];

        
        if (!empty($historyData)) {
            TopPermit::insert($historyData);
        }
    }
}
