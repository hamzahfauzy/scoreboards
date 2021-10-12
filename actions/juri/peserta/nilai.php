<?php
$id = $_GET['id'];
$user = session()->get('user');
$conn    = get_connection();
$db      = new src\Database($conn);
$check   = $db->single('valuations',[
    'user_id'   => $user->id,
    'participant_id' => $id,
]);

$participant   = $db->single('participants',[
    'id' => $id,
]);

if($check)
    return redirect()->route('juri/peserta')->withMessage('fail','Restricted area!');

if(request()->isMethod('POST'))
{
    $request = request()->post();
    $total_score = 0;
    foreach($request->score as $score)
        $total_score += $score;

    $total_score /= session()->get('juri');

    $valuations    = $db->insert('valuations',[
        'user_id'   => $user->id,
        'score'     => $total_score,
        'score_serialize' => serialize($request->score),
        'participant_id' => $id,
    ]);

    if($valuations)
    {
        $db->update('participants',[
            'total_score' => $total_score,
            'status'      => 'tampil'
            // 'status'      => 'selesai'
        ],[
            'id' => $id
        ]);

        return redirect()->route('juri/peserta')->withMessage('success','Peserta berhasil dinilai!');
    }
    return redirect()->route('juri/peserta')->withMessage('fail','Peserta gagal dinilai!');
}

return view('juri/peserta/nilai',[
    'participant' => $participant
]);