<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Store</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/project1/public/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="/project1/Product/list" class="brand">PremiumStore.</a>
            <nav class="nav-links">
                <a href="/project1/Product/list">Sản phẩm</a>
                <a href="#">Giỏ hàng (0)</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <!-- Content Placeholder -->
            <?php echo $content ?? ''; ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 PremiumStore. Built with MVC.</p>
        </div>
    </footer>
</body>
</html>
