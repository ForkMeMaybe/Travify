document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {
        const name = document.getElementById("name").value.trim();
        const age = document.getElementById("age").value.trim();
        const gender = document.getElementById("gender").value.trim();
        const email = document.getElementById("email").value.trim();
        const phone = document.getElementById("phone").value.trim();

        const nameRegex = /^[A-Za-z\s]+$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\d{10}$/;

        let errors = [];

        if (!name || !nameRegex.test(name)) {
            errors.push("Please enter a valid name (letters and spaces only).");
        }

        if (!age || isNaN(age) || age < 1 || age > 120) {
            errors.push("Please enter a valid age between 1 and 120.");
        }

        if (!gender) {
            errors.push("Please enter your gender.");
        }

        if (!email || !emailRegex.test(email)) {
            errors.push("Please enter a valid email address.");
        }

        if (!phone || !phoneRegex.test(phone)) {
            errors.push("Please enter a valid 10-digit phone number.");
        }

        if (errors.length > 0) {
            alert(errors.join("\n"));
            e.preventDefault(); // ❌ Don't submit if errors
        } else {
            // ✅ No errors – disable the button to prevent double submit
            form.querySelector("button").disabled = true;
        }
    });
});

