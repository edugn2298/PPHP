// Definir la función closeModal y hacerla global
window.closeModal = function () {
  const existingModal = document.querySelector(".fixed.z-50");
  if (existingModal) {
    existingModal.remove();
  }
};

export function ErrorSuccessMessage(element, message, type) {
  const existingNotification = element.parentNode.querySelector(".text-sm");
  if (existingNotification) {
    existingNotification.remove();
  }

  const notification = document.createElement("p");
  notification.classList.add("text-sm", "mb-2"); // Siempre se agrega text-sm y mb-2
  notification.textContent = message;

  if (type === "error") {
    notification.classList.add("text-red-500");
    element.classList.add("border-red-500");
    element.classList.remove("border-green-500");
    element.style.backgroundImage = "none";
    element.parentNode.appendChild(notification);
  } else if (type === "success") {
    notification.classList.add("text-green-500");
    element.classList.add("border-green-500");
    element.classList.remove("border-red-500");
    element.parentNode.appendChild(notification);
  } else if (type === "") {
    element.classList.remove("border-red-500");
    element.classList.remove("border-green-500");
    element.style.backgroundImage = "none";
    existingNotification.remove();
  }
}

export function showModal(element, message, type) {
  // Remove any existing modals
  const existingModal = document.querySelector(".fixed");
  if (existingModal) {
    existingModal.remove();
  }
  // Define the HTML for the modal based on the type
  const modalHtml = `
    <div id="hs-basic-modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
      <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
          <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
            <h3 id="hs-basic-modal-label" class="font-bold ${
              type === "success" ? "text-green-600" : "text-red-600"
            }">
              ${type === "success" ? "Success" : "Error"}
            </h3>
            <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" onclick="closeModal()">
              <span class="sr-only">Close</span>
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
              </svg>
            </button>
          </div>
          <div class="p-4 overflow-y-auto">
            <p class="mt-1 text-gray-800 dark:text-neutral-400">${message}</p>
          </div>
          <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" onclick="closeModal()">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  `;

  // Inject the HTML into the DOM
  const modalContainer = document.createElement("div");
  modalContainer.innerHTML = modalHtml;
  document.body.appendChild(modalContainer);
}

// Example closeModal function to remove the modal from the DOM
export function closeModal() {
  const existingModal = document.querySelector(".fixed");
  if (existingModal) {
    existingModal.remove();
  }
}

// Example to open modals
export function openModal(message, type) {
  console.log(message, type);
  showModal(document.body, message, type);
}
