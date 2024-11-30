<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('top_permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dob_latest_action_id')->constrained('dob_latest_action')->onDelete('cascade')->index();
            $table->string('Job_')->length(255)->index();
            $table->string('Doc_')->length(255);
            $table->string('Borough')->length(100);
            $table->string('zipcode_')->length(100);
            $table->string('House_')->length(255);
            $table->string('Street_Name')->length(100);
            $table->string('Block')->length(255);
            $table->string('Lot')->length(255);
            $table->string('Bin_')->length(255);
            $table->string('Job_Type')->length(100);
            $table->string('Job_Status')->length(100);
            $table->string('Job_Status_Descrp')->length(100);
            $table->string('Latest_Action_Date')->length(100);
            $table->string('Building_Type')->length(100);
            $table->string('Community_Board')->length(255);
            $table->string('Cluster')->length(100);
            $table->string('Landmarked')->length(100);
            $table->string('Adult_Estab')->length(100);
            $table->string('Loft_Board')->length(100);
            $table->string('City_Owned')->length(100);
            $table->string('Little_e')->length(100);
            $table->string('PC_Filed')->length(100);
            $table->string('eFiling_Filed')->length(100);
            $table->string('Plumbing')->length(100);
            $table->string('Mechanical')->length(100);
            $table->string('Boiler')->length(100);
            $table->string('Fuel_Burning')->length(100);
            $table->string('Fuel_Storage')->length(100);
            $table->string('Standpipe')->length(100);
            $table->string('Sprinkler')->length(100);
            $table->string('Fire_Alarm')->length(100);
            $table->string('Equipment')->length(100);
            $table->string('Fire_Suppression')->length(100);
            $table->string('Curb_Cut')->length(100);
            $table->string('Other')->length(100);
            $table->string('Other_Description')->length(100);
            $table->string('Applicants_First_Name')->length(100);
            $table->string('Applicants_Last_Name')->length(100);
            $table->string('Applicant_Professional_Title')->length(100);
            $table->string('Applicant_License_')->length(100);
            $table->string('Professional_Cert')->length(100);
            $table->string('Pre_Filing_Date')->length(100);
            $table->string('Paid')->length(100);
            $table->string('Fully_Paid')->length(100);
            $table->string('Assigned')->length(100);
            $table->string('Approved')->length(100);
            $table->string('Fully_Permitted')->length(100);
            $table->string('Initial_Cost')->length(100);
            $table->string('Total_Est_Fee')->length(100);
            $table->string('Fee_Status')->length(100);
            $table->string('Existing_Zoning_Sqft')->length(100);
            $table->string('Proposed_Zoning_Sqft')->length(100);
            $table->string('Horizontal_Enlrgmt')->length(100);
            $table->string('Vertical_Enlrgmt')->length(100);
            $table->string('Enlargement_SQ_Footage')->length(100);
            $table->string('Street_Frontage')->length(100);
            $table->string('ExistingNo_of_Stories')->length(100);
            $table->string('Proposed_No_of_Stories')->length(100);
            $table->string('Existing_Height')->length(100);
            $table->string('Proposed_Height')->length(100);
            $table->string('Existing_Dwelling_Units')->length(100);
            $table->string('Proposed_Dwelling_Units')->length(100);
            $table->string('Existing_Occupancy')->length(100);
            $table->string('Proposed_Occupancy')->length(100);
            $table->string('Site_Fill')->length(100);
            $table->string('Zoning_Dist1')->length(100);
            $table->string('Zoning_Dist2')->length(100);
            $table->string('Zoning_Dist3')->length(100);
            $table->string('Special_District_1')->length(100);
            $table->string('Special_District_2')->length(100);
            $table->string('Owner_Type')->length(100);
            $table->string('NonProfit')->length(100);
            $table->string('Owners_First_Name')->length(100);
            $table->string('Owners_Last_Name')->length(100);
            $table->string('Owners_Business_Name')->length(100);
            $table->string('Owners_House_Number')->length(100);
            $table->string('OwnersHouse_Street_Name')->length(100);
            $table->string('City_')->length(100);
            $table->string('State')->length(100);
            $table->string('Zip')->length(100);
            $table->string('OwnersPhone_')->length(100);
            
            $table->text('Job_Description');
            $table->string('DOBRunDate')->length(100);
            $table->string('JOB_S1_NO')->length(100);
            $table->string('TOTAL_CONSTRUCTION_FLOOR_AREA')->length(100);
            $table->string('WITHDRAWAL_FLAG')->length(100);
            $table->string('SIGNOFF_DATE')->length(100);
            $table->string('SPECIAL_ACTION_STATUS')->length(100);
            $table->string('SPECIAL_ACTION_DATE')->length(100);
            $table->string('BUILDING_CLASS')->length(100);
            $table->string('JOB_NO_GOOD_COUNT')->length(100);

            $table->string('GIS_LATITUDE')->length(100);
            $table->string('latitude')->length(100);
            $table->string('GIS_LONGITUDE')->length(100);
            $table->string('longitude')->length(100);
            $table->string('GIS_COUNCIL_DISTRICT')->length(100);
            $table->string('GIS_CENSUS_TRACT')->length(100);
            $table->string('GIS_NTA_NAME')->length(100);
            $table->string('GIS_BIN')->length(100);
            $table->string('project_type')->length(100);
            $table->string('Filing_Status')->length(100);

            $table->string('Work_on_Floor')->length(100);
            $table->string('AptCondo_Nos')->length(100);
            $table->string('Applicants_Middle_Initial')->length(100);
            $table->string('Filing_Representative_First_Name')->length(100);
            $table->string('Filing_Representative_Middle_Initial')->length(100);
            $table->string('Filing_Representative_Last_Name')->length(100);
            $table->string('Filing_Representative_Business_Name')->length(100);
            $table->string('Filing_Representative_Street_Name')->length(100);
            $table->string('Filing_Representative_City')->length(100);
            $table->string('Filing_Representative_State')->length(100);

            $table->string('Filing_Representative_Zip')->length(100);
            $table->string('Review_Building_Code')->length(100);
            $table->string('UnmappedCCO_Street')->length(100);
            $table->string('Request_Legalization')->length(100);
            $table->string('Includes_Permanent_Removal')->length(100);
            $table->string('In_Compliance_with_NYCECC')->length(100);
            $table->string('Exempt_from_NYCECC')->length(100);
            $table->text('SpecialInspectionRequirement');
            $table->text('Special_Inspection_Agency_Number');
            $table->text('ProgressInspectionRequirement');

            $table->string('Built_1_information_value')->length(100);
            $table->string('Built_2_information_value')->length(100);
            $table->string('Built_2_A_information_value')->length(100);
            $table->string('Built_2_B_information_value')->length(100);
            $table->string('Antenna')->length(100);
            $table->string('Sign')->length(100);
            $table->string('Fence')->length(100);
            $table->string('Scaffold')->length(100);
            $table->string('Shed')->length(100);
            $table->string('Filing_Date')->length(100);

            $table->string('Current_Status_Date')->length(100);
            $table->string('Permit_Issue_Date')->length(100);
            $table->text('Earth_Work_Work_Type');
            $table->text('Foundation_Work_Type');
            $table->text('General_Construction_Work_Type');
            $table->text('Place_of_Assembly_Work_Type');
            $table->text('Protection_Mechanical_Methods_Work_Type');
            $table->text('Sidewalk_Shed_Work_Type');
            $table->text('Structural_Work_Type');
            $table->text('Support_of_Excavation_Work_Type');

            $table->text('Temporary_Place_of_Assembly_Work_Type');
            $table->string('Owners_county')->length(100);
            $table->string('Owners_email')->length(100);
            $table->string('Owners_linked_in')->length(100);
            $table->string('Owners_status')->length(100);
            $table->text('Owners_notes');
            $table->text('filling_rep_cont_type');
            $table->dateTime('automated_at');
            $table->date('expired_date');
            $table->date('issued_date');

            $table->date('approved_date');
            $table->text('filling_rep_prof_title');
            $table->text('filling_rep_county');
            $table->text('filling_rep_phone');
            $table->text('filling_rep_email');
            $table->text('filling_rep_linkedIn');
            $table->text('filling_rep_status');
            $table->text('filling_rep_note');
            $table->text('applicant_cont_type');
            $table->text('applicant_city');

            $table->text('applicant_state');
            $table->text('applicant_county');
            $table->text('applicant_zip');
            $table->text('applicant_phone');
            $table->text('applicant_email');
            $table->text('applicant_linked');
            $table->text('applicant_note');
            $table->text('applicant_status');
            $table->text('applicant_company_name');
            $table->text('applicant_company_address');
          

            $table->text('applicant_street_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_permits');
    }
};
