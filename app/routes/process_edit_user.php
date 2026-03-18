<?php
require_once __DIR__ . '/../../config/config.php';
header('Location: ' . BASE_URL . '/app/views/admin/edit_user.php?id=' . (int)$_POST['id']);
exit;
