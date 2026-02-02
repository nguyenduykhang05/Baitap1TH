<?php ob_start(); ?>

<div style="max-width: 600px; margin: 4rem auto; text-align: center; background: white; padding: 3rem; border-radius: var(--radius); box-shadow: var(--shadow);">
    <div style="font-size: 4rem; color: #10b981; margin-bottom: 1rem;">🎉</div>
    <h1 style="color: #10b981;">Đặt hàng thành công!</h1>
    <p style="font-size: 1.1rem; color: var(--text-muted); margin-bottom: 2rem;">
        Cảm ơn bạn đã mua sắm. Chúng tôi sẽ liên hệ sớm để chốt đơn hàng.
    </p>
    
    <div style="margin-bottom: 2rem;">
        <a href="/project1/Product/list" class="btn btn-primary">Tiếp tục mua sắm</a>
    </div>
</div>

<?php 
$content = ob_get_clean();
include 'app/views/layout.php';
?>
