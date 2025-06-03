<?php

if ($process == 'list') {


    $q = $db->prepare('SELECT todos.*, c.title as category_title FROM todos 
                            LEFT JOIN categories c on c.id = todos.category_id
                            WHERE todos.user_id = ? && status =? ORDER BY start_date ASC');
    $q->execute([get_session('id'), 's']);
    $todos = $q->fetchAll(PDO::FETCH_ASSOC);

    $q = $db->prepare("SELECT 
                            status, count(todos.id) as toplam,
                            (count(todos.id) * 100/ (SELECT COUNT(id) FROM todos WHERE user_id = ?)) as yuzde
                            FROM todos WHERE todos.user_id = ? 
                            GROUP BY todos.status");
    $q->execute([get_session('id'),get_session('id')]);

    if ($q->rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => array_merge(['istatistik' => $q->fetchAll(PDO::FETCH_ASSOC)], ['surec' => $todos])
        ];

    } else {
        return [
            'success' => true,
            'type' => 'success',
            'data' => []
        ];
    }


}