<?php ob_start(); ?>

<div class="page-header">
    <h1>Chỉnh sửa sản phẩm</h1>
</div>

<div style="max-width: 600px; background: white; padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow);">
    <form method="POST" action="/project1/Product/edit/<?php echo $product->getID(); ?>">
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product->getName()); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($product->getDescription()); ?></textarea>
        </div>

        <div class="form-group">
            <label for="price">Giá ($)</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo $product->getPrice(); ?>" required>
        </div>

        <div class="form-group">
            <label for="image">URL Hình ảnh</label>
            <input type="url" id="image" name="image" value="<?php echo htmlspecialchars($product->getImage() ?? ''); ?>">
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="/project1/Product/list" class="btn btn-outline">Hủy bỏ</a>
        </div>
    </form>
</div>

<?php 
$content = ob_get_clean();
include 'app/views/layout.php';
?>