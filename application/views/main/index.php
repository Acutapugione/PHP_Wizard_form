<h2>
    All members 
</h2>
<!-- /*photo Отображать фото при регистрации или дефолтное, если фото 
        не было загружено
        full name Выводить полное имя в одной ячейке
        report subject
        email Выводить ссылкой*/ -->
        
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
            <td><?= $member['photo']; ?></td>
            <td><?= $member['first_name'].' '.$member['last_name']; ?></td>
            <td><?= $member['report_subject']; ?></td>
            <td><?= $member['email']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>