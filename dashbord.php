dashbord.php
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Bitnami: Open Source. Simplified</title>
  <link href="bitnami.css" media="all" rel="Stylesheet" type="text/css" />
  <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="contain-to-grid">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="/dashboard/index.html">Apache Friends</a></h1>
        </li>
        <li class="toggle-topbar menu-icon">
          <a href="#">
            <span>Menu</span>
          </a>
        </li>
      </ul>

      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
          <li class="active"><a href="/applications.html">Applications</a></li>
          <li class=""><a href="/dashboard/faq.html">FAQs</a></li>
          <li class=""><a href="/dashboard/howto.html">HOW-TO Guides</a></li>
          <li class=""><a target="_blank" href="/dashboard/phpinfo.php">PHPInfo</a></li>
          <li class=""><a href="/phpmyadmin/">phpMyAdmin</a></li>
        </ul>
      </section>
    </nav>
  </div>
  <div id="wrapper">
    <div class="hero">
       <div class="row">
         <div class="large-12 columns">
            <p>Apache Friends and Bitnami are cooperating to make dozens of open source applications available on XAMPP, for free. Bitnami-packaged applications include Wordpress, Drupal, Joomla! and dozens of others and can be deployed with one-click installers. Visit the <a href="https://bitnami.com/xampp?utm_source=bitnami&utm_medium=installer&utm_campaign=XAMPP%2BModule" target="_blank">Bitnami XAMPP page</a> for details on the currently available apps.</p><br/>
            <p>Check out our <a href="https://www.apachefriends.org/bitnami_for_xampp.html" target="_blank" >Bitnami for XAMPP Start Guide</a> for more information about the applications installed.</p>
         </div>
       </div>
    </div>
    <div id="lowerContainer" class="row">
      <div id="content" class="large-12 columns">
          <!-- @@BITNAMI_MODULE_PLACEHOLDER@@ -->
      </div>
    </div>
  </div>
  <footer>
    <div class="row">
      <div class="large-12 columns">
        <div class="row">
          <div class="large-8 columns">
            <ul class="social">
              <li class="twitter"><a href="https://twitter.com/apachefriends">Follow us on Twitter</a></li>
              <li class="facebook"><a href="https://www.facebook.com/we.are.xampp">Like us on Facebook</a></li>
              <li class="google"><a href="https://plus.google.com/+xampp/posts">Add us to your G+ Circles</a></li>
            </ul>

            <ul class="inline-list">
              <li><a href="https://www.apachefriends.org/blog.html">Blog</a></li>
              <li><a href="https://www.apachefriends.org/privacy_policy.html">Privacy Policy</a></li>
              <li>
                <a target="_blank" href="http://www.fastly.com/">                    CDN provided by
                  <img width="48" data-2x="/dashboard/images/fastly-logo@2x.png" src="/dashboard/images/fastly-logo.png" />
                </a>
              </li>
            </ul>
          </div>
          <div class="large-4 columns">
            <p class="text-right">Copyright (c) 2015, Apache Friends</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>apachefriends.orgBitnami for XAMPPInstructions on how to install and use Bitnami XAMPP modules.X (formerly Twitter)Apache Friends (@apachefriends) on XWe are XAMPP![11:29 AM]izo ni iza dashboard
[11:30 AM]<?php
header('Content-Type: application/json');

// --- Database connection ---
$host = "localhost";
$db_name = "L5NIT"; // make sure this exists!
$username = "root";
$password = ""; // niba ufite password shyiramo

$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) {
 echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
 exit;
}

// --- Get JSON input from POST ---
$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['temperature']) || !isset($input['humidity'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
 exit;
}

$temperature = floatval($input['temperature']);
$humidity = floatval($input['humidity']);

// --- Prepare statement ---
$stmt = $conn->prepare("INSERT INTO sensor_data (temperature, humidity) VALUES (?, ?)");
if (!$stmt) {
   echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);exit;
}

$stmt->bind_param("dd", $temperature, $humidity);

// --- Execute statement ---
if ($stmt->execute()) {
  echo json_encode([
 'success' => true,
 'message' => 'Data inserted successfully',
 'inserted' => [
     'id' => $stmt->insert_id,
       'temperature' => $temperature,
         'humidity' => $humidity
 ]
  ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Insert failed: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>[11:30 AM]izo ni insert
[11:32 AM]<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = "localhost";
$username = "root";
$password = "";
$dbname = "L5NIT";
$conn = mysqli_connect($host, $username, $password, $dbname);
if ($conn) {
  echo "Connection connected";
} else {
  // Ereka impamvu nyirizina yo kunanirwa
  echo "SQL error: " . mysqli_connect_error();
}
?>