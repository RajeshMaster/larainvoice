@extends('layouts.app')
@section('content')
{{ HTML::script('resources/assets/js/expenses.js') }}
{{ HTML::script('resources/assets/js/accounting.js') }}
{{ HTML::script('resources/assets/js/lib/bootstrap-datetimepicker.js') }}
{{ HTML::script('resources/assets/js/lib/lightbox.js') }}
{{ HTML::style('resources/assets/css/lib/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('resources/assets/css/lib/lightbox.css') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
{{ HTML::script('resources/assets/js/transfer.js') }}
{{ HTML::script('resources/assets/js/multiexptrans.js') }}

<script type="text/javascript">
	var datetime = '<?php echo date('Ymdhis'); ?>';
	var dates = '<?php echo date('Y-m-d'); ?>';
	var accessDate = '<?php echo Auth::user()->accessDate; ?>';
	var userclassification = '<?php echo Auth::user()->userclassification; ?>';
	$(document).ready(function() {
		if (userclassification == 1) {
			accessDate = setNextDay(accessDate);
			setDatePickerAfterAccessDate("dob", accessDate);
		} else {
			setDatePicker("dob");
		}
	});
	$(document).ready(function(){
		var mainmenu = $('#mainmenu').val();
		if(mainmenu=="expenses") {
			$('#expenses_btn').removeClass('btn btn-success');
			$('#expenses_btn').addClass('btn btn1');
			// $("#expenses1").prop('checked',true);
		} else if(mainmenu=="company_transfer") {
			$('#transfer_btn').removeClass('btn btn-success');
			$('#transfer_btn').addClass('btn btn1');
			$('.bankname').removeClass('display_none');
			// $("#transfer").prop('checked',true);
		} else if(mainmenu=="pettycash"){
			$('#pettycash_btn').removeClass('btn btn-success');
			$('#pettycash_btn').addClass('btn btn1');
			// $('#empselect').removeClass('display_none');
			// $("#pettycash").prop('checked',true);	
		} else if(mainmenu=="Others"){
			$('#others_btn').removeClass('btn btn-success');
			$('#others_btn').addClass('btn btn1');
			// $("#Others").prop('checked',true);	
		}
		else if(mainmenu=="Loan"){
			$('#loan_btn').removeClass('btn btn-success');
			$('#loan_btn').addClass('btn btn1');
			// $("#Others").prop('checked',true);	
		} else {
			$('#cash_btn').removeClass('btn btn-success');
			$('#cash_btn').addClass('btn btn1');
			// $('#empselect').removeClass('display_none');
			// $("#Others").prop('checked',true);	
		}

	});
	function popupenable(mainmenu) {
		popupopenclose(1);
		var cash = $('#cashid').val();
		$('#empnamepopup').load('../Invoice/empnamepopup?mainmenu='+mainmenu+'&time='+datetime+'&cash='+cash);
		$("#empnamepopup").modal({
	           backdrop: 'static',
	           keyboard: false
	        });
	    $('#empnamepopup').modal('show');
	}
</script>
<style type="text/css">
	.btn1 {
		background-color: grey !important;
		color: white !important;
	}
	.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    width:110px;
    margin-top: 9px!important;
    margin-bottom: 1px;
    cursor: pointer;
    margin-right: 8px;
}
</style>
<div class="CMN_display_block box100per" id="main_contents">
<!-- article to select the main&sub menu -->
@if($request->mainmenu == "pettycash")
	<article id="expenses" class="DEC_flex_wrapper " data-category="expenses expenses_sub_8">
@elseif($request->mainmenu == "company_transfer")
	<article id="expenses" class="DEC_flex_wrapper " data-category="expenses expenses_sub_2">
@else
	<article id="expenses" class="DEC_flex_wrapper " data-category="expenses expenses_sub_1">
@endif
	{{ Form::open(array('name'=>'frmexpensesmultiaddedit', 
						'id'=>'frmexpensesmultiaddedit', 
						'files'=>true,
						'url' => 'Multiaddedit/multiaddeditprocess?mainmenu='.$request->mainmenu.'&time='.date('YmdHis'),
						'method' => 'POST')) }}
		{{ Form::hidden('lang',Session::get('languageval') , array('id' => 'lang')) }}
		{{ Form::hidden('cashid',$request->cashid , array('id' => 'cashid')) }}
		{{ Form::hidden('mainmenu',$request->mainmenu, array('id' => 'mainmenu')) }}
		@if (Auth::user()->userclassification == 1) 
	    	{{ Form::hidden('accessdate',Auth::user()->accessDate, array('id' => 'accessdate')) }}
	    @else
	    	{{ Form::hidden('accessdate','0001-01-01', array('id' => 'accessdate')) }}
	    @endif
		<div class="row hline pm0">
			<div class="col-xs-12">
				<img class="pull-left box35 mt10 expenicon" src="{{ URL::asset('resources/assets/images/expenses.png') }}">
				<img class="pull-left box35 mt10 display_none pettycashicon" src="{{ URL::asset('resources/assets/images/pettycash.jpg') }}">
				<img class="pull-left box35 mt10 display_none expenses_icon" src="{{ URL::asset('resources/assets/images/expenses_icon.png') }}">
				<img class="pull-left box35 mt10 display_none loan_icon" src="{{ URL::asset('resources/assets/images/loan.jpg') }}">
				<img class="pull-left box35 mt10 display_none others_icon" src="{{ URL::asset('resources/assets/images/others_icon.jpg') }}">
				@if($request->mainmenu == "expenses")
					<h2 class="pull-left pl5 mt10 expenses">
						{{ trans('messages.lbl_expenses') }}
					</h2>
				@else
					<h2 class="pull-left pl5 mt10 display_none expenses">
						{{ trans('messages.lbl_expenses') }}
					</h2>
				@endif
				@if($request->mainmenu == "company_transfer")
					<h2 class="pull-left pl5 mt10 tranfer">
						{{ trans('messages.lbl_transfer') }}
					</h2>
				@else
					<h2 class="pull-left pl5 mt10 display_none tranfer">
						{{ trans('messages.lbl_transfer') }}
					</h2>
				@endif
				@if($request->mainmenu == "pettycash")
					<h2 class="pull-left pl5 mt10 pettycash">
						{{ trans('messages.lbl_pettycash') }}
					</h2>
				@else
					<h2 class="pull-left pl5 mt10 display_none pettycash">
						{{ trans('messages.lbl_pettycash') }}
					</h2>
				@endif
				@if($request->mainmenu == "Others")
				<h2 class="pull-left pl5 mt10 Others display_none">
					{{ trans('messages.lbl_Others') }}
				</h2>
				@else
				<h2 class="pull-left pl5 mt10 Others display_none">
					{{ trans('messages.lbl_Others') }}
				</h2>
				@endif
				@if($request->mainmenu == "Loan")
				<h2 class="pull-left pl5 mt10 Loan display_none">
					{{ trans('messages.lbl_loan') }}
				</h2>
				@else
				<h2 class="pull-left pl5 mt10 Loan display_none">
					{{ trans('messages.lbl_loan') }}
				</h2>
				@endif
				@if($request->mainmenu == "Cash")
				<h2 class="pull-left pl5 mt10 Cash display_none">
					{{ trans('messages.lbl_cash') }}
				</h2>
				@else
				<h2 class="pull-left pl5 mt10 Cash display_none">
					{{ trans('messages.lbl_cash') }}
				</h2>
				@endif
				
				
				<h2 class="pull-left mt10">・</h2>
				<h2 class="pull-left mt10">
					<span class="green">
						{{ trans('messages.lbl_register') }}
					</span>
				</h2>
			</div>
		</div>
		<div class="col-xs-14 expenadd mt20">
			<fieldset>
				<div class="col-xs-12 mt5" >
				
					<div align="center" class="mt5 ">
						
						<a id="expenses_btn" class="btn btn-success button"  onclick="javascript:expensesrdo('1','{{ $request->mainmenu }}')" > {{ trans('messages.lbl_expenses') }}</a>

						<a id="transfer_btn" class="btn btn-success button" onclick="javascript:transferrdo('2','{{ $request->mainmenu }}')" > {{ trans('messages.lbl_transfer') }}</a>

						<a style="text-align: center !important;" id="pettycash_btn" class="btn btn-success button" onclick="javascript:pettycashrdo('3','{{ $request->mainmenu }}')" > {{ trans('messages.lbl_pettycash') }}</a>

						<a id="loan_btn" class="btn btn-success button" onclick="javascript:loanprocess('4','{{ $request->mainmenu }}')"> {{ trans('messages.lbl_loan') }}</a>

						<a id="cash_btn" class="btn btn-success button" onclick="javascript:cashprocess('5','{{ $request->mainmenu }}')"> {{ trans('messages.lbl_cash') }}</a>

						<a id="others_btn" class="btn btn-success button" onclick="javascript:otherprocess('6','{{ $request->mainmenu }}')"> {{ trans('messages.lbl_Others') }}</a>
			
				<br><br>
						<div class="row hline " >
						</div>
					</div>
				</div>
					<br>
					<!-- <div class="mt10">
						<div class="col-xs-1 ml215 clr_blue">
							<label>{{ trans('messages.lbl_mtype') }}</label>
						</div>
							{{ Form::radio('multiradio','1','',array('id'=>'expenses1', 
																	'name' => 'multiradio',
																	'style' => 'margin-bottom:5px;',
																	'onclick' => 'expensesrdo("expenses");')) }}
							<label for="expenses1" style="font-weight: normal;"> &nbsp{{ trans('messages.lbl_expenses') }} &nbsp</label>
							{{ Form::radio('multiradio','2','',array('id'=>'transfer', 
																	'name' => 'multiradio',
																	'style' => 'margin-bottom:5px;',
																	'onclick' => 'transferrdo("transfer");')) }}
							<label for="transfer" style="font-weight: normal;"> &nbsp{{ trans('messages.lbl_transfer') }} &nbsp</label>
							{{ Form::radio('multiradio','3','',array('id'=>'pettycash', 
																	'name' => 'multiradio',
																	'style' => 'margin-bottom:5px;',
																	'onclick' => 'pettycashrdo("pettyCash");')) }}
							<label for="pettycash" style="font-weight: normal;"> &nbsp{{ trans('messages.lbl_pettycash') }} &nbsp</label>
					</div> -->
					<br>
					<div class="col-xs-12 mt10" id="empselect">
						<div class="col-xs-3 text-right clr_blue mr5">
							<label>{{ trans('messages.lbl_empName') }}</label>
						</div>
						<div class="box25per fll pl15">
							{{ Form::hidden('emp_IDs','',array('id'=>'emp_IDs')) }}
		                    {{ Form::text('txt_empname',null,array('id'=>'txt_empname', 'name' => 'txt_empname',
		                                                        'class'=>'form-control',
		                                                        'readonly','readonly','data-label' => trans('messages.lbl_empName'))) }}
						</div>
						<div class="col-xs-3 mr25">
			                    <button type="button" id="bnkpopup" class="btn btn-success box75 pt3 h30" style ="color:white;background-color: green;cursor: pointer;" onclick="return popupenable('{{ $request->mainmenu }}');">{{ trans('messages.lbl_Browse') }}</button> 
						</div>
					</div>
					<div class="col-xs-12 mt10">
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_Date') }}<span class="fr ml2 red"> * </span></label>
						</div>
						<div class="col-xs-9">
							{{ Form::text('date','',array('id'=>'date', 
																	'name' => 'date',
																	 'autocomplete' => 'off',
																	'data-label' => trans('messages.lbl_Date'),
																	'class'=>'box12per form-control pl5 dob')) }}
							<label class="mt10 ml2 fa fa-calendar fa-lg" for="date" aria-hidden="true"></label>
							@if($request->mainmenu=="company_transfer")
								<a href="javascript:getdate();" class="anchorstyle">
								<img title="Current Date" class="box15" src="{{ URL::asset('resources/assets/images/add_date.png') }}"></a>
							@else 
								<a href="javascript:getdate();" class="anchorstyle display_none">
								<img title="Current Date" class="box15" src="{{ URL::asset('resources/assets/images/add_date.png') }}"></a>
							@endif
							&nbsp;&nbsp;{{ Form::checkbox('accessrights', 1,'',['id' => 'accessrights',
																				'checked'=>'checked']) }}
							&nbsp;<label for="accessrights"><span class="grey fb">{{ trans('messages.lbl_accessrights') }}</span></label>
						</div>
					</div>
					<div class="col-xs-12 mt5 mainsub">
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_mainsubject') }}<span class="fr ml2 red"> * </span></label>
						</div>
						<div class="col-xs-9">
							@if($request->mainmenu=="expenses" || $request->mainmenu=="company_transfer")
								{{ Form::select('mainsubject',[null=>'']+ $getsubject,'',array('name' =>'mainsubject',
															'id'=>'mainsubject',
															'data-label' => trans('messages.lbl_mainsubject'),
															'onchange'=>'javascript:fngetsubsubjects(this.value);',
															'style'=>'width:22%',
															'class'=>'pl5'))}}
							@else
								{{ Form::select('mainsubject',[null=>'']+ $getpettysubject,'',array('name' =>'mainsubject',
															'id'=>'mainsubject',
															'data-label' => trans('messages.lbl_mainsubject'),
															'onchange'=>'javascript:fngetpettysubsubjects(this.value);',
															'style'=>'width:22%',
															'class'=>'pl5'))}}
							@endif
						</div>
					</div>
					<div class="col-xs-12 mt5 subsub">
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_subsubject') }}<span class="fr ml2 red"> * </span></label>
						</div>
						<div class="col-xs-9">
							{{ Form::select('subsubject',[null=>''],'', array('name' =>'subsubject',
																				'id'=>'subsubject',
																				'style'=>'min-width:100px;',
																				'data-label' => trans('messages.lbl_subsubject'),
																				'class'=>'pl5 box35per widthauto'))}}
						</div>
					</div>
					<div class="col-xs-12 mt5 display_none cashbank">
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_bank') }}<span class="fr ml2 red"> * </span></label>
						</div>
						<div class="col-xs-9">
							{{ Form::select('bank',[null=>'']+$sql,'',array('name' =>'bank',
																				'id'=>'bank',
																				'data-label' => trans('messages.lbl_bank'),
																				'onchange'=>'javascript:getselectedTexts(this.value);',
																				'class'=>'pl5 widthauto'))}}
																				
							{{ Form::select('transfer',[null=>'']+$sql,'',array('name' =>'transfer',
																				'id'=>'transfer',
																				'data-label' =>  trans('messages.lbl_bank'),
																				'style' => 'display:none;',
																				'class'=>'pl5 widthauto'))}}
						</div>
					</div>
					<div class="col-xs-12 mt5 display_none transaction">
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_transaction') }}<span class="fr ml2 red"> * </span></label>
						</div>
						<div class="col-xs-9 mt2">
							<label style="font-weight: normal;">
			                  {{ Form::radio('transtype', '1', '', array('id' =>'transtype',
			                                                                'name' => 'transtype',
			                                                                'onkeypress'=>'return numberonly(event)',
			                                                                'style' => 'margin-bottom:5px;',
																			'data-label' => trans('messages.lbl_transaction'),
			                                                                'onchange' => 'debitAmount()',
			                                                                'class' => '')) }}
			                  &nbsp {{ trans('messages.lbl_debit') }} &nbsp
			                </label>
			                <label style="font-weight: normal;">
			                  {{ Form::radio('transtype', '2', '', array('id' =>'transtype1',
			                                                                'name' => 'transtype',
			                                                                'style' => 'margin-bottom:5px;',
																			'data-label' => trans('messages.lbl_transaction'),
			                                                                'onchange' => 'creditAmount()',
			                                                                'class' => 'transtype1')) }}
			                  &nbsp {{ trans('messages.lbl_credit') }} &nbsp
			                </label>
			                <label style="font-weight: normal;">
			                  {{ Form::radio('transtype', '3', '', array('id' =>'transtype2',
			                                                                'name' => 'transtype',
			                                                                'style' => 'margin-bottom:5px;',
																			'data-label' => trans('messages.lbl_transaction'),
			                                                                'onchange' => 'banktransferselect()',
			                                                                'class' => '')) }}
			                  &nbsp {{ trans('messages.lbl_transfer') }} &nbsp
			                </label>
						</div>
					</div>
					<!-- <div class="col-xs-12 mt5 display_none bankname"> -->
					@if($request->mainmenu=="company_transfer")
						<div class="col-xs-12 mt5 display_none bankname">
							<div class="col-xs-3 text-right clr_blue">
								<label>{{ trans('messages.lbl_bank_name') }}<span class="fr ml2 red"> * </span></label>
							</div>
							<div class="col-xs-9">
								{{ Form::select('bankname',[null=>'']+ $bankname,'',array(
																			'id'=>'bankname',
																			'name' => 'bankname',
																			'class'=>'widthauto ime_mode_active',
																			'maxlength' => 10,
																			'onchange'=>'javascript:fngetloanname(this.value);',
																			'data-label' => trans('messages.lbl_bank_name'))) }}
							</div>
						</div>
					@else
						<div class="col-xs-12 mt5 display_none bankname">
							<div class="col-xs-3 text-right clr_blue">
								<label>{{ trans('messages.lbl_bank_name') }}<span class="fr ml2 red"> * </span></label>
							</div>
							<div class="col-xs-9">
								{{ Form::select('bankname',[null=>'']+ $bankname,'',array(
																			'id'=>'bankname',
																			'name' => 'bankname',
																			'class'=>'widthauto ime_mode_active',
																			'maxlength' => 10,
																			'onchange'=>'javascript:fngetloanname(this.value);',
																			'data-label' => trans('messages.lbl_bank_name'))) }}
							</div>
						</div>
					@endif
					<div class="col-xs-12 mt5 display_none banknameloan">
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_bank_name') }}<span class="fr ml2 red"> * </span></label>
						</div>
						<div class="col-xs-9">
							{{ Form::select('bankname',[null=>''] + $banknameloan,'',array(
																		'id'=>'banknameloan',
																		'name' => 'banknameloan',
																		'class'=>'widthauto ime_mode_active',
																		'maxlength' => 10,
																		'onchange'=>'javascript:fngetloanname(this.value);',
																		'data-label' => trans('messages.lbl_bank_name'))) }}
						</div>
					</div>
					<!-- </div> -->
				
		
		<div class="col-xs-12 mt5 display_none loanname">
			<div class="col-xs-3 text-right clr_blue">
				<label>{{ trans('messages.lbl_loanname') }}<span class="fr ml2 red"> * </span></label>
			</div>
			<div class="col-xs-9">
				{{ Form::select('loanname',[null=>''],'',array(
															'id'=>'loanname',
															'name' => 'loanname',
															'class'=>'widthauto ime_mode_active loanname',
															'maxlength' => 10,
															'style'=>'min-width:100px;',
															'onchange'=>'javascript:fnSetLoanNo(this.id);',
															'data-label' => trans('messages.lbl_bank_name'))) }}
				<span class="pl5 fwb" style="color: brown;" id="empidd"></span>
			</div>
		</div>
		<div class="col-xs-12 mt5 display_none loantype">
			<div class="col-xs-3 text-right clr_blue">
				<label>{{ trans('messages.lbl_loantype') }}<span class="fr ml2 red"> * </span></label>
			</div>
			<div class="col-xs-9">
				{{ Form::select('loantype',[null=>''] + $loantype,'',array(
															'id'=>'loantype',
															'name' => 'loantype',
															'class'=>'widthauto ime_mode_active',
															'maxlength' => 10,
															'data-label' => trans('messages.lbl_bank_name'))) }}
			</div>
		</div>
		<div class="col-xs-12 mt5 amount" >
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_amount') }}<span class="fr ml2 red"> * </span></label>
						</div>
						<div class="col-xs-9">
							{{ Form::text('amount','0',array('id'=>'amount', 
																	'name' => 'amount',
																	'style'=>'text-align:right;',
																	'maxlength' => 14,
																	'onblur' => 'return fnSetZero11(this.id);',
																	'onfocus' => 'return fnRemoveZero(this.id);',
																	'onclick' => 'return fnRemoveZero(this.id);',
																	'data-label' => trans('messages.lbl_amount'),
																	'onkeyup'=>'javascript:fnMoneyFormat(this.id,"jp");javascript:fnMoneyFormatcashadd(this.name, this.value);',
																	'onkeypress'=>'return isNumberFormat(event);',
																	'class'=>'box15per form-control pl5 ime_mode_disable')) }}
						</div>
					</div>
	
					@if($request->mainmenu=="company_transfer")
						<div class="col-xs-12 mt5 charge">
							<div class="col-xs-3 text-right clr_blue ">
								<label>{{ trans('messages.lbl_charge') }}<span class="fr ml2 red"> * </span></label>
							</div>
							<div class="col-xs-9">
								@php 
								$fee = 0;
								if(isset($query[0]->fee)) {
									$fee = number_format($query[0]->fee);
								} 
								@endphp
								{{ Form::text('charge_1',(isset($fee)) ? $fee : 0,array(
																			'id'=>'charge_1',
																			'name' => 'charge_1',
																			'maxlength' => '14',
																			'style'=>'text-align:right;padding-right:4px;',
																			'class'=>'box15per ime_mode_disable',
																			'onblur' => 'return fnSetZero11(this.id);',
																			'onfocus' => 'return fnRemoveZero(this.id);',
																			'onclick' => 'return fnRemoveZero(this.id);',
																			'onkeyup'=>'return fnMoneyFormat(this.id,"jp");',
																			'onkeypress'=>'return numberonly(event)',
																			'data-label' => trans('messages.lbl_charge'))) }}
							</div>
						</div>
					@else
						<div class="col-xs-12 mt5 display_none charge">
							<div class="col-xs-3 text-right clr_blue">
								<label>{{ trans('messages.lbl_charge') }}<span class="fr ml2 red"> * </span></label>
							</div>
							<div class="col-xs-9">
								@php 
								$fee = 0;
								if(isset($query[0]->fee)) {
									$fee = number_format($query[0]->fee);
								} 
								@endphp
								{{ Form::text('charge_1',(isset($fee)) ? $fee : 0,array(
																			'id'=>'charge_1',
																			'name' => 'charge_1',
																			'maxlength' => '14',
																			'style'=>'text-align:right;padding-right:4px;',
																			'class'=>'box15per ime_mode_disable',
																			'onblur' => 'return fnSetZero11(this.id);',
																			'onfocus' => 'return fnRemoveZero(this.id);',
																			'onclick' => 'return fnRemoveZero(this.id);',
																			'onkeyup'=>'return fnMoneyFormat(this.id,"jp");',
																			'onkeypress'=>'return numberonly(event)',
																			'data-label' => trans('messages.lbl_charge'))) }}
							</div>
						</div>
					@endif
		<div class="col-xs-12 mt5 display_none interest">
			<div class="col-xs-3 text-right clr_blue">
				<label>{{ trans('messages.lbl_interest') }}<span class="fr ml2 red"> * </span></label>
			</div>
			<div class="col-xs-9">
				{{ Form::text('interest',(isset($query[0]->fee)) ? $query[0]->fee : '',array(
										'id'=>'interest',
										'name' => 'interest',
 										'style'=>'text-align:right;padding-right:4px;',
										'onkeypress'=>'return interestcheck(event)',
										'class'=>'box5per ime_mode_disable',
										'data-label' => trans('messages.lbl_interest'))) }}
				<span>&nbsp;%</span>
			</div>
		</div>
		
				<!-- @if($request->mainmenu == "Cash")
								<div class="col-xs-12 mt5">
							@else
								<div class="col-xs-12 mt10">
							@endif
								<div class="col-xs-3 text-right clr_blue">
									<label>{{ trans('messages.lbl_Date') }}<span class="fr ml2 red"> * </span></label>
								</div>
								<div class="col-xs-9">
									@if($request->mainmenu == "Cash")
										{{ Form::text('date',array('id'=>'date', 
																			'name' => 'date',
																			'data-label' => trans('messages.lbl_Date'),
																			'class'=>'box11per form-control pl5 dob')) }}
									
									@endif
									<label class="mt10 ml2 fa fa-calendar fa-lg" for="date" aria-hidden="true"></label>
									
								</div>
							</div> -->
					<div class="col-xs-12 mt5 bill" >
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_bill') }}<span class="fr ml2 red" style="visibility: hidden;"> * </span></label>
						</div>
						<div class="col-xs-9">
							{{ Form::file('file1',array(
													'class' => 'pull-left box350',
													'id' => 'file1',
													'name' => 'file1',
													'style' => 'height:23px;',
													'data-label' => trans('messages.lbl_bill'))) }}
							<span>&nbsp;(Ex: Image File Only)</span>
							&nbsp;&nbsp;{{ Form::checkbox('receipt', 1,'',['id' => 'receipt','name' => 'receipt']) }}
							&nbsp;<label for="receipt" id="receipts"><span class="grey fb">{{ trans('messages.lbl_receipt') }}</span></label>
						</div>
					</div>
					<div class="col-xs-12 mt5">
						<div class="col-xs-3 text-right clr_blue">
							<label>{{ trans('messages.lbl_remarks') }}<span class="fr ml2 red" style="visibility: hidden;"> * </span></label>
						</div>
						<div class="col-xs-9">
							{{ Form::textarea('remarks','', 
			                        array('name' => 'remarks','id' => 'remarks',
			                              'class' => 'box40per form-control','size' => '30x4')) }}
						</div>
					</div>

					<div class="col-xs-12 mt10"></div>
			</fieldset>
			<fieldset style="background-color: #DDF1FA;">
				<div class="form-group">
					<div align="center" class="mt5">
						<button type="submit" class="btn btn-success add box100 multiaddeditprocess ml5">
							<i class="fa fa-plus" aria-hidden="true"></i> {{ trans('messages.lbl_register') }}
						</button>
						<a onclick="javascript:gotoindex('index','{{ $request->mainmenu }}');" class="btn btn-danger box120 white"><i class="fa fa-times" aria-hidden="true"></i> {{trans('messages.lbl_cancel')}}
						</a>

					</div>
				</div>
			</fieldset>
		</div>
		</div>
	{{ Form::close() }}
	{{ Form::open(array('name'=>'expmultiaddeditcancel', 'id'=>'expmultiaddeditcancel', 'url' => 'Expenses/addeditprocess?mainmenu='.$request->mainmenu.'&time='.date('YmdHis'),'files'=>true,'method' => 'POST')) }}
		{{ Form::hidden('mainmenu', $request->mainmenu , array('id' => 'mainmenu')) }}
		{{ Form::hidden('plimit', $request->plimit , array('id' => 'plimit')) }}
		{{ Form::hidden('page', $request->page , array('id' => 'page')) }}
		{{ Form::hidden('selMonth', $request->selMonth, array('id' => 'selMonth')) }}
		{{ Form::hidden('selYear', $request->selYear, array('id' => 'selYear')) }}
	    {{ Form::hidden('lang',Session::get('languageval') , array('id' => 'lang')) }}
	{{ Form::close() }}
	<div id="empnamepopup" class="modal fade">
        <div id="login-overlay">
            <div class="modal-content">
                <!-- Popup will be loaded here -->
            </div>
        </div>
    </div>
</article>
</div>
@endsection