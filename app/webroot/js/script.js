function show5(){document.getElementById("div1").style.display="block",document.getElementById("div2").style.display="none",document.getElementById("div3").style.display="none",document.getElementById("div4").style.display="none"}function show2(){document.getElementById("div2").style.display="block",document.getElementById("div1").style.display="none",document.getElementById("div3").style.display="none",document.getElementById("div4").style.display="none"}function show3(){document.getElementById("div3").style.display="block",document.getElementById("div1").style.display="none",document.getElementById("div2").style.display="none",document.getElementById("div4").style.display="none"}function show4(){document.getElementById("div4").style.display="block",document.getElementById("div1").style.display="none",document.getElementById("div3").style.display="none",document.getElementById("div2").style.display="none"};
//
$(".dropdown").hover(function(){$(this).addClass("show"),$("div",this).addClass("show"),$("ul",this).addClass("show")},function(){$(this).removeClass("show"),$("div",this).removeClass("show"),$("ul",this).removeClass("show")},function(){}),$(".dropdown").click(function(){$(this).addClass("show"),$("div",this).addClass("show"),$("ul",this).addClass("show")},function(){$(this).removeClass("show"),$("div",this).removeClass("show"),$("ul",this).removeClass("show")},function(){});
//
$(document).ready(function(){$("#Next").click(function(){$("#steps2").addClass("active"),$("#steps1").removeClass("active")})});
	$(document).ready(function(){$("#ref").click(function(){$("#steps3").addClass("active"),$("#steps2").removeClass("active")})});
	$(document).ready(function(){$("#steps33").click(function(){$("#steps55").addClass("active"),$("#steps44").removeClass("active")})});	

	////////
	for(i=0;i<=20;i++){lightGallery(document.getElementById("lightgallery"+i))};
	/////
	$('.hero-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		mouseDrag: false,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		items: 1,
		autoplay: true
	});

	/////
	function PreviousTab(s){$("#profile"+s).addClass("in active show"),$("#buzz"+s).removeClass("in active show"),$("#step1"+s).addClass("active"),$("#step2"+s).removeClass("active")}
	function NextTab(e){
		$("#references"+e).addClass("in active show"),$("#buzz"+e).removeClass("in active show"),$("#step3"+e).addClass("active"),$("#step2"+e).removeClass("active")
		setTimeout(function(){ $(".btnenabO"+e).prop("disabled",false);	}, 2000);
	}
	function PRETab(e){$("#references"+e).removeClass("in active show"),$("#buzz"+e).addClass("in active show"),$("#step2"+e).addClass("active"),$("#step3"+e).removeClass("active");
	                   $(".btnenabO"+e).prop("disabled",true);
    }
	function IFunction(s){$("#Iprofile"+s).removeClass("in active show"),$("#Ibuzz"+s).addClass("in active show"),$("#Istep2"+s).addClass("active"),$("#Istep1"+s).removeClass("active")}
	function IPreviousTab(s){$("#Iprofile"+s).addClass("in active show"),$("#Ibuzz"+s).removeClass("in active show"),$("#Istep1"+s).addClass("active"),$("#Istep2"+s).removeClass("active")}
	function IPRETab(e){$("#Ireferences"+e).removeClass("in active show"),$("#Ibuzz"+e).addClass("in active show"),$("#Istep2"+e).addClass("active"),$("#Istep3"+e).removeClass("active")}
	function OPreviousTab(s){$("#I1step"+s).addClass("in active show"),$("#I2step"+s).removeClass("in active show"),$("#2Istep"+s).removeClass("active"),$("#1Istep"+s).addClass("active")}
	function ONextTab(s){$("#I1step"+s).removeClass("in active show"),$("#I2step"+s).addClass("in active show"),$("#2Istep"+s).addClass("active"),$("#1Istep"+s).removeClass("active")}
	function INextTab(e) {
		if(document.getElementById("sent" + e).value == ""){
			document.getElementById("lsent"+e).style.display = "block";
		}else if(($('#YD' + e).is(":checked") || $('#DD' + e).is(":checked") || $('#ND' + e).is(":checked")) && ($('#YM' + e).is(":checked") || $('#DM' + e).is(":checked") || $('#NM' + e).is(":checked")) && ($('#YE' + e).is(":checked") || $('#DE' + e).is(":checked") || $('#NE' + e).is(":checked"))){
			document.getElementById("lsent"+e).style.display = "none";
			$("#Ireferences" + e).addClass("in active show");
			$("#Ibuzz" + e).removeClass("in active show");
			$("#Istep3" + e).addClass("active");
			$("#Istep2" + e).removeClass("active");
		}else{
			document.getElementById("lmsent"+e).style.display = "block";
			var element = document.getElementById("disbl"+e);
			element.classList.add("disabled");
		}
	}
	//sentinal velidation
	function sentinal(e){
		var i = document.getElementById("sent" + e).value;
        var j  = i.length
		if( j =="6" || j =="7"){
	
			document.getElementById("lsent"+e).style.display = "none";
			document.getElementById("l6sent"+e).style.display = "none";
			var element = document.getElementById("disbl"+e);
			element.classList.remove("disabledd");
		}else{
			document.getElementById("lsent"+e).style.display = "none";
			document.getElementById("l6sent"+e).style.display = "block";
			var element = document.getElementById("disbl"+e);
			element.classList.add("disabledd");
		}
	}
	   ///
	   var _ROOT="https://" + window.location.hostname;
	    function myFunctionss(e){var t=e.value,n=_ROOT+"/courses/"+t;""==document.getElementById("coursess").value?document.getElementById("screen").classList.add("disbbtn"):(document.getElementById("screen").href=n,document.getElementById("screen").classList.remove("disbbtn"),document.getElementById("coursesr").value="")}
	   function myFunctionsss(e){var s=e.value,t=_ROOT+"/courses/"+s;""==document.getElementById("coursesr").value?document.getElementById("screen").classList.add("disbbtn"):(document.getElementById("screen").href=t,document.getElementById("screen").classList.remove("disbbtn"),document.getElementById("coursess").value="")}
	   //////org rail velidation
	   function orgRail(obj){
		var x, text;
		x1 = document.getElementById("fn1m"+obj).value;
		y1 = document.getElementById("last1m"+obj).value;
		if (x1=="" || y1==""){
		document.getElementById("m"+obj).disabled=true;
	  } else {
		document.getElementById("m"+obj).disabled=false;
	  }
	  
	 }
/////

function NextTab1(e){
	x1 = document.getElementById("f1n"+e).value;
	y1 = document.getElementById("l1n"+e).value;
	z1 = document.getElementById("s1n"+e).value;
	zl1 = z1.length;
	if (x1=="" || y1=="" || z1 == ""){
	document.getElementById("n"+e).disabled=true;
  } else if(zl1 == "6" || zl1 == "7"){
	document.getElementById("msg"+e).style.display = "none";
	document.getElementById("n"+e).disabled=false;
  }else{
	document.getElementById("msg"+e).style.display = "block";
	document.getElementById("n"+e).disabled=true;
  }
  
}
//// add cscript non Rail Course 
//Addfeild
$(document).ready(function() {
    var e = 1;
    $(".AddField").click(function() {
        var t = this.id,
            l = $(this).data("id"),
            a = document.getElementById("4" + t).value,
			o = document.getElementById("5" + t).value;
			$(".removeButton").css("display", "inline-block");
		if (e > 11) {
			document.getElementById("allowbox"+l).style.display = "block";
			return false;
		}
        var d = $(document.createElement("div")).attr("id", "TextBoxDiv" + e);
        d.after().html('<div class="row"><div class="col-lg-2"><label class="form-text">First Name</label><input type="text" class="contactmodal valid" name="data[first_name][]" placeholder="First Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-2"><label class="form-text">Last Name</label><input type="text" class="contactmodal valid" name="data[last_name][]" placeholder="Last Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-2"><label class="form-text">Sentinel Number</label><input type="tel" class="contactmodal" name="data[sentinel][]" maxlength="7" placeholder="Sentinel Number"></div><div class="col-lg-3 dollar"><label class="form-text">Price Per Delegate (excl VAT)</label><input type="text" class="contactmodal valid input" name="data[delegate_price][]" readonly="true" value="" placeholder="Price Per Delegate (excl VAT)" id="exc' + e + '"><p class="dollarsign">&#163;</p></div><div class="col-lg-3 dollar"><label class="form-text">Price Per Delegate (Incl VAT)</label><input type="text" class="contactmodal valid newdd" name="data[delegate_price][]" readonly="true" value=""  placeholder="Price Per Delegate (Incl VAT)" id="inc' + e + '"><p class="dollarsign">&#163;</p></div></div>'), d.appendTo("#" + t), document.getElementById("exc" + e).value = a, document.getElementById("inc" + e).value = o;
        var n = 1 * o,
            c = parseFloat(o * e) + parseFloat(n);
        document.getElementById("TotVal" + l).value = c;
        var r = 1 * a,
            s = parseFloat(a * e) + parseFloat(r);
        document.getElementById("TotExVal" + l).value = s, e++
    }), $("body").on("click", ".removeButton", function() {
		
		e--, $("#TextBoxDiv" + e).remove();
		
		var t = this.id,
		
            l = document.getElementById("TotVal" + t).value,
            a = document.getElementById("5sTextBoxesGroup" + t).value,
            o = parseFloat(l) - parseFloat(a);
        document.getElementById("TotVal" + t).value = o;
        var d = document.getElementById("TotExVal" + t).value,
            n = document.getElementById("4sTextBoxesGroup" + t).value,
            c = parseFloat(d) - parseFloat(n);
		document.getElementById("TotExVal" + t).value = c;
		document.getElementById("allowbox"+t).style.display = "none";
		if (1 == e) return $(".removeButton").css("display", "none");
		!1;

    })
});
//
$(document).ready(function() {
    var e = 1;
    $(".AddField1").click(function() {
        var t = this.id,
            a = $(this).data("id"),
            l = document.getElementById("1" + t).value,
			o = document.getElementById("2" + t).value;
			$(".removeButton1").css("display", "inline-block");
			if (e > 11) {
				document.getElementById("allowboxs"+a).style.display = "block";
				return false;
			}
        var d = $(document.createElement("div")).attr("id", "TextBoxDivss" + e);
        d.after().html('<div class="row"><div class="col-lg-3"><label class="form-text">First Name</label><input type="text" class="contactmodal valid" name="data[first_name][]" placeholder="First Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-3"><label class="form-text">Last Name</label><input type="text" class="contactmodal valid" name="data[last_name][]" placeholder="Last Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-3 dollar"><label class="form-text">Price Per Delegate (excl VAT)</label><input type="text" class="contactmodal valid" name="data[delegate_price][]" id="excs' + e + '" placeholder="Price Per Delegate (excl VAT)" ><p class="dollarsign">&#163;</p></div><div class="col-lg-3 dollar"><label class="form-text">Price Per Delegate (Incl VAT)</label><input type="text" class="contactmodal valid" name="data[delegate_price][]"  id="incs' + e + '"  placeholder="Price Per Delegate (Incl VAT)" ><p class="dollarsign">&#163;</p></div></div>'), d.appendTo("#" + t), document.getElementById("excs" + e).value = l, document.getElementById("incs" + e).value = o;
        var c = 1 * l,
            s = parseFloat(l * e) + parseFloat(c);
        document.getElementById("totalexcs" + a).value = s;
        var n = 1 * o,
            r = parseFloat(o * e) + parseFloat(n);
        document.getElementById("totalincs" + a).value = r, e++
    }), $("body").on("click", ".removeButton1", function() {
        
        e--, $("#TextBoxDivss" + e).remove();
        var t = this.id,
            a = document.getElementById("totalexcs" + t).value,
            l = document.getElementById("1TextBoxesGroup1" + t).value,
            o = parseFloat(a) - parseFloat(l);
        document.getElementById("totalexcs" + t).value = o;
        var d = document.getElementById("totalincs" + t).value,
            c = document.getElementById("2TextBoxesGroup1" + t).value,
            s = parseFloat(d) - parseFloat(c);
		document.getElementById("totalincs" + t).value = s;
		document.getElementById("allowboxs"+t).style.display = "none";
		if (1 == e) return $(".removeButton").css("display", "none"); !1;
    })
});  
//
function NextResult(e){
    $("#profile"+e).removeClass("in active show");
    $("#buzz"+e).addClass("in active show");
    $("#step2" + e).addClass("active"); 
    $("#step1" + e).removeClass("active");
    $(document).on("blur", ".textexcl1s"+e, function() {
        var sum = 0;
        $(".textexcl"+e).each(function(){
        //  alert($(this).val());
            sum += +$(this).val();
        });
        var sum1 = 0;
        $(".textincl"+e).each(function(){
        //  alert($(this).val());
            sum1 += +$(this).val();
        });
        document.getElementById("totalexcs"+e).value = sum;
        document.getElementById("totalincs"+e).value = sum1;
    });
}

////  add Rail Course 
function myfu(obj){
    $('#buzz'+obj).addClass('in active show');
    $('#profile'+obj).removeClass('in active show');
    $('#step2'+obj).addClass('active');
    $('#step1'+obj).removeClass('active');
    $(document).on("blur", ".ddlSelect"+obj, function() {
        var sum = 0;
        $(".ddlSelect"+obj).each(function(){
        //  alert($(this).val());
            sum += +$(this).val();
        });
        var sum1 = 0;
        $(".excvat"+obj).each(function(){
        //  alert($(this).val());
            sum1 += +$(this).val();
        });
        document.getElementById("TotExVal"+obj).value = sum1;
        document.getElementById("TotVal"+obj).value = sum;
    });

}

// Courses Condition (Personal Track Safety (PTS) (AC + DCCR) Initial)
function DisableDrug3(){
	if ($('#YD3').is(":checked") && $('#YM3').is(":checked") && $('#YE3').is(":checked")){
		var element = document.getElementById("disbl3");
		element.classList.remove("disabled");
		document.getElementById("cmsg3").style.display = "none";
		document.getElementById("lmsent3").style.display = "none";
	} else {
		document.getElementById("cmsg3").style.display = "block";
		document.getElementById("lmsent3").style.display = "none";
		var element = document.getElementById("disbl3");
		element.classList.add("disabled")
	}
}

// Courses Condition (Personal Track Safety (PTS) (AC + DCCR) Recert)
function DisableDrug5(){
	if ($('#DD5').is(":checked") || $('#ND5').is(":checked") || $('#DM5').is(":checked") || $('#NM5').is(":checked")){
		var element = document.getElementById("disbl5");
		element.classList.add("disabled");
		document.getElementById("cmsg5").style.display = "block";
		document.getElementById("lmsent5").style.display = "none";
		
	} else {
		document.getElementById("cmsg5").style.display = "none";
		document.getElementById("lmsent5").style.display = "none";
		var element = document.getElementById("disbl5");
		element.classList.remove("disabled")
	}
}

//Working Near or Adjacent to the DC Conductor Rail (PTS DCCR)
function DisableDrug6(){

		if ($('#YD6').is(":checked") && $('#YM6').is(":checked") && $('#YE6').is(":checked")){
			var element = document.getElementById("disbl6");
			element.classList.remove("disabled");
			document.getElementById("cmsg6").style.display = "none";
			document.getElementById("lmsent6").style.display = "none";
		} else {
			document.getElementById("cmsg6").style.display = "block";
			document.getElementById("lmsent6").style.display = "none";
			var element = document.getElementById("disbl6");
			element.classList.add("disabled")
		}
	}

	// Courses Condition COSS Initial incl OLP/CRP (Incl DCCR Recert) inc theory & (COSS CRP LLT)
function DisableDrug7(){
	if ($('#DD7').is(":checked") || $('#ND7').is(":checked") || $('#DM7').is(":checked") || $('#NM7').is(":checked")) {

		var element = document.getElementById("disbl7");
		element.classList.add("disabled");
		document.getElementById("cmsg7").style.display = "block";
		document.getElementById("lmsent7").style.display = "none";
	} else {
		document.getElementById("cmsg7").style.display = "none";
		document.getElementById("lmsent7").style.display = "none";
		var element = document.getElementById("disbl7");
		element.classList.remove("disabled")
	}
}

	// Courses Condition COSS - Controller of Site Safety  - POST MENTORNING ASSESSMENT (Within 4 months)
	function DisableDrug8(){
		if ($('#DD8').is(":checked") || $('#ND8').is(":checked") || $('#DM8').is(":checked") || $('#NM8').is(":checked")){
			var element = document.getElementById("disbl8");
			element.classList.add("disabled");
			document.getElementById("cmsg8").style.display = "block";
			document.getElementById("lmsent8").style.display = "none";
		} else {		
			document.getElementById("cmsg8").style.display = "none";
			document.getElementById("lmsent8").style.display = "none";
			var element = document.getElementById("disbl8");
			element.classList.remove("disabled")
		}
	}
		// Courses Condition COSS - Controller of Site Safety - INTERIM ASSESSMENT
		function DisableDrug9(){
			if ($('#DD9').is(":checked") || $('#ND9').is(":checked") || $('#DM9').is(":checked") || $('#NM9').is(":checked")){
				var element = document.getElementById("disbl9");
				element.classList.add("disabled");
				document.getElementById("cmsg9").style.display = "block";
				document.getElementById("lmsent9").style.display = "none";
				
			} else {
				document.getElementById("cmsg9").style.display = "none";
				document.getElementById("lmsent9").style.display = "none";
				var element = document.getElementById("disbl9");
				element.classList.remove("disabled")
			}
		}
				// Courses Condition COSS Recert OLP/CRP (Inc DCCR Recert)
				function DisableDrug10(){
					if ($('#DD10').is(":checked") || $('#ND10').is(":checked") || $('#DM10').is(":checked") || $('#NM10').is(":checked")){
						var element = document.getElementById("disbl10");
						element.classList.add("disabled");
						document.getElementById("cmsg10").style.display = "block";
						document.getElementById("lmsent10").style.display = "none";
						
					} else {
						document.getElementById("cmsg10").style.display = "none";
						document.getElementById("lmsent10").style.display = "none";
						var element = document.getElementById("disbl10");
						element.classList.remove("disabled")
					}
				}

					// Courses Condition Individual Working Alone (IWA)
					function DisableDrug11(){
						if ($('#DD11').is(":checked") || $('#ND11').is(":checked") || $('#DM11').is(":checked") || $('#NM11').is(":checked")){
							var element = document.getElementById("disbl11");
							element.classList.add("disabled");
							document.getElementById("cmsg11").style.display = "block";
							document.getElementById("lmsent11").style.display = "none";
						} else {    					
							document.getElementById("cmsg11").style.display = "none";
							document.getElementById("lmsent11").style.display = "none";
							var element = document.getElementById("disbl11");
							element.classList.remove("disabled");
						}
					}

						// Courses Condition Individual Working Alone (IWA) RECERT
						function DisableDrug12(){
							if ($('#DD12').is(":checked") || $('#ND12').is(":checked") || $('#DM12').is(":checked") || $('#NM12').is(":checked")){
								var element = document.getElementById("disbl12");
								element.classList.add("disabled");
								document.getElementById("cmsg12").style.display = "block";
								document.getElementById("lmsent12").style.display = "none";
							} else {
								document.getElementById("cmsg12").style.display = "none";
								document.getElementById("lmsent12").style.display = "none";
								var element = document.getElementById("disbl12");
								element.classList.remove("disabled");
							}
						}

							// Courses Condition Lookout (LKT) Initial 
							function DisableDrug13(){
								if ($('#DD13').is(":checked") || $('#ND13').is(":checked") || $('#DM13').is(":checked") || $('#NM13').is(":checked")){
									var element = document.getElementById("disbl13");
									element.classList.add("disabled");
									document.getElementById("cmsg13").style.display = "block";
									document.getElementById("lmsent13").style.display = "none";
								} else {
									document.getElementById("cmsg13").style.display = "none";
									document.getElementById("lmsent13").style.display = "none";
									var element = document.getElementById("disbl13");
									element.classList.remove("disabled")
								}
							}
	

							// Courses Condition Lookout (LKT) Recert
							function DisableDrug14(){
								if ($('#DD14').is(":checked") || $('#ND14').is(":checked") || $('#DM14').is(":checked") || $('#NM14').is(":checked")){
									var element = document.getElementById("disbl14");
									element.classList.add("disabled");
									document.getElementById("cmsg14").style.display = "block";
									document.getElementById("lmsent14").style.display = "none";
									
								} else {
									document.getElementById("cmsg14").style.display = "none";
									document.getElementById("lmsent14").style.display = "none";
									var element = document.getElementById("disbl14");
									element.classList.remove("disabled")
								}
							}
	
							// Level B - Strapping (inc testing) 
							function DisableDrug15(){
								if ($('#DD15').is(":checked") || $('#ND15').is(":checked") || $('#DM15').is(":checked") || $('#NM15').is(":checked")){
									var element = document.getElementById("disbl15");
									element.classList.add("disabled");
									document.getElementById("cmsg15").style.display = "block";
									document.getElementById("lmsent15").style.display = "none";
								} else {
									document.getElementById("cmsg15").style.display = "none";
									document.getElementById("lmsent15").style.display = "none";
									var element = document.getElementById("disbl15");
									element.classList.remove("disabled")
								}
							}

							//Level B - Switching 
							function DisableDrug16(){
								if ($('#DD16').is(":checked") || $('#ND16').is(":checked") || $('#DM16').is(":checked") || $('#NM16').is(":checked")){
									var element = document.getElementById("disbl16");
									element.classList.add("disabled");
									document.getElementById("cmsg16").style.display = "block";
									document.getElementById("lmsent16").style.display = "none";
								
								} else {
									document.getElementById("cmsg16").style.display = "none";
									document.getElementById("lmsent16").style.display = "none";
									var element = document.getElementById("disbl16");
									element.classList.remove("disabled")
								}
							}
							// OLEC 1 -Access Overhead Lines Construction Sites. 
							function DisableDrug17(){
								if ($('#DD17').is(":checked") || $('#ND17').is(":checked") || $('#DM17').is(":checked") || $('#NM17').is(":checked")){

									var element = document.getElementById("disbl17");
									element.classList.add("disabled");
									document.getElementById("cmsg17").style.display = "block";
									document.getElementById("lmsent17").style.display = "none";
								} else {
																	
									document.getElementById("cmsg17").style.display = "none";
									document.getElementById("lmsent17").style.display = "none";
									var element = document.getElementById("disbl17");
									element.classList.remove("disabled");
								}
							}

							// Track Induction Full (inc  PTS AC - DCCR)
							function DisableDrug18(){
								if ($('#YD18').is(":checked") && $('#YM18').is(":checked") && $('#YE18').is(":checked")) {
								
									document.getElementById("cmsg18").style.display = "none";
									document.getElementById("lmsent18").style.display = "none";
									var element = document.getElementById("disbl18");
									element.classList.remove("disabled")
								} else {
									var element = document.getElementById("disbl18");
									element.classList.add("disabled");
									document.getElementById("cmsg18").style.display = "block";
									document.getElementById("lmsent18").style.display = "none";
								}
							}

								// Track Induction 
								function DisableDrug19(){
									if ($('#DD19').is(":checked") || $('#ND19').is(":checked") || $('#DM19').is(":checked") || $('#NM19').is(":checked")){
										var element = document.getElementById("disbl19");
										element.classList.add("disabled");
										document.getElementById("cmsg19").style.display = "block";
										document.getElementById("lmsent19").style.display = "none";
									} else {						
										document.getElementById("cmsg19").style.display = "none";
										document.getElementById("lmsent19").style.display = "none";
										var element = document.getElementById("disbl19");
										element.classList.remove("disabled")
								}
							}
	
								// Safe System of Work Planner  (SSOW) Initial
								function DisableDrug20(){
									if ($('#DD20').is(":checked") || $('#ND20').is(":checked") || $('#DM20').is(":checked") || $('#NM20').is(":checked")){
										var element = document.getElementById("disbl20");
										element.classList.add("disabled");
										document.getElementById("cmsg20").style.display = "block";
										document.getElementById("lmsent20").style.display = "none";
									} else {
										document.getElementById("cmsg20").style.display = "none";
										document.getElementById("lmsent20").style.display = "none";
										var element = document.getElementById("disbl20");
										element.classList.remove("disabled");
									}
								}
									// Safe System of Work Planner  (SSOW)  Conversion / Recert
									// 21 Done
									function DisableDrug21(){
										if ($('#DD21').is(":checked") || $('#ND21').is(":checked") || $('#DM21').is(":checked") || $('#NM21').is(":checked")){
									       var element = document.getElementById("disbl21");
											element.classList.add("disabled");
											document.getElementById("cmsg21").style.display = "block";
											document.getElementById("lmsent21").style.display = "none";
										} else {
											document.getElementById("cmsg21").style.display = "none";
											document.getElementById("lmsent21").style.display = "none";
											var element = document.getElementById("disbl21");
											element.classList.remove("disabled");
										}
									}
									
							// OLEC 1 - Recert 
							function DisableDrug22(){
								if ($('#DD22').is(":checked") || $('#ND22').is(":checked") || $('#DM22').is(":checked") || $('#NM22').is(":checked")){
									var element = document.getElementById("disbl22");
									element.classList.add("disabled");
									document.getElementById("cmsg22").style.display = "block";
									document.getElementById("lmsent22").style.display = "none";
								} else {
									document.getElementById("cmsg22").style.display = "none";
									document.getElementById("lmsent22").style.display = "none";
									var element = document.getElementById("disbl22");
									element.classList.remove("disabled")
								}
							}

							// Protection Controller (PC)
							function DisableDrug23(){
								if ($('#DD23').is(":checked") || $('#ND23').is(":checked") || $('#DM23').is(":checked") || $('#NM23').is(":checked")){
									var element = document.getElementById("disbl23");
									element.classList.add("disabled");
									document.getElementById("cmsg23").style.display = "block";
									document.getElementById("lmsent23").style.display = "none";
								} else {
									document.getElementById("cmsg23").style.display = "none";
									document.getElementById("lmsent23").style.display = "none";
									var element = document.getElementById("disbl23");
									element.classList.remove("disabled")
								}
							}
								// AOD LXA LEVEL CROSSING ATTENDANT
								function DisableDrug24(){
									if ($('#DD24').is(":checked") || $('#ND24').is(":checked") || $('#DM24').is(":checked") || $('#NM24').is(":checked")){
										var element = document.getElementById("disbl24");
										element.classList.add("disabled");
										document.getElementById("cmsg24").style.display = "block";
										document.getElementById("lmsent24").style.display = "none";
									} else {
										document.getElementById("cmsg24").style.display = "none";
										document.getElementById("lmsent24").style.display = "none";
										var element = document.getElementById("disbl24");
										element.classList.remove("disabled")
									}
								}
                               /// Industry Common Induction (ICI-NR) Assessment
								function DisableDrug1(){
					
										if ($('#YD1').is(":checked") || $('#YM1').is(":checked")){
										
											document.getElementById("cmsg1").style.display = "block";
											document.getElementById("lmsent1").style.display = "none";
											var element = document.getElementById("disbl1");
											element.classList.add("disabled")
										} else {
											var element = document.getElementById("disbl1");
											element.classList.remove("disabled");
											document.getElementById("cmsg1").style.display = "none";
											document.getElementById("lmsent1").style.display = "none";
										}
									}
								// Industry Common Induction.London Underground  Assessment (LU IND) inc eLearning 
									function DisableDrug2(){
								
										if ($('#YD2').is(":checked") || $('#YM2').is(":checked") || $('#DE2').is(":checked") || $('#NE2').is(":checked")){
											document.getElementById("cmsg2").style.display = "block";
											document.getElementById("lmsent2").style.display = "none";
											var element = document.getElementById("disbl2");
											element.classList.add("disabled")
										} else {								
											var element = document.getElementById("disbl2");
											element.classList.remove("disabled");
											document.getElementById("cmsg2").style.display = "none";
											document.getElementById("lmsent2").style.display = "none";
										}
									}
									//PTS E-learning
									function DisableDrug4(){
								
										if ($('#YD4').is(":checked") || $('#YM4').is(":checked")){

											document.getElementById("cmsg4").style.display = "block";
											document.getElementById("lmsent4").style.display = "none";
											var element = document.getElementById("disbl4");
											element.classList.add("disabled")
										} else {										
											var element = document.getElementById("disbl4");
											element.classList.remove("disabled");
											document.getElementById("cmsg4").style.display = "none";
											document.getElementById("lmsent4").style.display = "none";
											
										}
									}
