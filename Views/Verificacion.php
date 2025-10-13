<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Muestra el formulario (simplificado)
    $token = $_GET['token'] ?? '';
    $email = $_GET['email'] ?? '';
    ?>
    <form method="POST">
      <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
      <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
      Nueva contraseña: <input type="password" name="password" required minlength="6">
      <button type="submit">Cambiar contraseña</button>
    </form>
    <?php
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['password'] ?? '';

    if (!$email || !$token || strlen($newPassword) < 6) {
        exit('Datos inválidos.');
    }

    $tokenHash = hash('sha256', $token);

    
    $stmt = $pdo->prepare('SELECT id, reset_token_hash, reset_expires_at FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !$user['reset_token_hash']) {
        exit('Token inválido o expirado.');
    }
}
    $now = new DateTime();
    if ($now > new DateTime($user['reset_expires_at'])) {
        exit('El enlace ha expirado.');
    }

    if (!hash_equals($user['reset_token_hash'], $tokenHash)) {
        exit('Token inválido.');
    }

    
    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
    $upd = $pdo->prepare('UPDATE users SET password_hash = ?, reset_token_hash = NULL, reset_expires_at = NULL WHERE id = ?');
    $upd->execute([$hash, $user['id']]);

    echo 'Contraseña actualizada correctamente. Ya puedes iniciar sesión.';


?>