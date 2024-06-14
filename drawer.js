// STATES
document.getElementById("drawer").addEventListener("click", function () {
    sessionStorage.setItem('drawer', 'true');
});

document.getElementById("submit_button_drawer").addEventListener("click", function () {
    sessionStorage.setItem('submit_button_drawer', 'true');
    document.getElementById("ready-almost-desktop").innerText = 'Request received. ';
    document.getElementById("ready-almost-mobile").innerText = 'Request received. ';
    document.getElementById("talk").innerText = 'Talk soon.';
    document.getElementById("talk-mobile").innerText = 'Talk soon.';
    document.querySelector('.btn-back').style.display = 'none';
});

if (sessionStorage.getItem('drawer') === 'true') {
    document.getElementById("ready-almost-desktop").innerText = 'Almost done !';
    document.getElementById("ready-almost-mobile").innerText = 'Almost done !';
}

if (sessionStorage.getItem('submit_button_drawer') === 'true') {
    document.getElementById("ready-almost-desktop").innerText = 'Request received. ';
    document.getElementById("ready-almost-mobile").innerText = 'Request received. ';
    document.getElementById("talk").innerText = 'Talk soon.';
    document.getElementById("talk-mobile").innerText = 'Talk soon.';
    document.querySelector('.btn-back').style.display = 'none';
}


// REOPEN CORRECT CANVAS
document.getElementById("button-next").addEventListener("click", function () {
    sessionStorage.setItem('button-next', 'true');
    sessionStorage.setItem('calendly', 'false');
    document.getElementById("drawer").setAttribute("data-bs-target", "#offcanvasBottom2");
    document.getElementById("ready-almost-desktop").innerText = 'Almost done! ';
    document.getElementById("ready-almost-mobile").innerText = 'Almost done! ';
});

document.getElementById("calendly").addEventListener("click", function () {
    sessionStorage.setItem('calendly', 'true');
    sessionStorage.setItem('button-next', 'false');
    document.getElementById("drawer").setAttribute("data-bs-target", "#offcanvasBottom1");
    document.getElementById("ready-almost-desktop").innerText = 'Almost done! ';
    document.getElementById("ready-almost-mobile").innerText = 'Almost done! ';
});

// REOPEN CORRECT CANVAS
if (sessionStorage.getItem('button-next') === 'true') {
    document.getElementById("drawer").setAttribute("data-bs-target", "#offcanvasBottom2");
    document.getElementById("ready-almost-desktop").innerText = 'Almost done! ';
    document.getElementById("ready-almost-mobile").innerText = 'Almost done! ';
}

if (sessionStorage.getItem('calendly') === 'true') {
    document.getElementById("drawer").setAttribute("data-bs-target", "#offcanvasBottom1");
    document.getElementById("ready-almost-desktop").innerText = 'Almost done! ';
    document.getElementById("ready-almost-mobile").innerText = 'Almost done! ';
}

document.addEventListener("event_scheduled", function () {
    document.getElementById("ready-almost-desktop").innerText = 'Request received. ';
    document.getElementById("ready-almost-mobile").innerText = 'Request received. ';
});

// PHONE NUMBER VARIABLE
function getValue() {
    // Get the input element
    var inputElement = document.getElementById("inputField");

    // Get the value from the input element
    var inputValue = inputElement.value;

    // Now you can use the variable inputValue
    console.log("The input value is: " + inputValue);

    // Set the value of the hidden form field
    if (document.getElementById('117-WRPR'))
        document.getElementById('tfa_3').value = inputValue;

}


// FORM BUTTON
document.addEventListener("DOMContentLoaded", function () {
    var inputField = document.getElementById('inputField');
    var nextButton = document.getElementById('button-next');

    inputField.addEventListener('click', function () {
        nextButton.classList.add('highlight');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Flag to track whether events have occurred on the input
    var inputEventsOccurred = false;

    // Function to handle input, click, blur, focus, and keydown events
    function handleInputEvents(event) {
        var inputElement = event.target;
        var newPlaceholder = findPlaceholder(inputElement);

        // Helper function to find the closest ancestor with the placeholder element
        function findPlaceholder(el) {
            while (el && el.parentNode) {
                el = el.parentNode;
                var placeholder = el.querySelector('.new-placeholder');
                if (placeholder) {
                    return placeholder;
                }
            }
            return null;
        }

        // Functionality for input, click, focus, and keydown events
        if (event.type === 'input' || event.type === 'click' || event.type === 'focus' || (event.type === 'keydown' && event.keyCode === 9)) {
            // Check if the value is autofilled or already present and events occurred flag is true
            if (inputEventsOccurred && inputElement && inputElement.value !== null && inputElement.value !== undefined && inputElement.value.trim() !== "") {
                // Change background color to white
                inputElement.style.backgroundColor = 'white';
                // Change text color to black
                inputElement.style.color = '#000000';
            }
            // Change color to black if events occurred flag is true
            if (inputEventsOccurred && newPlaceholder) {
                newPlaceholder.style.color = '#454759';
                // Slide to top left
                newPlaceholder.style.top = '0';
                newPlaceholder.style.left = '9px';
                newPlaceholder.style.transform = 'none';
            }
            // Set the events occurred flag to true on the first event
            inputEventsOccurred = true;
        }

        // Functionality for blur event
        if (event.type === 'blur') {
            // Check if input is empty
            if (inputElement && inputElement.value !== null && inputElement.value !== undefined && inputElement.value.trim() === '') {
                // Reset background color to default
                inputElement.style.backgroundColor = ''; // This will remove inline style
                // Reset text color to default
                inputElement.style.color = ''; // This will remove inline style

                // Reset color to default
                if (newPlaceholder) {
                    newPlaceholder.style.color = 'white';
                    // Reset position
                    newPlaceholder.style.top = '50%';
                    newPlaceholder.style.left = '5px';
                    newPlaceholder.style.transform = 'translateY(-50%)';
                }
            }
        }
    }

    // Add event listeners for input, click, blur, focus, and keydown events
   // document.body.addEventListener('input', handleInputEvents, true); // Capture phase to catch shadow DOM inputs
  //  document.body.addEventListener('click', handleInputEvents, true);
  //  document.body.addEventListener('focus', handleInputEvents, true);
  //  document.body.addEventListener('blur', handleInputEvents, true);
  //  document.body.addEventListener('keydown', handleInputEvents, true); // for tabbing
});



// FORM SUBMIT
document.addEventListener('DOMContentLoaded', function () {
    // Add event listener to the form submission
    document.getElementById('117').addEventListener('submit', function (event) {
        console.log('Form submitted'); // Debugging statement

        // Prevent default form submission
        event.preventDefault();

        // Delay the form submission slightly to allow time for rechecking .errMsg
        setTimeout(function () {
            // Check if .errMsg is present in the DOM
            var errMsgElement = document.querySelector('.errMsg');
            if (errMsgElement) {
                // If .errMsg is present, display an alert message and stop form submission
                return;
            } else {
                // If .errMsg is not present, proceed with form submission

                // Collect form data
                var formData = new FormData(document.getElementById('117'));
                console.log('Form data:', formData); // Debugging statement

                // Send form data via AJAX
                fetch('https://merceradvisors.tfaforms.net/api_v2/workflow/processor', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        // Check if the form submission was successful
                        console.log('Response:', response); // Debugging statement
                        if (response.ok) {
                            console.log('Form submission successful'); // Debugging statement

                            // Hide form container
                            var formContainer = document.getElementById('formContainer');
                            if (formContainer) {
                                console.log('Form container found'); // Debugging statement
                                formContainer.style.display = 'none';
                            } else {
                                console.log('Form container not found'); // Debugging statement
                            }

                            // Show thank you message
                            var thankYouMessage = document.getElementById('thankYouMessage');
                            if (thankYouMessage) {
                                console.log('Thank you message found'); // Debugging statement
                                thankYouMessage.style.display = 'block';
                            } else {
                                console.log('Thank you message not found'); // Debugging statement
                            }

                            // Add 'ty' class to '.contact-phone'
                            var contactPhones = document.querySelectorAll('.contact-phone');
                            if (contactPhones.length > 0) {
                                contactPhones.forEach(function (contactPhone) {
                                    contactPhone.classList.add('ty');
                                });
                                console.log('TY'); // Debugging statement
                            } else {
                                console.log('TY not found'); // Debugging statement
                            }

                        } else {
                            // Check if the response status is not 200 (indicating an error)
                            if (response.status !== 200) {
                                console.error('Form submission failed with status: ' + response.status); // Debugging statement
                                // Add code here to handle the error, such as displaying an error message to the user
                                // For example:
                                alert('Form submission failed. Please try again later.');
                            }
                        }
                    })
                    .catch(error => {
                        // Handle form submission errors
                        console.error('Error:', error); // Debugging statement
                        // Add code here to handle the error, such as displaying an error message to the user
                        // For example:

                    });
            }
        }, 100); // Adjust the delay time as needed
    });
});



// CALENDLY THANK YOU
// Function to show the call-ty div
function showCallTy() {
    const callTyDiv = document.querySelector('.call-ty');
    if (callTyDiv) {
        callTyDiv.style.display = 'block';
    }
}

// Observer to listen for changes within the Calendly iframe
const iframeObserver = new MutationObserver(function (mutationsList) {
    mutationsList.forEach(function (mutation) {
        if (mutation.type === 'childList') {
            mutation.addedNodes.forEach(function (node) {
                // Check if the content includes "You are scheduled"
                if (node.nodeType === Node.TEXT_NODE && node.textContent.includes('You are scheduled')) {
                    // If the text "You are scheduled" is found, show the call-ty div
                    showCallTy();
                }
            });
        }
    });
});

// INPUT MASKING
document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('inputField');
    const tfaInput = document.getElementById('tfa_3');
    const nextButton = document.getElementById('button-next');

    // Set initial placeholder
    phoneInput.value = '###-###-####';

    // When the input field is clicked, clear the placeholder
    phoneInput.addEventListener('click', function () {
        if (phoneInput.value === '###-###-####') {
            phoneInput.value = '';
        }
    });

    // As the user types, format the input as XXX-XXX-XXXX
    phoneInput.addEventListener('input', function () {
        let inputValue = phoneInput.value.replace(/\D/g, '');
        if (inputValue.length > 10) {
            inputValue = inputValue.slice(0, 10);
        }
        let formattedValue = '';
        for (let i = 0; i < inputValue.length; i++) {
            if (i === 3 || i === 6) {
                formattedValue += '-';
            }
            formattedValue += inputValue[i];
        }
        phoneInput.value = formattedValue;

        // Check if the input is a valid phone number
        if (isValidPhoneNumber(phoneInput.value)) {
            nextButton.disabled = false;
        } else {
            nextButton.disabled = true;
        }
    });

    // When the phone input field loses focus (blur event), update the tfa_3 input
    phoneInput.addEventListener('blur', function () {
        tfaInput.value = phoneInput.value;
        tfaInput.classList.add('clicked'); // Add the visual signal
    });

    // Function to check if the input is a valid phone number
    function isValidPhoneNumber(input) {
        // A simple check for XXX-XXX-XXXX format
        return /^\d{3}-\d{3}-\d{4}$/.test(input);
    }
});

// Function to start observing the Calendly iframe for changes
// Function to hide the call-title div
function hideCallTitle() {
    const callTitleDiv = document.querySelector('.call-title');
    if (callTitleDiv) {
        callTitleDiv.style.display = 'none';
    }
}

// Function to hide the element with id "calendly-back" after a short delay
function hideBtnBack() {
    const calendlyBack = document.getElementById('calendly-back');
    if (calendlyBack) {
        calendlyBack.style.display = 'none';
    }
}

// Function to show the call-ty div
function showCallTy() {
    const callTyDiv = document.querySelector('.call-ty');
    if (callTyDiv) {
        callTyDiv.style.display = 'block';
    } else {
        console.error("call-ty div not found.");
    }
}



// Listen for the event_scheduled event
document.addEventListener('event_scheduled', function (event) {
    // When the event is triggered, hide the call-title div, calendly-back, show the call-ty div, and scroll to offcanvasBottom1
    hideCallTitle();
    hideBtnBack();
    showCallTy();
    scrollToOffcanvasBottom1();
});

// Adobe Analytics rule to detect event_scheduled
window.addEventListener('message', function (e) {
    if (e.data.event && e.data.event.indexOf('calendly') === 0 && e.data.event.split('.')[1] === 'event_scheduled') {
        // Trigger the event_scheduled event in the browser
        document.dispatchEvent(new Event('event_scheduled'));
    }
});

jQuery(function($){
    $('#tfa_3').on('focus', function(e){
        var inputWrapper = $(this).closest('.inputWrapper')
        var placeholder = inputWrapper.find('span.placeholder');
        if(!placeholder.length) el.after('<span class="placeholder">Phone*</span>');
    });

    if($('#tfa_3').length) {
        if(!$('#tfa_3 span.placeholder').length) {
            $('#tfa_3').after('<span class="placeholder">Phone*</span>');
        }
    }
});