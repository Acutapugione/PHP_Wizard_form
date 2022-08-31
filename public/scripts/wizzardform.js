if (!sessionStorage) {
    alert("Session storage не підтримується");
}
var currentTab = 0;

if (sessionStorage.getItem('currentTab')) {
    currentTab = parseInt(sessionStorage.getItem('currentTab'));
    if (currentTab < 0) {
        currentTab = 0;
    }
}

sessionStorage.setItem('currentTab', currentTab);

var wizzardForm = document.querySelector(".wizzard-form");

var wizzardFormFields = wizzardForm.querySelectorAll("input, select");

var tabs = wizzardForm.querySelectorAll(".wizzard-tab");
var steps = wizzardForm.querySelectorAll(".step");

var previousBtn = wizzardForm.querySelector("#prevBtn");
var nextBtn = wizzardForm.querySelector("#nextBtn");


loadData(wizzardFormFields);
saveData(wizzardFormFields);

showTab(currentTab); // Display the current tab

function saveData(items) {
    items.forEach(item => {
        item.addEventListener('input', (e) => {
            sessionStorage.setItem(item.id, item.value);
        });
    });
}


function loadData(items) {
    items.forEach(item => {
        if (sessionStorage.getItem(item.id)) {
            item.value = sessionStorage.getItem(item.id);
        }
    });
}


function showTab(tabNumber) {
    if (tabs !== undefined && tabs[tabNumber] !== undefined) {
        tabs[tabNumber].style.display = "block";
        if (tabNumber == 0) {
            previousBtn.style.display = "none";
        } else {
            previousBtn.style.display = "inline";
        }
        if (tabNumber == (tabs.length - 1)) {
            nextBtn.innerHTML = "Submit";
        } else {
            nextBtn.innerHTML = "Next";
        }
    }
    fixStepIndicator(tabNumber)
}


function nextPrev(tabNumber) {
    if (tabNumber == 1 && !validateForm()) return false;
    if (tabs !== undefined && tabs[currentTab] !== undefined) tabs[currentTab].style.display = "none";
    currentTab += tabNumber;
    if (currentTab < 0) currentTab = 0;
    if (currentTab >= tabs.length) {
        wizzardForm.submit();
        sessionStorage.clear();
        return false;
    }
    showTab(currentTab);
    sessionStorage.setItem('currentTab', currentTab);
}


function validateForm() {
    var isValid = true;
    if (tabs[currentTab] !== undefined) {
        var currentFields = tabs[currentTab].querySelectorAll("input, select");
        currentFields.forEach(element => {
            if (element.value.length == 0 && element.required == true) {
                element.classList.add("invalid");
                isValid = false;
            }
        });
    } else {
        isValid = false;
    }
    if (isValid) {
        let currentStep = steps[currentTab];
        if (currentStep) {
            currentStep.classList.add('finish');
        }
    }
    return isValid;
}


function fixStepIndicator(tabNumber) {
    if (steps !== undefined) {
        steps.forEach(element => {
            element.classList.remove("active");
        });
        if (steps[tabNumber] !== undefined) {
            steps[tabNumber].classList.add("active");
        }
    }
    sessionStorage.setItem('currentTab', tabNumber);
}
