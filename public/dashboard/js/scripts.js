/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
document.getElementById('bookingForm').addEventListener('submit', function(event) {
    const checkInDate = document.getElementById('check-in').value;
    const checkOutDate = document.getElementById('check-out').value;

    if (checkInDate && checkOutDate && new Date(checkInDate) >= new Date(checkOutDate)) {
        alert("Check-out date must be after check-in date.");
        event.preventDefault(); // Prevent form submission
    }
});
document.getElementById("booking-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const fullName = document.getElementById("full-name").value;
    const email = document.getElementById("email").value;
    const checkIn = document.getElementById("check-in").value;
    const checkOut = document.getElementById("check-out").value;
    const roomType = document.getElementById("room-type").value;
    const guests = document.getElementById("number-of-guests").value;
    const specialRequests = document.getElementById("special-requests").value;

    if (!fullName || !email || !checkIn || !checkOut || !roomType || !guests) {
        alert("Please fill in all required fields!");
        return;
    }
    alert(`Booking Successful!
Name: ${fullName}
Email: ${email}
Check-in: ${checkIn}
Check-out: ${checkOut}
Room Type: ${roomType}
Guests: ${guests}
Special Requests: ${specialRequests ? specialRequests : "None"}`);
});