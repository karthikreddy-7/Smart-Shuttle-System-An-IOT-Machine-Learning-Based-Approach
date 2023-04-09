<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript" src="script.js"></script>
    <title>Smart Shuttle System - Check Balance</title>
  <title>Smart Shuttle System - Check Balance</title>
</head>
<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a href="index.html" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <span class="ml-11 text-xl">Smart Shuttle System</span>
          </a>
          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900">FAQ</a>
            <a href="recharge.html" class="mr-5 hover:text-gray-900">RECHARGE</a>
            <a class="mr-5 hover:text-gray-900">ABOUT US</a>
          </nav>
          <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">SIGN UP/ENROLL NOW
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </header>
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "buspass";
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Retrieve username from form data
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $username = $_POST['username'];
      
      // Connect to MySQL database
      
      
      // Check if connection was successful
      if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
      }
      
      // Query database to retrieve user balance
      $query = "SELECT AMOUNT FROM entry WHERE username = '$username'";
      $result = mysqli_query($conn, $query);
      
      // Check if query was successful
      if ($result) {
        // Retrieve user balance from query result
        $row = mysqli_fetch_assoc($result);
        $balance = $row['AMOUNT'];
        
        // Display user balance
        echo '<h1>Your balance is: ' . $balance . '</h1>';
      } else {
        // Display error message if query was unsuccessful
        echo '<h1>Error retrieving balance.</h1>';
      }
      
      // Close database connection
      mysqli_close($conn);
    }
  ?>
<section>
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
          <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left md:mt-0 mt-10">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg>
              <span class="ml-3 text-xl">Smart Shuttle System</span>
            </a>
            <p class="mt-2 text-sm text-gray-500">A new way for easier payments.</p>
          </div>
          <div class="flex-grow flex flex-wrap md:pr-20 -mb-10 md:text-left text-center order-first">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">A Project of IOT</h2>
              <nav class="list-none mb-10">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">about</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Instructions</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">recharge</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Location </a>
                </li>
              </nav>
            </div>
          </div>
        </div>
      </footer>
</section>
</body>
</html>
