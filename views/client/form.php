<?php
// Preselect radio buttons
$genderF = ' checked';
$genderM = '';
$genderD = '';

if (isset($c)) {
    if ($c->getGender() === 'female') {
        $genderF = ' checked';
    }
    if ($c->getGender() === 'male') {
        $genderM = ' checked';
        $genderF = '';
    }
    if ($c->getGender() === 'diverse') {
        $genderD = ' checked';
        $genderF = '';
    }
}
?>
<?php include 'views/header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5"><?= isset($id) ? 'Edit Client' : 'Add Client'; ?></h3>
            <form action="index.php" method="post" class="mt-3">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                <input type="hidden" name="area" value="<?php echo $area; ?>">
                <input type="hidden" name="id" value="<?php echo (isset($c) && ($c instanceof Client)) ? $c->getId() : ''; ?>">

                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name:</label>
                    <input name="firstName" class="form-control" value="<?php echo (isset($c) && ($c instanceof Client)) ? $c->getFirstName() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name:</label>
                    <input name="lastName" class="form-control" value="<?php echo (isset($c) && ($c instanceof Client)) ? $c->getLastName() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender:</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="female" name="gender" value="female" class="form-check-input" <?php echo $genderF; ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="male" name="gender" value="male" class="form-check-input" <?php echo $genderM; ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="diverse" name="gender" value="diverse" class="form-check-input" <?php echo $genderD; ?>>
                        <label class="form-check-label" for="diverse">Diverse</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dateOfBirth" class="form-label">Date of Birth:</label>
                    <input name="dateOfBirth" type="date" class="form-control" value="<?php echo (isset($c) && ($c instanceof Client)) ? $c->getDateOfBirth() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="countryOfOrigin" class="form-label">Country of Origin:</label>
                    <input name="countryOfOrigin" class="form-control" value="<?php echo (isset($c) && ($c instanceof Client)) ? $c->getCountryOfOrigin() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input name="email" type="email" class="form-control" value="<?php echo (isset($c) && ($c instanceof Client)) ? $c->getEmail() : ''; ?>">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-info me-2" value="Save">
                    <input type="reset" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'views/footer.php'; ?>
