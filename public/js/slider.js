function sliderSwitch() {
    const switchCheckbox = document.getElementById('flexSwitchCheckDefault');
    const recoveryCodeLabel = document.getElementById('recoveryCodeLabel');
    const twoFactorForm = document.getElementById('twoFactorForm');
    const recoveryCodeForm = document.getElementById('recoveryCodeForm');
    const switchText = document.getElementById('switchText');

    if (switchCheckbox) {
        switchCheckbox.addEventListener('change', function () {
            if (switchCheckbox.checked) {
                twoFactorForm.classList.add('hidden');
                recoveryCodeForm.classList.remove('hidden');
                recoveryCodeLabel.classList.remove('hidden');
                switchText.textContent = 'slide to enter Two Factor Code';
            } else {
                twoFactorForm.classList.remove('hidden');
                recoveryCodeForm.classList.add('hidden');
                recoveryCodeLabel.classList.add('hidden');
                switchText.textContent = 'slide to enter Recovery Code';
            }
        });
        if (switchCheckbox.checked) {
            twoFactorForm.classList.add('hidden');
            recoveryCodeForm.classList.remove('hidden');
            recoveryCodeLabel.classList.remove('hidden');
        } else {
            twoFactorForm.classList.remove('hidden');
            recoveryCodeForm.classList.add('hidden');
            recoveryCodeLabel.classList.add('hidden');
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    sliderSwitch();
});
