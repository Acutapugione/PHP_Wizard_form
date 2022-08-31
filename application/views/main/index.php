<h2>
    All members 
</h2>
        
<table class="table table-dark">
    <thead> 
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Full name</th>
            <th scope="col">Report subject</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($members as $index => $member): ?>
        <tr>
            <th scope="row"><?= $index; ?></th>
            <td>
                <img width="40px"
                    src="<?= $member['photo'] ? $member['photo'] : '/public/img/default.png'; ?>" 
                    alt="<?= $member['photo'] ? $member['photo'] : '/public/img/default.png'; ?>" 
                    srcset="">
            </td>
            <td>
                <?= $member['first_name'].' '.$member['last_name']; ?>
            </td>
            <td>
                <?= $member['report_subject']; ?>
            </td>
            <td>
                <a href="<?= $member['email']; ?>">
                    <?= $member['first_name'].' '.$member['last_name']; ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>