<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Multiexptransfer;
use App\Model\Expenses;
use App\Model\Transfer;
use DB;
use Input;
use Session;
use Redirect;
class MultiexptransController extends Controller {
	public static function multiaddedit(Request $request){
		if ($request->mainmenu=="expenses") {
			$request->cashid = '1';
		} elseif ($request->mainmenu=="company_transfer") {
			$request->cashid = '2';
		} else{
			$request->cashid = '3';
		}
		
		if ($request->cashid == "") {
			$request->cashid = '1';
		}
		$getsubject = Multiexptransfer::fnGetSubject($request);
		$getpettysubject = Multiexptransfer::getpettymainsubject($request);
		$bankname = Multiexptransfer::fetchbankname($request);
		$sql = Expenses::fetchbanknames($request);
		$loantype = Transfer::getloantype($request);
		$banknameloan = Transfer::banknames($request);
		return view('Multiaddedit.multiaddedit',['request' => $request,
												 'getsubject' => $getsubject,
												 'getpettysubject' => $getpettysubject,
												 'sql' => $sql,
												 'loantype' => $loantype,
												 'banknameloan' => $banknameloan,
												 'bankname' => $bankname]);
	}
	//Expenses & Transfer Mainsubject getdata
	public static function getmainsubject(Request $request){
		$getsubject = Multiexptransfer::fnGetSubject($request);
		// print_r(json_encode($getsubject));
		echo json_encode($getsubject);
	}
	//Petty Cash Mainsubject getdata
	public static function getpettymainsubject(Request $request){
		$getpettysubject = Multiexptransfer::getpettymainsubject($request);
		// print_r(json_encode($getsubject));
		echo json_encode($getpettysubject);
	}
	//Petty Cash Subsubject getdata
	public static function getpettysubsubject(Request $request){
		$getpettysubject = Multiexptransfer::fnpettysubsubject($request);
		// print_r(json_encode($getsubject));
		echo json_encode($getpettysubject);
	}
	public static function ajaxmainsubject(Request $request) {
		$getsunsubject=Expenses::fnfetchmainsubject($request);
		$degreedata=json_encode($getsunsubject);
		echo $degreedata;
	}
	//Expenses & Transfer Subsubject getdata
	public static function ajaxsubsubject(Request $request) {
		$getsunsubject=Multiexptransfer::fnfetchsubsubject($request);
		$degreedata=json_encode($getsunsubject);
		echo $degreedata;
	}
	//register Process 
	public static function multiaddeditprocess(Request $request) {
		if ($request->cashid == "1") {   //Expenses
			$request->mainmenu = 'expenses';
			$autoincId=Expenses::getautoincrement($request);
		} else if ($request->cashid == "2") {		//Transfer
			$request->txt_startdate = $request->date;
			$request->amount_1 = $request->amount;
			$request->Remarks = $request->remarks;
			$autoincId=Transfer::getautoincrement();
		} else if ($request->cashid == "3"){//Expenses
			$request->mainmenu = 'pettycash';
			$autoincId=Expenses::getautoincrement($request);
		} else if ($request->cashid == "4"){//Transfer
			$request->mainmenu = 'Loan';
			$autoincId=Transfer::getautoincrement($request);
		} else if ($request->cashid == "5"){//Expenses
			$request->mainmenu = 'Cash';
			$autoincId=Expenses::getautoincrement($request);
		} else {//Transfer
			$request->mainmenu = 'Others';
			$autoincId=Transfer::getautoincrement($request);
		} 
		$expno="Expenses_".date('YmdHis');
		$fileid="file1";
		$filename="";
		if($request->$fileid != "") {
			$extension = Input::file($fileid)->getClientOriginalExtension();
			$filename=$expno.'.'.$extension;
			$file = $request->$fileid;
			$destinationPath = '../InvoiceUpload/Expenses';
			if(!is_dir($destinationPath)) {
				mkdir($destinationPath, true);
			}
			chmod($destinationPath, 0777);
			$file->move($destinationPath,$filename);
			chmod($destinationPath."/".$filename, 0777);
		} else {
			$filename = $request->pdffiles; 
		}
		$getkessanki = Expenses::kessanki_ListView($request);
		$spldm = explode('-', $request->date);
		$checkSubmitCount = Expenses::checkSubmited($spldm);
		$expbillno = Expenses::expbillno_ListView($request,$getkessanki[0]);
		//Expenses and PettyCash Insert Value Process
		if ($request->cashid == "1") {
			$fnaddexpenses=Expenses::fnadddatatodatabase($request,$filename,$checkSubmitCount,$expbillno);
		}
		//Transfer Insert Value Process
		else if ($request->cashid == "2") {
			$insert = Transfer::inserttransferRec($request,$checkSubmitCount,$filename);
		}
		else if ($request->cashid == "3") {
			$fnaddexpenses=Expenses::fnadddatatodatabase($request,$filename,$checkSubmitCount,$expbillno);
			$disp = Expenses::checkexpensesadd($spldm);
			if($disp > 0) {
				$fnaddexpenses=Expenses::fnaddtodev($request,$filename,$checkSubmitCount,$expbillno,1);
			} else {
				$fnaddexpenses=Expenses::fnadduptodev($request,$filename,$checkSubmitCount,$expbillno,1);
			}
		}
		elseif ($request->cashid == "6") {
			$fnaddexpenses=Transfer::fnaddothersdatatodatabase($request);
			$spldm = explode('-', $request->date);
			Session::flash('selMonth', $spldm[1]); 
			Session::flash('selYear', $spldm[0]);  
			Session::flash('prevcnt', $request->prevcnt); 
			Session::flash('nextcnt', $request->nextcnt); 
			Session::flash('account_val', $request->account_val); 
			Session::flash('previou_next_year', $request->previou_next_year); 
			return Redirect::to('Transfer/index?mainmenu=company_transfer&time='.date('YmdHis'));
		}
		elseif ($request->cashid == "4") {
			$spldm = explode('-', $request->date);
			$checkSubmitCount = Transfer::checkSubmited($spldm);
			$insert = Transfer::insertLoanpaymentRec($request,$checkSubmitCount);
		}
		elseif ($request->cashid == "5") {
			$carry = 0;
			$spldm = explode('-', $request->date);
			$checkSubmitCount = Expenses::checkSubmited($spldm);
			$getkessanki = Expenses::kessanki_ListView($request);
			$expbillno = Expenses::expbillno_ListView($request,$getkessanki[0]);
			$insert=Expenses::addcash($request,$carry,$checkSubmitCount,$expbillno);
			$spldm = explode('-', $request->date);
			Session::flash('selMonth', $spldm[1]); 
			Session::flash('selYear', $spldm[0]); 
			if($insert) {
				Session::flash('success', 'Inserted Sucessfully!'); 
				Session::flash('type', 'alert-success'); 
			} else {
				Session::flash('type', 'Inserted Unsucessfully!'); 
				Session::flash('type', 'alert-danger'); 
			}
			return Redirect::to('Transfer/index?mainmenu=company_transfer&time='.date('YmdHis'));
			
		}
		if ($request->cashid == "1" || $request->cashid == "3" || $request->cashid == "6") {
			if($fnaddexpenses) {
				Session::flash('success', 'Inserted Sucessfully!'); 
				Session::flash('type', 'alert-success'); 
			} else {
				Session::flash('type', 'Inserted Unsucessfully!'); 
				Session::flash('type', 'alert-danger'); 
			}
		}
		else if ($request->cashid == "2" || $request->cashid == "4" || $request->cashid == "5") {
			if($insert) {
				Session::flash('success', 'Inserted Sucessfully!'); 
				Session::flash('type', 'alert-success'); 
			} else {
				Session::flash('type', 'Inserted Unsucessfully!'); 
				Session::flash('type', 'alert-danger'); 
			}
		}
		//Expenses and PettyCash redirected Page
		if ($request->cashid == "1" || $request->cashid == "3") {
			$spldm = explode('-', $request->date);
			Session::flash('selMonth', $spldm[1]); 
			Session::flash('selYear', $spldm[0]); 
			return Redirect::to('Expenses/index?mainmenu='.$request->mainmenu.'&time='.date('YmdHis'));
		}
		//Transfer Redirected Page
		else if ($request->cashid == "2" || $request->cashid == "4" ) {
			$spldm = explode('-', $request->txt_startdate);
			Session::flash('selMonth', $spldm[1]); 
			Session::flash('selYear', $spldm[0]);  
			Session::flash('prevcnt', $request->prevcnt); 
			Session::flash('nextcnt', $request->nextcnt); 
			Session::flash('account_val', $request->account_val); 
			Session::flash('previou_next_year', $request->previou_next_year); 
			return Redirect::to('Transfer/index?mainmenu=company_transfer&time='.date('YmdHis'));
		}

	}
	public static function ajaxloanname(Request $request) {
		$getsunsubject=Transfer::fnfetchloanname($request);
		$degreedata=json_encode($getsunsubject);
		echo $degreedata;
	}
	
}
