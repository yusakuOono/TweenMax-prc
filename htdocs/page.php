<?php
	$code = false;
	if(!empty($_GET['code'])){
		$code = $_GET['code'];
	}
    $filename = $_SERVER['DOCUMENT_ROOT'] . '/htdocs/content/'.$code.'.php';
    if (!file_exists($filename) | $code === false) {
        header("HTTP/1.0 404 Not Found");
    }
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/include/common/common.php'); ?>
<body>
	<?php include($_SERVER['DOCUMENT_ROOT'] . '/include/common/header.php'); ?>
    <main id="WRAPPER">

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/include/common/breadcrumb.php'); ?>

    <?php if(@!include($_SERVER['DOCUMENT_ROOT'] . '/htdocs/content/'.$code.'.php')): ?>
        <article class="MODULE wrap">
            <div class="display">
                <p>お探しのページは見つかりませんでした。</p>
            </div>
        </article>
    <?php endif; ?>

    </main>
	<?php include($_SERVER['DOCUMENT_ROOT'] . '/include/common/footer.php'); ?>
</body>
</html>