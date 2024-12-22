// Modal functionality
const connectInstructorBtn = document.querySelector('.connect-instructor');
const modal = document.getElementById('connectInstructorModal');
const closeModal = document.querySelector('.modal .close');

if (connectInstructorBtn && modal && closeModal) {
    connectInstructorBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
}

// Grading button functionality
const gradeButton = document.querySelector('.cta.check-plagiarism');
const loadingModal = document.getElementById('loadingModal');
const loadingMessage = document.getElementById('loadingMessage');

const messages = [
    "Checking grammar...",
    "Analyzing sentence structure...",
    "Counting words...",
    "Consulting the grammar wizard...",
    "Polishing your prose...",
    "Almost there..."
];

if (gradeButton && loadingModal && loadingMessage) {
    gradeButton.addEventListener('click', function() {
        loadingModal.style.display = 'block';
        let index = 0;

        const interval = setInterval(() => {
            if (index < messages.length) {
                loadingMessage.textContent = messages[index];
                index++;
            } else {
                clearInterval(interval);
                // Simulate grading completion
                setTimeout(() => {
                    loadingModal.style.display = 'none';
                    alert('Grading complete!');
                }, 1000);
            }
        }, 1000);
    });
}

const optionsButtons = document.querySelectorAll(".option-button");

// Function to modify text based on button click
function modifyText(command, value = null) {
    document.execCommand(command, false, value);
}

// Event listeners for format buttons
optionsButtons.forEach(button => {
    button.addEventListener("click", () => {
        modifyText(button.id);
        button.classList.toggle("active");
    });
});

// Initial settings for font size and format block
document.getElementById("fontSize").addEventListener("change", (e) => {
    modifyText("fontSize", e.target.value);
});

document.getElementById("formatBlock").addEventListener("change", (e) => {
    modifyText("formatBlock", `<${e.target.value}>`);
});

document.getElementById("text-input").focus();