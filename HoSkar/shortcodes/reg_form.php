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
                        <div class="row g-4 yourcompany">
                            <div class="radios col-lg-12">
                                <div class="input">
                                    <div class="mb-6">Where is your company based? *</div>
                                    <div class="row g-4 lh-12">
                                        <div class="col-lg-6 morecity">
                                            <label for="lo_viet"><input id="lo_viet" type="checkbox" name="yourcompany[]" value="Vietnam">Vietnam</label>
                                            <div class="row g-4 show_city">
                                                <div class="col-lg-6">
                                                    <label for="city_hanoi"><input id="city_hanoi" type="checkbox" name="yourcity[]" value="Hanoi">Hanoi</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="city_hcmc"><input id="city_hcmc" type="checkbox" name="yourcity[]" value="HCMC">HCMC</label>
                                                </div>
                                                <div class="col-lg-6 other">
                                                    <label for="city_other"><input id="city_other" type="checkbox" name="yourcity[]" value="Other">Other</label>
                                                    <textarea class="lh-10 other_city" name="other_city" rows="2" placeholder="Fill in the answer..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="lo_phi"><input id="lo_phi" type="checkbox" name="yourcompany[]" value="Philipine">Philipine</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="lo_thai"><input id="lo_thai" type="checkbox" name="yourcompany[]" value="Thailand">Thailand</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="lo_sing"><input id="lo_sing" type="checkbox" name="yourcompany[]" value="Singapore">Singapore</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="lo_cam"><input id="lo_cam" type="checkbox" name="yourcompany[]" value="Cambodia">Cambodia</label>
                                        </div>
                                        <div class="col-lg-6 other">
                                            <label for="lo_other"><input id="lo_other" type="checkbox" name="yourcompany[]" value="Other">Other</label>
                                            <textarea class="lh-10 other_yourcompany" name="other_yourcompany" rows="4" placeholder="Fill in the answer..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="radios col-lg-12">
                                <div class="input">
                                    <div class="mb-6">Where is your city based?</div>
                                    <textarea class="lh-13" name="yourcity" rows="5" placeholder="Fill in the answer..."></textarea>
                                </div>
                            </div> -->
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">Your Business Category *</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-lg-6">
                                        <label for="cate_one"><input id="cate_one" type="checkbox" name="category[]" value="Developer / Investor / Hotel Owner" >Developer / Investor / Hotel Owner</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cate_two"><input id="cate_two" type="checkbox" name="category[]"  value="Hospitality & Real Estate Consultant">Hospitality & Real Estate Consultant</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cate_three"><input id="cate_three" type="checkbox" name="category[]" value="Management Company / Hotel Operator">Management Company / Hotel Operator</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cate_four"><input id="cate_four" type="checkbox" name="category[]" value="Operation team (GM / Sales & Marketing / Operational Staff)">Operation team (GM / Sales & Marketing / Operational Staff)</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cate_de"><input id="cate_de" type="checkbox" name="category[]" value="Designer / Architect">Designer / Architect</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cate_pro"><input id="cate_pro" type="checkbox" name="category[]" value="Product / Service Provider">Product / Service Provider</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cate_con"><input id="cate_con" type="checkbox" name="category[]" value="Contractor / Project Management">Contractor / Project Management</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cate_re"><input id="cate_re" type="checkbox" name="category[]" value="Real estate / Travel Agent">Real estate / Travel Agent</label>
                                    </div>
                                    <div class="col-lg-6 other">
                                        <label :class="{active: category == 'Other'}" for="cate_o"><input id="cate_o" type="checkbox" name="category[]" value="Other">Other</label>
                                        <textarea class="lh-10 other_category" name="other_category" rows="4" placeholder="Fill in the answer..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">I am intersted in attending *</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-lg-6">
                                        <label :class="{active: interest == 'Hoskar Talks (from 5:00 to 6:00)'}" for="ra_ta"><input v-model="interest" id="ra_ta" type="radio" name="interest" value="Hoskar Talks (from 5:00 to 6:00)">Hoskar Talks</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: interest == 'Hoskar Networking (from 6:00)'}" for="ra_net"><input v-model="interest" id="ra_net" type="radio" name="interest" value="Hoskar Networking (from 6:00)">Hoskar Networking</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label :class="{active: interest == 'Both of them'}" for="ra_both"><input v-model="interest" id="ra_both" type="radio" name="interest" value="Both of them">Both sessions</label>
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
                        <h4 class="font-semi-bold font-15x mb-2">Let’s make HoSkar about you!</h4>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6 lh-12">I am interested in attending or sponsoring also HoSkar Night in:</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-sm-6">
                                        <label for="ci_hcmc"><input id="ci_hcmc" type="checkbox" name="city[]" value="Hcmc">Hcmc</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_MANILA"><input id="ci_MANILA" type="checkbox" name="city[]" value="Manila">Manila</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_HANOI"><input id="ci_HANOI" type="checkbox" name="city[]" value="Hanoi">Hanoi</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_SINGAPORE"><input id="ci_SINGAPORE" type="checkbox" name="city[]" value="Singapore">Singapore</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_BANGKOK"><input id="ci_BANGKOK" type="checkbox" name="city[]" value="Bangkor">Bangkor</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ci_PHNOMPENH"><input id="ci_PHNOMPENH" type="checkbox" name="city[]" value="Phnom Penh">Phnom Penh</label>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <label @click="maybeLoveAllCities" for="ci_ph"><input id="ci_ph" type="checkbox" name="love_all_cities" value="ALL OF ABOVE">ALL OF ABOVE</label>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">Expand business connections. Who would you like to meet?</div>
                                <div class="row g-4 lh-12">
                                    <div class="col-sm-6">
                                        <label for="meet_one"><input id="meet_one" type="checkbox" name="meet[]" value="Developer / Investor / Hotel Owner" >Developer / Investor / Hotel Owner</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_two"><input id="meet_two" type="checkbox" name="meet[]"  value="Hospitality & Real Estate Consultant">Hospitality & Real Estate Consultant</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_three"><input id="meet_three" type="checkbox" name="meet[]" value="Management Company / Hotel Operator">Management Company / Hotel Operator</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_four"><input id="meet_four" type="checkbox" name="meet" value="Operation team (GM / Sales & Marketing / Operational Staff)">Operation team (GM / Sales & Marketing / Operational Staff)</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_four"><input id="meet_four" type="checkbox" name="meet" value="Association/ Authority">Association/ Authority</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_de"><input id="meet_de" type="checkbox" name="meet[]" value="Designer / Architect">Designer / Architect</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_pro"><input id="meet_pro" type="checkbox" name="meet[]" value="Product / Service Provider">Product / Service Provider</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_con"><input id="meet_con" type="checkbox" name="meet[]" value="Contractor / Project Management">Contractor / Project Management</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="meet_re"><input id="meet_re" type="checkbox" name="meet[]" value="Real estate / Travel Agent">Real estate / Travel Agent</label>
                                    </div>
                                    <div class="col-sm-6 other">
                                        <label for="meet_o"><input id="meet_o" type="checkbox" name="meet[]" value="Other">Other</label>
                                        <textarea class="lh-10 other_meet" name="other_meet" rows="4" placeholder="Fill in the answer..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="radios">
                            <div class="input">
                                <div class="mb-6">Interact with us or our speakers and leave your question here</div>
                                <textarea class="lh-13" name="detail" rows="5" placeholder="Tell us your question..."></textarea>
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
                        category: '',
                        yourcompany: '',
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
                                && $('[name="gender"]').val() != ''
                                && $('[name="company"]').val() != ''
                                && $('[name="company_email"]').val() != ''
                                && $('[name="title"]').val() != ''
                                && $('[name="yourcompany"]').val() != ''
                                && $('[name="category[]"]').val() != ''
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

                $('input[type="checkbox"]').on('change', function(){
                    if(this.checked && $(this).val()=="Other"){
                        $(this).parents('.other').addClass("active");
                    }else{
                        $(this).parents('.other').removeClass("active");
                    }
                    if ($('#lo_viet').is(':checked')) {
                        $(this).parents('.morecity').addClass("active");
                    }else{
                        $(this).parents('.morecity').removeClass("active");
                    }
                });
                // $('.morecity input[type="checkbox"]').on('change', function(){
                //     console.log($(this).val(),'val');
                //    if($(this).val()=="Vietnam"){
                //         $(this).parents('.morecity').addClass("active");
                //    }else{
                //         $(this).parents('.morecity').removeClass("active");
                //    }
                // });
            });
        </script>
        <?php
    endif;
    return ob_get_clean();
} ); ?>