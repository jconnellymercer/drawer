<!-- FORM: HEAD SECTION FOOTER INCLUDES DRAWER HEAD SECTION -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="referrer" content="no-referrer-when-downgrade">
<!-- THIS SCRIPT NEEDS TO BE LOADED FIRST BEFORE wforms.js -->
<script type="text/javascript" data-for="FA__DOMContentLoadedEventDispatch" src="https://merceradvisors.tfaforms.net/js/FA__DOMContentLoadedEventDispatcher.js" defer></script>
<style>
    .captcha {
        padding-bottom: 1em !important;
    }

    .wForm .captcha .oneField {
        margin: 0;
        padding: 0;
    }
</style>
<script type="text/javascript">
    // initialize our variables
    var captchaReady = 0;
    var wFORMSReady = 0;
    var isConditionalSubmitEnabledDrawer = false;

    // when wForms is loaded call this
    var wformsReadyCallbackDrawer = function() {
        // using this var to denote if wForms is loaded
        wFORMSReady = 1;
        isConditionalSubmitEnabledDrawer = document.getElementById('submit_button_drawer').hasAttribute('data-condition');

        // call our recaptcha function which is dependent on both
        // wForms and an async call to google
        // note the meat of this function wont fire until both
        // wFORMSReady = 1 and captchaReady = 1
        onloadCallbackDrawer();
    }
    var gCaptchaReadyCallbackDrawer = function() {
        // using this var to denote if captcha is loaded
        captchaReady = 1;
        isConditionalSubmitEnabledDrawer = document.getElementById('submit_button_drawer').hasAttribute('data-condition');

        // call our recaptcha function which is dependent on both
        // wForms and an async call to google
        // note the meat of this function wont fire until both
        // wFORMSReady = 1 and captchaReady = 1
        onloadCallbackDrawer();
    };




    // add event listener to fire when wForms is fully loaded
    document.addEventListener("wFORMSLoaded", wformsReadyCallbackDrawer);

    var enablesubmitButtonDrawer = function() {
        var submitButtonDrawer = document.getElementById('submit_button_drawer');
        var explanationDrawer = document.getElementById('disabled-explanation-drawer');
        var isConditionalSubmitConditionMet = wFORMS.behaviors.condition.isConditionalSubmitConditionMet;
        if (
            submitButtonDrawer != null &&
            (isConditionalSubmitEnabledDrawer && isConditionalSubmitConditionMet) ||
            !isConditionalSubmitEnabledDrawer
        ) {
            submitButtonDrawer.removeAttribute('disabled');
            if (explanationDrawer != null) {
                explanationDrawer.style.display = 'none';
            }
        }
    };
    var disablesubmitButtonDrawer = function() {
        var submitButtonDrawer = document.getElementById('submit_button_drawer');
        var explanationDrawer = document.getElementById('disabled-explanation-drawer');
        if (submitButtonDrawer != null) {
            submitButtonDrawer.disabled = true;
            if (explanationDrawer != null) {
                explanationDrawer.style.display = 'block';
            }
        }
    };




    // call this on both captcha async complete and wforms fully
    // initialized since we can't be sure which will complete first
    // and we need both done for this to function just check that they are
    // done to fire the functionality
    var onloadCallbackDrawer = function() {
        // if our captcha is ready (async call completed)
        // and wFORMS is completely loaded then we are ready to add
        // the captcha to the page
        if (captchaReady && wFORMSReady) {
            grecaptcha.enterprise.render('g-recaptcha-render-drawer', {
                'sitekey': '6LfMg_EaAAAAAMhDNLMlgqDChzmtYHlx1yU2y7GI',
                'theme': 'light',
                'size': 'normal',
                'callback': 'enablesubmitButtonDrawer',
                'expired-callback': 'disablesubmitButtonDrawer'
            });

            var oldRecaptchaCheck = parseInt('1');
            if (oldRecaptchaCheck === -1) {
                var standardCaptcha = document.getElementById("tfa_captcha_text");
                standardCaptcha = standardCaptcha.parentNode.parentNode.parentNode;
                standardCaptcha.parentNode.removeChild(standardCaptcha);
            }

            if (!wFORMS.instances['paging']) {
                document.getElementById("g-recaptcha-render-drawer").parentNode.parentNode.parentNode.style.display = "block";

                //document.getElementById("g-recaptcha-render-drawer").parentNode.parentNode.parentNode.removeAttribute("hidden");
            }
            document.getElementById("g-recaptcha-render-drawer").getAttributeNode('id').value = 'tfa_captcha_text';


            var captchaError = '';
            if (captchaError == '1') {
                var errMsgText = 'The CAPTCHA was not completed successfully.';
                var errMsgDiv = document.createElement('div');
                errMsgDiv.id = "tfa_captcha_text-E";
                errMsgDiv.className = "err errMsg";
                errMsgDiv.innerText = errMsgText;
                var loc = document.querySelector('.g-captcha-error');
                loc.insertBefore(errMsgDiv, loc.childNodes[0]);

                /* See wFORMS.behaviors.paging.applyTo for origin of this code */
                if (wFORMS.instances['paging']) {
                    var b = wFORMS.instances['paging'][0];
                    var pp = base2.DOM.Element.querySelector(document, wFORMS.behaviors.paging.CAPTCHA_ERROR);
                    if (pp) {
                        var lastPage = 1;
                        for (var i = 1; i < 100; i++) {
                            if (b.behavior.isLastPageIndex(i)) {
                                lastPage = i;
                                break;
                            }
                        }
                        b.jumpTo(lastPage);
                    }
                }
            }
        }
    }
</script>
<script src='https://www.google.com/recaptcha/enterprise.js?onload=gCaptchaReadyCallbackDrawer&render=explicit&hl=en_US' async defer></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var warning = document.getElementById("javascript-warning");
        if (warning != null) {
            warning.parentNode.removeChild(warning);
        }
        var oldRecaptchaCheck = parseInt('1');
        if (oldRecaptchaCheck !== -1) {
            var explanationDrawer = document.getElementById('disabled-explanation-drawer');
            var submitButtonDrawer = document.getElementById('submit_button_drawer');
            if (submitButtonDrawer != null) {
                submitButtonDrawer.disabled = true;
                if (explanationDrawer != null) {
                    explanationDrawer.style.display = 'block';
                }
            }
        };

    });
</script>
<script type="text/javascript">
    document.addEventListener("FA__DOMContentLoaded", function() {
        const FORM_TIME_START = Math.floor((new Date).getTime() / 1000);
        let formElement = document.getElementById("tfa_0");
        if (null === formElement) {
            formElement = document.getElementById("0");
        }
        let appendJsTimerElement = function() {
            let formTimeDiff = Math.floor((new Date).getTime() / 1000) - FORM_TIME_START;
            let cumulatedTimeElement = document.getElementById("tfa_dbCumulatedTime");
            if (null !== cumulatedTimeElement) {
                let cumulatedTime = parseInt(cumulatedTimeElement.value);
                if (null !== cumulatedTime && cumulatedTime > 0) {
                    formTimeDiff += cumulatedTime;
                }
            }
            let jsTimeInput = document.createElement("input");
            jsTimeInput.setAttribute("type", "hidden");
            jsTimeInput.setAttribute("value", formTimeDiff.toString());
            jsTimeInput.setAttribute("name", "tfa_dbElapsedJsTime");
            jsTimeInput.setAttribute("id", "tfa_dbElapsedJsTime");
            jsTimeInput.setAttribute("autocomplete", "off");
            if (null !== formElement) {
                formElement.appendChild(jsTimeInput);
            }
        };
        if (null !== formElement) {
            if (formElement.addEventListener) {
                formElement.addEventListener('submit', appendJsTimerElement, false);
            } else if (formElement.attachEvent) {
                formElement.attachEvent('onsubmit', appendJsTimerElement);
            }
        }
    });
</script>

<link href="https://merceradvisors.tfaforms.net/dist/form-builder/5.0.0/wforms-layout.css?v=2d4adf423e2ede5d1716a99be3156a242c68e19c" rel="stylesheet" type="text/css" />

<link href="https://merceradvisors.tfaforms.net/dist/form-builder/5.0.0/wforms-jsonly.css?v=2d4adf423e2ede5d1716a99be3156a242c68e19c" rel="alternate stylesheet" title="This stylesheet activated by javascript" type="text/css" />
<script type="text/javascript" src="https://merceradvisors.tfaforms.net/wForms/3.11/js/wforms.js?v=2d4adf423e2ede5d1716a99be3156a242c68e19c"></script>
<script type="text/javascript">
    wFORMS.behaviors.prefill.skip = false;
</script>
<script type="text/javascript" src="https://merceradvisors.tfaforms.net/wForms/3.11/js/localization-en_US.js?v=2d4adf423e2ede5d1716a99be3156a242c68e19c"></script>


<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="<?php echo sprintf('%s?v=%s', get_drawer_file('drawer.css'), filemtime(url_to_dir(get_drawer_file('drawer.css')))) ?>" rel="stylesheet" type="text/css" />

<div class="contact-drawer-wrapper <?php echo get_drawer_type($post_id) ?>">
    <!-- Button trigger offcanvas -->
    <button id="drawer" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
        <div class="flex flex-row -mx-3 items-center">
            <div class="w-10/12 mx-3">
                <span id="ready-almost-desktop" class="hidden lg:inline">Ready to get in touch?</span><span id="talk" class="hidden lg:inline"> Let's Talk</span>
                <span id="ready-almost-mobile" class="lg:hidden"></span><span id="talk-mobile" class="lg:hidden"> Let's
                    Talk</span>
            </div>
            <div class="w-2/12 mx-3">
                <img src="<?php echo get_drawer_file('assets/caret-up-simple-loop.gif') ?>">
            </div>
        </div>
    </button>
    <!-- Bottom offcanvas Page 1 -->
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <img src="https://wpmercerdev.wpengine.com/wp-content/uploads/2024/05/icon1-caret-down-1.svg" />
            </button>
        </div>
        <div class="offcanvas-body">
            <h3>How would you like to connect?</h3>
            <p>To explore if Mercer Advisors is a good fit for you, the next step is a short conversation with one of our team members. Please select a way we can get in touch.</p>
            <div class="drawer-tile one">
                <div class="flex flex-row flex-wrap -mx-3 items-center">
                    <div class="px-3 flex gap-4 w-full md:w-8/12 xl:w-9/12 items-center">
                        <div class="hidden lg:block">
                            <img src="<?php echo get_drawer_file('assets/icon.svg') ?>">
                        </div>
                        <div class="">
                            <h3>Call Me Soon</h3>
                            <p>Our team will call you soon to discuss your wealth management needs and answer your
                                questions.</p>
                        </div>
                    </div>
                    <!-- <div class="px-3 w-full md:w-4/12">
                        <div class="input-container">
                            <input type="text" id="inputField" value="" maxlength="14" placeholder="" placeholder="Phone*" autocomplete="tel" autoformat="###-###-####" title="Phone" class="validate-custom /[0-9]{3}-[0-9]{3}-[0-9]{4}/g required">
                            <label for="inputField">Phone Number</label>
                        </div>
                    </div> -->
                    <div class="w-full md:w-4/12 xl:w-3/12 px-3">
                        <button id="button-next" class="btn next w-full" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom">
                            Call Me</button>
                        </button>
                    </div>
                </div>
            </div>
            <div class="drawer-tile two">
                <div class="flex flex-row flex-wrap -mx-3 items-center">
                    <div class="px-3 flex gap-4 w-full md:w-8/12 xl:w-9/12 items-center">
                        <div class="hidden lg:block">
                            <img src="<?php echo get_drawer_file('assets/icon (1).svg') ?>">
                        </div>
                        <div class="">
                            <h3>Schedule a Call</h3>
                            <p>Select a date and time that works with your schedule.</p>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 xl:w-3/12 px-3">
                        <button id="calendly" class="btn btn-secondary w-full" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom1" aria-controls="offcanvasBottom">
                            Schedule Now</button>
                        </button>
                    </div>
                </div>
            </div>
            <p>Of course, we will not sell your information to third parties.</p>
            <div class="contact-phone">
                <p class="hidden lg:block"><span>Prefer to call us?<br><span class="number"> 888.920.1320</span></span></p>
                <p class="lg:hidden"><span>Prefer to call us?</span> <a href="tel:888.920.1320" title="888.920.1320">888.920.1320</a></p>
            </div>
        </div>
    </div>
    <!-- End Bottom offcanvas Page 1 -->

    <!-- Bottom offcanvas Page 2 -->
    <div class="offcanvas" tabindex="-1" id="offcanvasBottom2" aria-labelledby="offcanvasBottomLabel">

        <div class="offcanvas-header">
            <button class="btn-back" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">← Back
            </button>
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <img src="https://wpmercerdev.wpengine.com/wp-content/uploads/2024/05/icon1-caret-down-1.svg" />
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="drawer-tile">
                <div id="thankYouMessage" style="display: none;">
                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_401_27397)">
                            <path d="M66 33C66 51.2292 51.2292 66 33 66C14.7708 66 0 51.2292 0 33C0 14.7708 14.7708 0 33 0C51.2292 0 66 14.7708 66 33Z" fill="#C00686" />
                            <path d="M37.5672 39.6922C37.422 40.0354 37.1052 40.2862 36.6564 40.4578C36.2604 40.603 35.6664 40.6822 34.8612 40.6954V41.461H44.6028V40.6954C43.8108 40.6822 43.2168 40.603 42.7944 40.4446C42.306 40.273 41.9892 40.009 41.844 39.6658C41.712 39.349 41.646 38.953 41.646 38.4514V27.5614C41.646 26.7562 41.8572 26.1754 42.2664 25.8322C42.6492 25.5022 43.4148 25.3306 44.6028 25.3174V24.5518H37.686L30.8352 36.9994L23.9976 24.5518H16.9224V25.3174C17.8068 25.3306 18.4272 25.4098 18.8364 25.5814C19.2984 25.7662 19.5888 26.0698 19.6944 26.4526C19.7868 26.7958 19.8396 27.337 19.8396 28.0894V37.9102C19.8396 38.4778 19.8132 38.887 19.7736 39.1906C19.734 39.5206 19.602 39.7978 19.3908 40.0354C19.1796 40.273 18.8628 40.4446 18.4272 40.5634C18.0576 40.6558 17.556 40.7086 16.9224 40.7218V41.4874H24.0108V40.7218C23.3772 40.7086 22.8888 40.669 22.506 40.5766C22.0572 40.471 21.7404 40.2994 21.5292 40.0618C21.318 39.8242 21.186 39.547 21.1332 39.217C21.0804 38.9134 21.0672 38.5042 21.0672 37.9366V27.6274L21.45 27.535L29.1324 41.5138H29.8056L37.3956 27.535L37.7784 27.6274V38.491C37.7784 38.9662 37.7124 39.3886 37.5672 39.6922Z" fill="white" />
                            <path d="M49.0775 22.0049H48.4043V44.0093H49.0775V22.0049Z" fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_401_27397">
                                <rect width="66" height="66" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <p class="ty">Request received!</p>
                    <p>Our team will be reaching out soon to learn more about your financial goals.</p>
                    <p>Thanks for your interest in Mercer Advisors.</p>
                    <p data-bs-dismiss="offcanvas" id="browse">Continue Browsing</p>
                </div>
                <div id="formContainer">
                    <h3> Tell us about yourself</h3>
                    <!-- FORM: BODY SECTION -->
                    <div class="wFormContainer" style="max-width: 100%; width:auto;">
                        <div class="wFormHeader"></div>
                        <style type="text/css">
                            #tfa_4,
                            *[id^="tfa_4["] {
                                width: 199px !important;
                            }

                            #tfa_4-D,
                            *[id^="tfa_4["][class~="field-container-D"] {
                                width: auto !important;
                            }

                            #tfa_3,
                            *[id^="tfa_3["] {
                                width: 199px !important;
                            }

                            #tfa_3-D,
                            *[id^="tfa_3["][class~="field-container-D"] {
                                width: auto !important;
                            }

                            #tfa_19,
                            *[id^="tfa_19["] {
                                width: 100% !important;
                            }

                            #tfa_19-D,
                            *[id^="tfa_19["][class~="field-container-D"] {
                                width: auto !important;
                            }

                            #tfa_19-L,
                            label[id^="tfa_19["] {
                                width: 500px !important;
                                min-width: 0px;
                            }

                            #tfa_19,
                            *[id^="tfa_19["] {
                                height: 100px !important
                            }

                            #tfa_19-D,
                            *[id^="tfa_19["][class~="field-container-D"] {
                                height: auto !important;
                            }

                            #tfa_19-L,
                            label[id^="tfa_19["],
                            *[id^="tfa_19["][id$="-L"] {
                                height: auto !important;
                            }
                        </style>
                        <div class="">
                            <div class="wForm" id="117-WRPR" data-language="en_US" dir="ltr">
                                <div class="codesection" id="code-117">
                                    <style>
                                        .wFormHeader,
                                        .wFormFooter,
                                        .supportInfo {
                                            display: none;
                                        }

                                        .label.postField span:nth-child(2) {
                                            color: inherit !important;
                                            font-family: inherit !important;
                                            letter-spacing: inherit !important;
                                            white-space: pre-wrap !important;
                                            background-color: transparent !important;
                                            font-size: 95% !important;
                                        }
                                    </style>
                                </div>
                                <form method="post" action="https://merceradvisors.tfaforms.net/api_v2/workflow/processor" class="hintsBelow labelsLeftAligned" id="117" role="form">
                                    <div id="tfa_43" class="section inline group">
                                        <div class="oneField field-container-D  labelsRemoved  " id="tfa_1-D">
                                            <div class="inputWrapper"><input aria-required="true" type="text" id="tfa_1" name="tfa_1" value="" autocomplete="given-name" placeholder="" title="First Name" class="validate-alphanum required">
                                                <div class="new-placeholder">First Name*</div>
                                            </div>
                                        </div>
                                        <div class="oneField field-container-D  labelsRemoved  " id="tfa_2-D">
                                            <div class="inputWrapper"><input aria-required="true" type="text" id="tfa_2" name="tfa_2" value="" autocomplete="family-name" placeholder="" title="Last Name" class="validate-alphanum required">
                                                <div class="new-placeholder">Last Name*</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tfa_44" class="section inline group">
                                        <div class="oneField field-container-D  labelsRemoved  " id="tfa_4-D">
                                            <div class="inputWrapper"><input aria-required="true" type="text" id="tfa_4" name="tfa_4" value="" autocomplete="email" placeholder="" title="Email" class="validate-email required">
                                                <div class="new-placeholder">Email*</div>
                                            </div>
                                        </div>
                                        <div class="oneField field-container-D  labelsRemoved  " id="tfa_3-D">
                                            <div class="inputWrapper">
                                                <div><input aria-required="true" type="text" id="tfa_3" name="tfa_3"
                                                        value="" placeholder="Phone*" maxlength="12"
                                                        autoformat="###-###-####" title="Phone"
                                                        class="validate-custom /[0-9]{3}-[0-9]{3}-[0-9]{4}/g required">
                                                  
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                if (typeof wFORMS != 'undefined') {
                                                    if (wFORMS.behaviors.validation) {
                                                        wFORMS.behaviors.validation.rules['customtfa_3'] = { selector: '*[id="tfa_3"]', check: 'validateCustom' };
                                                        wFORMS.behaviors.validation.messages['customtfa_3'] = "Invalid Phone Number";
                                                    }
                                                }</script>
                                        </div> 
                                    </div>
                                    <div class="oneField field-container-D  labelsRemoved  " id="tfa_19-D">
                                        <div class="inputWrapper"><textarea cols="100%" rows="100px" maxlength="100" id="tfa_19" name="tfa_19" title="Primary Reason For Seeking Advice" class='validate-custom /^[a-zA-Z0-9 "!?.-]+$/'></textarea>
                                            <div class="new-placeholder">Share a bit about your financial situation or wealth management needs. (Optional)</div>
                                        </div>
                                        <script type="text/javascript">
                                            if (typeof wFORMS != 'undefined') {
                                                if (wFORMS.behaviors.validation) {
                                                    wFORMS.behaviors.validation.rules['customtfa_19'] = {
                                                        selector: '*[id="tfa_19"]',
                                                        check: 'validateCustom'
                                                    };
                                                    wFORMS.behaviors.validation.messages['customtfa_19'] = "Invalid Entry";
                                                }
                                            }
                                        </script>
                                    </div>
                                    <input type="hidden" id="tfa_6" name="tfa_6" value="Active" class=""><input type="hidden" id="tfa_8" name="tfa_8" value="tfa_8" class=""><input type="hidden" id="tfa_10" name="tfa_10" value="tfa_10" class=""><input type="hidden" id="tfa_12" name="tfa_12" value="tfa_12" class=""><input type="hidden" id="tfa_16" name="tfa_16" value="tfa_16" class=""><input type="hidden" id="tfa_17" name="tfa_17" value="tfa_14" class=""><input type="hidden" id="tfa_18" name="tfa_18" value="012Dn000000iaGgIAI" class=""><input type="hidden" id="tfa_20" name="tfa_20" value="Contact and Find an Advisor" class=""><input type="hidden" id="tfa_23" name="tfa_23" value="005Dn000007c6JHIAY" class=""><input type="hidden" id="tfa_24" name="tfa_24" value="National Marketing" class=""><input type="hidden" id="tfa_25" name="tfa_25" value="Organic Web" class=""><input type="hidden" id="tfa_28" name="tfa_28" value="tfa_28" class=""><input type="hidden" id="tfa_30" name="tfa_30" value="Customer" class=""><input type="hidden" id="tfa_31" name="tfa_31" value="Billing" class=""><input type="hidden" id="tfa_38" name="tfa_38" value="tfa_38" class=""><input type="hidden" id="tfa_40" name="tfa_40" value="tfa_40" class=""><input type="hidden" id="tfa_42" name="tfa_42" value="tfa_42" class="">
                                    <div class="actions" id="117-A" data-contentid="submit_button_drawer">
                                        <div id="google-captcha" style="display: none">
                                            <div class="captcha">
                                                <div class="oneField">
                                                    <div class="g-recaptcha" id="g-recaptcha-render-drawer"></div>
                                                    <div class="g-captcha-error"></div>
                                                </div>
                                                <div class="captchaHelp">The submit button will be disabled until you complete the CAPTCHA.<br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                        <div id="captcha-holder" class="flex flex-row flex-wrap gap-y-4 -mx-3">
                                            <div class="w-full mx-3">
                                                <div id="disabled-explanation" class="captchaHelp">By submitting this information, you are selecting to receive promotional communications from the Mercer Advisors team. If you are a California resident and interested in learning more about personal information we may collect, please click <a href="https://www.merceradvisors.com/notice-at-collection/" target="_blank">here</a>.</div>
                                            </div>
                                            <div class="w-full mx-3">
                                                <input type="submit" data-label="Submit" class="primaryAction w-full md:w-auto" id="submit_button_drawer" value="Submit">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="clear:both"></div>
                                    <input type="hidden" value="117" name="tfa_dbFormId" id="tfa_dbFormId"><input type="hidden" value="" name="tfa_dbResponseId" id="tfa_dbResponseId"><input type="hidden" value="98ec99ecfdee9bfae34a92bcd5c60930" name="tfa_dbControl" id="tfa_dbControl"><input type="hidden" value="" name="tfa_dbWorkflowSessionUuid" id="tfa_dbWorkflowSessionUuid"><input type="hidden" value="" name="tfa_noOverWriteFields" id="tfa_noOverWriteFields"><input type="hidden" value="5" name="tfa_dbVersionId" id="tfa_dbVersionId"><input type="hidden" value="" name="tfa_switchedoff" id="tfa_switchedoff">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-phone">
                    <p class="hidden lg:block"><span>Prefer to call us?<br><span class="number"> 888.920.1320</span></span>
                    </p>
                    <p class="lg:hidden"><span>Prefer to call us?</span> <a href="tel:888.920.1320" title="888.920.1320">888.920.1320</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bottom offcanvas Page 2 -->

    <!-- Bottom offcanvas Page 3 -->
    <div class="offcanvas" tabindex="-1" id="offcanvasBottom1" aria-labelledby="offcanvasBottomLabel">

        <div class="offcanvas-header">
            <button id="calendly-back" class="btn-back" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">← Back
            </button>
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <img src="https://wpmercerdev.wpengine.com/wp-content/uploads/2024/05/icon1-caret-down-1.svg" />
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="call-ty" style="display: none;">
                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_401_27397)">
                        <path d="M66 33C66 51.2292 51.2292 66 33 66C14.7708 66 0 51.2292 0 33C0 14.7708 14.7708 0 33 0C51.2292 0 66 14.7708 66 33Z" fill="#C00686"></path>
                        <path d="M37.5672 39.6922C37.422 40.0354 37.1052 40.2862 36.6564 40.4578C36.2604 40.603 35.6664 40.6822 34.8612 40.6954V41.461H44.6028V40.6954C43.8108 40.6822 43.2168 40.603 42.7944 40.4446C42.306 40.273 41.9892 40.009 41.844 39.6658C41.712 39.349 41.646 38.953 41.646 38.4514V27.5614C41.646 26.7562 41.8572 26.1754 42.2664 25.8322C42.6492 25.5022 43.4148 25.3306 44.6028 25.3174V24.5518H37.686L30.8352 36.9994L23.9976 24.5518H16.9224V25.3174C17.8068 25.3306 18.4272 25.4098 18.8364 25.5814C19.2984 25.7662 19.5888 26.0698 19.6944 26.4526C19.7868 26.7958 19.8396 27.337 19.8396 28.0894V37.9102C19.8396 38.4778 19.8132 38.887 19.7736 39.1906C19.734 39.5206 19.602 39.7978 19.3908 40.0354C19.1796 40.273 18.8628 40.4446 18.4272 40.5634C18.0576 40.6558 17.556 40.7086 16.9224 40.7218V41.4874H24.0108V40.7218C23.3772 40.7086 22.8888 40.669 22.506 40.5766C22.0572 40.471 21.7404 40.2994 21.5292 40.0618C21.318 39.8242 21.186 39.547 21.1332 39.217C21.0804 38.9134 21.0672 38.5042 21.0672 37.9366V27.6274L21.45 27.535L29.1324 41.5138H29.8056L37.3956 27.535L37.7784 27.6274V38.491C37.7784 38.9662 37.7124 39.3886 37.5672 39.6922Z" fill="white"></path>
                        <path d="M49.0775 22.0049H48.4043V44.0093H49.0775V22.0049Z" fill="white"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_401_27397">
                            <rect width="66" height="66" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>

                <p class="ty">Request received!</p>
                <p>We look forward to meeting with you and learning more about your financial goals. You will
                    receive a meeting confirmation shortly via email.</p>
                <p>Thanks for your interest in Mercer Advisors.</p>
                <p data-bs-dismiss="offcanvas" id="browse">Continue Browsing</p>
            </div>

            <div class="call-title">
                <p class="call" style="text-align: center;">Three quick steps to schedule a call with our team.
                </p>
            </div>
            <!-- Calendly inline widget begin -->
            <div class="calendly-inline-widget" data-url="https://calendly.com/mercer-advisors/mercer-advisors-consult-via-website-drawer?hide_event_type_details=1&hide_gdpr_banner=1&primary_color=c00686" style="min-width:320px;height:700px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
            <!-- Calendly inline widget end -->
            <div class="contact-phone">
                <p class="hidden lg:block"><span>Prefer to call us?<br><span class="number"> 888.920.1320</span></span></p>
                <p class="lg:hidden"><span>Prefer to call us?</span> <a href="tel:888.920.1320" title="888.920.1320">888.920.1320</a></p>
            </div>
            <!-- Calendly inline widget end -->
        </div>
    </div>
    <!-- End Bottom offcanvas Page 3 -->
</div>

<script type="text/javascript" src="<?php echo sprintf('%s?v=%s', get_drawer_file('drawer.js'), filemtime(url_to_dir(get_drawer_file('drawer.js')))) ?>"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>