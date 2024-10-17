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
  } else if (type === "ErrorNotice"){

  } else if (type === "SuccessNotice"){

  }
}
