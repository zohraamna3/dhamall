document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById("editBtn");
    const cancelEditBtn = document.getElementById("cancelEdit");
    const editActions = document.getElementById("editActions");
    const editableElements = document.querySelectorAll(".editable");
    const paymentMethodRadios = document.querySelectorAll("input[name='payment_method']");
    const cardDetails = document.getElementById("cardDetails");

    let originalValues = {};

    // Enable Editing
    editBtn.addEventListener("click", function () {
        originalValues = {}; // Reset stored values
        editableElements.forEach(el => {
            const fieldName = el.getAttribute("data-field");
            const inputField = el.nextElementSibling;

            if (inputField) {
                originalValues[fieldName] = el.textContent.trim(); // Store original values
                el.classList.add("d-none"); // Hide text
                inputField.classList.remove("d-none"); // Show input
            }
        });

        // Enable radio buttons for editing
        paymentMethodRadios.forEach(radio => {
            radio.removeAttribute("disabled");
        });

        editActions.classList.remove("d-none"); // Show Save/Cancel buttons
        editBtn.classList.add("d-none"); // Hide Edit button
    });

    // Cancel Editing
    cancelEditBtn.addEventListener("click", function () {
        editableElements.forEach(el => {
            const fieldName = el.getAttribute("data-field");
            const inputField = el.nextElementSibling;

            if (inputField) {
                el.textContent = originalValues[fieldName]; // Restore original value
                el.classList.remove("d-none"); // Show text
                inputField.classList.add("d-none"); // Hide input
            }
        });

        // Disable radio buttons
        paymentMethodRadios.forEach(radio => {
            if (!radio.checked) {
                radio.setAttribute("disabled", true);
            }
        });

        editActions.classList.add("d-none"); // Hide Save/Cancel buttons
        editBtn.classList.remove("d-none"); // Show Edit button
    });

    // Handle Payment Method Change
    paymentMethodRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "paypal") {
                cardDetails.classList.add("d-none"); // Hide card details
            } else {
                cardDetails.classList.remove("d-none"); // Show card details
            }
        });
    });
});
