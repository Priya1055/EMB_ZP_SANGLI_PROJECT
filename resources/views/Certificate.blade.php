<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Completion Certificate</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px; /* Increase the overall margin */
    }

    .certificate {
      max-width: 800px; /* Increase the maximum width */
      margin: auto;
      text-align: center;
      border: 1px solid #ccc;
      padding: 30px; /* Increase the padding */
      border-radius: 10px;
    }

    .signature {
      margin-top: 40px;
    }

    label {
      display: inline-block;
      text-align: left;
      width: 40%; /* Adjust the width as needed */
      margin-bottom: 15px; /* Increase the margin */
    }

    input {
      width: 58%; /* Adjust the width as needed */
      box-sizing: border-box;
      margin-bottom: 20px; /* Increase the margin */
      padding: 8px; /* Increase the padding */
    }
  </style>
</head>
<body>

<div class="certificate">
  <h3>Completion Certificate of Original Work</h3>

  <label for="nameOfWork"><strong>Name of Work:</strong></label>
  <input type="text" id="nameOfWork" name="nameOfWork" placeholder="Enter the name of the work">

  <label for="authority"><strong>Authority:</strong></label>
  <input type="text" id="authority" name="authority" placeholder="Enter the authority">

  <label for="estimateNo"><strong>Estimate No.:</strong></label>
  <input type="text" id="estimateNo" name="estimateNo" placeholder="Enter the estimate number">

  <label for="planNo"><strong>Plan No.:</strong></label>
  <input type="text" id="planNo" name="planNo" placeholder="Enter the plan number">

  <label for="estimatedCost"><strong>Estimated Cost:</strong></label>
  <input type="text" id="estimatedCost" name="estimatedCost" placeholder="Enter the estimated cost">

  <label for="tenderedCost"><strong>Tendered Cost:</strong></label>
  <input type="text" id="tenderedCost" name="tenderedCost" placeholder="Enter the tendered cost">

  <p>Certified that the work mentioned above was completed on 30/07/2023</p>
  <p>and that there have been no material deviations from the sanctioned plan</p>
  <p>and specifications other than those sanctioned by competent authority.</p>

  <div class="signature">
    <p>Deputy Engineer</p>
    <p>City Engineer</p>
    <p>P.W. Sub Division, P.W. Division, Sangli Miraj</p>
  </div>
</div>

</body>
</html>
