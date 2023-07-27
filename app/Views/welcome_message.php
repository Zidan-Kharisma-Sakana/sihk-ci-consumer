<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<?= $this->include('navbar') ?>

<body>
    <!-- CONTENT -->
    <section class="container mt-4"  style="min-height: 80vh;">
        <form method="GET">
            <div>
                <label for="komoditi">Komoditi</label>
                <select name="komoditi">
                    <option value="">Semua</option>
                    <?php foreach ($komoditi as $key => $value) : ?>
                        <option <?php if (isset($_GET["komoditi"])) {
                                    if ($_GET["komoditi"] == $key) echo "selected";
                                };
                                ?> value="<?php echo $key ?>"><?php echo $value . " - " . $key ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="wilayah">Wilayah</label>
                <select name="wilayah">
                    <option value="">Semua</option>
                    <?php foreach ($wilayah as $key => $value) : ?>
                        <option <?php if (isset($_GET["wilayah"])) {
                                    if ($_GET["wilayah"] == $key) echo "selected";
                                };
                                ?> value="<?php echo $key ?>"><?= esc($value) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit">search</button>
        </form>
        <div>
            <?php foreach ($data as $item) : ?>
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo "Nama: " . $item->nama_komoditi ?></h5>
                        <p class="card-subtitle"><?php echo "Wilayah: " . $item->nama_wilayah ?></p>
                        <p><?php echo "Harga Terakhir: " . $item->harga_terakhir ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer class="jumbotron jumbotron-fluid mt-5 mb-0">
        <div class="container text-center">Copyright &copy <?= Date('Y') ?> CI News</div>
    </footer>

    <!-- SCRIPTS -->
    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>