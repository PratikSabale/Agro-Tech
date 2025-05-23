<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Customer Feedback Form</title>
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 12px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      font-weight: 400;
      }
      h4 {
      margin: 15px 0 4px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
      }
      form {
      width: 100%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      vertical-align: middle;
      }
      .email {
      display: block;
      width: 45%;
      }
      input:hover, textarea:hover {
      outline: none;
      border: 1px solid #095484;
      }
      th, td {
      width: 15%;
      padding: 15px 0;
      border-bottom: 1px solid #ccc;
      text-align: center;
      vertical-align: unset;
      line-height: 18px;
      font-weight: 400;
      word-break: break-all;
      }
      .first-col {
      width: 16%;
      text-align: left;
      }
      table {
      width: 100%;
      }
      textarea {
      width: calc(100% - 6px);
      }
      .btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
      @media (min-width: 568px) {
      th, td {
      word-break: keep-all;
      }
      }
    </style>
  </head>
  <body >
    <div class="testbox">
      <form  method="post">
        <h1>Customer Feedback Form</h1>
        <p>Please take a few minutes to give us feedback about our service by filling in this short Customer Feedback Form. We are conducting this research in order to measure your level of satisfaction with the quality of our service. We thank you for your participation.</p>
        <hr />
        <h3>Overall experience with our service</h3>
        <table>
          <tr>
            <th class="first-col"></th>
            <th>Very Good</th>
            <th>Good</th>
            <th>Fair</th>
            <th>Poor</th>
            <th>Very Poor</th>
          </tr>
          <tr>
            <td class="first-col">How would you rate your overall experience with our service?</td>
            <td><input type="radio" value="very Good" name="rate"></td>
            <td><input type="radio" value="Good" name="rate" ></td>
            <td><input type="radio" value="Fair" name="rate" ></td>
            <td><input type="radio" value="Poor" name="rate" ></td>
            <td><input type="radio" value="Very Poor" name="rate" ></td>
          </tr>
          <tr>
            <td class="first-col">How satisfied are you with the comprehensiveness of our offer?</td>
            <td><input type="radio" value="very Good" name="satisfied"></td>
            <td><input type="radio" value="Good" name="satisfied" ></td>
            <td><input type="radio" value="Fair" name="satisfied" ></td>
            <td><input type="radio" value="Poor" name="satisfied" ></td>
            <td><input type="radio" value="Very Poor" name="satisfied" ></td>
          </tr>
          <tr>
            <td class="first-col">How would you rate our prices?</td>
            <td><input type="radio" value="very Good" name="prices"></td>
            <td><input type="radio" value="Good" name="prices" ></td>
            <td><input type="radio" value="Fair" name="prices" ></td>
            <td><input type="radio" value="Poor" name="prices" ></td>
            <td><input type="radio" value="Very Poor" name="prices" ></td>
          </tr>
          <tr>
            <td class="first-col">How satisfied are you with the timeliness of order delivery?</td>
            <td><input type="radio" value="very Good" name="timeliness" ></td>
            <td><input type="radio" value="Good" name="timeliness" ></td>
            <td><input type="radio" value="Fair" name="timeliness" ></td>
            <td><input type="radio" value="Poor" name="timeliness" ></td>
            <td><input type="radio" value="Very Poor" name="timeliness" ></td>
          </tr>
          <tr>
            <td class="first-col">How satisfied are you with the customer support?</td>
            <td><input type="radio" value="very Good" name="custsupport"></td>
            <td><input type="radio" value="Good" name="custsupport" ></td>
            <td><input type="radio" value="Fair" name="custsupport" ></td>
            <td><input type="radio" value="Poor" name="custsupport" ></td>
            <td><input type="radio" value="Very Poor" name="custsupport" ></td>
          </tr>
          <tr>
            <td class="first-col">Would you recommend our product / service to other people?</td>
            <td><input type="radio" value="Very Good" name="recommend"></td>
            <td><input type="radio" value="Good" name="recommend" ></td>
            <td><input type="radio" value="Fair" name="recommend" ></td>
            <td><input type="radio" value="Poor" name="recommend" ></td>
            <td><input type="radio" value="Very Poor" name="recommend"></td>
          </tr>
        </table>
        <h4>What should we change in order to live up to your expectations?</h4>
        <textarea rows="3" input type="text" name="message"></textarea>
        <h4>Email</h4>
        <small>Only if you want to hear more from us.</small>
        <input class="email" type="email" name="email" >
        <div class="btn-block">
          <button type="submit" name="btnsub" href="#">Send Feedback</button>
        </div>
      </form>
    </div>
  </body>
</html>
<?php
include("footer.php");
if(isset($_POST['btnsub'])) 
{
  extract($_POST);
  include("connection.php");
  $q="insert into feedback values('$rate','$satisfied','$prices','$timeliness','$custsupport','$recommend','$message','$email')";
  mysqli_query($cn,$q);
  mysqli_close($cn);
  echo"<script>alert('Feedback Submitted');window.location='index.php'</script>";
}
?>
