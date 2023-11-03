document.addEventListener("click", function(event) {
    if (event.target.classList.contains("add-constraint-button")) {
        const fieldContainer = event.target.parentElement;
        const newConstraintContainer = document.createElement("div");
        newConstraintContainer.className = "constraint-container";
        newConstraintContainer.innerHTML = `
                <select class="constraint-dropdown">
                    <option value="Option 1">Email</option>
                    <option value="Option 2">Phone number</option>
                    <option value="Option 3">Only numbers</option>
                    <option value="Option 4">Length</option>
                    <option value="Option 5">Custom regex</option>
                </select>
                <button class="delete-constraint-button">-</button>
                <div class="min-max-inputs"></div>
            `;
        fieldContainer.insertBefore(newConstraintContainer, event.target);
    }

    if (event.target.classList.contains("add-field-button")) {
        const fieldContainers = document.querySelector(".field-containers");
        const newFieldContainer = document.createElement("div");
        newFieldContainer.className = "field-container";
        newFieldContainer.innerHTML = `
                <div class="field-title edit-icon" contenteditable="true">New Field</div><br>
                <button class="add-constraint-button">+ Add new constraint</button>
                <div class="delete-field-button" onclick="this.parentElement.remove()">
                    <i class="fa fa-trash" style="font-size: 24px;"></i>
                </div>
            `;
        fieldContainers.appendChild(newFieldContainer);
    }

    if (event.target.classList.contains("delete-constraint-button")) {
        event.target.parentElement.remove();
    }
});

document.addEventListener("change", function(event) {
    if (event.target.classList.contains("constraint-dropdown")) {
        const selectedOption = event.target.value;
        const minMaxInputs = event.target.parentElement.querySelector(".min-max-inputs");

        if (selectedOption === "Option 4") { // "Length" selected
            minMaxInputs.innerHTML = `
                    <label for="min">Min:</label>
                    <input type="number" id="min" name="min" required>
                    <label for="max">Max:</label>
                    <input type="number" id="max" name="max" required>
                `;
            minMaxInputs.style.display = "block";
        } else {
            minMaxInputs.innerHTML = ""; // Clear the inputs
            minMaxInputs.style.display = "none";
        }
    }
});
