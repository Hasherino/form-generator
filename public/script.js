document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("add-field-button")) {
            const fieldContainers = document.querySelector(".field-containers");
            const newFieldContainer = document.createElement("div");
            newFieldContainer.className = "field-container";
            newFieldContainer.innerHTML = `
                    <input class="field-title edit-icon" name="fields[]" type="text" value="New Field"/></br>
                    <div class="constraint-container">
                        <select class="constraint-dropdown">
                            <option value="" disabled selected>Select validation option</option>
                            <option value="Option 1">Email</option>
                            <option value="Option 2">Phone number</option>
                            <option value="Option 3">Only numbers</option>
                            <option value="Option 4">Custom regex</option>
                            <option value="None">None</option>
                        </select>
                        <div class="custom-regex-input">
                            <label for="custom-regex">Custom regex:</label>
                            <input type="text" class="custom-regex" name="regex[]" placeholder="Enter regex">
                        </div>
                    </div>
                    <div class="delete-field-button" onclick="this.parentElement.remove()">
                        <i class="fa fa-trash" style="font-size: 24px;"></i>
                    </div>
                `;
            fieldContainers.appendChild(newFieldContainer);
        }
    });

    document.addEventListener("change", function (event) {
        const dropdown = event.target;
        const selectedOption = dropdown.value;
        const customRegexInput = dropdown.parentElement.querySelector(".custom-regex-input");

        if (selectedOption === "Option 4") {
            // "Custom regex" selected
            customRegexInput.style.display = "block";
            customRegexInput.querySelector(".custom-regex").setAttribute("required", true);
        } else {
            customRegexInput.style.display = "none";
            customRegexInput.querySelector(".custom-regex").removeAttribute("required");
        }

        // Hide "Select validation option" in the dropdown
        hideOptionInDropdown(dropdown, "Select validation option");
    });

    // Handle form submission
    document.querySelector("#dynamicForm").addEventListener("submit", function (event) {
        const fields = document.querySelectorAll(".field-title");
        const regexInputs = document.querySelectorAll(".custom-regex");

        for (let i = 0; i < fields.length; i++) {
            const selectedOption = fields[i].closest(".field-container").querySelector(".constraint-dropdown").value;

            if (selectedOption === "Option 4") {
                // Set the regex value only if "Custom regex" is selected
                regexInputs[i].value = regexInputs[i].value || getDefaultRegex(selectedOption);
            } else if (selectedOption === "None") {
                // Set an empty string for "None" option
                regexInputs[i].value = "";
            } else {
                // Set the default regex value for other options
                regexInputs[i].value = getDefaultRegex(selectedOption);
            }
        }

        // Prevent form submission if "Select validation option" is selected
        if (document.querySelector(".constraint-dropdown").value === "") {
            event.preventDefault();
            alert("Please select a validation option.");
        }
    });

    function getDefaultRegex(option) {
        // Define default regex values based on the selected option
        switch (option) {
            case "Option 1": // Email
                return "^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$";
            case "Option 2": // Phone number
                return "^\\d{10}$";
            case "Option 3": // Only numbers
                return "^\\d+$";
            default:
                return "/.*/"; // Default for other options
        }
    }

    function hideOptionInDropdown(dropdown, optionToHide) {
        const option = Array.from(dropdown.options).find(opt => opt.text === optionToHide);
        if (option) {
            option.style.display = "none";
        }
    }
});
