<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DobLatestActionSubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Fetch and process rows in chunks from dob_latest_action
        DB::table('dob_latest_action')
        ->orderBy('id') ->chunk(1000, function ($dobLatestActions) {
            $insertData = [];

            // Loop through each row in the chunk
            foreach ($dobLatestActions as $action) {
                // Prepare the data for insertion
                $insertData[] = [
                    'dob_latest_action_id' => $action->id,  // Foreign key from dob_latest_action
                    'Job_' => $action->Job_,
                    'Doc_' => $action->Doc_,
                    'Borough' => $action->Borough,
                    'zipcode_' => $action->zipcode_,
                    'House_' => $action->House_,
                    'Street_Name' => $action->Street_Name,
                    'Block' => $action->Block,
                    'Lot' => $action->Lot,
                    'Bin_' => $action->Bin_,
                    'Job_Type' => $action->Job_Type,
                    'Job_Status' => $action->Job_Status,
                    'Job_Status_Descrp' => $action->Job_Status_Descrp,
                    'Latest_Action_Date' => $action->Latest_Action_Date,
                    'Building_Type' => $action->Building_Type,
                    'Community_Board' => $action->Community__Board,
                    'Cluster' => $action->Cluster,
                    'Landmarked' => $action->Landmarked,
                    'Adult_Estab' => $action->Adult_Estab,
                    'Loft_Board' => $action->Loft_Board,
                    'City_Owned' => $action->City_Owned,
                    'Little_e' => $action->Little_e,
                    'PC_Filed' => $action->PC_Filed,
                    'eFiling_Filed' => $action->eFiling_Filed,
                    'Plumbing' => $action->Plumbing,
                    'Mechanical' => $action->Mechanical,
                    'Boiler' => $action->Boiler,
                    'Fuel_Burning' => $action->Fuel_Burning,
                    'Fuel_Storage' => $action->Fuel_Storage,
                    'Standpipe' => $action->Standpipe,
                    'Sprinkler' => $action->Sprinkler,
                    'Fire_Alarm' => $action->Fire_Alarm,
                    'Equipment' => $action->Equipment,
                    'Fire_Suppression' => $action->Fire_Suppression,
                    'Curb_Cut' => $action->Curb_Cut,
                    'Other' => $action->Other,
                    'Other_Description' => $action->Other_Description,
                    'Applicants_First_Name' => $action->Applicants_First_Name,
                    'Applicants_Last_Name' => $action->Applicants_Last_Name,
                    'Applicant_Professional_Title' => $action->Applicant_Professional_Title,
                    'Applicant_License_' => $action->Applicant_License_,
                    'Professional_Cert' => $action->Professional_Cert,
                    'Pre_Filing_Date' => $action->Pre_Filing_Date,
                    'Paid' => $action->Paid,
                    'Fully_Paid' => $action->Fully_Paid,
                    'Assigned' => $action->Assigned,
                    'Approved' => $action->Approved,
                    'Fully_Permitted' => $action->Fully_Permitted,
                    'Initial_Cost' => $action->Initial_Cost,
                    'Total_Est_Fee' => $action->Total_Est_Fee,
                    'Fee_Status' => $action->Fee_Status,
                    'Existing_Zoning_Sqft' => $action->Existing_Zoning_Sqft,
                    'Proposed_Zoning_Sqft' => $action->Proposed_Zoning_Sqft,
                    'Horizontal_Enlrgmt' => $action->Horizontal_Enlrgmt,
                    'Vertical_Enlrgmt' => $action->Vertical_Enlrgmt,
                    'Enlargement_SQ_Footage' => $action->Enlargement_SQ_Footage,
                    'Street_Frontage' => $action->Street_Frontage,
                    'ExistingNo_of_Stories' => $action->ExistingNo_of_Stories,
                    'Proposed_No_of_Stories' => $action->Proposed_No_of_Stories,
                    'Existing_Height' => $action->Existing_Height,
                    'Proposed_Height' => $action->Proposed_Height,
                //    'Existing_Dwelling_Units' => $action->Existing_Dwelling_Units,
                    'Proposed_Dwelling_Units' => $action->Proposed_Dwelling_Units,
                    'Existing_Occupancy' => $action->Existing_Occupancy,
                    'Proposed_Occupancy' => $action->Proposed_Occupancy,
                    'Site_Fill' => $action->Site_Fill,
                    'Zoning_Dist1' => $action->Zoning_Dist1,
                    'Zoning_Dist2' => $action->Zoning_Dist2,
                    'Zoning_Dist3' => $action->Zoning_Dist3,
                    'Special_District_1' => $action->Special_District_1,
                    'Special_District_2' => $action->Special_District_2,
                    'Owner_Type' => $action->Owner_Type,
                    'NonProfit' => $action->NonProfit,
                    'Owners_First_Name' => $action->Owners_First_Name,
                    'Owners_Last_Name' => $action->Owners_Last_Name,
                    'Owners_Business_Name' => $action->Owners_Business_Name,
                    'Owners_House_Number' => $action->Owners_House_Number,
                    'OwnersHouse_Street_Name' => $action->OwnersHouse_Street_Name,
                    'City_' => $action->City_,
                    'State' => $action->State,
                    'Zip' => $action->Zip,
                    'OwnersPhone_' => $action->OwnersPhone_,
                    'Job_Description' => $action->Job_Description,
                    'DOBRunDate' => $action->DOBRunDate,
                    'JOB_S1_NO' => $action->JOB_S1_NO,
                    'TOTAL_CONSTRUCTION_FLOOR_AREA' => $action->TOTAL_CONSTRUCTION_FLOOR_AREA,
                    'WITHDRAWAL_FLAG' => $action->WITHDRAWAL_FLAG,
                    'SIGNOFF_DATE' => $action->SIGNOFF_DATE,
                    'SPECIAL_ACTION_STATUS' => $action->SPECIAL_ACTION_STATUS,
                    'SPECIAL_ACTION_DATE' => $action->SPECIAL_ACTION_DATE,
                    'BUILDING_CLASS' => $action->BUILDING_CLASS,
                    'JOB_NO_GOOD_COUNT' => $action->JOB_NO_GOOD_COUNT,
                    'GIS_LATITUDE' => $action->GIS_LATITUDE,
                    'latitude' => $action->latitude,
                    'GIS_LONGITUDE' => $action->GIS_LONGITUDE,
                    'longitude' => $action->longitude,
                    'GIS_COUNCIL_DISTRICT' => $action->GIS_COUNCIL_DISTRICT,
                    'GIS_CENSUS_TRACT' => $action->GIS_CENSUS_TRACT,
                    'GIS_NTA_NAME' => $action->GIS_NTA_NAME,
                    'GIS_BIN' => $action->GIS_BIN,
                    'project_type' => $action->project_type,
                    'Filing_Status' => $action->Filing_Status,
                    'Work_on_Floor' => $action->Work_on_Floor,
                    'AptCondo_Nos' => $action->AptCondo_Nos,
                    'Applicants_Middle_Initial' => $action->Applicants_Middle_Initial,
                    'Filing_Representative_First_Name' => $action->Filing_Representative_First_Name,
                    'Filing_Representative_Middle_Initial' => $action->Filing_Representative_Middle_Initial,
                    'Filing_Representative_Last_Name' => $action->Filing_Representative_Last_Name,
                    'Filing_Representative_Business_Name' => $action->Filing_Representative_Business_Name,
                    'Filing_Representative_Street_Name' => $action->Filing_Representative_Street_Name,
                    'Filing_Representative_City' => $action->Filing_Representative_City,
                    'Filing_Representative_State' => $action->Filing_Representative_State,
                    'Filing_Representative_Zip' => $action->Filing_Representative_Zip,
                    'Review_Building_Code' => $action->Review_Building_Code,
                    'UnmappedCCO_Street' => $action->UnmappedCCO_Street,
                    'Request_Legalization' => $action->Request_Legalization,
                    'Includes_Permanent_Removal' => $action->Includes_Permanent_Removal,
                    'In_Compliance_with_NYCECC' => $action->In_Compliance_with_NYCECC,
                    'Exempt_from_NYCECC' => $action->Exempt_from_NYCECC,
                    'SpecialInspectionRequirement' => $action->SpecialInspectionRequirement,
                    'Special_Inspection_Agency_Number' => $action->Special_Inspection_Agency_Number,
                    'ProgressInspectionRequirement' => $action->ProgressInspectionRequirement,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'automated_at' => now(),
                    'expired_date' => $action->expired_date,
                    'issued_date' => $action->issued_date,
                ];
            }

            // Insert the chunk of data in a single query (batch insert)
            DB::table('top_permits')->insert($insertData);
        });

        // Re-enable foreign key checks after the insert
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
    }
}
