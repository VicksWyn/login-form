const loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission

  // Client-side validation (optional)
  // You can add checks for username and password format here

  // Send data to server-side script (login.php) using AJAX or fetch API
  // Here's an example using fetch:

  fetch('login.php', {
    method: 'POST',
    body: new FormData(loginForm) // Send form data as FormData
  })
  .then(response => response.json()) // Parse JSON response (if applicable)
  .then(data => {
    // Handle server response (e.g., display success/error message)
    if (data.success) {
      // Login successful (redirect or display success message)
      console.log('Login successful!');
      // Replace with your desired action on success
    } else {
      // Login failed (display error message)
      console.error('Login failed:', data.error);
      // Replace with your error handling logic
    }
  })
  .catch(error => {
    // Handle errors during communication with server
    console.error('Error:', error);
    // Replace with your error handling logic
  });
});