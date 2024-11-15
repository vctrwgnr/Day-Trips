<?php include 'views/header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5"><?= isset($id) ? 'Edit Trip' : 'Add Trip'; ?></h3>
            <form action="index.php" method="post" class="mt-3">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                <input type="hidden" name="area" value="<?php echo $area; ?>">
                <input type="hidden" name="id" value="<?php echo (isset($t) && $t instanceof Trip) ? $t->getId() : ''; ?>">

                <div class="mb-3">
                    <label for="Destination" class="form-label">Destination:</label>
                    <input name="destination" class="form-control" value="<?php echo (isset($t) && $t instanceof Trip) ? $t->getDestination() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Description:</label>
                    <textarea class="form-control" rows="3" name="description"><?php echo (isset($t) && $t instanceof Trip) ? $t->getDescription() : ''; ?></textarea>
                </div>

                <!-- Center the buttons -->
                <div class="text-center">
                    <input type="submit" class="btn btn-info me-2" value="Save">
                    <input type="reset" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'views/footer.php'; ?>
