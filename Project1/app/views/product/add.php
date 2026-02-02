<?php ob_start(); ?>

<div class="page-header center" style="flex-direction: column; align-items: flex-start;">
    <h1>Thêm sản phẩm mới</h1>
</div>

<div style="max-width: 600px; background: white; padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow);">
    <?php if (!empty($errors)): ?>
        <div style="background: #fef2f2; color: #941a1aff; padding: 1rem; border-radius: var(--radius); margin-bottom: 1.5rem;">
            <ul style="list-style: disc; padding-left: 1.5rem;">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/project1/Product/add">
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" id="name" name="name" required placeholder="Nhập tên sản phẩm...">
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea id="description" name="description" rows="4" required placeholder="Mô tả chi tiết..."></textarea>
        </div>

        <div class="form-group">
            <label for="price">Giá ($)</label>
            <input type="number" id="price" name="price" step="0.01" required placeholder="0.00">
        </div>

        <div class="form-group">
            <label for="image">URL Hình ảnh</label>
            <input type="url" id="image" name="image" placeholder="https://example.com/image.jpg">
            <small style="color: var(--text-muted);">Copy link ảnh từ internet paste vào đây</small>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
            <a href="/project1/Product/list" class="btn btn-outline">Hủy bỏ</a>
        </div>
    </form>
</div>

<?php 
$content = ob_get_clean();
include 'app/views/layout.php';
?>