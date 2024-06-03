<?php
add_shortcode( 'reg_form', function(){
    ob_start(); ?>
    <div class="reg_form">
        <form action="">
            <div class="steps-label d-flex gap-1 lh-10 font-medium mb-6">
                <div class="s" :class="{ active : step == 1 }" @click="step = 1;">Step 1</div>
                <div class="s" :class="{ active : step == 1 }" @click="step = 2;">Step 2</div>
            </div>
            <div v-if="step == 1">
                Step 1 Fields
            </div>
            <div v-if="step == 2">
                Step 2 Fields
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        jQuery(function($){
            let app = new Vue({
                el: '.reg_form',
                data: {
                    step: 1
                }
            });
        });
    </script>
    <?php
    return ob_get_clean();
} ); ?>