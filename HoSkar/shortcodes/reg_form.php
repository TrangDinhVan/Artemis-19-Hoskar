<?php
add_shortcode( 'reg_form', function(){
    ob_start();
    if( !isset($_GET['action']) ): ?>
        <div class="reg_form register_form" v-cloak>
            <form action="">
                <input type="hidden" name="location" value="<?php the_title(); ?>">
                <input type="hidden" name="location_url" value="<?php the_permalink(); ?>">
                <div class="steps-label d-flex gap-1 lh-10 font-medium mb-6">
                    <div @click="step = 1" class="s" :class="{ active : step > 0 }">Step 1</div>
                    <div @click="step = 2" class="s" :class="{ active : step > 1 }">Step 2</div>
                </div>
                <div v-show="step == 1">
                    <div class="vstack gap-4">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <input type="text" name="f_name" placeholder="First Name*">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="l_name" placeholder="Last Name*">
                            </div>
                        </div>
                        <div class="row g-4 radios">
                            <div class="col-lg-6">
                                <div class="input d-flex gap-5 flex-wrap align-items-center">
                                    <span>Gender*</span>
                                    <div class="d-flex gap-3 gap-lg-5 ms-lg-auto">
                                        <label :class="{active: gender == 'Mr.'}" for="gender_mr"><input v-model="gender" id="gender_mr" type="radio" name="gender" value="Mr.">Mr.</label>
                                        <label :class="{active: gender == 'Ms.'}" for="gender_ms"><input v-model="gender" id="gender_ms" type="radio" name="gender" value="Ms.">Ms.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="phone" placeholder="Phone Number*">
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <input type="text" name="company" placeholder="Company*">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="company_email" placeholder="Company Email*">
                            </div>
                        </div>
                        <input type="text" name="title" placeholder="Title*">
                        <div class="radios">
                            <div class="input gap-5 d-flex align-items-center flex-wrap">
                                <span>Industry Field *</span>
                                <div class="d-flex gap-3 gap-sm-5 ms-lg-auto flex-wrap">
                                    <label :class="{active: industry == 'Hospitality'}" for="industry_one"><input v-model="industry" id="industry_one" type="radio" name="industry" value="Hospitality">Hospitality</label>
                                    <label :class="{active: industry == 'Real Estate'}" for="industry_two"><input v-model="industry" id="industry_two" type="radio" name="industry" value="Real Estate">Real Estate</label>
                                    <label :class="{active: industry == 'Other'}" for="industry_three"><input v-model="industry" id="industry_three" type="radio" name="industry" value="Other">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">Your Business Category *</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Developer / Investor / Hotel Owner'}" for="cate_one"><input v-model="category" id="cate_one" type="radio" name="category" value="Developer / Investor / Hotel Owner" >Developer / Investor / Hotel Owner</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Hospitality & Real Estate Consultant'}" for="cate_two"><input v-model="category" id="cate_two" type="radio" name="category"  value="Hospitality & Real Estate Consultant">Hospitality & Real Estate Consultant</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Management Company / Hotel Operator'}" for="cate_three"><input v-model="category" id="cate_three" type="radio" name="category" value="Management Company / Hotel Operator">Management Company / Hotel Operator</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Operation team (GM / Sales & Marketing / Operational Staff)'}" for="cate_four"><input v-model="category" id="cate_four" type="radio" name="category" value="Operation team (GM / Sales & Marketing / Operational Staff)">Operation team (GM / Sales & Marketing / Operational Staff)</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Designer / Architect'}" for="cate_de"><input v-model="category" id="cate_de" type="radio" name="category" value="Designer / Architect">Designer / Architect</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Product / Service Provider'}" for="cate_pro"><input v-model="category" id="cate_pro" type="radio" name="category" value="Product / Service Provider">Product / Service Provider</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Contractor / Project Management'}" for="cate_con"><input v-model="category" id="cate_con" type="radio" name="category" value="Contractor / Project Management">Contractor / Project Management</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Real estate / Travel Agent'}" for="cate_re"><input v-model="category" id="cate_re" type="radio" name="category" value="Real estate / Travel Agent">Real estate / Travel Agent</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: category == 'Other'}" for="cate_o"><input v-model="category" id="cate_o" type="radio" name="category" value="Other">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">I am interested to attend *</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-lg-6">
                                        <label :class="{active: interest == 'Hoskar Networking (from 6:00)'}" for="ra_net"><input v-model="interest" id="ra_net" type="radio" name="interest" value="Hoskar Networking (from 6:00)">Hoskar Networking (from 6:00)</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: interest == 'Hoskar Talks (from 5:00 to 6:00)'}" for="ra_ta"><input v-model="interest" id="ra_ta" type="radio" name="interest" value="Hoskar Talks (from 5:00 to 6:00)">Hoskar Talks (from 5:00 to 6:00)</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: interest == 'Both of them'}" for="ra_both"><input v-model="interest" id="ra_both" type="radio" name="interest" value="Both of them">Both of them</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-1"></div>
                        <div class="btn-rainbow">
                            <a class="w-100" style="max-width: none;" href="#" @click.prevent="canGoToStep2">Step 2 <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div v-show="step > 1">
                    <div class="vstack gap-5 lh-10">
                        <h4 class="font-semi-bold font-15x mb-2">Let’s make this event about you!</h4>
                        <div class="radios d-none">
                            <div class="input">
                                <div class="mb-6 lh-12">I may be interested in being a sponsors in future HoSkar, which city? (Tick more than one Box)</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-sm-6">
                                        <label for="ci_hcmc"><input id="ci_hcmc" type="checkbox" name="city[]" value="HCMC">HCMC</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_MANILA"><input id="ci_MANILA" type="checkbox" name="city[]" value="MANILA">MANILA</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_HANOI"><input id="ci_HANOI" type="checkbox" name="city[]" value="HANOI">HANOI</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_SINGAPORE"><input id="ci_SINGAPORE" type="checkbox" name="city[]" value="SINGAPORE">SINGAPORE</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_BANGKOK"><input id="ci_BANGKOK" type="checkbox" name="city[]" value="BANGKOK">BANGKOK</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_PHNOMPENH"><input id="ci_PHNOMPENH" type="checkbox" name="city[]" value="PHNOM PENH">PHNOM PENH</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label @click="maybeLoveAllCities" for="ci_ph"><input id="ci_ph" type="checkbox" name="love_all_cities" value="ALL OF ABOVE">ALL OF ABOVE</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">Expand business connections. Who would you like to meet?</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Developer / Investor / Hotel Owner'}" for="meet_one"><input v-model="meet" id="meet_one" type="radio" name="meet" value="Developer / Investor / Hotel Owner" >Developer / Investor / Hotel Owner</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Hospitality & Real Estate Consultant'}" for="meet_two"><input v-model="meet" id="meet_two" type="radio" name="meet"  value="Hospitality & Real Estate Consultant">Hospitality & Real Estate Consultant</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Management Company / Hotel Operator'}" for="meet_three"><input v-model="meet" id="meet_three" type="radio" name="meet" value="Management Company / Hotel Operator">Management Company / Hotel Operator</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Operation team (GM / Sales & Marketing / Operational Staff)'}" for="meet_four"><input v-model="meet" id="meet_four" type="radio" name="meet" value="Operation team (GM / Sales & Marketing / Operational Staff)">Operation team (GM / Sales & Marketing / Operational Staff)</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Designer / Architect'}" for="meet_de"><input v-model="meet" id="meet_de" type="radio" name="meet" value="Designer / Architect">Designer / Architect</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Product / Service Provider'}" for="meet_pro"><input v-model="meet" id="meet_pro" type="radio" name="meet" value="Product / Service Provider">Product / Service Provider</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Contractor / Project Management'}" for="meet_con"><input v-model="meet" id="meet_con" type="radio" name="meet" value="Contractor / Project Management">Contractor / Project Management</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Real estate / Travel Agent'}" for="meet_re"><input v-model="meet" id="meet_re" type="radio" name="meet" value="Real estate / Travel Agent">Real estate / Travel Agent</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label :class="{active: meet == 'Other'}" for="meet_o"><input v-model="meet" id="meet_o" type="radio" name="meet" value="Other">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">Interact with our speakers, leave your questions here</div>
                                <textarea class="lh-13" name="desc" rows="5" placeholder="Tell us your question..."></textarea>
                            </div>
                        </div>
                        <div class="vstack gap-4 text-center" id="submit_group">
                            <div class="btn-rainbow">
                                <a class="w-100 goSubmit onWaiting" style="max-width: none;" href="#" @click.prevent="submit">Submit <i class="bi bi-send"></i></a>
                            </div>
                            <div class="text-center">
                                <a class="flex-center gap-2" href="#" @click.prevent="step = 1"><i class="bi bi-arrow-left"></i>Step 1</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="step == 3">
                    <div class="step-3-wrap">
                        <div class="inner r-10">
                            <div class="text-center p-6 align-items-center lh-12 font-medium font-15x vstack gap-5 text-white position-relative">
                                <i class="bi bi-check2-circle font-20x text-primary"></i>
                                <h4 class="d-inline"><?php the_field( 'thanks_message' ); ?></h4>
                                <i class="bi bi-x-lg close cursor-pointer" @click="step = 1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            jQuery(function($){
                let app = new Vue({
                    el: '.reg_form',
                    data: {
                        step: 1,
                        gender: '',
                        industry: '',
                        category: '',
                        interest: '',
                        meet: '',
                        form_data: []
                    },
                    methods: {
                        submit: function(){
                            $('.goSubmit').text("Loading...").addClass('onWaiting');
                            $.ajax({
                                type: "POST",
                                url: zing.ajax_url,
                                data: {
                                    action: 'z_do_ajax',
                                    _action: 'submitReg',
                                    form_data: $('.reg_form form').serialize()
                                },
                                dataType: "json",
                                success: function (res) {
                                    console.log(res);
                                    app.step = 3;
                                },
                                complete: function(res){
                                    console.log(res);
                                    app.step = 3;
                                    $('#submit_group').remove();
                                }
                            });
                        },
                        canGoToStep2: function(){
                            this.form_data = $('.reg_form form').serializeArray();
                            a = this.form_data;
                            console.log(a);
                            if( $('[name="f_name"]').val() != ''
                                && $('[name="l_name"]').val() != ''
                                && $('[name="company"]').val() != ''
                                && $('[name="company_email"]').val() != ''
                                && $('[name="title"]').val() != ''
                                && $('[name="industry"]').val() != ''
                                && $('[name="category"]').val() != ''
                                && $('[name="interest"]').val() != ''
                            ){
                                this.step = 2;
                                $('.goSubmit').removeClass('onWaiting');
                            }else{
                                alert("Please complete the required fields first!");
                            }
                        },
                        maybeLoveAllCities: function(){
                            if($('[name="love_all_cities"]').is(":checked")){
                                $('[name="city[]"]').prop("checked", true);
                            }
                        }
                    }
                });
            });
        </script>
        <?php
    endif;
    return ob_get_clean();
} ); ?>