<?php require_once APP_PATH . 'views/layouts/header.php';
// ini_set('display_errors', value: 1)
?>
<main>
    <table class="border border-gray-300 m-8">
  <thead class="bg-gray-100">
    <tr>
      <th class="p-2 border">ID</th>
      <th class="p-2 border">Usuario</th>
      <th class="p-2 border">Nombres</th>
      <th class="p-2 border">Apellido Paterno</th>
      <th class="p-2 border">Apellido Materno</th>
      <th class="p-2 border">Hotel</th>
      <th class="p-2 border">Rol</th>
    </tr>
</thead>
  <tbody class="bg-gray-100">
    <?php foreach ($users as $user): ?>
      <tr class="hover:bg-blue-200">
        <td class="p-2 border"><?= $user['id_usuario'] ?></td>
        <td class="p-2 border"><?= $user['nombre_usuario'] ?></td>
        <td class="p-2 border"><?= $user['nombres'] ?></td>
        <td class="p-2 border"><?= $user['apellido_paterno'] ?></td>
        <td class="p-2 border"><?= $user['apellido_materno'] ?></td>
        <td class="p-2 border"><?= $user['nombre_hotel'] ?></td>
        <td class="p-2 border"><?= $user['roles'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</main>

<?php require_once APP_PATH . 'views/layouts/footer.php';?>
</html>