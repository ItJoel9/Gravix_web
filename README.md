# Gravix_web
## Overview

Gravix is an immersive gaming e-commerce platform offering a variety of games across multiple genres. This platform allows users to browse games, view details, purchase titles, and interact through reviews and ratings. Below is a detailed guide to the functionality and structure of the website.

<br>

## Features
1.Home Page (index.php)
  - Showcases featured games and offers a filter system for genre and platform.
  - Includes navigation links to other sections: About, Cart, and Login.

2.About Page (about.php)
  - Highlights the mission and vision of Gravix.
  - Provides a button to return to the homepage.

3.Game Pages
Individual pages for each featured game, including:

  - Elden Ring (elden.php)

  - Ghost of Tsushima (ghost.php)

  - God of War: Ragnarok (gow.php)

  - The Last of Us (last.php)

  - Red Dead Redemption 2 (rdr2.php)

  - Marvel's Spider-Man (spider.php)

 ### Common Features:

  - Gameplay trailers embedded from YouTube.

  - Game descriptions, features, and pricing.

  - Review system with ratings and bars showing rating distribution.

  - Buttons for "Add to Cart" and "Buy Now."

4.Cart Page (cart.php)

  - Displays items added to the cart with their quantities and prices.

  - Allows users to proceed to checkout.

5.Checkout Page (buy.php)

  - Collects billing and payment information.

  - Offers multiple payment methods including Credit Card, UPI, Net Banking, and Cash on Delivery.

6.Login Page (login.php)

  - Enables user authentication.

  - Provides a link to the registration page for new users.

7.Registration Page (register.php)

  - Allows new users to create an account.

8.Payment Confirmation Page (Payment_conformed.php)

  - Displays a success message with confetti animation after a successful payment.

<br>

## Technologies Used

  - HTML5 and PHP: Markup for the structure of the website and backend scripting.

  - CSS3: Styling and layout, including flexbox and responsive design.

  - JavaScript: For interactivity, including local storage for cart and review management.

  - MySQL: Backend database for managing user accounts, cart data, and orders.

  - XAMPP: Development environment including Apache server and MySQL for local testing.

<br> 

## File structure

/
|-- index.php              # Homepage
|-- about.php              # About Gravix
|-- cart.php               # Shopping Cart
|-- buy.php                # Checkout Page
|-- login.php              # Login Page
|-- register.php           # Registration Page
|-- Payment_conformed.php  # Payment Confirmation
|-- elden.php              # Elden Ring Details
|-- ghost.php              # Ghost of Tsushima Details
|-- gow.php                # God of War: Ragnarok Details
|-- last.php               # The Last of Us Details
|-- rdr2.php               # Red Dead Redemption 2 Details
|-- spider.php             # Marvel's Spider-Man Details
<br>

## Setup and Installation

1.Clone the repository to your local machine.

2.Place all files in the htdocs directory of your XAMPP installation.

3.Start Apache and MySQL services using the XAMPP control panel.

4.Create a MySQL database and import the provided SQL file (if available) to set up the necessary tables.

5.Ensure the following dependencies are configured:

  - Correct paths for image and video assets used in the PHP files.

  - Update database credentials in the PHP files if necessary.

<br>

## Future Updates

1.Enhanced User Profiles

  - Add user profiles with order history and wishlist features.

2.Dynamic Content Management

  - Implement a CMS or admin panel for managing games and content dynamically.

3.Advanced Authentication

  - Enable features such as password recovery and two-factor authentication.

4.Improved UX/UI

  - Incorporate animations and modern design trends.

6.Payment Gateway Integration

  - Add real payment processing options.
<br>

Developed by: Joel K Mathews
Game Images & Trailers: Respective game publishers and developers.

Icons: Google 

<br>

For any inquiries or issues, please contact joelkmathews2005@gmail.com.

