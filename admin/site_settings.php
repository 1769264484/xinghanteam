
<?php
require_once '../db_connect.php';
$page_title = '网站设置';
$current_page = 'site_settings';
include 'header.php';
$alert = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $site_title = $_POST['site_title'];
    $site_keywords = $_POST['site_keywords'];
    $site_description = $_POST['site_description'];
    $footer_text = $_POST['footer_text'];
    $logo_type = $_POST['logo_type'];
    $logo_text = $_POST['logo_text'];
    $logo_image = $_POST['logo_image'];
    $captcha_enabled = isset($_POST['captcha_enabled']) ? '1' : '0';
    $stmt = $conn->prepare("REPLACE INTO site_settings (setting_key, setting_value) VALUES (?, ?)");
    $settings = [
        'site_title' => $site_title,
        'site_keywords' => $site_keywords,
        'site_description' => $site_description,
        'footer_text' => $footer_text,
        'logo_type' => $logo_type,
        'logo_text' => $logo_text,
        'logo_image' => $logo_image,
        'captcha_enabled' => $captcha_enabled
    ];

    foreach ($settings as $key => $value) {
        $stmt->bind_param("ss", $key, $value);
        $stmt->execute();
    }

    $stmt->close();
    $alert = '<div class="alert alert-success">设置已更新</div>';
}
$result = $conn->query("SELECT * FROM site_settings WHERE setting_key IN ('site_title', 'site_keywords', 'site_description', 'footer_text', 'logo_type', 'logo_text', 'logo_image', 'captcha_enabled')");
$settings = [];
while ($row = $result->fetch_assoc()) {
    $settings[$row['setting_key']] = $row['setting_value'];
}

?>
<!-- /**
 * =========================================================================
 * 
 *                      XingHan-Team 官网程序 
 * =========================================================================
 * 
 * @package     XingHan-Team Official Website
 * @author      XingHan Development Team
 * @copyright   Copyright (c) 2024, XingHan-Team
 * @link        https://www.ococn.cn
 * @since       Version 1.0.0
 * @filesource  By 奉天
 * 
 * =========================================================================
 * 
 * XingHan-Team 星涵网络工作室官方网站管理系统
 * 版权所有 (C) 2024 XingHan-Team。保留所有权利。
 * 
 * 本软件受著作权法和国际公约的保护。未经授权，不得以任何形式或方式复制、分发、
 * 传播、展示、执行、复制、发行、或以其他方式使用本软件。
 * 
 * 感谢您选择 XingHan-Team 的产品。如有任何问题或建议，请联系我们。
 * 
 * =========================================================================
 */ -->
<div class="content">
    <h2 class="content-heading">网站设置</h2>
    
    <?php if (!empty($alert)): ?>
    <div class="block block-rounded">
        <div class="block-content">
            <?php echo $alert; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">网站设置</h3>
        </div>
        <div class="block-content">
            <form action="" method="POST">
                <div class="mb-4">
                    <label class="form-label" for="site_title">网站标题</label>
                    <input type="text" class="form-control" id="site_title" name="site_title" value="<?php echo htmlspecialchars($settings['site_title'] ?? ''); ?>">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="site_keywords">网站关键词</label>
                    <input type="text" class="form-control" id="site_keywords" name="site_keywords" value="<?php echo htmlspecialchars($settings['site_keywords'] ?? ''); ?>">
                    <small class="form-text text-muted">多个关键词请用逗号分隔</small>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="site_description">网站描述</label>
                    <textarea class="form-control" id="site_description" name="site_description" rows="3"><?php echo htmlspecialchars($settings['site_description'] ?? ''); ?></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="footer_text">底部文字</label>
                    <input type="text" class="form-control" id="footer_text" name="footer_text" value="<?php echo htmlspecialchars($settings['footer_text'] ?? ''); ?>">
                </div>
                <div class="mb-4">
                    <label class="form-label">Logo 类型</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="logo_type" id="logo_type_text" value="text" <?php echo ($settings['logo_type'] ?? '') == 'text' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="logo_type_text">文字 Logo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="logo_type" id="logo_type_image" value="image" <?php echo ($settings['logo_type'] ?? '') == 'image' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="logo_type_image">图片 Logo</label>
                    </div>
                </div>
                <div class="mb-4" id="logo_text_input">
                    <label class="form-label" for="logo_text">Logo 文字</label>
                    <input type="text" class="form-control" id="logo_text" name="logo_text" value="<?php echo htmlspecialchars($settings['logo_text'] ?? ''); ?>">
                </div>
                <div class="mb-4" id="logo_image_input">
                    <label class="form-label" for="logo_image">Logo 图片 URL</label>
                    <input type="text" class="form-control" id="logo_image" name="logo_image" value="<?php echo htmlspecialchars($settings['logo_image'] ?? ''); ?>">
                </div>
                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="captcha_enabled" name="captcha_enabled" value="1" <?php echo ($settings['captcha_enabled'] ?? '0') == '1' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="captcha_enabled">启用登录验证码</label>
                    </div>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">保存设置</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const logoTypeText = document.getElementById('logo_type_text');
    const logoTypeImage = document.getElementById('logo_type_image');
    const logoTextInput = document.getElementById('logo_text_input');
    const logoImageInput = document.getElementById('logo_image_input');

    function toggleLogoInputs() {
        if (logoTypeText.checked) {
            logoTextInput.style.display = 'block';
            logoImageInput.style.display = 'none';
        } else {
            logoTextInput.style.display = 'none';
            logoImageInput.style.display = 'block';
        }
    }

    logoTypeText.addEventListener('change', toggleLogoInputs);
    logoTypeImage.addEventListener('change', toggleLogoInputs);

    toggleLogoInputs();
});
</script>

<?php
include 'footer.php';
?>