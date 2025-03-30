<?php

error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 0);

//include('autoloader.php');
require('classes/conn.php');
require('classes/main.class.php');
require('classes/staff.class.php');
require('classes/info.class.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <title>Barangay Calaocan Information System</title>


  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    html,
    body {
      overflow-x: hidden;
      width: 100%;
    }


    /* Navbar */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
      background-color: rgba(17, 43, 90, 0.9);
      position: relative;
    }

    .nav__bar {
      display: flex;
      align-items: center;
      width: 100%;
      justify-content: space-between;
    }

    .nav__menu__btn {
      display: none;
      font-size: 28px;
      cursor: pointer;
      color: white;
    }

    .nav__links {
      display: flex;
      list-style: none;
      gap: 15px;
    }

    .nav__links li {
      padding: 10px;
    }

    .nav__links a {
      text-decoration: none;
      color: white;
      font-size: 16px;
    }

    /* Responsive Navbar */
    @media (max-width: 768px) {
      .nav__menu__btn {
        display: block;
      }

      .nav__links {
        display: none;
        flex-direction: column;
        background-color: rgba(17, 43, 90, 0.9);
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        text-align: center;
        padding: 10px 0;
      }

      .nav__links.active {
        display: flex;
      }
    }

    /* Info Box */
    #info {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      text-align: center;
      max-width: 80%;
    }

    @media (max-width: 768px) {
      #info {
        width: 90%;
        padding: 15px;
      }
    }

    /* Background Section */
    .xx_background {
      padding-top: 4rem;
      background: linear-gradient(rgba(17, 43, 90, 0.5), rgba(17, 43, 90, 0.5)),
        url("assets/front6.jpg") center/cover no-repeat;
      height: 450px;
    }

    /* About Section */
    .about__container {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .about__content {
      flex: 1;
      max-width: 50%;
      padding: 20px;
    }

    .about__image {
      flex: 1;
      max-width: 50%;
      text-align: center;
    }

    .about__image img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    @media (max-width: 1024px) {
      .about__container {
        flex-direction: column;
        text-align: center;
      }

      .about__content {
        max-width: 100%;
      }

      .about__image img {
        width: 80%;
      }
    }

    @media (max-width: 768px) {
      .about__container {
        flex-direction: column;
      }

      .about__content {
        padding: 10px;
      }

      .about__image img {
        width: 100%;
      }
    }

    /* Table Styles */
    .table-container {
      width: 60%;
      margin: 0 auto;
      overflow-x: auto;
    }

    .table {
      width: 100%;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      border: 1px solid rgb(7, 12, 17);
    }

    .table thead th {
      background-color: #007aff;
      color: white;
    }

    .table-hover tbody tr:hover {
      background-color: #f8f9fa;
    }

    @media (max-width: 1024px) {
      .table-container {
        width: 90%;
      }
    }

    @media (max-width: 768px) {
      .table-container {
        width: 100%;
      }
    }

    /* Scroll to Top Button */
    #scrollTopBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      border: none;
      background-color: rgba(17, 43, 90, 0.7);
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 50%;
      transition: background-color 0.3s ease;
      font-size: 40px;
    }

    #scrollTopBtn:hover {
      background-color: rgba(17, 43, 90, 0.9);
    }

    /* Vision & Mission Section */
    .vision-mission__container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 2rem;
      padding: 40px 20px;
    }

    .vision-mission__image {
      flex: 0 0 30%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .vision-mission__image img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .vision-mission__content {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 2rem;
      text-align: left;
    }

    @media (max-width: 768px) {
      .vision-mission__container {
        flex-direction: column;
        text-align: center;
      }
    }

    /* Footer */
    .footer {
      background-color: #007bff;
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    .footer__col {
      margin-bottom: 20px;
    }

    .footer__links {
      list-style: none;
      padding: 0;
    }

    .footer__links li {
      margin-bottom: 10px;
    }

    .footer__socials {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 15px;
      padding: 0;
    }

    .footer__socials a {
      color: white;
      font-size: 24px;
    }

    @media (max-width: 768px) {
      .footer {
        text-align: center;
      }
    }

    .vision-mission__container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 2rem;
      padding: 40px 20px;
    }

    .vision-mission__image {
      flex: 0 0 30%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .vision-mission__image img {
      max-width: 80%;
      height: auto;
      border-radius: 10px;
    }

    .vision-mission__content {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      text-align: left;
    }

    .section__header {
      font-size: 24px;
      font-weight: bold;
    }

    .section__description {
      font-size: 16px;
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .vision-mission__container {
        flex-direction: column;
        text-align: center;
      }

      .vision-mission__image {
        margin-bottom: 20px;
      }

      .vision-mission__content {
        text-align: center;
      }
    }

    .vision-mission__container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 2rem;
      padding: 40px 20px;
      max-width: 900px;
      /* Ensures consistent width */
      margin: 0 auto;
    }

    .vision-mission__image {
      flex: 0 0 30%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .vision-mission__image img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .vision-mission__content {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      text-align: left;
      text-align: justify;
      /* Justifies text */
    }

    .about__background {
      max-width: 900px;
      /* Matches the vision and mission width */
      margin: 0 auto;
      text-align: justify;
      /* Justifies text */
    }

    .section__header {
      font-size: 24px;
      font-weight: bold;
      text-align: left;
    }

    .section__description {
      font-size: 16px;
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .vision-mission__container {
        flex-direction: column;
        text-align: center;
      }

      .vision-mission__image {
        margin-bottom: 20px;
      }

      .vision-mission__content {
        text-align: center;
      }
    }
  </style>


</head>

<body>
  <header class="header">
    <nav class="navbar">
      <div class="nav__bar">
        <div class="logo">
          <a href="#"><img src="assets/loggo.png" alt="logo" height="100px" style="border-radius: 50%;" /></a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#service">SERVICES</a></li>
        <li><a href="#client">LOCATION</a></li>
        <li><a href="#offer">ACTIVITIES</a></li>
        <li><a href="index_login.php">LOGIN</a></li>
      </ul>
    </nav>
  </header>

  <div id="info">
    <h2>Calaocan, Santiago City, Isabela</h2>
    <p>Open Hours of Barangay: Monday to Friday (8:00 AM - 5:00 PM)</p>
    <p>brgycalaocan@gmail.com | 046-509-1664</p>
  </div>


  <div style="height:400px;" class="xx_background"></div>

  <section class="section__container about__container">
    <div class="about__content about__background">
      <h2 class="section__header">BACKGROUND OF BARANGAY</h2>
      <?php
      require('classes/conn.php');
      $id_brgy_info = 1;
      $sql = "SELECT background FROM brgy_info WHERE id_brgy_info = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id_brgy_info);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row) {
        echo "<p class='section__description'>{$row['background']}</p>";
      } else {
        echo "No content found.";
      }
      ?>
    </div>
  </section>

  <section class="section__container vision-mission__container">
    <div class="vision-mission__image">
      <img src="assets/loggo.png" alt="Barangay Logo">
    </div>
    <div class="vision-mission__content">
      <h2 class="section__header">VISION</h2>
      <?php
      $sql = "SELECT vision FROM brgy_info WHERE id_brgy_info = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id_brgy_info);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row) {
        echo "<p class='section__description'>{$row['vision']}</p>";
      } else {
        echo "No content found.";
      }
      ?>

      <h2 class="section__header">MISSION</h2>
      <?php
      $sql = "SELECT mission FROM brgy_info WHERE id_brgy_info = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id_brgy_info);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row) {
        echo "<p class='section__description'>{$row['mission']}</p>";
      } else {
        echo "No content found.";
      }
      ?>
    </div>
  </section>





  <br><br><br><br>























  <div class="table-container">
    <div align="center">
      <h1>BARANGAY OFFICIALS</h1>
    </div><br><br>
    <table class="table table-hover text-center table-bordered" id="dataTable" cellspacing="0">

      <thead class="thead-light"> <!-- Use thead-light class for header styling -->
        <!--<tr>
                    <th style="width: 50%;">Full Name</th>
                    <th style="width: 50%;">Position</th>
                </tr>-->
      </thead>
      <tbody>
        <?php
        require('classes/conn.php');

        try {
          // Establish database connection
          $conn = new PDO('mysql:host=localhost;dbname=bmis', 'root', '');


          // Set PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Prepare and execute SQL query
          $stmt = $conn->prepare("SELECT name, position FROM tbl_officials");
          $stmt->execute();

          // Check if there are rows returned
          if ($stmt->rowCount() > 0) {
            // Fetch data and display in HTML table
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
              <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['position']; ?></td>
              </tr>
        <?php
            }
          } else {
            // Display message if no data found
            echo '<tr><td colspan="2">No records found</td></tr>';
          }
        } catch (PDOException $e) {
          // Handle database errors
          echo '<tr><td colspan="2">Error: ' . $e->getMessage() . '</td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
  <section class="section__container service__container" id="service">
    <center>
      <h2 class="section__header"><br>Our Services</h2>
      <p class="section__description">
        Barangay services cover safety, health, social welfare, development, dispute resolution, and disaster response.
      </p>
    </center>
    <div class="service__grid">
      <div class="service__card">
        <?php
        require('classes/conn.php');

        // Assuming $id_services contains the ID of the service
        $id_services = 6; // Example service ID

        // Query the database to fetch the filename of the image associated with the service ID
        $sql = "SELECT image_service FROM tbl_services WHERE id_services = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_services);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Output the filename of the image
        if ($row) {
          $filename = $row['image_service'];

          // Construct the <img> tag to display the image
          echo '<img src="' . $filename . '" alt="Service Image">';
        } else {
          echo "No image found for service ID $id_services";
        }
        ?>

        <div>
          <div>
            <br><br>
            <h4>BUSINESS CLEARANCE</h4>
            <p>
              A business clearance is a permit allowing a business to operate legally within a specific area by meeting local regulations and requirements.
            </p>
          </div>
        </div>
      </div>
      <div class="service__card">
        <?php
        require('classes/conn.php');

        // Assuming $id_services contains the ID of the service
        $id_services = 1; // Example service ID

        // Query the database to fetch the filename of the image associated with the service ID
        $sql = "SELECT image_service FROM tbl_services WHERE id_services = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_services);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Output the filename of the image
        if ($row) {
          $filename = $row['image_service'];

          // Construct the <img> tag to display the image
          echo '<img src="' . $filename . '" alt="Service Image">';
        } else {
          echo "No image found for service ID $id_services";
        }
        ?>
        <div>
          <div>
            <br><br>
            <h4>BARANGAY CLEARANCE</h4>
            <p>
              A barangay clearance is a document certifying a person's residence and good standing within a local community in the Philippines.
            </p>
          </div>

        </div>
      </div>
      <div class="service__card">
        <?php
        require('classes/conn.php');

        // Assuming $id_services contains the ID of the service
        $id_services = 5; // Example service ID

        // Query the database to fetch the filename of the image associated with the service ID
        $sql = "SELECT image_service FROM tbl_services WHERE id_services = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_services);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Output the filename of the image
        if ($row) {
          $filename = $row['image_service'];

          // Construct the <img> tag to display the image
          echo '<img src="' . $filename . '" alt="Service Image">';
        } else {
          echo "No image found for service ID $id_services";
        }
        ?>
        <div>
          <div>
            <br><br>
            <h4>CERTIFICATE OF INDIGENCY</h4>
            <p>
              A document issued by a local government unit certifying that an individual or family is financially disadvantaged, often required for availing of social services or benefits.
            </p>
          </div>

        </div>
      </div>
      <div class="service__card">
        <?php
        require('classes/conn.php');

        // Assuming $id_services contains the ID of the service
        $id_services = 4; // Example service ID

        // Query the database to fetch the filename of the image associated with the service ID
        $sql = "SELECT image_service FROM tbl_services WHERE id_services = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_services);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Output the filename of the image
        if ($row) {
          $filename = $row['image_service'];

          // Construct the <img> tag to display the image
          echo '<img src="' . $filename . '" alt="Service Image">';
        } else {
          echo "No image found for service ID $id_services";
        }
        ?>
        <div>
          <div>
            <br>
            <h4>CERTIFICATE OF RESIDENCY</h4>
            <p>
              A Certificate of Residency is an official document confirming an individual's address within a specific area, often required for government services or local applications.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>




  <section class="client" id="client">
    <div class="section__container client__container">
      <center>
        <br /><br />
        <h2 class="section__header">LOCATION</h2>
      </center>
      <p class="section__description" style="text-align: center;">
        Calaocan Barangay Hall<br>
        634X+433, Santiago City, 3311 Isabela </p>
      <br />
      <div style="overflow:hidden; padding-top:56.25%; position:relative; height:0;">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.8602776761966!2d121.09766676159578!3d14.20537676231249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5ec23047e24f%3A0x3d0351c77a2d8169!2sCanlubang%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1688496782923!5m2!1sen!2sph"
          width="1200"
          height="500"
          style="border:0; position:absolute; top:0; left:0; width:100%; height:100%;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </section>

  <style>
    .section__container {
      padding: 20px;
    }

    .offer__header {
      text-align: center;
    }

    .section__header {
      margin-bottom: 20px;
    }

    .offer__grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }

    .offer__card {
      width: calc(33.33% - 20px);
      margin-bottom: 20px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
    }

    .offer__card img {
      width: 100%;
      height: auto;
    }

    .offer__card h4,
    .offer__card p {
      padding: 10px;
    }

    @media screen and (max-width: 992px) {
      .offer__card {
        width: calc(50% - 20px);
      }
    }

    @media screen and (max-width: 640px) {
      .offer__card {
        width: 100%;
      }
    }
  </style>
  <section class="section__container offer__container" id="offer">
    <div class="offer__header">
      <h2 class="section__header">Recent Activities</h2>
    </div>
    <div class="offer__grid">
      <div class="offer__card">
        <?php
        require('classes/conn.php');

        // Prepare the SQL query
        $stmt = $conn->prepare("SELECT name, date, image FROM tbl_activities ORDER BY date DESC LIMIT 1");

        // Execute the query
        $stmt->execute();

        // Fetch all the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Loop through the results and display them
        foreach ($results as $result) {
          $filename = $result['image']; // Corrected: Use $result instead of $results

          // Construct the <img> tag to display the image
          echo '<img src="' . $filename . '" alt="Service Image">';
          echo '<p>' . $result['name'] . '</p>';
          echo '<p>' . $result['date'] . '</p>';
          // Add more HTML here to display additional data if needed
        }
        ?>
      </div>
      <div class="offer__card">
        <?php
        require('classes/conn.php');

        // Prepare the SQL query
        $stmt = $conn->prepare("SELECT name, date, image FROM tbl_activities LIMIT 1 OFFSET 1");

        // Execute the query
        $stmt->execute();

        // Fetch all the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Loop through the results and display them
        foreach ($results as $result) {
          $filename = $result['image']; // Corrected: Use $result instead of $results

          // Construct the <img> tag to display the image
          echo '<img src="' . $filename . '" alt="Service Image">';
          echo '<h4>' . $result['name'] . '</h4>';
          echo '<p>' . $result['date'] . '</p>';
          // Add more HTML here to display additional data if needed
        }
        ?>
      </div>
      <div class="offer__card">
        <?php
        require('classes/conn.php');

        // Prepare the SQL query
        $stmt = $conn->prepare("SELECT name, date, image FROM tbl_activities LIMIT 1 OFFSET 2");

        // Execute the query
        $stmt->execute();

        // Fetch all the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Loop through the results and display them
        foreach ($results as $result) {
          $filename = $result['image']; // Corrected: Use $result instead of $results

          // Construct the <img> tag to display the image
          echo '<img src="' . $filename . '" alt="Service Image">';
          echo '<h4>' . $result['name'] . '</h4>';
          echo '<p>' . $result['date'] . '</p>';
          // Add more HTML here to display additional data if needed
        }
        ?>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="logo">
          <h4><b>INFORMATION SYSTEM</b></h4>
        </div>
        <hr>
        <p>
          <b>Calaocan</b> is a barangay in the city of Santiago, in the province of Isabela.
        </p>
        <ul class="footer__socials">
          <li>
            <a style="background-color: blue;" href="https://web.facebook.com/p/Barangay-Biclatan-100069121909069/?locale=en_GB&_rdc=1&_rdr"><i class="ri-facebook-fill"></i></a>
          </li>
        </ul>
      </div>

      <div class="footer__col">
        <h4>Contact Us</h4>
        <ul class="footer__links">
          <li>
            <?php
            require('classes/conn.php');

            // Assuming $id_brgy_info contains the ID of the barangay information
            $id_brgy_info = 1; // Example barangay information ID

            // Query the database to fetch the contact information associated with the barangay information ID
            $sql = "SELECT contact FROM brgy_info WHERE id_brgy_info = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id_brgy_info);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Output the contact information along with the phone icon
            if ($row) {
              $contact = $row['contact'];

              echo "<span>";
              echo "<i class='ri-phone-fill'></i></span> $contact<br />";
              echo "";
            } else {
              echo "No content found for barangay information ID $id_brgy_info";
            }
            ?>
          </li>
          <li>
            <?php
            require('classes/conn.php');

            // Assuming $id_brgy_info contains the ID of the barangay information
            $id_brgy_info = 1; // Example barangay information ID

            // Query the database to fetch the contact information associated with the barangay information ID
            $sql = "SELECT email FROM brgy_info WHERE id_brgy_info = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id_brgy_info);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Output the contact information along with the phone icon
            if ($row) {
              $email = $row['email'];

              echo "<span>";
              echo "<i class='ri-mail-line'></i></span> $email<br />";
              echo "";
            } else {
              echo "No content found for barangay information ID $id_brgy_info";
            }
            ?>
          </li>
          <li>
            <?php
            require('classes/conn.php');

            // Assuming $id_brgy_info contains the ID of the barangay information
            $id_brgy_info = 1; // Example barangay information ID

            // Query the database to fetch the contact information associated with the barangay information ID
            $sql = "SELECT brgy, municipal, province FROM brgy_info WHERE id_brgy_info = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id_brgy_info);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Output the contact information along with the phone icon
            if ($row) {
              $brgy = $row['brgy'];
              $municipal = $row['municipal'];
              $province = $row['province'];

              echo "<span>";
              echo "<i class='ri-map-pin-2-fill'></i></span> $brgy, $municipal, $province<br />";
              echo "";
            } else {
              echo "No content found for barangay information ID $id_brgy_info";
            }
            ?>
          </li>
        </ul>
      </div>
      <div class="about__image">
        <img src="assets/loggo.png" alt="about" style="width:100%; max-width: 200px; height: auto; margin-bottom: 10px; border-radius: 50%" />
      </div>
    </div>
  </footer>


  <!-- Scroll to top button -->
  <button id="scrollTopBtn" onclick="scrollToTop()">
    <i class="ri-arrow-up-s-line"></i>
  </button>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="main.js"></script>
  <script>
    // Function to scroll to the top of the page
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    // Show or hide the scroll to top button based on scroll position
    window.onscroll = function() {
      var scrollTopBtn = document.getElementById("scrollTopBtn");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollTopBtn.style.display = "block";
      } else {
        scrollTopBtn.style.display = "none";
      }
    };
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const menuBtn = document.getElementById("menu-btn");
      const navLinks = document.getElementById("nav-links");

      menuBtn.addEventListener("click", function() {
        navLinks.classList.toggle("active");
      });
    });
  </script>

</body>

</html>