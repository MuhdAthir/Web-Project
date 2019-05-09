<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crafted by Soul</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/all.css">
<script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
</head>
<body>
<div w3-include-html="navbar.html"></div>
<div class="container">
  <div align="center">
    <div class="grid-container" align="left">
      <div class="grid-item" style="padding: 10px">
        <div class="card">
          <div class="card-header"><strong>Table Summary</strong></div>
          <div class="card-body">
            <table class="table">
              <tr>
                <td rowspan="3" width="25%"><img alt="" src="../img/MIFFY022.jpg" class="img-pro"></td>
                <td>Totte Pillow</td>
                <td rowspan="3" width="20%"><button class="btn-danger"><i class="fas fa-trash"></i></button></td>
              </tr>
              <tr>
                <td>RM 35.00</td>
              </tr>
              <tr>
                <td>Quantity: 1</td>
              </tr>
              <tr>
                <td rowspan="3" width="25%"><img alt="" src="../img/pencil.jpg" class="img-pro"></td>
                <td>Kotak Pensil</td>
                <td rowspan="3" width="20%"><button class="btn-danger"><i class="fas fa-trash"></i></button></td>
              </tr>
              <tr>
                <td>RM 35.00</td>
              </tr>
              <tr>
                <td>Quantity: 1</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="grid-item" style="padding: 10px">
        <div class="card">
          <div class="card-header"><strong>Shipping Detail</strong></div>
          <div class="card-body">
            <input class="form-input" type="text" placeholder="Full Name">
            <input class="form-input" type="text" placeholder="Address 1">
            <input class="form-input" type="text" placeholder="Address 2">
            <input class="form-input" type="text" placeholder="Address 3">
            <div class="row">
              <div class="col-6">
                <input class="form-input" type="number" min="0" maxlength="6" onInput="javascript: if (this.value.length > this.maxLength){this.value = this.value.slice(0, this.maxLength)}"placeholder="Passcode">
              </div>              
				<div class="col-6">
                <select class="form-input">
					<option value="Perlis">Perlis</option>
					<option value="Perak">Perak</option>
					<option value="Pulau Pinang">Pulau Pinang</option>
					<option value="Kedah">Kedah</option>
					<option value="Kelantan">Kelantan</option>
					<option value="Terengganu">Terengganu</option>
					<option value="Pahang">Pahang</option>
					<option value="Johor">Johor</option>
					<option value="Melaka">Melaka</option>
					<option value="Negeri Sembilan">Negeri Sembilan</option>
					<option value="Selangor">Selangor</option>
					<option value="Sarawak">Sarawak</option>
					<option value="Sabah">Sabah</option>
					<option value="Wilayah Kuala Lumpur">Wilayah Kuala Lumpur</option>
					<option value="Wilayah Putrajaya">Wilayah Putrajaya</option>
					<option value="Wilayah Labuan">Wilayah Labuan</option>
				</select>
              </div>
            </div>
			 <table class="table">
			  <tr><td>Item</td><td>2</td></tr>
			  <tr><td>Price</td><td>RM150</td></tr>
			  <tr><td>Shipping fee</td><td>RM 2.50</td></tr>
			  <tr><th>Total</th><th>RM152.50</th></tr>
			  </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>
<script>
includeHTML();
</script>