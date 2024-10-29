
<?php
require_once '../db_connect.php';
$page_title = '团队成员管理';
$current_page = 'team';
include 'header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $stmt = $conn->prepare("INSERT INTO team_members (name, position, bio, image_url, qq, wechat, email, status, review_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssss", $_POST['name'], $_POST['position'], $_POST['bio'], $_POST['image_url'], $_POST['qq'], $_POST['wechat'], $_POST['email'], $_POST['status'], $_POST['review_status']);
                $stmt->execute();
                $stmt->close();
                break;
            case 'update':
                $stmt = $conn->prepare("UPDATE team_members SET name = ?, position = ?, bio = ?, image_url = ?, qq = ?, wechat = ?, email = ?, status = ?, review_status = ? WHERE id = ?");
                $stmt->bind_param("sssssssssi", $_POST['name'], $_POST['position'], $_POST['bio'], $_POST['image_url'], $_POST['qq'], $_POST['wechat'], $_POST['email'], $_POST['status'], $_POST['review_status'], $_POST['id']);
                $stmt->execute();
                $stmt->close();
                break;
            case 'delete':
                $stmt = $conn->prepare("DELETE FROM team_members WHERE id = ?");
                $stmt->bind_param("i", $_POST['id']);
                $stmt->execute();
                $stmt->close();
                break;
        }
    }
}
$result = $conn->query("SELECT * FROM team_members ORDER BY id");
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
    <h2 class="content-heading">团队成员管理</h2>
    
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">团队成员列表</h3>
            <div class="block-options">
                <button type="button" class="btn btn-primary" onclick="showAddMemberModal()">
                    <i class="fa fa-plus"></i> 添加新成员
                </button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>职位</th>
                        <th>状态</th>
                        <th>审核状态</th>
                        <th class="text-center" style="width: 200px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($member = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($member['name']); ?></td>
                        <td><?php echo htmlspecialchars($member['position']); ?></td>
                        <td><?php echo $member['status'] == 'normal' ? '正常' : '暂停'; ?></td>
                        <td><?php 
                            switch($member['review_status']) {
                                case 'approved':
                                    echo '通过';
                                    break;
                                case 'pending':
                                    echo '待审核';
                                    break;
                                case 'rejected':
                                    echo '不通过';
                                    break;
                            }
                        ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary" onclick="editMember(<?php echo $member['id']; ?>)">编辑</button>
                                <form action="" method="POST" style="display: inline;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('确定要删除这个成员吗？');">删除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberModalLabel">添加新成员</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMemberForm" action="" method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="mb-3">
                        <label class="form-label">姓名</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">职位</label>
                        <input type="text" class="form-control" name="position" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">简介</label>
                        <textarea class="form-control" name="bio" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">图片URL</label>
                        <input type="text" class="form-control" name="image_url">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">QQ</label>
                        <input type="text" class="form-control" name="qq">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">微信</label>
                        <input type="text" class="form-control" name="wechat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">邮箱</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">状态</label>
                        <select class="form-select" name="status">
                            <option value="normal">正常</option>
                            <option value="paused">暂停</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">审核状态</label>
                        <select class="form-select" name="review_status">
                            <option value="approved">通过</option>
                            <option value="pending">待审核</option>
                            <option value="rejected">不通过</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="submitAddForm()">添加成员</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="editMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMemberModalLabel">编辑成员</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editMemberForm" action="" method="POST">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" id="editMemberId">
                    <div class="mb-3">
                        <label class="form-label">姓名</label>
                        <input type="text" class="form-control" name="name" id="editMemberName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">职位</label>
                        <input type="text" class="form-control" name="position" id="editMemberPosition" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">简介</label>
                        <textarea class="form-control" name="bio" id="editMemberBio" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">图片URL</label>
                        <input type="text" class="form-control" name="image_url" id="editMemberImageUrl">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">QQ</label>
                        <input type="text" class="form-control" name="qq" id="editMemberQQ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">微信</label>
                        <input type="text" class="form-control" name="wechat" id="editMemberWechat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">邮箱</label>
                        <input type="email" class="form-control" name="email" id="editMemberEmail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">状态</label>
                        <select class="form-select" name="status" id="editMemberStatus">
                            <option value="normal">正常</option>
                            <option value="paused">暂停</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">审核状态</label>
                        <select class="form-select" name="review_status" id="editMemberReviewStatus">
                            <option value="approved">通过</option>
                            <option value="pending">待审核</option>
                            <option value="rejected">不通过</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="submitEditForm()">保存更改</button>
            </div>
        </div>
    </div>
</div>

<script>
function showAddMemberModal() {
    var myModal = new bootstrap.Modal(document.getElementById('addMemberModal'));
    myModal.show();
}

function submitAddForm() {
    document.getElementById('addMemberForm').submit();
}

function editMember(id) {
    fetch(`get_member.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editMemberId').value = data.id;
            document.getElementById('editMemberName').value = data.name;
            document.getElementById('editMemberPosition').value = data.position;
            document.getElementById('editMemberBio').value = data.bio;
            document.getElementById('editMemberImageUrl').value = data.image_url;
            document.getElementById('editMemberQQ').value = data.qq;
            document.getElementById('editMemberWechat').value = data.wechat;
            document.getElementById('editMemberEmail').value = data.email;
            document.getElementById('editMemberStatus').value = data.status;
            document.getElementById('editMemberReviewStatus').value = data.review_status;
            var myModal = new bootstrap.Modal(document.getElementById('editMemberModal'));
            myModal.show();
        });
}

function submitEditForm() {
    document.getElementById('editMemberForm').submit();
}
</script>

<?php
include 'footer.php';
?>