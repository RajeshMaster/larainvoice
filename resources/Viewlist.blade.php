@extends('layouts.app')
@section('content')
@php use App\Http\Helpers; @endphp
{{ HTML::style('resources/assets/css/common.css') }}
{{ HTML::style('resources/assets/css/widthbox.css') }}
{{ HTML::script('resources/assets/css/bootstrap.min.css') }}
{{ HTML::script('resources/assets/js/bankdetails.js') }}
{{ HTML::style('resources/assets/css/sidebar-bootstrap.min.css') }}
<script type="text/javascript">
	var datetime = '<?php echo date('Ymdhis'); ?>';
</script>
<style type="text/css">
	.alertboxalign {
		margin-bottom: -50px !important;
	}
	.alert {
		display:inline-block !important;
		height:30px !important;
		padding:5px !important;
	}
</style>
	<div class="CMN_display_block" id="main_contents">
	<!-- article to select the main&sub menu -->
	<article id="expenses" class="DEC_flex_wrapper " data-category="expenses expenses_sub_6">
	{{ Form::open(array('name'=>'bankdetailsview', 'id'=>'bankdetailsview', 'url' => 'Bankdetails/Viewlist?mainmenu='.$request->mainmenu.'&time='.date('YmdHis'),'files'=>true,
		  'method' => 'POST')) }}
		{{ Form::hidden('mainmenu', $request->mainmenu , array('id' => 'mainmenu')) }}
		{{ Form::hidden('plimit', $request->plimit , array('id' => 'plimit')) }}
		{{ Form::hidden('page', $request->page , array('id' => 'page')) }}
		{{ Form::hidden('id', $request->id , array('id' => 'id')) }}
		{{ Form::hidden('selMonth', $request->selMonth, array('id' => 'selMonth')) }}
		{{ Form::hidden('selYear', $request->selYear, array('id' => 'selYear')) }}
		{{ Form::hidden('prevcnt', $request->prevcnt, array('id' => 'prevcnt')) }}
		{{ Form::hidden('nextcnt', $request->nextcnt, array('id' => 'nextcnt')) }}
		{{ Form::hidden('account_val', $account_val, array('id' => 'account_val')) }}
		{{ Form::hidden('bankid', $request->bankid , array('id' => 'bankid')) }}
		{{ Form::hidden('bankname', $request->bankname , array('id' => 'bankname')) }}
		{{ Form::hidden('branchname', $request->branchname , array('id' => 'branchname')) }}
		{{ Form::hidden('accno', $request->accno , array('id' => 'accno')) }}
		{{ Form::hidden('startdate', $request->startdate , array('id' => 'startdate')) }}
		{{ Form::hidden('bankids', $request->bankids , array('id' => 'bankids')) }}
		{{ Form::hidden('branchids', $request->branchids , array('id' => 'branchids')) }}
		{{ Form::hidden('balbankid', $request->balbankid , array('id' => 'balbankid')) }}
		{{ Form::hidden('editflg', '' , array('id' => 'editflg')) }}
		{{ Form::hidden('balance', '' , array('id' => 'balance')) }}
		{{ Form::hidden('idcheck', '' , array('id' => 'idcheck')) }}
		{{ Form::hidden('pay', '' , array('id' => 'pay')) }}
		{{ Form::hidden('start_date', '' , array('id' => 'start_date')) }}
		{{ Form::hidden('checkflg', $request->checkflg  , array('id' => 'checkflg')) }}
		{{ Form::hidden('date_month', $date_month  , array('id' => 'date_month')) }}

	<!-- Start Heading -->
	<div class="row hline">
		<div class="col-xs-12" style="padding-left: 19px;">
			<img class="pull-left box35 mt10 ml10" src="{{ URL::asset('resources/assets/images/bank_1.png') }}">
			<h2 class="pull-left pl5 mt10 CMN_mw150">
				{{ $request->bankname }}-{{ $request->branchname }}-{{ $request->accno }}
			</h2>
		</div>
	</div>
	<div class="box100per pl15 pr15 mt10">
		<div class="mt10 mb10">
			{{ Helpers::displayYear_MonthEst($account_period, $year_month, $db_year_month, $date_month, $dbnext, $dbprevious, $last_year, $current_year, $account_val) }}
		</div>
	</div>
	<div class="col-xs-12">
		<!-- Session msg -->
		@if(Session::has('success'))
			<div align="center" class="alertboxalign" role="alert">
				<p class="alert {{ Session::get('alert', Session::get('type') ) }}">
	            	{{ Session::get('success') }}
	          	</p>
			</div>
		@endif
		@php Session::forget('success'); @endphp
		<!-- Session msg -->
			<div class="col-xs-6" style="text-align: left;margin-left: -15px;">
				<a href="javascript:gosingletoindex('{{ $request->mainmenu }}');" class="btn btn-info box80">
					<span class="fa fa-arrow-left"></span>
					{{ trans('messages.lbl_back') }}
				</a>
				<a href="javascript:gotoeditpage('{{ $startdate }}','{{ number_format($baln) }}','{{ $request->mainmenu }}',2);" class="btn btn-warning box100">
					<span class="fa fa-pencil"></span>
						{{ trans('messages.lbl_edit') }}
				</a>
			</div>
			<div class="col-xs-6 pull-right pt15" style="text-align: right;padding-right: 0px;">
				<span class="clr_blue fwb"> {{ trans('messages.lbl_balanceamt') }} :</span> <span class="fwb">¥ {{ $grandbal }}</span>
		</div>
	</div>
	<div class="pt43 minh350 pl15 pr15">
		<table class="tablealternate CMN_tblfixed">
			<colgroup>
				<col width="4%">
				<col width="8%">
				<col>
				<col width="10%">
				<col width="11%">
				<col width="15%">
				<col width="20%">
				<col width="3%">
			</colgroup>
			<thead class="CMN_tbltheadcolor">
				<tr>
					<th class="vam">{{ trans('messages.lbl_sno') }}</th>
					<th class="vam">{{ trans('messages.lbl_Date') }}</th>
					<th class="vam">{{ trans('messages.lbl_content') }}</th>
					<th class="vam">{{ trans('messages.lbl_credit') }}</th>
					<th class="vam">{{ trans('messages.lbl_debit') }}</th>
					<th class="vam">{{ trans('messages.lbl_balance') }}</th>
					<th class="vam" colspan="2">{{ trans('messages.lbl_remarks') }}</th>
				</tr>
	@if($fileCnt != 0)
				<tr height="25px;">
					<td colspan="8"  style="color:black;vertical-align:middle;border-bottom:1px dotted #136E83;"></td>
				</tr>
				<tr height="25px;"><td colspan="8"></td></tr>
				<tr style = "background-color:#acf5e2;" class="tax_data_name">
					<td class="tax_data_name"></td>
					<td class="tax_data_name tac">
						@if($previous_date == "")
							{{ $startdate }}
						@endif
					</td>
					<td class="tax_data_name">
						@if($previous_date != "")
							{{ trans('messages.lbl_brght_fwd') }}
						@else
							{{ trans('messages.lbl_ini_bal') }}
						@endif
					</td>
					<td class="tax_data_name"></td>
					<td class="tax_data_name tar"></td>
					<td class="tax_data_name tar">{{ number_format($balanc) }}</td>
					<td class="tax_data_name"></td>
					<td class="tax_data_name"></td>
				</tr>
				@if(count($fileCnt)!="")
					@for ($cnt=0; $cnt<$fileCnt;$cnt++)
					<tr>
						<td class="bor_rightbot_none text-center">
							{{ ($index->currentpage()-1) * $index->perpage() + $cnt + 1 }}
						</td>
						<td class="tac">
							@if(isset($get_bankdet[$cnt]['date']))
								{{ $get_bankdet[$cnt]['date'] }}
							@endif
						</td>
						<td>
							@if($get_bankdet[$cnt]['pamt']!="")
								{{ $get_bankdet[$cnt]['cmpny_name'] }}
							@elseif($get_bankdet[$cnt]['debit']!="")
								{{ trans('messages.lbl_cash_debit') }}
							@elseif($get_bankdet[$cnt]['fee']!="")
								{{ trans('messages.lbl_transferc') }}
							@elseif($get_bankdet[$cnt]['tamt']!="")
								@if(Session::get('languageval') == "en")
									{{ $get_mnsub[$cnt]['main_eng']."->".$get_mnsub[$cnt]['sub_eng'] }}
								@else
									{{ $get_mnsub[$cnt]['main_jap']."->".$get_mnsub[$cnt]['sub_jap'] }}
								@endif
							@elseif($get_bankdet[$cnt]['lfee']!="")
								{{ trans('messages.lbl_loan_c') }}
							@elseif($get_bankdet[$cnt]['lamt']!="")
								{{ trans('messages.lbl_loan_amt') }}
							@elseif($get_bankdet[$cnt]['samt']!="")
								{{ ucwords(strtolower($get_bankdet[$cnt]['lname'])).".".ucwords(mb_substr($get_bankdet[$cnt]['fname'],0,1,'UTF-8')) }}
							@elseif($get_bankdet[$cnt]['sfee']!="")
								{{ trans('messages.lbl_salary_c') }}
							@elseif($get_bankdet[$cnt]['credit']!="")
								@if($get_bankdet[$cnt]['paymentsam'] == 5)
									{{ $get_bankdet[$cnt]['cmpny_name'] }}
								@else
									{{ trans('messages.lbl_cash_credit') }}
								@endif
							@endif
						</td>
						<td class="tax_data_name tar">
							<?php if($get_bankdet[$cnt]['debit']!="") {
										echo number_format($get_bankdet[$cnt]['debit']);
									} else if($get_bankdet[$cnt]['tamt']!="") {
											echo number_format(str_replace("-", "", $get_bankdet[$cnt]['tamt']));
									} else if($get_bankdet[$cnt]['fee']!="") {
											echo number_format(str_replace("-", "", $get_bankdet[$cnt]['fee']));
									} else if($get_bankdet[$cnt]['lamt']!="") {
											echo number_format(str_replace("-", "", $get_bankdet[$cnt]['lamt']));
									} else if($get_bankdet[$cnt]['lfee']!="") {
											echo number_format(str_replace("-", "", $get_bankdet[$cnt]['lfee']));
									} else if($get_bankdet[$cnt]['samt']!="") {
											echo number_format(str_replace("-", "", $get_bankdet[$cnt]['samt']));
									} else if($get_bankdet[$cnt]['sfee']!="") {
											echo number_format(str_replace("-", "", $get_bankdet[$cnt]['sfee']));
									} 
							?>
						</td>
						<td class="tax_data_name tar">
							@php $tamt = ""; $tamt = str_replace("-", "", $get_bankdet[$cnt]['credit']);  @endphp
							@if(isset($get_bankdet[$cnt]['credit']))
								@if(isset($get_bankdet[$cnt]['credit']) && $get_bankdet[$cnt]['credit'] != "")
									{{ number_format($tamt) }}
								@else
								@endif
							@elseif(isset($get_bankdet[$cnt]['pamt']))
								{{ number_format($get_bankdet[$cnt]['pamt']) }}
							@endif
						</td>
						<td class="tax_data_name tar">
								<?php $x = 0; $recbalance = 0;
									if(isset($bal)) {
										$x=($request->plimit*$request->page)-($request->plimit);
										$recbalance = $bal[$cnt+$x];
										echo number_format($bal[$cnt+$x]);
									}
									?>
						</td>
						<td>
							@if(isset($get_bankdet[$cnt]['remarks']))
								{!! nl2br(e($get_bankdet[$cnt]['remarks'])) !!}
							@endif
							@php if ( (isset($get_bankdet[$cnt+1]['sfee']) && $get_bankdet[$cnt+1]['sfee'] != 0) || 
									(isset($get_bankdet[$cnt+1]['fee']) && $get_bankdet[$cnt+1]['fee'] != 0) || 
									(isset($get_bankdet[$cnt+1]['lfee']) && $get_bankdet[$cnt+1]['lfee'] != 0) )
										$get_bankdet[$cnt]['chk_flg'] = 0;
								@endphp
							@if($get_bankdet[$cnt]['chk_flg'] == 1)
								<span style="color: blue;margin: 70px;">
									@if($get_bankdet[$cnt]['remarks'] != "")
										<?php echo "<BR>"; ?>
									@endif
									{{ number_format($recbalance) }}
								</span>
							@endif
						</td>
						<td class="tac">
								@php if ( (isset($get_bankdet[$cnt+1]['sfee']) && $get_bankdet[$cnt+1]['sfee'] != 0) || 
									(isset($get_bankdet[$cnt+1]['fee']) && $get_bankdet[$cnt+1]['fee'] != 0) || 
									(isset($get_bankdet[$cnt+1]['lfee']) && $get_bankdet[$cnt+1]['lfee'] != 0) )
										$get_bankdet[$cnt]['chk_flg'] = 0;
								@endphp
							@if($get_bankdet[$cnt]['chk_flg'] == 1)
								<img src="{{ URL::asset('resources/assets/images/check.png') }}" class="box17">
							@endif
						</td>
					</tr>
					@php $payment = ""; $idcheck = "";
						$payment = $get_bankdet[$cnt]['paymentsam'];
						$idcheck = $get_bankdet[$cnt]['idcheck'];
						$checkflg = $get_bankdet[$cnt]['chk_flg'];
					@endphp
					@endfor
				@else
					<tr>
						<td class="text-center colred" colspan="9">
							{{ trans('messages.lbl_nodatafound') }}
						</td>
					</tr>
				@endif
					<tr style = "background-color:#acf5e2;" class="tax_data_name">
								<td class="tax_data_name"></td>
								<td class="tax_data_name tac"></td>
								<td class="tax_data_name">
									{{ trans('messages.lbl_car_fwd') }}
								</td>
								<td class="tax_data_name"></td>
								<td class="tax_data_name tar"></td>
								<td class="tax_data_name tar"><?php echo number_format($balances); ?></td>
								<td class="tax_data_name"></td>
								<td class="tax_data_name"></td>
							</tr>
			@else
			<tr>
				<td class="text-center colred" colspan="8">
					{{ trans('messages.lbl_nodatafound') }}
				</td>
			</tr>
			@endif
			</thead>
			<tbody>
			</tbody>
		</table>
	@if($fileCnt != 0)
		<div align="right" class="mt10 mr1per">
			@if($checkflg != "1")
				<a href="javascript:fnchk('{{ $payment }}','{{ $idcheck }}','{{ $request->mainmenu }}');" class="btn btn-success box100">
					Checked
				</a>
			@else
				<a style="padding:3px 4px;" title="Get Previous Salary" disabled = "disabled" class="btn btn-disabled disabled box100">
					<span class=""></span>
						Checked
				</a>
			@endif
		</div>
	</div>
	<div class="text-center pl14">
		@if(!empty($index->total()))
			<span class="pull-left mt24">
				{{ $index->firstItem() }} ~ {{ $index->lastItem() }} / {{ $index->total() }}
			</span>
		@endif 
		{{ $index->links() }}
		<div class="CMN_display_block flr pr14">
			{{ $index->linkspagelimit() }}
		</div>
	</div>
	@else
	@endif
	</article>
	{{ Form::close() }}
	</div>
@endsection
