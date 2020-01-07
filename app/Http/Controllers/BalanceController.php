<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use DB;
use App\Student;
use App\Teacher;
use App\Course;
use App\Batch;
use App\ExpenseCategory;

class BalanceController extends Controller
{

    public function __construct( DateConverterController $nep_date){
        $this->nep_date = $nep_date;
    }

    private function convert_to_eng($nepali_date){
        $nepali=$nepali_date;
        $nepali_temp=explode('-', $nepali);
        $nepali_year=$nepali_temp[0];
        $nepali_month=$nepali_temp[1];
        $nepali_day=$nepali_temp[2];
        $eng_temp=$this->nep_date->nep_to_eng($nepali_year,$nepali_month,$nepali_day);
        $eng_year=$eng_temp['year'];
        $eng_month=$eng_temp['month'];
        $eng_day=$eng_temp['date'];
        $eng_date=$eng_year.'-'.$eng_month.'-'.$eng_day;
        return $eng_date;
    }

    public function browse(){
        $date1='';

        $students = Student::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        $batch = Batch::all();
        $cashins = Payment::sum('amount_paid');
        $cashouts = Expense::sum('amount');
        $net_sum = $cashins - $cashouts;


        /*
			For Each services cashin record
		*/
		// $services = Service::all('id' ,'name');
        // foreach($services as $service)
		// {

		// 	if (Cashin::where('service', '=', $service->id)->exists()) {
   		// 	$service->service_sum_cashin = Cashin::where('service', '=', $service->id)->sum('amount_paid');
		// 			}
		// 			else{
		// 				$service->service_sum_cashin = 0;
		// 			}
        // }


 /*
			For Each Expenditure cashout record
		*/
		
        $expenditures = DB::table('expenses')
        ->select('expense_category', DB::raw('sum(amount) as total'))
        ->groupBy('expense_category')
        ->get();

       
        // foreach($expenditures as $key=>$value){dd($value);
        // }
        

        return view('admin.balances.browse', compact('cashins', 'cashouts' , 'net_sum'  , 'expenditures','students','teachers','courses','batch','date1'));
    }


    public function report(Request $request){
        // dd($request->all());
        $students = Student::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        $batch = Batch::all();
        $date1 = $request['date1'];
        $date2 = $request['date2'];


        $cashins = Payment::whereBetween('created_at', array($date1." 00:00:00" , $date2." 23:59:59"))->sum('amount_paid');
        $cashouts = Expense::whereBetween('created_at', array($date1." 00:00:00" , $date2." 23:59:59"))->sum('amount');
        $net_sum = $cashins - $cashouts;


        /*
			For Each services cashin record
		*/
		// $services = Service::all('id' ,'name');
        // foreach($services as $service)
		// {

		// 	if (Cashin::where('service', '=', $service->id)->exists()) {


   		// 	$service->service_sum_cashin = Cashin::where('service', '=', $service->id)->whereBetween('date_paid', array($date1, $date2))->sum('amount_paid');
		// 			}
		// 			else{
		// 				$service->service_sum_cashin = 0;
		// 			}
        // }
        

        /*
			For Each Expenditure cashout record
        */
       
        // $expcount=Expense::count();
        // for($i=0;$i>=$expcount;$i++){
        //         $date=$timestamp->toDateString();
        //         dd($date);
        // }
        
        

        
		
        $expenditures = DB::table('expenses')->whereBetween('created_at', array($date1." 00:00:00" , $date2." 23:59:59"))
        ->select('expense_category', DB::raw('sum(amount) as total'))
        ->groupBy('expense_category')
        ->get();


        return view('admin.balances.browse', compact('cashins', 'cashouts' , 'net_sum'  , 'expenditures','date1','date2'));
    }

}