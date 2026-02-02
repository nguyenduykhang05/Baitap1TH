<?php ob_start(); ?>

<div class="page-header">
    <h1>Giỏ hàng của bạn</h1>
    <a href="/project1/Product/list" class="btn btn-outline">← Tiếp tục mua sắm</a>
</div>

<div class="cart-container">
    <?php if (empty($cartItems)): ?>
        <div class="empty-cart" style="text-align: center; padding: 4rem;">
            <h3>Giỏ hàng đang trống</h3>
            <p style="color: var(--text-muted); margin-bottom: 2rem;">Hãy thêm vài sản phẩm tuyệt vời nhé!</p>
            <a href="/project1/Product/list" class="btn btn-primary">Xem sản phẩm</a>
        </div>
    <?php else: ?>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <thead style="background: var(--background); border-bottom: 2px solid var(--border);">
                <tr>
                    <th style="padding: 1rem; text-align: left;">Sản phẩm</th>
                    <th style="padding: 1rem; text-align: center;">Giá</th>
                    <th style="padding: 1rem; text-align: center;">Số lượng</th>
                    <th style="padding: 1rem; text-align: right;">Tổng</th>
                    <th style="padding: 1rem;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 1rem;">
                            <strong><?php echo htmlspecialchars($item['product']->getName()); ?></strong>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            $<?php echo number_format($item['product']->getPrice(), 2); ?>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            <?php echo $item['quantity']; ?>
                        </td>
                        <td style="padding: 1rem; text-align: right; font-weight: bold; color: var(--primary);">
                            $<?php echo number_format($item['total'], 2); ?>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            <a href="/project1/Cart/remove/<?php echo $item['product']->getID(); ?>" 
                               class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot style="background: var(--background); font-weight: bold;">
                <tr>
                    <td colspan="3" style="padding: 1rem; text-align: right;">Tổng cộng:</td>
                    <td style="padding: 1rem; text-align: right; font-size: 1.25rem; color: var(--primary);">
                        $<?php echo number_format($totalParam, 2); ?>
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div style="margin-top: 2rem; text-align: right;">
            <a href="/project1/Cart/checkout" class="btn btn-primary">
                Tiến hành thanh toán
            </a>
        </div>
    <?php endif; ?>
</div>

<?php 
$content = ob_get_clean();
include 'app/views/layout.php';
?>
