<!--header-->
<?php include("header.php"); ?>
<!--header/-->
<body>
<div class="container">
    <h1>Aquavita Distributor Registration</h1>
    <p class="subtitle">Join hands with India’s trusted water brand</p>

    <form action="submit.php" method="POST">
        <label>Full Name</label>
        <input type="text" name="full_name" required minlength="3">

        <label>Email Address</label>
        <input type="email" name="email" required>

        <label>Phone Number</label>
        <input type="tel" name="phone" pattern="[0-9]{10}" required>

        <label>Address</label>
        <textarea name="address" required></textarea>

        <div class="row">
            <div>
                <label>City</label>
                <input type="text" name="city" required>
            </div>
            <div>
                <label>State</label>
                <input type="text" name="state" required>
            </div>
        </div>

        <label>Pincode</label>
        <input type="text" name="pincode" pattern="[0-9]{6}" required>

        <button type="submit">Apply for Distributorship</button>
    </form>
</div>
</body>
       <!--footer-->
<?php include("footer.php"); ?>
<!--footer/-->
