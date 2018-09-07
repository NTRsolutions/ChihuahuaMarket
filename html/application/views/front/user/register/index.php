<section class="page-section color get_into">
    <div class="container">
        <div class="row margin-top-0">
            <div class="col-sm-8 col-sm-offset-2">
                <!--div class="logo_top">
                    <a href="<?php echo base_url()?>">
                        <img class="img-responsive" src="<?php echo $this->crud_model->logo('home_bottom_logo'); ?>" alt="Shop" style="z-index:200">
                    </a>
                </div-->
				<?php
                    echo form_open(base_url() . 'home/registration/add_info/', array(
                        'class' => 'form-login',
                        'method' => 'post',
                        'id' => 'sign_form'
                    ));
                    $fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
                    $g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
                ?>
                	<div class="row box_shape">
                        <div class="title">
                            <?php echo translate('customer_registration');?>
                            <div class="option">
                            	<?php echo translate('already_a_member_?_click_to_');?>
                                <?php
									if ($this->crud_model->get_type_name_by_id('general_settings','58','value') !== 'ok') {
								?>
                                <a href="<?php echo base_url(); ?>home/login_set/login"> 
                                    <?php echo translate('login');?>!
                                </a>
                                <?php
									}else{
								?>
                                <a href="<?php echo base_url(); ?>home/login_set/login"> 
                                    <?php echo translate('login');?>! <?php echo translate('as_customer');?>
                                </a>
                                <?php echo translate('_or_');?>
                                <a href="<?php echo base_url(); ?>home/vendor_logup/registration"> 
                                    <?php echo translate('sign_up');?>! <?php echo translate('as_vendor');?>
                                </a>
                                <?php
									}
								?>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control required" name="username" type="text" placeholder="<?php echo translate('first_name');?>" data-toggle="tooltip" title="<?php echo translate('first_name');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control required" name="surname" type="text" placeholder="<?php echo translate('last_name');?>" data-toggle="tooltip" title="<?php echo translate('last_name');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control emails required" name="email" type="email" placeholder="<?php echo translate('email');?>" data-toggle="tooltip" title="<?php echo translate('email');?>">
                            </div>
                            <div id='email_note'></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <link rel="stylesheet" href="<?php echo base_url(); ?>/template/common/cssflags/intlTelInput.css">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="<?php echo translate('phone');?>" data-toggle="tooltip" title="<?php echo translate('phone');?>">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <input class="form-control pass1 required" type="password" name="password1" placeholder="<?php echo translate('password');?>" data-toggle="tooltip" title="<?php echo translate('password');?>">
                            </div>
                            <div id="pass_stat"></div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control pass2 required" type="password" name="password2" placeholder="<?php echo translate('confirm_password');?>" data-toggle="tooltip" title="<?php echo translate('confirm_password');?>">
                            </div>
                            <div id='pass_note'></div> 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control required" name="address1" type="text" placeholder="<?php echo translate('address_line_1');?>" data-toggle="tooltip" title="<?php echo translate('address_line_1');?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control required" name="address2" type="text" placeholder="<?php echo translate('address_line_2');?>" data-toggle="tooltip" title="<?php echo translate('address_line_2');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control required" type="text" name="country" id="country" placeholder="<?php echo translate('country');?>" data-toggle="tooltip" title="<?php echo translate('country');?>">
                                <input class="form-control required" type="hidden" name="country_code" id="country_code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control required" type="text" name="state" id="state" placeholder="<?php echo translate('state');?>" data-toggle="tooltip" title="<?php echo translate('state');?>">
                                <input class="form-control required" type="hidden" name="state_code" id="state_code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control required" type="text" name="city" id="city" placeholder="<?php echo translate('city');?>" data-toggle="tooltip" title="<?php echo translate('city');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <input class="form-control required" name="zip" type="text" placeholder="<?php echo translate('zip');?>" data-toggle="tooltip" title="<?php echo translate('zip');?>">
                            </div>
                        </div>
                        <div class="col-md-12 terms">
                            <input  name="terms_check" type="checkbox" value="ok" > 
                            <?php echo translate('i_agree_with');?>
                            <a href="<?php echo base_url();?>home/legal/terms_conditions" target="_blank">
                                <?php echo translate('terms_&_conditions');?>
                            </a>
                        </div>
                        <?php
							if($this->crud_model->get_settings_value('general_settings','captcha_status','value') == 'ok'){
						?>
                        <div class="col-md-12">
                            <div class="outer required">
                                <div class="form-group">
                                    <?php echo $recaptcha_html; ?>
                                </div>
                            </div>
                        </div>
                        <?php
							}
						?>
                        <div class="col-md-12">
                            <span class="btn btn-theme-sm btn-block btn-theme-dark pull-right logup_btn" data-ing='<?php echo translate('registering..'); ?>' data-msg="">
                                <?php echo translate('register');?>
                            </span>
                        </div>
                        <!--- Facebook and google login -->
                        <?php if($fb_login_set == 'ok' || $g_login_set == 'ok'){ ?>
                            <div class="col-md-12 col-lg-12">
                                <h2 class="login_divider"><span>or</span></h2>
                            </div>
                        <?php if($fb_login_set == 'ok'){ ?>
                            <div class="col-md-12 col-lg-6 <?php if($g_login_set !== 'ok'){ ?>mr_log<?php } ?>">
                                <?php if (@$user): ?>
                                    <a class="btn btn-theme btn-block btn-icon-left facebook" href="<?= $url ?>">
                                        <i class="fa fa-facebook"></i>
                                        <?php echo translate('sign_in_with_facebook');?>
                                    </a>
                                <?php else: ?>
                                    <a class="btn btn-theme btn-block btn-icon-left facebook" href="<?= $url ?>">
                                        <i class="fa fa-facebook"></i>
                                        <?php echo translate('sign_in_with_facebook');?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php } if($g_login_set == 'ok'){ ?>  
                            <div class="col-md-12 col-lg-6 <?php if($fb_login_set !== 'ok'){ ?>mr_log<?php } ?>">
                                <?php if (@$g_user): ?>
                                    <a class="btn btn-theme btn-block btn-icon-left google" style="background:#ce3e26" href="<?= $g_url ?>">
                                        <i class="fa fa-google"></i>
                                        <?php echo translate('sign_in_with_google');?>
                                    </a>
                               <?php else: ?>
                                    <a class="btn btn-theme btn-block btn-icon-left google" style="background:#ce3e26" href="<?= $g_url ?>">
                                        <i class="fa fa-google"></i>
                                        <?php echo translate('sign_in_with_google');?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
            	</form>
            </div>
        </div>
    </div>
</section>
<style>
	.get_into .terms a{
		margin:5px auto;
		font-size: 14px;
		line-height: 24px;
		font-weight: 400;
		color: #00a075;
		cursor:pointer;
		text-decoration:underline;
	}
	
	.get_into .terms input[type=checkbox] {
		margin:0px;
		width:15px;
		height:15px;
		vertical-align:middle;
	}
</style>

<script>

 window.js_lang={'00':'<?php echo translate('password_too_short');?>',
 '10':'<?php echo translate('password_weak');?>',
 '01':'<?php echo translate('password_good');?>',
 '11':'<?php echo translate('password_strong');?>',
 passnotmatch:'<?php echo translate('passwords_do_not_match');?>',
 passmatch:'<?php echo translate('passwords_match');?>',
 choose_one:'<?php echo translate('choose_one');?>',
 empty:'<?php echo translate('empty');?>'};
</script>
<script src="<?php echo base_url(); ?>/template/common/plugins/jquery/typeahead.js"></script>
<script src="<?php echo base_url(); ?>/template/common/plugins/js/intlTelInput.js"></script>
<script>
  $("#phone").intlTelInput();
</script>
<script src="<?php echo base_url(); ?>template/common/plugins/js/passwordscheck.js"></script>
<script src="<?php echo base_url(); ?>/template/common/plugins/js/get_states_cities.js"></script>