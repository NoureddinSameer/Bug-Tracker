<?php
include './general/env.php';
include './general/functions.php';
include './shared/head.php';
include './shared/header1.php';

checklink();
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                
                <li class="breadcrumb-item"><a href="">
                        login</a></li>
                <li class="breadcrumb-item active"><a href="welcome.php">Dashboard</a></li>
            </ol>
        </nav>
    </div>

</main>

<img src="<?= './upload/bug-tracking-tools.webp."width=1299 height=440"'  ?>" class="img-card-top" alt="">
<?php
include './shared/footer.php';
include './shared/script.php';
?>