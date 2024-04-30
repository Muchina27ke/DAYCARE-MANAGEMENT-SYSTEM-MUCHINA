document.addEventListener("DOMContentLoaded", function () {
  // Get the form element and add a submit event listener
  var form = document.getElementById("sendMessageForm");
  form.addEventListener("submit", function (event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the message input value
    var messageInput = document.getElementById("messageInput").value;

    // Get sender ID and receiver ID from the URL parameters
    var urlParams = new URLSearchParams(window.location.search);
    var senderId = urlParams.get("sender_id");
    var receiverId = urlParams.get("receiver_id");

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open("POST", "ajax/send_message.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Define what happens on successful data submission
    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        // Reset the message input field
        document.getElementById("messageInput").value = "";

        // Refresh the message thread (optional)
        refreshMessageThread();
      }
    };

    // Define what happens in case of error
    xhr.onerror = function () {
      console.error("Error occurred while sending message.");
    };

    // Send the request with the message input value and IDs as data
    var formData =
      "senderId=" +
      senderId +
      "&receiverId=" +
      receiverId +
      "&content=" +
      encodeURIComponent(messageInput);
    xhr.send(formData);
  });

  // Refresh message thread onload
  refreshMessageThread();

  // Refresh message thread every 1 second
  setInterval(refreshMessageThread, 1000);

  function refreshMessageThread() {
    // Get the message thread element
    var messageThread = document.getElementById("messageThread");

    // Retrieve senderId and receiverId from the URL parameters
    var urlParams = new URLSearchParams(window.location.search);
    var senderId = urlParams.get("sender_id");
    var receiverId = urlParams.get("receiver_id");

    // Construct the URL with senderId and receiverId as parameters
    var url = "ajax/fetch_message.php?sender_id=" + senderId + "&receiver_id=" + receiverId;

    // Fetch messages from the server and update the message thread
    fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
      .then(data => {
        // Update the message thread with the fetched data
        messageThread.innerHTML = data;
      })
      .catch(error => {
        console.error('Error occurred while fetching messages:', error);
      });
  }
});

// Add event listener to all buttons with class 'btnOpenThread'
document.querySelectorAll(".btnOpenThread").forEach((button) => {
  button.addEventListener("click", function () {
    // Get sender ID and receiver ID from data attributes
    var senderId = this.getAttribute("data-sender-id");
    var receiverId = this.getAttribute("data-receiver-id");

    // Construct URL for message thread page
    var url = "messages?sender_id=" + senderId + "&receiver_id=" + receiverId;

    // Redirect to the message thread page
    window.location.href = url;
  });
});
