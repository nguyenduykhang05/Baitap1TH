<?php ob_start(); ?>

<div class="page-header">
    <h1>Thông tin giao hàng</h1>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; align-items: start;">
    
    <!-- Left: Shipping Form -->
    <div style="background: white; padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow);">
        <form method="POST" action="/project1/Cart/processOrder">
            <h3 style="margin-bottom: 1.5rem;">Địa chỉ nhận hàng</h3>
            
            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" id="fullname" name="fullname" required placeholder="Nguyễn Văn A">
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="tel" id="phone" name="phone" required placeholder="09xxxxxxx">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ chi tiết</label>
                <textarea id="address" name="address" rows="3" required placeholder="Số nhà, đường, phường/xã..."></textarea>
            </div>

            <div class="form-group">
                <label for="payment">Phương thức thanh toán</label>
                <select id="payment" name="payment" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: var(--radius);">
                    <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                    <option value="banking">Chuyển khoản ngân hàng</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                Hoàn tất đặt hàng
            </button>
        </form>
    </div>

    <!-- Right: Order Summary -->
    <div style="background: var(--surface); padding: 1.5rem; border-radius: var(--radius); border: 1px solid var(--border);">
        <h3>Đơn hàng của bạn</h3>
        <div style="margin-top: 1rem; margin-bottom: 1rem; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 1rem 0;">
            <?php 
            $total = 0;
            if (!empty($_SESSION['cart'])):
                foreach ($_SESSION['cart'] as $id => $qty):
                     // Minimal lookup to show total (in a real app controller passes this data)
                     // For now relying on the total passed from controller or session logic
                endforeach;
            endif;
            ?>
            <p>Vui lòng kiểm tra kỹ thông tin trước khi đặt hàng.</p>
        </div>
        <a href="/project1/Cart/index" style="color: var(--primary); text-decoration: underline;">Quay lại giỏ hàng</a>
    </div>

</div>

<?php 
$content = ob_get_clean();
include 'app/views/layout.php';
?>
