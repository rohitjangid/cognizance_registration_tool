function partsum()
{
	var index = parseInt($("#cidcount").val());
	var sum=0;
	var i=1;
	while(i<=index)
	{
		sum = sum + parseInt($("#pfees"+i).val());
		sum = sum + parseInt($("#wfees"+i).val());
		i++;
	}
	$("#part_sum").val(sum);
	sumcheck();
}

function ddsum()
{
	var index = parseInt($("#ddcount").val());
	var sum=0;
	var i=1;
	while(i<=index)
	{
		sum = sum + parseInt($("#ddamount"+i).val());
		i++;
	}
	$("#dd_sum").val(sum);
	sumcheck();
}

function sumcheck()
{
	var part=parseInt($("#part_sum").val());
	var dd=parseInt($("#dd_sum").val());
	if(dd==part)
	{
		$("#submit").removeClass("btn-danger");
		$("#submit").addClass("btn-success");
		$("#submit").removeAttr("disabled");
	}
	else
	{
		$("#submit").addClass("btn-danger");
		$("#submit").removeClass("btn-success");
		$("#submit").attr('disabled','disabled');
	}
}

function ciddata(count)
{
	$.post("ciddata.php",{ cid: $("#cogniid"+count).val() },function(data) {
		var result = data.split(";");
		var length = result.length;
		if(length==2)
		{
			$("#pfees"+count).val(result[0]);
			$("#wfees"+count).val(result[1]);
			partsum();
		}
		else
		{
			$("#pfees"+count).val("0");
			$("#wfees"+count).val("0");
			partsum();
		}
	});
}


jQuery.expr[':'].focus = function( elem ) {
  return elem === document.activeElement && ( elem.type || elem.href );
};


$(document).ready(function(){
	$(document.body).on('keyup',function(){
		var curr = $(":focus").data('count');
		ciddata(curr);
		
		ddsum();
	});
	
	
	$(document.body).on('click','.addcid',function(){
		$(".addcid").hide();
		var index = parseInt($("#cidcount").val())+1;
		$("#cidcount").val(index);
		var data = "<tr>";
		data+="<td>";
		data+="<span class='glyphicon glyphicon-plus addcid'></span>";
		data+="</td>";
		data+="<td>"
		data+="<div class='form-group'>";
		data+="<label for='cogniid' class='col-sm-3 control-label'>COG14/</label>";
		data+="<div class='col-sm-9 controls'>";
		data+="<input type='number' class='form-control cid-control' id='cogniid"+index+"' name='cogniid"+index+"' data-count='"+index+"' required>";
		data+="</div>";
		data+="</div>";
		data+="</td>";
		data+="<td>";
		data+="<div class='form-group'>";
		data+="<div class='col-sm-12 controls'>";
		data+="<input type='number' class='form-control' id='pfees"+index+"' name='pfees"+index+"' value='0' disabled>";
		data+="</div>";
		data+="</div>";
		data+="</td>";
		data+="<td>";
		data+="<div class='form-group'>";
		data+="<div class='col-sm-12 controls'>";
		data+="<input type='number' class='form-control' id='wfees"+index+"' name='wfees"+index+"' value='0' disabled>";
		data+="</div>";
		data+="</div>";
		data+="</td>";
		data+="<td>";
		data+="<div class='form-group'>";
		data+="<div class='col-sm-12 controls'>";
		data+="<input type='text' class='form-control' id='event"+index+"' name='event"+index+"' value='' required>";
		data+="</div>";
		data+="</div>";
		data+="</td>";
		data+="</tr>";
		
		
		$(".appending-table1").append(data);
	});
	
	
	
	$(document.body).on('click','.adddd',function(){
		$(".adddd").hide();
		var index = parseInt($("#ddcount").val())+1;
		$("#ddcount").val(index);
		var data = "<tr>";
		data+="<td>";
		data+="<span class='glyphicon glyphicon-plus adddd'></span>";
		data+="</td>";
		data+="<td>";
		data+="<div class='form-group'>";
		data+="<div class='col-sm-12 controls'>";
		data+="<select class='form-control cid-control' id='bankname"+index+"' name='bankname"+index+"' data-count='"+index+"' required>";
		data+="<option value='Online'>Online</option>";
		data+="<option value='Punjab National Bank'>Punjab National Bank</option>";
		data+="<option value='State Bank of India'>State Bank of India</option>";
		data+="<option value='Allahabad Bank'>Allahabad Bank</option>";
		data+="<option value='Andhra Bank'>Andhra Bank</option>";
		data+="<option value='Bank of Baroda'>Bank of Baroda</option>";
		data+="<option value='Bank of India'>Bank of India</option>";
		data+="<option value='Bank of Maharashtra'>Bank of Maharashtra</option>";
		data+="<option value='Bhartiya Mahila Bank'>Bhartiya Mahila Bank</option>";
		data+="<option value='Canara Bank'>Canara Bank</option>";
		data+="<option value='Central Bank of India'>Central Bank of India</option>";
		data+="<option value='Corporation Bank'>Corporation Bank</option>";
		data+="<option value='Dena Bank'>Dena Bank</option>";
		data+="<option value='IDBI Bank'>IDBI Bank</option>";
		data+="<option value='Indian Bank'>Indian Bank</option>";
		data+="<option value='Indian Overseas Bank'>Indian Overseas Bank</option>";
		data+="<option value='Oriental Bank of Commerce'>Oriental Bank of Commerce</option>";
		data+="<option value='Punjab and Sind Bank'>Punjab and Sind Bank</option>";
		data+="<option value='Syndicate Bank'>Syndicate Bank</option>";
		data+="<option value='UCO Bank'>UCO Bank</option>";
		data+="<option value='Union Bank of India'>Union Bank of India</option>";
		data+="<option value='United Bank of India'>United Bank of India</option>";
		data+="<option value='Vijaya Bank'>Vijaya Bank</option>";
		data+="<option value='State Bank of Bikaner & Jaipur'>State Bank of Bikaner & Jaipur</option>";
		data+="<option value='State Bank of Hyderabad'>State Bank of Hyderabad</option>";
		data+="<option value='State Bank of Mysore'>State Bank of Mysore</option>";
		data+="<option value='State Bank of Patiala'>State Bank of Patiala</option>";
		data+="<option value='State Bank of Travancore'>State Bank of Travancore</option>";
		data+="<option value='State bank of Saurashtra'>State bank of Saurashtra</option>";
		data+="<option value='State Bank of Indore'>State Bank of Indore</option>";
		data+="<option value='Axis Bank'>Axis Bank</option>";
		data+="<option value='Catholic Syrian Bank'>Catholic Syrian Bank</option>";
		data+="<option value='City Union Bank'>City Union Bank</option>";
		data+="<option value='Development Credit Bank'>Development Credit Bank</option>";
		data+="<option value='Dhanlaxmi Bank'>Dhanlaxmi Bank</option>";
		data+="<option value='Federal Bank'>Federal Bank</option>";
		data+="<option value='HDFC Bank'>HDFC Bank</option>";
		data+="<option value='ICICI Bank'>ICICI Bank</option>";
		data+="<option value='Induslnd Bank'>Induslnd Bank</option>";
		data+="<option value='ING Vysya Bank'>ING Vysya Bank</option>";
		data+="<option value='Karnataka Bank'>Karnataka Bank</option>";
		data+="<option value='Karur Vysya Bank'>Karur Vysya Bank</option>";
		data+="<option value='Kotak Mahindra Bank'>Kotak Mahindra Bank</option>";
		data+="<option value='Lakshmi Vilas Bank'>Lakshmi Vilas Bank</option>";
		data+="<option value='Nainital Bank'>Nainital Bank</option>";
		data+="<option value='Tamilnadu Mercantile Bank'>Tamilnadu Mercantile Bank</option>";
		data+="<option value='South Indian Bank'>South Indian Bank</option>";
		data+="<option value='YES Bank'>YES Bank</option>";
		data+="<option value='UP Agro Corporation Bank'>UP Agro Corporation Bank</option>";
		data+="<option value='Abu Dhabi Commercial Bank'>Abu Dhabi Commercial Bank</option>";
		data+="<option value='Australia and New Zealand Bank'>Australia and New Zealand Bank</option>";
		data+="<option value='Bank Internasional Indonesia'>Bank Internasional Indonesia</option>";
		data+="<option value='Bank of America'>Bank of America</option>";
		data+="<option value='Bank of Bahrain and Kuwait'>Bank of Bahrain and Kuwait</option>";
		data+="<option value='Bank of Ceylon'>Bank of Ceylon</option>";
		data+="<option value='Bank of Nova Scotia'>Bank of Nova Scotia</option>";
		data+="<option value='Bank of Tokyo Mitsubishi'>Bank of Tokyo Mitsubishi</option>";
		data+="<option value='Barclays Bank'>Barclays Bank</option>";
		data+="<option value='BNP Paribas'>BNP Paribas</option>";
		data+="<option value='Calyon Bank'>Calyon Bank</option>";
		data+="<option value='Chinatrust Commercial Bank'>Chinatrust Commercial Bank</option>";
		data+="<option value='Citibank'>Citibank</option>";
		data+="<option value='Credit Suisse'>Credit Suisse</option>";
		data+="<option value='Commonwealth Bank'>Commonwealth Bank</option>";
		data+="<option value='DBS Bank'>DBS Bank</option>";
		data+="<option value='HSBC'>HSBC</option>";
		data+="<option value='JPMorgan Chase Bank'>JPMorgan Chase Bank</option>";
		data+="<option value='Royal Bank of Scotland'>Royal Bank of Scotland</option>";
		data+="<option value='Standard Chartered Bank'>Standard Chartered Bank</option>";
		data+="<option value='State Bank of Mauritius'>State Bank of Mauritius</option>";
		data+="<option value='UBS'>UBS</option>";
		data+="<option value='Woori Bank'>Woori Bank</option>";
		data+="</select>";
		data+="</div>";
		data+="</div>";
		data+="</td>";
		data+="<td>";
		data+="<div class='form-group'>";
		data+="<div class='col-sm-12 controls'>";
		data+="<input type='number' class='form-control' id='ddnumber"+index+"' name='ddnumber"+index+"'>";
		data+="</div>";
		data+="</div>";
		data+="</td>";
		data+="<td>";
		data+="<div class='form-group'>";
		data+="<div class='col-sm-12 controls'>";
		data+="<input type='number' class='form-control' id='ddamount"+index+"' name='ddamount"+index+"'>";
		data+="</div>";
		data+="</div>";
		data+="</td>";
		data+="<td></td>";
		data+="<td></td>";
		data+="</tr>";
		
		
		$(".appending-table2").append(data);
	});
});
