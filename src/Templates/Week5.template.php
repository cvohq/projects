<h1><?= $title; ?></h1>

<?php
    if($data[0]['function'] === 'getAllusers')
    {
?>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $user = new Classes\User;
                foreach ($data[1] as $user)
                {
            ?>
            <tr>
                <th scope="row"><?= $user->getID(); ?></td>
                <td><?= $user->getName(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getCreated(); ?></td>
            </tr>
            <?php
                }
            ?>

            </tbody>
        </table>
<?php 
    }
    elseif ($data[0]['function'] === 'add100userslistname') {
        echo $data[1];
    }
    elseif($data[0]['function'] === 'add100usersrandomname') {
        echo $data[1];
   }

?>