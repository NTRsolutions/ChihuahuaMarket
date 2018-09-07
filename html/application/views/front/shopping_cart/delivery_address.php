
<?php 
  if($this->session->userdata('user_login')== "yes"){ 
    $user       = $this->session->userdata('user_id'); 
    $user_data  = $this->db->get_where('user',array('user_id'=>$user))->row(); 
    $username   = $user_data->username;
    $surname    = $user_data->surname;  
    $email      = $user_data->email; 
    $phone      = $user_data->phone; 
    $address1   = $user_data->address1; 
    $address2   = $user_data->address2; 
    $langlat    = $user_data->langlat; 
    $address    = $address1.$address2;
    $zip        = $user_data->zip; 
  } 
?>

<div class="row ">
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control required" value="<?php echo $username ;?>" name="firstname" type="text" placeholder="<?php echo translate('first_name');?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control required" value="<?php echo $surname ;?>" name="lastname" type="text" placeholder="<?php echo translate('last_name');?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <input class="form-control required address" name="address1" value="<?php echo $address1; ?>" type="text" placeholder="<?php echo translate('address_line_1');?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <input class="form-control required address" name="address2" value="<?php echo $address2; ?>" type="text" placeholder="<?php echo translate('address_line_2');?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input class="form-control required address" name="country" id="country" value="<?php echo $country; ?>" type="text" placeholder="<?php echo translate('country');?>">
            <input class="form-control required" type="hidden" name="country_code" id="country_code">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input class="form-control required address" name="state" id="state" value="<?php echo $state; ?>" type="text" placeholder="<?php echo translate('state');?>">
            <input class="form-control required" type="hidden" name="state_code" id="state_code">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input class="form-control required address" name="city" id="city" value="<?php echo $city; ?>" type="text" placeholder="<?php echo translate('city');?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input class="form-control required"  name="zip" type="text" value="<?php echo $zip; ?>" placeholder="<?php echo translate('postcode/ZIP');?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input class="form-control required" value="<?php echo $email ;?>" name="email" type="text" placeholder="<?php echo translate('email');?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <link rel="stylesheet" href="<?php echo base_url(); ?>/template/common/cssflags/intlTelInput.css">
            <input class="form-control required" value="<?php echo $phone ;?>" name="phone" id="phone" type="tel" placeholder="<?php echo translate('phone_number');?>">
        </div>
    </div>

    <div class="col-sm-12" id="lnlat" style="display:none;">
        <div class="form-group">
            <div class="col-sm-12">
                <input id="langlat" value="" type="text" placeholder="langitude - latitude" name="langlat" class="form-control" readonly>
            </div>
        </div>
    </div>
    <!--div class="col-sm-12" id="maps" style="height:400px;">
        <div class="form-group">
            <div id="map-canvas" style="height:400px;">
            </div>
        </div>
    </div-->

    <div class="col-md-12" style="display:none;">
        <div class="checkbox">
            <label>
                <input type="checkbox"> 
                <?php echo translate('ship_to_different_address_for_invoice');?>
            </label>
        </div>
    </div>


    <div class="col-md-12">
        <span class="btn btn-theme-dark" onclick="load_payments();">
            <?php echo translate('next');?>
        </span>
    </div>

</div>


<input type="hidden" id="first" value="yes"/>
<script src="<?php echo base_url(); ?>/template/common/plugins/jquery/typeahead.js"></script>
<script src="<?php echo base_url(); ?>/template/common/plugins/js/get_states_cities.js"></script>
<script src="<?php echo base_url(); ?>/template/common/plugins/js/intlTelInput.js"></script>

<script>
  $("#phone").intlTelInput({
  initialCountry: "mx"});
</script>
<script type="text/javascript">
    //$(document ).ready(function() {
    //    set_cart_map();
    //});
</script>