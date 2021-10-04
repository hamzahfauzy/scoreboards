<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->single('participant_names',[
    'id' => $_GET['id']
]);
if(request()->isMethod('POST'))
{
    $request = request()->post();

    $exist = $db->single('participant_names',[
        'name' => $request->name,
    ]);

    if($exist)
        return redirect()->route('admin/nama-peserta/edit&id='.$_GET['id'])->withMessage('fail','Nama Sudah Dipakai!');

    $participant    = $db->update('participant_names',[
        'name'      => $request->name,
    ],[
        'id' => $_GET['id']
    ]);

    if($participant)
        return redirect()->route('admin/nama-peserta')->withMessage('success','Data Berhasil Diupdate!');
    return redirect()->route('admin/nama-peserta')->withMessage('fail','Data Gagal Diupdate!');
}

return view('admin/nama-peserta/edit',[
    'participant' => $participant
]);