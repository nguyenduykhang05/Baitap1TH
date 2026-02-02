<?php ob_start(); ?>

<div class="page-header">
    <h1>Khám phá Sản phẩm</h1>
    <a href="/project1/Product/add" class="btn btn-primary">
        + Thêm sản phẩm
    </a>
</div>

<div class="product-grid">
    <?php if (empty($products)): ?>
        <p>Chưa có sản phẩm nào.</p>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <div class="product-image">
                    <?php if ($product->getImage()): ?>
                        <img src="<?php echo htmlspecialchars($product->getImage()); ?>" alt="<?php echo htmlspecialchars($product->getName()); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%; background: #f1f5f9;">
                            <span style="font-size: 3rem;">📦</span>
                            <span style="font-size: 0.8rem; margin-top: 0.5rem; color: #94a3b8;">No Image</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="product-content">
                    <h3 class="product-title"><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p class="product-desc"><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
                    
                    <div class="product-footer">
                        <span class="product-price">$<?php echo number_format($product->getPrice(), 2); ?></span>
                        
                        <div class="actions">
                             <a href="/project1/Cart/add/<?php echo $product->getID(); ?>" class="btn btn-primary btn-sm" style="margin-right: auto;">
                                Thêm vào giỏ hàng
                             </a>
                             <a href="/project1/Product/edit/<?php echo $product->getID(); ?>" class="btn btn-outline btn-sm">Sửa</a>
                             <a href="/project1/Product/delete/<?php echo $product->getID(); ?>" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php 
$content = ob_get_clean();
include 'app/views/layout.php';
?>