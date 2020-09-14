<?php /**
* Payzone Payment Gateway
* ========================================
* Web:   http://payzone.co.uk
* Email:  online@payzone.com
* Authors: Payzone, Keith Rigby
*/

if (count(get_included_files()) ==1) {
    exit("Direct access not permitted.");
}

?>
<hr>
<div class='payzone-form-section'>
  <p class='payzone-form-header'>Customer Billing Details</p>
</div>
<div class='payzone-form-section'>
  <label for='CustomerName'>CustomerName</label>
  <input type="text" name="CustomerName" value="<?php echo (isset($_POST["CustomerName"]))?$_POST["CustomerName"]:null; ?>" />
  <label for='Address1'>Address1</label>
  <input type="text" name="Address1" value="<?php echo (isset($_POST["Address1"]))?$_POST["Address1"]:null; ?>" />
  <label for='Address2'>Address2</label>
  <input type="text" name="Address2" value="<?php echo (isset($_POST["Address2"]))?$_POST["Address2"]:null; ?>" />
  <label for='City'>City</label>
  <input type="text" name="City" value="<?php echo (isset($_POST["City"]))?$_POST["City"]:null; ?>" />
  <label for='State'>State</label>
  <input type="text" name="State" value="<?php echo (isset($_POST["State"]))?$_POST["State"]:null; ?>" />
  <label for='EmailAddress'>EmailAddress</label>
  <input type="text" name="EmailAddress" id="email" value="<?php echo (isset($_POST["EmailAddress"]))?$_POST["EmailAddress"]:null; ?>"
   onblur="validateemail(this);" onchange="validateemail(this)" oninput="this.onchange();"
    onkeyup="this.onchange();" onpaste="this.onchange();" autofocus="off" autocomplete="off"/>
  <p id="emailtext" style="display:none;color:red;font-size:12px">Please Enter Email</p>

  <label for='Number'>Mobile Number</label>
  <input type="text" name="Number" required  id="Number" maxlength="14" value="<?php echo (isset($_POST["Number"]))?$_POST["Number"]:null; ?>" 
  onblur="validatePhone(this);" onchange="validatePhone(this)" oninput="this.onchange();"
   onkeyup="this.onchange();" onpaste="this.onchange();"
   autofocus="off" autocomplete="off"/>
   <!-- <p id="phonetext" style="display:none;color:red;font-size:12px">Mobile Number Can Not Be Blank.</p> -->
  <!-- <input type="text" name="MobileNumber" id="number" maxlength="14" value="<?php //echo (isset($_POST["Number"]))?$_POST["Number"]:null; ?>" onblur="validateemail(this);" onchange="validateemail(this)" oninput="this.onchange();" onkeyup="this.onchange();" onpaste="this.onchange();" autofocus="off" autocomplete="off"/> -->
  <!-- <p id="numbertext" style="display:none;color:red;font-size:12px">Mobile Number</p> -->
  
  <label for='PostCode'>PostCode</label>
  <input type="text" name="PostCode" value="<?php echo (isset($_POST["PostCode"]))?$_POST["PostCode"]:null; ?>" />
  <label for='Country'>Country</label>
  <select name="Country">
    <?php echo $PayzoneHelper->getCountryDropDownlist( (isset($_POST["Country"]))? $_POST["Country"] :null);?>
  </select>
</div>
